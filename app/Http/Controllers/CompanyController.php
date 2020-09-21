<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use DB;
//use App\Product;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return  Company::all();

       
    }

    public function featured_category()
    {
       //return  Category::inRandomOrder()->limit(6)->where('featured' , 1)->get();
      // return Category::where('featured',1)->orderBy(DB::raw('RAND(6)'))->get();
      
      // $listing_count = Product::where('category_id', $id)->count();
    
      
       return DB::table("categories")

       ->select("categories.*", DB::raw("count(products.id) as count"))

       ->join("products","products.category_id","=","categories.id")

       ->groupBy("categories.id")

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

         $this->validate($request,[
            
            'title'=>'required|unique:companies|max:225|string',
            'image'=>'required',
            ]); 

            $imageName="";

            if($request->image !="")
            {
            $image = $request->image; 
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace('data:image/gif;base64,', '', $image);            
            $image = str_replace(' ', '+', $image);
           $imageName = str_random(10).'.'.'png';
            \File::put(public_path(). '/storage/company/' . $imageName, base64_decode($image));
            }

        $company = new Company();
        $company->title = $request->title;
        $company->image = $imageName;
        $company->save();
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
        return Company::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
            'title'=>'required|max:225|string|unique:companies,title,'.$id,
            'image'=>'required',
            
            ]);
            
            $imageName=$request->photo;

            $em= Company::find($id);
 
             if($request->image != $em->image)
             {
                 
                $image=$request->image;
                $image = str_replace('data:image/jpeg;base64,', '', $image);
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace('data:image/gif;base64,', '', $image);            
                $image = str_replace(' ', '+', $image);
              
               $imageName = str_random(10).'.'.'png';
                \File::put(public_path(). '/storage/company/' . $imageName, base64_decode($image));
            }

        $data=array(
            'title'=>$request->title,
            'image'=>$imageName,
        );
        Company::find($id)->update($data);
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
            $category = Company::find($id);
            $category->delete();    
        }
        return response()->json([
            'data ' => "success" ,
           
            ],200);
    }
}
