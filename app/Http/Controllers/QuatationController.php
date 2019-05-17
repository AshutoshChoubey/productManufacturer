<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use DB;
use App\Supplier;
use App\itemCatagory;
use App\itemName;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\PurchaseInvoice;
use App\MeasurementData;
use App\MeasurementQuatation;

class QuatationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function index()
   {
    $viewData['customerSelect']= Customer::pluck('customer_name', 'id');
      return view('krishna.quatation.quatation',$viewData);
   }
    public function save(Request $request, $id = null)
    {
         $getFormAutoFillup = $request->all();
         $viewData['customerSelect']= Customer::pluck('customer_name', 'id');
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
              $saveDetail = request()->except(['_token','drawing','window_des','height','width','area','quantity','glass','drawing_description']);
                   $PartyManage['status']="pending";
              $savedData = new MeasurementQuatation($saveDetail);
              if($savedData->save())
              {
                    for($i=0; $i < count($request->drawing); $i++)
                    {
                        $saveUltidata = new MeasurementData;
                        $saveUltidata->measurement_id = $savedData->id;
                        $saveUltidata->drawing = $request->drawing[$i];
                        $saveUltidata->window_des = $request->window_des[$i];
                        $saveUltidata->width = $request->width[$i];
                        $saveUltidata->height = $request->height[$i];
                        $saveUltidata->area = $request->area[$i];
                        $saveUltidata->quantity = $request->quantity[$i];
                        $saveUltidata->glass = $request->glass[$i];
                        $saveUltidata->drawing_description = $request->drawing_description[$i];
                        $saveUltidata->status = 1;
                        $saveUltidata->user_id = Auth::user()->id;
                        if($saveUltidata->save())
                        {
                            $request->session()->flash('message.level', 'success');
                            $request->session()->flash('message.content', ' Saved Successfully!');
                        }           
                    }
              }
              
          
            }
        }    
      return view('krishna.quatation.quatation',$viewData)->with($getFormAutoFillup);
		}
    public function getData()
    {
        $table = DB::table('measurement_quatations')->join('customers','customers.id','=','measurement_quatations.customer_name');
        $table=$table->select('measurement_quatations.*','customers.customer_name as customerName','customers.contact_no as contactNo','customers.email')->orderBy('measurement_quatations.id','desc')->get();
        $viewData['tableData']=$table;
       return view('krishna.quatation.quatation_search',$viewData);
    }
    public function measurementdataView($quatationId)
    {
        // echo $quatationId;
      // DB::enableQueryLog();
        $table=DB::table('measurement_quatations')->join('customers','customers.id','=','measurement_quatations.customer_name')->join('measurement_datas','measurement_datas.measurement_id','=','measurement_quatations.id')->where('measurement_quatations.id','=',$quatationId);
        $table=$table->select('measurement_quatations.id as measurementQuatationId','measurement_quatations.*','measurement_datas.*','customers.customer_name as customerName','customers.contact_no as contactNo','customers.email')->orderBy('measurement_datas.id','asc')->get();
        $viewData['MeasurementQuatationView']= json_decode(json_encode($table), true);
        // exit;
        return view('krishna.quatation.measurementDetail',$viewData);

    }
    public function create($quatationId)
    {
        // $viewData['MeasurementQuatation']= MeasurementQuatation::whereId($quatationId)->first()->toArray(); 
        $viewData['measurementId']=$quatationId;
        return view('krishna.quatation.createQuatation',$viewData);
    }
    
}
