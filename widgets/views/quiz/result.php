<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
$this->registerCssFile('/bluetheme/css/progress.css'); 
?>

    <div id="quiz_result" class="content_right_interview">
        <p class="name">Результаты опроса</p>
        <p class="content_right_interview_title">
            <?= $poll['question'] ?>
        </p>
        <?php foreach ($poll['results'] as $result): ?>
            <div style="padding-bottom: 10px; color: white">
                <?= $poll['answers'][$result['answer']] ?>. - <?= $result['ans_count'] ?> (<?= $result['percent'] ?>%)
            </div> 
            <div id="bar1" class="barfiller">
                <span class="fill" data-percentage="50" style="width:<?= $result['percent'] ?>%; background:orange"></span>
            </div>
        <?php endforeach;?>
    </div>
    


<style type='text/css'>
    .results{
        display: inline-block;
        text-align: center;
        font-size: 14px;
        color: #f2f5f7;
        line-height: 40px;
        width: 199px;
        border-radius: 25px;
        border-color: #42d69d;
        border-style: solid;
        border-width: 1px;
    }
    .results:hover{
        display: inline-block;
        text-align: center;
        font-size: 14px;
        color: #f2f5f7;
        background-color: #42d69d;
        line-height: 40px;
        width: 199px;
        border-radius: 25px;
        border-color: #42d69d;
        border-style: solid;
        border-width: 1px;
    }
    
    
</style>