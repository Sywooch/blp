<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

    <div class="col-lg-12">
        <hr>
    </div>
    
    <div class="col-lg-6">
        <p><span><b>Заявка №:</b> <?=$model->order_id?></span></p>
        <p><span><b>Статус:</b> <?=$model->status?></span></p>
        <p><span><b>Сообщение:</b> <?=$model->user_message?></span></p><br>
        <p><span><b>
                 
        <?php 
        if($model->status == 1):
            echo html::a("Взять в работу", \yii::$app->urlManager->createAbsoluteUrl([
                    '/agents/showorderslk',
                    'accept' => '2',
                    'order_id' => $model->order_id,


            ]));
        elseif($model->status == 2): 
        echo html::a("Отправить в архив", \yii::$app->urlManager->createAbsoluteUrl([
                '/agents/showorderslk',
                'accept' => '3',
                'order_id' => $model->order_id,
                
        ]));
        endif;
        ?>             
                
                </b> </span></p>
    </div>
    
 <div class="col-lg-12">
        <hr>
 </div>  