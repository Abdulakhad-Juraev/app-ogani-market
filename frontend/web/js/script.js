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
});

// $(function () {
//     $(".user-profile-update-btn").click(function (e) {
//         e.preventDefault();
//         $(".user-profile-username").css('border', '10px solid red');
//         alert('clicked');
//     });
// });
