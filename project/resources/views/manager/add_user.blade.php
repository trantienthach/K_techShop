@extends('manager.layout')
@section('content')
<body>
    <div id="dashboardApp" class="showAside position_relative">
        <main class="main_content">
            <form action="{{ route('manager.store_add') }}"  enctype="multipart/form-data" method="POST">
                @csrf
                <div class="page_header">
                    <div class="container_fluid d_flex justify_content_between align_items_center">
                        <div class="d_flex align_items_end">
                            <h1>Thêm Manager</h1>
                            <ol class="breadcrumb d_flex align_items_center">
                                <li>
                                    <a href="">Trang chủ</a>
                                </li>
                                <li class="active">
                                    <a href="javascript:;">Manager</a>
                                </li>
                            </ol>
                        </div>
                        <div class="d_flex align_items_center">
                            <button type="submit" class="btn_item btn_primary" name="addManager_action">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                <span>Lưu</span>
                            </button>
                            <a class="btn_item btn_default" href="{{ route('manager.index') }}">
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
                                <span>Thêm Manager</span>
                            </h2>
                        </div>
                        <!-- noti add form -->

                        <!-- noti add form -->
                        <div class="panel_body">
                            <div id="table_content">
                                <div class="nav_tabs d_flex align_items_center">
                                    <a class="active tab_item" href="#tab_general">Tổng quan</a>
                                </div>
                                <div class="tab_content">
                                    <div class="tab_pane" id="tab_general">
                                    <div class="form_group status_wrap d_flex align_items_center">
                                            <label for="status_value" class="form_label">Trạng thái</label>
                                            <div class="switch_status">
                                                <label for="status_value" class="status_toggle on">
                                                        <input type="checkbox" {{ old('user_is_active') == "on" ? "checked" : "" }} name="user_is_active" id="status_value" class="d_none">
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="content_group">
                                            <div class="form_group d_flex align_items_center flex-wrap">
                                                <label for="fullname" class="form_label">Họ và tên</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ old('fullname') }}" type="text" name="fullname" id="fullname" placeholder="Nhập họ tên"  spellcheck="false">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 155px">
                                                    @error('fullname')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form_group d_flex align_items_center flex-wrap">
                                                <label for="username" class="form_label">Username</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ old('username') }}" type="text" name="username" id="username" placeholder="Nhập username"  spellcheck="false">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 181px">
                                                  @error('username')
                                                  <p class="text-danger">{{ $message }}</p>
                                                  @enderror
                                              </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center flex-wrap">
                                                <label for="password" class="form_label">Mật khẩu</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ old('password') }}" type="text" name="password" id="password" placeholder="Nhập mật khẩu"  spellcheck="false">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 174px">
                                                    @error('password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center flex-wrap">
                                                <label for="confirmation_pwd" class="form_label">Nhập lại mật khẩu</label>
                                                <div class="form_input">
                                                    <input class="form_control" value="{{ old('confirmation_pwd') }}" type="text" name="confirmation_pwd" id="confirmation_pwd" placeholder="Nhập lại mật khẩu"  spellcheck="false">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 220px">
                                                    @error('confirmation_pwd')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center flex-wrap">
                                              <label for="email" class="form_label">Email</label>
                                              <div class="form_input">
                                                  <input class="form_control" value="{{ old('email') }}" type="text" name="email" id="email" placeholder="Nhập email"  spellcheck="false">
                                              </div>
                                              <div class=" form_label" style="margin: 10px 0 0 220px">
                                                  @error('email')
                                                  <p class="text-danger">{{ $message }}</p>
                                                  @enderror
                                              </div>
                                          </div>
                                            <div class="form_group d_flex align_items_center">
                                              <label for="role" class="form_label">Quyền</label>
                                              <div class="form_input">
                                                  <select class="form_control" name="role" id="role">
                                                          <option value="">--- Chọn ---</option>
                                                          <option value="1">Manager</option>
                                                          <option value="2">User</option>
                                                  </select>
                                              </div>
                                          </div>
                                            <div class="form_group cateprod_meta_url d_flex align_items_center flex-wrap">
                                                <label for="user_avatar"  class="form_label">Avatar</label>
                                                <div class="form_input">
                                                    <input  type="file"  name="user_avatar" class="form-control"
                                                    value="{{ old('user_avatar') }}" id="user_avatar">
                                                </div>
                                                <div class=" form_label" style="margin: 10px 0 0 192px">
                                                    @error('user_avatar')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_pane" id="tab_data">


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