$(document).ready(function () {

    // $('body').on("click", "#change_password", function () {
    //         let email = $('#email_login').val();
    //         let password = $('#pass_login').val();
    //         let password_confirmation = $('#password_confirmation').val();
    //         $.ajax({
    //             url: 'http://127.0.0.1:8000/users/change_pass',
    //             type: 'POST',
    //             dataType: 'JSON',
    //             data: {
    //                 current_password: current_password,
    //                 password: passwordNew,
    //                 password_confirmation: password_confirmation
    //             },
    //             success: function (result) {
    //                 $('.text-message').append(result['success'])
    //             },
    //             errors: function (message) {
    //                 // $('.text_message').innerText(message)
    //             }
    //         })
    // });
    $('#product').on("click", function () {
        $('div'+'#demo')[0].scrollIntoView();
    });
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
