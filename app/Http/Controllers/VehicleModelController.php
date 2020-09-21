<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleModel;
use DB;
class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  VehicleModel::all();

    }

    public function getModel($id)
    {
         return  VehicleModel::where('company_id',$id)->get();
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
        $this->validate($request,[
            'company_id'=>'required|not_in:null',
            'title'=>'required|unique:vehicle_models|max:225|string',
           
         ]);

        $model = new VehicleModel();
        $model->title = $request->title;
        $model->company_id = $request->company_id;
        $model->save();
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
       
       return  DB::table('vehicle_models')->join('companies', 'vehicle_models.company_id', '=', 'companies.id')
        ->where('vehicle_models.id', '=', $id)->select('vehicle_models.title', 'companies.title as company')->get();
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return VehicleModel::find($id);
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
            'title'=>'required|unique:vehicle_model,title,'.$id,           
         ]);
        $data=array(
            'title'=>$request->title,
            'company_id' => $request->company_id,
            
           
        );
        VehicleModel::find($id)->update($data);
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
         // Delete the Product
         if ($id != null) {
            $category = VehicleModel::find($id);
            $category->delete();    
        }
        return response()->json([
            'data ' => "success" ,
           
            ],200);
    }
}
