<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category ;
use App\Models\Country ;
use App\Models\SubCategory ;
use App\Models\Content ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class ContentManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $alldata = Content::with('country')->with('category')->with('subCategory')->orderBy("id","desc")->get() ;
       return view('content.index',compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $countries = Country::orderBy("name","asc")->get();
         $subcategory = SubCategory::orderBy("name","asc")->get();
         $categoryList = Category::orderBy("name","asc")->get();
         return view('content.add',compact('countries', 'subcategory', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $image = "";
        $videoupload = "";

          if($request->video != '')
            {     
                
                $video=$request->file('video');
                        $videoupload = time().$video->getClientOriginalExtension();
                        $destinationPath = './storage/app/content_video';
                      $videos =  $video->move($destinationPath, $videoupload);
               // ===================             
            } 
       
         if($request->image != '')
            {     
               
               // ===================
                
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());                
                $img->stream(); // <-- Key point
                
                Storage::disk('local')->put('/content_image/'.'/'.$filename, $img, 'public');   
      
               // for update in table
               $image = $filename ;
            } 

          
      $contentdata = new Content;
      
       $contentdata->country_id = $request->country_id;
       $contentdata->cat_id = $request->category_id;
       $contentdata->sub_cat_id = $request->sub_category_id;
       $contentdata->content = $request->content;
       $contentdata->image = $image;
       $contentdata->video = $videoupload;
    
       $contentdata->save();
       
       return redirect('/content-management')->with('success_msg','Add Content Successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $countries = Country::orderBy("name","asc")->get();
         $subcategory = SubCategory::orderBy("name","asc")->get();
         $categoryList = Category::orderBy("name","asc")->get();
         $alldata = Content::find(intval($id));
         if (empty($alldata)) {
            return redirect('/content-management');
         }
         return view('content.show',compact('alldata', 'countries', 'subcategory', 'categoryList')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
         $countries = Country::orderBy("name","asc")->get();
         $categoryList = Category::orderBy("name","asc")->get();
         $alldata = Content::find(intval($id));
         $subcategory = SubCategory:: where(['country_id' => intval($alldata->country_id), 'category_id'=>intval($alldata->cat_id)])->get();
          if (empty($alldata)) {
            return redirect('/content-management');
         }
         return view('content.edit',compact('alldata', 'countries', 'subcategory', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    { 
       
      

       $contentdata = Content::find(intval($id));
      
       $contentdata->country_id = $request->country_id;
       $contentdata->cat_id = $request->category_id;
       $contentdata->sub_cat_id = $request->sub_category_id;
       $contentdata->content = $request->content;
           if($request->video != '')
            {     
                
                $video=$request->file('video');
                        $videoupload = time().$video->getClientOriginalExtension();
                        $destinationPath = './storage/app/content_video';
                      $videos =  $video->move($destinationPath, $videoupload);
               $contentdata->video = $videoupload;            
            } 
       
         if($request->image != '')
            {     
               
               // ===================
                
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());                
                $img->stream(); // <-- Key point
                
                Storage::disk('local')->put('/content_image/'.'/'.$filename, $img, 'public');   
      
               // for update in table
               $image = $filename ;
               $contentdata->image = $image;
            } 
     
        $contentdata->update();
       return redirect('/content-management')->with('success_msg','Update Content Successfully...');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
         $agent = Content::find(intval($id));
         $agent->delete();
         return redirect('/content-management')->with('success_msg','Delete Content Successfully...');
    }



      public function search(Request $request)
    {  
        $searchdata = $request->search;
          $alldata = Content::where('content', 'LIKE', '%'.$searchdata.'%')->with('country')->with('category')->with('subCategory')->get();
            if (count($alldata)==0 || empty($searchdata)) {
              return redirect('/content-management');
            }
       return view('content.search',compact('alldata'));
    }   

     public function category(Request $request)
    { 
    $Subcategorylist = SubCategory::where(['country_id' => intval($request->country_id), 'category_id'=>intval($request->category_id)])->get();
          if(count($Subcategorylist)>0){
             echo '<option value="">Select Sub Category</option>'; 
        foreach ($Subcategorylist as $key => $value) {

            echo '<option value="'.$value->id.'">'.$value->name.'</option>'; 
        } 
    }else{ 
        echo '<option value="">Select Sub Category </option>'.'<option value="">Sub Category not available</option>'; 
    } 
    }

        public function city(Request $request)
    {  
        
      $Categorylist = Category::where('country_id', '=', intval($request->country_id))->get();
      if(count($Categorylist) > 0){ 
        echo '<option value="">Select Category</option>'; 
        foreach ($Categorylist as $key => $value) {

            echo '<option value="'.$value->id.'">'.$value->name.'</option>'; 
        } 
    }else{ 
        echo '<option value="">Select Category </option>'.'<option value="">Category not available</option>'; 
    } 

      
    }



}
