<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemName;
use App\itemCatagory;
use DB;
use Auth;

class itemNameController extends Controller
{
public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
    $viewData['pageTitle'] = 'Item Name Details'; 
     $viewData['CatagoryList'] = itemCatagory::where('status', 1)->pluck('item_category_name', 'id')->toArray();
       
        $getFormAutoFillup=array();
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = itemName::whereId($id)->first()->toArray();
    	}
    	else 
    	{
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValue=$request->all();
                // print_r($allInputValue);
                // exit;
                $allInputValueManage = new itemName($allInputValue);
                $allInputValueManage['user_id']=Auth::user()->id;
                if($allInputValueManage->save()){
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Item Name Detail Saved Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
    		
    	} 
         $viewData['itemName'] = itemName::orderBy('id','desc')->get();   	
		return view('krishna.itemName', $viewData)->with($getFormAutoFillup);
    }

    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Item Name Details'; 
         $viewData['CatagoryList'] = itemCatagory::where('status', 1)->pluck('item_category_name', 'id')->toArray();
          // $viewData['CatagoryList'] = itemCatagory::where('status', '1')->pluck('item_name', 'id')->toArray();
        // $viewData['productModel'] = ProductModel::orderBy('id','desc')->get();

        $getFormAutoFillup=array();
       
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValueForUpdate=request()->except(['_token']);
                $allInputValueForUpdate['user_id']=Auth::user()->id;

                if(itemName::where([['id', '=', $request->id]])->update($allInputValueForUpdate)){
                    $request->session()->flash('message.level', 'info');
                    $request->session()->flash('message.content', 'Item Name Detailss Updated Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
            
             $viewData['itemName'] = itemName::orderBy('id','desc')->get();  
        return view('krishna.itemName', $viewData)->with($getFormAutoFillup);
    }


     public function view(Request $request)
    {
          $viewData['CatagoryList'] = itemCatagory::where('status',1)->pluck('item_category_name', 'id')->toArray();

    	if($request->isMethod('post'))
    	{
    		// echo $request->created_at_from;echo "<br/>";
    		// echo $request->created_at_to;
    		// exit;
    		//DB::enableQueryLog();
    		$viewData['pageTitle'] = 'Item Name Details';       	
			$itemName= DB::table('itemName');
			if($request->has('id') && $request->id !=''){
				$itemName->where('id', '=', $request->id);
			}
			if($request->has('item_catagories_id') && $request->item_catagories_id !=''){
				$itemName->where('item_catagories_id', 'like', '%'.$request->item_catagories_id.'%');
			}
			if($request->has('item_name') && $request->item_name !=''){
				$itemName->where('item_name', 'like', '%'.$request->item_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$created_at_from = date("Y-m-d", strtotime($request->created_at_from) );
				$itemName->whereDate('created_at', '<=', $created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$created_at_to = date("Y-m-d", strtotime($request->created_at_to) );
				$itemName->whereDate('created_at', '>=', $created_at_to);
			}
			if($request->has('hsn_code') && $request->hsn_code !=''){
				$itemName->where('hsn_code', '=', $request->hsn_code);
			}
			if($request->has('specification') && $request->specification !=''){
				$itemName->where('specification', '=', $request->specification);
			}
			if($request->has('details') && $request->details !=''){
				$itemName->where('details', '=', $request->details);
			}
			$itemName->orderBy('id','desc');
       		$itemName= $itemName->get();
//        		$queries = DB::getQueryLog();
// print_r($queries);
			$viewData['itemName']=json_decode(json_encode($itemName), true);
		    return view('krishna.itemName', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'Item Name Details';       	
			$viewData['itemName'] = itemName::orderBy('id','desc')->get();
		    return view('krishna.itemName', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
       // $viewData['CatagoryList'] = itemCatagory::where('status', '1')->pluck('item_name', 'id')->toArray();
  $viewData['CatagoryList'] = itemCatagory::where('user_id', Auth::user()->id)->pluck('item_category_name', 'id')->toArray();
    	if(($id!=null) && (itemName::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'itemName was Trashed!');
            $viewData['pageTitle'] = 'Item Name';       	
			$viewData['itemName'] = itemName::get();
			return view('krishna.itemName', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Item Name ';       	
			$viewData['itemName'] = itemName::get();;
			return view('krishna.itemName', $viewData);
       }
    
    }
    public function trashedList()
    {
    	 // $viewData['CatagoryList'] = itemCatagory::where('status', '1')->pluck('item_name', 'id')->toArray();

         $TrashedParty = itemName::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('krishna.itemName.delete', compact('TrashedParty', 'TrashedParty')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	 // $viewData['CatagoryList'] = itemCatagory::where('status', '1')->pluck('item_name', 'id')->toArray();
          $viewData['CatagoryList'] = itemCatagory::where('status', 1)->pluck('item_category_name', 'id')->toArray();
    	if(($id!=null) && (itemName::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Item Name  was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
    	 $TrashedParty = itemName::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('krishna.itemName', compact('TrashedParty', 'TrashedParty'));
    }
}
