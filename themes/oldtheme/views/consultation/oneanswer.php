<?php

use yii\helpers\HtmlPurifier;

$this->title = " » 711.ru - Независимый портал о страховании";
?>
<div id="consultationspeedbar" style="float:left;width:645px;">
    <div style="padding-left: 10px">
        <div class="speedbar">
            <span id="olit-speedbar">
                <a href="/">711.ru</a> » <a href ='/consultations'>Вопросы-ответы</a> » <a href ='/consultations/<?= $section['id'] ?>'><?=  $section['title'] ?></a> »  Вопрос<?= $question['id'] ?>
            </span>
        </div>
    </div>
</div>
<div class ="empty-space"></div>
<div id = 'consultation-wrap'>
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
                    <?= \yii::$app->params['staticTypes'][$question['insurance_type']] ?>
                </span>
                <span class ="answer-date">
                    <?= $user_name ?> - <?= $question['question_date'] ?> 
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
    <div style="height: 20px"></div>
   

</div>

