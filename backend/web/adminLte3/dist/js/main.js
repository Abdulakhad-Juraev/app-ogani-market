$(function () {
    $("#order_item-count").keyup(function () {
        $("#order_item-total-price").val($(this).val() * $("#order_item-price").val());
    });
});

$(function () {
    $("#order_item-product-dropdown").change(function () {
        var productId = $(this).val();
        $.ajax({
            url: "/admin/product-manager/product/price",
            type: "GET",
            data: {product_id: productId},
            headers: {
                "X-CSRF-Token": $("meta[name='csrf-token']").attr("content")
            }, success: function (response) {
                if (response.success) {
                    $("#order_item-price").val(response.message);
                } else {
                    alert(response.message || "error");
                }
            }, error: function () {
                alert("AJAX request error occurred.");
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

/*$(function () {
    $(".ajax-btn-create").click(function (e) {
        e.preventDefault();
        $("#block").load($(this).attr("href"));
        $("#ajax-modal-create").modal("show");
        // Set the modal title dynamically for create action
        $("#ajax-modal-create .modal-title").text("Create Social");
    });

    $(".ajax-btn-view").click(function (e) {
        e.preventDefault();
        $("#block").load($(this).attr("href"));
        $("#ajax-modal-create").modal("show");
        // Set the modal title dynamically for view action
        $("#ajax-modal-create .modal-title").text("View Social");
    });

    $(".ajax-btn-update").click(function (e) {
        e.preventDefault();
        $("#block").load($(this).attr("href"));
        $("#ajax-modal-create").modal("show");
        // Set the modal title dynamically for update action
        $("#ajax-modal-create .modal-title").text("Update Social");
    });
});*/


$(function () {
    $(".ajax-btn-create, .ajax-btn-view, .ajax-btn-update").click(function (e) {
        e.preventDefault();

        var actionType = "";
        if ($(this).hasClass("ajax-btn-create")) {
            actionType = "Create";
        } else if ($(this).hasClass("ajax-btn-view")) {
            actionType = "View";
        } else if ($(this).hasClass("ajax-btn-update")) {
            actionType = "Update";
        }
        $("#ajax-modal-content").load($(this).attr("href"));

        $("#ajax-modal .modal-title").text(actionType);

        $("#ajax-modal").modal("show");
    });
});






