<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\Category ;
use App\Models\Country ;
use App\Models\SubCategory ;
use App\Models\Content ;
use Session;





class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $countries = Country::orderBy("name","asc")->get();
         return view('website.agentindex',compact('countries'));
       
    }


       /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $users = User::find(intval($id));
         return view('website.agentprofile',compact('users'));
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
      if ($request->newpassword != $request->confirmpassword) {
          return  redirect('agent')->with('error_msg','Confirm Password Not Matche....');
      }
      $user = User::find(intval($id));
       $user->name = $request->name;
       $user->email = $request->email;
       $user->username = $request->username;
       if (!empty($request->password)) {
       $user->password =  Hash::make($request->password);
       }
       $user->update();
       return redirect('agent')->with('success_msg','Update Profile Successfully...');
    }

    public function loginview()
    {
        return view('website.agentlogin'); // login page agent done view
    } 

    public function content_details($id, $status = null)
    {
        if($status == null){

        $ckd = Category::find(intval($id));
        $content = Content::where(['country_id'=>$ckd->country_id,'cat_id'=>$ckd->id])->first();
    }else{
        $ckd = SubCategory::find(intval($id));
        $content = Content::where(['country_id'=>$ckd->country_id,'cat_id'=>$ckd->category_id,'sub_cat_id'=>$ckd->id])->first();
    }
   if (!empty($content)) {
        return view('website.agent_visa_content',compact('content'));
   }
         return  redirect('agent')->with('error_msg','Details Not Available Now');
   

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        if(!empty($request)) 
        {
            $username = $request->input('username') ;
            $password = $request->input('password') ;

            $user_record = User::where('username', $username)->first() ;

            if (empty($user_record))
            {
                return redirect()->back()
                ->with('error_msg' , 'These credentials does not match with our records!!') ;
            }
            if ($user_record->password){
                $hash_password = $user_record->password ;
            }
            if (!empty($user_record) && Hash::check($password, $hash_password)){
                $session = array(
                    'id' => $user_record->id ,
                    'name' => $user_record->name ,
                    'email' => $user_record->email ,
                    'username' => $user_record->username ,
                    'profile_image' => $user_record->profile_image ,
                ) ;

                $request->session()->put('agent_info', $session);
                return redirect('agent') 
                ->with('success_msg' , 'Login successfully!!');
            }
            else
            {
                if (!empty($user_record)){
                    return redirect()->back()
                    ->with('error_msg', 'Password is incorrect !!');
                }else{
                    return redirect()->back()
                    ->with('error_msg', 'Username/Email is incorrect !!!');
                }
            }
        }
        else
        {
            return redirect('login') ;
        }
    }


     public function logout(){         
        Session::flush() ;
        session()->forget('agent_info') ;
        return redirect('/login') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
       
    }
}
