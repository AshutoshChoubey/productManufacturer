@extends('main') 
@section('content')
<style type="text/css">
  @media print {
    .table {
        background-color: white;  
        color: black;
        border-color: black;
    }
     table {
        border: 1px solid black;
    }
    th, td {
       border: 1px solid black;
    }
}
</style>
<section class="content" >
  <!-- For Session Message -->
    <div class="row">
      <!-- left column -->
      <div class="col-lg-12 col-sm-12">
        <!-- general form elements -->
        <div class="card box-primary">
          <div class="card-header with-border text-center">
            <h4 class="box-title text-primary ">Please Fill Up Measurement Details</h4>
          </div>
          @if(session()->has('message.level'))
          <div class="card-body">

            <div class="alert alert-icon-{{ session('message.level') }} alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <div class="alert-icon icon-part-{{ session('message.level') }}">
                <i class="fa fa-{{ session('message.icon') }}"></i>
              </div>
              <div class="alert-message">
                <span>  {!! session('message.content') !!}</span>
              </div>
            </div>
          </div>
           @endif
        </div>
      </div>
    </div>
  <!-- For Session Message -->
<div class="row">
       <div class="card">
         <div class="card-header">Measurement Quatation</div>
         <div class="card-body table-responsive">
           <table id="example"  class="table table-hover">
             <thead class="thead-dark">
               <tr>
                  <th><small>Measurement Id</small></th>
                  <th><small>Customer Name</small></th>
                  <th><small>Customer Contact N.</small></th>
                  <th><small>Customer Email</small></th>
                  <th><small>Contact person</small></th>
                  <th><small>About</small></th>
                  <th><small>Meeasurement confirmed by</small></th>
                  <th><small>measurement Taken By</small></th>
                  <th><small>measurement Received For production</small></th>
                  <th><small>Action</small></th>
               </tr>
             </thead>
             <tbody>
              @foreach($tableData as $key => $value)
              <tr>
                  <td>{{ $value->id }}</td>
                  <td>{{  $value->customerName }}</td>
                  <td>{{ $value->contactNo }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->contact_person }}</td>
                  <td>{{ $value->about }}</td>
                  <td>{{ $value->measurement_onfirmed_by }}</td>
                  <td>{{ $value->measurement_taken_by }}</td>
                  <td>{{ $value->measurement_received_for_production }}</td>
                     <td> <a href="{{ url('/') }}/quatation/create/{{ $value->id }}" class="btn-sm btn-primary" target="blank"><small>Create Quatation</small></a>  <a href="{{ url('/') }}/quatation/measurementdataView/{{ $value->id }}" class="btn-sm btn-primary" target="blank"><i class="fa fa-eye" aria-hidden="true"></i></a></td> 
              </tr>
              @endforeach
              
             </tbody>
           </table>
         </div>
         <div class="card-footer"></div>
       </div>
  
</div>
</section>
 <script type="text/javascript">
 $(document).ready(function() {
        var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
        } );
        table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );

} );
</script>

@endsection