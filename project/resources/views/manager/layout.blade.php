<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ URL::asset('css/config/font.css'); }} ">
    <link rel="stylesheet" href="{{ URL::asset('css/config/reset.css'); }} ">
    <link rel="stylesheet" href="{{ URL::asset('css/config/base.css'); }} ">
    <link rel="stylesheet" href="{{ URL::asset('css/config/base.css'); }} ">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome/css/font-awesome.min.css'); }} ">
    <link rel="stylesheet" href=" {{ URL::asset('css/style/layout.css'); }}">
    <link rel="stylesheet" href=" {{ URL::asset('css/style/home.css'); }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Sản phẩm</title>
</head>

<header class="header">
    <div class="header_wrap d_flex align_items_center justify_content_between">
        <div class="navbar_header_left d_flex align_items_center">
            <a href="" class="navbar_h_item navIcon_aside_toggle">
                <i class="fa fa-outdent" aria-hidden="true"></i>
            </a>
            <a href="" class="navbar_h_item logoTop_header" style="display:flex; align-items: center;">
                <img width="30" src="{{ URL::asset('img/thachthach.jpg');  }}">
                <span style="font-weight: 600; color:#1f86c8; margin-left: 5px;">TRẦN TIẾN THẠCH</span>
            </a>
        </div>
        <div class="navbar_header_right">
            <div class="mask_dropdown"></div>
            <ul class="list_action_app d_flex align_items_center">
                <li class="action_app_item position_relative">
                    <a href="" class="action_label notification position_relative" title="Thông báo">
                        <span class="value label_danger text_white position_absolute">0</span>
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown_menu position_absolute">
                        <li class="dropdown_header">Nâng cấp</li>
                        <li class="dropdown_menu_vl_item">
                            <a href="" class="d_flex justify_content_between align_items_center">
                                <span class="label">Yêu cầu cập nhật</span>
                                <span class="label_warning value">0</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown_header">Đơn đặt hàng</li>
                        <li class="dropdown_menu_vl_item">
                            <a href="" class="d_flex justify_content_between align_items_center">
                                <span class="label">Đang xử lý</span>
                                <span class="label_warning value">0</span>
                            </a>
                        </li>
                        <li class="dropdown_menu_vl_item">
                            <a href="" class="d_flex justify_content_between align_items_center">
                                <span class="label">Đã xử lý</span>
                                <span class="label_success value">0</span>
                            </a>
                        </li>
                        <li class="dropdown_menu_vl_item">
                            <a href="" class="d_flex justify_content_between align_items_center">
                                <span class="label">Đổi / Trả hàng</span>
                                <span class="label_danger value">0</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown_header">Khách hàng</li>
                        <li class="dropdown_menu_vl_item">
                            <a href="" class="d_flex justify_content_between align_items_center">
                                <span class="label">Đang truy cập</span>
                                <span class="label_success value">0</span>
                            </a>
                        </li>
                        <li class="dropdown_menu_vl_item">
                            <a href="" class="d_flex justify_content_between align_items_center">
                                <span class="label">Chờ duyệt</span>
                                <span class="label_danger value">0</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown_header">USER</li>
                        <li class="dropdown_menu_vl_item">
                            <a href="" class="d_flex justify_content_between align_items_center">
                                <span class="label">Hết hàng</span>
                                <span class="label_danger value">0</span>
                            </a>
                        </li>
                        <li class="dropdown_menu_vl_item">
                            <a href="" class="d_flex justify_content_between align_items_center">
                                <span class="label">Nhận xét</span>
                                <span class="label_danger value">0</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown_header">Cộng tác viên</li>
                        <li class="dropdown_menu_vl_item">
                            <a href="" class="d_flex justify_content_between align_items_center">
                                <span class="label">Chờ duyệt</span>
                                <span class="label_danger value">0</span>
                            </a>
                        </li>
                        <li class="dropdown_menu_vl_item">
                            <a href="" class="d_flex justify_content_between align_items_center">
                                <span class="label">Yêu cầu rút tiền</span>
                                <span class="label_danger value">0</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="action_app_item">
                    <a href="" class="action_label" title="Cửa hàng">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="action_app_item">
                    <a href="{{ route('admin.logout') }}" class="action_label" title="Đăng xuất">
                        <span class="title">Thoát</span>
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
<aside class="aside scroll_custom">
    <div class="profile d_flex align_items_center">
        <div class="logo_user">
            <img width="50" src="{{ URL::asset('img/thachthach.jpg');  }}" alt="">
        </div>
        <div class="info_user">
            <h3 class="user_fullName">Trần Tiến Thạch</h3>
            <small class="user_title">Quản trị viên</small>
        </div>
    </div>
    <ul class="menu">
        <li class="menu-dashboard">
            <a href="">
                <i class="fa fa-dashboard"></i>
                <span>Bảng điều kiển</span>
            </a>
        </li>
        <li class="menu-catalog">
            <a href="" class="parent">
                <i class="fa fa-tags"></i>
                <span>Users</span>
            </a>
            <ul class="dropdown_menu">
                <li class="active">
                    <a href="{{ route('manager.index') }}">
                        <i class="fa fa-angle-right"></i>
                        <span>Manager</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-sale">
            <a href="" class="parent">
                <i class="fa fa-shopping-basket"></i>
                <span>Bán hàng</span>
            </a>
            <ul class="dropdown_menu">
                <li class="active">
                    <a href="{{ route('manager.cate.index') }}">
                        <i class="fa fa-angle-right"></i>
                        <span>Danh mục</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manager.product.index') }}">
                        <i class="fa fa-angle-right"></i>
                        <span>Sản phẩm</span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
    <div class="process_sale">
        <div class="sale_status_item">
            <div class="d_flex justify_content_between align_items_center">
                <span class="label">Đơn hàng hoàn thành</span>
                <span class="value">0%</span>
            </div>
            <div class="process position_relative">
                <div class="progress_bar position_absolute label_success" style="top: 0; left: 0; height: 100%; width: 20%;"></div>
            </div>
        </div>
        <div class="sale_status_item">
            <div class="d_flex justify_content_between align_items_center">
                <span class="label">Đơn hàng đang xử lý</span>
                <span class="value">0%</span>
            </div>
            <div class="process position_relative">
                <div class="progress_bar position_absolute label_danger" style="top: 0; left: 0; height: 100%; width: 20%;"></div>
            </div>
        </div>
        <div class="sale_status_item">
            <div class="d_flex justify_content_between align_items_center">
                <span class="label">Đơn hàng chờ duyệt</span>
                <span class="value">0%</span>
            </div>
            <div class="process position_relative">
                <div class="progress_bar position_absolute label_warning" style="top: 0; left: 0; height: 100%; width: 20%;"></div>
            </div>
        </div>
    </div>
</aside>

@yield('content')

<footer class="footer">
    <p>© Copyright 2020 - TIẾN THẠCH</p>
</footer>
<script type="text/javascript" src=" {{ URL::asset('js/config/jquery.min.js'); }} "></script>
<script class="pp_notification">
    let btnOpen = document.querySelector(".action_label.notification");
    let popupEl = document.querySelector(".list_action_app .action_app_item .dropdown_menu");
    let maskDropdown = document.querySelector(".mask_dropdown");
    maskDropdown.addEventListener('click', function() {
        popupEl.classList.remove('open');
        this.classList.remove('open');
    });
    btnOpen.addEventListener('click', function() {
        event.preventDefault();
        if(popupEl.classList.contains('open')) {
            popupEl.classList.remove('open');
            maskDropdown.classList.remove('open');
        } else {
            popupEl.classList.add('open');
            maskDropdown.classList.add('open');
        }
    });
</script>
<script class="pp_menu_aside">
    let menuItemButton = document.querySelectorAll("aside.aside .menu li a.parent");
    menuItemButton.forEach(function(el) {
        el.addEventListener('click', function () {
            event.preventDefault();
            let menuDr = this.parentElement.children[1];
            if(menuDr.classList.contains('open')) {
                menuDr.classList.remove('open');
            } else {
                menuDr.classList.add('open');
            }
        });
    });
</script>
<script class="pp_toogle_aside">
    let toogleAsideButton = document.querySelector(".navbar_header_left .navIcon_aside_toggle");
    let appWrapEl = document.getElementById("dashboardApp");
    let localStoreAside = localStorage.getItem("asideShow");
    if(localStoreAside !== null) {
        appWrapEl.classList.add('showAside');
        toogleAsideButton.children[0].classList.remove('fa-indent');
        toogleAsideButton.children[0].classList.add('fa-outdent');
    } else {
        appWrapEl.classList.remove('showAside');
        toogleAsideButton.children[0].classList.remove('fa-outdent');
        toogleAsideButton.children[0].classList.add('fa-indent');
    }
    toogleAsideButton.addEventListener('click', function() {
        event.preventDefault();
        if(appWrapEl.classList.contains('showAside')) {
            appWrapEl.classList.remove('showAside');
            this.children[0].classList.remove('fa-outdent');
            this.children[0].classList.add('fa-indent');
            localStorage.removeItem('asideShow');
        } else {
            appWrapEl.classList.add('showAside');
            this.children[0].classList.remove('fa-indent');
            this.children[0].classList.add('fa-outdent');
            localStorage.setItem('asideShow',true);
        }
    });
</script>
<script class="handle_show_tab_pane">
    activePageTab();

    function activePageTab() {
        let elActive = document.querySelector("#table_content .nav_tabs .tab_item.active");
        let idPane = (elActive.getAttribute('href')).split("#")[1];
        let elPane = document.getElementById(idPane);
        (document.querySelectorAll(".tab_pane")).forEach(el => {
            el.style.display = "none";
        });
        elPane.style.display = "block";
    }
    let listBtnEl = document.querySelectorAll("#table_content .nav_tabs .tab_item");
    listBtnEl.forEach(el => {
        el.addEventListener('click', function() {
            event.preventDefault();
            listBtnEl.forEach(el => {
                el.classList.remove('active');
            });
            this.classList.add('active');
            activePageTab();
        });
    });
</script>
<script>
    //========= ##### handle keyup word and append ##### ==========//
    var metaTitleEl = document.querySelector("#cateprod_meta_title");
    var metaDescEl = document.querySelector("#cateprod_meta_desc");
    var seoUrlEl = document.querySelector("#cateprod_meta_url");

    metaTitleEl.addEventListener('keyup', function() {
        let vl = this.value;
        let spaceAppend = document.querySelector(".google_title");
        appendKeyWord(vl, spaceAppend);
    });

    metaDescEl.addEventListener('keyup', function() {
        let vl = this.value;
        let spaceAppend = document.querySelector(".google_desc");
        appendKeyWord(vl, spaceAppend);
    });


    seoUrlEl.addEventListener('keyup', function() {
        let vl = this.value;
        let spaceAppend = document.querySelector(".google_url .url");
        document.querySelector("[name='cateprod_meta_url']").value = slug_string(vl);
        appendKeyWord(slug_string(vl), spaceAppend);
    });


    function appendKeyWord(keyWord, placeAppend) {
        placeAppend.innerText = keyWord;
    }

    function slug_string(str) {
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
        str = str.replace(/-+-/g, "-");
        str = str.replace(/^\-+|\-+$/g, "");
        if (str === undefined) {
            return false;
        } else {
            return str;
        }
    }

    // handle notification status add cate new
    var alertStatusAddCateEl = document.querySelector('.alert');
    if (alertStatusAddCateEl !== null) {
        var buttonCloseAlertEl = document.querySelector(".alert .close");
        if (alertStatusAddCateEl.getAttribute('data-status') === 'true') {
            alertStatusAddCateEl.classList.add('open');
            setTimeout(function() {
                alertStatusAddCateEl.classList.remove('open');
            }, 5000);
        }

        buttonCloseAlertEl.addEventListener('click', function() {
            alertStatusAddCateEl.classList.remove('open');
        });
    }
</script>
<script class="checked_list">
    let btnCheckAllBtn = document.querySelector("input[type='checkbox'].checkAllButton");
    let listBtnCheck   = document.querySelectorAll("input[type='checkbox'].checkItem");
    btnCheckAllBtn.addEventListener('click', function() {
        if(this.checked) {
            listBtnCheck.forEach(el=> {
                el.checked = true;
            });
        } else {
            listBtnCheck.forEach(el=> {
                el.checked = false;
            });
        }
    });
</script>
<script class="handle_toggle_input_status">
    let btnToggle = document.querySelectorAll("#table_content table.table tr .toggle_status");
    btnToggle.forEach(el => {
        el.addEventListener('click', function() {
            if(this.classList.contains('on')) {
                this.classList.remove('on');
                this.classList.add('off');
            } else {
                this.classList.remove('off');
                this.classList.add('on');
            }
        });
    });
</script>