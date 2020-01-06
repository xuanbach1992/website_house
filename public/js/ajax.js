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
    });
    $('.bookDetail').click(function () {
        let checkin = $('.checkin').val();
        let checkout = $('.checkout').val();
        if (checkin.length !== 0 && checkout.length !== 0) {


            let checkinTimestamp=new Date(checkin).getTime()/1000;
            let checkoutTimestamp=new Date(checkout).getTime()/1000;
            let dayDifference=(checkoutTimestamp -checkinTimestamp)/86400+1;
            $('.bookDetail').hide();
            let checkinConvert = checkin.split("/");
            let checkoutConvert = checkout.split("/");
            let price = $('.priceInput').val();
            let totalPrice=parseInt(price) * dayDifference;
            let totalPriceFormat=Math.max(0, totalPrice).toFixed(0).replace(/(?=(?:\d{3})+$)(?!^)/g, ',')
            let informationBook = `
                <label>Nhận phòng : Ngày ${checkinConvert[1]} tháng ${checkinConvert[0]} năm ${checkinConvert[2]} </label><br>
                <label>Hẹn trả phòng : Ngày ${checkoutConvert[1]} tháng ${checkoutConvert[0]} năm ${checkoutConvert[2]} </label><br>
                <label class='text-danger'>Tiền phải trả : ${totalPriceFormat} VND</label><br>
                <div class="col-md-12 mt-3">
                    <button type="submit" style="font-size:25px" class="btn btn-primary btn-sm">Đặt phòng
                </button>
                </div>`;
            $('#after_booking_button').html(informationBook);
        } else {
            alert("vui lòng chọn ngày nhận, ngày trả phòng")
        }
    });
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
