function showPassword() {
    for (i = 0; i <= 1; i++) {
        let x = document.getElementsByClassName("password_show")[i];
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
}

//lấy dữ liệu quận theo id của thành phố
function onChange(id) {
    $.ajax({
        method: "GET",
        url: '/getDataByCitiesId',
        data: {
            id: id,
        }
    }).done(function (res) {
        if (res.erros) {
            alert(res.message);
        }
        $('#district_id').empty();
        $.each(res.data, function (i, item) {
            $('#district_id').append($('<option>', {
                value: item.id,
                text: item.name
            }));
        });
    });
}

