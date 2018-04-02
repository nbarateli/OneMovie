const FORM = "" +
    "<div hidden class=\"media\">\n" +
    "   <h5>{{$comment->author->name}}</h5>\n" +
    "       <div class=\"media-left\">\n" +
    "           <a href=\"#\">\n" +
    "               <img src=\"{{asset($comment->author->get_profile_picture())}}\" title=\"One movies\" alt=\" \"/>\n" +
    "           </a>\n" +
    "       </div>\n" +
    "   <div class=\"media-body\">\n" +
    "       <p>{{$comment->content}}</p>\n" +
    "       <span>View all posts by :<a href=\"#\"> Admin </a></span>\n" +
    "   </div>\n" +
    "</div>";

function fillForm(comment) {
    return FORM.replace('{{$comment->author->name}}', comment['author'])
        .replace('{{$comment->content}}', comment['content'])
        .replace('{{asset($comment->author->get_profile_picture())}}', '/' + comment['profile_picture']);
}

function submitComment(event) {
    event.preventDefault();
    var form = $('#comment-form');

    $.post(form.attr('action'), form.serialize(), function (data) {

        var newComment = $('#comment-grids').prepend(fillForm(data['comment']));
        $(newComment.children()).fadeIn('slow');
        $('#content').val('');
    });
}

$(document).ready(function () {
    var form = $('#comment-form');
    form.submit(submitComment);
});