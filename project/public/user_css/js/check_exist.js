$(document).ready(function () {
  $(".ten_loai").blur(function (e) {
    let name = $(this).val();
    let data = {
      p_name: name,
    };
    $.ajax({
      type: "post",
      url: "?page=check",
      data: data,
      dataType: "json",
      success: function (data) {
        let btn_add = $("#btn_add");
        if (data.check) {
          btn_add.attr(
            "onclick",
            "if(!confirm('Tên sản phẩm này đã tồn tại , bạn vẫn muốn thêm mới chứ ?')) return false;"
          );
        } else {
          btn_add.removeAttr("onclick");
        }
      },
    });
  });

  $("input").blur(function (e) {
    e.preventDefault();
    let value = $(this).val();
    if (value == "") {
      $(this).next("i").text("Vui lòng không bỏ trống trường này");
      $(this).addClass("red");
    } else {
      $(this).next("i").text("");
      $(this).removeClass("red");
    }
  });
});
