$(document).on('click', '.addToCart', function (event) {
    event.preventDefault();
    var url = $(this).attr('href');

    $.ajax({
        url: url, type: "GET", // data: id,
        success: function (data) {
            $('.myCart').html(data.totalProductCount);

        }, error: function (data) {
        }
    })

});

$(document).on('click', '.myIncBtn', function (event) {
    event.preventDefault();
    var url = $(this).attr('data-url');

    $.ajax({
        url: url, type: "GET", // data: id,
        success: function (data) {
            $('.myCart').html(data.totalProductCount);
            $('.shoping__cart__table').html(data.shopingCartTable);

        }, error: function (data) {
        }
    })

});


$(document).on('click', '.myDecBtn', function (event) {
    event.preventDefault();
    var url = $(this).attr('data-url');

    $.ajax({
        url: url, type: "GET", // data: id,
        success: function (data) {
            $('.myCart').html(data.totalProductCount);
            $('.shoping__cart__table').html(data.shopingCartTable);

        }, error: function (data) {
        }
    })

});



$(document).on('click', '.myRemoveBtn', function (event) {
    event.preventDefault();
    var url = $(this).attr('data-url');

    $.ajax({
        url: url, type: "GET", // data: id,
        success: function (data) {
            $('.myCart').html(data.totalProductCount);
            $('.shoping__cart__table').html(data.shopingCartTable);

        }, error: function (data) {
        }
    })

});