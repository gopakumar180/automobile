<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Category;
use App\VehicleStatus;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return  Vehicle::orderBy('id','desc')->get();
    }

    public function category()
    {
     
       return Category::all();
    }

    public function vehicleStatus()
    {
       return VehicleStatus::all();
    }
    public function viewFullDetails()
    {
       
         return  DB::table('vehicles')
        ->join('companies', 'vehicles.company_id', '=', 'companies.id')
        ->join('vehicle_models', 'vehicles.model_id', '=', 'vehicle_models.id')
        ->join('categories', 'vehicles.category_id', '=', 'categories.id')
        ->join('vehicle_status', 'vehicles.vehicle_status_id', '=', 'vehicle_status.id')
        ->select('vehicles.*', 'companies.title as company','vehicle_models.title as model',
        'categories.title as category','vehicle_status.status as status')
        ->get(); 
       
    }
    public function vehicleByType($type)
    {
       
         return  DB::table('vehicles')
        ->join('companies', 'vehicles.company_id', '=', 'companies.id')
        ->join('vehicle_models', 'vehicles.model_id', '=', 'vehicle_models.id')
        ->join('categories', 'vehicles.category_id', '=', 'categories.id')
        ->join('vehicle_status', 'vehicles.vehicle_status_id', '=', 'vehicle_status.id')
        ->select('vehicles.*', 'companies.title as company','vehicle_models.title as model',
        'categories.title as category','vehicle_status.status as status')
        ->where('vehicles.vehicle_status_id',$type)
        ->get(); 
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'model_id'=>'required|not_in:null',
            $this->validate($request,[

            'company_id'=>'required|not_in:null',
           
            'title'=>'required',
            'category_id' =>'required|not_in:null',
            'model_year' =>'required',
            'vehicle_number' =>'required',
            'purchased_address1' =>'required|string|max:225',
            'purchased_type' =>'required|not_in:null',
            'purchased_date' =>'required',
            'purchased_amount' =>'required|regex:/^\d*(\.\d{1,2})?$/',
            'vehicle_status_id' =>'required|not_in:null',
            'purchased_phone1'=>'required|string|regex:/[0-9]{10}/|digits:10',
            ]);

            if($request->insurance_amount !="")
            {
                $this->validate($request,[
              'insurance_amount' =>'required|regex:/^\d*(\.\d{1,2})?$/',

                ]);
            }

            if($request->purchased_phone2 !="")
            {
                $this->validate($request,[
                    'purchased_phone2'=>'string|regex:/[0-9]{10}/|digits:10',
                ]);
            }
            if($request->purchased_phone3 !="")
            {
                $this->validate($request,[
                    'purchased_phone3'=>'string|regex:/[0-9]{10}/|digits:10',
                ]);
            }

            if($request->vehicle_status_id ==7)
            {
                $this->validate($request,[
                    'advanced_amount'=>"required|regex:/^\d*(\.\d{1,2})?$/",
                ]);
            }
            if($request->vehicle_status_id ==6)
            {
                $this->validate($request,[
                    'refund_amount'=>"required|regex:/^\d*(\.\d{1,2})?$/",
                ]);
            }

            $imageName="";

            if($request->rc_photo !="")
            {
            $image = $request->rc_photo; 
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace('data:image/gif;base64,', '', $image);            
            $image = str_replace(' ', '+', $image);
           $imageName = str_random(10).'.'.'png';
            \File::put(public_path(). '/storage/rc/' . $imageName, base64_decode($image));
            }

     Vehicle::create([
    'company_id'=>$request->company_id,
    'model_id'=>$request->model_id,
    'title'=>$request->title,
    'category_id'=>$request->category_id,
    'model_year'=>$request->model_year,
    'vehicle_number'=>$request->vehicle_number,
    'purchased_from'=>$request->purchased_from,
    'purchased_address1'=>$request->purchased_address1,
    'purchased_address2'=>$request->purchased_address2,
    'purchased_phone1'=>$request->purchased_phone1,
    'purchased_phone2'=>$request->purchased_phone2,
    'purchased_phone3'=>$request->purchased_phone3,
    'purchased_type'=>$request->purchased_type,
    'purchased_date'=>$request->purchased_date,
    'kilometer_reading'=>$request->kilometer_reading,
    'purchased_amount'=>$request->purchased_amount,
    'insurance_amount'=>$request->insurance_amount,
    'engine_work_expense'=>$request->engine_work_expense,
    'clutch_work_expense'=>$request->clutch_work_expense,
    'piston_work_expense'=>$request->piston_work_expense,
    'chain_sprocket_work_expense'=>$request->chain_sprocket_work_expense,
    'other_work_expense'=>$request->other_work_expense,
    'other_work_expense_note'=>$request->other_work_expense,
    'mechanical_expense_remarks'=>$request->mechanical_expense_remarks,
    'total_expense'=>$request->total_expense,
    'insurance_due_date'=>$request->insurance_due_date,
    'selling_price'=>$request->selling_price,
    'vehicle_status_id'=>$request->vehicle_status_id,
    'advanced_amount'=>$request->advanced_amount,
    'refund_amount'=>$request->refund_amount,
    'hp_noting'=>$request->hp_noting,
    'damage_info'=>$request->damage_info,
    'rc_photo'=>$imageName,
    'remarks'=>$request->remarks,
    'total_amount'=>$request->purchased_amount + $request->total_expense,

    'created_by'=>$request->created_by,
    'updated_by'=>$request->updated_by,
        ]);
        return response()->json([
            'data ' => "success" ,
           
            ],200);
    

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
         return  DB::table('vehicles')
        ->join('companies', 'vehicles.company_id', '=', 'companies.id')
        ->join('vehicle_models', 'vehicles.model_id', '=', 'vehicle_models.id')
        ->join('categories', 'vehicles.category_id', '=', 'categories.id')
        ->join('vehicle_status', 'vehicles.vehicle_status_id', '=', 'vehicle_status.id')
        ->where('vehicles.id', '=', $id)
        ->select('vehicles.*', 'companies.title as company','vehicle_models.title as model',
        'categories.title as category','vehicle_status.status as status')
        ->get(); 
       
    }


    public function edit($id)
    {
        return Vehicle::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vehicleExpenses(Request $request,$id)
    {
       
        $total_exp=$request->engine_work_expense + $request->clutch_work_expense +$request->piston_work_expense +
        $request->chain_sprocket_work_expense + $request->other_work_expense ;
        $data=array(
            
            
            'engine_work_expense'=>$request->engine_work_expense,
            'clutch_work_expense'=>$request->clutch_work_expense,
            'piston_work_expense'=>$request->piston_work_expense,
            'chain_sprocket_work_expense'=>$request->chain_sprocket_work_expense,
            'other_work_expense'=>$request->other_work_expense,
            'other_work_expense_note'=>$request->other_work_expense_note,
            'mechanical_expense_remarks'=>$request->mechanical_expense_remarks,
            'total_expense'=>$total_exp,
            
        );
        Vehicle::find($id)->update($data);
        return response()->json([
            'data ' => "success" ,
           
            ],200);
    }

    public function vehicleInsurance(Request $request,$id)
    {
       
       
        $data=array(
            
            
            'insurance_amount'=>$request->insurance_amount,
            'insurance_due_date'=>$request->insurance_due_date,
            
        );
        Vehicle::find($id)->update($data);
        return response()->json([
            'data ' => "success" ,
           
            ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        $this->validate($request,[

            'company_id'=>'required|not_in:null',
            'model_id'=>'required|not_in:null',
            'title'=>'required',
            'category_id' =>'required|not_in:null',
            'model_year' =>'required',
            'vehicle_number' =>'required',
            'purchased_address1' =>'required|string|max:225',
            'purchased_type' =>'required|not_in:null',
            'purchased_date' =>'required',
            'purchased_amount' =>'required|regex:/^\d*(\.\d{1,2})?$/',
            'selling_price' =>'required|regex:/^\d*(\.\d{1,2})?$/',
            'sold_out_price' =>'required',
            'sold_out_date' =>'required',
            'vehicle_status_id' =>'required|not_in:null',
            'purchased_phone1'=>'required|string|regex:/[0-9]{10}/|digits:10',
            ]);

            if($request->insurance_amount !="")
            {
                $this->validate($request,[
              'insurance_amount' =>'required|regex:/^\d*(\.\d{1,2})?$/',

                ]);
            }

            if($request->purchased_phone2 !="")
            {
                $this->validate($request,[
                    'purchased_phone2'=>'string|regex:/[0-9]{10}/|digits:10',
                ]);
            }
            if($request->purchased_phone3 !="")
            {
                $this->validate($request,[
                    'purchased_phone3'=>'string|regex:/[0-9]{10}/|digits:10',
                ]);
            }

            if($request->vehicle_status_id ==7)
            {
                $this->validate($request,[
                    'advanced_amount'=>"required|regex:/^\d*(\.\d{1,2})?$/",
                ]);
            }
            if($request->vehicle_status_id ==6)
            {
                $this->validate($request,[
                    'refund_amount'=>"required|regex:/^\d*(\.\d{1,2})?$/",
                ]);
            }
            $imageName="";

            if($request->rc_photo !="")
            {
                $image=$request->rc_photo;
                $image = str_replace('data:image/jpeg;base64,', '', $image);
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace('data:image/gif;base64,', '', $image);            
                $image = str_replace(' ', '+', $image);
              
               $imageName = str_random(10).'.'.'png';
                \File::put(public_path(). '/storage/rc/' . $imageName, base64_decode($image));
            }
        $data=array(
            
            'company_id'=>$request->company_id,
            'model_id'=>$request->model_id,
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'model_year'=>$request->model_year,
            'vehicle_number'=>$request->vehicle_number,
            'purchased_from'=>$request->purchased_from,
            'purchased_address1'=>$request->purchased_address1,
            'purchased_address2'=>$request->purchased_address2,
            'purchased_phone1'=>$request->purchased_phone1,
            'purchased_phone2'=>$request->purchased_phone2,
            'purchased_phone3'=>$request->purchased_phone3,
            'purchased_type'=>$request->purchased_type,
            'purchased_date'=>$request->purchased_date,
            'kilometer_reading'=>$request->kilometer_reading,
            'purchased_amount'=>$request->purchased_amount,
            'insurance_amount'=>$request->insurance_amount,
            'engine_work_expense'=>$request->engine_work_expense,
            'clutch_work_expense'=>$request->clutch_work_expense,
            'piston_work_expense'=>$request->piston_work_expense,
            'chain_sprocket_work_expense'=>$request->chain_sprocket_work_expense,
            'other_work_expense'=>$request->other_work_expense,
            'other_work_expense_note'=>$request->other_work_expense,
            'mechanical_expense_remarks'=>$request->mechanical_expense_remarks,
            'total_expense'=>$request->total_expense,
            'insurance_due_date'=>$request->insurance_due_date,
            'selling_price'=>$request->selling_price,
            'sold_out_price'=>$request->sold_out_price,
            'sold_out_date'=>$request->sold_out_date,
            'vehicle_status_id'=>$request->vehicle_status_id,
            'advanced_amount'=>$request->advanced_amount,
            'refund_amount'=>$request->refund_amount,
            'hp_noting'=>$request->hp_noting,
            'damage_info'=>$request->damage_info,
            'rc_photo'=>$imageName,
            'remarks'=>$request->remarks,
            'total_amount'=>$request->purchased_amount + $request->total_expense,
            'created_by'=>$request->created_by,
            'updated_by'=>$request->updated_by,
           
        );
        Vehicle::find($id)->update($data);
        return response()->json([
            'data ' => "success" ,
           
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id != null) {
            $Vehicle = Vehicle::find($id);
            $Vehicle->delete();    
        }
        return response()->json([
            'data ' => "success" ,
           
            ],200);
    
    }
    

    public function search(Request $request)
    {
       
    $from=$request->from;
    $to=$request->to;

  
    $dateS = new Carbon($from);
    $dateE = new Carbon($to);

     $data=  DB::table('vehicles')
    ->join('companies', 'vehicles.company_id', '=', 'companies.id')
    ->join('vehicle_models', 'vehicles.model_id', '=', 'vehicle_models.id')
    ->whereBetween('vehicles.created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])
    ->select('vehicles.*', 'companies.title as company','vehicle_models.title as model')
    ->get();

    return $data;
    }


    public function reports()
    {
       
        $result = Vehicle::whereDate('created_at', Carbon::today())->get();
        return $result;
    }

   
    public function sync()
    {

        $mysql_host                 = '127.0.0.1';
        $mysql_username             = 'root';
        $mysql_password             = '';
        $mysql_database1            = 'automobile_db';
        $mysql_database2            = 'sync_db';
        
        $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password) or die( mysql_error());
        
        /*  Begin Transaction   */
        $mysqli->autocommit(FALSE); 
        
        
        /*  Insert data from db1 to db2 */
        $query  =  "    INSERT INTO $mysql_database1.table1";
        
        $a  =   $mysqli->query($query); 
        
        $query  =  "    INSERT INTO $mysql_database1.table2
                    SELECT 
                        *
                    FROM $mysql_database2.table2
                    WHERE NOT EXISTS(SELECT * from $mysql_database1.table2)     
        ";
        $d  =   $mysqli->query($query); 
        
        
        if ($a and $b) 
        {
            $mysqli->commit();      
            echo "Data synched successfully.";
        } else {        
        
            $mysqli->rollback();        
            echo "Data failed to synch.";
        }
   }
}
