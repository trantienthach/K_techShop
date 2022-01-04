@extends('manager.layout')
@section('content')
<body>
    <div id="dashboardApp" class="showAside position_relative">

        <main class="main_content">
            <div class="page_header">
                <div class="container_fluid d_flex justify_content_between align_items_center">
                    <div class="d_flex align_items_end">
                        <h1>USER</h1>
                        <ol class="breadcrumb d_flex align_items_center">
                            <li>
                                <a href="">Trang chủ</a>
                            </li>
                            <li class="active">
                                <a href="#">USER</a>
                            </li>
                        </ol>
                    </div>
                    <div class="d_flex align_items_center">
                        <a class="btn_item btn_primary" href="">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span>Thêm mới</span>
                        </a>
                        <a class="btn_item btn_default" href="">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            <span>Làm mới</span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="container_fluid">
                <div class="action_wrap d_flex align_items_center">
                    <div class="page_action_item filter grid_column_4">
                        <div class="value d_flex align_items_center">
                            <div class="form_change_wrap position_relative">
                                <form action="">
                                    <select name="filler" id="orderBy" class="form_control">
                                        <option value="">-- Tác vụ --</option>
                                        <option value="on">Bật</option>
                                        <option value="off">Tắt</option>
                                    </select>
                                    <button  type="submit" class="form_button position_absolute">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <span>Lọc</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="page_action_item search grid_column_4">
                        <div class="value d_flex align_items_center w_100">
                            <form class="search_module w_100" method="" id="formSearch_Manager" data-url="">
                                <div class="form_group position_relative">
                                    <input value="" type="text" name="searchStr" id="s_val_brand" class="form_control" placeholder="Nhập tên danh mục muốn tìm kiếm..." autocomplete="off" spellcheck="false">
                                    <button type="submit" class="form_button position_absolute">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <span>Tìm kiếm</span>
                                    </button>
                                    <div class="search_recommend_wrap position_absolute">
                                        <ul class="search_list"></ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table_content container_fluid">
                <!-- // -- Notification -->
                <div class="alert_wrap">
                    <div class="alert position_relative alert_success" data-status="">
                        <i class="fa fa-check-circle" style="margin-right: 5px;"></i>
                        <span></span>
                        <button type="button" class="close position_absolute">x</button>
                    </div>
                </div>
                <!-- // -- Notification -->
                <div class="panel_table">
                    <div class="panel_heading">
                        <h2 class="panel_title">
                            <i class="fa fa-list"></i>
                            <span>Danh sách</span>
                        </h2>
                    </div>
                    <div class="panel_body">
                        <div id="table_content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>STT</td>

                                        <td>Tên Khách hàng</td>
                                        <td>Số điện thoại</td>
                                        <td style="width: 400px">Địa chỉ</td>
                                        <td style="width: 200px">Email</td>

                                        <td>Tên sản phẩm</td>
                                        <td>Trạng thái</td>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td></td>
                                            <td class="image">
                                            </td>
                                            <td></td>
                                            <td>
  
                                            </td>
                                            <td></td>
                                            <td>

                                            </td>
                                            <td class="update">

                                            </td>

                                        </tr>
                                </tbody>
                            </table>
                            <div class="">
                                {{--  {{ $result->links() }}  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
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
    
</body>
</html>