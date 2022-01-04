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
                <img src="{{ URL::asset('user/img/main/news/1.jpg'); }} " alt="">
            </aside>
            <div id="product_right">
                <div class="title-cate">
                    <h1 id="page_title">
                        @if($value['id'])
                            Tìm thấy {{ $count }}  trong {{ $cateID->cateprod_name }} 
                        @else
                        Tìm thấy tất cả {{ $prodNew->count() }}
                        @endif
                    </h1>
                </div>
                <div class="products_ctn">
                    <!-- Products -->
                    @foreach ( $result as $item )
                    <div  class="content__product">
                        <img src="{{ url($item->prod_img) }}" alt="{{$item['thumbnail'] }}"
                            class="product__img">
                        <span class="product__name">{{ $item->prod_name }}</span>
                            <span class="product_price_old">Giá cũ : {{ number_format($item->prod_price_old) }} VND</span>
                            <span class="product__price">Giá hiện tại :{{ number_format($item->prod_price_current) }} VND</span>
                        <div class="warp-btn">
                            <a href="{{ route('user.detailProduct',$item['id']) }}" class="product_btn">Chi Tiết</a>
                        </div>
                    </div>

                    @endforeach
        
                    <div class="pagging">
                        <div class="">
                            {{ $result->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection