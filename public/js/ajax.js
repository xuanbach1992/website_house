$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on("click", "#change_password", function () {
        if (confirm("Are you sure?")) {
            let current_password = $('#current_password').val();
            let passwordNew = $('#passwordNew').val();
            let password_confirmation = $('#password_confirmation').val();
            $.ajax({
                url: 'http://127.0.0.1:8000/users/change_pass',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    current_password: current_password,
                    password: passwordNew,
                    password_confirmation: password_confirmation
                },
                success: function (result) {
                    $('.text-message').append(result['success'])
                },
                errors: function (message) {
                    // $('.text_message').innerText(message)
                }
            })
        }
    });
});
