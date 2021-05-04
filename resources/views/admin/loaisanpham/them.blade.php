@extends('admin.layout.index')
@section('content') 
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('admin.layout.content_header',['name'=>'Categories','key'=>'Add'])
    <!-- Main content -->
      <div class="container-fluid">
        <hr class="dashed">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
              @foreach($errors->all() as $err)
                {{$err}}<br> <!--Hiển thị danh sách lỗi -->
              @endforeach
            </div>
        @endif
        @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}} <!--Kiểm tra nếu có session thông báo thì hiển thị trên màn hình -->
          </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-6"> 
              <form action="admin/loaisanpham/them" method="post" style="margin-left: 8px" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="form-group">
                    <label>Tên loại sản phẩm</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên loại" style="margin-bottom: 10px">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mô tả</label>
                    <textarea class="form-control ckeditor" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="hinhanh" id="hinhanh" class="form-control" style="margin-bottom: 10px">
                  </div>
        </div>
      <button type="submit" class="btn btn-primary">Add</button>
          </div>
              
    </form>
        </div>
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection