<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehiclePhotos;
use File;

class VehiclePhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //$data = $request->json()->all();

        $files= $request->image; 
        
        foreach($files as $image){

           // $image = $request->rc_photo; 
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace('data:image/gif;base64,', '', $image);            
            $image = str_replace(' ', '+', $image);
          
           $imageName = str_random(10).'.'.'png';
            \File::put(public_path(). '/storage/vehicles/' . $imageName, base64_decode($image));
           $photos = new VehiclePhotos();
           $photos->url = $imageName;
           $photos->vehicle_id = $request->id;
           $photos->save();
        }

         return response()->json([
            'data ' => "success" ,
           
            ],200); 
       /*  $avatar = $data['avatar'];
        $id = $data['id'];
       /*  $filename = $data['avatar']['filename']; 
        $filetype = $data['avatar']['filetype'];  
        $image = $data['avatar']['value']; 
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str_random(10).'.'.'png';
        \File::put(public_path(). '/files/' . $imageName, base64_decode($image));
        
        $photos = new VehiclePhotos();
        $photos->url = $imageName;
        $photos->vehicle_id = $id;
        $photos->save();
        return response()->json([
            'data ' => "success" ,
           
            ],200); */
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return VehiclePhotos::where('vehicle_id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        //
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
            $Vehicle = VehiclePhotos::find($id);
            File::delete(public_path(). '/storage/vehicles/' . $Vehicle->url);
            $Vehicle->delete();    
        }
        return response()->json([
            'data ' => "success" ,
           
            ],200);
    }
}
