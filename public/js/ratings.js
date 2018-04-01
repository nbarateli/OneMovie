$(document).ready(function () {
    console.log('loaded')
    $('.f a-star-o').hover(function () {//in
        $(this).removeClass('fa-star-o')
        $(this).addClass('fa-star')
    }, function () {//out
        $(this).addClass('fa-star-o');
        $(this).removeClass('fa-star')

    })
});