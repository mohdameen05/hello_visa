<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
use File;
use Image;
use Session;
use App\Models\User ;
use Cookie;
use Mail;
use Illuminate\Support\Str;
use App\Models\Category ;
use App\Models\SubCategory ;
use App\Models\Content ;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

  class AdminController extends Controller {

    /**
     * Show the application tournament.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    // ===================== Dashboard & Other 
    
    public function admin_dashboard()
     {
        $ttlUser = User::select('id')->where('id','!=','1')->whereNull('status')->orWhere('status','!=','deleted')->get()->count() ;
        $ttBlocklUser = User::select('id')->where('id','!=','1')->where('status','block')->get()->count() ;
        $CategoryTotal = Category::count();
        $UserTotal = User::where('id','!=','1')->count();
        $SubCategoryTotal = SubCategory::count();
        $ContentTotal = Content::count();
         return view('admin.dashboard',compact('UserTotal', 'CategoryTotal', 'SubCategoryTotal', 'ContentTotal'));
      

     }
      
    public function adm_profile()
    {   
        $admin = User::where('id','1')->first() ;
        return view('admin/from-example',compact('admin')) ;
    }
    
    public function profile_update(Request $request){
 
     $User = User::where('id','1')->first() ;
      
     if($request->file != ''){        
          $path = public_path().'/uploads/profile-image/';

          //code for remove old file
          if($User->profile_image != '' && $User->profile_image != null){
               $file_old = $path.$User->profile_image ;
               unlink($file_old);
          }

          //upload new file
          $file = $request->file;           
          $filename = $file->getClientOriginalName() ;
          $file->move($path, $filename) ;

          //for update in table
          $data['profile_image'] = $filename  ;
      }
      
      $data['name'] = $request->name ;
      $data['email'] = $request->email ;
      if(!empty($request->password)){
         $data['password'] = Hash::make($request->password) ;
      }

     $updateRecord = User::where('id','1')->update($data);
       
       if($updateRecord)
        {
          // update Session   
          $user_record = User::where('id','1')->first() ;  
            
            $session = array(
                'id' => $user_record->id ,
                'name' => $user_record->name ,
                'email' => $user_record->email ,
                'profile_image' => $user_record->profile_image ,
               );
           
            $request->session()->put('admin_info', $session);
            
         // ==============
         
          return redirect('adm-profile')
          ->with('success_msg' , 'Profile updated successfully!!!') ;
         }
          else
         {
          return redirect('adm-profile')
           ->with('error_msg' , 'Record not updated!!') ;   
        } 
    }
    
         
    public function globalDelete(Request $request)
     {
          $tableid = $request->tableId ;
          $getId = $id = $request->id ;
          
          if( $tableid == 1 )
          {
              $table = 'categories' ;
          }
          else if( $tableid == 2 )
          {
              $table = 'sub_categories' ;
          }
          else if( $tableid == 3 )
          {
              $table = 'countries' ;
          }
          else if( $tableid == 4 )
          {
              $table = 'content' ;
          }
          else if( $tableid == 5 )
          {
              $table = 'users' ;
          }
          else 
          {
              $table = '' ;
          }
         
          $delete_status = DB::table($table)->where('id',$getId)->delete() ;
       
        if($delete_status) 
         {
            return [ 'success'=>true ,'msg'=> "Data Deleted successfully!!!" ];
          } else {
            return [ 'success'=>false ,'msg'=> "Data not Deleted." ]; 
         }
    }
   
 }