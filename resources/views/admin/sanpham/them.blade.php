@extends('admin.layout.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 284px;">
    <!-- Main content -->
    @include('admin.layout.content_header',['name'=>'Products','key'=>'Add'])
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
        <div class="row">
            <div class="col-md-6">
                <form action="admin/sanpham/them" method="post" enctype="multipart/form-data" style="margin-left: 8px">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" id="productstype" name="productstype">
                            @foreach($loaisp as $lsp)
                            <option value="{{$lsp->id}}">{{$lsp->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control ckeditor" id="description" name="description" placeholder="Nhập mô tả" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá gốc</label>
                        <input type="number" class="form-control" step="100" id="unit_price" name="unit_price" placeholder="Nhập giá gốc">
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mại</label>
                        <input type="number" class="form-control" step="100" id="promotion_price" name="promotion_price" placeholder="Nhập giá khuyến mại">
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Nhập file ảnh">
                    </div>
                    <div class="form-group">
                        <label>Đơn vị</label>
                        <input type="text" class="form-control" name="unit" id="unit" placeholder="Nhập đơn vị">
                    </div>
                    <div class="form-group">
                        <label>Sản phẩm mới</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" checked="" value="0">
                        <label class="form-check-label">Không</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="1">
                        <label class="form-check-label">Có</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    <!-- /.content -->
    @endsection
