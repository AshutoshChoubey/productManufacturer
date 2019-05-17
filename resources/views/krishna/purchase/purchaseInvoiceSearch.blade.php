
@extends('main') 
@section('content')

<section class="content" style="margin-left: 20px;margin-right: 20px;">
  <div class="row">
      <div class="col-sm-12" class="text-center">
         {{ Form::open(['url' => 'krishna/purchase/search','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
         <div class="table-responsive">
        <table class="table table-sm">
          <tr> 
            <!-- <td>Purchase Invoice Id</td>
            <td>:</td>
            <td> --><!-- <input type="text" class="form-control-sm" name="id"> -->
                <!-- {{Form::text('id', isset($id)?$id: '', ['class' => 'form-control-sm form-control-sm ','id'=>'id', 'placeholder' => ' Supplier Id']  )}}
            </td> -->
            <td>&emsp;&emsp;</td>
            <td>supplier Name</td>
            <td>:</td>
            <td>
              {{Form::text('supplier_name', isset($supplier_name)?$supplier_name: '', ['class' => 'form-control-sm form-control-sm ','id'=>'supplier_name', 'placeholder' => '  supplier Name']  )}}
            <td>&emsp;&emsp;</td>
           {{--  <td>Product Name</td>
            <td>:</td>
            <td><input type="text" class="form-control-sm" name="product_name"></td>
            <td></td> --}}
          </tr>
          <tr>
             <td>From Date</td>
            <td>:</td>
            <td><input type="date" class="form-control-sm" name="created_at_to"></td>            
            <td>&emsp;&emsp;</td>
            <td>To Date</td>
            <td>:</td>
            <td><input type="date" class="form-control-sm" name="created_at_from"></td>
            <td>&emsp;&emsp;</td>
           {{--  <td>Company Name</td>
            <td>:</td>
            <td><input type="text"  class="form-control-sm" name="company_name"></td>
            <td></td> --}}
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="13" class="text-center"><input type="submit" name="search" class="btn btn-primary" value="Search"></td>
          </tr>
        </table>
        </div>
         {{Form::close()}}
      </div>
  </div>
   <div class="row">
      <!-- left column -->
      <div class="col-md-12 col-sm-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">
            @if ($errors->any())
            <ul class="alert alert-danger" style="list-style:none">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            @endif
            @if(session()->has('message.level'))
            <div class="alert alert-{{ session('message.level') }} alert-dismissible" onload="javascript: Notify('You`ve got mail.', 'top-right', '5000', 'info', 'fa-envelope', true); return false;">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> {{ ucfirst(session('message.level')) }}!</h4>
              {!! session('message.content') !!}
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Purchase Invoice Details
          </div>
          <div class="card-body table-responsive" style="font-size: 13px;padding-left:10px;vertical-align:middle;">
            <table  id="example"  class="table   table-hover  " style="font-size: 13px;display:table-cell;" >
              <thead class="thead-dark">
                <tr>
                  <th style="white-space: nowrap"><small>Purchase Invoice Id</small></th>
                  <th style="white-space: nowrap">Supplier Name</th>
                  <th style="white-space: nowrap">Supplier Mobile Name</th>
                  <th style="white-space: nowrap">Supplier Email Id</th>
                  <th style="white-space: nowrap">Supplier Address</th>
                  <th style="white-space: nowrap">Purchase Invoice Number</th>
                  <th style="white-space: nowrap">Purchase Invoice Date</th>      
                  <th style="white-space: nowrap">Created Date</th>
                  <th style="white-space: nowrap">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($purchase as $key => $value)
                <tr>
                  <td>{{ $value['id'] }}</td>
                  <td>{{ $value['supplier_name'] }}</td>
                  <td>{{ $value['supplier_contact_no'] }}</td>
                  <td>{{ $value['supplier_email'] }}</td>
                  <td><small>{{ $value['supplier_address'] }}</small></td>
                  <td>{{ $value['purchase_invoice_number'] }}</td>
                  <td>{{ $value['purchase_invoice_date'] }}</td>
                   <td>{{ $value['created_at'] }}</td>
                   <td>
                        <a href="{{ url('/') }}/purchase-invoice-view/{{ $value['id'] }}" class="btn-sm btn-primary" target="blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
                  
  <div class="row">
   
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