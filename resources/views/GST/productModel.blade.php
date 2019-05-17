{{-- /*
 *  File Name              :
 *  Type                   :   
 *  Description            :   
 *  Author                 : Ashtosh Kumar Choubey
 *  Contact                : 9658476170
 *  Email                  : ashutoshphoenixsoft@gmail.com
 *  Date                   : 12/12/2018  
 *  Modified By            :       
 *  Date of Modification   :     
 *  Purpose of Modification: 
 * 
 */ --}}
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
            <h4 class="box-title text-primary ">Please Fill Up Product Model Details</h4>
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
      <div  class="col-lg-12 text-center" style="display:{{ isset($id)?'block':'none' }}">
                      
                             <button type="button" class="btn btn-light waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-3"><i class="fa fa-plus">Add Product Unit</i></button>
                        
      </div> 
 
       <div class="modal fade" id="modal-animation-3">
                  <div class="modal-dialog modal-lg " >
                     {{ Form::open(['url' => 'GST/productModel/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
                    {{ csrf_field() }}
                    {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
                    <div class="modal-content animated zoomInUp">
                      <div class="modal-header">
                        <h5 class="modal-title">Product Type Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="brand_id">Product Brand Name</label>
                      {{Form::select('brand_id',$brandList, isset($brand_id)?$brand_id: '', ['class' => 'form-control form-control ','id'=>'brand_id','required', 'placeholder' => '  Name']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('brand_id') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="model_name">Product Model Name</label>
                      {{Form::text('model_name', isset($model_name)?$model_name: '', ['class' => 'form-control form-control ','id'=>'model_name','required', 'placeholder' => '  Name']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('model_name') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="model_number">Model Number</label>
                      {{Form::text('model_number', isset($model_number)?$model_number: '', ['class' => 'form-control form-control ','id'=>'model_number','required', 'placeholder' => '  Name']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('model_number') ? $errors->first('name', ':message') : '' }}
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
{{--           {{ Form::open(['url' => 'GST/productModel/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
 --}}
          {{ isset($id)?Form::open(['url' => 'GST/productModel/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'GST/productModel/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 


          {{ csrf_field() }}
          {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
          <div class="card">
            <div class="card-header text-uppercase">Product Model Details</div>
            <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="brand_id">Product Brand Name</label>
                      {{Form::select('brand_id',$brandList, isset($brand_id)?$brand_id: '', ['class' => 'form-control form-control ','id'=>'brand_id','required', 'placeholder' => '  Name']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('brand_id') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="model_name">Product Model Name</label>
                      {{Form::text('model_name', isset($model_name)?$model_name: '', ['class' => 'form-control form-control ','id'=>'model_name','required', 'placeholder' => '  Name']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('model_name') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="model_number">Model Number</label>
                      {{Form::text('model_number', isset($model_number)?$model_number: '', ['class' => 'form-control form-control ','id'=>'model_number','required', 'placeholder' => '  Name']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('model_number') ? $errors->first('name', ':message') : '' }}
                      </div>
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



 


      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> Product Model Detail
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered" >
                <thead>
                  <tr>
                    <th >Product Model Id</th>
                    <th >Product Brand Id</th>
                    <th >Product Model Name</th>
                     <th >Product Model Name</th>
                    <th >Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                @foreach($productModel as $key => $value)
                  <tr>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['brand_id'] }}</td>
                    <td>{{ $value['model_name'] }}</td>
                    <td>{{ $value['model_number'] }}</td>
                    <td>{{ $value['created_at'] }}</td>
                    <td >
                    <a href="{{ url('/')}}/GST/productModel/add/{{ $value['id'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                    <a href="{{ url('/')}}/GST/productModel/trash/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
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