<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Content extends Authenticatable
{
    use HasFactory, Notifiable;
 protected $table = 'content';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     
       'country_id',  'cat_id', 'sub_cat_id', 'content'
    ];

     public function country(){
        return $this->hasOne('App\Models\Country','id','country_id');
    }

    public function category(){
        return $this->hasOne('App\Models\Category','id','cat_id');
    }

     public function subCategory(){
        return $this->hasOne('App\Models\SubCategory','id','sub_cat_id');
    }
    
   
}
