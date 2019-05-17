<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\itemCatagory;
use DB;
use Auth;

class itemCatagoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Item Catagory Details'; 
       
       
        $getFormAutoFillup=array();
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = itemCatagory::whereId($id)->first()->toArray();
    	}
    	else 
    	{
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValue=$request->all();
                $allInputValueManage = new itemCatagory($allInputValue);
                $allInputValueManage['user_id']=Auth::user()->id;
                if($allInputValueManage->save()){
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Item Catagory Details Saved Successfully!');
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
         $viewData['itemCatagory'] = itemCatagory::orderBy('id','desc')->get();   	
		return view('krishna.itemCatagory', $viewData)->with($getFormAutoFillup);
    }

    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Item Catagory Details'; 
        // $viewData['productColor'] = ProductColor::orderBy('id','desc')->get();

        $getFormAutoFillup=array();
       
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValueForUpdate=request()->except(['_token']);
                $allInputValueForUpdate['user_id']=Auth::user()->id;

                if(itemCatagory::where([['id', '=', $request->id]])->update($allInputValueForUpdate)){
                    $request->session()->flash('message.level', 'info');
                    $request->session()->flash('message.content', 'Item Catagory Details Updated Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
            
             $viewData['itemCatagory'] = itemCatagory::orderBy('id','desc')->get();  
        return view('krishna.itemCatagory', $viewData)->with($getFormAutoFillup);
    }


     public function view(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		// echo $request->created_at_from;echo "<br/>";
    		// echo $request->created_at_to;
    		// exit;
    		//DB::enableQueryLog();
    		$viewData['pageTitle'] = 'Item Catagory ';       	
			$itemCatagory= DB::table('item_catagory');
			if($request->has('id') && $request->id !=''){
				$itemCatagory->where('id', '=', $request->id);
			}
			if($request->has('item_category_name') && $request->item_name !=''){
				$itemCatagory->where('item_category_name', 'like', '%'.$request->item_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$created_at_from = date("Y-m-d", strtotime($request->created_at_from) );
				$itemCatagory->whereDate('created_at', '<=', $created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$created_at_to = date("Y-m-d", strtotime($request->created_at_to) );
				$itemCatagory->whereDate('created_at', '>=', $created_at_to);
			}
			if($request->has('item_description') && $request->item_description !=''){
				$itemCatagory->where('item_description', '=', $request->item_description);
			}
			$itemCatagory->orderBy('id','desc');
       		$itemCatagory= $itemCatagory->get();
//        		$queries = DB::getQueryLog();
// print_r($queries);
// exit;
			$viewData['itemCatagory']=json_decode(json_encode($itemCatagory), true);
		    return view('krishna.itemCatagory', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'Item Catagory';       	
			$viewData['itemCatagory'] = itemCatagory::orderBy('id','desc')->get();
		    return view('krishna.itemCatagory', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (itemCatagory::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Item Catagory was Trashed!');
            $viewData['pageTitle'] = 'itemCatagory';       	
			$viewData['itemCatagory'] = itemCatagory::get();
			return view('krishna.itemCatagory', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'itemCatagory';       	
			$viewData['itemCatagory'] = itemCatagory::get();;
			return view('krishna.itemCatagory', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedParty = itemCatagory::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('krishna.itemCatagory.delete', compact('TrashedParty', 'TrashedParty')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (itemCatagory::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Item Catagory was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
    	 $TrashedParty = itemCatagory::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('krishna.itemCatagory', compact('TrashedParty', 'TrashedParty'));
    }
}
