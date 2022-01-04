@extends('manager.layout')
@section('content')
<body>
    <div id="dashboardApp" class="showAside position_relative">

        <main class="main_content">
            <form action="{{ route('manager.product.update_store',$ProdId->id) }}"  enctype="multipart/form-data" method="POST">
                @csrf
                <div class="page_header">
                    <div class="container_fluid d_flex justify_content_between align_items_center">
                        <div class="d_flex align_items_end">
                            <h1>Sản phẩm</h1>
                            <ol class="breadcrumb d_flex align_items_center">
                                <li>
                                    <a href="{{ route('manager.product.index') }}">Trang chủ</a>
                                </li>
                                <li class="active">
                                    <a href="javascript:;">Thêm sản phẩm</a>
                                </li>
                            </ol>
                        </div>
                        <div class="d_flex align_items_center">
                            <button type="submit" name="addProduct_action" class="btn_item btn_primary">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                <span>Lưu</span>
                            </button>
                            <a class="btn_item btn_default" href="{{ route('manager.product.index') }}">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                                <span>Quay lại</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table_content container_fluid">
                    <div class="panel_table">
                        <div class="panel_heading">
                            <h2 class="panel_title">
                                <i class="fa fa-pencil"></i>
                                <span>Thêm sản phẩm </span>
                            </h2>
                        </div>
                        <!-- noti add form -->
                        <div class="notification_status_form open">

                        </div>

                        <!-- noti add form -->
                        <div class="panel_body">
                            <div id="table_content">
                                <div class="nav_tabs d_flex align_items_center">
                                    <a class="tab_item active" href="#tab_general">Tổng quan</a>
                                    <a class="tab_item" href="#tab_data">Dữ liệu</a>

                                </div>
                                <div class="tab_content">
                                    <div class="tab_pane" id="tab_general">
                                        <div class="form_group status_wrap d_flex align_items_center">
                                            <label for="status_value" class="form_label">Trạng thái</label>
                                            <div class="switch_status">
                                                <label for="status_value" class="status_toggle on">
                                                    <input type="checkbox" {{ $ProdId['prod_is_status'] == "on" ? "checked" :null }} name="prod_is_status" id="status_value" class="d_none">
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="content_group">
                                            <div class="form_group d_flex align_items_center">
                                                <label for="prod_name" class="form_label"><span style="color: #f00;">*</span> Tên sản phẩm</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ $ProdId['prod_name'] }}" type="text" name="prod_name" id="prod_name" placeholder="Tên sản phẩm" autocomplete="off" spellcheck="false">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 200px">
                                                    @error('prod_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="form_group d_flex align_items_center">
                                                <label for="prod_short_desc" class="form_label">Mô tả ngắn</label>
                                                <div class="form_input">
                                                    <textarea class="form_control ckeditor" name="prod_short_desc" id="prod_short_desc" placeholder="Mô tả ngắn" spellcheck="false">{{ $ProdId['prod_short_desc'] }}</textarea>
                                                    <p class="caption">Ký tự đã dùng: 0/70</p>
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 220px;width: 100%;">
                                                    @error('prod_short_desc')
                                                    <p class="text-danger" style="width: 247px">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                            <div class="form_group d_flex align_items_center flex-wrap">
                                                <label for="prod_short_desc" class="form_label">Thẻ mô tả (Meta desc)</label>
                                                <div class="form_input">
                                                    <textarea class="form_control" name="prod_short_desc" id="prod_short_desc" autocomplete="off"  spellcheck="false" cols="30" rows="10">{{ $ProdId['prod_short_desc'] }}</textarea>
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 220px">
                                                    @error('prod_short_desc')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center">
                                                <label for="prod_meta_title" class="form_label">Thẻ tiêu đề (Meta title)</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ $ProdId['prod_meta_title'] }}" type="text" name="prod_meta_title" id="prod_meta_title" placeholder="Thẻ tiêu đề (Meta title)" autocomplete="off" spellcheck="false">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 220px;width: 100%;">
                                                    @error('prod_meta_title')
                                                    <p class="text-danger" style="width: 218px">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center">
                                                <label for="prod_meta_desc" class="form_label">Thẻ mô tả (Meta desc)</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ $ProdId['prod_meta_desc'] }}" type="text" name="prod_meta_desc" id="prod_meta_desc" placeholder="Thẻ mô tả (Meta desc)" autocomplete="off" spellcheck="false">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 220px;width: 100%;">
                                                    @error('prod_meta_desc')
                                                    <p class="text-danger" style="width: 286px">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center">
                                                <label for="prod_meta_keywords" class="form_label">Từ khóa (tags)</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ $ProdId['prod_meta_keywords'] }}" type="text" name="prod_meta_keywords" id="prod_meta_keywords" placeholder="Thẻ mô tả (Meta desc)" autocomplete="off" spellcheck="false">
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center">
                                                <label for="search_gg_info" class="form_label">Xem trước kết quả tìm kiếm</label>
                                                <div class="form_input">
                                                    <div class="google_title">{{ $ProdId['prod_meta_title'] }}</div>
                                                    <div class="google_url">
                                                        <span class="default">Cellphones.com/</span>
                                                        <span class="url">{{ $ProdId['prod_meta_seourl'] }}</span>
                                                    </div>
                                                    <div class="google_desc">{{ $ProdId['prod_meta_desc'] }}</div>
                                                </div>
                                            </div>
                                            <div class="form_group seoUrl d_flex align_items_center">
                                                <label for="prod_meta_seourl" class="form_label"><strong style="color: #f00;">*</strong> Đường dẫn SEO</label>
                                                <div class="form_input">
                                                    <input class="form_control" type="text" id="prod_meta_seourl" value="{{ $ProdId['prod_meta_seourl'] }}" placeholder="Đường dẫn SEO" autocomplete="off" spellcheck="false">
                                                    <input type="hidden" name="prod_meta_seourl" value="{{ $ProdId['prod_meta_seourl'] }}">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 220px;width: 100%;">
                                                    @error('prod_meta_seourl')
                                                    <p class="text-danger" style="width: 247px">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: flex; align-items: center">
                                                <label for="prod_img">icon</label>
                                                <div class="image" style="width: 277px; height: 160px;padding: 0 20px;" >
                                                <img style="width: 100%;height: 100%;" src="{{url($ProdId->prod_img) }}" alt="{{$ProdId['thumbnail'] }}" />
    
                                                </div>
                                                <input  type="file"  name="prod_img" class="form-control"
                                                value="{{ $ProdId['prod_img']}}" id="prod_img">
    
                                                <input type="hidden" name="">
                                            </div>
                                        <div class="form_group d_flex align_items_center">
                                            <label for="prod_price_current" class="form_label">Giá bán</label>
                                            <div class="form_input">
                                                <input class="form_control" value="{{ $ProdId['prod_price_current'] }}" type="number" name="prod_price_current" id="prod_price_current" placeholder="Giá bán" autocomplete="off" spellcheck="false">
                                            </div>
                                        </div>
                                        <div class="form_group d_flex align_items_center">
                                            <label for="prod_price_old" class="form_label">Giá cũ</label>
                                            <div class="form_input">
                                                <input class="form_control" value="{{ $ProdId['prod_price_old'] }}" type="number" name="prod_price_old" id="prod_price_old" placeholder="Giá bán" autocomplete="off" spellcheck="false">
                                            </div>
                                        </div>
                                        <div class="form_group d_flex">
                                            <label for="" class="form_label" title="Nhấn để chọn danh mục">
                                                <span>Danh mục</span>
                                                <i class="fa fa-question-circle" style="color: #1E91CF;" aria-hidden="true"></i>
                                            </label>
                                            <div class="form_input">
                                                <div class="form_list_wrap">
                                                    <select name="prod_cate_id" id="input" class="form-control">
                                                        <option value="">----Chọn danh mục sản phẩm----</option>
                                                        @foreach ( $categories as $cate )
                                                            <option {{ $ProdId['prod_cate_id']==  $cate->id ? "selected":null}} value="{{ $cate->id }}">{{ $cate->cateprod_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class=" form_label" style="margin: 10px 0 0 0;width: 100%;">>
                                                        @error('prod_cate_id')
                                                        <p class="text-danger" style="width: 250px">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form_group d_flex">
                                            <label for="" class="form_label" title="Nhấn để chọn danh mục">
                                                <span>Tình trạng</span>
                                                <i class="fa fa-question-circle" style="color: #1E91CF;" aria-hidden="true"></i>
                                            </label>
                                            <div class="form_input">
                                                <div class="form_list_wrap">
                                                    <label for="new">Sản phẩm mới</label>
                                                    <select name="new" id="new" class="form-control">
                                                        <option {{ $ProdId['new'] === 0 ? "selected":null}} value="0">Mới</option>
                                                        <option {{ $ProdId['new'] == 1 ? "selected":null}} value="1">Cũ</option>
                                                    </select>
                                                    <div class=" form_label" style="margin: 10px 0 0 0;width: 100%;">>
                                                        @error('prod_cate_id')
                                                        <p class="text-danger" style="width: 250px">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_pane" id="tab_data">
 
                                        <div class="form_group d_flex align_items_center">
                                            <label for="prod_code" class="form_label">Mã sản phẩm [ Model ]</label>
                                            <div class="form_input">
                                                <input class="form_control" value="" type="text" name="prod_code" id="prod_code" placeholder="Mã sản phẩm [ Model ]" autocomplete="off" spellcheck="false">
                                            </div>
                                        </div>
                                        <div class="form_group d_flex align_items_center">
                                            <label for="prod_amount" class="form_label">Số lượng sản phẩm</label>
                                            <div class="form_input">
                                                <input class="form_control" value="" type="number" name="prod_amount" id="prod_amount" placeholder="Số lượng sản phẩm" autocomplete="off" spellcheck="false">
                                            </div>
                                        </div>
                                        <div class="form_group d_flex align_items_center">
                                            <label for="prod_sku" class="form_label" title="Đơn vị lưu kho (Stock Keeping Unit)">
                                                <span>SKU</span>
                                                <i class="fa fa-question-circle" style="color: #1E91CF;" aria-hidden="true"></i>
                                            </label>
                                            <div class="form_input">
                                                <input class="form_control" type="text" name="prod_sku" id="prod_sku" placeholder="Đơn vị lưu kho [ Stock Keeping Unit ]" autocomplete="off" spellcheck="false">
                                            </div>
                                        </div>
                                        <div class="form_group d_flex align_items_center">
                                            <label for="prod_warehouse" class="form_label" title="Hiểu thị trạng thái hết hàng">
                                                <span>Trạng thái kho hàng</span>
                                                <i class="fa fa-question-circle" style="color: #1E91CF;" aria-hidden="true"></i>
                                            </label>
                                            <div class="form_input">
                                                <select class="form_control" name="prod_status_stock" id="prod_status_stock">
                                                    <option value="">--Tùy chỉnh--</option>
                                                    <option  value="1">Còn hàng</option>
                                                    <option value="2">Hết hàng</option>
                                                    <option  value="3">Đặt trước</option>
                                                    <option  value="4">Ngừng kinh doanh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form_group d_flex align_items_center">
                                            <label for="prod_installment" class="form_label">Áp dụng trả góp</label>
                                            <div class="form_input">
                                                <label for="yes_installment">
                                                    <input type="radio" value="1" name="prod_is_installment[]" id="yes_installment">
                                                    <span>Có</span>
                                                </label>
                                                <label for="no_installment">
                                                    <input type="radio"  value="0" name="prod_is_installment[]" id="no_installment">
                                                    <span>Không</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>

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
        var metaTitleEl = document.querySelector("#prod_meta_title");
        var metaDescEl  = document.querySelector("#prod_meta_desc");
        var seoUrlEl    = document.querySelector("#prod_meta_seourl");

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
            document.querySelector("[name='prod_meta_seourl']").value = slug_string(vl);
            appendKeyWord(slug_string(vl), spaceAppend);
        });
        function appendKeyWord(keyWord, placeAppend)
        {
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

    </script>
    <script class="handle_selectAll_clearAll">
        let btnSelectAllCateProd = document.querySelector(".cateProdSelectAll");
        let btnSelectAllBlog     = document.querySelector(".blogSelectAll");
        let btnClearCateProd     = document.querySelector(".cateProdClearAll");
        let btnClearAllBlog      = document.querySelector(".blogClearAll");
        let listProdCates        = document.querySelectorAll("input[name='cateProds[]']");
        let listBlogs            = document.querySelectorAll("input[name='blogs[]']");
        btnSelectAllCateProd.addEventListener('click', function() {
            event.preventDefault();
            listProdCates.forEach(el => {
                el.checked = true;
            });
        });
        btnSelectAllBlog.addEventListener('click', function() {
            event.preventDefault();
            listBlogs.forEach(el => {
                el.checked = true;
            });
        });
        btnClearCateProd.addEventListener('click', function() {
            event.preventDefault();
            listProdCates.forEach(el => {
                el.checked = false;
            });
        });
        btnClearAllBlog.addEventListener('click', function() {
            event.preventDefault();
            listBlogs.forEach(el => {
                el.checked = false;
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="./public/js/app/common.js"></script> 
    <script src="{{ URL::asset('js/lib/s-select.min.js'); }}"></script>
    <script>
        $(document).ready(function(){
            $("#select-brand").select2();
        });
    </script>
    <script src="{{ URL::asset('plugins/Ckeditor/ckeditor/ckeditor.js'); }}"></script>

</body>

</html>