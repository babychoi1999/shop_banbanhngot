<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\product;
use App\Models\productType;
use App\Models\Cart;
use App\Models\customer;
use App\Models\billDetail;
use App\Models\bill;
use App\Models\User;
use App\Models\order;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

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
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $request->Session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getRemoveCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');//
        }
        
        return redirect()->back();
    }
    public function getCheckout(){
            return view('pages.dat_hang');
    }
    public function postCheckout(Request $request){
        $cart = Session::get('cart');
        $this->validate($request,
            [
                'name'=>'required|min:3',
                'email'=>'required|email|unique:customer,email',
                'diachi'=>'required|min:3',
                'phone'=>'required|digits:10',
            ],[
                'name.required'=>'Bạn chưa nhập tên',
                'name.min'=>'Tên bạn nhập phải có ít nhất 3 ký tự',
                'diachi.required'=>'Bạn chưa nhập đia chỉ giao hàng',
                'diachi.min'=>'Địa chỉ bạn nhập phải có ít nhất 3 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'email.unique'=>'Email đã tồn tại'
            ]);
        $customer = new customer;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->diachi;
        $customer->phone_number = $request->phone;
        $customer->save();
        
        $bill = new bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d H:i:s');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment_method;  
        $bill->status = 0;
        $bill->note = $request->note;
        $bill->save();


        foreach ($cart->items as $key => $value) {
            $order = new order;
            $order->id_product = $key;
            $order->price = $value['price']/$value['qty'];
            $order->id_bill = $bill->id;
            $order->qty = $value['qty'];
            $order->customer_name = $request->name;
            $order->customer_contact = $request->phone;
            $order->customer_email = $request->email;
            $order->customer_address = $request->diachi;
            $order->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công!');
        
    }
    public function getDangNhap(){
        return view('pages.dangnhap');
    }
    public function postDangNhap(Request $request){
        $this->validate($request,
            [
                'password'=>'min:3|max:20',
                'email'=>'email',
            ],[
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu có tối đa 20 ký tự'
            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('trangchu');
        }
        else{
            return redirect('dangnhap')->with('thongbao','Thông tin email hoặc mật khẩu không chính xác');
        }
    }
    public function getDangKy(){
        return view('pages.dangky');
    }
     public function postDangKy(Request $request){
        $this->validate($request,
            [
                'name'=>'min:3',
                'email'=>'email|unique:customer,email', 
                'password'=>'min:6|max:20',
                'passwordagain'=>'same:password'
            ],[
                
                'name.min'=>'Tên bạn nhập phải có ít nhất 3 ký tự',

                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'email.unique'=>'Email đã tồn tại',
                'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu có tối đa 20 ký tự',
                'passwordagain.required'=>'Bạn chưa xác minh mật khẩu',
                'passwordagain.same'=>'Mật khẩu bạn nhập không giống nhau'
            ]);
        $user = new User;
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);// mã hóa
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('thongbao','Tạo tài khoản thành công, vui lòng đăng nhập');

    }

    public function getTimKiem(Request $request){
        $product = product::where('name','like','%'.$request->key.'%')->
                            orWhere('unit_price',$request->key)->
                            get();
        return view('pages.search',compact('product'));
    }


}
