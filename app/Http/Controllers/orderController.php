<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class orderController extends Controller
{
    public function getorder(){
    	return view("admin.order.danhsach");
    }
}
