$(document).ready(function () {
    var form = $('#store_movie');
    form.submit(function (event) {
        // return;
        console.log(event);
        event.preventDefault();
        var data = new FormData(form[0]);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: form.attr('action'),
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {

                console.log(data);

            },
            error: function (e) {

                console.log(e)
            }
        });


    })
});