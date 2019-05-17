
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
 
    /* More print styles */
  /* ...style="background-color: black;color: white" */
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
            <h4 class="box-title text-primary ">Please Fill Up Distributor Details</h4>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
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
      <div  class="col-lg-12 text-center" style="display:none">
                      
                             <button type="button" class="btn btn-light waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-3"><i class="fa fa-plus">Add Distributor</i></button>
                        
      </div> 
 
       <div class="modal fade" id="modal-animation-3">
                  <div class="modal-dialog modal-lg " >
                     {{ Form::open(['url' => 'krishna/distributor/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
                    {{ csrf_field() }}
                    {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
                    <div class="modal-content animated zoomInUp">
                      <div class="modal-header">
                        <h5 class="modal-title">Distributor Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                    <div class="col-md-6">
                    <div class="form-groupp">
                    <label class="form-col-form-label" for="name">Distributor Name</label>
                    {{Form::text('distributor_name', isset($distributor_name)?$distributor_name: '', ['class' => 'form-control form-control ','id'=>'distributor_name','required', 'placeholder' => 'Name']  )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('distributor_name') ? $errors->first('name', ':message') : '' }}
                    </div>
                    </div>
                    </div>
                {{--   </div>

  
                  <div class="row"> --}}
                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-col-form-label" for="contact_no">Contact Number</label>
                    {{Form::number('contact_no',isset($contact_no)?$contact_no: '', ['class' => 'form-control form-control ', 'placeholder' => 'Contact Number'] )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('contact_no') ? $errors->first('contact_no', ':message') : '' }}
                    </div>
                    </div>
                    </div> 
                  </div>
                   <!-- <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-col-form-label" for="customer_contact_number">Alternate Contact Number</label>
                    {{Form::number('customer_contact_number',isset($customer_alt_number)?$customer_alt_number: '', ['class' => 'form-control form-control ', 'placeholder' => 'Mobile Number'] )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('customer_alt_number') ? $errors->first('customer_alt_number', ':message') : '' }}
                    </div>
                    </div>
                    </div> 
                 </div> -->
                  <div class="row"> 
                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-col-form-label" for="email">Email</label>
                    {{Form::text('email',isset($email)?$email: '', ['class' => 'form-control form-control ', 'placeholder' => 'Email'] )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('email') ? $errors->first('email', ':message') : '' }}
                    </div>
                    </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="form-col-form-label" for="gstin">GSTIN</label>
                      {{Form::text('gstin',isset($gstin)?$gstin: '', ['class' => 'form-control form-control ', 'placeholder' => 'GSTIN'] )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('gstin') ? $errors->first('gstin', ':message') : '' }}
                      </div>
                    </div>
                    </div> 
                   </div>
                  <div class="row"> 
                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-col-form-label" for="address">Address</label>
                    {{Form::textarea('address',isset($address)?$address: '', ['class' => 'form-control form-control ', 'style'=>'height:75px','placeholder' => 'Address'] )}}
                    <div class="invalid-feedback">
                    {{ 
                    $errors->has('address') ? $errors->first('address', ':message') : '' }}
                    </div>
                    </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="form-col-form-label" for="about">About</label>
                      {{Form::text('about',isset($about)?$about: '', ['class' => 'form-control form-control ', 'placeholder' => 'About'] )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('about') ? $errors->first('about', ':message') : '' }}
                      </div>
                    </div>
                    </div> 
                   </div>
                      </div>
                      <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> --}}
                         <button type="submit" class="btn btn-sm btn-primary" name=""> <i class="fa fa-dot-circle-o"></i>Add</button> 
                <button type="reset" class="btn btn-sm btn-danger" name=""> <i class="fa fa-ban"></i> Reset</button> 
                      </div>
                    </div>
                    {{Form::close()}}
                  </div>
        </div>


        <div class="col-lg-12" >
{{--           {{ Form::open(['url' => 'krishna/distributor/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
 --}}
          {{ isset($id)?Form::open(['url' => 'krishna/distributor/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'krishna/distributor/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 


          {{ csrf_field() }}
          {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
          <div class="card">
            <div class="card-header text-uppercase">Distributor Details</div>
            <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-groupp">
                    <label class="form-col-form-label" for="name">Distributor Name</label>
                    {{Form::text('distributor_name', isset($distributor_name)?$distributor_name: '', ['class' => 'form-control form-control ','id'=>'distributor_name','required', 'placeholder' => '  Name']  )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('distributor_name') ? $errors->first('name', ':message') : '' }}
                    </div>
                    </div>
                    </div>
                 {{--  </div>  
                  <div class="row"> --}}
                    <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-col-form-label" for="contact_no">Contact Number</label>
                    {{Form::number('contact_no',isset($contact_no)?$contact_no: '', ['class' => 'form-control form-control ', 'placeholder' => 'Contact Number'] )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('contact_no') ? $errors->first('contact_no', ':message') : '' }}
                    </div>
                    </div>
                    </div> 
                 {{--  </div>
                   <div class="row"> --}}
                    <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-col-form-label" for="email">Email</label>
                    {{Form::text('email',isset($email)?$email: '', ['class' => 'form-control form-control ', 'placeholder' => 'Email'] )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('email') ? $errors->first('email', ':message') : '' }}
                    </div>
                    </div>
                    </div> 
                 {{--  </div>
                    <div class="row"> --}}               
                    <div class="col-md-4">
                      <div class="form-group">
                      <label class="form-col-form-label" for="address">Address</label>
                      {{Form::text('address',isset($address )?$address: '', ['class' => 'form-control form-control ', 'placeholder' => 'Address'] )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('address ') ? $errors->first('address', ':message') : '' }}
                      </div>
                    </div>
                    </div> 
                  {{-- </div>
                  <div class="row"> --}}
                    <div class="col-md-4">
                      <div class="form-group">
                      <label class="form-col-form-label" for="gstin">GSTIN</label>
                      {{Form::text('gstin',isset($gstin)?$gstin: '', ['class' => 'form-control form-control ', 'placeholder' => 'GSTIN'] )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('gstin') ? $errors->first('gstin', ':message') : '' }}
                      </div>
                    </div>
                    </div> 
                  {{-- </div>
                  <div class="row"> --}}
                    <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-col-form-label" for="about">About</label>
                    {{Form::textarea('about',isset($about)?$about: '', ['class' => 'form-control form-control ', 'style'=>'height:75px','placeholder' => 'About'] )}}
                    <div class="invalid-feedback">
                    {{ 
                    $errors->has('about') ? $errors->first('about', ':message') : '' }}
                    </div>
                    </div>
                    </div> 
                  </div>
            </div>

            <div class="card-footer">
                <div class="row">
                <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-sm btn-primary" name=""> <i class="fa fa-dot-circle-o"></i>{{isset($id) ? 'Update' :'Add' }}</button> 
                <button type="reset" class="btn btn-sm btn-danger" name=""> <i class="fa fa-ban"></i> Reset</button> 
                </div>
              </div>                
            </div>

          </div>
          {{Form::close()}}
        </div>


<div class="col-lg-12">
  <div class="card">
    <div class="card-header text-uppercase">Distributor Details</div>
    <div class="card-body">


    <div class="row">
        <div class="col-sm-12" class="text-center">
          {{ Form::open(['url' => 'krishna/distributor/search','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
          <div class="row">
            <div class="col-sm-4">

            <div class="form-group">
            <label for="input-6">Distributor Name</label>
            {{Form::text('distributor_name', isset($distributor_name)?$distributor_name: '', ['class' => 'form-control form-control-rounded','id'=>'distributor_name', 'placeholder' => 'Name']  )}}
            </div>

            </div> 
            <div class="col-sm-4">
            <div class="form-group">
            <label for="mob_num">Contact Number</label>
            <input type="text"  id="contact_no" class="form-control form-control-rounded" name="contact_no">
            </div>
            </div>
            <div class="col-sm-4">
            <div class="form-group">
            <label for="input-6">To Date</label>
            <input type="text"  id="autoclose-datepicker_to" class="form-control form-control-rounded" name="created_at_from">
            </div>
            </div>
           </div>
          <div class="row"> 
            <div class="col-sm-4">
            <div class="form-group">
            <label for="input-6">From Date</label>
            <input type="text"  id="autoclose-datepicker_from" class="form-control form-control-rounded" name="created_at_to">
            </div>
            </div>
            <div class="col-sm-4distributor">
            <div class="form-group">
            <label for="input-6">Email</label>
            <input type="text"  id="email" class="form-control form-control-rounded" name="email">
            </div>
            </div>

          </div> 
          <div class="row">
            <div class="col-sm-12 text-center">
            <input type="submit" name="search" class="btn btn-warning btn-round waves-effect waves-light m-1" value="Search">
            </div>
            </div>
          {{Form::close()}}
        </div>
      </div>


      

    </div>

    </div>
  </div>
  </div>


      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> Distributor Details
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered" >
                <thead>
                  <tr>
                    <th>Distributor Id</th>
                    <th >Distributor Name</th>
                    <th >Contact Number</th>
                    <th >Email</th>
                    <th >Address</th> 
                    <th >GSTIN</th>
                    <th >About</th>
                    <th >Created Date</th>
                    
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                @foreach($distributor as $key => $value)
                  <tr>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['distributor_name'] }}</td>
                    <td>{{ $value['contact_no'] }}</td>
                    <td>{{ $value['email'] }}</td>
                    <td>{{ $value['address'] }}</td>
                    <td>{{ $value['gstin'] }}</td>
                    <td>{{ $value['about'] }}</td>
                    <td>{{ $value['created_at'] }}</td>
                    <td >
                    <a href="{{ url('/')}}/krishna/distributor/add/{{ $value['id'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                    <a href="{{ url('/')}}/krishna/distributor/trash/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
                    </td>
                  </tr>  
                @endforeach
                </tbody>
              </table>
              <div class="col-lg-12 text-center">

              </div>
            </div>
          </div>
          </div>
          </div>

       </div>
    
     <!--End Row-->
    

 
                  
  
</section>
<script type="text/javascript">
  $('#autoclose-datepicker_to').datepicker({
        autoclose: true,
        todayHighlight: true
      });
   $('#autoclose-datepicker_from').datepicker({
        autoclose: true,
        todayHighlight: true
      });

   $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
</script>

@endsection