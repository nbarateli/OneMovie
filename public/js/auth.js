$("#login-form").submit(function (event) {
    event.preventDefault();
    $("#ajax_error").hide();
    $.post($("#login-form").attr('action'), $('#login-form').serialize(), function (data) {
        if (data['success']) {
            location.reload();
        } else {
            $("#ajax_error").show();
            $("#ajax_error").text('Bad Credentials');
            $("#ajax_error").addClass('alert');
            $("#ajax_error").addClass('alert-danger');
        }
    })
});
