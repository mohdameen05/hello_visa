<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Hash;
class UserRepository
{
    public function __construct(
        User $user){
            $this->user = $user;
            $this->apiToken = uniqid(base64_encode(str_random(200)));
        }

        public function getUserById($id){
           return User::where('id',$id)->first() ;
        }

        public function register($request)
         {
            $requestData = [ 
            'name' => $request->name , 
            'email' => $request->email , 
            'password' => Hash::make($request->password) , 
            'remember_token' => $this->apiToken, 
            'status' => '0' ] ;
     
            return $this->user->insertGetId($requestData) ;
         }

    }