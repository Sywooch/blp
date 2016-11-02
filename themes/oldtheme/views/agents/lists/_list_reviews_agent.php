<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

    <div class="col-lg-12">
        <hr>
    </div>
    
    <div class="col-lg-12">
        <p><span><b>Прокомментировал:</b> <?=$model->name?></span></p>
        <p><span><b>Тема:</b> <?=$model->title?></span></p>
        <p><span><b>Текст отзыва:</b> <?=$model->comment?></span></p><br>
        <p><span><b>
        <?=html::a("Добавить комментарий()", \yii::$app->urlManager->createAbsoluteUrl([
            '/agents/addrevcomments',
            'review_id' => $model->review_id,
            'agent_id' => $model->agent_id
          
        ]))?>           
                    
                
                </b> </span></p>
    </div>
    
 <div class="col-lg-12">
        <hr>
 </div>  