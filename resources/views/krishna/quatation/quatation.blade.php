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
        <div class="col-lg-12" >
          {{ isset($id)?Form::open(['url' => 'quatation/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'quatation/insert','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
          {{ csrf_field() }}
          {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
          <div class="card">
            <div class="card-header">Quatation</div>
            <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-groupp">
                        <label class="form-col-form-label" for="name">Customer Name</label>
                        {{Form::select('customer_name',$customerSelect, isset($customer_name)?$customer_name: '', ['class' => 'form-control form-control ','id'=>'customer_name','required', 'placeholder' => 'Customer Name']  )}}
                        <div class="invalid-feedback">
                        {{ $errors->has('customer_name') ? $errors->first('name', ':message') : '' }}
                        </div>
                      </div>
                    </div>
          
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-col-form-label" for="contact_no">Contact Number</label>
                        {{Form::number('contact_no',isset($contact_no)?$contact_no: '', ['class' => 'form-control form-control ', 'placeholder' => 'Contact Number'] )}}
                        <div class="invalid-feedback">
                        {{ $errors->has('contact_no') ? $errors->first('contact_no', ':message') : '' }}
                        </div>
                      </div>
                    </div> 
          
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-col-form-label" for="email">Email</label>
                        {{Form::text('email',isset($email)?$email: '', ['class' => 'form-control form-control ', 'placeholder' => 'Email'] )}}
                        <div class="invalid-feedback">
                        {{ $errors->has('email') ? $errors->first('email', ':message') : '' }}
                        </div>
                      </div>
                    </div> 
               
                    <div class="col-md-4">
                      <div class="form-group">
                      <label class="form-col-form-label" for="contact_person">Contact Persons</label>
                        {{Form::text('contact_person',isset($contact_person)?$contact_person: '', ['class' => 'form-control form-control ', 'placeholder' => 'Contact Persons'] )}}
                        <div class="invalid-feedback">
                          {{ $errors->has('contact_person') ? $errors->first('contact_person', ':message') : '' }}
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-col-form-label" for="about">About</label>
                        {{Form::textarea('about',isset($about)?$about: '', ['class' => 'form-control form-control ', 'style'=>'height:75px','placeholder' => 'About'] )}}
                        <div class="invalid-feedback">
                        {{ $errors->has('about') ? $errors->first('about', ':message') : '' }}
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-col-form-label" for="about">Measurement Confirmed By</label>
                        {{Form::text('measurement_onfirmed_by',isset($measurement_onfirmed_by)?$measurement_onfirmed_by: '', ['class' => 'form-control form-control ', 'placeholder' => 'Measurement Confirmed By'] )}}
                        <div class="invalid-feedback">
                        {{ $errors->has('about') ? $errors->first('about', ':message') : '' }}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-col-form-label" for="about">Measurement Taken By</label>
                        {{Form::text('measurement_taken_by',isset($measurement_taken_by)?$measurement_taken_by: '', ['class' => 'form-control form-control ', 'placeholder' => 'Measurement Taken By'] )}}
                        <div class="invalid-feedback">
                        {{ $errors->has('about') ? $errors->first('about', ':message') : '' }}
                        </div>
                      </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-col-form-label" for="about"><small>Measurement Received for Production</small></label>
                        {{Form::text('measurement_received_for_production',isset($measurement_received_for_production)?$measurement_received_for_production: '', ['class' => 'form-control form-control ','placeholder' => 'Measurement Received for Production'] )}}
                        <div class="invalid-feedback">
                        {{ $errors->has('about') ? $errors->first('about', ':message') : '' }}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-col-form-label" for="about">Estimeted Amount</label>
                        {{Form::text('measurement_amount',isset($measurement_amount)?$measurement_amount: '', ['class' => 'form-control form-control ','placeholder' => 'Amount'] )}}
                        <div class="invalid-feedback">
                        {{ $errors->has('about') ? $errors->first('about', ':message') : '' }}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-col-form-label" for="about">Name Of quatation(for measurement)</label>
                        {{Form::text('name_of_qua_for_measu',isset($name_of_qua_for_measu)?$name_of_qua_for_measu: '', ['class' => 'form-control form-control ','placeholder' => 'Name Of quatation(for measurement)'] )}}
                        <div class="invalid-feedback">
                        {{ $errors->has('about') ? $errors->first('about', ':message') : '' }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Drawing</th>
                          <th>window description</th>
                          <th>width(mm)</th>
                          <th>height(mm)</th>
                          <th>Area</th>
                          <th>Quanity</th>
                          <th>Glass</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="tBody">
                        <tr id="row__1">
                          <td><input type="text" id="drawing__1" style="width: 90px" name="drawing[]"></td>
                          <td><textarea id="window_des__1" style="width: 100px " name="window_des[]" ></textarea></td>
                          <td><input type="text" id="width__1" style="width: 70px" name="width[]"></td>
                          <td><input type="text" id="height__1" style="width: 70px" name="height[]"></td>
                          <td><input type="text" id="area__1" style="width: 70px" name="area[]"></td>
                          <td><input type="text" id="quantity__1" style="width: 90px" name="quantity[]"></td>
                          <td><input type="text" id="glass__1" style="width: 100px" name="glass[]"></td>
                          <td><textarea id=drawing_description__1" style="width: 100px " name="drawing_description[]" ></textarea></td>
                          <td><button type="button" class="addMore" id="1"  ><i class="fa fa-plus"></i></button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  </div>
            </div>

            <div class="card-footer">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-sm btn-primary" name=""> <i class="fa fa-dot-circle-o"></i>{{ isset($id) ? 'Update' :'Add' }}</button> 
                    <button type="reset" class="btn btn-sm btn-danger" name=""> <i class="fa fa-ban"></i> Reset</button> 
                  </div>
                </div>                
            </div>

          </div>
          {{Form::close()}}
        </div>
 {{--  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header ">Measurement Details</div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12" class="text-center">
             &nbsp;
            </div>
          </div>
        </div>
      </div>
   </div>
  </div> --}}
</div>
</section>
<script type="text/javascript">
  $(document).ready(function()
  {
      var i=1;
  
      $('.addMore').on("click",function(){
        i=parseInt(i)+1;
         $("#tBody").append(' <tr id="row__'+i+'">\
                          <td><input type="text" id="drawing__'+i+'" style="width: 90px" name="drawing[]"></td>\
                          <td><textarea id="window_des__'+i+'" style="width: 100px " name="window_des[]" ></textarea> </td>\
                          <td><input type="text" id="width__'+i+'" style="width: 70px" name="width[]"></td>\
                          <td><input type="text" id="height__'+i+'" style="width: 70px" name="height[]"></td>\
                          <td><input type="text" id="area__'+i+'" style="width: 70px" name="area[]"></td>\
                          <td><input type="text" id="quantity__'+i+'" style="width: 90px" name="quantity[]"></td>\
                          <td><input type="text" id="glass__'+i+'" style="width: 100px" name="glass[]"></td>\
                          <td><textarea id=drawing_description__1" style="width: 100px " name="drawing_description[]" ></textarea></td>\
                          <td><button type="button" id="'+i+'" class="removeRow" ><i class="fa fa-minus"></i></button></td>\
                        </tr>');
      });
       $(document).on('click', '.removeRow', function(){  
          var button_id = $(this).attr("id");  
          $('#row__'+button_id+'').remove();  
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