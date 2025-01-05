$(function () {
    $(".user-profile-update-btn").click(function (e) {
        e.preventDefault();
        $("#user-profile-email").prop('disabled', false);
        $("#user-profile-firstname").prop('disabled', false);
        $("#user-profile-lastname").prop('disabled', false);
        $("#user-profile-phone").prop('disabled', false);
        $("#user-profile-address").prop('disabled', false);
        $(this).css('display', 'none');
        $(".user-profile-save-btn").removeClass('d-none');
    });


    $(".add-like-btn-hover").click(function (e) {
        e.preventDefault();
        let element = $(this);
        let productId = element.data("id");
        let userId = element.data("user-id");

        if (userId !== null) {
            if (productId !== null) {
                $.ajax({
                    url: "/site/change",
                    type: "POST",
                    data: {
                        productId: productId,
                        userId: userId
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            element.find('.add-like-btn').css('color', response.is_liked ? 'red' : '#1c1c1c');
                        } else {
                            alert('Xatolik yuz berdi!');
                        }
                    },
                    error: function () {
                        alert('AJAX so‘rovda xatolik yuz berdi.');
                    }
                });
            } else {
                alert("Mavjud bo'lmagan mahsulot");
            }
        } else {
            alert("Avval tizimga kirish kerak");
        }

    });


});
$(document).ready(function() {
    $(document).on('click', '.comment-btn', function (e) {
        e.preventDefault();
        var url = $(this).attr("href");

        // AJAX yordamida kontentni yuklash
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                $('#ajax-modal-content-frontend-new').html(data);

                // Modalni ochish uchun Bootstrap 5 usuli
                var modalElement = document.getElementById('ajax-modal-frontend-new');
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    var myModal = new bootstrap.Modal(modalElement).show();
                    // myModal.show();
                } else {
                    $('#ajax-modal-frontend-new').modal('show');
                }
            },
            error: function () {
                alert('Error loading content.');
            }
        });
    });

});





// $('#comment-form').on('submit', function (e) {
//     e.preventDefault();
//     var formData = $(this).serialize();
//
//     $.ajax({
//         url: '/comment/create', // Komment qo'shish uchun controller URL
//         type: 'POST',
//         data: formData,
//         success: function (response) {
//             if (response.success) {
//                 alert('Comment saved successfully');
//                 $('#comment-modal').modal('hide');
//             } else {
//                 alert('Error saving comment');
//             }
//         },
//         error: function () {
//             alert('An error occurred.');
//         }
//     });
// });

