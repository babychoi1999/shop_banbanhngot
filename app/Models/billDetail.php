<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billDetail extends Model
{
    use HasFactory;
    protected $table = "bill_detail";
    public function product(){
    	return $this->belongsto('App\Models\product','id_product','id');
    }
    public function bill(){
    	return $this->belongsto('App\Models\bill','id_bill','id');
    }
}
