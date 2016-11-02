<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-lg-2">
         <?php echo $this->render('//layouts/agents/_left_nav_cabinet') ?>
    </div>
    <div class="col-lg-3">
        <div>                   
            <img width="150px" height="100px" src="<?=$agentdata['photo']?>" > 
            
        </div>
    </div>
    <div class="col-lg-5">
        <div>
            <p><span>ФИО:</span> <?=$agentdata['surname']?> <?=$agentdata['firstname']?> <?=$agentdata['patronymic']?></p><br>
            <p><span>Город:</span> <?=$agentdata['city']?></p><br>
            <p><span>Телефон:</span> <?=$agentdata['phone']?></p><br>
            <p><span>Компания:</span> <?=$agentdata['company']?></p><br>
            <p><span>Тип страхования:</span> <?=$agentdata['ins_type']; ?></p><br>
            <p><span>Пол: </span><?=$agentdata['gender']?></p><br>
            <div><?=Html::a('Изменить личные данные', Url::toRoute(['/agents/updateinfo']));?></div>
        </div>
    </div>
    <div class="col-lg-2">
        <div>
            <p><span>Рейтинг:</span> Нет</p><br>
           
    </div>
</div>

