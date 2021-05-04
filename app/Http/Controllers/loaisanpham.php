<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productType;

class loaisanpham extends Controller
{
    public function getDSLSP(){
        $pType = productType::all();
    	return view('admin.loaisanpham.danhsach',compact('pType'));
    }
    public function getthemDSLSP(){
    	return view('admin.loaisanpham.them');
    }
    public function postthemDSLSP(Request $request){
    	$this->validate($request,
    		[
    			"name"=>"required",
    			"description"=>"required|min:3|max:1000"
    		],[
    			"name.required"=>"Bạn chưa nhập tên thể loại",
    			"description.required"=>"Bạn chưa nhập mô tả",
    			"description.min"=>"Mô tả phải có tối thiểu 3 ký tự",
    			"description.max"=>"Mô tả có tối đa 1000 ký tự"
    		]);
    	$productType = new productType;
    	$productType->name = $request->name;
    	$productType->description = $request->description;
    	$productType->image = null;
    	$productType->save();
    	return redirect()->back()->with('thongbao','Thêm loại sản phẩm thành công!');
    }
    public function getsuaDSLSP(){
        return view('admin.loaisanpham.sua');
    }
    public function postsuaDSLSP(){
       
    }
    public function getxoaDSLSP(){
        
    }
}
