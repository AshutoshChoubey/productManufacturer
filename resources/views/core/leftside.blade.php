<!-- Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html') }}">
       <img src="{{ asset('/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Krishna Plast</h5>
     </a>
   </div>
   <div class="user-details">
    <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
      <div class="avatar"><img class="mr-3 side-user-img" src="{{ asset('/images/avatars/avatar-13.png') }}" alt="user avatar"></div>
       <div class="media-body">
       <h6 class="side-user-name"></h6>
      </div>
       </div>
     <div id="user-dropdown" class="collapse">
      <ul class="user-setting-menu">
            <li><a href="javaScript:void();"><i class="icon-user"></i>  My Profile</a></li>
            <li><a href="javaScript:void();"><i class="icon-settings"></i> Setting</a></li>
      <li><a href="javaScript:void();"><i class="icon-power"></i> Logout</a></li>
      </ul>
     </div>
      </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-universal-access fa-spin "></i>
          <span>Master Form</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="{{ url('/') }}/krishna/itemCatagory/add "><i class="fa fa-gg"></i>Item Catagory</a></li>
          <li><a href="{{ url('/') }}/krishna/itemName/add "><i class="fa fa-bitbucket"></i>Item Name</a></li>
          <!-- <li><a href="{{ url('/') }}/GST/productUnit/add "><i class="fa fa-codiepie"></i>Product Unit</a></li>
          <li><a href="{{ url('/') }}/GST/productModel/add "><i class="fa fa-free-code-camp"></i>Product Model</a></li>
          <li><a href="{{ url('/') }}/GST/productBrand/add "><i class="fa fa-inbox"></i>Product Brand</a></li> -->
        </ul>
      </li>
       <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-anchor"></i>
          <span>Supplier</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('/') }}/krishna/supplier/add "><i class="zmdi zmdi-long-arrow-right"></i> Supplier</a></li>
{{--           <li><a href="{{ url('/') }}/krishna/supplier/add "><i class="zmdi zmdi-long-arrow-right"></i> Supplier Search</a></li> --}}
        </ul>
      </li>
       <li style="display: none">
        <a href="javaScript:void();" class="waves-effect">
          <i class="ti-cup"></i>
          <span>Distributor</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('/') }}/krishna/distributor/add "><i class="zmdi zmdi-long-arrow-right"></i>Distributor Details</a></li>
          <!-- <li><a href="ui-cards.html') "><i class="zmdi zmdi-long-arrow-right"></i> Purchase Report</a></li> -->
        </ul>
      </li>
      <li style="display: none">
        <a href="javaScript:void();" class="waves-effect">
          <i class="ti-tablet"></i>
          <span>Retailer</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('/') }}/krishna/retailer/add "><i class="zmdi zmdi-long-arrow-right"></i>Retailer Details</a></li>
         <!--  <li><a href="{{ url('/') }}/GST/product/search "><i class="zmdi zmdi-long-arrow-right"></i>Product Search</a></li> -->
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="ti-tablet"></i>
          <span>Customer</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('/') }}/krishna/customer/add "><i class="zmdi zmdi-long-arrow-right"></i>Customer Details</a></li>
         <!--  <li><a href="{{ url('/') }}/GST/product/search "><i class="zmdi zmdi-long-arrow-right"></i>Product Search</a></li> -->
        </ul>
      </li>

       <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-shopping-basket"></i>
          <span>Purchase</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('/') }}/krishna/purchase/add "><i class="zmdi zmdi-long-arrow-right"></i>Add</a></li>
          <li><a href="{{ url('/') }}/krishna/purchase/search "><i class="zmdi zmdi-long-arrow-right"></i>Search</a></li>
          <li><a href="{{ url('/') }}/krishna/purchase/view-purchase-invoice"><i class="zmdi zmdi-long-arrow-right"></i>Purchase Invoice</a></li>
          {{-- <li><a href="{{ url('/') }}/krishna/purchase/add "><i class="zmdi zmdi-long-arrow-right"></i>Add</a></li> --}}
          <!-- <li><a href="{{ url('/') }}/krishna/purchase/view-purchase-invoice"><i class="zmdi zmdi-long-arrow-right"></i>Purchase Invoice</a></li>
          <li><a href="{{ url('/') }}/krishna/purchase/view-purchase-return"><i class="zmdi zmdi-long-arrow-right"></i>Purchase Return Log</a></li> -->
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-vcard"></i>
          <span>Quatation</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('/') }}/quatation/add "><i class="zmdi zmdi-long-arrow-right"></i>Measurement Sheet</a></li>
          <li><a href="{{ url('/') }}/quatation/getData "><i class="zmdi zmdi-long-arrow-right"></i>Measurement Details</a></li>
          
         {{--  <li><a href="{{ url('/') }}/krishna/sales/view-sale-invoice "><i class="zmdi zmdi-long-arrow-right"></i>Sale Invoice</a></li> --}}
          <!-- <li><a href="{{ url('/') }}/GST/sales/view-sale-return "><i class="zmdi zmdi-long-arrow-right"></i>Sale Return Log</a></li>
          {{-- <li><a href="{{ url('/') }}/GST/supplier/add "><i class="zmdi zmdi-long-arrow-right"></i>Add</a></li> --}}
          {{-- <li><a href="ui-cards.html') "><i class="zmdi zmdi-long-arrow-right"></i> Product Unit</a></li>
          <li><a href="ui-buttons.html') "><i class="zmdi zmdi-long-arrow-right"></i> Product Type</a></li> --}}
          {{-- <li><a href="{{ url('/') }}/GST/productColor/add "><i class="zmdi zmdi-long-arrow-right"></i>Search</a></li> --}}
          {{-- <li><a href="ui-accordions.html') "><i class="zmdi zmdi-long-arrow-right"></i> Product Model</a></li> --}} -->
        </ul>
      </li>
       <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-vcard"></i>
          <span>Sale</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('/') }}/krishna/sales/add "><i class="zmdi zmdi-long-arrow-right"></i>Add</a></li>
          <li><a href="{{ url('/') }}/krishna/sales/search "><i class="zmdi zmdi-long-arrow-right"></i>Search</a></li>
          <li><a href="{{ url('/') }}/krishna/sales/view-sale-invoice "><i class="zmdi zmdi-long-arrow-right"></i>Sale Invoice</a></li>
          <!-- <li><a href="{{ url('/') }}/GST/sales/view-sale-return "><i class="zmdi zmdi-long-arrow-right"></i>Sale Return Log</a></li>
          {{-- <li><a href="{{ url('/') }}/GST/supplier/add "><i class="zmdi zmdi-long-arrow-right"></i>Add</a></li> --}}
          {{-- <li><a href="ui-cards.html') "><i class="zmdi zmdi-long-arrow-right"></i> Product Unit</a></li>
          <li><a href="ui-buttons.html') "><i class="zmdi zmdi-long-arrow-right"></i> Product Type</a></li> --}}
          {{-- <li><a href="{{ url('/') }}/GST/productColor/add "><i class="zmdi zmdi-long-arrow-right"></i>Search</a></li> --}}
          {{-- <li><a href="ui-accordions.html') "><i class="zmdi zmdi-long-arrow-right"></i> Product Model</a></li> --}} -->
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="ti-tablet"></i>
          <span>Employee</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{ url('/') }}/krishna/employee/add "><i class="zmdi zmdi-long-arrow-right"></i>Employee Details</a></li>
         <!--  <li><a href="{{ url('/') }}/GST/product/search "><i class="zmdi zmdi-long-arrow-right"></i>Product Search</a></li> -->
        </ul>
      </li>
<!--       <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-user-circle-o"></i>
          <span>User</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="nav-item">
            <a class="nav-link" href="{{asset('/employee')}}"><i class="fa fa-user"></i> Add User</a>
          </li>          
       
          <li class="nav-item">
            <a class="nav-link" href="{{asset('/employee-list')}}"><i class="fa fa-list"></i>User List</a>
          </li>          
        </ul>
      </li> -->
    
   </div>
   <!--End sidebar-wrapper