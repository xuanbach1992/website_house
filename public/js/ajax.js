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

    $(".read_comment").click(function () {
        let id_notification = $('.notification_id').val()
        $.ajax({
            url: "http://127.0.0.1:8000/houses/is-read/" + id_notification,
            method: "GET",
            success:function () {

            }
        })
    })
});
$(document).scroll(function () {
    var y = $(document).scrollTop(), //get page y value
        header = $(".informationHouseHost"); // your div id
    if (y >= 400) {
        header.css({position: "fixed", "top": "10%", "left": "55%"});
    } else {
        header.css("position", "static");
    }
});
