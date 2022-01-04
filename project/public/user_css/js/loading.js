// $(document).ready(function () {
//   $("#loading")
//     .hide() // Hide it initially
//     .ajaxStart(function () {
//       $(this).fadeIn(5000);
//     })
//     .ajaxStop(function () {
//       $(this).fadeOut(5000);
//     });
// });

$(document).ready(function () {
  setTimeout(function () {
    $("#loading").addClass("loaded");
  }, 700);
});
