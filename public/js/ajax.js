$(document).ready(function () {
    ;
    $('#product').on("click", function () {
        $('div' + '#demo')[0].scrollIntoView();
    });
    $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });

    $("#login-button").click(function () {
        let Femail = $("input[name='email']").val();
        let Fpassword = $("input[name='password']").val();

        console.log(Femail);
        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     url: 'http://127.0.0.1:8000/login',
        //     type: 'POST',
        //     data: {
        //         email: Femail,
        //         password: Fpassword
        //     },
        //     dataType: 'JSON',
        //     success: function (data) {
        //         window.location.reload();
        //         // $(this).attr("data-dismiss", "modal");
        //         // let err = JSON.parse(data.responseText);
        //     },
        //     errors: function (error) {
        //         alert('dsadasd')
        //     }
        // });
    })
});
$(document).scroll(function() {
    var y = $(document).scrollTop(), //get page y value
        header = $(".informationHouseHost"); // your div id
    if(y >= 400)  {
        header.css({position: "fixed", "top" : "10%", "left" : "55%"});
    } else {
        header.css("position", "static");
    }
});
