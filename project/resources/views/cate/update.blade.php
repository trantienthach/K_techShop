@extends('manager.layout')
@section('content')

<body>
    <div id="dashboardApp" class="showAside position_relative">
        <main class="main_content">
            <form action="{{ route('manager.cate.update_store',$cateId->id) }}"  enctype="multipart/form-data" method="POST">
                @csrf
                <div class="page_header">
                    <div class="container_fluid d_flex justify_content_between align_items_center">
                        <div class="d_flex align_items_end">
                            <h1>Danh mục</h1>
                            <ol class="breadcrumb d_flex align_items_center">
                                <li>
                                    <a href="">Trang chủ</a>
                                </li>
                                <li class="active">
                                    <a href="javascript:;">Danh mục</a>
                                </li>
                            </ol>
                        </div>
                        <div class="d_flex align_items_center">
                            <button type="submit" class="btn_item btn_primary" name="addCateProd_action">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                <span>Lưu</span>
                            </button>
                            <a class="btn_item btn_default" href="{{ route('manager.cate.index') }}">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                                <span>Quay về</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table_content container_fluid">
                    <div class="panel_table">
                        <div class="panel_heading">
                            <h2 class="panel_title">
                                <i class="fa fa-pencil"></i>
                                <span>Sửa danh mục</span>
                            </h2>
                        </div>
                        <!-- noti add form -->

                        <!-- noti add form -->
                        <div class="panel_body">
                            <div id="table_content">
                                <div class="nav_tabs d_flex align_items_center">
                                    <a class="active tab_item" href="#tab_general">Tổng quan</a>
                                    <a class="tab_item" href="#tab_data">Dữ liệu</a>
                                </div>
                                <div class="tab_content">
                                    <div class="tab_pane" id="tab_general">
                                    <div class="form_group status_wrap d_flex align_items_center">
                                            <label for="status_value" class="form_label">Trạng thái</label>
                                            <div class="switch_status">
                                                <label for="status_value" class="status_toggle on">
                                                    <input type="checkbox" {{ $cateId['cateprod_is_status'] == "on" ? "checked" :null }} name="cateprod_is_status"  id="status_value" class="d_none">
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="content_group">
                                            <div class="form_group d_flex align_items_center flex-wrap">
                                                <label for="cateprod_name" class="form_label">Tên danh mục</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ $cateId['cateprod_name'] }}" type="text" name="cateprod_name" id="cateprod_name" placeholder="Nhập tên danh mục" autocomplete="off" spellcheck="false">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 200px">
                                                    @error('cateprod_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form_group d_flex align_items_center flex-wrap">
                                                <label for="cateprod_meta_keywords" class="form_label">Từ khoá</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ $cateId['cateprod_meta_keywords'] }}" type="text" name="cateprod_meta_keywords" id="cateprod_meta_keywords" placeholder="Nhập từ khoá" autocomplete="off" spellcheck="false">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 200px">
                                                    @error('cateprod_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center flex-wrap">
                                                <label for="cateprod_meta_title" class="form_label">Thẻ tiêu đề (Meta title)</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ $cateId['cateprod_meta_title'] }}" type="text" name="cateprod_meta_title" id="cateprod_meta_title" placeholder="Thẻ tiêu đề (Meta title)" autocomplete="off" spellcheck="false">
                                                </div>
                                                
                                            </div>
                                            <div class="form_group d_flex align_items_center flex-wrap">
                                                <label for="cateprod_meta_desc" class="form_label">Thẻ mô tả (Meta desc)</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ $cateId['cateprod_meta_desc'] }}" type="text" name="cateprod_meta_desc" id="cateprod_meta_desc" placeholder="Thẻ mô tả (Meta desc)" autocomplete="off" spellcheck="false">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 220px">

                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center ">
                                                <label for="search_gg_info" class="form_label">Xem trước kết quả tìm kiếm</label>
                                                <div class="form_input">
                                                    <div class="google_title">{{ $cateId['cateprod_meta_title'] }}</div>
                                                    <div class="google_url">
                                                        <span class="default">Cellphones/</span>
                                                        <span class="url">{{ $cateId['cateprod_meta_url'] }}</span>
                                                    </div>
                                                    <div class="google_desc">{{ $cateId['cateprod_meta_desc'] }}</div>
                                                </div>
                                            </div>
                                            <div class="form_group cateprod_meta_url d_flex align_items_center flex-wrap">
                                                <label for="cateprod_meta_url" class="form_label">Đường dẫn SEO</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ $cateId['cateprod_meta_url'] }}" type="text" id="cateprod_meta_url" name="cateprod_meta_url" placeholder="Đường dẫn SEO" autocomplete="off" spellcheck="false">
                                                </div>

                                            </div>
                                            <div class="form-group" style="display: flex; align-items: center">
                                                <label for="cateprod_icon">icon</label>
                                                <div class="image" style="width: 277px; height: 160px;padding: 0 20px;" >
                                                <img style="width: 100%;height: 100%;" src="{{url($cateId->cateprod_icon) }}" alt="{{$cateId['thumbnail'] }}" />
    
                                                </div>
                                                <input  type="file"  name="cateprod_icon" class="form-control"
                                                value="{{ $cateId['cateprod_icon']}}" id="cateprod_icon">
    
                                                <input type="hidden" name="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_pane" id="tab_data">
                                        <div class="form_group d_flex align_items_center">
                                            <label for="cateprod_parent_id" class="form_label">Danh mục cha</label>
                                            <div class="form_input">
                                                <select class="form_control" name="cateprod_parent_id" id="cateprod_parent_id">

                                                </select>
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


</body>

</html>