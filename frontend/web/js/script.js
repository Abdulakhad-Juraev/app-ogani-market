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
            alert("Avval tizimga kirish kerak");
        }

    });
});

// $(function () {
//     $(".user-profile-update-btn").click(function (e) {
//         e.preventDefault();
//         $(".user-profile-username").css('border', '10px solid red');
//         alert('clicked');
//     });
// });
