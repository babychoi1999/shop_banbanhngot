@extends('layout.index')
@section('content')
<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-12" id="list-cart">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th class="p-name">Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Lưu</th>
                                <th>Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Session::has('cart'))
                            @foreach($product_cart as $cart)
                            <tr>
                                <td class="cart-pic first-row"><img src="front/image/product/{{$cart['item']['image']}}" width="150px" alt="Not available"></td>
                                <td class="cart-title first-row">
                                    <h5>{{$cart['item']['name']}}</h5>
                                </td>
                                <td class="p-price first-row">{{number_format($cart['price'])}} VNĐ</td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{number_format($cart['qty'])}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row">{{number_format(($cart['qty'])*($cart['price']))}} VNĐ</td>
                                <td class="close-td first-row"><a href=" removecart/{{$cart['item']['id']}}"><i class=" ti-save"></i></a></td>
                                <td class="close-td first-row"><a href="removecart/{{$cart['item']['id']}}"><i class="ti-close"></i></a></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="row">
                    <div class="col-4 offset-8" style="float: right;">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Số lượng:<span>
                                        <h3>{{number_format($totalQty)}}</h3>
                                    </span></li>
                                <li class="cart-total">Tổng:<span>
                                        <h3 style="color: #e7ab3c">{{number_format($totalPrice)}} VNĐ</h3>
                                    </span></li>
                            </ul>
                            <a href="dathang" class="proceed-btn">Đặt hàng</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection
