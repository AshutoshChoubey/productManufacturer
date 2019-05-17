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
            <h4 class="box-title text-primary ">Please Fill Up Quatation Details</h4>
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
  {{ Form::open(['url' => 'quatation/create','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
          {{ csrf_field() }}
          {{ Form::hidden('measurement_id', isset($measurementId) ? $measurementId :$measurementId, []) }} 
<div class="row">
       <div class="card">
         <div class="card-header">Quatation Detail</div>
         <div class="card-body table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Widows Design</th>
                          <th>window type</th>
                          <th>width(mm)</th>
                          <th>height(mm)</th>
                          <th>Area</th>
                          <th>Unit</th>
                          <th>Total Area</th>
                          <th>Glass</th>
                          <th>Rate/Sqfit</th>
                          <th>Unit Rate(rs.)</th>
                          <th>Total amount</th>
                          <th>Hardware</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="tBody">
                        <tr id="row__1">
                          <td><input type="file" id="windows_design__1" style="width: 90px" name="windows_design[]"></td>
                          <td><input type="text" id="window_type__1" style="width: 100px " name="window_type[]" /></td>
                          <td><input type="text" id="width__1" style="width: 70px" name="width[]"></td>
                          <td><input type="text" id="height__1" style="width: 70px" name="height[]"></td>
                          <td><input type="text" id="area__1" style="width: 70px" name="area[]"></td>
                          <td><input type="text" id="unit__1" style="width: 90px" name="unit[]"></td>
                          <td><input type="text" id="total_area__1" style="width: 100px" name="total_area[]"></td>
                          <td><input type="text" id="glass__1" style="width: 100px" name="glass[]"></td>
                          <td><input type="text" id="rate__1" style="width: 100px" name="rate[]"></td>
                          <td><input type="text" id="unit_rate__1" style="width: 100px" name="unit_rate[]"></td>
                          <td><input type="text" id="total_amount__1" style="width: 100px" name="total_amount[]"></td>
                          <td><input type="text" id="hardware__1" style="width: 100px" name="hardware[]"></td>
                          <td><button type="button" class="addMore" id="1"  ><i class="fa fa-plus"></i></button></td>
                        </tr>
                      </tbody>
                    </table>
                  
           
         </div>
         <div class="card-footer text-center">
           <input type="submit" class="btn btn-primary" value="Save">
         </div>
       </div>
  
</div>
{{ Form::close()  }}
</section>
 <script type="text/javascript">

 $(document).ready(function()
  {
      var i=1;
  
      $('.addMore').on("click",function(){
        i=parseInt(i)+1;
         $("#tBody").append(' <tr id="row__'+i+'">\
                          <td><input type="file" id="windows_design__'+i+'" style="width: 90px" name="windows_design[]"></td>\
                          <td><input type="text" id="window_type__'+i+'" style="width: 100px " name="window_type[]" /></td>\
                          <td><input type="text" id="width__'+i+'" style="width: 70px" name="width[]"></td>\
                          <td><input type="text" id="height__'+i+'" style="width: 70px" name="height[]"></td>\
                          <td><input type="text" id="area__'+i+'" style="width: 70px" name="area[]"></td>\
                          <td><input type="text" id="unit__'+i+'" style="width: 90px" name="unit[]"></td>\
                          <td><input type="text" id="total_area__'+i+'" style="width: 100px" name="total_area[]"></td>\
                          <td><input type="text" id="glass__'+i+'" style="width: 100px" name="glass[]"></td>\
                          <td><input type="text" id="rate__'+i+'" style="width: 100px" name="rate[]"></td>\
                          <td><input type="text" id="unit_rate__'+i+'" style="width: 100px" name="unit_rate[]"></td>\
                          <td><input type="text" id="total_amount__'+i+'" style="width: 100px" name="total_amount[]"></td>\
                          <td><input type="text" id="hardware__'+i+'" style="width: 100px" name="hardware[]"></td>\
                          <td><button type="button" id="'+i+'" class="removeRow" ><i class="fa fa-minus"></i></button></td>\
                        </tr>');
      });
       $(document).on('click', '.removeRow', function(){  
          var button_id = $(this).attr("id");  
          $('#row__'+button_id+'').remove();  
      });  

  })

</script>
@endsection