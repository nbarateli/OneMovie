function processEvent(event, fn) {
    let elem = $(event.currentTarget);
    let id = elem.attr('data-index');
    let siblings = $(elem[0].parentElement.parentElement.parentElement).find('a');
    siblings.each(function (index) {
        fn(siblings, index, id);
    })
}

function starOver(event) {
    processEvent(event, function (siblings, index, id) {

        let sibling = siblings[index].children[0];
        $(sibling).removeClass('fa-star-o');
        $(sibling).removeClass('fa-star-half-o');
        $(sibling).removeClass('star-blue');
        $(sibling).addClass(index < id ? 'fa-star' : 'fa-star-o');
    });
}


function starOut(event) {
    processEvent(event, function (siblings, index, id) {
        let sibling = $(siblings[index].children[0]);
        sibling.removeClass('fa-star');
        sibling.removeClass('fa-star-o');
        sibling.removeClass('star-blue');
        sibling.removeClass('fa-star-half-o');
        switch (sibling.attr('data-fill')) {
            case 'full':
                sibling.addClass('fa-star');
                break;
            case 'half':
                sibling.addClass('fa-star-half-o');
                break;
            case 'none':
                sibling.addClass('fa-star-o');
                break;
            default:
                sibling.addClass('fa-star star-blue');
                break;
        }

    })
}

function rate(event) {
    event.preventDefault();
    $.post(event.target.parentElement.getAttribute('href'), {rating: event.target.getAttribute('data-index')},
        function (data) {
            processEvent(event, function (siblings, index, id) {
                let sibling = $(siblings[index].children[0]);
                sibling.removeClass('fa-star-o');
                sibling.removeClass('fa-star-half-o');
                sibling.removeClass('fa-star');
                sibling.removeClass('star-blue');
                sibling.addClass(index < id ? 'fa-star star-blue' : 'fa-star-o');
                sibling.attr('data-fill', index < id ? 'blue' : 'none')
            })
        });

}

$(document).ready(function () {
    let full = $('.fa-star'), half = $('.fa-star-half-o'), unfilled = $('.fa-star-o');
    full.hover(starOver, starOut);
    half.hover(starOver, starOut);
    unfilled.hover(starOver, starOut);
    full.click(rate);
    half.click(rate);
    unfilled.click(rate);

});