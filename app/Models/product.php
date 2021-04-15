<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = "products";
    public function productType(){
    	return $this->belongsto('App\Models\productType','id_type','id');
    }
    public function billDetail(){
    	return $this->hasMany('App\Models\billDetail','id_product','id');
    }
}
