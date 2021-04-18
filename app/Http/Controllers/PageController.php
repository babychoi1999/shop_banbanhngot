<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\product;

class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();
    	$product = 
    	//return view('pages.trangchu',['slide'=>$slide]);
    	return view('pages.trangchu',compact('slide'));//Compact tạo ra 1 mảng nhờ vào các biên truyền vào
    }
    public function getLoaiSP(){
    	return view('pages.loai_san_pham');
    }
    public function getChiTiet(){
    	return view('pages.chitiet_sanpham');
    }
    public function getLienHe(){
    	return view('pages.lienhe');
    }
    public function getGioiThieu(){
    	return view('pages.gioithieu');
    }

}
