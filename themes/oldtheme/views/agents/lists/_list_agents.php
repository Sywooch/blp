<?php
use yii\helpers\Html;
?>

    <div class="col-lg-12">
        <hr>
    </div>
    <div class="col-lg-3">
        <div>                   
            <img width="150px" height="100px" src="<?=$model['photo']?>" > 
            
        </div>
    </div>
    <div class="col-lg-6">
        <div>
            <p><span>ФИО:</span>
                <span><?=$model['surname']?></span> 
                <span><?=$model['firstname']?> </span> 
                <span><?=$model['patronymic']?> </span></p><br>
            <p><span>Город:</span><?=$model['city']?></p><br>
            
            <p><span>Специализируется на следующих видах страхования: </span><br>
                    <?=$model['type']?></p><br>
           
        </div>
    </div>
    <div class="col-lg-2">
        <div>
            <p><span>Рейтинг:</span> <?=$model['rating']?></p><br>
        </div>
        
        <div >
              <?php                
                echo Html::a('Оставить отзыв',
                Yii::$app->urlManager->createAbsoluteUrl(
                    [
                        '/agents/addreview',
                        'agent_id' => $model['agent_id'],
                        'firstname' => $model['firstname'],
                        'surname' => $model['surname'],
                        
                    ]
                ));
            ?><br>
            <?php                
                echo Html::a('Сделать заявку',
                Yii::$app->urlManager->createAbsoluteUrl(
                    [
                        '/agents/sendorder',
                        'agent_id' => $model['agent_id'],
                        'firstname' => $model['firstname'],
                        'surname' => $model['surname'],
                        
                    ]
                ));
            ?><br>
        </div>
    </div>
 <div class="col-lg-12">
        <hr>
 </div>  
