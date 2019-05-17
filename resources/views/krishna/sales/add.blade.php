
@extends('mainWithLessCss')  
@section('content')

<script src="{{ asset('asset/plugins/alerts-boxes/js/sweetalert.min.js') }}"></script>
<link href="{{ asset('/asset/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('/asset/plugins/select2/js/select2.min.js') }}"></script>
<link href="{{ asset('/asset/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('/asset/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <!--inputtags-->
<section class="content" style="margin-left: 20px;margin-right: 20px;">
   {{ isset($id)?Form::open(['url' => 'krishna/sales/update','files' => 'true' ,'id'=>'formId','enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'krishna/sales/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'id'=>'formId','autocomplete' => 'OFF']) }} 
   {{ csrf_field() }}
   {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
 @if(session()->has('message.level') || $errors->any() ) 
   <div class="row">
      <!-- left column -->
      <div class="col-md-12 col-sm-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <!-- /.box-header -->
          <!-- form start -->
          <div class="card-body">
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
    @endif

<div class="card">
  <div class="card-header text-center">Sales Details</div>
  <div class="card-body">
    <div class="row">
      @if(!isset($id))
        <div class="col-md-3">
          <div class="form-group">
          <label class="form-col-form-label" for="customer_id">Select Customer</label>
          {{Form::select('customer_id',$customerSelect,isset($customer_id)?$customer_id: '', ['class' => 'form-control form-control single-select', 'placeholder' => 'Customer Id'] )}}
          {{--  {{Form::text('customer_name',isset($customer_name)?$customer_name: '', ['class' => 'form-control form-control ', 'placeholder' => 'Customer Name','style'=>'display:none'] )}} --}}
          {{-- {{Form::select('customer_name',$customer ,isset($customer_name)?$customer_name: '', ['class' => 'form-control form-control ','id'=>'customer_name','required', 'placeholder' => '  customer Name'] )}} --}}
          <div class="invalid-feedback">
          {{ $errors->has('customer_id') ? $errors->first('customer_id', ':message') : '' }}
          </div>
          </div>
         
        </div>
        @endif
           <!-- <div class="col-md-3">
             <div class="form-group">
                <label class="form-col-form-label" for="customer_id">Customer Name</label>
                {{Form::text('customer_name',isset($customer_name)?$customer_name: '', ['class' => 'form-control form-control ', 'placeholder' => 'Customer Name','required'=>'required'] )}}
                {{-- {{Form::select('customer_name',$customer ,isset($customer_name)?$customer_name: '', ['class' => 'form-control form-control ','id'=>'customer_name','required', 'placeholder' => '  customer Name'] )}} --}}
                <div class="invalid-feedback">
                {{ $errors->has('customer_name') ? $errors->first('customer_name', ':message') : '' }}
                </div>
              </div>
          </div> -->

        <div class="col-md-3">
          <div class="form-group">
          <label class="form-col-form-label" for="customer_contact_no">Customer Mobile Number</label>
          {{Form::text('customer_contact_no',isset($customer_contact_no)?$customer_contact_no: '', ['class' => 'form-control form-control ', 'placeholder' => 'Customerr Mobile Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('customer_contact_no') ? $errors->first('customer_contact_no', ':message') : '' }}
          </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
          <label class="form-col-form-label" for="customer_address ">Customer Address</label>
          {{Form::textarea('customer_address',isset($customer_address )?$customer_address  : '', ['class' => 'form-control form-control ', 'placeholder' => 'Customer Address','style'=>'height:55px'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('customer_address  ') ? $errors->first('customer_address  ', ':message') : '' }}
          </div>
          </div>
        </div>       
      </div> 
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
          <label class="form-col-form-label" for="customer_email">Customer Email </label>
          {{Form::text('customer_email',isset($customer_email)?$customer_email: '', ['class' => 'form-control form-control ', 'placeholder' => 'Customer Email'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('customer_email') ? $errors->first('customer_email', ':message') : '' }}
          </div>
          </div>
        </div>
        @if(!isset($id))
       <!--  <div class="col-md-3">
          <div class="form-group">
          <label class="form-col-form-label" for="customer_alt_number">Customer Alt. Mobile Number </label>
          {{Form::text('customer_alt_number',isset($customer_alt_number)?$customer_alt_number: '', ['class' => 'form-control form-control ', 'placeholder' => 'Customer Alt. Mobile Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('customer_email') ? $errors->first('customer_email', ':message') : '' }}
          </div>
          </div>
        </div> -->

        <div class="col-md-3">
          <div class="form-group">
          <label class="form-col-form-label" for="gst">Customer GSTIN </label>
          {{Form::text('gst',isset($gst)?$gst: '', ['class' => 'form-control form-control ', 'placeholder' => 'Customer Email'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('gst') ? $errors->first('gst', ':message') : '' }}
          </div>
          </div>
        </div>
            @endif
       {{--  <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="sale_invoice_no">Sale Invoice Number</label>
          {{Form::text('sale_invoice_no',isset($sale_invoice_no)?$sale_invoice_no: '', ['class' => 'form-control form-control ', 'placeholder' => 'Sale Invoice Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('sale_invoice_no') ? $errors->first('sale_invoice_no', ':message') : '' }}
          </div>
          </div>
        </div> --}}
       {{--  <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="sale_invoice_date ">Sale Invoice Date</label>
          {{Form::text('sale_invoice_date',isset($sale_invoice_date  )?$sale_invoice_date  : '', ['class' => 'form-control form-control ','id'=>'purchase_invoice_date', 'placeholder' => 'Sale Invoice Date'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('sale_invoice_date  ') ? $errors->first('sale_invoice_date  ', ':message') : '' }}
          </div>
          </div>
        </div>   --}}     
     {{--  </div>
      <div class="row">        --}}
         {{-- <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="sale_invoice_amount">Sale Invoice Amount</label>
          {{Form::number('sale_invoice_amount',isset($sale_invoice_amount)?$sale_invoice_amount: '', ['class' => 'form-control form-control ', 'placeholder' => 'Sale Invoice Amount','step'=>'any'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('sale_invoice_amount') ? $errors->first('sale_invoice_amount', ':message') : '' }}
          </div>
          </div>
        </div>  --}}
        <div class="col-md-3">
          <div class="form-group">
          <label class="form-col-form-label" for="payment_type">Payment Type</label>
          {{Form::select('payment_type',['1'=>'By Cash','2'=>'By Internate Banking','3'=>'By Cheque'],isset($payment_type)?$payment_type: '', ['class' => 'form-control form-control ', 'placeholder' => 'Payment Type'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('payment_type') ? $errors->first('payment_type', ':message') : '' }}
          </div>
          </div>
        </div> 
         <div class="col-md-3">
          <div class="form-group">
          <label class="form-col-form-label" for="sale_description">Sale Discription/Notes</label>
          {{Form::textarea('sale_description',isset($sale_description)?$sale_description: '', ['class' => 'form-control form-control ', 'placeholder' => 'Sale Discription','style'=>'height:55px'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('sale_description') ? $errors->first('sale_description', ':message') : '' }}
          </div>
          </div>
        </div>        
      </div> 
    
  </div>
   <div class="card-footer"></div>
</div>
      <hr/>
      <div class="row">   
        <div class="col-sm-12">  
          <div class="card">
            <div class="card-header">
            <h5 >
                  Please fill up the Sales details
            </h5> 
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="addmoretable" class="table table-bordered">
                  <tbody id="tBody">
                    <tr id="addRow__0">                     
                      <td>
                        <div class="form-groupp">
                          <label for="item_catagory">Item Category</label>                         
                       {{Form::select('item_catagory[]',$itemCatagorySelect,isset($item_catagory)?$item_catagory: '', ['class' => 'form-control input-sm ','id'=>'item_catagory__0', 'placeholder' => 'Item Category','style'=>'width:150px','required'=>'required'] )}}
                        </div>
                         <div class="form-groupp">
                          <label for="item_name">Item Name</label>
                             {{Form::select('item_name[]',$itemNameSelect,isset($item_name)?$item_name: '', ['class' => 'form-control input-sm ','id'=>'item_name__0', 'placeholder' => 'Item Name','style'=>'width:150px','required'=>'required'] )}}                                          
                        </div>
                      </td>
                      
                       <td>
                        <div class="form-groupp">
                          <label for="quantity">Product Quantity </label>
                           {{Form::text('quantity[]',isset($quantity)?$quantity: '', ['class' => 'form-control input-sm ','id'=>'quantity__0', 'placeholder' => 'Product Quantity','style'=>'width:150px','required'=>'required','step'=>'any'] )}}
                        </div>
                        <div class="form-groupp">
                          <label for="hsn">Product HSN</label>
                           {{Form::text('hsn[]',isset($hsn)?$hsn: '', ['class' => 'form-control input-sm ','id'=>'hsn__0', 'placeholder' => 'Product HSN','style'=>'width:150px','readonly','required'=>'required','step'=>'any'] )}}
                        </div>
                      </td>
                       <td>
                         <div class="form-groupp">
                          <label for="gst">Product GST</label>
                           {{Form::text('gst[]',isset($gst)?$gst: '', ['class' => 'form-control input-sm ','id'=>'gst__0', 'placeholder' => 'Product CGST','style'=>'width:150px','readonly','required'=>'required','step'=>'any'] )}}
                        </div>
                        <div class="form-groupp">
                          <label for="price">Price</label>
                          {{Form::text('price[]',isset($price)?$price: '', ['class' => 'form-control input-sm ','id'=>'price__0', 'placeholder' => 'price','style'=>'width:150px','required'=>'required','step'=>'any'] )}}
                        </div>
                      </td>
                      <td>
                        
                        <div class="form-groupp">
                          <label for="total_tax">Total Tax</label>
                          {{Form::text('total_tax[]',isset($total_tax)?$total_tax: '', ['class' => 'form-control input-sm ','id'=>'total_tax__0', 'placeholder' => 'Total Tax','readonly','style'=>'width:150px','required'=>'required','step'=>'any'] )}}
                        </div>
                     
                         
                        <div class="form-groupp">
                          <label for="total_amount">Total Amount</label>
                          {{Form::text('total_amount[]',isset($total_amount)?$total_amount: '', ['class' => 'form-control input-sm ','id'=>'total_amount__0', 'placeholder' => 'Total Amount','readonly','style'=>'width:150px','required'=>'required','step'=>'any'] )}}
                        </div>
                      </td>

                        @php
                        if(!isset($id))
                        {
                          echo "<td class=\"align-middle\">";
                          echo "<div class=\"align-middle\">";
                          echo '<a href="javascript:void(0)"  class="addMore btn btn-primary btn-sm"><i class="fa fa-plus fa5"></i></a>';
                           echo "</div>";
                          echo "</td>";
                        }
                      
                      @endphp
                     
                    </tr>
                  </tbody>
                  <tfoot >                    
                    <tr> 
                      <td class="small font-italic text-info text-capitalize"></td>
                      <td>Total Purchase Amount</td>
                      <td><input type="number" step="any" required  class="form-control form-control-rounded" name="total_purchase_amount"></td>
                     {{--  <td><button type="button" id="getTotalPurchaseAmount"  class="btn-sm btn-secondary">Get</button></td> --}}
                      <!-- <td>Purchase Paid Amount</td>
                      <td><input type="number" step="any" required="required" class="form-control form-control-rounded" name="purchase_due_amount"></td> -->
                    </tr>
                  </tfoot>
                </table>
               </div> 
            </div>
            <div class="card-footer">
              <div class="text-center">
                <button   type="submit"  class="btn btn-primary">{{ isset($id)?'update':'Add' }}</button>
                {{-- <input   type="submit"  class="btn btn-primary" value="{{ isset($id)?'update':'Add' }}" /> --}}
              </div>               
            </div>
          </div>
        </div>
      </div>
   

  <!--/.col (left) -->
  
{{Form::close()}}
      <!-- /.row -->
</section>

<script type = "text/javascript" language = "javascript">

    $(document).ready(function() {



      $(document).on("click","#submitBtn",function(){
  var frm = $('#formId');
//console.log(frm.attr('action'));
//console.log("hiiii1111");
     $('form#formId').submit(function (e) {
          console.log("hiiii13333");
           e.preventDefault();
            $.ajax({
                type: frm.attr('method'),
                url:  frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                  console.log("data");
                  if(data==1)
                  {
                    swal("Good job!", "Product is Successfully Added You Can Check in Product Search Section", "success");
                  }
                  else
                  {
                    swal("Somthing Wrong!", "OOHooooo!!!!!", "error");
                  }
                },
                error: function (data) {
                  swal("Somthing Wrong!", "OOHooooooooooo!!!!", "error");
                },
           });
        });
});


      var Total=0;
      var i=0;
      $('.addMore').on("click",function(){
        i=parseInt(i)+1;
         $("#tBody").append('');
      });
       $(document).on('click', '.removeRow', function(){  
          var button_id = $(this).attr("id");  
          $('#AddRow'+button_id+'').remove();  
      }); 
        $(document).on('change keyup keydown', '.qtn', function(){  
           var thisSelf=$(this);
           var gst=thisSelf.parent().parent().find('[name^=gst]').val();
            var unit_price=thisSelf.parent().parent().find('[name^=unit_price]').val();
           gst =parseInt(gst);
           unit_price=parseInt(unit_price);
           taxvValue=(unit_price*gst)/100;
           priceWithTax=unit_price+taxvValue;
           totalPrice=priceWithTax*thisSelf.val();
           if(isNaN(totalPrice))
           {
            console.log("Please Insert valid Quantity");
           }
           else
           {
            thisSelf.parent().parent().find('[name^=total_amount]').val(totalPrice);
           }           

      }); 
         
  });

    $(document).ready(function() {
      $(document).on("change","[name^=customer_id]",function(){
      var thisSelf=$(this);
      var customerId = $(this).val();
      $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getCustomerDetailById",
        data:{
          "_token": "{{ csrf_token() }}",
          customerId : customerId,
        },
        dataType : 'html',
        cache: false,
        success: function(data){
          responseData=JSON.parse(data);
            $('[name^=contact_no]').val(responseData.contact_no);
            $('[name^=email]').val(responseData.email);
            $('[name^=address]').val(responseData.address);
            $('[name^=gstin]').val(responseData.gstin);   
            $('[name^=customer_name]').val(responseData.customer_name);         
        }
      });
     }); 

    // $(document).on("change","[name^=product_type]",function(){
    //   var thisSelf=$(this);
    //   var product_type = $(this).val();
    //   $.ajax({
    //     type:"POST",
    //     url: "{{url('/')}}/ajax/getBrandByProductType",
    //     data:{
    //       "_token": "{{ csrf_token() }}",
    //       product_type : product_type,
    //     },
    //     dataType : 'html',
    //     cache: false,
    //     success: function(data){
    //        thisSelf.parent().parent().find('[name^=product_brand]').removeAttr('readonly');
    //       // $('#product_brand__'+idIndex[1])
    //       responseData=JSON.parse(data);
    //         thisSelf.parent().parent().find('[name^=product_brand]')
    //            .empty()
    //            .append('<option selected="selected" value="">-Select -</option>');
    //            for (index = 0; index < responseData.length; ++index) {
    //            thisSelf.parent().parent().find('[name^=product_brand]').append(
    //             '<option value="'+responseData[index]['id']+'">'+responseData[index]['brand_name']+'</option>'
    //           );   
    //         }      
    //     }
    //   });
    //  }); 

    // $(document).on("change","[name^=product_brand]",function(){
    //     var thisSelf=$(this);
    //     var product_brand = $(this).val();
    //     var productBrandId = $(this).attr('id');
    //     var idIndex=productBrandId.split('__');
    //     var product_type= thisSelf.parent().parent().parent().find('[name^=product_type]').val();
    //   $.ajax({
    //     type:"POST",
    //     url: "{{url('/')}}/ajax/getModelByBrand",
    //     data:{
    //       "_token": "{{ csrf_token() }}",
    //       product_brand : product_brand,
    //       product_type : product_type
    //     },
    //     dataType : 'html',
    //     cache: false,
    //     success: function(data){
    //        // thisSelf.parent().parent().find('[name^=product_brand]').removeAttr('readonly');
    //       $('#product_model__'+idIndex[1]).removeAttr('readonly');
    //       responseData=JSON.parse(data);
    //          $('#product_model__'+idIndex[1])
    //            .empty()
    //            .append('<option selected="selected" value="">-Select -</option>');
    //            for (index = 0; index < responseData.length; ++index) {
    //             $('#product_model__'+idIndex[1]).append(
    //             '<option value="'+responseData[index]['id']+'">'+responseData[index]['model_name']+'</option>'
    //           );   
    //         }      
    //     }
    //   });
    //  }); 

    // $(document).on("change","[name^=product_model]",function(){
    //   var thisSelf=$(this);
    //   var product_model = $(this).val();
    //   var productBrandId = $(this).attr('id');
    //   var idIndex=productBrandId.split('__');
    //   var product_type=thisSelf.parent().parent().parent().find('[name^=product_type]').val();
    //   var product_brand=$('#product_brand__'+idIndex[1]).val();
      
    //   $.ajax({
    //     type:"POST",
    //     url: "{{url('/')}}/ajax/getColorByBrandModelType",
    //     data:{
    //       "_token": "{{ csrf_token() }}",
    //       product_brand : product_brand,
    //       product_type : product_type,
    //       product_model : product_model
    //     },
    //     dataType : 'html',
    //     cache: false,
    //     success: function(data){
    //       $('#product_color__'+idIndex[1]).removeAttr('readonly');
    //       responseData=JSON.parse(data);
    //          $('#product_color__'+idIndex[1])
    //            .empty()
    //            .append('<option selected="selected" value="">-Select -</option>');
    //            for (index = 0; index < responseData.length; ++index) {
    //             $('#product_color__'+idIndex[1]).append(
    //             '<option value="'+responseData[index]['id']+'">'+responseData[index]['color_name']+'</option>'
    //           );   
    //         }      
    //     }
    //   });
    //  }); 

    // $(document).on("change","[name^=product_color]",function(){
    //   var thisSelf=$(this);
    //   var product_color = $(this).val();
    //   var productColorId = $(this).attr('id');
    //   var idIndex=productColorId.split('__');
    //   var product_type=thisSelf.parent().parent().parent().find('[name^=product_type]').val();
    //   var product_brand=$('#product_brand__'+idIndex[1]).val();
    //   var product_model=$('#product_model__'+idIndex[1]).val();

    //   $.ajax({
    //     type:"POST",
    //     url: "{{url('/')}}/ajax/getNameByBrandModelTypeColor",
    //     data:{
    //       "_token": "{{ csrf_token() }}",
    //       product_brand : product_brand,
    //       product_type : product_type,
    //       product_model : product_model,
    //       product_color : product_color
    //     },
    //     dataType : 'html',
    //     cache: false,
    //     success: function(data){
    //       // console.log("Go");
    //        // thisSelf.parent().parent().find('[name^=product_brand]').removeAttr('readonly');
    //       $('#product_name__'+idIndex[1]).removeAttr('readonly');
    //       responseData=JSON.parse(data);
    //          $('#product_name__'+idIndex[1])
    //            .empty()
    //            .append('<option selected="selected" value="">-Select -</option>');
    //            for (index = 0; index < responseData.length; ++index) {
    //             $('#product_name__'+idIndex[1]).append(
    //             '<option value="'+responseData[index]['id']+'">'+responseData[index]['product_name']+'</option>'
    //           );   
    //         }      
    //     }
    //   });
    //  }); 

    // $(document).on("change","[name^=product_name]",function(){
    //   var thisSelf=$(this);
    //   var product_id = $(this).val();
    //   var productNameId = $(this).attr('id');
    //   var idIndex=productNameId.split('__');

    //   $.ajax({
    //     type:"POST",
    //     url: "{{url('/')}}/ajax/getProduct",
    //     data:{
    //       "_token": "{{ csrf_token() }}",
    //       product_id : product_id,
    //     },
    //     dataType : 'html',
    //     cache: false,
    //     success: function(data){


    //             var   ProductDetail=JSON.parse(data);
    //             var   product_cgst=ProductDetail[0].product_cgst;
    //             var   product_code=ProductDetail[0].product_code;
    //             var   product_discription=ProductDetail[0].product_discription;
    //             var   product_price=ProductDetail[0].product_price;
    //             var   product_price_without_gst=ProductDetail[0].product_price_without_gst;
    //             var   product_salling_price=ProductDetail[0].product_salling_price;
    //             var   product_hsn=ProductDetail[0].product_hsn;
    //             var   product_unit=ProductDetail[0].product_unit;
    //             var   product_sgst=ProductDetail[0].product_sgst;
    //             var   product_igst=ProductDetail[0].product_igst;
    //             var   product_gst=ProductDetail[0].product_gst;
    //             var   product_sgst=ProductDetail[0].product_sgst;
    //             // var   product_salling_price_withgst=ProductDetail[0].product_salling_price_withgst;
    //             if(product_gst==null)
    //             {
    //               product_gst=0;
    //             }
  
    //             $('#product_code__'+idIndex[1]).val(product_code);
    //             $('#product_discription__'+idIndex[1]).val(product_discription);
    //             $('#product_unit__'+idIndex[1]).val(product_unit);
    //             $('#product_hsn__'+idIndex[1]).val(product_hsn);
    //             $('#product_price_withgst__'+idIndex[1]).val(product_price);
    //             $('#product_price_withoutgst__'+idIndex[1]).val(product_price_without_gst);
    //             $('#product_igst__'+idIndex[1]).val(product_igst);
    //             $('#product_cgst__'+idIndex[1]).val(product_cgst);
    //             $('#product_sgst__'+idIndex[1]).val(product_sgst);
    //             $('#product_gst__'+idIndex[1]).val(product_gst);
    //             $('#product_salling_price__'+idIndex[1]).val(product_salling_price);

    //             // var product_salling_price_withgst = product_salling_price+(product_salling_price*18)/100;
    //             // alert(product_salling_price_withgst);
    //             // $('#product_salling_price_withgst__'+idIndex[1]).val(product_salling_price_withgst);
    //             $('#product_code__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_discription__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_unit__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_hsn__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_price_withgst__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_price_withoutgst__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_igst__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_cgst__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_sgst__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_gst__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_salling_price__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_quantity__'+idIndex[1]).removeAttr('readonly');
    //             $('#product_total_amount__'+idIndex[1]).removeAttr('readonly');
    //          //   $('[name^=product_total_amount]').removeAttr('readonly');
      
    //         }      
    //     })
    //   });
    // $(document).on("change click keyup keypress keydown","[name^=product_quantity]",function(){
    //   var thisSelf=$(this);
    //   var product_quantity = $(this).val();
    //   var productQuantityId = $(this).attr('id');
    //   var idIndex=productQuantityId.split('__'); 
    //   var product_igst = $('#product_igst__'+idIndex[1]).val();
    //   var product_cgst = $('#product_cgst__'+idIndex[1]).val();
    //   var product_sgst = $('#product_sgst__'+idIndex[1]).val();
    //   var product_gst = $('#product_gst__'+idIndex[1]).val();
    //   var quantity = $('#product_quantity__'+idIndex[1]).val();
    //    var product_price_withoutgst = $('#product_salling_price__'+idIndex[1]).val();
    //   var totalPrice =(parseFloat(product_price_withoutgst)+(parseFloat(product_price_withoutgst)*parseFloat(product_gst))/100)* parseFloat(quantity);
    //   if(!isNaN(totalPrice))
    //   {
    //      $('#product_total_amount__'+idIndex[1]).val(totalPrice);
    //   }  
    
    // });
    // $(document).on("change click keyup keypress keydown","[id^=getTotalPurchaseAmount]",function(){
    //  //  var Total=[];
    //  //  var totalPurhaseAmount= $("[name^=product_total_amount]");
    //  //  totalPurhaseAmount.forEachach();
    //  // Total.push(totalPurhaseAmount)
    //  var Total=0;
    //  var values = $("input[name='product_total_amount[]']")
    //           .map(function(){
    //             if(!isNaN(parseFloat($(this).val())))
    //             {
    //               Total+=parseFloat($(this).val());
    //             }
    //             return parseFloat($(this).val());

    //           }).get();
            
    //           console.log(Total);
    //   if(!isNaN(Total))
    //   {
    //      $('[name=total_purchase_amount]').val(Total);
    //   }  
    
    // });
    // setInterval(function(){
    //   var Total=0;
    //  $("[name^='product_total_amount']")
    //           .map(function(){
    //             if(!isNaN(parseFloat($(this).val())))
    //             {
    //               Total+=parseFloat($(this).val());
    //             }
    //             return parseFloat($(this).val());

    //           }).get();
    //           if(!isNaN(Total))
    //           {
    //              $('[name=total_sale_amount]').val(Total);
    //           } 

    // },1000)
    
    var i=0;
    @php 
          $i=0;
        @endphp
      $('.addMore').on("click",function(){
        i=parseInt(i)+1;
        @php 
          $i=$i+1;
        @endphp
         $("#tBody").append('<tr id="addRow__'+i+'"><td><div class="form-group">\
  <label for="item_catagory">Item Category</label>\
  {{Form::select("item_catagory[]",$itemCatagorySelect,isset($item_catagory)?$item_catagory: '', ["class" => "form-control input-sm","id"=>"item_catagory__0", "placeholder" => "Item Category","style"=>"width:150px","required"=>"required"] )}}\
  </div>\
  <div class="form-group">\
  <label for="item_name">Item Name</label>\
  <select id="item_name__'+i+'" placeholder="Item Name" required="" class="form-control input-sm" style="width:150px" name="item_name[]" ></select>\
  </div>\
</td>\
<td>\
  <div class="form-group">\
  <label for="quantity">Product Quantity </label>\
  <input type="number" name="quantity[]" class="form-control input-sm" id="quantity__'+i+'" placeholder="Product Quantity" style="width:150px" required="" step="any"/>\
  </div>\
  <div class="form-group">\
  <label for="hsn">Product HSN</label>\
   <input type="text" name="hsn[]" class="form-control input-sm" id="hsn__'+i+'" readonly placeholder="Product HSN" style="width:150px" required="" step="any"/>\
  </div>\
</td>\
<td>\
  <div class="form-group">\
  <label for="gst">Product GST</label>\
   <input type="number" name="gst[]" class="form-control input-sm" id="gst__'+i+'" readonly placeholder="Product GST" style="width:150px" required="" step="any"/>\
  </div>\
  <div class="form-group">\
  <label for="price">Price</label>\
   <input type="number" name="price[]" class="form-control input-sm" id="price__'+i+'" placeholder="Price" style="width:150px" required="" step="any"/>\
  </div>\
</td>\
<td>\
  <div class="form-group">\
  <label for="total_tax">Total Tax</label>\
   <input type="number" name="total_tax[]" class="form-control input-sm"  readonly="readonly" id="total_tax__'+i+'" placeholder="Total Tax" style="width:150px" required="" step="any"/>\
  </div>\
  <div class="form-group">\
  <label for="total_amount">Total Amount</label>\
  <input type="number" name="total_amount[]" class="form-control input-sm" readonly="readonly" id="total_amount__'+i+'" placeholder="Total Amount" style="width:150px" required="" step="any"/>\
  </div>\
</td>\
                       <td class="align-middle">\
                    <a href="javascript:void(0)" id="'+i+'"  class="removeRow btn btn-danger btn-sm"><i class="fa fa-minus "></i></a>\
                    </td>\
                      </tr>');
      });
       $(document).on('click', '.removeRow', function(){  
          var button_id = $(this).attr("id");  
          $('#addRow__'+button_id+'').remove();  
      });  

      $('#purchase_invoice_date').datepicker({
        autoclose: true,
        todayHighlight: true
      });
       $('.single-select').select2();
       });


  $(document).on("change","[name^=item_catagory]",function(){

    var thisSelf=$(this);
      var item_catagory = $(this).val();
       $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getItemCatagory",
        data:{
          "_token": "{{ csrf_token() }}",
          item_catagory : item_catagory,
        },
        dataType : 'html',
        cache: false,
        success: function(data){
           thisSelf.parent().parent().find('[name^=item_catagory]').removeAttr('readonly');
          // $('#product_brand__'+idIndex[1])
          responseData=JSON.parse(data);
            thisSelf.parent().parent().find('[name^=item_name]')
               .empty()
               .append('<option selected="selected" value="">-Select -</option>');
               for (index = 0; index < responseData.length; ++index) {
               thisSelf.parent().parent().find('[name^=item_name]').append(
                '<option value="'+responseData[index]['id']+'">'+responseData[index]['item_name']+'</option>'
              );   
            }      
        }
      });

  });
  $(document).on("change","[name^=item_name]",function(){

    var thisSelf=$(this);
     var getId = $(this).attr('id');
        var idIndex=getId.split('__');
      var item_name = $(this).val();
       $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getItemNameByCategory",
        data:{
          "_token": "{{ csrf_token() }}",
          item_name : item_name,
        },
        dataType : 'html',
        cache: false,
        success: function(data){
          responseData=JSON.parse(data);
          $('#hsn__'+idIndex[1]).val(responseData[0]['hsn_code']);
          $('#gst__'+idIndex[1]).val(responseData[0]['item_gst']);  
        }
      });

  })

  $(document).on("change keydown keyup","[name^=quantity]",function(){

    var thisSelf=$(this);
     var getId = $(this).attr('id');
        var idIndex=getId.split('__');
      var quantity = $(this).val();
       var gst = $('#gst__'+idIndex[1]).val();
        var price = $('#price__'+idIndex[1]).val();
        var quantity=parseFloat(quantity);
        var gst=parseFloat(gst);
        var price=parseFloat(price);
        $('#total_tax__'+idIndex[1]).val((price*gst/100)*quantity);
          $('#total_amount__'+idIndex[1]).val(((price)+((price*gst/100)))*quantity);
       
  })
  $(document).on("change keydown keyup","[name^=price]",function(){
    var thisSelf=$(this);
     var getId = $(this).attr('id');
        var idIndex=getId.split('__');
      var quantity = $('#quantity__'+idIndex[1]).val();
       var gst = $('#gst__'+idIndex[1]).val();
        var price = $('#price__'+idIndex[1]).val();
        var quantity=parseFloat(quantity);
        var gst=parseFloat(gst);
        var price=parseFloat(price);
        $('#total_tax__'+idIndex[1]).val((price*gst/100)*quantity);
          $('#total_amount__'+idIndex[1]).val(((price)+((price*gst/100)))*quantity);
       
  })
  setInterval(function(){
      var Total=0;
     $("[name^='total_amount']")
              .map(function(){
                if(!isNaN(parseFloat($(this).val())))
                {
                  Total+=parseFloat($(this).val());
                }
                return parseFloat($(this).val());

              }).get();
              if(!isNaN(Total))
              {
                 $('[name=total_purchase_amount]').val(Total);
              } 

    },1000)

</script>


@endsection