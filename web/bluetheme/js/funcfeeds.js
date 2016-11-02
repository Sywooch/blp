  
function feeds() {
    var leaveTheCommentBlock_invite = document.querySelector('#leaveTheCommentBlock_invite');
    leaveTheCommentBlock_invite.classList.add('autoheight');
    $(".leaveTheCommentBlock").css("width", "350px");
}

if(myCookie('clouse')!=='yes') {
    setTimeout(feeds, 15000);
}
function feedsClose() {
    var leaveTheCommentBlock_invite = document.querySelector('#leaveTheCommentBlock_invite');
    var closing_cross_feed = document.querySelector('#closing_cross_feed');

    closing_cross_feed.addEventListener('click', function(){
        leaveTheCommentBlock_invite.classList.remove('autoheight');
        $(".leaveTheCommentBlock").css("width", "250px");
        $(".leaveTheCommentBlock").css("padding", "7px");
        myCookie('clouse','yes');
    });
}
feedsClose();
