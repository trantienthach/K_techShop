$(function() {

    __construct();

    function __construct()
    {
        handleChangeStatus();
        handleDelete();
        handleMultiAction();
        handleRecommendSearch() 
        
    }

    function handleMultiAction()
    {
        let dataAction = {
            "btnMulti"       : ".action_wrap .page_action_item .form_change_wrap .form_button",
            "listCheck"      : "#table_content .checkItem",
            "baseURL_delete" : "?controller=Categories&action=deleteMulti",
            "baseURL_status" : "?controller=Categories&action=changeStatusMulti",
        };

        $(dataAction['btnMulti']).click(function() {
            let $actionValue = $(this).parents('.form_change_wrap').find('select').val();
            if( $actionValue.length !== 0 ) {
                let $listIdCateProd = [];
                $(dataAction['listCheck']).each(function() {
                    if(this.checked) {
                        $listIdCateProd.push(parseInt($(this).parents('tr').attr('data-id')));
                    }
                });
                if( $listIdCateProd.length !== 0 ) {
                    if( $actionValue === 'delete' ) {
                        // delete CateProd
                        if( confirm("Bạn có thực sự muốn xóa danh sách danh mục này ?") ) {
                            $.ajax({
                                url: dataAction['baseURL_delete'],
                                method: "POST",
                                data: { list_id_cateprod : $listIdCateProd },
                                beforeSend() {
                                    console.log('deleting list CateProd');
                                },
                                dataType: "json",
                                success(data) {
                                    if(data['status']) {
                                        $listIdCateProd.forEach(item => {
                                            $("tr[data-id='"+ (item) +"']").stop().fadeOut(300);
                                        });
                                    } else {
                                        notificationAlert('error', "Xóa danh sách danh mục không thành công", 5000);
                                    }
                                },
                                error(xhr, AjaxOptions, thrownError) {
                                    notificationAlert('error', 'Xóa danh sách danh mục không thành công', 5000);
                                    console.log(xhr.status);
                                    console.log(thrownError);
                                }
                            });
                        }
                    } else {
                        $.ajax({
                            url: dataAction['baseURL_status'],
                            method: "POST",
                            data: { list_id_cateprod : $listIdCateProd, cateprod_is_status : $actionValue },
                            beforeSend() {
                                console.log('Updating list CateProd');
                            },
                            dataType: "json",
                            success(data) {
                                if(data['status']) {
                                    $listIdCateProd.forEach(item => {
                                        let statusOld = $actionValue === 'on' ? 'off' : 'on';
                                        $("tr[data-id='"+ (item) +"']").find('.toggle_status').removeClass(statusOld);
                                        $("tr[data-id='"+ (item) +"']").find('.toggle_status').addClass($actionValue);
                                    });
                                    notificationAlert('status', "Cập nhật danh sách danh mục thành công", 5000);
                                } else {
                                    notificationAlert('error', "Cập nhật danh sách danh mục không thành công", 5000);
                                }
                            },
                            error(xhr, AjaxOptions, thrownError) {
                                notificationAlert('error', 'Cập nhật danh sách danh mục không thành công', 5000);
                                console.log(xhr.status);
                                console.log(thrownError);
                            }
                        });
                    }
                } else {
                    notificationAlert('error', "Vui lòng chọn 1 danh mục", 5000);
                }
            } else {
                notificationAlert('error', "Vui lòng chọn 1 hành động", 5000);
            }
        });
    }

    function handleChangeStatus()
    {
        let dataStatus = {
            "btnChange"     : ".toggle_status .toggle_group",
            "baseURL"       : "manager/cate/changeStatusItem/{id}"
        };

        $(dataStatus['btnChange']).click(function() {
            let $cateprod_id = parseInt($(this).parents('tr').attr('data-id'));
            let $cateprod_is_status = $(this).parents('.toggle_status').hasClass('on') ? "off" : "on";
            $.ajax({
                url: dataStatus['baseURL'],
                method: "POST",
                data: {
                    cateprod_id : $cateprod_id,
                    cateprod_is_status : $cateprod_is_status
                },
                dataType: "json",
                beforeSend() {
                    console.log('updating status...');
                },
                success(data) {
                    if(data['status']) {
                        notificationAlert('success', 'Cập nhật trạng thái thành công', 5000);
                    } else {
                        notificationAlert('error', 'Cập nhật trạng thái thất bại', 5000);
                    }
                },
                error(xhr, AjaxOptions, thrownError) {
                    notificationAlert('error', 'Cập nhật trạng thái thất bại', 5000);
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        });
    }

    function handleDelete()
    {
        let dataDelete = {
            "btnDelete" : "#table_content table.table tr td.delete",
            "baseURL" : "?controller=Categories&action=deleteItem"
        };
        $(dataDelete['btnDelete']).click(function() {
            if(confirm("Bạn có thực sự muốn xóa danh mục này ?")) {
                let $cateprod_id = parseInt($(this).parents('tr').attr('data-id'));
                $.ajax({
                    url: dataDelete['baseURL'],
                    method: "POST",
                    data: { cateprod_id : $cateprod_id },
                    dataType: "json",
                    beforeSend() {
                        console.log('deleting');
                    },
                    success(data) {
                        console.log(data);
                        if(data['status']) {
                            notificationAlert('success', "Xóa sản phẩm thành công", 5000);
                            $("tr[data-id='"+ ($cateprod_id) +"']").stop().fadeOut(300);
                        } else {
                            notificationAlert('error', "Xóa sản phẩm không thành công", 5000);
                        }
                    },
                    error(xhr, AjaxOptions, thrownError) {
                        notificationAlert('error', "Xóa sản phẩm không thành công", 5000);
                        console.log(xhr.status);
                        console.log(thrownError);
                    }
                });
            }
        });
    }



    function notificationAlert(status = 'error', txtNotify = 'Bạn chưa tạo thông báo cho chức năng', timeDelay = 2000) {
        $(".alert").addClass('alert_'+(status)+'');
        $(".alert").addClass('open');
        $(".alert span").text(txtNotify);
        timeoutToggleAlert = setTimeout(function() {
            $(".alert").removeClass('open');
            $(".alert").removeClass('alert_error');
            $(".alert span").text('');
        }, timeDelay);
        let closeAlertEl = $(".alert .close");
        closeAlertEl.click(function() {
            $(".alert").removeClass('open');
            $(".alert span").text('');
        });
    }
});