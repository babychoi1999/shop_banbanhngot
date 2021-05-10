<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bill;
use App\Models\order;
use App\Models\customer;

class orderController extends Controller
{
    public function getorder(){
    	$bill = bill::orderBy('date_order','desc')->get();
    	return view("admin.order.danhsach",compact('bill'));
    }
    public function getchitietOrder($id){
    	$bill_detail = bill::find($id);
    	$order_detail = order::where('id_bill',$id)->get();
    	
    	return view('admin.order.chitiet',compact('bill_detail','order_detail'));
    }
    public function getxacnhanorder(Request $request, $id){
    	$bill_confirm = bill::find($id);
    	$bill_confirm->status = 1;
    	$bill_confirm->save();
    	return redirect('admin/order/danhsach')->with('thongbao','Xác nhận đơn hàng thành công!');
    }
}
