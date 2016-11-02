<?php

use yii\helpers\HtmlPurifier;

$this->title = " » 711.ru - Независимый портал о страховании";
?>
<div id="consultationspeedbar" style="float:left;width:645px;">
    <div style="padding-left: 10px">
        <div class="speedbar">
            <span id="olit-speedbar">
                <a href="/">711.ru</a> » <a href ='/consultations'> Вопросы-ответы</a> » <?= $section['title'] ?>
            </span>
        </div>
    </div>
</div>
<div id = 'consultation-wrap'>

    <div class ='insurance-type'>
        <div class ='insurance-title'>
            <?= $section['title'] ?>
        </div>
        <div class ='insurance-body'>
            <div class ='left-body'>
                <img class ='face' src ='<?= $expert['photo'] ?>' />
            </div>
            <div class ="right-body">
                <div class ='expert'>
                    Сегодня на вопросы отвечает <span><?= $expert['full_name'] ?></span>
                </div>
                <div class ='expert-description'>
                    <?= $expert['position'] ?>
                    <div class ='questions'>
                        <?= $question_sum ?>  вопросов
                    </div>
                </div>
                <div class ="company-name">
                    <?= $expert['company_name'] ?>
                </div>
                <div class ="expert-site">
                    <?= $expert['site_name'] ?>
                </div>
                <div class ="reference">
                    <?= $expert['reference'] ?>
                </div>
                <div class ="expert-link">
                    <span class="know-more">Узнать больше о спикере</span>
                    <span class ="know-less">Свернуть</span>
                </div>
                <input type ="button" value ="Задать вопрос" class ='send-button'/>
                <input type ='hidden' value ='<?= $section['id'] ?>' name ='section' />
                <input type ='hidden' value ='<?= $expert['id'] ?>' name ='expert'/>
            </div>
        </div>
    </div>
    <div class ='your-questions'></div>

    <div class ='questions-list'>

        <?php
        if (isset($questions['questions']) && is_array($questions['questions'])) :
            foreach ($questions['questions'] as $question) :
                ?>

                <div class ='one-question'>
                    <div class ='insurance-body'>

                        <div class ='question-title'>

                            Вопрос:
                            <a href ='/consultations/<?= $section['id'] ?>/<?= $question['id'] ?>' >  
                                &#10042;
                            </a>
                        </div>
                        <div class ="question-body">
                            <div class ='big-text'>
                                <?= $question['question'] ?> 
                            </div>
                            <span class ='insurance-type'>
                                <?= $question['insurance_type_name'] ?>
                            </span>
                            <span class ="answer-date">
                                <?= $question['user_name'] ?> - <?= $question['question_date'] ?> 
                            </span>
                            <div class ='clr'></div>


                        </div>


                    </div>
                    <?php if ($question['new_question'] == 0) : ?>                
                        <div class ='answer-body'>
                            <div class ='title'>
                                Ответ от спикера:
                            </div>
                            <div class ="body">
                                <div class ='big-text'>
                                    <?= $question['answer'] ?>
                                </div>
                            </div>
                            <div class ="answer-date">
                                <?= $expert['full_name'] ?> - <?= $question['answer_date'] ?> 
                            </div>
                            <div class ='clr'></div>
                        </div>
                    <?php endif; ?>
                </div>


                <?
            endforeach;
        endif;
        ?>
    </div>
    <?= \yii\widgets\LinkPager::widget(['pagination' => $questions['pages']]) ?>



</div>

<div style="float:right;width:290px;margin-top:-35px; ">


    <div id="left_block_middle_head">Читайте также</div>
    <div id="left_block_comment_content">
        <? foreach ($another_news_in_cats as $altname => $category): ?>
            <div class="left-news_category">
                <a class="category<?= HtmlPurifier::process($category['color']) ?>  left-news_category-title" href="/news/<?= HtmlPurifier::process($altname) ?>">  
                    <?= HtmlPurifier::process($category['news'][0]['category']) ?>
                </a>
                <div style="clear: both"></div>
                <? foreach ($category['news'] as $another_new): ?>
                    <div class="left-one_new">
                        <div class="left-news_date">
                            <?= HtmlPurifier::process($another_new['date']) ?>            
                        </div>   
                        <div class="left-news_title">
                            <a href="<?= HtmlPurifier::process($another_new['url']) ?>">
                                <?= HtmlPurifier::process($another_new['title']) ?>
                            </a>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        <? endforeach; ?>
    </div>
    <div style="clear:both"></div>

</div>
<input type ='hidden'  class = 'toPost'    name ='_csrf'   value ='<?= Yii::$app->request->getCsrfToken() ?>' />
<input type ='hidden'  class = 'q_name'    name ='q_name'  value ='<?=  $user['full_name'] ?>' />
<input type ='hidden'  class = 'q_email'   name ='q_email' value ='<?= $user['email'] ?>' />
<input type ='hidden'  class = 'user_type' name ='u_type'  value ='<?= $guest ?>' />

<style>
    .label {color: black}
    
</style>