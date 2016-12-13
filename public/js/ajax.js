$(document).ready(function(){
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    var postId = 0;
    var commentId = 0;
    var commentId = 0;
    var commentBody = null;
    var commentName = null;
    var commentTime = null;
    var commentLoop = null;
    var replyLoop = null;


    $("#comment-save").on('click', function(event) {
        event.preventDefault();
        postId = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
        /*commentName = event.target.parentNode.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[1].childNodes[1].lastElementChild.firstElementChild;
        commentBody = event.target.parentNode.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[1].childNodes[1].lastElementChild.firstElementChild.nextElementSibling;
        commentTime = event.target.parentNode.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[1].childNodes[1].lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.firstElementChild;*/
        commentLoop = event.target.parentNode.parentNode.parentNode.parentNode.childNodes[1];
        /*commentLoop = getElementById('loop');*/
        var name = $('input[name=name]').val();
        var email = $('input[name=email]').val();
        comment = $('input[name=comment-box]').val();
        var data = $(event.target).closest("form").serializeArray();

        $.ajax({
            method:'POST',
            url: url,
            data: data,
            success: function(data){
                /*console.log(commentLoop.innerHTML);*/
                $(commentLoop).append(data);
            },
            error: function(data){
                console.log('Error:', data);
            }
        });
        event.preventDefault();
            /*.done(function(data) {
                $('#commentsLoop').append(data);
                console.log($('#commentsLoop').append(data));

                $(commentName).text(msg['comment_name']); 
                $(commentBody).text(msg['comment_body']);
                $(commentTime).text(msg['comment_date']);
            });*/
    });

        $('.reply-save').on('click', function(event){
        event.preventDefault();

       /* commentId = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.dataset['commentid'];*/
       /* replyLoop = document.getElementById('loopReply');*/
        /*replyLoop = event.target.parentNode.parentNode.parentNode.parentNode.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling;*/
        /*{name:name, email:email, reply: $('#reply-box').val(), commentId: commentId, _token: token}*/
        replyLoop = event.target.parentNode.parentNode.parentNode.parentNode.lastElementChild;
        /*var name = $('input[name=owner]').val();
        var email = $('input[name=address]').val();
        var commentId = $('input[name=commentId]').val();
        var token = $('input[name=token]').val();*/

        var form_data = $(event.target).closest("form").serializeArray();

        $.ajax({
            method:'POST',
            url: urlReply,
            data:form_data,
            success: function(data){
                /*console.log($(replyLoop).innerHTML = 'working');*/
                $(replyLoop).append(data);
            },
            error: function(data){
                console.log('Error:', data);
            }
        });
    });


    $('#postLikes').one('click', function(event){
        
        postId = event.target.closest("div").dataset['postid'];

        $.ajax({
            method:'POST',
            url: likeUrl,
            data: {postId: postId, _token: token}
        })
            .done(function(data) {
                $('#likeCount').html(data);
                $(event.target).attr("disabled", "disabled");
            });
            $(this).css("font-size", "30px").css("padding-left", "10px");
        event.preventDefault();
    });


    $('.commentLiking').one('click', function(event){
        commentId = event.target.closest("div").dataset['commentid'];
        commentCount = event.target.parentNode.lastElementChild;

        $.ajax({
            method:'POST',
            url: commentUrl,
            data: {commentId: commentId, _token: token}
        })
            .done(function(data) {
               $(commentCount).html(data);
            });
            $(this).css("font-size", "20px").css("padding-left", "10px");
        event.preventDefault();
    });


    $('.replyLikes').one('click', function(event){
        replyId = event.target.closest("div").dataset['replyid'];
        replyCount = event .target.parentNode.lastElementChild;

        $.ajax({
            method:'POST',
            url: replyUrl,
            data: {replyId: replyId, _token: token}
        })
            .done(function(data) {
               $(replyCount).html(data);
            });
           $(this).css("font-size", "20px").css("padding-left", "10px");
        event.preventDefault();
    });

});


