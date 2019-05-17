
@extends('mainWithLessCss')  
@section('content')

<script src="{{ asset('asset/plugins/alerts-boxes/js/sweetalert.min.js') }}"></script>
<link href="{{ asset('/asset/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('/asset/plugins/select2/js/select2.min.js') }}"></script>
<link href="{{ asset('/asset/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('/asset/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <!--inputtags-->
<section class="content" style="margin-left: 20px;margin-right: 20px;">
   {{ isset($id)?Form::open(['url' => 'krishna/purchase/update','files' => 'true' ,'id'=>'formId','enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'krishna/purchase/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'id'=>'formId','autocomplete' => 'OFF']) }} 
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
  <div class="card-header text-center">Purchase Detail</div>
  <div class="card-body">
    <div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="supplier_id">Supplier Name </label>
          {{Form::select('supplier_id',$supplierSelect,isset($supplier_id)?$supplier_id: '', ['class' => 'form-control form-control single-select', 'placeholder' => 'Supplier Name','required'=>'required'] )}}
           {{Form::text('supplier_name',isset($supplier_name)?$supplier_name: '', ['class' => 'form-control form-control ', 'placeholder' => 'Supplier Name','style'=>'display:none'] )}}
          {{-- {{Form::select('supplier_name',$supplier ,isset($supplier_name)?$supplier_name: '', ['class' => 'form-control form-control ','id'=>'supplier_name','required', 'placeholder' => '  Supplier Name'] )}} --}}
          <div class="invalid-feedback">
          {{ $errors->has('supplier_id') ? $errors->first('supplier_id', ':message') : '' }}
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="supplier_contact_no">Supplier Mobile Number</label>
          {{Form::text('supplier_contact_no',isset($supplier_contact_no)?$supplier_contact_no: '', ['class' => 'form-control form-control ', 'placeholder' => 'Supplier Mobile Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('supplier_contact_no') ? $errors->first('supplier_contact_no', ':message') : '' }}
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="supplier_address ">Supplier Address</label>
          {{Form::textarea('supplier_address',isset($supplier_address )?$supplier_address  : '', ['class' => 'form-control form-control ', 'placeholder' => 'Supplier Address','style'=>'height:55px'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('supplier_address  ') ? $errors->first('supplier_address  ', ':message') : '' }}
          </div>
          </div>
        </div>       
      </div> 
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="supplier_email">Supplier Email </label>
          {{Form::text('supplier_email',isset($supplier_email)?$supplier_email: '', ['class' => 'form-control form-control ', 'placeholder' => 'Supplier Email'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('supplier_email') ? $errors->first('supplier_email', ':message') : '' }}
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="purchase_invoice_no">Purchase Invoice Number</label>
          {{Form::text('purchase_invoice_no',isset($purchase_invoice_no)?$purchase_invoice_no: '', ['class' => 'form-control form-control ', 'placeholder' => 'Purchase Invoice Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('purchase_invoice_no') ? $errors->first('purchase_invoice_no', ':message') : '' }}
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="purchase_invoice_date ">Purchase Invoice Date</label>
          {{Form::text('purchase_invoice_date',isset($purchase_invoice_date  )?$purchase_invoice_date  : '', ['class' => 'form-control form-control ','id'=>'purchase_invoice_date', 'placeholder' => 'Purchase Invoice Date'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('purchase_invoice_date  ') ? $errors->first('purchase_invoice_date  ', ':message') : '' }}
          </div>
          </div>
        </div>       
      </div>
      <div class="row">       
         <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="gstin">GSTIN</label>
          {{Form::text('gstin',isset($gstin)?$gstin: '', ['class' => 'form-control form-control ', 'placeholder' => 'GSTIN','step'=>'any'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('gstin') ? $errors->first('gstin', ':message') : '' }}
          </div>
          </div>
        </div> 
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="payment_type">Payment Type</label>
          {{Form::select('payment_type',['1'=>'By Cash','2'=>'By Internate Banking','3'=>'By Cheque'],isset($payment_type)?$payment_type: '', ['class' => 'form-control form-control ', 'placeholder' => 'Payment Type'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('payment_type') ? $errors->first('payment_type', ':message') : '' }}
          </div>
          </div>
        </div> 
         <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="purchase_discription">Purchase Discription/Notes</label>
          {{Form::textarea('purchase_discription',isset($purchase_discription)?$purchase_discription: '', ['class' => 'form-control form-control ', 'placeholder' => 'Purchase Discription','style'=>'height:55px'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('purchase_discription') ? $errors->first('purchase_discription', ':message') : '' }}
          </div>
          </div>
        </div>        
      </div> 
    
    <div class="row">       
         <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="purchase_invoice_amount">Purchase Invoice Amount</label>
          {{Form::text('purchase_invoice_amount',isset($purchase_invoice_amount)?$purchase_invoice_amount: '', ['class' => 'form-control form-control ', 'placeholder' => 'purchase_invoice_amount','step'=>'any'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('purchase_invoice_amount') ? $errors->first('purchase_invoice_amount', ':message') : '' }}
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
                  Please fill up the Purchase details
            </h5> 
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="addmoretable" class="table table-bordered">
                  <tbody id="tBody">
                    <tr id="addRow__0">                     
                      <td>
                        <div class="form-groupp">
                          {{-- <label for="item_catagory">Item Category</label>                          --}}
                       {{Form::select('item_catagory[]',$itemCatagorySelect,isset($item_catagory)?$item_catagory: '', ['class' => 'form-control input-sm ','id'=>'item_catagory__0', 'placeholder' => 'Item Category','style'=>'width:150px','required'=>'required'] )}}
                        </div>
                         <div class="form-groupp">
                          {{-- <label for="item_name">Item Name</label> --}}
                             {{Form::select('item_name[]',$itemNameSelect,isset($item_name)?$item_name: '', ['class' => 'form-control input-sm ','id'=>'item_name__0', 'placeholder' => 'Item Name','style'=>'width:150px','required'=>'required'] )}}                                          
                        </div>
                      </td>
                      
                       <td>
                        <div class="form-groupp">
                          {{-- <label for="quantity">Product Quantity </label> --}}
                           {{Form::text('quantity[]',isset($quantity)?$quantity: '', ['class' => 'form-control input-sm ','id'=>'quantity__0', 'placeholder' => 'Product Quantity','style'=>'width:150px','required'=>'required','step'=>'any'] )}}
                        </div>
                        <div class="form-groupp">
                          {{-- <label for="hsn">Product HSN</label> --}}
                           {{Form::text('hsn[]',isset($hsn)?$hsn: '', ['class' => 'form-control input-sm ','id'=>'hsn__0', 'placeholder' => 'Product HSN','style'=>'width:150px','readonly','required'=>'required','step'=>'any'] )}}
                        </div>
                      </td>
                       <td>
                         <div class="form-groupp">
                          {{-- <label for="gst">Product GST</label> --}}
                           {{Form::text('gst[]',isset($gst)?$gst: '', ['class' => 'form-control input-sm ','id'=>'gst__0', 'placeholder' => 'Product CGST','style'=>'width:150px','readonly','required'=>'required','step'=>'any'] )}}
                        </div>
                        <div class="form-groupp">
                          {{-- <label for="price">Price</label> --}}
                          {{Form::text('price[]',isset($price)?$price: '', ['class' => 'form-control input-sm ','id'=>'price__0', 'placeholder' => 'price','style'=>'width:150px','required'=>'required','step'=>'any'] )}}
                        </div>
                      </td>
                      <td>
                        
                        <div class="form-groupp">
                          {{-- <label for="total_tax">Total Tax</label> --}}
                          {{Form::text('total_tax[]',isset($total_tax)?$total_tax: '', ['class' => 'form-control input-sm ','id'=>'total_tax__0', 'placeholder' => 'Total Tax','readonly','style'=>'width:150px','required'=>'required','step'=>'any'] )}}
                        </div>
                     
                         
                        <div class="form-groupp">
                          {{-- <label for="total_amount">Total Amount</label> --}}
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
{{Form::close()}}
</section>
<script type = "text/javascript" language = "javascript">

    $(document).ready(function() {
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
      $(document).on("change","[name^=supplier_id]",function(){
      var thisSelf=$(this);
      var supplierId = $(this).val();
      $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getSupplierDetailById",
        data:{
          "_token": "{{ csrf_token() }}",
          supplierId : supplierId,
        },
        dataType : 'html',
        cache: false,
        success: function(data){
          responseData=JSON.parse(data);
            $('[name^=supplier_contact_no]').val(responseData.contact_no);
            $('[name^=supplier_email]').val(responseData.email);
            $('[name^=supplier_address]').val(responseData.address);
            $('[name^=supplier_name]').val(responseData.supplier_name);
        }
      });
     }); 
    
    
    var i=0;
    @php 
          $i=0;
        @endphp
      $('.addMore').on("click",function(){
        i=parseInt(i)+1;
        @php 
          $i=$i+1;
        @endphp
         $("#tBody").append('<tr id="addRow__'+i+'">\<td>\
  <!-- <div class="form-group"> -->\
  <!-- <label for="item_catagory">Item Category</label> --!>\
  {{Form::select('item_catagory[]',$itemCatagorySelect,isset($item_catagory)?$item_catagory: '', ['class' => 'form-control input-sm ','id'=>'item_catagory__0', 'placeholder' => 'Item Category','style'=>'width:150px','required'=>'required'] )}}\
 <!--  </div> -->\
  <!-- <div class="form-group"> -->\
  <!-- <label for="item_name">Item Name</label> >--!>\
  <select id="item_name__'+i+'" placeholder="Item Name" required="" class="form-control input-sm" style="width:150px" name="item_name[]" ></select>\
  <!-- </div> -->\
</td>\
<td>\
  <!-- <div class="form-group"> -->\
  <!-- <label for="quantity">Product Quantity </label> >--!>\
  <input type="number" name="quantity[]" class="form-control input-sm" id="quantity__'+i+'" placeholder="Product Quantity" style="width:150px" required="" step="any"/>\
  <!-- </div> -->\
 <!--  <div class="form-group"> -->\
 <!--  <label for="hsn">Product HSN</label> >--!>\
   <input type="text" name="hsn[]" class="form-control input-sm" id="hsn__'+i+'" readonly placeholder="Product HSN" style="width:150px" required="" step="any"/>\
 <!--  </div> -->\
</td>\
<td>\
  <!-- <div class="form-group"> -->\
 <!--  <label for="gst">Product GST</label> --!>\
   <input type="number" name="gst[]" class="form-control input-sm" id="gst__'+i+'" readonly placeholder="Product GST" style="width:150px" required="" step="any"/>\
 <!--  </div> -->\
 <!--  <div class="form-group"> -->\
  <!-- <label for="price">Price</label> >--!>\
   <input type="number" name="price[]" class="form-control input-sm" id="price__'+i+'" placeholder="Price" style="width:150px" required="" step="any"/>\
 <!--  </div> -->\
</td>\
<td>\
  <!-- <div class="form-group"> -->\
  <!-- <label for="total_tax">Total Tax</label> >--!>\
   <input type="number" name="total_tax[]" class="form-control input-sm"  readonly="readonly" id="total_tax__'+i+'" placeholder="Total Tax" style="width:150px" required="" step="any"/>\
  <!-- </div> -->\
  <!-- <div class="form-group"> -->\
  <!-- <label for="total_amount">Total Amount</label> >--!>\
  <input type="number" name="total_amount[]" class="form-control input-sm" readonly="readonly" id="total_amount__'+i+'" placeholder="Total Amount" style="width:150px" required="" step="any"/>\
  <!--<!--  </div> -->\
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