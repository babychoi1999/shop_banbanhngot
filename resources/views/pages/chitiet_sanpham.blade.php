@extends('layout.index')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title" style="font-size: 24px">Chi tiết {{$sanpham->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large" style="font-size: 24px>
                <a href=" trangchu">Home</a> / <span>Thông tin chi tiết sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-4">
                        <img src="front/image/product/{{$sanpham->image}}" alt="">
                    </div>
                    <div class="col-8">
                        <div class="single-item-body">
                            <p class="single-item-title">
                                <h3>{{$sanpham->name}}</h3>
                            </p>
                            <p class="single-item-price">
                                @if($sanpham->promotion_price==0)
                                <span class="flash-sale">{{number_format($sanpham->unit_price)}} VNĐ</span>
                                @else
                                <span class="flash-del">{{number_format($sanpham->unit_price)}} VNĐ</span>
                                <span class="flash-sale">{{number_format($sanpham->promotion_price)}} VNĐ</span>
                                @endif
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <p>Số lượng:</p>
                        <div class="single-item-options">
                            <input type="number" min="1" name="soluong" value="1">
                            <a class="add-to-cart" href="addtocart/{{$sanpham->id}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                    </ul>
                    <div class="panel" id="tab-description">
                        <p>{{$sanpham->description}}</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm liên quan</h4>
                    <div class="space50">&nbsp;</div>
                    <div class="row similar">
                        @foreach($sp_tuongtu as $tt)
                        <div class="col-4">
                            <div class="single-item">
                                @if($tt->promotion_price!=0)
                                <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div>
                                @endif
                                <div class="single-item-header">
                                    <a href="chitietsanpham/{{$tt->id}}"><img src="front/image/product/{{$tt->image}}" alt="" height="250px"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$tt->name}}</p>
                                    <p class="single-item-price" style="font-size: 18px">
                                        @if($tt->promotion_price==0)
                                        <span class="flash-sale">{{number_format($tt->unit_price)}} VNĐ</span>
                                        @else
                                        <span class="flash-del">{{number_format($tt->unit_price)}} VNĐ</span>
                                        <span class="flash-sale">{{number_format($tt->promotion_price)}} VNĐ</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="addtocart"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="chitietsanpham/{{$tt->id}}">Details <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="front/assets/dest/images/products/sales/1.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="front/assets/dest/images/products/sales/2.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="front/assets/dest/images/products/sales/3.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="front/assets/dest/images/products/sales/4.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">New Products</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($newProducts as $np)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="chitietsanpham/{{$np->id}}"><img src="front/image/product/{{$np->image}}" alt="Not available"></a>
                                <div class="media-body">
                                    {{$np->name}}
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
