@extends('admin.layout.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 284px;">
    <!-- Main content -->
    @include('admin.layout.content_header',['name'=>'Products','key'=>'List'])
    <div class="container-fluid">
        <hr class="dashed">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="main" style="float: left; width: 50%">
                    <!-- Another variation with a button -->
                    <div class="input-group">
                        {{-- <form action="admin/sanpham/timkiem" method="get" class="form-inline"> --}}
                            <input type="text" class="form-control" id="search" name="search" placeholder="Search a record">
                            {{-- <div class="input-group-append">
                                <button class="btn btn-secondary" id="searchbutton" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                            --}}
                            {{-- </form> --}}
                    </div>
                </div>
                <a href="admin/sanpham/them" class="btn btn-success float-right m-3">Add</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sản phẩm </h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <h3 align="text-center">Total Data: <span id="total_records"></span></h3>
                        </div>
                        <table class="table table-bordered" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tên loại</th>
                                    <th>Mô tả</th>
                                    <th>Giá gốc</th>
                                    <th>Giá khuyến mại</th>
                                    <th>Hình ảnh</th>
                                    <th>Đơn vị</th>
                                    <th>Mới</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="ajax">
                            </tbody>
                            <tbody id="initial_table">
                                @if($products)
                                @foreach($products as $sp)
                                <tr>
                                    <th scope="row">{{$sp->id}}</th>
                                    <td>{{$sp->name}}</td>
                                    <td>{{$sp->productType->name}}</td>
                                    <td>{{$sp->description}}</td>
                                    <td>{{$sp->unit_price}}</td>
                                    <td>{{$sp->promotion_price}}</td>
                                    <td><img src="front/image/product/{{$sp->image}}" alt="No available" width="150px"></td>
                                    <td>{{$sp->unit}}</td>
                                    <td>@if($sp->new == 1)
                                        {{"Có"}}
                                        @else
                                        {{"không"}}
                                        @endif
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <a href="admin/sanpham/sua/{{$sp->id}}" class="btn btn-default"><i class="fa fa-pen"></i></a>
                                        <a href="admin/sanpham/xoa/{{$sp->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="text-center">{{$sanpham->links('pagination::bootstrap-4')}}</div>
        --}}
        <!-- ./col -->
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    <!-- /.content -->
</div>
@endsection
