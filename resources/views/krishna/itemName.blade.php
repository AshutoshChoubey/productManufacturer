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
            <h4 class="box-title text-primary ">Please Fill Up Item Name Details</h4>
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
                      
                             <button type="button" class="btn btn-light waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-3"><i class="fa fa-plus">Add Item Name</i></button>
                        
      </div> 
 
       <div class="modal fade" id="modal-animation-3">
                  <div class="modal-dialog modal-lg " >
                     {{ Form::open(['url' => 'krishna/itemName/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
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
                  <div class="row" style="display:none">
                    <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_catagories_id">Item Catagory</label>
                      {{Form::select('item_catagories_id',$CatagoryList,isset($item_catagories_id)?$item_catagories_id: '', ['class' => 'form-control form-control single-select','id'=>'item_catagories_id','placeholder' => ' Item Catagory','required'=>'required'] )}}
                      {{Form::hidden('item_cat_name', isset($item_cat_name)?$item_cat_name: '', ['class' => 'form-control ','id'=>'item_cat_name1']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('item_catagories_id') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_name">Item Name</label>
                      {{Form::text('item_name', isset($item_name)?$item_name: '', ['class' => 'form-control form-control ','id'=>'item_name','required', 'placeholder' => '  Name']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('item_name') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="hsn_code">HSN Code</label>
                      {{Form::text('hsn_code', isset($hsn_code)?$hsn_code: '', ['class' => 'form-control form-control ','id'=>'hsn_code','required', 'placeholder' => 'HSN Code  ']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('hsn_code') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     {{-- <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_cgst">CGST</label>
                      {{Form::text('item_cgst', isset($item_cgst)?$item_cgst: 0, ['class' => 'form-control form-control ','id'=>'item_cgst','required', 'placeholder' => 'item_cgst']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('item_cgst') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_sgst">SGST</label>
                      {{Form::text('item_sgst', isset($item_sgst)?$item_sgst: 0, ['class' => 'form-control form-control ','id'=>'item_sgst','required', 'placeholder' => 'item_sgst']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('item_sgst') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_igst">IGST</label>
                      {{Form::text('item_igst', isset($item_igst)?$item_igst: 0, ['class' => 'form-control form-control ','id'=>'item_igst','required', 'placeholder' => 'item_igst']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('item_igst') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_gst">GST</label>
                      {{Form::text('item_gst', isset($item_gst)?$item_gst: 0, ['class' => 'form-control form-control ','id'=>'item_gst','required', 'placeholder' => 'item_gst']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('item_gst') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div> --}}
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="specification">Product Spesification</label>
                      {{Form::text('specification', isset($specification)?$specification: '', ['class' => 'form-control form-control ','id'=>'specification','required', 'placeholder' => '  Specification']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('specification') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="details">Details</label>
                      {{Form::text('details', isset($details)?$details: '', ['class' => 'form-control form-control ','id'=>'details','required', 'placeholder' => 'Details  ']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('details') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                  </div>
                  </div>
                 
                      <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> --}}
                         <button style="display: none" type="submit" class="btn btn-sm btn-primary" name=""> <i class="fa fa-dot-circle-o"></i>Add</button> 
                <button type="reset" class="btn btn-sm btn-danger" name=""> <i class="fa fa-ban"></i> Reset</button> 
                      </div>
                    </div>
                    {{Form::close()}}
                  </div>
                </div>
       

        <div class="col-lg-12" >
{{--           {{ Form::open(['url' => 'krishna/itemName/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
 --}}
          {{ isset($id)?Form::open(['url' => 'krishna/itemName/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'krishna/itemName/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 


          {{ csrf_field() }}
          {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
          <div class="card">
            <div class="card-header text-uppercase">Item Name Details</div>
            <div class="card-body">
                   <div class="row">
                    <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_catagories_id">Item Catagory</label>
                    {{--   {{Form::text('item_catagories_id', isset($item_catagories_id)?$item_catagories_id: '', ['class' => 'form-control form-control ','id'=>'item_catagories_id','required', 'placeholder' => ' Item Catagory']  )}} --}}
                     {{Form::select('item_catagories_id',$CatagoryList,isset($item_catagories_id)?$item_catagories_id: '', ['class' => 'form-control form-control single-select','id'=>'item_catagories_id','placeholder' => 'Item Catagory','required'=>'required'] )}}
                      {{Form::hidden('item_cat_name', isset($item_cat_name)?$item_cat_name: '', ['class' => 'form-control','id'=>'item_cat_name']  )}}

                      <div class="invalid-feedback">
                      {{ $errors->has('item_catagories_id') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_name">Item Name</label>
                      {{Form::text('item_name', isset($item_name)?$item_name: '', ['class' => 'form-control form-control ','id'=>'item_name','required', 'placeholder' => '  Name']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('item_name') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="hsn_code">HSN Code</label>
                      {{Form::text('hsn_code', isset($hsn_code)?$hsn_code: '', ['class' => 'form-control form-control ','id'=>'hsn_code','required', 'placeholder' => 'HSN Code  ']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('hsn_code') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="specification">Product Spesification</label>
                      {{Form::text('specification', isset($specification)?$specification: '', ['class' => 'form-control form-control ','id'=>'specification','required', 'placeholder' => '  Specification']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('specification') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="details">Details</label>
                      {{Form::text('details', isset($details)?$details: '', ['class' => 'form-control form-control ','id'=>'details','required', 'placeholder' => 'Details  ']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('details') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>

                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_cgst">CGST</label>
                      {{Form::text('item_cgst', isset($item_cgst)?$item_cgst: 0, ['class' => 'form-control form-control ','id'=>'item_cgst','required', 'placeholder' => 'item_cgst']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('item_cgst') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_sgst">SGST</label>
                      {{Form::text('item_sgst', isset($item_sgst)?$item_sgst: 0, ['class' => 'form-control form-control ','id'=>'item_sgst','required', 'placeholder' => 'item_sgst']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('item_sgst') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_igst">IGST</label>
                      {{Form::text('item_igst', isset($item_igst)?$item_igst: 0, ['class' => 'form-control form-control ','id'=>'item_igst','required', 'placeholder' => 'item_igst']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('item_igst') ? $errors->first('name', ':message') : '' }}
                      </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-groupp">
                      <label class="form-col-form-label" for="item_gst">GST</label>
                      {{Form::text('item_gst', isset($item_gst)?$item_gst: 0, ['class' => 'form-control form-control ','id'=>'item_gst','required', 'placeholder' => 'item_gst']  )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('item_gst') ? $errors->first('name', ':message') : '' }}
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
              <i class="fa fa-align-justify"></i> Item Name Detail
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered table-sm" >
                <thead>
                  <tr>
                    <th>Item Name Id</th>
                    <th>Item Catagory</th>
                    <th>Item Name</th>
                    <th>HSN Code</th>
                    <th>Product Specification</th>
                    <th>Details</th>
                    <th >Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                @foreach($itemName as $key => $value)
                  <tr>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['item_cat_name'] }}</td>
                    <td>{{ $value['item_name'] }}</td>
                    <td>{{ $value['hsn_code'] }}</td>
                    <td>{{ $value['specification'] }}</td>
                    <td>{{ $value['details'] }}</td>
                    <td>{{ $value['created_at'] }}</td>
                    <td >
                    <a href="{{ url('/')}}/krishna/itemName/add/{{ $value['id'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                    <a href="{{ url('/')}}/krishna/itemName/trash/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
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
  $(document).ready(function()
  {
    $(document).on('change',"#item_catagories_id",function(){
     var item_catagories_id= $(this).find('option:selected').text();
      $('#item_cat_name1').val(item_catagories_id);
      $('[name^=item_cat_name]').val(item_catagories_id);
     // console.log($('#item_cat_name1').val());


    })

$(document).on("click change keyup keypress keydown","[name^=item_igst],[name^=item_cgst],[name^=item_sgst]",function(){
        var product_igst=$("[name^=item_igst]").val();       
        var product_cgst=$("[name^=item_cgst]").val();       
        var product_sgst=$("[name^=item_sgst]").val(); 
        if(!isNaN(product_igst) && !isNaN(product_cgst) && !isNaN(product_sgst))
        {
            var gst=parseFloat(product_igst)+parseFloat(product_cgst)+parseFloat(product_sgst);
            $("[name^=item_gst]").val(gst); 
        }   
     });  

  })
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