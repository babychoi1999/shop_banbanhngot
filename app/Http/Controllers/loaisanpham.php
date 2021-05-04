<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productType;
use Illuminate\Support\Str;

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

        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
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
                $productType->image = $image;
        }
        else
        {
                    $productType->image = "";
        }
    	       $productType->save();
    	       return redirect()->back()->with('thongbao','Thêm loại sản phẩm thành công!');
    }
    public function getsuaDSLSP($id){
        $loaisp = productType::find($id);
        return view('admin.loaisanpham.sua',compact('loaisp'));
    }
    public function postsuaDSLSP(Request $request, $id){
        $productType = productType::find($id);
       $this->validate($request,
            [
                "name"=>"required",
                "description"=>"required|min:3|max:1000",
            ],[
                "name.required"=>"Bạn chưa nhập tên thể loại",
                "description.required"=>"Bạn chưa nhập mô tả",
                "description.min"=>"Mô tả phải có tối thiểu 3 ký tự",
                "description.max"=>"Mô tả có tối đa 1000 ký tự",
            ]);
       $productType->name = $request->name;
       $productType->description = $request->description;
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
                unlink("front/image/product/".$productType->image);
                $productType->image = $image;
    }
       $productType->save();
       return redirect()->back()->with('thongbao','Cập nhật thành công!');
    }
    public function getxoaDSLSP($id){
        $loaisp = productType::find($id);
        $loaisp->delete();
        return redirect()->back()->with('thongbao','Xóa thành công!');
    }
}
