@extends('admin.layout.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 284px;">
    <!-- Main content -->
    @include('admin.layout.content_header',['name'=>'Orders','key'=>'List'])
    @if(session('thongbao'))
    <div class="alert alert-success">
        {{session('thongbao')}}
        <!--Kiểm tra nếu có session thông báo thì hiển thị trên màn hình -->
    </div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <hr class="dashed">
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-lg-4">
                        <form action="admin/sanpham/timkiem" method="get" class="form-inline">
                            <input type="text" class="form-control" name="keysearch" placeholder="Search a record">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" id="searchbutton" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Đơn đặt hàng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Ngày đặt</th>
                                        <th>Thành tiền</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th>Ghi chú</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bill as $b)
                                    <tr>
                                        <th scope="row">{{$b->id}}</th>
                                        <td>{{$b->customer->name}}</td>
                                        <td>{{$b->customer->phone_number}}</td>
                                        <td>{{$b->customer->email}}</td>
                                        <td>{{$b->date_order}}</td>
                                        <td>{{$b->total}}</td>
                                        <td>{{$b->payment}}</td>
                                        <td style="color: #00b894">@if($b->status == 0)
                                            {{"Chưa xác nhận"}}
                                            @else
                                            {{"Đã xác nhận"}}
                                            @endif
                                        </td>
                                        <td>{{$b->note}}</td>
                                        <td style="white-space: nowrap;">
                                            <a href="admin/order/chitiet/{{$b->id}}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                            <a href="admin/order/huy/{{$b->id}}" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
<!-- /.content -->
@endsection
