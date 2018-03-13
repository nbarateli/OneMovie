$(document).ready(function () {
    var form = $('#store_movie');
    form.submit(function (event) {
        console.log(event);
        event.preventDefault();
        var data = new FormData(form[0]);
        // form.serializeArray().forEach(function (field) {
        //     data.append(field['name'], field['value']);
        // });
        // var poster = $('#poster');
        // data.append('poster', poster[0].files[0], poster[0].files[0]['name']);

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

        // $.ajax({
        //     type: 'POST',
        //     url: form.attr('action'),
        //     data: data,
        //     success: function (data) {
        //         console.log(data);
        //     },
        //     enctype: 'multipart/form-data'
        // });
    })
});