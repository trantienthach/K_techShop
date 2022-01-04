<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('user/css/reset.css'); }}">
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
    <link rel="stylesheet" href="{{ URL::asset('user/css/home.css'); }} ">
    <link rel="stylesheet" href="{{ URL::asset('user/css/detail.css'); }} ">
    <link rel="stylesheet" href="{{ URL::asset('user/css/cate_user.css'); }} ">
    <script src="{{ URL::asset('user/js/jquery-3.5.1.min.js'); }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
 
</head>

<body>
    <div class="container">
        <div class="container">
            <header>
                <div class="header__top">
                    <div class="header__logo">
                        <a href=""><img src="{{ URL::asset('user/img/header/header_logo.png'); }}" alt=""></a>
                    </div>
                    <div class="account">

                    </div>
                </div>
 
                <div class="header__bottom">
                    <!-- Logo -->
    
                    <!-- Menu -->
                    <nav>
                        <ul class="header__menu">
                            <li class="link1"><a href="{{ route('user.homeIndex') }}" class="header__link">Trang Chủ</a></li>
                            <li class="link1"><a href="" class="header__link">Giới Thiệu</a></li>
                            <li class="sub_menu_container link1">
                                <a style="cursor: pointer" class="header__link">Sản Phẩm</a>
                                <ul class="sub_menu">

                                    @foreach ( $cate as $value )
                                    <li class="link2"><a href="{{ route('user.cate_product',$value['id']) }}">{{ $value->cateprod_name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="link1"><a href="" class="header__link">Liên Hệ</a></li>
                        </ul>
                    </nav>
                    <!-- Search Bar -->
                    <div class="header__search_bar">
                      <ul class="cart-icon">
                        <li>
                            <i class="fas fa-cart-plus"></i>
                            <div class="cart-icon-before"></div>
                            <ul class="cart-hover">
                                <h4>Giỏ hàng của bạn</h4>
                                @if (session()->exists('cart'))
                                  @php
                                    $total = 0;
                                  @endphp
                                  @foreach ( $cart as $item )
                                  @php
                                    $total += $item['price'] * $item['quantity']
                                  @endphp
                                    <li class="cart-prod-hover-item">
                                      <div class="row-cart-hover-item row-cart-hover-img">
                                        <img src="{{ url($item['image']) }}" alt="{{$item['image'] }}">
                                      </div>              
                                      <div class="row-cart-hover-item">
                                        <p style="margin: 0">{{ $item['name'] }}</p>
                                      </div> 
                                      <div class="row-cart-hover-item">
                                        <p>{{ $item['quantity'] }}</p>
                                      </div>         
                                      <div class="row-cart-hover-item">
                                        <span>{{ number_format($item['price'] * $item['quantity']) }} VND</span>
                                      </div> 

                                    </li>
                                  @endforeach
                                      <li class="cart-prod-hover-item">
                                          <p><b>Tổng tiền = {{ number_format($total) }} VND</b></p>
                                      </li>
                                @else 
                                    <li class="">
                                      <div class=" text-center">
                                        <img width="100%" src="{{ URL::asset('user/img/emptycart.png'); }}" alt="">
                                      </div>              
                                    </li>

                                @endif
                                <div class="show-cart">
                                  <a href="{{ route('user.show_cart') }}" class="btn btn-primary cart-btn">Đến giỏ hàng</a>                            

                                </div>
                            </ul>
                        </li>                          
                      </ul>
                        <form action="" method="GET" class="search_form">
                            <input type="hidden" name="page" value="products">
                            <input type="text" name="searchStr" placeholder="Tìm kiếm" value="">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

        </div>
        @yield('content')
        <div class="container">
            <footer>
                <div class="footer__top">
                    <div class="footer__top_slogan">
                        <img src="img/header/header_logo.png" alt="">
                        <p>Chúng tôi tự hào cung cấp các sản phẩm chính hãng. Nhằm mang đến xu hướng thời trang chính hãng trải rộng
                            toàn quốc, với mong muốn trở thành nơi mua sắm thời trang uy tín với cam kết 100% hàng chính hãng.</p>
                    </div>
                    <div class="footer__top_contact">
                        <span class="contact__title">Liên hệ</span>
                        <p>Địa chỉ : H11 Cư xá Phú Lâm B, Phường 13 Quận 6 </p>
                        <p>Điện thoại : 0788884003</p>
                        <p>Email : thachtran0810@gmail.com </p>
                    </div>
                    <div class="footer__top_contact">
                        <span class="contact__title">Thông tin</span>
                        <p>Về chúng tôi </p>
                        <p>Chính sách bảo mật</p>
                        <p> Thông tin giao hàng</p>
                        <p>Điều khoản; Điều kiện</p>
                    </div>
                </div>
                <div class="footer__bottom">
                    <p class="copy_right">© Copyright 2020 K-Tech.</p>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ URL::asset('user/js/danhmuc.js'); }}"></script>
    <script src="{{ URL::asset('user/js/detail.js'); }}"></script>
    <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-3.5.1.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
  ></script>
  <script type="text/javascript">
      $(document).ready(function(){
        $('.slideshow').slick({
          dots: true,
          infinite: true,
          speed: 300,
          slidesToShow: 1,
          adaptiveHeight: true,
          autoplay: true,
          autoplaySpeed: 2000,
          prevArrow:`<button type='button' class='slick-prev pull-left'><i class="fas fa-angle-left"></i></button>`,
          nextArrow:`<button type='button' class='slick-next pull-right'><i class="fas fa-angle-right"></i></button>`
        });
      });
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
  <script src="{{ URL::asset('user/js/cart.js'); }}"></script>
  <script>
    
  </script>

</body>

</html>