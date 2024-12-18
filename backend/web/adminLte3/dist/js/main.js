$(function () {
    $("#createStore").click(function (e) {
        e.preventDefault();
        $("#store_modal-content").load($(this).attr('href'));
        $("#ModalStore").modal('show');
    })

    $("#viewStore").click(function (e) {
        e.preventDefault();
        $("#store_modal-content").load($(this).attr('href'));
        $("#ModalStore").modal('show');
    })

    $("#updateStore").click(function (ev) {
        ev.preventDefault();
        $("#store_modal-content").load($(this).attr('href'));
        $("#ModalStore").modal('show');
    })


    $("#createBanner").click(function (e) {
        // alert(222)
        e.preventDefault();
        $("#banner_modal-content").load($(this).attr('href'));
        $("#ModalBanner").modal('show');
    })

})