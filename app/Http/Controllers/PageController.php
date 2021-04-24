<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\product;
use App\Models\productType;
use App\Models\Cart;

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
        $sp_khac = product::where('id_type','<>',$type)->paginate(3);
        $loai = productType::all();
        $loai_sp = productType::where('id',$type)->first();
    	return view('pages.loai_san_pham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getChiTiet($id){
        $sanpham = product::where('id',$id)->first();
        $sp_tuongtu = product::where('id_type',$sanpham->id_type)->paginate(6);
    	return view('pages.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
    public function getLienHe(){
    	return view('pages.lienhe');
    }
    public function getGioiThieu(){
    	return view('pages.gioithieu');
    }
    public function getAddToCart(Request $request,$id){
        $product = product::find($id);
        $oldcart = Session('cart')?Session::get('Cart'):null;
        $cart = new Cart($oldcart);
        $cart = add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }

}
