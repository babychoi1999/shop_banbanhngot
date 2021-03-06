<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> Ký túc xá đại học Giao thông vận tải phân hiệu TPHCM</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 039 464 7173</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                    <li><a href="dangky">Đăng kí</a></li>
                    <li><a href="dangnhap">Đăng nhập</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="front/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="timkiem">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                <div class="beta-comp">
                    <div class="cart" w>
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart'))
                            {{Session('cart')->totalQty}}
                            @else Trống
                            @endif) <i class="fa fa-chevron-down"></i></div>
                        @if(Session::has('cart'))
                        <div class="beta-dropdown cart-body" style="width: 30.8%;">
                            @foreach($product_cart as $product)
                            <div class="cart-item">
                                <a href="removecart/{{$product['item']['id']}}" class="cart-item-delete"><i class="fa fa-times"></i></a>
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="front/image/product/{{$product['item']['image']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$product['item']['name']}}</span>
                                        <span class="cart-item-options">Số lượng: <span style="color: #f90;font-weight: 500;" class="cart-value">{{$product['qty']}}</span></span>
                                        <span class="cart-item-amount">Đơn giá: <span class="cart-value">@if($product['item']['promotion_price'] == 0)
                                                {{number_format($product['item']['unit_price'])}}
                                                @else
                                                {{number_format($product['item']['promotion_price'])}}
                                                @endif
                                            </span></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">
                                        {{number_format(Session('cart')->totalPrice)}} VNĐ</span></div>
                                <div class="clearfix"></div>
                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="dathang" style="float: left;" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                    <a href="xemgiohang" style="float:right;" class="beta-btn primary text-center">Xem giỏ hàng<i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="trangchu">Trang chủ</a></li>
                    <li><a onclick="return false" href="loaisanpham">Loại sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($loai_sp as $loai)
                            <li><a href="loaisanpham/{{$loai->id}}">{{$loai->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="gioithieu">Giới thiệu</a></li>
                    <li><a href="lienhe">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->
<script type="text/javascript">
</script>
