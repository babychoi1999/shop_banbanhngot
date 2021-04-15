<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    use HasFactory;
    protected $table = "bills";
    public function billDetail(){
    	return $this->hasMany('App\Models\billDetail','id_bill','id');
    
    }
    public function customer(){
    	return $this->belongsto('App\Models\customer','id_customer','id');
    }
}    
