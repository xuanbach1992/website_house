$(document).ready(function () {
    let house_id = $('#house_id').val();
    dateRange = [];
    $.ajax({
        url: "http://127.0.0.1:8000/houses/find-date/" + house_id,
        method: "GET",
        async: false,
        dataType: "json",
        success: function (result) {
            $.each(result, function (index, date) {
                checkin=date.checkin.slice(0,10);
                checkout= date.checkout.slice(0,10);
                for (let d = new Date(checkin); d <= new Date(checkout); d.setDate(d.getDate() + 1)) {
                    dateRange.push($.datepicker.formatDate('yy-mm-dd', d));
                }
            });

        },
    });
    $(".datepickerInput").datepicker({
        minDate: '+1D',
        dateFormat: 'MM-dd-yy',
        beforeShowDay: function (date) {
            let string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [dateRange.indexOf(string) === -1]
        }
    });
});
