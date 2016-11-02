<?php

$this->title = $title;

?>
<div class="col-lg-12">
    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-green" role="alert">
            <p> <?= Yii::$app->session->getFlash('success') ?></p>
        </div>
    <?php endif; ?>
    <?php if(Yii::$app->session->hasFlash('confirm')): ?>
        <div class="alert alert-green" role="alert">
            <p> <?= Yii::$app->session->getFlash('confirm') ?></p>
        </div>
    <?php endif; ?>
    <?php if(Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-red" role="alert">
            <p> <?= Yii::$app->session->getFlash('error') ?></p>
        </div>
    <?php endif; ?>
    <?php if(Yii::$app->session->hasFlash('confrev')): ?>
        <div class="alert alert-green" role="alert">
            <p> <?= Yii::$app->session->getFlash('confrev') ?></p>
        </div>
    <?php endif; ?>
    
</div>

<!--<h1 class="h1HeaderIndex" align="center">711.ru Независимый портал о страховании</h1><br/><br/>-->
<div class="row">
    <div class="col-sm-8">
        <div class="row m">
            <div class="col-sm-4 col-md-4">
                <a id="button_write_review"  href="/addreview/" target="_blank"> ОСТАВИТЬ ОТЗЫВ </a>
            </div>
            <div class="col-sm-8 col-md-8">
                <a id="insurance_reviews_total" href="/reviews/"><b><?= $reviews ?></b> ОТЗЫВОВ</a>
                <a id="insurance_reviews_total_day" href="/reviewsbyweek">ОТЗЫВЫ ЗА НЕДЕЛЮ <b>+<?= $weekReviews ?></b></a>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-7 no-padding-right">
                <div class="widget-block">
                    <div class="widget-header">
                        <a href="/reviews/<?= $last_review['id'] ?>">
                            <div class="widget-header-red">ПОСЛЕДНИЙ ОТЗЫВ</div>
                        </a>
                    </div>
                    <div class="widget-content">
                        <div class="review-content-header">
                            <div class="review-date"><?= $last_review['date'] ?></div>
                            <div class="review-company">
                                <div class="review-company-name">
                                    <a href="/companies/<?= $last_review['company_id'] ?>" class="underline"><?= $last_review['company_name'] ?></a>
                                </div>
                                <div class="type-polis">Тип полиса: <?= $last_review['type'] ?></div>
                            </div>
                        </div>
                        <div class="review-rating">Оценка: 
                            <img src="/images/rating<?= round($last_review['rating']) ?>.png">
                        </div>
                        <div class="review-text">
                            <?= \yii\helpers\StringHelper::truncateWords($last_review['text'], 65, '...') ?>
                            <a class ='' href="/reviews/<?= $last_review['id'] ?>">Читать далее...</a>
                        </div>
                        <div id="review-author">Автор отзыва: <?= $last_review['author'] ?></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 no-padding-right">
                <div class="widget-block poll-block">
                    <div class="widget-header-red">ОПРОС</div>
                    <div class="widget-content">
                        <div class="poll-question p"><?= $poll['question'] ?></div>
                        <div class="dpad">
                            <?php if ($poll['result']): ?>
                                <div id="olit-vote">
                                    <?php foreach ($poll['results'] as $result): ?>
                                        <div class="vote"><?= $poll['answers'][$result['answer']] ?>. - <?= $result['ans_count'] ?> (<?= $result['percent'] ?>%)</div>
                                        <div class="voteprogress m"><span style="width:<?= round($result['percent']) ?>%;" class="vote<?= $result['answer'] + 2 ?>"><?= $result['percent'] ?>%</span></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <form action="addvote/add" name="vote" method="post" onsubmit="return validRadio();">
                                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                                    <input type="hidden" name="vote_id" value="<?= $poll['vote_id'] ?>"/>
                                    <div id="olit-vote">
                                        <?php foreach ($poll['answers'] as $num_answer => $answer): ?>
                                            <div class="vote">
                                               <!-- <label> -->
                                                    <input type="radio" value="<?= $num_answer ?>" name="vote_check"> <?= $answer ?>
                                               <!-- </label> -->
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div id="errAlert"></div>
                                    <br>
                                    <button type="submit" class="fbutton">
                                        <span>Голосовать</span>
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="widget-block" style="">
            <div class="widget-header-black">САМЫЕ ОБСУЖДАЕМЫЕ</div>
            <div class="widget-content">
                <?php foreach ($top5 as $sk) : ?>
                    <div class="row rating">
                        <div class="col-sm-6 col-xs-5 no-padding-right">
                            <a href="/companies/<?= $sk['id'] ?>" class="underline"><?= \yii\helpers\StringHelper::truncate($sk['name'], 13, '...') ?></a>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">

                                <div class="rateit star-rating" data-rateit-value="<?= $sk['rating'] ?>" data-rateit-readonly="true"></div>

                                <div class="rating-count">
                                    <a href="/companies/<?= $sk['id'] ?>?page=1" class="underline"><?= $sk['count'] ?></a>
                                </div>

                                <span class="tooltip">
                                    Количество отзывов
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <a class = 'underline' href ='/companies/'><div class ='more-companies-wrap'>
                        <div class = 'more-companies'>
                            Все компании
                        </div> 
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
<!--begin-->

<div class="row news-block">
    <div class="col-md-12">
        <div class="widget-block-white">  
            <div class="widget-content">
                <!--<a href="/news/" id="head_news2">НОВОСТИ</a>-->

                <div class="news_upper_block" style="text-align: left; padding: 15px 10px 5px 10px;">
                    <a href="/news/articles" style="color:rgb(5, 163, 159);">Статьи</a>
                    <a href="/news/novosti-kompanii" style="color:rgb(51, 134, 211);">Новости компаний</a>
                    <a href="/news/smi-o-strahovanii" style="color:rgb(249, 88, 88);">СМИ о страховании</a>
                    <a href="/news/banks" style="color:rgb(143, 188, 143);">Банки</a>
                    <a href="/news/economics" style="color:rgb(255, 165, 0);">Экономика</a>
                    <a href="/news/est-mnenie" style="color:rgb(199, 109, 196);">Есть мнение</a>
                    <a href="/news/eksklyuziv" style="color:rgb(130, 180, 64);">Эксклюзив</a>
                </div>
                <div class="news_categories">
                    <?php
//                var_dump($news);
//                die();
                    ?>

                    <?php foreach ($news as $one_cat): ?>
                        <div class="m">

                            <?php if ($one_cat['code'] == 'articles'): ?>
                                <?php $last_new = array_shift($one_cat['news']); ?>
                                <div class="news-last row m">
                                    <div class="col-md-6">
                                        <img style="height: auto; width: 100%;" src="<?= $last_new['image'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="news-header">
                                            <a style="text-decoration: none;font-size: xx-large;line-height: 1;" href="<?= isset($last_new['url']) ? $last_new['url'] : '/news/' . $last_new['category_altname'] . '/' . $last_new['id'] . '-' . $last_new['alt_name'] . '.html' ?>">
                                                <?= $last_new['title'] ?>
                                            </a>
                                        </div>
                                        <div class="news-shortly">
                                            <?= strip_tags($last_new['short_story']) ?>
                                        </div>
                                        <div style="color: rgb(153, 153, 153);font-style: italic;padding-top: 5px;">
                                            <?= $last_new['date']?> 
                                            <i style="margin-left: 10px;" class="fa fa-eye"></i>
                                            <?=$last_new['count']?>
                                        </div>
                                    </div>
                                </div>

                            <?php else: ?>

                            <?php endif;?>
                            <div class="news_category_name">
                                <?php if (!empty($one_cat['news'])): ?>
                                    <a href="/news/<?= $one_cat['code'] ?>">
                                        <?= $one_cat['name'] ?>
                                    </a>
                                <?php endif; ?>

                            </div>

                            <?php $nrow = 0; ?>
                            <?php
                            $cols = 4;
                            $col = 12 / $cols;
                            foreach ($one_cat['news'] as $one_new) {
                                if ($nrow == 0) {
                                    echo '<div class="row max-size-auto padding-left-3px padding-right-3px">';
                                    $row_close = false;
                                }
                                $nrow++;
                                ?>
                                <div class="news-widget-block col-md-<?= $col ?> col-sm-<?= $col ?> col-lg-<?= $col ?> padding-left-3px padding-right-3px">
                                    <div class="widget-block-white block-size-auto">
                                        <div class="new_photo"><img style="" src="<?= $one_new['image'] ?>"></div>
                                        <div class="widget-content">
                                            <div class="news_title"><a href="<?= $one_new['url'] ?>"><?= $one_new['title'] ?></a></div>
                                            <div class="news_sub_title"><?= strip_tags($one_new['short_story']) ?></div>
                                            <div class="news_date"><?= $one_new['date'] ?>
                                                <i style="margin-left: 10px;" class="fa fa-eye"></i>
                                                <?=$one_new['count']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($nrow == $cols) {
                                    echo '</div>';
                                    $nrow = 0;
                                    $row_close = true;
                                }
                                ?>
                            <?php }; ?>
                            <?php
                            if ($row_close != true) {
                                echo '</div>';
                            }
                            ?>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end-->
<div class="row">
    <div class="col-md-8 no-padding-right ">
        <div class="m">
           <!-- <div class="widget-block-white">
                <div class="widget-header-red">Свежие комментарии к новостям</div>
                <div class="widget-content">
                    <?php foreach ($comments as $comment): ?>
                        <div class="comment-block">
                            <div class="row p"> 
                                <div class="col-md-2">
                                    <div ><?= $comment['name'] ?></div>
                                    <div ><?= $comment['date'] ?></div>
                                </div>
                                <div class="col-md-10">
                                    <?= $comment['text'] ?>
                                    <a href="<?= $comment['url'] ?>">→</a>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    К новости: <a href="<?= $comment['url'] ?>"><?= $comment['new_title'] ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center"><a href="/news/">Еще комментарии к новостям → </a></div>

            </div>-->
        </div>
    </div>
    <div class="col-md-4">
        <a style="height: 50px;" class="pro-business-container" target="_blank" href="http://probusinesstv.ru/programs/168/">
            <div class="pro-business"></div>
        </a>
        <a style="top:0px;" href="/?do=legal_aid_form" class="free-consultation" id="legal_aid">
            БЕСПЛАТНАЯ КОНСУЛЬТАЦИЯ
        </a>
        <div class="clr"></div>
    </div>

</div>
<div class="banner hide">
    <div class="col-md-<?= $col ?> col-sm-<?= $col ?> col-lg-<?= $col ?> padding-left-3px padding-right-3px">
        <div class="widget-block-white block-size-auto">
            <div class="widget-content" style="text-align:center;">
                <a target="_blank" href="http://uremont.com/c/8b1a42"><img style="height:358px;width:auto;" src="http://www.images.711.ru/uploads/20160627_uremont-banner-new.gif"></a>
            </div>
        </div>
    </div>
</div>

<script>


    $($('.news-block .news-widget-block')[1]).after($('.banner').html());
    
    $(document).ready(function() {
        $.each($('.max-size-auto'), function(i, e) {
            if ($(document).width() > 750) {
                $(e).find('.new_photo img').css('height', '170px');
                $(e).find('.block-size-auto').height($(e).height());
            } else {
                $(e).find('.new_photo img').css('height', '');
            }

        })
        //        $('.max-size-auto').height(Math.max($('.last_new_image').height(), $('.last_new_text').height()) + 20);
    });
    function doVote(event) {
        var vote_check = $('#olit-vote input:radio[name=vote_check]:checked').val();
        if (!vote_check)
            return;
        ShowLoading('');
        $.get(olit_root + "site/vote", {
            vote_id: "10",
            vote_action: event,
            vote_check: vote_check, vote_skin: olit_skin
        }, function(data) {
            HideLoading('');
            $("#vote-layer").fadeOut(500, function() {
                $(this).html(data);
                $(this).fadeIn(500);
            });
        });
    }
    function validRadio(){
        var vote_check = $('#olit-vote input:radio[name=vote_check]:checked').val();
        if (!vote_check) {
            document.getElementById('errAlert').innerHTML = "Необходимо выбрать какой-нибудь вариант ответа!"
            return false;
        }
        else
            return true;
    }

</script>

<? if ($login_error): ?>
<script>alert('Ошибка входа. Попробуйте ещё раз');</script>
<? endif; ?>