<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'last_name' => 'required|string',
            'mobile' => 'required|min:10|numeric',
            'email'=>'nullable|email',
            'password' => 'required|string', 
            'device_token' => 'required|string', 
            'device_type' => 'required|string', 
        ];        
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    
}