<?php

use yii\helpers\Html;

use yii\helpers\Url;
use yii\widgets\Pjax;
use dosamigos\ckeditor\CKEditor;
use yii\widgets\ActiveForm;
use app\components\LinkPager711\LinkPager711;
?>
<main class="content_fifth clear feedbackPage">
    <aside class="content_left clear shadow my_feedbacks">
      <?php
        if(count($reviewsCompany['reviews'])>0){

                $summElements = count($reviewsCompany['reviews']);
                $counter = 0;
                foreach($reviewsCompany['reviews'] as $model){
                    $review_text = '<p class="content_left_feedback-item--wrapper_content_letter content_left_feedback-item--wrapper_content_letter_lk">'.strip_tags($model['text']).'</p>';
                    ?>

                        <div class="content_left_feedback-item clear">
                            <div class="content_left_feedback-item--wrapper">
                                <div class="content_left_feedback-item--wrapper_img">
                                    <div style="width: 40px; height:40px; background: #<?= $model['company_color'] ?>; color: white; font-size: 20px;text-align: center;
                                        -moz-border-radius:  50%; /* Firefox */
                                        -webkit-border-radius:  50%;  /* Safari 4 */
                                        border-radius:  50%;  /* IE 9, Safari 5, Chrome */">
                                       <div style="line-height: 40px; height:40px; font-weight: bold;"><?= substr($model['company_name'], 0, 2) ?></div>
                                   </div>
                                </div>
                                <div class="content_left_feedback-item--wrapper_content">
                                    <?php if($model['title']){?><a href="<?= Url::to(['/reviews/detail','id'=>$model['review_id']]) ?>" class="content_left_feedback-item--wrapper_content_title"><?=$model['title']?></a><?php }else{?>
                                            <?=$model['company_name']?>
                                        <?php } ?>
                                    <span class="stars">
                                        <?if($model['rating'] == '-1'){ $model['rating'] = 0; }?>
                                        <?php for($i=0; $i<round($model['rating']); $i++){ ?>
                                            <img width="16" class="stars-marked star" src="/bluetheme/img/mark.svg">
                                       <?php } ?>
                                        <?php for($i=0; $i<5-round($model['rating']); $i++){ ?>
                                            <img width="16" class="stars-marked star" src="/bluetheme/img/mark-no.svg">
                                       <?php } ?>
                                    </span>
                                    <span class="content_left_feedback-item--wrapper_content_whos">
                                    <?= (empty($model['author'])) ? '' : $model['author']?>
                                    <?php if($model['city']){?>
                                        <span> | </span>
                                        <span class="content_left_feedback-item--wrapper_content_city">
                                            <?= $model['city']?>
                                        </span>
                                    <?php }?>
                                    </span>
                                    <span class="content_left_feedback-item--wrapper_content_date"><?= Yii::$app->formatter->asDate($model['date'], 'dd.MM.yyyy')?></span>
                                    <?=$review_text?>

                                    <?php Pjax::begin(['id' => 'commentsReviewWrapper'.$model['review_id'],'enablePushState' => false]);?>

                                        <?php if(count($model['comment'])>0){ ?>
                                                <?php foreach($model['comment'] as $comment){?>
                                                    <div class="comment-wrapper">
                                                        <div class="comment-wrapper_author_answer comment-wrapper_author_block"><?php if(!empty($comment['comment_author'])){
                                                            if($comment['comment_author'] == Yii::$app->user->identity->name){
                                                                echo 'Ответ представителя СК';
                                                            }else{
                                                                echo $comment['comment_author'];
                                                            }
                                                        }else{
                                                            echo 'Гость';
                                                        }?> </div>
                                                        <div class="comment-wrapper_answer_text comment-wrapper_author_block"><?= $comment['comment_text'] ?></div>
                                                        <div class="comment-wrapper_answer_date comment-wrapper_author_block"><?= Yii::$app->formatter->asDate($comment['comment_date'], 'dd.MM.yyyy')?></div>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>

                                    <a class="leaveTheCommentBlock_button" onclick="$(this).parent().next().children('form').show();$(this).hide();" href="javascript:void(0);">Ответить</a>

                                    <?php Pjax::end();?>



                                    <?php Pjax::begin(['id' => 'newComment'.$model['review_id'],'enablePushState' => false])?>

                                    <? $form = ActiveForm::begin([
                                        'id' => 'comment-form'.$model['review_id'],
                                        'options' => ['class' => 'news_onpage_comments_leave','data' => ['pjax' => true], 'style'=>'display:none'],
                                    ]) ?>

                                    <? echo $form->field($modelComment, 'entity_id', ['template' => '{input}'])->hiddenInput(['value' => $model['review_id']]); ?>

                                    <?= $form->field($modelComment, 'text', [
                                        'template' => '{error}{input}'
                                    ])->widget(CKEditor::className(), ['preset' => 'custom', 'clientOptions' => [
                                        'contentsCss' => '/bluetheme/css/style.css',
                                        'toolbarGroups' => [
                                            ['name' => 'undo'],
                                            ['name' => 'basicstyles', 'groups' => ['basicstyles']],
                                        ]
                                    ],
                                    'options' => [
                                        'rows' => 20,
                                        'id' => "ck_".$model['review_id'],
                                        ],
                                    ]) ?>

                                    <?= Html::submitButton('Оставить комментарий', ['id'=>'leave_feedback_button'])?>

                                    <?php ActiveForm::end() ?>

                                    <?php Pjax::end();?>


                                    <?php
                                        $this->registerJs(
                                            '$("document").ready(function(){
                                                $("#newComment'.$model['review_id'].'").on("pjax:end", function() {
                                                $.pjax.reload({container:"#commentsReviewWrapper'.$model['review_id'].'"});
                                            });
                                        });'
                                        );

                                    ?>
                                </div>
                                    </div>
                            <?php if($counter != ($summElements-1)){ ?><div class="content_left_feedback-item_line"></div> <?php } ?>
                        </div>
              <?php $counter++;
                }

            echo LinkPager711::widget(['maxButtonCount'=>5,'pagination' => $reviewsCompany['pages'],'linkOptions'=>['class'=>'pagination_item'],'nextPageLabel'=>'<p><img src="/bluetheme/img/arrow_right.svg" width="10" height="10"></p>','prevPageLabel'=>'<p><img src="/bluetheme/img/arrow_left.svg" width="10" height="10"></p>','lastPageCssClass'=>'pagination_item','firstPageCssClass'=>'pagination_item','prevPageCssClass'=>'pagination_item pagination_item_left','nextPageCssClass'=>'pagination_item pagination_item_right','pageCssClass'=>'pagination_item']);
        }else{
            echo 'Отзывов нет';
        }
       ?>
    </aside>
    <section class="personalarea_right shadow">
        <p class="personalarea_right_head">Мой профиль</p>
        <div class="personalarea_right_links">
            <p class="personalarea_right_links_item"><?= Yii::$app->user->identity->name?></p>

            <a href="/lk" class="personalarea_right_links_item">Список отзывов</a>
            <a href="/mydata" class="personalarea_right_links_item">Личные данные</a>
            <a href="/register/logout" class="personalarea_right_links_item">Выйти</a>
        </div>
    </section>

</main>
