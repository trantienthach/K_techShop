$(document).ready(function () {
  //  Add Product
  $(".thuonghieu").hide();
  $("input[type=radio][name=p_types]").change(function () {
    let id = 0;
    if (this.value == 1) {
      id = 1;
      $("#thuonghieu").html("");
    } else if (this.value == 2) {
      id = 2;
      $("#thuonghieu").html("");
    }

    let data = {
      id: id,
    };
    $.ajax({
      type: "post",
      url: "?page=process",
      data: data,
      dataType: "json",
      success: function (data) {
        console.log(data.type);
        data.type.forEach((e) => {
          $("#thuonghieu").append(
            "<option value='" + e.id + "'>" + e.name + "</option>"
          );
          $(".thuonghieu").fadeIn();
        });
      },
    });
  });

  // Delete Product
  $(".btn_delete").click(function (e) {
    e.preventDefault();
    let auth = confirm("Bạn có thật sự muốn xóa ?");
    if (auth) {
      let id = $(this).data("prod-id");
      let id2 = $(this).data("type-id");
      console.log(id2);
      let data = {
        id: id,
        id2: id2,
      };
      let product_ctn = $(this).parents(".ad_product_ctn");
      $.ajax({
        type: "post",
        url: "?page=delete",
        data: data,
        dataType: "text",
        success: function (data) {
          console.log(data);
          product_ctn.fadeOut();
        },
      });
    } else return false;
  });
});


// upload thumb

$(document).ready(function () {
  
});