$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.status_house').change(function () {
        let house_id = $(this).data('id');
        let new_status = $(this).val();
        $.ajax({
            url: "http://127.0.0.1:8000/admin/editStatus/" + house_id,
            method: "POST",
            dataType: 'json',
            data: {
                id_house: house_id,
                status: new_status,
            }
        });
    });

});

