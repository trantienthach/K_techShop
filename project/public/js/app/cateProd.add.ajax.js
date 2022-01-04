$(function () {
    __construct();

    function __construct() {
        uploadCateProdBannerPC();
    }
    function uploadCateProdBannerPC() {
        let CateProdBannerPCData = {
            "btnFile"        : "#cateprod_banner_pc_fake",
            "inputFile"      : "#cateprod_banner_pc",
            "extendAllow"    : ['jpg', 'jpeg', 'svg', 'gif', 'png'],
            "FileSize"       : 5242880,
            "spaceAppendImg" : "#cateprod_banner_pc_append",
            "imgDefault"     : "./public/images/logo/no_image-50x50.png",
            "baseURL_ajax"   : '?controller=Categories&action=uploadCateProdBannerPC'
        }
        $(CateProdBannerPCData['btnFile']).change(function () {
            handleInputfileCateProdBannerPC(this);
        });

        function handleInputfileCateProdBannerPC(fileEL) {
            if (fileEL.files[0]) {
                let fileOjb = fileEL.files[0];
                if (checkExtendFileImg(fileOjb['name'])) {
                    if (checkFileSize(fileOjb['size'])) {
                        let fileReader = new FileReader();
                        let formData = new FormData();
                        formData.append('cateprod_banner_pc', fileEL.files[0]);
                        fileReader.onload = function(e){
                            let srcImg = fileEL.files[0].name;
                            $(CateProdBannerPCData['spaceAppendImg']).attr('src',e.currentTarget.result);
                            $(CateProdBannerPCData['spaceAppendInput']).val(e.currentTarget.result);
                            $(CateProdBannerPCData['fileInput']).attr('value',srcImg);
                            appendImgURLInputHidden(formData);
                        }
                        fileReader.readAsDataURL(fileEL.files[0]);
                    }
                    else {
                        notificationAlert('error', 'Dung lượng file không vượt quá 5MB ', 5000);
                        resetFileImg();
                    }
                }
                else {
                    // Tên đuôi file không hợp lệ
                    notificationAlert('error', 'Tên file không hợp lệ, chỉ chấp nhận '  + CateProdBannerPCData['extendAllow'].join(", ") +  '', 5000);
                    resetFileImg();
                }
            }
            else {
                //người dùng chưa chọn ảnh
            }
        }
        //----------- CHECK ĐUÔI FILE ---------------//
        function checkExtendFileImg(fileName) {
            let extendFile = fileName.split('.').pop().toLowerCase();
            if ($.inArray(extendFile, CateProdBannerPCData['extendAllow']) == -1) {
                return false;
            } return true;
        }

        //----------------- CHECK SIZE FILE --------------//
        function checkFileSize(fSize) {
            if (fSize > CateProdBannerPCData['FileSize']){
                return false;
            } return true;
        }


        //---------- RESET FILE --------- //

        function resetFileImg() {
            $(CateProdBannerPCData['btnFile']).val('');
            $(CateProdBannerPCData['spaceAppendImg']).attr('src', CateProdBannerPCData['imgDefault']);
        }
        // ---------------------------------- //

        // -------- FUNCTION NOTIFI --------- //
        // ---------------------------------- //
        function notificationAlert(status = 'error', txtNotifi = 'Bạn chưa tạo thông báo cho chức năng', timeDelay = 2000) {
            $(".alert").addClass('alert_' + (status) + '');
            $(".alert").addClass('open');
            $(".alert span").text(txtNotifi);
            timeoutToggleAlert = setTimeout(function () {
                $(".alert").removeClass('open');
                $(".alert").removeClass('alert_error');
                $(".alert span").text('');
            }, timeDelay);
            let closeAlertEl = $(".alert .close");
            closeAlertEl.click(function () {
                $(".alert").removeClass('open');
                $(".alert span").text('');
            });
        }

        function appendImgURLInputHidden (formdata) {
            $.ajax({
                url         : CateProdBannerPCData['baseURL_ajax'],
                method      : "POST",
                data        : formdata,
                contentType : false,
                processData : false,
                dataType    : "json",
                success     : function(data) {
                    if(data['status'] === 'success') {
                        $("._cateProd_banner_pc_upload_logo_error_").text('Hình đã được lưu');
                        $("#cateprod_banner_pc").val(data['targetFile']);
                    } else {
                        $("._cateProd_banner_pc_upload_logo_error_").text('Lưu hình ảnh không thành công')
                    }
                },
                error       : function(xhr,ajaxOptions,thrownError ) {
                    console.log (xhr.status);
                    console.log (thrownError);
                }
            });
        }

    }
});