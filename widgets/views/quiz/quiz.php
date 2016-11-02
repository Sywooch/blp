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
        <div class="btns">
            <span id="tovote" class="results">К голосованию</span>
        
        </div>
    </div>
    <div id="quiz" class="content_right_interview">
        <p class="name">Опрос</p>
        <p class="content_right_interview_title">
            <?= $poll['question'] ?>
        </p>
            <?= Html::beginForm('', 'post', ['class'=>'interview', 'data-pjax'=>''])?>
            <?= Html::hiddenInput('_csrf', Yii::$app->request->getCsrfToken())?>
            <?= Html::hiddenInput('vote_id', $poll['vote_id'])?>
            <?php foreach ($poll['answers'] as $num_answer => $answer): ?>
                <input type="radio" id="var<?= $num_answer ?>" value="<?= $num_answer ?>" name="vote_check"> 
                <label class="round" for="var<?= $num_answer ?>"></label>
                <label class="option" for="var<?= $num_answer ?>">
                    <?= $answer ?>
                </label>
                <br>
            <?php endforeach; ?>
            <div class="btns">
                <?= Html::submitButton('Голосовать')?>   
                <span id="showvote" class="results">Смотреть результаты</span>
            </div>
            <?= Html::endForm()?>
        
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
    #quiz_result{
        display: none;
    }
    
</style>

<script type="text/javascript">
 
    
$('#showvote').click(function(){
    $('#quiz_result').show();
    $('#quiz').hide();
});

$('#tovote').click(function(){
    $('#quiz_result').hide();
    $('#quiz').show();
});

$('#var0').attr('checked', 'checked')

</script>
<script src="/bluetheme/js/jquery.barfiller.js" type="text/javascript"></script>	
                            
