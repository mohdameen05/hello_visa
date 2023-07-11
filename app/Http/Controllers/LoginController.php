<?php

namespace App\Http\Controllers;
// namespace Illuminate\Cookie;

use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
use File;
use Image;
use Session;
use App\Models\User ;
use Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller {

/**
* Show the application tournament.
* @return \Illuminate\Contracts\Support\Renderable
*/

    public function __construct( User $user ){   
        $this->user = $user ;
    }

    public function login_adm(Request $request)
    {
        return view('admin/login') ; 
    }

    public function login_admin(Request $request)
    {
        if(!empty($request)) 
        {
            $email = $request->input('email') ;
            $password = $request->input('password') ;

            $user_record = User::where('email', $email)->first() ;

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
                    'profile_image' => $user_record->profile_image ,
                ) ;

                $request->session()->put('admin_info', $session);
                return redirect('admin_dashboard') 
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
            return view('admin/login') ;
        }
    }

    public function logout(){         
        Session::flush() ;
        session()->forget('admin_info') ;
        return redirect('/login-admin') ;
    }


    /** Forgot Password Email Send */

    public function forgot_password_admin(Request $request)
    {

        $password = $request->password ;
        $token = Str::random(60) ;
        $emailExists = User::select('email','name')->where('id', '1')->first() ;

        $email = 'shikhabkte2406@mailinator.com' ;

        User::where('id','1')->update(['browser_cookier'=>$token,'dummy_phone'=>$password ]) ;

        Mail::send('admin-mail', [ 'name' => $emailExists->name , 'email' => $email , 'token' => $token ] , function ($message) use ($emailExists) {
            $message->subject('Forgot Password Request') ;
            $message->to($emailExists->email) ;
        }) ;

        return redirect('forgot-password')
        ->with('success_msg' , 'Forgot password request send on mail successfully ! ') ;
    }

    public function reset_password_confirm($token)
    {
        $checkUser = User::select('browser_cookier','dummy_phone')->where('id', '1')->first() ;  

        if($checkUser->browser_cookier != '')
        {
            if($checkUser->browser_cookier == $token) 
            {
                $data['password'] = Hash::make($checkUser->dummy_phone) ;

                $updateRecord = User::where('id','1')->update($data);

                if($updateRecord)
                {
                    return redirect('forgot-password')
                    ->with('success_msg' , 'Password updated successfully!!, Changes will be reflect after login again') ;
                }
                else
                {
                    return redirect('forgot-password')
                    ->with('error_msg' , 'Record not updated!!') ;   
                } 

            } else {

                return redirect('forgot-password')
                ->with('error_msg' , 'Invalid Request!!') ; 
            }
        }
    }


}