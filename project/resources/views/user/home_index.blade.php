@extends('user.user_layout')
@section('content')
<main>
    <div class="container">
        <div class="slideshow">
            <div class="slide">
                <img class="slide-img" src="{{ URL::asset('user/img/main/slider/slider1.png'); }}" alt="">
            </div>
            <div class="slide">
                <img class="slide-img" src="{{ URL::asset('user/img/main/slider/slider2.png'); }}" alt="">
            </div>
            <div class="slide">
                <img class="slide-img" src="{{ URL::asset('user/img/main/slider/slider3.png'); }}" alt="">
            </div>
        </div>
        <div class="slick-slider-nav"></div>
        <div class="slick-slider-dots"></div>
        <div class="content__best_seller">
            <h3 class="content__title">Bán chạy nhất</h3>
            <div class="content__produtcs_ctn">
                @foreach ( $prodNew as $item )
                <!-- Products -->
                <div  class="content__product">
                    <img src="{{ url($item->prod_img) }}" alt="{{$item['thumbnail'] }}"
                        class="product__img">
                    <span class="product__name">{{ $item->prod_name }}</span>
                        <span class="product_price_old">Giá cũ : {{ number_format($item->prod_price_old) }} VND</span>
                        <span class="product__price">Giá hiện tại :{{ number_format($item->prod_price_current) }} VND</span>
                    <div class="warp-btn">
                        <a href="{{ route('user.detailProduct',$item['id']) }}" class="product_btn">Chi Tiết</a>
                        <a href="#" data-url="{{ route('user.addToCart',$item['id']) }}" class="product_btn add_to_cart">Giỏ Hàng</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- News -->
        <div class="content__news">
            <a href="" class="content__news_link"><img src="{{ URL::asset('user/img/main/news/1.jpg'); }}" alt=""></a>
            <a href="" class="content__news_link"><img src="{{ URL::asset('user/img/main/news/2.jpg'); }}" alt=""></a>
            <a href="" class="content__news_link"><img src="{{ URL::asset('user/img/main/news/3.jpg'); }}" alt=""></a>
        </div>
        <!-- Hot Products -->
        <div class="content__hot_seller">
            <h3 class="content__title">Sản phẩm nổi bật</h3>
            <div class="content__produtcs_ctn">
                <!-- Products -->
                <a href="" class="content__product">
                    <img src="https://img.fpt.shop/w_240/h_215/f_png/cmpr_10/m_letterbox_ffffff_100/https://fptshop.com.vn/Uploads/Originals/2020/6/5/637269501975415139_mb-pro-13-2020-xam-dd.png"
                        alt="" class="product__img">
                    <span class="product__name">MacBook Pro 13 2020 Touch Bar 2.0GHz </span>
                    <span class="product__price">49,000,000đ</span>
                    <button class="product_btn">Mua Ngay</button>
                </a>
                <a href="" class="content__product">
                    <img src="https://img.fpt.shop/w_240/h_215/f_png/cmpr_10/m_letterbox_ffffff_100/https://fptshop.com.vn/Uploads/Originals/2020/4/11/637221970108314570_macbook-air-13-2019-gold-dd.png"
                        alt="" class="product__img">
                    <span class="product__name">MacBook Air 13" 2019 </span>
                    <span class="product__price">31,900,000đ</span>
                    <button class="product_btn">Mua Ngay</button>
                </a>
                <a href="" class="content__product">
                    <img src="https://img.fpt.shop/w_240/h_215/f_png/cmpr_10/m_letterbox_ffffff_100/https://fptshop.com.vn/Uploads/Originals/2020/9/29/637370133651934608_dell-xps-15-9500-i7-10750h-dd.png"
                        alt="" class="product__img">
                    <span class="product__name">Dell XPS 15 9500 i7 10750H/70221010</span>
                    <span class="product__price">69,900,000đ</span>
                    <button class="product_btn">Mua Ngay</button>
                </a>
                <a href="" class="content__product">
                    <img src="https://img.fpt.shop/w_240/h_215/f_png/cmpr_10/m_letterbox_ffffff_100/https://fptshop.com.vn/Uploads/Originals/2020/11/6/637402751164931913_dell-inspiron-n7490-bac-dd.png"
                        alt="" class="product__img">
                    <span class="product__name">Laptop Dell Inspiron N7490 i5</span>
                    <span class="product__price">28,490,000đ</span>
                    <button class="product_btn">Mua Ngay</button>
                </a>
                <a href="" class="content__product">
                    <img src="https://img.fpt.shop/w_240/h_215/f_png/cmpr_10/m_letterbox_ffffff_100/https://fptshop.com.vn/Uploads/Originals/2020/2/5/637165191975374399_hp-spectre-x360-dd.png"
                        alt="" class="product__img">
                    <span class="product__name">Laptop HP Spectre x360 13 i7</span>
                    <span class="product__price">47,490,000đ</span>
                    <button class="product_btn">Mua Ngay</button>
                </a>
                <a href="" class="content__product">
                    <img src="https://img.fpt.shop/w_240/h_215/f_png/cmpr_10/m_letterbox_ffffff_100/https://fptshop.com.vn/Uploads/Originals/2020/3/19/637202134083716764_hp-envy-13-aq1021tu-vang-dd.png"
                        alt="" class="product__img">
                    <span class="product__name">Laptop HP Envy 13 aq1023TU i7 </span>
                    <span class="product__price">27,490,000đ</span>
                    <button class="product_btn">Mua Ngay</button>
                </a>
                <a href="" class="content__product">
                    <img src="https://cdn.tgdd.vn/Products/Images/42/227529/vsmart-live-4-6gb-245420-075418-400x400.jpg"
                        alt="" class="product__img">
                    <span class="product__name">Vsmart Live 4 6GB</span>
                    <span class="product__price">4,960,000đ</span>
                    <button class="product_btn">Mua Ngay</button>
                </a>
                <a href="" class="content__product">
                    <img src="https://cdn.tgdd.vn/Products/Images/42/226357/vsmart-star-4-16gb-311520-111522-400x400.jpg"
                        alt="" class="product__img">
                    <span class="product__name">Vsmart Star 4 8GB</span>
                    <span class="product__price">2,550,000đ</span>
                    <button class="product_btn">Mua Ngay</button>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection