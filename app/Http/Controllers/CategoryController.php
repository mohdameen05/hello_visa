<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
use File;
// use Image;
use Session;
use App\Models\User ;
use App\Models\Category ;
use App\Models\SubCategory ;
use App\Models\Country ;
use Cookie;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

  class CategoryController extends Controller {

    /**
     * Show the application tournament.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    // ===================== Dashboard & Other 
     
    public function categories()
     {
        $categories = Category::with('country')->orderBy('id', 'DESC')->get() ;
        $countries = Country::orderBy('id', 'DESC')->get() ;
        return view('admin/category-list', compact('categories','countries')) ;
     }
      
    public function save_category(Request $request)
     {
         DB::beginTransaction();
        
         try {  
  
           $data['name'] = $request->name ;  
           $data['country_id'] = $request->country_id ;
             
           $insert = Category::insertGetId($data) ;

           DB::commit();
            
           if($insert)
           {
              return redirect('categories')->with('success_msg' , 'Category added successfully!!' ) ;  
           }
           else
           {
              return redirect('categories')->with('error_msg' , 'Something went wrong!!' ) ;
           }
         }
         catch(\Exception $e)
         {
            DB::rollback();
            return redirect('categories')->with('error_msg' , 'Oops! Something went wrong!!') ;  
        } 

     }
    
    public function update_category(Request $request)
     {
        DB::beginTransaction();
        
         try { 
 
            $id = $request->id ;
            $data['name'] = $request->name ;
            $data['country_id'] = $request->country_id ;
            
            $update = Category::where('id',$id)->update($data) ;
 
            DB::commit();
            
           if($update)
           {
             return redirect('categories')->with('success_msg' , 'Category updated successfully!!') ;  
           }
           else
           {
             return redirect('categories')->with('error_msg' , 'Something went wrong!!') ;
           }
 
         }
         catch(\Exception $e)
         {
            DB::rollback();
            return redirect('categories')->with('error_msg' , 'Oops! Something went wrong!!') ;  
         }  
     } 
   
    public function countriesList()
     {
        $countries = Country::orderBy('id','DESC')->get() ;
        return view('admin/country-list' , compact('countries') ) ;
     }
 
    public function save_country(Request $request)
     {
         DB::beginTransaction() ;
        
         try { 
             if($request->image != '')
            {     
               
               // ===================
                
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());                
                $img->stream(); // <-- Key point
                
                Storage::disk('local')->put('/country/'.'/'.$filename, $img, 'public');   
      
               // for update in table
               $data['image'] = $filename ;
            } 
         
           $data['name'] = $request->name ;
            
           $insert = Country::insertGetId($data) ;

           DB::commit();
            
           if($insert)
           {
               return redirect('countries')->with('success_msg', 'Country added successfully!!') ;  
           }
           else
           {
               return redirect('countries')->with('error_msg', 'Something went wrong!!') ;
           }
         }
         catch(\Exception $e)
         {
            DB::rollback();
            return redirect('countries')->with('error_msg', 'Oops! Something went wrong!!') ;  
        }   
    }
 
    public function country_update(Request $request)
     {
         DB::beginTransaction();
        
         try { 
            $id = $request->id ;
          $country = Country::find(intval($id));

            if($request->image != '')
            {     
              
                
               // unlink the old file
               $path = Storage::disk('local')->url('country/'.$country->image); ;
               $file_path = file_exists( $path) ;
         
                // You can also check existance of the file in storage.
                if( $file_path ) { 
                   unlink($file_path) ; //delete from storage
                } 
               // ===================
                
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());                
                $img->stream(); // <-- Key point
                
                Storage::disk('local')->put('/country/'.'/'.$filename, $img, 'public');
                
               // for update in table
               $data['image'] = $filename ;
          } 
            $data['name'] = $request->name ;
            
            $update = Country::where('id',$id)->update($data) ;

           DB::commit();
            
           if($update)
           {
              return redirect('countries')->with('success_msg', 'Country updated successfully!!') ;  
           }
           else
           {
              return redirect('countries')->with('error_msg', 'Something went wrong!!') ;
           }
 
         }
         catch(\Exception $e)
         {
            DB::rollback();
            return redirect('countries')->with('error_msg' , 'Oops! Something went wrong!!') ;  
       }  
    } 
 
    public function subCategories()
    {
         
        $countries = Country::get() ;
        $categories = Category::get() ;
        $subcategoryList = SubCategory::get() ;

        return view('admin/sub-category', compact( 'countries', 'categories', 'subcategoryList' ) ) ;
     }
       
    public function save_sub_category(Request $request)
    {
        DB::beginTransaction();
         try {  
 
          $data['name'] = $request->name ;  
          $data['country_id'] = $request->country_id ;
          $data['category_id'] = $request->sub_category_id ;
            
          $insert = SubCategory::insertGetId($data) ;

          DB::commit();
           
          if($insert)
          {
             return redirect('sub-category')->with('success_msg' , 'Sub category added successfully!!' ) ;  
          }
          else
          {
             return redirect('sub-category')->with('error_msg' , 'Something went wrong!!' ) ;
          }
        }
        catch(\Exception $e)
        {
           DB::rollback();
           return redirect('sub-category')->with('error_msg' , 'Oops! Something went wrong!!') ;  
       } 
    }
   
    public function update_sub_category(Request $request)
    {
       DB::beginTransaction();
       
        try { 

           $id = $request->id ;
           $data['name'] = $request->name ;
           $data['country_id'] = $request->country_id ;
           $data['category_id'] = $request->sub_category_id ;
           
           $update = SubCategory::where('id',$id)->update($data) ;

           DB::commit();
           
          if($update)
          {
            return redirect('sub-category')->with('success_msg' , 'Sub category updated successfully!!') ;  
          }
          else
          {
            return redirect('sub-category')->with('error_msg' , 'Something went wrong!!') ;
          }

        }
        catch(\Exception $e)
        {
           DB::rollback();
           return redirect('sub-category')->with('error_msg' , 'Oops! Something went wrong!!') ;  
        }  
    } 
     
    
     
 
    
 }