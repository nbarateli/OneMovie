var ms1;
$(document).ready(function () {
    $.get('/countries', function (data) {
        $('#country').autocomplete({source: JSON.parse(data)});
    });
    $.get('/genres', function (data) {
        data = JSON.parse(data);
        console.log(data);

        ms1 = $('#genres').tagSuggest({

            allowFreeEntries: false,
            data: data,
            sortOrder: 'name',
            maxDropHeight: 200,
            name: 'ms1'
        });
    })
});

$(document).ready(function () {
    var data = [];
    var fruits = 'Apple,Orange,Banana,Strawberry'.split(',');
    for (var i = 0; i < fruits.length; i++) data.push({id: i, name: fruits[i]});

});