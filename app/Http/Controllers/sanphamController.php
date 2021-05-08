<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Pagination\LengthAwarePaginator;

class sanphamController extends Controller
{
    //
    public function getDSSP(){
    	$sanpham = product::orderBy('id','asc')->get();
    	return view('admin.sanpham.danhsach',compact('sanpham'));
    }
    public function getthemSP(){
    	return view('admin.sanpham.them');
    }
    public function gettimkiem(Request $request){
    	$product = product::where('name','like','%'.$request->keysearch.'%')->orWhere('unit_price',$request->keysearch)->get();

        $display=null;

        if(count($product)==0)
            $display="none";
        else
            $display="block";
    	return view('admin.sanpham.timkiem',compact('product','display'));
    }
}
