var more = document.querySelectorAll(".more");
$(document).ready(function () {
  $(".aside__child_type").hide();
  $(".more").click(function (e) {
    e.preventDefault();
    console.log($(this).parents(".aside__links").next());
    $(this).parents(".aside__links").next().slideToggle();
    $(this).toggleClass("active");
  });


});
