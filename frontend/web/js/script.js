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
        var productName = $(this).data('product-name');

        $.ajax({
            url: url,
            type: "GET",
            success: function (data) {

                $("#ajax-modal-frontend-order-comments-content").html(data);
                $('#ajax-modal-frontend-order-comments .modal-title').text(productName);
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    new bootstrap.Modal(document.getElementById("ajax-modal-frontend-order-comments")).show();
                } else {
                    $("#ajax-modal-frontend-order-comments").modal("show");
                }
            },
            error: function () {
                alert("Error loading content.");
            }
        });
    });
});

// $(document).ready(function() {
//     $(document).on('click', '.comment-btn', function (e) {
//         e.preventDefault();
//         var url = $(this).attr("href");
//         var productName = $(this).data('product-name'); // Mahsulot nomini olish
//
//         $.ajax({
//             url: url,
//             type: "GET",
//             success: function (data) {
//                 // Modal kontentini yuklash
//                 $("#ajax-modal-frontend-order-comments-content").html(data);
//
//                 // Modalni ochish uchun Bootstrap 5 usuli
//                 if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
//                     var myModal = new bootstrap.Modal(document.getElementById("ajax-modal-frontend-order-comments"));
//                     console.log('else 0000');
//                     console.log(productName); // Mahsulot nomini console’da tekshirish
//                     console.log('else 0000');
//                     $('#ajax-modal-frontend-order-comments .modal-title').text(productName);
//
//                     // Modalni ochishdan oldin sarlavhani yangilash
//                     var modalTitle = document.querySelector('#ajax-modal-frontend-order-comments .modal-title');
//                     if (modalTitle) {
//                         console.log('else 1111');
//                         console.log(productName); // Mahsulot nomini console’da tekshirish
//                         console.log('else 1111');
//                         $('#ajax-modal-frontend-order-comments .modal-title').text(productName);
//
//                         modalTitle.css("background","red"); // Mahsulot nomini sarlavhaga qo'yish
//                     }
//                     console.log('else 2222');
//                     console.log(productName); // Mahsulot nomini console’da tekshirish
//                     console.log('else 2222');
//                     $('#ajax-modal-frontend-order-comments .modal-title').text(productName);
//
//                     // Modalni ochish
//                     myModal.show();
//                 } else {
//                     console.log('else 3333'); // Mahsulot nomini console’da tekshirish
//                     console.log(productName); // Mahsulot nomini console’da tekshirish
//                     console.log('else 3333'); // Mahsulot nomini console’da tekshirish
//                     $('#ajax-modal-frontend-order-comments .modal-title').text(productName);
//
//                     $("#ajax-modal-frontend-order-comments").modal("show");
//                 }
//             },
//             error: function () {
//                 alert("Error loading content.");
//             }
//         });
//     });
// });







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

