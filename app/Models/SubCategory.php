<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class SubCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id' , 'country_id' , 'name' , 'category_id' 
    ];

    public function country(){
        return $this->hasOne('App\Models\Country','id','country_id');
    }
    
    public function category(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }
    
}
