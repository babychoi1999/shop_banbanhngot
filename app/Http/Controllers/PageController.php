<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\product;
use App\Models\productType;
class PageController extends Controller
{
    // function __construct(){
    //     $loaiSP = productType::all();
    //     view()->share('loaiSP',$loaiSP);
    // }
    public function getIndex(){
    	$slide = Slide::all();
    	$newProduct = product::where('new',1)->paginate(4);
    	$sanpham_khuyenmai = product::where('promotion_price','<>',0)->paginate(8); 
    	//dd($newProduct);// giống như var_dump(): xem kết quả trả về
    	//return view('pages.trangchu',['slide'=>$slide]);
    	return view('pages.trangchu',compact('slide','newProduct','sanpham_khuyenmai'));//Compact tạo ra 1 mảng nhờ vào các biên truyền vào
    }
    public function getLoaiSP($type){
        $sp_theoloai = product::where('id_type',$type)->get();
    	return view('pages.loai_san_pham',compact('sp_theoloai'));
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
