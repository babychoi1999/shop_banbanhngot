@extends('admin.layout.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 284px;">
    <!-- Main content -->
    @include('admin.layout.content_header',['name'=>'Categories','key'=>'Edit'])
    <div class="container-fluid">
        <hr class="dashed">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{$err}}<br>
            <!--Hiển thị danh sách lỗi -->
            @endforeach
        </div>
        @endif
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
            <!--Kiểm tra nếu có session thông báo thì hiển thị trên màn hình -->
        </div>
        @endif
        @if(session('loi'))
        <div class="alert alert-danger">
            {{session('loi')}}
        </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-6">
                <form action="" method="post" style="margin-left: 8px" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên loại sản phẩm</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên loại" style="margin-bottom: 10px" value="{{$loaisp->name}}">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mô tả</label>
                            <textarea class="form-control ckeditor" name="description" id="exampleFormControlTextarea1" rows="3">{{$loaisp->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <p><img class="rounded" src="front/image/product/{{$loaisp->image}}">Ảnh cũ</p>
                            <input type="file" name="hinhanh" class="form-control" placeholder="Nhập tên loại" style="margin-bottom: 10px">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
            </form>
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection
