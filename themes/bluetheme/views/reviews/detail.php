<?php

use yii\helpers\StringHelper;
use yii\captcha\Captcha;
use yii\helpers\Html;
use app\components\LinkPager711\LinkPager711;
use yii\helpers\Url;

$this->title = 'Отзыв о работе компании ' . $review['company_name'] . ' в городе '.$review['city'].' | 711.ru';
$this->registerMetaTag(['name' => 'og:title', 'content' => 'Отзыв о работе компании ' . $review['company_name'] . ' | 711.ru']);
$this->registerMetaTag(['name' => 'og:type', 'content' => 'website']);
$this->registerMetaTag(['name' => 'og:description', 'content' => $review['descr']]);
$this->registerMetaTag(['name' => 'og:url', 'content' => 'http://711.ru/reviews/' . $review['review_id']]);
$this->registerMetaTag(['name' => 'og:image', 'content' => 'http://images.711.ru'. $review['company_logo']]);


//echo '<pre>'; print_r($reviewComments); echo '</pre>';
//echo '<pre>'; print_r($review); echo '</pre>';

?>
<main class="news">
    <aside class="news_onpage shadow">
       <div class="news_onpage_head">
            <h2 class="news_onpage_head_title">
                Отзыв о работе компании <?=$review['company_name']?>
            </h2>
            <a href="javascript:void(0);" class="category" id="category" style="min-width:auto;margin-right:10px;">Оценка: </a> <span class="stars">
                    <?php if($review['rating'] == '-1'){ $review['rating'] = 0; }?>
                    <?php for($i=0; $i<round($review['rating']); $i++){ ?>
                        <img width="16" class="stars-marked star" src="/bluetheme/img/mark.svg">
                   <?php } ?>
                    <?php for($i=0; $i<5-round($review['rating']); $i++){ ?>
                        <img width="16" class="stars-marked star" src="/bluetheme/img/mark-no.svg">
                   <?php } ?>
                </span>
            <?php if(isset($review['date_add']) && !empty($review['date_add'])){?><span style="float: right;" class="date" id="date"> Дата:<?= Yii::$app->formatter->asDate($review['date_add'], 'dd.MM.yyyy') ?></span><?php } ?>
        </div>


        <p class="news_onpage_paragraph"> <?=$review['comment']?><p>
        <p class="news_onpage_paragraph">Автор: <?=$review['full_name']?> <p>

        <div class="news_onpage_comments clear">
            <div class="news_onpage_comments_counter clear">
                Комментарии(<?=$count?>): <span class="news_onpage_comments_counter_number"></span>
            </div>

            <div class="news_onpage_comments_leavebutton clear">
                Оставить комментарий
            </div>

            <div style="clear:both"></div>

                <?php foreach($models as $model):?>
                    <div class="news_list_day_item clear commentsreview-wrapper-common">
                        <?php if(Yii::$app->user->can('admin')):?>
                            <div class="news_onpage_comments_leave" style="display:none">
                                <input type="hidden" class="comment_id" value="<?=$model['id']?>">
                                <input type="text" class="author" value="<?=$model['author_name']?>">
                                <textarea><?=$model['text']?></textarea>
                                <button  id="<?=$model['id']?>"> Изменить </button>
                            </div>
                        <?php endif;?>
                        <div class="commentreview-title-common"><?=$model['author_name']?></div>
                        <div class="commentreview-text-common">
                            <?=nl2br($model['text'])?>
                        </div>
                        <?php if(Yii::$app->user->can('admin')):?>
                            <div class="category_date_views" style="position:relative;">
                                <span class="date" id="date"><?=$model['created_date']?></span>
                                <span style="float: right; cursor: pointer" id="<?=$model['id']?>" class="date delete" >Удалить</span>
                                <span style="float: right; cursor: pointer"  class="date redact" >Редактировать</span>
                            </div>
                        <?php endif;?>
                    </div>
                <?php endforeach; ?>
                <?= LinkPager711::widget(['maxButtonCount'=>5,'pagination' => $pages,
                    'linkOptions'=>['class'=>'pagination_item'],
                        'nextPageLabel'=>'<p><img src="/bluetheme/img/arrow_right.svg" width="10" height="10"></p>',
                            'prevPageLabel'=>'<p><img src="/bluetheme/img/arrow_left.svg" width="10" height="10"></p>',
                                'lastPageCssClass'=>'pagination_item','firstPageCssClass'=>'pagination_item',
                                    'prevPageCssClass'=>'pagination_item pagination_item_left',
                                        'nextPageCssClass'=>'pagination_item pagination_item_right','pageCssClass'=>'pagination_item']) ?> 

            <?php if (yii::$app->user->isGuest):?>
                    <div class="news_onpage_comments_notauthorised">
                        <p class="news_onpage_comments_notauthorised_title">Желаете оставить комментарий?</p>
                        <p class="news_onpage_comments_notauthorised_doauthorized">
                            Если вы зарегистрированный пользователь
                            <a href="/register/login" class="news_onpage_comments_notauthorised_doauthorized_link">
                                авторизуйтесь.
                            </a>
                            <br>
                            Если незарегистрированный -
                            <a href="/register/register" class="news_onpage_comments_notauthorised_doauthorized_link">
                                зарегистрируйтесь.
                            </a>
                        </p>
                    </div>
            <?php  else: ?>

            <form action="/reviews/<?=$entity_id?>" class="news_onpage_comments_leave" method='POST'>
                    <span class="news_onpage_comments_leave_name">Представьтесь:</span>
                    <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>">
                    <input type="hidden" name="Comment[entity_id]" value="<?= $entity_id?>">
                    <input type="hidden" name="Comment[user_id]"  value="<?= Yii::$app->user->identity->user_id ?>">
                    <input type="text" name="Comment[author_name]" placeholder="Введите Ваше имя" value="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->full_name : ''?>">
                    <textarea name="Comment[text]"  placeholder="Введите ваш комментарий"></textarea><br>
                    <?= Html::error($capcha, 'captcha', ['class'=>'error', 'tag'=>'div'])?> <br>
                    <?= Captcha::widget([
                        'model' => $capcha,
                        'attribute' => 'captcha',

                    ]);?> 
                   <br>
                   <button id='add' type="submit" name="button">Опубликовать</button>
                </form>

            <?php endif; ?>
            <script type="text/javascript" src="/bluetheme/js/updateComment.js"></script>
            <style type="text/css">
                #capcha-captcha-image {
                    display: inline-block;
                    vertical-align: top;
                    margin-bottom: 20px;
                }
                #capcha-captcha {
                    margin: 0;
                    vertical-align: top;
                    margin-top: 4px;
                    width: 30%;
                    margin-bottom: 20px;
                }
            </style>
        </div>
    </aside>

    <aside class="news_onpage_other company_rating_onpage shadow">
        <span  class="insurance_companies_list_title">
            Похожие отзывы
        </span>
    <?php

       $summElements = count($relativeReviews);
        $counter = 0;
        //print_r($relativeReviews);
        foreach($relativeReviews as $model){
            $lenthToCrap = 105;
            $review_text = '<p  class="content_left_feedback-item--wrapper_content_letter">'.strip_tags($model['text']).'</p>';
            if (strlen(strip_tags($model['text'])) > $lenthToCrap) {
                $review_text = strip_tags($model['text']);
                $review_text = StringHelper::truncate($review_text, $lenthToCrap, '');
                $review_text = substr($review_text, 0, strripos($review_text, ' '));
            }

            if($model['review_id'] == $review['review_id']){
                continue;
            }
            ?>

                <div class="content_left_feedback-item clear reviewsright-common">
                    <div class="content_left_feedback-item--wrapper">
                        <div  onclick="javascript: document.location.href='<?= Url::to(['/reviews/detail','id'=>$model['review_id']]) ?>';" class="content_left_feedback-item--wrapper_content">
                            <span class="stars" style="float:right">
                                <?php if($model['rating'] == '-1'){ $model['rating'] = 0; }?>
                                <?php for($i=0; $i<round($model['rating']); $i++){ ?>
                                    <img width="16" class="stars-marked star" src="/bluetheme/img/mark.svg">
                               <?php } ?>
                                <?php for($i=0; $i<5-round($model['rating']); $i++){ ?>
                                    <img width="16" class="stars-marked star" src="/bluetheme/img/mark-no.svg">
                               <?php } ?>
                            </span>
                            <?php if($model['company_name']){?><a class="titlereviewright-common" href="<?= Url::to(['/companies/detail','id'=>$model['company_id']]) ?>" class="content_left_feedback-item--wrapper_content_title"><?=$model['company_name']?></a><?php }?>
                            <div style="clear:both"></div>

                            <span  class="content_left_feedback-item--wrapper_content_date contentdatereview-common"><?= Yii::$app->formatter->asDate($model['date'], 'dd.MM.yyyy')?></span>
                            <span style="cursor:pointer"><?= strip_tags($review_text)?></span><span class="moreReadCommon">...→</span><br />
                            <span class="content_left_feedback-item--wrapper_content_whos authorReview-common">
                                <?= (empty($model['author'])) ? '' : $model['author']?>
                                <?php if($model['city']){?>
                                    <span> | </span>
                                    <span class="content_left_feedback-item--wrapper_content_city">
                                    <?= $model['city']?>
                                    </span>
                                <?php }?>
                            </span>
                            <!--<<a href="" class="read_next">
                            <img src="/bluetheme/img/readNext.svg" width="20" />
                            <img src="/bluetheme/img/readNextHover.svg" width="20">
                            </a>-->
                        </div>
                            </div>
                    <?php if($counter != ($summElements-1)){ ?><div class="content_left_feedback-item_line"></div> <?php } ?>
                        <br />
                </div>
      <?php $counter++;
        }

    ?>
        <!-- ==== DEVIDER ===== -->

        <p class="last_feedbacks_comments_title" style="border-bottom: 1px solid #b2b2b2; text-align: center;">
            Последние комментарии к отзывам
        </p>
            <?php foreach ($lastComments['comments'] as $comment): ?>
        <div class="last_feedbacks_comments_item">
            <p class="last_feedbacks_comments_item_date">
                <?= $comment['date'] ?>
            </p>
            <div class="last_feedbacks_comments_item_person">
                <img src="/bluetheme/img/profile1.svg" alt="">
                <?= ($comment['review_author'] == $comment['author_name']) ? 'Ответ представителя СК' : $comment['author_name'] ?>
            </div>

            <div class="last_feedbacks_comments_item_iconComment">
                <img src="/bluetheme/img/cloud_comment.png" alt="">
            </div>
            <div class="last_feedbacks_comments_item_comment">
                    <?= $comment['trunc_comment'] ?>
            </div>
            <div class="last_feedbacks_comments_item_from">
                К отзыву о работе компании: <a href="<?= Url::to(['/reviews/detail','id'=>$comment['review_id']]) ?>" class="last_feedbacks_comments_item_from">№<?= $comment['review_id'] ?></a>
                <img src="/bluetheme/img/cloud_comment.png" alt="">
                <span class="last_feedbacks_comments_item_from_counter"><?= $comment['count'] ?></span>
            </div>
        </div>
    <?php endforeach; ?>
    </aside>


</main>
