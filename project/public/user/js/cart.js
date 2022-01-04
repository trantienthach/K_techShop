

$(function() {
    $('.add_to_cart').on('click',addToCart);
    $('.cart_update').on('click',cartUpdate);
    $('.cart_delete').on('click',cartDelete);
});

function addToCart () {
    event.preventDefault();
    let url = $(this).data('url');
    $.ajax({
        type : "GET",
        dataType : 'json',
        url : url,
        success : function(data) {
            if(data.code === 200) {
                alert('Thêm sản phẩm thành công');
            }
        },
        error : function() {

        }
    });
}

function cartUpdate () {
    // event.preventDefault();
    let urlUpdateCart = $('.update_cart_url').data('url');
    let id = $(this).data('id');
    let quantity = $(this).parents('tr').find('input.quantity').val();
    $.ajax({
        type : "GET",
        url : urlUpdateCart,
        data : {id : id, quantity : quantity},
        success : function(data) {
            if(data.code === 200) {
                $('.your_cart').html(data.viewcart);
                alert("Cập nhật thành công");

            }
        },
        error : function() {

        }
    });
}

function cartDelete() {
    // event.preventDefault();
    let urlDeleteCart = $('.cus_cart').data('url');
    let id = $(this).data('id');
    $.ajax({
        type : "GET",
        url : urlDeleteCart,
        data : {id : id},
        success : function(data) {
            if(data.code === 200) {

                $('.your_cart').html(data.viewcart);
                alert("Xoá thành công");

            }
        },
        error : function() {

        }
    });
}

function check_out() {
    let urlCheckOut = $('.check_out');
}