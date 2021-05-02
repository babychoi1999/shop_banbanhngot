<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productType;

class loaisanpham extends Controller
{
    public function getDSLSP(){
    	return view('admin.loaisanpham.danhsach');
    }
    public function getthemDSLSP(){
    	return view('admin.loaisanpham.them');
    }
}
