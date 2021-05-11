@extends('admin.layout.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 284px;">
    <!-- Main content -->
    @include('admin.layout.content_header',['name'=>'Orders','key'=>'List'])
    <section class="content">
        <div class="container-fluid">
            <hr class="dashed">
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
                <!--Kiểm tra nếu có session thông báo thì hiển thị trên màn hình -->
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table style="text-align: center;" class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Ngày đặt</th>
                                    <th>Thành tiền</th>
                                    <th>Hình thức thanh toán</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="text-align: center;">
                                    <th>{{$bill_detail->customer->id}}</th>
                                    <td>{{$bill_detail->customer->name}}</td>
                                    <td>{{$bill_detail->customer->phone_number}}</td>
                                    <td>{{$bill_detail->customer->email}}</td>
                                    <td>{{$bill_detail->date_order}}</td>
                                    <td>{{$bill_detail->total}}</td>
                                    <td>{{$bill_detail->payment}}</td>
                                </tr>
                            </tbody>
                            </tfoot>
                        </table>
                        <div class="card-header">
                            <h3 class="card-title">Đơn đặt hàng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order_detail as $or)
                                    <tr style="text-align: center;">
                                        <th scope="row">{{$or->id}}</th>
                                        <td><img src="front/image/product/{{$or->product->image}}" width="150px" alt="Not availabel"></td>
                                        <td>{{$or->product->name}}</td>
                                        <td>{{number_format($or->product->unit_price)}} VNĐ</td>
                                        <td>{{$or->qty}}</td>
                                        <td>{{number_format(($or->product->unit_price)*($or->qty))}} VNĐ</td>
                                        <td>{{"later"}}</td>
                                        <td style="white-space: nowrap;">
                                            <a href="admin/order/xoasanpham/{{$or->id_bill}}/{{$or->id_product}}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm khỏi đơn hàng?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                    @if($bill_detail->status==0)
                    <form action="admin/order/xacnhan/{{$bill_detail->id}}" method="get">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button class="btn btn-success" type="submit">Xác nhận đơn hàng</button>
                    </form>
                    @endif
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
