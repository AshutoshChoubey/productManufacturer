<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB;
use Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Customer Dretail'; 
       
        $getFormAutoFillup=array();
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = Customer::whereId($id)->first()->toArray();
    	}
    	else 
    	{
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValue=$request->all();
                $allInputValueManage = new Customer($allInputValue);
                $allInputValueManage['user_id']=Auth::user()->id;
                if($allInputValueManage->save()){
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Customer Dretail Saved Successfully!');
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
         $viewData['customer'] = Customer::orderBy('id','desc')->get();   	
		return view('krishna.customer', $viewData)->with($getFormAutoFillup);
    }

    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Customer Dretail'; 
        // $viewData['customer'] = Customer::orderBy('id','desc')->get();

        $getFormAutoFillup=array();
       
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValueForUpdate=request()->except(['_token']);
                $allInputValueForUpdate['user_id']=Auth::user()->id;

                if(Customer::where([['id', '=', $request->id]])->update($allInputValueForUpdate)){
                    $request->session()->flash('message.level', 'info');
                    $request->session()->flash('message.content', 'Customer Dretails Updated Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
            
             $viewData['customer'] = Customer::orderBy('id','desc')->get();  
        return view('krishna.customer', $viewData)->with($getFormAutoFillup);
    }


     public function view(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		// echo $request->created_at_from;echo "<br/>";
    		// echo $request->created_at_to;
    		// exit;
    		//DB::enableQueryLog();
    		$viewData['pageTitle'] = 'customer';       	
			$customer= DB::table('customers');
			if($request->has('id') && $request->id !=''){
				$customer->where('id', '=', $request->id);
			}
			if($request->has('customer_name') && $request->customer_name !=''){
				$customer->where('customer_name', 'like', '%'.$request->customer_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$created_at_from = date("Y-m-d", strtotime($request->created_at_from) );
				$customer->whereDate('created_at', '<=', $created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$created_at_to = date("Y-m-d", strtotime($request->created_at_to) );
				$customer->whereDate('created_at', '>=', $created_at_to);
			}
			if($request->has('contact_no') && $request->contact_no !=''){
				$customer->where('contact_no', '=', $request->contact_no);
			}
			if($request->has('email') && $request->email !=''){
				$customer->where('email', '=', $request->email);
			}
			$customer->orderBy('id','desc');
       		$customer= $customer->get();
//        		$queries = DB::getQueryLog();
// print_r($queries);
// exit;
			$viewData['customer']=json_decode(json_encode($customer), true);
		    return view('krishna.customer', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'customer';       	
			$viewData['customer'] = Customer::orderBy('id','desc')->get();
		    return view('krishna.customer', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Customer::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Customer was Trashed!');
            $viewData['pageTitle'] = 'customer';       	
			$viewData['customer'] = Customer::get();
			return view('krishna.customer', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'customer';       	
			$viewData['customer'] = Customer::get();;
			return view('krishna.customer', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedParty = Customer::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('krishna.customer.delete', compact('TrashedParty', 'TrashedParty')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (Customer::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Customer was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
    	 $TrashedParty = Customer::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('krishna.customer', compact('TrashedParty', 'TrashedParty'));
    }
}
