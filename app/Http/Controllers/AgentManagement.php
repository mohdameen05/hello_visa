<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;


class AgentManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $alldata = User::all()->sortByDesc("id");
       $alldata = User::where('id','>',1)->get()->sortByDesc("id");
       return view('agent.index',compact('alldata'));
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
      
        // $request->validate([
        //       'name'=>['required','not_regex:/(?i)\b((?:https?:\/\/|[a-zA-Z]{0,}\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'" .,<>?«»“”‘’]))|<script/'],
        //       'email'=>'required|email',
        //       'password'=>['required','string',Password::min(6)->letters()->numbers()->mixedCase()->symbols()],
        //   ]);
      $agent = new User;
      
       $agent->name = $request->name;
       $agent->email = $request->email;
       $agent->username = $request->username;
       $agent->phone_number = $request->phone_number;
       $agent->password = Hash::make($request->password);
       $agent->save();


        // send mail
            
            $data = array('email'=>$request->email,
                'name'=>$request->name,
                'username'=>$request->username,
                'phone_number'=>$request->phone_number,
                'password'=>$request->password
            ) ;
              // view('mail',compact('data')); 
            // update token
             
            $sendMailSt = Mail::send(['html'=>'mail'], $data, function($message) use ($request) {
              $message->to($request->email, 'Agents Login')->subject
                ('Agent Login Credential Username And Password.') ;
              $message->from('mohdameen.ctinfotech@gmail.com','Admin') ;
            }) ;
       
       return redirect('/agent-management')->with('success_msg','Add Agent Successfully...');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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

        $agent = User::find(intval($id));
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->username = $request->username;
        $agent->phone_number = $request->phone_number;

        if (!empty($request->password)) {
         $agent->password = Hash::make($request->password);
        }
       
        $agent->update();

         if (!empty($request->password) || !empty($request->username)) {
         // send mail
            
            $data = array('email'=>$request->email,
                'name'=>$request->name,
                'username'=>$request->username,
                'phone_number'=>$request->phone_number,
                'password'=>$request->password
            ) ;
              // view('mail',compact('data')); 
            // update token
             
            $sendMailSt = Mail::send(['html'=>'mail'], $data, function($message) use ($request) {
              $message->to($request->email, 'Agents Login')->subject
                ('New Agent Login Credential Username And Password') ;
              $message->from('mohdameen.ctinfotech@gmail.com','Admin') ;
            }) ;
        }
       return redirect('/agent-management')->with('success_msg','Update Agent Successfully...');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
         $agent = User::find(intval($id));
         $agent->delete();
         return redirect('/agent-management')->with('success_msg','Delete Agent Successfully...');
    }
}
