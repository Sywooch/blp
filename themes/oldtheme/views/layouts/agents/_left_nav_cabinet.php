<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div>
    <?= Html::a('Профиль', Url::toRoute(['/agents/account']) ) ?><br>
    <?= Html::a('Отзывы', Url::toRoute(['/agents/showreviewslk']) ) ?> <br>
    <?= Html::a('Заявки', Url::toRoute(['/agents/showorderslk']) ) ?>
</div>