Đăng nhập thành công

<a href="{{ route('admin.logout') }}">Đăng xuất</a>

@extends('layout.header')
@section('content')
<h1 id="page_title"> Tất cả sản phẩm Điện Thoại</h1>
<div id="all_products_container">
    <link rel="stylesheet" href=" {{ URL::asset('css/page/home.css'); ">
    <aside>
        <h3>Danh mục</h3>
        <ul id="aside__menu">
            <li class="aside__links"><a href="">Điện Thoại</a><i
                    class="fas fa-plus more"></i>
            </li>
            <ul class="aside__child_type" style="display: none;">
                <li class="child__link"><a href="">Apple</a>
                </li>
                <li class="child__link"><a href="">Vsmart</a>
                </li>
                <li class="child__link"><a href="">Oppo</a>
                </li>
                <li class="child__link"><a href="">Samsung</a>
                </li>
                <li class="child__link"><a href="">Xiaomi</a>
                </li>
                <li class="child__link"><a href="">Nokia</a>
                </li>
            </ul>

            <li class="aside__links"><a href="">Laptop</a><i class="fas fa-plus more"></i>
            </li>
            <ul class="aside__child_type" style="display: none;">
                <li class="child__link"><a href="">Dell</a>
                </li>
                <li class="child__link"><a href="">HP</a>
                </li>
                <li class="child__link"><a href="">Asus</a>
                </li>
                <li class="child__link"><a href="">Apple</a>
                </li>
                <li class="child__link"><a href="">Lenovo</a>
                </li>
                <li class="child__link"><a href="">Acer</a>
                </li>
                <li class="child__link"><a href="">Razer</a>
                </li>
            </ul>

        </ul>
        <img src="public/img/main/news/1.jpg" alt="">
    </aside>
    <div id="product_right">
        <div class="products_ctn">
            <!-- Products -->
            <a href="" class="content__product">
                <div class="product__img2"><img
                        src="https://cdn.tgdd.vn/Products/Images/42/230407/TimerThumb/iphone-11-64gb-hop-moi.jpg"
                        alt="iPhone 11 64GB (Hộp mới)" title="iPhone 11 64GB (Hộp mới)" class=""></div>
                <span class="product__name">iPhone 11 64GB (Hộp mới)</span>
                <span class="product__price">19,990,000đ</span>
                <button class="product_btn">Mua Ngay</button>
            </a>
            <a href="" class="content__product">
                <div class="product__img2"><img
                        src="https://cdn.tgdd.vn/Products/Images/42/217308/TimerThumb/xiaomi-redmi-9-(26).jpg"
                        alt="Xiaomi Redmi 9 (4GB/64GB)" title="Xiaomi Redmi 9 (4GB/64GB)" class=""></div>
                <span class="product__name">Xiaomi Redmi 9 (4GB/64GB)</span>
                <span class="product__price">3,790,000đ</span>
                <button class="product_btn">Mua Ngay</button>
            </a>
            <a href="" class="content__product">
                <div class="product__img2"><img
                        src="https://cdn.tgdd.vn/Products/Images/42/228744/iphone-12-pro-max-512gb-191020-021035-400x400.jpg"
                        alt="iPhone 12 Pro Max 512GB" title="iPhone 12 Pro Max 512GB" class=""></div>
                <span class="product__name">iPhone 12 Pro Max 512GB</span>
                <span class="product__price">43,990,000đ</span>
                <button class="product_btn">Mua Ngay</button>
            </a>
            <a href="" class="content__product">
                <div class="product__img2"><img
                        src="https://cdn.tgdd.vn/Products/Images/42/213033/iphone-12-pro-max-195420-015420-400x400.jpg"
                        alt="iPhone 12 Pro Max 158GB" title="iPhone 12 Pro Max 158GB" class=""></div>
                <span class="product__name">iPhone 12 Pro Max 158GB</span>
                <span class="product__price">33,990,000đ</span>
                <button class="product_btn">Mua Ngay</button>
            </a>
            <a href="" class="content__product">
                <div class="product__img2"><img
                        src="https://cdn.tgdd.vn/Products/Images/42/228736/iphone-12-128gb-195820-105824-400x400.jpg"
                        alt="iPhone 12 128GB" title="iPhone 12 128GB" class=""></div>
                <span class="product__name">iPhone 12 128GB</span>
                <span class="product__price">40,990,000đ</span>
                <button class="product_btn">Mua Ngay</button>
            </a>
            <a href="" class="content__product">
                <div class="product__img2"><img
                        src="https://cdn.tgdd.vn/Products/Images/42/230867/samsung-galaxy-note-20-ultra-5g-trang-600x600-1-200x200.jpg"
                        alt="Samsung Galaxy Note 20 Ultra 5G Trắng" title="Samsung Galaxy Note 20 Ultra 5G Trắng"
                        class=""></div>
                <span class="product__name">Samsung Galaxy Note 20 Ultra 5G Trắng</span>
                <span class="product__price">40,990,000đ</span>
                <button class="product_btn">Mua Ngay</button>
            </a>
            <a href="" class="content__product">
                <div class="product__img2"><img
                        src="https://cdn.tgdd.vn/Products/Images/42/226099/samsung-galaxy-z-fold-2-061220-021232-400x400.jpg"
                        alt="Samsung Galaxy Z Fold2 5G" title="Samsung Galaxy Z Fold2 5G" class=""></div>
                <span class="product__name">Samsung Galaxy Z Fold2 5G</span>
                <span class="product__price">5,990,000đ</span>
                <button class="product_btn">Mua Ngay</button>
            </a>
            <a href="" class="content__product">
                <div class="product__img2"><img
                        src="https://cdn.tgdd.vn/Products/Images/42/218886/vsmart-star-3-xanh-600x600-400x400.jpg"
                        alt="Vsmart Star 5" title="Vsmart Star 5" class=""></div>
                <span class="product__name">Vsmart Star 5</span>
                <span class="product__price">2,900,000đ</span>
                <button class="product_btn">Mua Ngay</button>
            </a>


        </div>
        <div class="pagging">
            <ul class="pagination">
                <li><a class="active">1 </a></li>
                <li><a href=""> 2 </a></li>
                <li><a href=""> <i class="fas fa-angle-right"></i> </a></li>
                <li><a href=""> <i class="fas fa-angle-double-right"></i> </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<footer>
    <div class="footer__top">
        <div class="footer__top_slogan">
            <img src="public/img/header/header_logo.png" alt="">
            <p>Chúng tôi tự hào cung cấp các sản phẩm chính hãng. Nhằm mang đến xu hướng thời trang chính hãng trải rộng
                toàn quốc, với mong muốn trở thành nơi mua sắm thời trang uy tín với cam kết 100% hàng chính hãng.</p>
        </div>
        <div class="footer__top_contact">
            <span class="contact__title">Liên hệ</span>
            <p>Địa chỉ : 87/1 Đường số 6, Q. Gò Vấp, TP. Hồ Chí Minh </p>
            <p>Điện thoại : 0123 456 789</p>
            <p>Email : thachttps14525@fpt.edu.vn </p>
        </div>
        <div class="footer__top_contact">
            <span class="contact__title">Thông tin</span>
            <p>Về chúng tôi </p>
            <p>Chính sách bảo mật</p>
            <p> Thông tin giao hàng</p>
            <p>Điều khoản; Điều kiện</p>
        </div>
    </div>
@endsection