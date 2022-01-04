let more = document.querySelectorAll(".more");
$(document).ready(function () {
  $(".aside__child_type").hide();
  $(".more").click(function (e) {
    e.preventDefault();
    console.log($(this).parents(".aside__links").next());
    $(this).parents(".aside__links").next().slideToggle();
    $(this).toggleClass("active");
  });

  // $(".login_modal").hide();
  $("#login").click(function (e) {
    e.preventDefault();
    $(".login_modal").fadeIn();
    $(".login_modal").css("display", "flex");
  });
  $(".login__close").click(function (e) {
    e.preventDefault();
    $(".login_modal").fadeOut();
  });
  $(window).on("click", function (e) {
    if ($(e.target).is(".login_modal,.draw_modal")) {
      $(".login_modal,.register_modal").fadeOut(500);
    }
  });

  let info = $(".user_info_ctn");
  let change_pass = $(".user_change_password");
  change_pass.hide();
  $("#user_change_pass").click(function (e) {
    e.preventDefault();
    info.hide();
    change_pass.fadeIn();
  });
  $("#user_info_link").click(function (e) {
    e.preventDefault();
    info.fadeIn();
    change_pass.hide();
  });

  $("#all_types").hide();
  $(".link_cate").click(function (e) {
    let prod = $("#all_product");
    let types = $("#all_types");
    e.preventDefault;

    // console.log(cate);
    if ($(this).data("cate") == "all_product") {
      prod.fadeIn(300);
      types.hide();
    } else {
      prod.hide();
      types.fadeIn(300);
    }
  });
});
