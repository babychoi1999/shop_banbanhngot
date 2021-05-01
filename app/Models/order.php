<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "order";
    public function product(){
    	return $this->belongsto('App\Models\product','id_product','id');
    }
    public function bill(){
    	return $this->belongsto('App\Models\bill','id_bill','id');
    }
}
