<?php
use yii\widgets\ListView;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="row">
    <div class="col-lg-2">
         <?php echo $this->render('//layouts/agents/_left_nav_cabinet') ?>
    </div>
    <?=Html::a('Заявки', Url::toRoute(['agents/showorderslk']))?> 
    <?=Html::a('Архив', Url::toRoute(['agents/showorderslk', 'menu'=>'arhive']))?>  
   <div class="col-lg-10"
    <?= ListView::widget([
        'dataProvider' => $provider,
        'layout' => "{pager}{items}{pager}",
        'itemView' => 'lists/_list_orders_agent',
    ]);?>
    </div>
</div>