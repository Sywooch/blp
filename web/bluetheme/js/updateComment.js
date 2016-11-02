$(document).ready(function() {
    var commentId;
    var comment;
    var author;
    var object;
    
    $('.redact').click(function(){
        $(this).parent().show();
        //console.log($(this).parent().siblings());
        $(this).parent().siblings().eq(1).hide();
        $(this).parent().siblings().eq(2).hide();
        $(this).parent().siblings().filter('div.news_onpage_comments_leave').show();
    });
    
    $('.delete').click(function(){
        commentId = $(this).attr('id');
        object = $(this);
        $.post(
            "/reviews/editcommentbyadmin",
            {
              id: commentId,
              action: 'delete',

            },
            onAjaxSuccess
        );

        function onAjaxSuccess(data) {
            if(data === 'delete successful') {
                object.parent().parent().fadeOut();
            }
            
          
        }
    });
    
    $('button').click(function(){
        commentId = $(this).attr('id');
        author = $(this).siblings().filter('input.author').val();
        comment = $(this).siblings().filter('textarea').val();
        
        object = $(this);
        //console.log(comment);
        // console.log($(this).parent().siblings());
        $.post(
            "/reviews/editcommentbyadmin",
            {
              id: commentId,
              action: 'edit',
              comment: comment,
              author: author
            },
            onAjaxSuccess
        );
        
        function onAjaxSuccess(data) {
            console.log(data);
            if(data === 'edit successful') {
               object.siblings().filter('textarea').val(comment);
               object.siblings().filter('input.author').val(author);
               object.parent().siblings().eq(0).text(author);
               object.parent().siblings().eq(1).text(comment);
               object.parent().siblings().show();
               object.parent().fadeOut(); 
               
            }
            
          
        }
        
    });
});


    