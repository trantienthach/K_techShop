$(document).ready(function () {
  $("#cmt_push").click(function (e) {
    e.preventDefault();
    let prod_id = $("#id_prod").val();
    let user_id = $("#id_user").val();
    let content = $("#cmt_content").val();
    if (content == "") {
      alert("Vui lòng nhập bình luận");
    } else {
      let data = {
        prod_id: prod_id,
        user_id: user_id,
        content: content,
      };
      $.ajax({
        type: "post",
        url: "?page=comment",
        data: data,
        dataType: "json",
        success: function (data) {
          if (data.r) {
            location.reload();
          }
        },
      });
    }
  });

  $(".delete_icon").click(function (e) {
    let auth = confirm("Bạn có thật sự muốn xóa bình luận này ?");
    if (auth) {
      let parent = $(this).parents(".prod_comment");
      let id_cmt = $(this).data("cmt");
      let prod_id = $("#id_prod").val();
      let data = {
        id_cmt: id_cmt,
        prod_id: prod_id,
      };
      console.log(data);
      $.ajax({
        type: "post",
        url: "?page=delete_cmt",
        data: data,
        dataType: "json",
        success: function (data) {
          console.log(data);
          if (data.kq) {
            parent.fadeOut(500);
            $(".comment_title").text(`Bình luận (${data.count}) `);
          }
        },
      });
    } else {
      return false;
    }
    e.preventDefault();
  });
  $("textarea").emojioneArea({
    shortnames: true,
    saveEmojisAs: "shotname",
  });
});
