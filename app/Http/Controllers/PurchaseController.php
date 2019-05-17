<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use DB;
use App\Supplier;
use App\itemCatagory;
use App\itemName;
use Illuminate\Support\Facades\Auth;
// use App\SupplierDebitLog;
use App\PurchaseInvoice;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
         $getFormAutoFillup = array();
         $viewData['supplierSelect'] = Supplier::pluck('supplier_name', 'id');
         $viewData['itemCatagorySelect'] = itemCatagory::pluck('item_category_name', 'id');
         $viewData['itemNameSelect'] = itemName::pluck('item_name', 'id');

      if(isset($id) && $id != null ){
      $getFormAutoFillup = Purchase::whereId($id)->first();           
      if ($getFormAutoFillup) {
          $getFormAutoFillup = $getFormAutoFillup->toArray();
        }
        else
        {
            $request->session()->flash('message.level', 'Error');
            $request->session()->flash('message.content', 'Somthing Went Wrong!');
        }
       return view('krishna.purchase.add', $viewData)->with($getFormAutoFillup);
      }
      else
        {
          if ($request->isMethod('post'))
          {

              $savePurchaseInvoice = new PurchaseInvoice;
              $savePurchaseInvoice->supplier_id = $request->supplier_id;
              $savePurchaseInvoice->supplier_name = $request->supplier_name;
              $savePurchaseInvoice->supplier_contact_no = $request->supplier_contact_no;
              $savePurchaseInvoice->supplier_address = $request->supplier_address;
              $savePurchaseInvoice->supplier_email = $request->supplier_email;
              $savePurchaseInvoice->purchase_invoice_number =  $request->purchase_invoice_no;
              $savePurchaseInvoice->purchase_invoice_date =  date('Y-m-d H:i:s', strtotime($request->input('purchase_invoice_date')));
              $savePurchaseInvoice->purchase_invoice_amount =  $request->purchase_invoice_amount;
              $savePurchaseInvoice->purchase_discription =  $request->purchase_discription;
              $savePurchaseInvoice->payment_type =  $request->payment_type;
              $savePurchaseInvoice->total_purchase_amount =  $request->total_purchase_amount;
              // $savePurchaseInvoice->purchase_due_amount =  $request->purchase_due_amount;
              $savePurchaseInvoice->gstin =  $request->gstin;
              
              if($savePurchaseInvoice->save())
              {
               $purchaseInvoiceId= $savePurchaseInvoice->id;
              }
             

          for($i=0; $i < count($request->item_catagory); $i++)
          {
            $savePurchase = new Purchase;
                          $savePurchase->purchase_invoice_id = $purchaseInvoiceId;
                          $savePurchase->supplier_id = $request->supplier_id;
                          $savePurchase->supplier_name = $request->supplier_name; 
                          $savePurchase->supplier_email =$request->input('supplier_email');                      
                          $savePurchase->supplier_contact_no =  $request->supplier_contact_no;
                          $savePurchase->supplier_address =$request->input('supplier_address'); 
                          $savePurchase->purchase_invoice_no =  $request->purchase_invoice_no;
                          $savePurchase->purchase_invoice_date = date('Y-m-d H:i:s', strtotime($request->input('purchase_invoice_date')));
                          $savePurchase->purchase_invoice_amount =  $request->purchase_invoice_amount;
                          $savePurchase->purchase_discription =  $request->purchase_discription;
                          $savePurchase->payment_type =  $request->payment_type;
                          // $savePurchase->gstin =  $request->gstin;
                          $savePurchase->item_name =  $request->item_name[$i];
                          $savePurchase->item_catagory =  $request->item_catagory[$i];
                          $savePurchase->gst =  $request->gst[$i];
                          $savePurchase->hsn =  $request->hsn[$i];
                          $savePurchase->quantity =  $request->quantity[$i];
                          $savePurchase->price =  $request->price[$i];
                          $savePurchase->total_tax =  $request->total_tax[$i];
                          $savePurchase->total_amount =  $request->total_amount[$i];
                          // $savePurchase->user_id = Auth::user()->id;
                          if($savePurchase->save())
                          {
                            $ItemDetail=itemName::whereId($request->item_name[$i])->first()->toArray();

                            $productStockIn=$ItemDetail['stock_in'];
                            $productStockAvailable=$ItemDetail['available_stock'];
                            $productManame['stock_in']=$productStockIn+$request->quantity[$i];
                            $productManame['available_stock']=$productStockAvailable+$request->quantity[$i];
                            itemName::where([['id', '=',$request->item_name[$i]]])->update($productManame);
                              $request->session()->flash('message.level', 'success');
                              $request->session()->flash('message.content', ' Saved Successfully!');
                          }

                          
          }
          
            }

            //  exit;
        }    
         // exit;
      return view('krishna.purchase.add',$viewData);
		}
    public function update(Request $request, $id = null)
    {
    	  $getFormAutoFillup = array();
        $viewData['pageTitle'] = 'Update Purchase Detail'; 
        $viewData['supplier'] = Supplier::pluck('supplier_name', 'id');
        $viewData['item_catagory'] = item_catagory::pluck('item_catagory', 'id');
        $viewData['item_name'] = item_name::pluck('item_name', 'id');
	    	if ($request->isMethod('post')){	
					$supplier_name = $request->input('supplier_name');
					$supplier_contact_no = $request->input('supplier_contact_no');
					$supplier_email = $request->input('supplier_email');
					$supplier_address = $request->input('supplier_address');
					$purchase_invoice_no = $request->input('purchase_invoice_no');
					$purchase_invoice_date = $request->input('purchase_invoice_date');
          $gstin = $request->input('gstin');
          $item_name = $request->input('item_name');
					$item_catagory = $request->input('item_catagory');
					$cgst = $request->input('cgst');
					$quantity = $request->input('quantity');
					$sgst = $request->input('sgst');
					$hsn = $request->input('hsn');
          $price = $request->input('price');
					$total_amount = $request->input('total_amount');	
          $total_tax_amount = $request->input('total_tax_amount');   

					for($i=0; $i < count($product_id); $i++){
                            $updatePurchaseDetail = Purchase::where('id', '=', $request->id);;
                            $savePurchase->id = $requst->id;
                            $savePurchase['supplier_name']= $supplier_name;
                            $savePurchase['supplier_contact_no']= $supplier_contact_no;
                            $savePurchase['supplier_email']= $supplier_email;
                            $savePurchase['supplier_address'] = $supplier_address[$i];
                            $savePurchase['purchase_invoice_no'] = $purchase_invoice_no[$i];
                            $savePurchase['purchase_invoice_date'] = $purchase_invoice_date[$i];
                            $savePurchase['gstin'] = $gstin[$i];
                            $savePurchase['item_name'] = $item_name[$i];
                            $savePurchase['item_catagory']= $item_catagory[$i];
                            $savePurchase['cgst']= $cgst[$i];
                            $savePurchase['sgst'] = $sgst[$i];
                            $savePurchase['quantity'] = $quantity[$i];
                            $savePurchase['hsn']= $hsn[$i];
                            $savePurchase['total_tax_amount']= $total_tax_amount[$i];
                            $savePurchase['total_amount'] = $total_amount[$i];
                              
                            Product::where([['id', '=',$product_id[$i]]])->update($productManame);
 
                            if(!$updatePurchaseDetail->update($savePurchase))
                            {
                            	$request->session()->flash('message.level', 'Error');
				     			$request->session()->flash('message.content', 'Somthing Went Wrong!');
                            }
                        }
						$request->session()->flash('message.level', 'success');
				     	$request->session()->flash('message.content', ' Updated Successfully!');
		}
		 return redirect('/krishna/purchase/add/'.$request->id);
    }
   // this is for search
    public function view(Request $request)
    {
    	$getFormAutoFillup = array();
    	if($request->isMethod('post'))
    	{
    		$viewData['pageTitle'] = 'Purchase Details';        	
			$purchase= DB::table('purchases');
             $purchase->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name');
             $purchase->leftJoin('item_catagories','item_catagories.id','=','purchases.item_catagory');
             $purchase->leftJoin('item_names','item_names.id','=','purchases.item_name');
			if($request->has('supplier_name') && $request->supplier_name !=''){
				$getFormAutoFillup['supplier_name']=$request->supplier_name;
				$purchase->where('purchases.supplier_name', 'like', '%'.$request->supplier_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$getFormAutoFillup['created_at_from']=$request->created_at_from;
				$purchase->whereDate('purchases.created_at', '<=', $request->created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$getFormAutoFillup['created_at_to']=$request->created_at_to;
				$purchase->whereDate('purchases.created_at', '>=', $request->created_at_to);
			}
			
			$purchase->orderBy('purchases.id','desc');
       		$purchase= $purchase->get();
			$viewData['purchase']=json_decode(json_encode($purchase), true);
		    return view('krishna.purchase.search', $viewData)->with($getFormAutoFillup);

    	}else
    	{
        $viewData['pageTitle'] = 'Purchase Details';       	
        $purchase= DB::table('purchase_invoices');
        $purchase->join('purchases','purchase_invoices.id','=','purchases.purchase_invoice_id');
        $purchase->join('item_names','item_names.id','=','purchases.item_name');
        $purchase->select('purchase_invoices.*','purchase_invoices.id as purchaseInvoiceId','purchases.*','purchases.id as purchaseId','item_names.item_name as Itemname');
        $purchase->where('purchase_invoices.deleted_at','=',null);
        $purchase->orderBy('purchases.id','desc');
        $purchase= $purchase->get();
        $viewData['purchase']=json_decode(json_encode($purchase), true);
		    return view('krishna.purchase.search', $viewData);
    	}
      
    }

    public function viewPurchaseInvoice(Request $request)
    {
      $getFormAutoFillup = array();
      if($request->isMethod('post'))
      {
        $viewData['pageTitle'] = 'Purchase Details';       
        $purchase= DB::table('purchase_invoices');
        $purchase->leftJoin('suppliers','suppliers.id','=','purchase_invoices.supplier_id');
        $purchase->where('purchase_invoices.deleted_at','=',null);
      if($request->has('id') && $request->id !=''){
        $getFormAutoFillup['id']=$request->id;
        $purchase->where('purchase_invoices.id', '=', $request->id);
      }
      if($request->has('supplier_name') && $request->supplier_name !=''){
        $getFormAutoFillup['supplier_name']=$request->supplier_name;
        $purchase->where('purchases.supplier_name', 'like', '%'.$request->supplier_name.'%');
      }
      if($request->has('created_at_from') && $request->created_at_from !=''){
        $getFormAutoFillup['created_at_from']=$request->created_at_from;
        $purchase->whereDate('purchases.created_at', '<=', $request->created_at_from);
      }
      if($request->has('created_at_to') && $request->created_at_to !=''){
        $getFormAutoFillup['created_at_to']=$request->created_at_to;
        $purchase->whereDate('purchases.created_at', '>=', $request->created_at_to);
      }
      $sale->select('purchase_invoices.id as purchase_invoice_id','purchase_invoices.*','suppliers.*');
      $purchase->orderBy('purchase_invoices.id','desc');
          $purchase= $purchase->get();
      $viewData['purchase']=json_decode(json_encode($purchase), true);
      // print_r($viewData['purchase']);
      // exit;

        return view('krishna.purchase.purchaseInvoiceSearch', $viewData)->with($getFormAutoFillup);;

      }else
      {
        $viewData['pageTitle'] = 'Purchase Details';        
        $purchase= DB::table('purchase_invoices');
        $purchase->leftJoin('suppliers','suppliers.id','=','purchase_invoices.supplier_id');
        $purchase->where('purchase_invoices.deleted_at','=',null);
        $purchase->select('purchase_invoices.id as purchase_invoice_id','purchase_invoices.*','suppliers.*');
        $purchase->orderBy('purchase_invoices.id','desc');
        $purchase= $purchase->get();
        $viewData['purchase']=json_decode(json_encode($purchase), true);
        return view('krishna.purchase.purchaseInvoiceSearch', $viewData);
      }
      
    }
    public function purchaseInvoiceView($id)
    {

    }

    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Purchase::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Purchase was Trashed!');
            $viewData['pageTitle'] = 'Purchase';       	
			$purchase= DB::table('purchases');
            $purchase->where('purchases.deleted_at', '=', null);
             $purchase->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name');
             $purchase->leftJoin('item_catagories','item_catagories.id','=','purchases.item_catagory');
             $purchase->leftJoin('item_names','item_names.id','=','purchases.item_name');
             $purchase->select('purchases.*','suppliers.supplier_name as supplier_name_from_supplier','item_catagories.item_catagory as item_catagory','item_names.item_name as item_name');
             $purchase= $purchase->get();
            $viewData['purchase']=json_decode(json_encode($purchase), true);
			return view('krishna.purchase.search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Purchase';       	
			$purchase= DB::table('purchases');
            $purchase->where('purchases.deleted_at', '=', null);
             $purchase->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name');
            $purchase->leftJoin('item_catagories','item_catagories.id','=','purchases.item_catagory');
             $purchase->leftJoin('item_names','item_names.id','=','purchases.item_name');
             $purchase->select('purchases.*','suppliers.supplier_name as supplier_name_from_supplier','item_catagories.item_catagory as item_catagory','item_names.item_name as item_name');
             $purchase= $purchase->get();
            $viewData['purchase']=json_decode(json_encode($purchase), true);
			return view('krishna.purchase.search', $viewData);
       }
    
    }
    public function trashedList()
    {

         $TrashedPurchase = Purchase::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('krishna.purchase.delete', compact('TrashedPurchase', 'TrashedPurchase'));
      
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (Purchase::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Purchase was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }

    	 $TrashedPurchase = Purchase::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(50);
         return view('krishna.purchase.delete', compact('TrashedPurchase', 'TrashedPurchase'));
    } 
}
