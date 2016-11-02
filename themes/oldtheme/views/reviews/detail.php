<?php
$this->title = 'Отзыв о работе компании ' . $review['company_name'] . ' в городе '.$review['city'].' | 711.ru';
$this->registerMetaTag(['name' => 'og:title', 'content' => 'Отзыв о работе компании ' . $review['company_name'] . ' | 711.ru']);
$this->registerMetaTag(['name' => 'og:type', 'content' => 'website']);
$this->registerMetaTag(['name' => 'og:description', 'content' => $review['short']]);
$this->registerMetaTag(['name' => 'og:url', 'content' => 'http://711.ru/reviews/' . $review['id']]);
$this->registerMetaTag(['name' => 'og:image', 'content' => 'http://711.ru' . $review['company_logo']]);
?>
<!--Модальное окно оставить отзыв-->
<div id="cboxOverlay"></div>
<div class="modalWin">
    <div class="closeButton"></div>
    <img class="modalLogo" src="/images/logoModal.png"><br/><br/>
    <p  align="center" class="modalText">Влияйте на рейтинг страховых компаний</p>
    <hr  class="hrModal2">
    <p align="center" class="modalTextMino">Помогите другим выбрать правильного страховщика. Напиши отзыв о страховой компании</p>
    <div class="modalButtonReview"></div>
</div>
<?php
$this->registerJsFile('/js/modal.js');
?>
<!--Модальное окно оставить отзыв-->

<div class="row">
    <div class="col-md-8 no-padding-right">
        <div id="olit-content">
            <div style="padding:10px;">
                <div class="reviews-nav">
                    <a href="/">711</a>
                    >>
                    <a href="/companies/<?= $review['company_id'] ?>"><?= $review['company_name'] ?></a>
                    >>
                    Отзыв №<?= $review['id'] ?>
                </div>
                <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script><div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter" data-yashareTitle="Отзыв о работе компании <?= $review['company_name'] ?> | 711.ru"></div>
                <div class="reviews-company">
                    <a target="_blank" href="/addreview/<?= $review['company_id'] ?>" style="float: right;">оставить отзыв</a>
                </div>
                <h1 class="h1Header3">Отзыв о работе компании <?= $review['company_name'] ?></h1>
                <div class="reviews-rating">
                    <span>Оценка <img src="/images/rating<?= $review['rating'] ?>.png"></span>
                    <a href="/companies/<?= $review['company_id'] ?>" style="float: right;">о компании</a>
                    <a href="/companies/<?= $review['company_id'] ?>/reviews" style="float: right;margin-right: 40px;">все отзывы (<?= $review['count'] ?>)</a>
                </div>
                <div class="reviews-comment"><b><?= $review['title'] ?></b></div>
                <div class="reviews-comment">
                    <p><?= $review['text'] ?></p>
                </div>
                <div class="reviews-author">Автор - <?= $review['author'] ?></div>
                <div class="reviews-type">Вид страхования - <?= $review['type'] ?></div>
                <div class="reviews-date"><?= $review['date'] ?></div>
                <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script><div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter" data-yashareTitle="Отзыв о работе компании <?= $review['company_name'] ?> | 711.ru"></div>
                <div class="likes_block <?= $already_liked ? '' : 'set_like' ?> detail_page" style="float: right;  padding-top: 20px;">
                    <span class="like_setter">Отзыв полезен</span>
                    <div class="like-icon"></div>
                    <div style="display:inline;"></div>
                    <span class="like_counter"><?= $like_count ?></span>
                </div>
                <div class="clr"></div>
                <script>
                    $(document).ready(function()
                    {
                        $('.edit_comment_field').hide();
                        $('.edit_button').click(function() {
                            $(".edit_comment_field").slideUp(1000);
                            $(this).parents(".black_comment").prev('.edit_comment_field').fadeIn(1000);
                            $(this).parents(".black_comment").slideUp(1000);
                        });


                    });
                </script>
                <hr>
                <div id="comments">
                    Коментарии: (<?= count($comments) + ('' == $review['answer']) ? 0 : 1 ?>)
                    <?php if ($username != ''): ?>
                        <a style="float: right" href="#comment_form">Оставить комментарий:</a>
                    <?php else: ?>
                        <a style="float: right" id="login_reg_div_show" href="javascript:;">Оставить комментарий:</a>
                        <div id="login_reg_div" style="border: 1px solid #cccccc;
                             border-left-width: 4px;
                             padding: 15px 15px 15px 35px;
                             font-size: 1.1em;
                             margin-bottom: 20px;
                             display:none;
                             ">
                            <b>Желаете оставить комментарий?</b><br>
                            Если вы зарегистрированный пользователь <a id="login_form_show" href="#login_form">авторизуйтесь</a>,<br>
                            если незарегистрированный <a href="/register">зарегистрируйтесь.</a>
                        </div>
                        <script>
                            $('#login_reg_div_show').click(function() {
                                $("#login_reg_div").show();
                            });
                        </script>
                    <?php endif; ?>
                    <span id ='link_target'></span>
                    <?php
//                    var_dump($comments);
//                    die();
                    ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="comment" data-id="<?= $comment['id'] ?>">
                            <div class="gray_comment">
                                <?= $comment['created_date'] ?>
                                <br>
                                <?php if ($comment['author_name'] != ''): ?>
                                    <?= $comment['author_name'] ?>
                                </div>
                                <div style="width:100%;" class="black_comment">
                                    <?= $comment['text'] ?>
                                </div>
                                <?php if ($is_admin): ?>
                                    <div style="width:100%; display:none;" class="black_comment_editor">
                                        <textarea cols="100" rows="8" class="comment_comment" name="comment"><?= $comment['text'] ?></textarea>
                                    </div>
                                    <div style="text-align: right;" class="comment_admin_btns">
                                        <a class="edit-comment-btn" href="javascript:;" style="color: green;">
                                            Редактировать
                                        </a>
                                        <a class="del-comment-btn" href="javascript:;" style="color: red; margin-left: 5px;">
                                            Удалить
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                Ответ компании:
                            </div>
                            <div style="width:100%;" class="black_comment">
                                <div class="review_wrapper">
                                    <section class="response">
                                        <article>
                                            <?= $comment['text'] ?>
                                        </article>
                                    </section>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <a name="comment_form"></a>
            <?php if ($username != ''): ?>
                <form method="post" action="/reviews/addcomment" id ='new-comment' >
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                    <input type="hidden" name="review_id" value="<?= $review['id'] ?>" />
                    <table width="80%" align="center">
                        <tbody><tr>
                                <td colspan="2">
                                    Добавить комментарий: 
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    Представьтесь*
                                </td>
                                <td>
                                    <input type="text" value="<?= $username ?>" class="name_comment" name="name">
                                </td><td></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <textarea cols="100" rows="8" class="comment_comment" id="editor" name="comment" style="visibility: hidden; display: none;"></textarea>
                                    <span id ="error-input" style ='color:red'></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label>Please enter the letters displayed:</label>
                                    <input type="text" id="defaultReal" name="defaultReal">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Опубликовать" name="review_comment" id ='send-new-comment'>  
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div>  
        <div style="background-color:white;margin-top:35px;" id="left_block_top_insurance">
        </div> 
        <div id="left_insurence_all_content">
            <div id="left_block_middle_head">Похожие отзывы</div>
            <div style="clear:both;"></div>
            <div style="background:white">
                <?php foreach ($similar_reviews as $one_review): ?>
                    <div class="review_block" style="padding:5px; border-bottom: 1px black dashed">
                        <div class="clr"></div>
                        <div style="float:left;display:inline;">
                            <a href="/companies/<?= $one_review['company']['id'] ?>"><?= $one_review['company']['name'] ?></a>
                        </div>
                        <div style="
                             background-image: url('/images/rating<?= $one_review['rating'] ?>.png');
                             float:right;
                             width: 95px;
                             height: 18px;">
                        </div>
                        <div class="clr"></div>
                        <div style="margin-top: 8px; text-align: justify;">
                            <a style="text-decoration: none; color: black;" href="/reviews/<?= $one_review['id'] ?>"><?= $one_review['comment'] ?></a>
                        </div>
                        <div style="float:left;margin-top: 8px; text-align: justify;">
                            <div style="color:#999999;font-style: italic;"> 
                                Тип полиса: <?= $one_review['type'] ?>
                            </div>
                            <div style="color:#999999;font-style: italic;"> 
                                Оставлен <?= $one_review['date_add'] ?>
                            </div>
                        </div>
                        <div class="likes_block" style="float: right;  padding-top: 5px;margin-top: 8px; text-align: justify;">
                            <div class="like-icon"></div>
                            <span class="tooltip" style="display: none;
                                  background: black;
                                  color: white;
                                  font-size: 10px;
                                  height: 40px;
                                  opacity: 1;
                                  padding: 5px;
                                  position: absolute;
                                  width: 74px;
                                  border-radius: 3px;
                                  border: 1px gray solid;">
                                Отзыв полезен
                            </span>
                            <span class="like_counter"><?= $one_review['likes'] ?></span>
                        </div>
                        <div class="clr"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div>  
        <div style="background-color:white;margin-top:35px;" id="left_block_top_insurance">
        </div> 
        <div id="left_insurence_all_content">
            <div id="left_block_middle_head">Последние комментарии к отзывам</div>
            <div style="clear:both;"></div>
            <div style="background:white">
                <?php foreach ($lastComments as $comment): ?>
                    <div style="padding:5px; border-bottom: 1px black dashed">
                        <div style="color:#999999;font-style: italic;"> 
                            <?= $comment['date'] ?>
                        </div>
                        <div id="user_left_block">
                            <?= $comment['author_name'] ?>
                        </div>
                        <div id="comment_left_block">
                            <?= $comment['trunc_comment'] ?>
                            <?php
                            if ($comment['full_comment']):
                                echo '';
                                ?>
                                <a href="/reviews/<?= $comment['review_id'] ?>">→</a>
                            <?php endif; ?>
                        </div>

                        <div style="padding-top:4px;text-align:left; word-wrap: break-word;">
                            К отзыву о работе компании <?= $comment['company_name'] ?>: 
                            <a style="text-align: left" href="/reviews/<?= $comment['review_id'] ?>">
                                №<?= $comment['review_id'] ?>   
                            </a>
                            <div id="count_comments">
                                <strong><?= $comment['count'] ?></strong>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    #comments {
        font-size: 12px;
    }

    .nicEdit-main {
        width: 500px !important;
    }
    .yashare-auto-init {
        height: 40px;
    }
    .set_like > .like_setter {
        text-decoration: underline;
        color: #398dd8;
        cursor: pointer;
    }
    .set_like > .like_setter:hover {
        color: #23527c;
    }
    .review_block:hover {
        background: #edf6ff;
    }
</style>
<script>
    $(document).ready(function() {
        $('.set_like').on('click', function() {
            if (!$(this).hasClass('set_like'))
                return;
            var $this = $(this);
            var $counter = $this.children('.like_counter');
            var value = parseInt($counter.text());
            $.ajax({
                type: 'post',
                url: '/reviews/setlike',
                data: {
                    review_id: <?= $review['id'] ?>,
                    _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
                }
            }).done(function(data) {
                if (data == 'success') {
                    $counter.text(value + 1);
                    $this.removeClass('set_like');
                }
                else
                    console.log(data);
            });
        });
    });
</script>
<?php if ($username != ''): ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
    <link rel="stylesheet" type="text/css" href="/js/jquery_real_person/jquery.realperson.css"> 
    <script type="text/javascript" src="/js/jquery_real_person/jquery.plugin.js"></script> 
    <script type="text/javascript" src="/js/jquery_real_person/jquery.realperson.js"></script>

    <script>
        $(document).ready(function() {
            new nicEditor({buttonList: ['bold', 'italic', 'underline', 'strikeThrough', 'ol', 'ul']}).panelInstance('editor');
            $('.nicEdit-panel').parent().css('width', '510px');
            $('.nicEdit-main').parent().css('width', '510px');
            $('.nicEdit-main').html('');
            $('#defaultReal').realperson();
            $('.nicEdit-panel').parent().css('width', '520px');
            $('.nicEdit-main').parent().css('width', '520px');
            $('.nicEdit-main').css('width', '510px');
            $('#new-comment').on('submit', function() {
                var postData = $(this).serialize();
                $('#error-input').css("color", 'green');
                $('#error-input').html('Идет отправка...');
                $.post('/reviews/addcomment', postData, function(data) {

                    console.log(data);
                    return false;

                    if (data == 'success') {

                        location.reload();
                    }
                    else if (data == 'error') {

                        $('#error-input').html('');
                        $('#error-input').css({color: 'red'});
                        $('#error-input').html('Вы неправильно ввели капчу, попробуйте еще раз!');
                    }
                    else {
                        data = jQuery.parseJSON(data);
                        $('#error-input').html('');
                        $('#error-input').css({color: 'red'});
                        $.each(data, function(key, value) {
                            $('#error-input').append(value + "<br/>");
                        });

                    }

                });
                location.reload();
                return false;
            });
        });
    </script>
<?php endif; ?>
<?php if ($is_admin): ?>
    <script type="text/javascript">
        commentEditor = [];
        $('.comment_admin_btns').on('click', '.del-comment-btn', function() {
            if (!confirm('Вы действительно хотите удалить комментарий?'))
                return;
            var $comment = $(this).parent().parent();
            $.ajax({
                url: '/reviews/editcommentbyadmin',
                method: 'post',
                data: {
                    action: 'delete',
                    id: $comment.data('id'),
                    _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
                }
            }).done(function(data) {
                if (data != 'delete successful')
                    alert('Ошибка при удалении комментария. Проверьте соединение с сервером');
                else
                    $comment.hide();
            });
        });
        $('.comment_admin_btns').on('click', '.edit-comment-btn', function() {
            var $comment = $(this).parent().parent();
            $comment.children('.black_comment').hide();
            $editor_div = $comment.children('.black_comment_editor');
            $editor_div.children('textarea').attr('id', 'comment_textarea');
            commentEditor = new nicEditor({buttonList: ['bold', 'italic', 'underline', 'strikeThrough', 'ol', 'ul']}).panelInstance('comment_textarea');
            $editor_div.children('div').width('510px');
            $comment.children('.black_comment_editor').show();
            $(this).text('Сохранить').removeClass('edit-comment-btn').addClass('save-comment-btn');
        });
        $('.comment_admin_btns').on('click', '.save-comment-btn', function() {
            var $this = $(this);
            var $comment = $this.parent().parent();
            var comment = nicEditors.findEditor('comment_textarea').getContent();//;$comment.children('.black_comment_editor').children('div').children('.nicEdit-main').html();
            $.ajax({
                url: '/reviews/editcommentbyadmin',
                method: 'post',
                data: {
                    action: 'edit',
                    id: $comment.data('id'),
                    comment: comment,
                    _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
                }
            }).done(function(data) {
                if (data != 'edit successful')
                    alert('Ошибка при сохранении комментария. Проверьте соединение с сервером');
                else
                {
                    $comment.children('.black_comment').html(comment).show();
                    
                    $editor = $comment.children('.black_comment_editor').hide();
                    commentEditor.removeInstance('comment_textarea');
                    $editor.children('textarea').attr('id', '');
                    $this.text('Редактировать').removeClass('save-comment-btn').addClass('edit-comment-btn');
                }
            });
        });
    </script>
<?php endif; ?>
<script>
    $('.likes_block > div.like-icon').on('mouseover', function() {
        $(this).next().show();
    });
    $('.likes_block > div.like-icon').on('mouseout', function() {
        $(this).next().hide();
    });
</script>