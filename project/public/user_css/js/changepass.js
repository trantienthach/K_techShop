$(document).ready(function () {
  $("#btn_change_pass").click(function (e) {
    e.preventDefault();
    let old_pass = $("#old_pass").val();
    let new_pass = $("#new_pass").val();
    let new_repass = $("#new_repass").val();
    let id = $("#user_id").val();
    let data = {
      old_pass: old_pass,
      new_pass: new_pass,
      new_repass: new_repass,
      id: id,
    };
    $.ajax({
      type: "post",
      url: "?page=changepass",
      data: data,
      dataType: "json",
      success: function (data) {
        console.log(data);
        if (data.is_change == 1) {
          alert("Đổi mật khẩu thành công !!!");
          location.reload();
        } else {
          if (data.errors["old_pass"] != false) {
            $("#e_old_pass").text(data.errors["old_pass"]);
            $("#old_pass").css("border", "1px solid red");
          } else {
            $("#e_old_pass").text("");
            $("#old_pass").css("border", "1px solid #c3c3c3");
          }
          if (data.errors["repass"] != false) {
            $("#e_repass").text(data.errors["repass"]);
            $("#new_repass").css("border", "1px solid red");
          } else {
            $("#e_repass").text("");
            $("#new_repass").css("border", "1px solid #c3c3c3");
          }
          if (data.errors["empty"] != false) {
            $("#e_empty").text(data.errors["empty"]);
          } else {
            $("#e_empty").text("");
          }
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      },
    });
  });
});
