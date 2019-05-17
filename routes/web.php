<?php

Route::get('/', function () {
    return view('welcome');
}); 

Auth::routes(); 

Route::middleware('auth')->group(function() {
// Route::any('test',function(){
// print_r(Auth::user()->role_id);
// });
	// Workshop
 Route::view('/dashboard','krishna.dashboard');

// Start: Supplier Details
 Route::get('/krishna/supplier/add','SupplierController@save');
 Route::post('/krishna/supplier/add','SupplierController@save');
 Route::post('/krishna/supplier/update','SupplierController@update');
 Route::get('/krishna/supplier/add/{id}','SupplierController@save');
 Route::get('/krishna/supplier/search','SupplierController@view');
 Route::post('/krishna/supplier/search','SupplierController@view');
 Route::get('/krishna/supplier/trash/{id}','SupplierController@trash');
 Route::get('/krishna/supplier/delete','SupplierController@trashedList');
 Route::get('/krishna/supplier/delete/{id}','SupplierController@permanemetDelete');
// End: Supplier Details

 // Start: Distributor Details
 Route::get('/krishna/distributor/add','DistributorController@save');
 Route::post('/krishna/distributor/add','DistributorController@save');
 Route::post('/krishna/distributor/update','DistributorController@update');
 Route::get('/krishna/distributor/add/{id}','DistributorController@save');
 Route::get('/krishna/distributor/search','DistributorController@view');
 Route::post('/krishna/distributor/search','DistributorController@view');
 Route::get('/krishna/distributor/trash/{id}','DistributorController@trash');
 Route::get('/krishna/distributor/delete','DistributorController@trashedList');
 Route::get('/krishna/distributor/delete/{id}','DistributorController@permanemetDelete');
// End: Distributor Details

 // Start: Retailer Details
 Route::get('/krishna/retailer/add','RetailerController@save');
 Route::post('/krishna/retailer/add','RetailerController@save');
 Route::post('/krishna/retailer/update','RetailerController@update');
 Route::get('/krishna/retailer/add/{id}','RetailerController@save');
 Route::get('/krishna/retailer/search','RetailerController@view');
 Route::post('/krishna/retailer/search','RetailerController@view');
 Route::get('/krishna/retailer/trash/{id}','RetailerController@trash');
 Route::get('/krishna/retailer/delete','RetailerController@trashedList');
 Route::get('/krishna/retailer/delete/{id}','RetailerController@permanemetDelete');
// End: Retailer Details

 // Start: Item Catagory  Details
 Route::get('/krishna/itemCatagory/add','itemCatagoryController@save');
 Route::post('/krishna/itemCatagory/add','itemCatagoryController@save');
 Route::post('/krishna/itemCatagory/update','itemCatagoryController@update');
 Route::get('/krishna/itemCatagory/add/{id}','itemCatagoryController@save');
 Route::get('/krishna/itemCatagory/search','itemCatagoryController@view');
 Route::post('/krishna/itemCatagory/search','itemCatagoryController@view');
 Route::get('/krishna/itemCatagory/trash/{id}','itemCatagoryController@trash');
 Route::get('/krishna/itemCatagory/delete','itemCatagoryController@trashedList');
 Route::get('/krishna/itemCatagory/delete/{id}','itemCatagoryController@permanemetDelete');
// End: Item Catagory  Details 

 // Start: Item Name  Details
 Route::get('/krishna/itemName/add','itemNameController@save');
 Route::post('/krishna/itemName/add','itemNameController@save');
 Route::post('/krishna/itemName/update','itemNameController@update');
 Route::get('/krishna/itemName/add/{id}','itemNameController@save');
 Route::get('/krishna/itemName/search','itemNameController@view');
 Route::post('/krishna/itemName/search','itemNameController@view');
 Route::get('/krishna/itemName/trash/{id}','itemNameController@trash');
 Route::get('/krishna/itemName/delete','itemNameController@trashedList');
 Route::get('/krishna/itemName/delete/{id}','itemNameController@permanemetDelete');
// End: Item Name  Details 

// Start: Customer Details
 Route::get('/krishna/customer/add','CustomerController@save');
 Route::post('/krishna/customer/add','CustomerController@save');
 Route::post('/krishna/customer/update','CustomerController@update');
 Route::get('/krishna/customer/add/{id}','CustomerController@save');
 Route::get('/krishna/customer/search','CustomerController@view');
 Route::post('/krishna/customer/search','CustomerController@view');
 Route::get('/krishna/customer/trash/{id}','CustomerController@trash');
 Route::get('/krishna/customer/delete','CustomerController@trashedList');
 Route::get('/krishna/customer/delete/{id}','CustomerController@permanemetDelete');
// End: Customer Details

// Start: Quatation Details
 Route::get('/quatation/add','QuatationController@index');
 Route::post('/quatation/insert','QuatationController@save');
 Route::get('/quatation/getData','QuatationController@getData');
 Route::get('/quatation/measurementdataView/{id}','QuatationController@measurementdataView');
 Route::get('/quatation/create/{id}','QuatationController@create');
 Route::post('/krishna/customer/search','CustomerController@view');
 Route::get('/krishna/customer/trash/{id}','CustomerController@trash');
 Route::get('/krishna/customer/delete','CustomerController@trashedList');
 Route::get('/krishna/customer/delete/{id}','CustomerController@permanemetDelete');
// End: Quatation Details

 // Start:ProductTypeController
 Route::get('/GST/productType/add','ProductTypeController@save');
 Route::post('/GST/productType/add','ProductTypeController@save');
 Route::post('/GST/productType/update','ProductTypeController@update');
 Route::get('/GST/productType/add/{id}','ProductTypeController@save');
 Route::get('/GST/productType/search','ProductTypeController@view');
 Route::post('/GST/productType/search','ProductColorController@view');
 Route::get('/GST/productType/trash/{id}','ProductTypeController@trash');
 Route::get('/GST/productType/delete','ProductTypeController@trashedList');
 Route::get('/GST/productType/delete/{id}','ProductTypeController@permanemetDelete');
// End:ProductTypeController
  // Start:ProductTypeController
 Route::get('/GST/productModel/add','ProductModelController@save');
 Route::post('/GST/productModel/add','ProductModelController@save');
 Route::post('/GST/productModel/update','ProductModelController@update');
 Route::get('/GST/productModel/add/{id}','ProductModelController@save');
 Route::get('/GST/productModel/search','ProductModelController@view');
 Route::post('/GST/productModel/search','ProductModelController@view');
 Route::get('/GST/productModel/trash/{id}','ProductModelController@trash');
 Route::get('/GST/productModel/delete','ProductModelController@trashedList');
 Route::get('/GST/productModel/delete/{id}','ProductModelController@permanemetDelete');
// End:ProductTypeController

 // Start:EmployeeController
 Route::get('/krishna/employee/add','EmployeeController@save');
 Route::post('/krishna/employee/add','EmployeeController@save');
 Route::post('/krishna/employee/update','EmployeeController@update');
 Route::get('/krishna/employee/add/{id}','EmployeeController@save');
 Route::get('/krishna/employee/search','EmployeeController@view');
 Route::post('/krishna/employee/search','EmployeeController@view');
 Route::get('/krishna/employee/trash/{id}','EmployeeController@trash');
 Route::get('/krishna/employee/delete','EmployeeController@trashedList');
 Route::get('/krishna/employee/delete/{id}','EmployeeController@permanemetDelete');
// End:EmployeeController

 // Purchase Details
 
 Route::get('/krishna/purchase/add','PurchaseController@save');
 Route::post('/krishna/purchase/add','PurchaseController@save');
 Route::post('/krishna/purchase/update','PurchaseController@update');
 Route::get('/krishna/purchase/add/{id}','PurchaseController@save');
 Route::get('/krishna/purchase/search','PurchaseController@view');
 Route::post('/krishna/purchase/search','PurchaseController@view');
 Route::get('/krishna/purchase/trash/{id}','PurchaseController@trash');
 Route::get('/krishna/purchase/delete','PurchaseController@trashedList');
 Route::get('/krishna/purchase/delete/{id}','PurchaseController@permanemetDelete');
 Route::get('/purchase-invoice-view/{id}','PurchaseController@purchaseInvoiceView');
 Route::get('/krishna/purchase/view-purchase-invoice','PurchaseController@viewPurchaseInvoice');
 Route::post('/krishna/purchase/view-purchase-invoice','PurchaseController@viewPurchaseInvoice');
 Route::get('/krishna/purchase/view-purchase-return','PurchaseController@purcheseReturn');
 Route::get('/purchase-debit-notes/{id}','PurchaseController@purchaseDebitNotes');
 

 //Start: Product Details
 Route::get('/GST/product/add','ProductController@save');
 Route::post('/GST/product/add','ProductController@save');
 Route::post('/GST/product/update','ProductController@update');
 Route::get('/GST/product/add/{id}','ProductController@save');
 Route::get('/GST/product/search','ProductController@view');
 Route::post('/GST/product/search','ProductController@view');
 Route::get('/GST/product/trash/{id}','ProductController@trash');
 Route::get('/GST/product/delete','ProductController@trashedList');
 Route::get('/GST/product/delete/{id}','ProductController@permanemetDelete');
//End: Product Details
 
 // Start: Service Details
 Route::get('/GST/service/add','ServiceController@save');
 Route::post('/GST/service/add','ServiceController@save');
 Route::post('/GST/service/update','ServiceController@update');
 Route::get('/GST/service/add/{id}','ServiceController@update');
 Route::get('/GST/service/search','ServiceController@view');
 Route::post('/GST/service/search','ServiceController@view');
 Route::get('/GST/service/trash/{id}','ServiceController@trash');
 Route::get('/GST/service/delete','ServiceController@trashedList');
 Route::get('/GST/service/delete/{id}','ServiceController@permanemetDelete');
 Route::post('GST/model/add','ServiceController@model');
 Route::post('/GST/brand/add','ServiceController@brand');
 Route::post('/GST/service_name/add','ServiceController@service');
 Route::post('/GST/serviceType/add','ServiceController@serviceType');
 // End: Service Details

  //Start: sale Details
Route::get('/krishna/sales/add','SaleController@save');
Route::post('/krishna/sales/add','SaleController@save');
Route::post('/krishna/sales/update','SaleController@update');
Route::get('/krishna/sales/add/{id}','SaleController@save');
Route::get('/krishna/sales/search','SaleController@view');
Route::post('/krishna/sales/search','SaleController@view');
Route::get('/krishna/sales/trash/{id}','SaleController@trash');
Route::get('/krishna/sales/delete','SaleController@trashedList');
Route::get('/krishna/sales/delete/{id}','SaleController@permanemetDelete');
Route::get('/krishna/sales/view-sale-invoice','SaleController@viewSaleInvoice');
Route::post('/krishna/sales/view-sale-invoice','SaleController@viewSaleInvoice');
Route::get('/krishna/sales/view-sale-return','SaleController@saleReturn');
Route::get('/sale-invoice-view/{id}','SaleController@saleInvoiceView');

//End: sale Details

// Start: Master Form Details
 Route::post('/master/brands','MasterController@brand');
 Route::post('/master/modal','MasterController@modal');
 Route::post('/master/service_name','MasterController@service');
 Route::post('/master/service_type','MasterController@serviceType');
 Route::get('/master/brands','MasterController@brand');
 Route::get('/master/modal','MasterController@modal');
 Route::get('/master/service_name','MasterController@service');
 Route::get('/master/service_type','MasterController@serviceType');
 Route::get('/master/brands/{id}','MasterController@brandUpdate');
 Route::get('/master/modal/{id}','MasterController@modalUpdate');
 Route::get('/master/service_name/{id}','MasterController@serviceUpdate');
 Route::get('/master/service_type/{id}','MasterController@serviceTypeUpdate');
 Route::get('/master/brands/update/{id}','MasterController@brandUpdate');
 Route::get('/master/modal/update/{id}','MasterController@modalUpdate');
 Route::get('/master/service_name/update/{id}','MasterController@serviceUpdate');
 Route::get('/master/service_type/update/{id}','MasterController@serviceTypeUpdate');
 Route::post('/master/brands/update','MasterController@brandUpdate');
 Route::post('/master/modal/update','MasterController@modalUpdate');
 Route::post('/master/service_name/update','MasterController@serviceUpdate');
 Route::post('/master/service_type/update','MasterController@serviceTypeUpdate');

// End: Master Form Details


 // Start:  Marketing Details
 Route::post('/marketing/add','MarketingController@save');
 Route::post('/marketing/update','MarketingController@update');
 Route::post('/marketing/search','MarketingController@view');
 Route::get('/marketing/add','MarketingController@save');
 Route::get('/marketing/add/{id}','MarketingController@save');
 Route::get('/marketing/search','MarketingController@view');
 Route::get('/marketing/delete','MarketingController@trashedList');
 Route::get('/marketing/trash/{id}','MarketingController@trash');
 Route::get('/marketing/delete/{id}','MarketingController@permanemetDelete');
// End: Marketing Details
 // Start:  Marketing Details
 Route::post('/credit-debit/add','CreditDebitController@save');
 Route::post('/credit-debit/update','CreditDebitController@update');
 Route::post('/credit-debit/search','CreditDebitController@view');
 Route::get('/credit-debit/add','CreditDebitController@save');
 Route::get('/credit-debit/add/{id}','CreditDebitController@save');
 Route::get('/credit-debit/search','CreditDebitController@view');
 Route::get('/credit-debit/delete','CreditDebitController@trashedList');
 Route::get('/credit-debit/trash/{id}','CreditDebitController@trash');
 Route::get('/credit-debit/delete/{id}','CreditDebitController@permanemetDelete');
// End: Marketing Details


 // Start:  Marketing Details
 // Route::post('/credit-debit/add','CreditDebitDetailController@save');
 // Route::post('/credit-debit/update','CreditDebitDetailController@update');
 // Route::post('/credit-debit/search','CreditDebitDetailController@view');
 // Route::get('/credit-debit/add','CreditDebitDetailController@save');
 // Route::get('/credit-debit/add/{id}','CreditDebitDetailController@save');
 // Route::get('/credit-debit/search','CreditDebitDetailController@view');
 // Route::get('/credit-debit/delete','CreditDebitDetailController@trashedList');
 // Route::get('/credit-debit/trash/{id}','CreditDebitDetailController@trash');
 // Route::get('/credit-debit/delete/{id}','CreditDebitDetailController@permanemetDelete');
// End: Marketing Details

 // Start: Ajax Related
Route::post('/ajax/getPurchase','AjaxController@getPurchase');
Route::post('/ajax/getModal','AjaxController@getProductModel');
Route::post('/ajax/getSupplierDetailById','AjaxController@getSupplierDetailById');
Route::post('/ajax/getCustomerDetailById','AjaxController@getCustomerDetailById');
Route::post('/ajax/getBrandByProductType','AjaxController@getBrandByProductType');
Route::post('/ajax/getColorByBrand','AjaxController@getColorByBrand');
Route::post('/ajax/getModelByBrand','AjaxController@getModelByBrand');
Route::post('/ajax/getColorByBrandModelType','AjaxController@getColorByBrandModelType');
Route::post('/ajax/getNameByBrandModelTypeColor','AjaxController@getNameByBrandModelTypeColor');
Route::post('/ajax/getProduct','AjaxController@getProduct');
Route::post('/ajax/saleReturn','AjaxController@saleReturn');
Route::post('/ajax/purchaseReturn','AjaxController@purchaseReturn');
Route::post('/ajax/getItemCatagory','AjaxController@getItemCatagory');
Route::post('/ajax/getItemNameByCategory','AjaxController@getItemNameByCategory');





// End: Ajax Related
/**
 * Start: Employee Module
 */

Route::get('/employee', 'MasterformsController@addUser')->name('employee');
Route::post('/employee-save', 'MasterformsController@addUser')->name('employee-save');
Route::get('/employee-list', 'MasterformsController@userList')->name('employee-list');
Route::get('/employee-edit/{id}', 'MasterformsController@addUser')->name('employee-edit');
Route::get('/employee/block/{type}/{id}', 'MasterformsController@blockUser')->name('employee-edit');
Route::get('/employee/trash/{type}/{id}', 'MasterformsController@trashUser')->name('employee-edit');
Route::get('/employee/{id}/{view}', 'MasterformsController@addUser')->name('employee-edit');

Route::get('/get-payment-overview/{sid}', 'StudentController@paymentOverview')->name('get-payment-overview');
Route::get('/get-payment-overview-by-year-id/{sid}/{year}', 'StudentController@paymentOverview')->name('get-payment-overview');
/**
 * End: Employee Module
 */
 

	 Route::view('/sample/cards','samples.cards');
	 Route::view('/sample/forms','samples.forms');
	 
	// Route::view('/sample/modals','samples.modals');
	// Route::view('/sample/switches','samples.switches');
	// Route::view('/sample/tables','samples.tables');
	// Route::view('/sample/tabs','samples.tabs');
	// Route::view('/sample/icons-font-awesome', 'samples.font-awesome-icons');
	// Route::view('/sample/icons-simple-line', 'samples.simple-line-icons');
	// Route::view('/sample/widgets','samples.widgets');
	// Route::view('/sample/charts','samples.charts');
	
});

Route::get('/home', 'HomeController@index')->name('home');
