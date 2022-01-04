@extends('user.user_layout')
@section('content')
<main>
    <div class="container">
        <div id="all_products_container">

            <aside>
                <h3>Danh mục</h3>
                <ul id="aside__menu">
                    <li class="aside__links"><a href="">Điện Thoại</a><i
                            class="fas fa-plus more"></i>
                    </li>
                    <ul class="aside__child_type" style="display: none;">
                        @foreach ( $cate as $value )
                        <li class="child__link"><a href="{{ route('user.cate_product',$value['id']) }}">{{ $value->cateprod_name }}</a>
                        </li>

                        @endforeach
                    </ul>
        
        
                </ul>
                <img src="{{ URL::asset('user/img/main/news/1.jpg'); }}" alt="">
            </aside>
            <div id="product_right">
                <div class="title-cate">
                    <h1 id="page_title"> Tất cả sản phẩm Điện Thoại</h1>
                </div>

                <div class="product-detail">
                    <div class="col-detail-img-product">
                        <div class="detail-img-product">
                            <img src="{{ url($prodDetail->prod_img) }}" id="main_img" alt="">
                        </div>
                        <div class="small-img-group">
                            <div class="col-small-img">
                                <img class="small-img" src="https://cdn.tgdd.vn/Products/Images/42/217308/TimerThumb/xiaomi-redmi-9-(26).jpg" alt="">
                            </div>
                            <div class="col-small-img">
                                <img class="small-img" src="https://cdn.tgdd.vn/Products/Images/42/228744/iphone-12-pro-max-512gb-191020-021035-400x400.jpg" alt="">
                            </div>
                            <div class="col-small-img">
                                <img class="small-img" src="https://cdn.tgdd.vn/Products/Images/42/213033/iphone-12-pro-max-195420-015420-400x400.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="product__detail_info">
                        <h2>{{ $prodDetail['prod_name'] }}</h2>
                        <span class="product__about"> {{ $prodDetail['prod_content_main_desc'] }}</span>
                        <span class="product__status">Tình trạng: Còn hàng </span>
                        <span class="product__id">Mã sản phẩm: 6</span>
                        <span class="product__detail_price-old"> Giá cũ: {{ number_format($prodDetail['prod_price_old']) }} VND</span>
                        <span class="product__detail_price">  Giá hiện tại : {{ number_format($prodDetail['prod_price_current']) }} VND</span>
                        <div class="among">
                            <label for="among">Số lượng</label>
                            <input type="number" name="among" value="1" id="among">
                        </div>
                        <p>{{ $prodDetail['prod_short_desc'] }}</p>
                        <a href="#" data-url="{{ route('user.addToCart',$prodDetail['id']) }}" class="product__detail_btn text-center add_to_cart">Thêm vào giỏ hàng</a>
                    </div>
                </div>

            </div>
        </div>
        <section class="another-product">

            <div class="content__best_seller">
                <h3 class="content__title">Bán chạy nhất</h3>
                <div class="content__produtcs_ctn">
                    <!-- Products -->
                    @foreach ( $prodNew as $item )
                    <!-- Products -->
                    <div  class="content__product">
                        <img src="{{ url($item->prod_img) }}" alt="{{$item['thumbnail'] }}"
                            class="product__img">
                        <span class="product__name">{{ $item->prod_name }}</span>
                            <span class="product_price_old">Giá cũ : {{ $item->prod_price_old }}VND</span>
                            <span class="product__price">Giá hiện tại :{{ $item->prod_price_current }}VND</span>
                        <div class="warp-btn">
                            <a href="{{ route('user.detailProduct',$item['id']) }}" class="product_btn">Chi Tiết</a>
                            <a href="#" data-url="{{ route('user.addToCart',$item['id']) }}" class="product_btn add_to_cart">Giỏ Hàng</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
</main>

@endsection