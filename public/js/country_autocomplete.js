$(document).ready(function () {
    $.get('/countries', function (data) {
        $('#country').autocomplete({source: JSON.parse(data)});
    })
});