<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ URL::asset('css/fontawesome/css/all.css'); }}  " />
    <link rel="stylesheet" href=" {{ URL::asset('css/reset.css'); }}" />
    <link rel="stylesheet" href=" {{ URL::asset('css/global.css'); }}" />
    <link rel="stylesheet" href=" {{ URL::asset('css/slick/slick/slick.css'); }}" />
    <link rel="stylesheet" href=" {{ URL::asset('css/slick/slick/slick-theme.css'); }}" />
    <link rel="stylesheet" href=" {{ URL::asset('css/style.css'); }} ">
    <script src="public/js/jquery-3.5.1.min.js"></script>
    <script src="public/js/animsition.min.js"></script>
    <link rel="stylesheet" href=" {{ URL::asset('css/animsition.min.css'); }} ">

    <link href=" {{ URL::asset('js/emo/dist/emojionearea.min.css'); }}" rel="stylesheet">
    <script src=" {{ URL::asset('js/emo/dist/emojionearea.min.js'); }} "></script>
    <title>Laravel app - @yield('title') </title>



</head>

<body>
    <div id="loading">
        <div class="loader"></div>
    </div>

    <header>
        <div class="header__top">
                <a href="{{ route('admin.logout') }}" id="log_out">Thoát <i class="fas fa-sign-out-alt"></i></a>
                <a href="" id="login"><i class="fas fa-sign-in-alt"></i> Đăng Nhập</a>
                <a href="?page=register" id="register"><i class="fas fa-user-plus"></i> Đăng Ký</a>
        </div>
        <div class="header__bottom">
            <!-- Logo -->
            <div class="header__logo">
                <a href="?page=home"><img src="public/img/header/header_logo.png" alt="" /></a>
            </div>
            <!-- Menu -->
            <nav>
                <ul class="header__menu">
                    <li class="link1"><a href="?page=home" class="header__link">Trang Chủ</a></li>
                    <li class="link1"><a href="?page=about" class="header__link">Giới Thiệu</a></li>
                    <li class="sub_menu_container link1">
                        <a href="?page=products" class="header__link">Sản Phẩm</a>
                        <ul class="sub_menu">
                        </ul>
                    </li>
                    <li class="link1"><a href="?page=contact" class="header__link">Liên Hệ</a></li>
                </ul>
            </nav>
            <!-- Search Bar -->
            <div class="header__search_bar">
                <form action="" method="GET" class="search_form">
                    <input type="hidden" name="page" value="products">
                    <input type="text" name="key_words" placeholder="Tìm kiếm" value="" />
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

    </header>
    @yield('content')
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
                <p>Email : phanhuykha123@gmail.com </p>
            </div>
            <div class="footer__top_contact">
                <span class="contact__title">Thông tin</span>
                <p>Về chúng tôi </p>
                <p>Chính sách bảo mật</p>
                <p> Thông tin giao hàng</p>
                <p>Điều khoản & Điều kiện</p>
            </div>
        </div>
        <div class="footer__bottom">
            <p class="copy_right">© Copyright 2020 K-Tech.</p>
        </div>
    </footer>
    <script src=" {{ URL::asset('js/jquery.js'); }} "></script>
    <script src=" {{ URL::asset('js/slick/slick/slick.js'); }}"></script>
    <script src=" {{ URL::asset('js/slider.js'); }} "></script>
    <script src=" {{ URL::asset('js/app.js'); }} "></script>
    <script src=" {{ URL::asset('js/loading.js'); }} "></script>
    </body>