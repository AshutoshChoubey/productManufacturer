<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;
use Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
    $viewData['pageTitle'] = 'Employee Detail';
       
        $getFormAutoFillup=array();
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = Employee::whereId($id)->first()->toArray();
    	}
    	else 
    	{
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValue=$request->all();
                $allInputValueManage = new Employee($allInputValue);
                $allInputValueManage['user_id']=Auth::user()->id;
                if($allInputValueManage->save()){
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Employee Detail Saved Successfully!');
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
         $viewData['employee'] = Employee::orderBy('id','desc')->get(); 
         // print_r($viewData['employee']) ;
         // exit;	
		return view('krishna.employee', $viewData)->with($getFormAutoFillup);
    }

    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Employee Dretail'; 
        $getFormAutoFillup=array();
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValueForUpdate=request()->except(['_token']);
                $allInputValueForUpdate['user_id']=Auth::user()->id;

                if(Employee::where([['id', '=', $request->id]])->update($allInputValueForUpdate)){
                    $request->session()->flash('message.level', 'info');
                    $request->session()->flash('message.content', 'Employee Dretails Updated Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
            
             $viewData['employee'] = Employee::orderBy('id','desc')->get();  
        return view('krishna.employee', $viewData)->with($getFormAutoFillup);
    }
     public function view(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		// echo $request->created_at_from;echo "<br/>";
    		// echo $request->created_at_to;
    		// exit;
    		//DB::enableQueryLog();
    		$viewData['pageTitle'] = 'Employee';       	
			$employee= DB::table('employees');
			if($request->has('id') && $request->id !=''){
				$employee->where('id', '=', $request->id);
			}
			if($request->has('emp_name') && $request->emp_name !=''){
				$employee->where('emp_name', 'like', '%'.$request->emp_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$created_at_from = date("Y-m-d", strtotime($request->created_at_from) );
				$employee->whereDate('created_at', '<=', $created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$created_at_to = date("Y-m-d", strtotime($request->created_at_to) );
				$employee->whereDate('created_at', '>=', $created_at_to);
			}
			if($request->has('emp_contact_no') && $request->emp_contact_no !=''){
				$employee->where('emp_contact_no', '=', $request->contact_no);
			}
			if($request->has('emp_email') && $request->email !=''){
				$employee->where('emp_email', '=', $request->emp_email);
			}
			$employee->orderBy('id','desc');
       		$employee= $employee->get();
//        		$queries = DB::getQueryLog();
// print_r($queries);
// exit;
			$viewData['employee']=json_decode(json_encode($employee), true);
		    return view('krishna.employee', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'Employee';       	
			$viewData['employee'] = Employee::orderBy('id','desc')->get();
		    return view('krishna.employee', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Employee::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Employee was Trashed!');
            $viewData['pageTitle'] = 'Employee';       	
			$viewData['employee'] = Employee::get();
			return view('krishna.employee', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Employee';       	
			$viewData['employee'] = Employee::get();;
			return view('krishna.employee', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedParty = Employee::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('krishna.employee.delete', compact('TrashedParty', 'TrashedParty')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (Employee::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Employee was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
    	 $TrashedParty = Employee::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('krishna.employee', compact('TrashedParty', 'TrashedParty'));
    }
}
