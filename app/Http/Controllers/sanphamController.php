<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\productType;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class sanphamController extends Controller
{
    //
    public function getDSSP(){
    	$sanpham = product::orderBy('id','asc')->paginate(8);
    	return view('admin.sanpham.danhsach',compact('sanpham'));
    }
    public function getthemSP(Request $req){
        $loaisp = productType::all();
    	return view('admin.sanpham.them',compact('loaisp'));
    }
    public function postthemSP(Request $req){
        $this->validate($req,
            [
                "name"=>"required",
                "description"=>"required|min:3|max:1000",
                "unit_price"=>"required",
                "unit"=>"required"
            ],[
                "name.required"=>"Bạn chưa nhập tên thể loại",
                "description.required"=>"Bạn chưa nhập mô tả",
                "description.min"=>"Mô tả phải có tối thiểu 3 ký tự",
                "description.max"=>"Mô tả có tối đa 1000 ký tự",
                "unit_price.required"=>"Bạn chưa nhập giá gốc",
                "unit.required"=>"Bạn chưa nhập đơn vị"
            ]);

        $newproduct = new product;
        $newproduct->name = $req->name;
        $newproduct->id_type = $req->productstype;
        $newproduct->description = $req->description;
        $newproduct->unit_price = $req->unit_price;
        $newproduct->promotion_price = $req->promotion_price;

        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
        if($duoi != "png" && $duoi != "jpg"){
            return redirect("admin/sanpham/them")->with('loi','Bạn chỉ được chọn file có đuôi "png" hoặc "jpg"');
        }
            $name = $file->getClientOriginalName();//Lấy tên gốc của hình
            $image  = Str::random(4)."_". $name; //random tên hình để tránh bị trùng
            while (file_exists("front/image/product/".$image)) {
                $image = Str::random(4)."_". $name; 
            }

            $file->move("front/image/product/",$image);//lưu hình theo đường dẫn 
            $newproduct->image = $image;
        }
        else
        {
            $newproduct->image = "";
        }
        $newproduct->unit = $req->unit;
        $newproduct->new = ($req->new) == 0 ? 0:1;
        $newproduct->save();

        return redirect()->back()->with('thongbao','Thêm sản phẩm thành công!');

    }
     public function getsuaSP($id){
        $loaisp = productType::all();
        $sp_sua = product::find($id);
        return view('admin.sanpham.sua',compact('sp_sua','loaisp'));
    }
    public function postsuaSP(Request $request, $id){

        $this->validate($request,
            [
                "name"=>"required",
                "description"=>"required|min:3|max:1000",
                "unit_price"=>"required",
                "unit"=>"required"
            ],[
                "name.required"=>"Bạn chưa nhập tên thể loại",
                "description.required"=>"Bạn chưa nhập mô tả",
                "description.min"=>"Mô tả phải có tối thiểu 3 ký tự",
                "description.max"=>"Mô tả có tối đa 1000 ký tự",
                "unit_price.required"=>"Bạn chưa nhập giá gốc",
                "unit.required"=>"Bạn chưa nhập đơn vị"
            ]);
        $sp_sua = product::find($id);
        $sp_sua->name = $request->name;
        $sp_sua->id_type = $request->productstype;
        $sp_sua->description = $request->description;
        $sp_sua->unit_price = $request->unit_price;
        $sp_sua->promotion_price = $request->promotion_price;

        if($request->hasFile('image')){
        $file = $request->file('image');
        $duoi = $file->getClientOriginalExtension();
       
        if($duoi != "png" && $duoi != "jpg"){
            return redirect("admin/loaisanpham/sua".$id)->with('loi','Bạn chỉ được chọn file có đuôi "png" hoặc "jpg"');
        }
                $name = $file->getClientOriginalName();//Lấy tên gốc của hình
                $image  = Str::random(4)."_". $name; //random tên hình để tránh bị trùng
                while (file_exists("front/image/product/".$image)) {
                    $image = Str::random(4)."_". $name; 
                }
                $file->move("front/image/product/",$image);//lưu hình theo đường dẫn
                unlink("front/image/product/".$sp_sua->image);
                $sp_sua->image = $image;
        }
        $sp_sua->unit = $request->unit;
        $sp_sua->new = ($request->new) == 0? 0:1;
        $sp_sua->save();
        return redirect()->back()->with('thongbao','Cập nhật thành công!');
    }
    public function getxoaSP($id){
        $sp_xoa = product::find($id)->delete();
         return redirect()->back()->with('thongbao','Xóa thành công!');
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
