<?php

use yii\helpers\HtmlPurifier;

$this->title = $new['title'] . " » 711.ru - Независимый портал о страховании";
$this->registerMetaTag(['name' => 'og:title', 'content' => $new['title'] . ' | 711.ru']);
$this->registerMetaTag(['name' => 'og:type', 'content' => 'website']);
$this->registerMetaTag(['name' => 'og:description', 'content' => $new['short_story']]);
$this->registerMetaTag(['name' => 'og:url', 'content' => 'http://711.ru/news/' . $new['id'] . '-' . $new['alt_name'] . '.html']);
$this->registerMetaTag(['name' => 'og:image', 'content' => $new['photo']]);
?>

<div class="row">
    <div class="col-md-8 no-padding-right">
        <div style="padding-left: 10px">
            <div class="speedbar">
                <span id="olit-speedbar">
                    <a href="/">711.ru</a> » <a href="/news/">Новости</a> » <a href="/news/<?= HtmlPurifier::process($new['category_altname']) ?>"><?= HtmlPurifier::process($new['category_name']) ?></a> » <?= HtmlPurifier::process($new['title']) ?>
                </span>
            </div>
        </div>
        <div id="olit-content" style="margin-bottom: 10px;">
            <div class="clr"></div>
            <h1 class="fullh1">
                <span id="selection_index1" class="selection_index"></span>
                <?= HtmlPurifier::process($new['title']) ?>
            </h1>
            <br>
            <div class="clr"></div>
            <p class="datefull">
                <span id="selection_index2" class="selection_index"></span>
                <?= HtmlPurifier::process($new['date']) ?>
                <!--Количество просмотров-->
            <div style="margin-bottom: 5px; margin-left: 147px; margin-top: 0; position: absolute;">
                <i class="fa fa-eye"></i>
                <?=$count;?>
            </div>
            <!--Количество просмотров-->
            </p>

            <br>
            <div data-yasharequickservices="vkontakte,facebook,twitter" data-yashareTitle="<?= $new['title'] ?> | 711.ru" data-yasharetype="none" data-yasharel10n="ru" class="yashare-auto-init" style="margin:0px 10px;"></div>

            <div class="clr"></div>
            <div style="margin:0px 20px" class="fullstory-img">
                <?php if (trim($new['image']) != '') { ?>
                    <img style="width: 100%" src="<?= HtmlPurifier::process($new['image']) ?>">
                <?php } ?>

            </div>
            <div class="clr"></div>
            <div class="fullnews">
                <div style="display:inline;" id="news-id-17412">
                    <?= HtmlPurifier::process($new['full_story']) ?>
                </div>
            </div>
            <div class="clr"></div>
            <p style="float:left;margin:0px 20px;">
                <span id="selection_index35" class="selection_index"></span>
                <b>Метки:</b>
                <? $counter=0; $tagscount=count($new['tags']); foreach($new['tags'] as $text => $link): ?>
                <a href="<?= $link ?>"><?= $text ?></a><?= ( ++$counter != $tagscount) ? ',' : '' ?>
                <? endforeach; ?>
            </p>
            <div class="clr"></div>
            <p style="float:left;margin:0px 20px; margin-top: 20px; margin-bottom: 0px;">
                <span id="selection_index35" class="selection_index"></span>
                Расскажите друзьям:
            </p>
            <div class="clr"></div>
            <script charset="utf-8" src="//yandex.st/share/share.js" type="text/javascript"></script>
            <div data-yasharequickservices="vkontakte,facebook,twitter" data-yashareTitle="<?= $new['title'] ?> | 711.ru" data-yasharetype="none" data-yasharel10n="ru" class="yashare-auto-init" style="margin:0px 10px;"></div>
            <div class="more-news">
                <div style="font-weight: bold; font-size: 16px" class="fullnews">
                    <span id="selection_index37" class="selection_index"></span>
                    Другие новости:
                </div>
                <div class="clr"></div>
                <div class="same_news">
                    <?php foreach ($another_news as $another_new): ?>
                        
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="clr"></div>
            <div style="height: 20px;">
                <hr>
            </div>
            <div id="comments">
                Коментарии: (<?= HtmlPurifier::process(count($comments)) ?>)
                <?php if($username != ''): ?>
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
                <? endif; ?>
                <?php foreach($comments as $comment): ?>
                <div id="comment" data-id="<?= $comment['id'] ?>">
                    <div class="gray_comment">
                        <?= HtmlPurifier::process($comment['date']) ?>
                        <br>
                        <?= HtmlPurifier::process($comment['name']) ?>
                    </div>
                    <div style="width:100%;" class="black_comment">
                        <?= HtmlPurifier::process($comment['comment']) ?>
                    </div>
                    <? if($is_admin): ?>
                    <div style="width:100%; display:none;" class="black_comment_editor">
                        <textarea cols="100" rows="8" class="comment_comment" name="comment"><?= $comment['comment'] ?></textarea>
                    </div>
                    <div style="text-align: right;" class="comment_admin_btns">
                        <a class="edit-comment-btn" href="javascript:;" style="color: green;">
                            Редактировать
                        </a>
                        <a class="del-comment-btn" href="javascript:;" style="color: red; margin-left: 5px;">
                            Удалить
                        </a>
                    </div>
                    <? endif; ?>
                </div>
                <? endforeach; ?>
            </div>
            <a name="comment_form"></a>
            <?php if($username != ''): ?>
            <form method="post" action="/news/addcomment" id = 'new-comment'>
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                <input type="hidden" name="backUrl" value="<?= $_SERVER['REQUEST_URI'] ?>#comment_form" />
                <input type="hidden" name="post_id" value="<?= $new['id'] ?>" />
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
                                <textarea cols="80" rows="8" class="comment_comment" id="editor" name="comment" style="visibility: hidden; display: none;"></textarea>
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
                                <input type="submit" value="Опубликовать" name="review_comment">  
                            </td>
                        </tr>
                    </tbody></table>
            </form>
            <? endif; ?>
        </div>
    </div>

    <div class="col-md-4">


        <div id="left_block_middle_head">Последние новости</div>
        <div id="left_block_comment_content">
            <?php foreach($last_news as $one_new): ?>
            
            <?php echo '';?>
            <div class="left-news_category" style="margin-top: 15px; margin-bottom: 15px; font-size: smaller;">
                <div style="margin-top: 10px; margin-left: 10px; display:inline; float: left; width: 50px; height: 50px;"><img style="width: 50px; height: 50px; object-fit: cover;" src="<?= $one_new['image'] ?>"></div>
                <div style="  display:inline; float: right; width: 75%; padding-right: 5px">
                    <div style="color:#999999;font-style:italic;display:inline-block;">
                    <?= $one_new['date'] ?>
                    <i style="margin-left: 10px;" class="fa fa-eye"></i>
                    <?=$one_new['count']?>
                    </div>
                    <a style="font-size: smaller;" href="/news/<?= $one_new['category_altname'] ?>" class="category_small category<?= $one_new['category_id'] ?>"><?= $one_new['category'] ?></a>
                    <div id="name_news_all">
                        <a style="font-size: small;" href="/news/<?= $one_new['category_altname'] ?>/<?= $one_new['id'] ?>-<?= $one_new['alt_name'] ?>.html"><?= $one_new['title'] ?></a>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
            <?php endforeach; ?>
        </div>

        <div>  
            <div id="left_block_middle_head">Рейтинг компаний</div>
            <div style="font-size: small; text-align: center;">
                <table class="table table-striped" style="margin-bottom: 5px;">
                    <? foreach($random_company_top as $company): ?>
                    <tr>
                        <td style="width: 134px;"><a href="/companies/<?= $company['id'] ?>"><?= $company['name'] ?></a></td>
                        <td style="width: 96px;"><img src="/images/rating<?= $company['rating'] ?>.png"></td>
                        <td style="width: 60px;"><a href="/reviews/?company-id=<?= $company['id'] ?>"><?= $company['reviews'] ?></a></td>
                    </tr>
                    <? endforeach; ?>
                </table>
                <div style="background-color: white; padding-top: 10px;padding-bottom: 10px;border-top: 1px solid black;border-radius: 5px;"><a href="/companies">Все компании</a></div>
            </div>
        </div>
        <div style="clear:both"></div>


      

       <!-- <div>
            <div id="left_block_middle_head">КОММЕНТАРИИ</div>
            <div id="left_block_comment_content">
                <?php foreach($lastComments as $comment): ?>
                <div style="border-bottom:1px dashed black;font-size:12px; margin-bottom: 12px;">
                    <div style="padding:5px;">
                        <div style="color:#999999;font-style: italic;">
                            <?= HtmlPurifier::process($comment['date']) ?>                           
                        </div>
                        <div id="user_left_block">
                            <a class="underline" href="mailto:"><?= HtmlPurifier::process($comment['name']) ?></a>
                        </div>
                        <div id="comment_left_block">
                            <?= HtmlPurifier::process($comment['text']) ?>
                            <a href="<?= HtmlPurifier::process($comment['url']) ?>">→</a>
                        </div>
                        <div style="padding-top:4px;text-align:justify;">
                            К новости: <br> <a href="<?= HtmlPurifier::process($comment['url']) ?>" style="text-align: left">
                                <?= HtmlPurifier::process($comment['new_title']) ?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div> -->
    </div>
</div>
<? if($username != ''): ?>
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
                            $.post('/news/addcomment', postData, function(data) {

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
                            return false;

                        });


                    });



</script>
<? endif; ?>
<? if($is_admin): ?>
<script type="text/javascript">
    commentEditor = [];
    $('.comment_admin_btns').on('click', '.del-comment-btn', function() {
        if (!confirm('Вы действительно хотите удалить комментарий?'))
            return;
        var $comment = $(this).parent().parent();
        $.ajax({
            url: '/news/editcommentbyadmin',
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
            url: '/news/editcommentbyadmin',
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
                ;
                $editor = $comment.children('.black_comment_editor').hide();
                commentEditor.removeInstance('comment_textarea');
                $editor.children('textarea').attr('id', '');
                $this.text('Редактировать').removeClass('save-comment-btn').addClass('edit-comment-btn');
            }
        });
    });
</script>
<? endif; ?>
<style>
    .nicEdit-main {
        width: 500px !important;
    }
</style>