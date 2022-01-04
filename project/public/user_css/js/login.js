$(function () {
  $("#login__btn").click(function (e) {
    e.preventDefault();
    let username = $("#login_username").val();
    let password = $("#login_password").val();
    let is_checked = $("input[type='checkbox']:checked");
    var remember_me = 0;
    if (is_checked.val() == 1) {
      var remember_me = is_checked.val();
    }
    console.log(remember_me);
    let data = {
      username: username,
      password: password,
      remember_me: remember_me,
    };
    $.ajax({
      type: "post",
      url: "?page=login",
      data: data,
      dataType: "json",
      success: function (data) {
        if (data.is_login) {
          location.reload();
        } else {
          $(".errors").text(data.error);
        }
      },
    });
  });

  $("input").blur(function (e) {
    e.preventDefault();
    let input = $(this);
    let input_val = $(this).val();
    if (input_val == "") {
      input.next().text("*Không bỏ trống trường này");
      input.css("border", "1px solid red");
    } else {
      input.next().text("");
      input.css("border", "1px solid #c3c3c3");
    }
  });
});
