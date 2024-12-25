$(function () {
    $("#order_item-count").keyup(function () {
        $("#order_item-total-price").val($(this).val() * $("#order_item-price").val());
    });
});

$(function () {
    $("#order_item-product-dropdown").change(function () {
        var productId = $(this).val();  // Get the selected product ID
        $.ajax({
            url: '/admin/product/price',  // The URL for the backend action
            type: 'GET',
            data: {product_id: productId},  // Send product_id as data
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')  // CSRF token for Yii2 security
            },
            success: function (response) {
                if (response.success) {
                    $('#order_item-price').val(response.message);  // Assuming you have a #price element in your HTML
                } else {
                    alert(response.message || 'error');
                }
            },
            error: function () {
                alert('AJAX request error occurred.');
            }
        });
    });
});

$(function () {
    $("#createStore").click(function (e) {
        e.preventDefault();
        $("#store_modal-content").load($(this).attr("href"));
        $("#ModalStore").modal("show");
    });

    $("#viewStore").click(function (e) {
        e.preventDefault();
        $("#store_modal-content").load($(this).attr("href"));
        $("#ModalStore").modal("show");
    });

    $("#updateStore").click(function (ev) {
        ev.preventDefault();
        $("#store_modal-content").load($(this).attr("href"));
        $("#ModalStore").modal("show");
    });


    $("#createBanner").click(function (e) {
        // alert(222)
        e.preventDefault();
        $("#banner_modal-content").load($(this).attr("href"));
        $("#ModalBanner").modal("show");
    });

});


