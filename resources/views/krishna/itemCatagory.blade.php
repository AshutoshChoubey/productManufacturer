@extends('mainWithLessCss') 
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
<link href="{{ asset('/asset/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('/asset/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('/asset/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"/>
<section class="content" >
  <!-- For Session Message -->
    <div class="row">
      <!-- left column -->
      <div class="col-lg-12 col-sm-12">
        <!-- general form elements -->
        <div class="card box-primary">
          <div class="card-header with-border text-center">
            <h4 class="box-title text-primary ">Please Fill Up Item Details</h4>
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
                      
                             <button type="button" class="btn btn-light waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-3"><i class="fa fa-plus">Add Item Catagory</i></button>
                        
      </div> 
 
       <div class="modal fade" id="modal-animation-3">
                  <div class="modal-dialog modal-lg " >
                     {{ Form::open(['url' => 'krishna/itemCatagory/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
                    {{ csrf_field() }}
                    {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
                    <div class="modal-content animated zoomInUp">
                      <div class="modal-header">
                        <h5 class="modal-title">Item Catagory Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                    <div class="form-groupp">
                    <label class="form-col-form-label" for="item_name">Item Catagory</label>
                    {{Form::text('item_category_name', isset($item_category_name)?$item_category_name: '', ['class' => 'form-control form-control ','id'=>'item_name','required', 'placeholder' => '  Name']  )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('item_name') ? $errors->first('name', ':message') : '' }}
                    </div>
                    </div>
                    </div>
                  </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-col-form-label" for="item_description">Item Description</label>
                    {{Form::text('item_description',isset($item_description)?$item_description: '', ['class' => 'form-control form-control ', 'placeholder' => 'Item Description'] )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('item_description') ? $errors->first('item_description', ':message') : '' }}
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
{{--           {{ Form::open(['url' => 'krishna/itemCatagory/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
 --}}
          {{ isset($id)?Form::open(['url' => 'krishna/itemCatagory/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'krishna/itemCatagory/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 


          {{ csrf_field() }}
          {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
          <div class="card">
            <div class="card-header text-uppercase">Item Catagory Details</div>
            <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                    <div class="form-groupp">
                    <label class="form-col-form-label" for="item_category_name">Item Catagory</label>
                    {{Form::text('item_category_name', isset($item_category_name)?$item_category_name: '', ['class' => 'form-control form-control ','id'=>'item_category_name','required', 'placeholder' => '  Name']  )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('item_category_name') ? $errors->first('item_category_name', ':message') : '' }}
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-col-form-label" for="item_description">Item Description</label>
                    {{Form::text('item_description',isset($item_description)?$item_description: '', ['class' => 'form-control form-control ', 'placeholder' => 'Item Description'] )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('item_description') ? $errors->first('item_description', ':message') : '' }}
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
              <i class="fa fa-align-justify"></i> Item Catagory Detail
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered" >
                <thead>
                  <tr>
                    <th >Item Id</th>
                    <th >Item Catagory</th>
                    <th >Item Description</th>
                    <th >Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                @foreach($itemCatagory as $key => $value)
                  <tr>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['item_category_name'] }}</td>
                    <td>{{ $value['item_description'] }}</td>
                    <td>{{ $value['created_at'] }}</td>
                    <td >
                    <a href="{{ url('/')}}/krishna/itemCatagory/add/{{ $value['id'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                    <a href="{{ url('/')}}/krishna/itemCatagory/trash/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
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
<script src="{{ asset('/asset/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<!--Data Table Related-->
<script src="{{ asset('/asset/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/asset/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('/asset/plugins/bootstrap-datatable/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('/asset/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('/asset/plugins/bootstrap-datatable/js/jszip.min.js') }}"></script>
  <script src="{{ asset('/asset/plugins/bootstrap-datatable/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('/asset/plugins/bootstrap-datatable/js/vfs_fonts.js') }}"></script>
  <script src="{{ asset('/asset/plugins/bootstrap-datatable/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('/asset/plugins/bootstrap-datatable/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('/asset/plugins/bootstrap-datatable/js/buttons.colVis.min.js') }}"></script>
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