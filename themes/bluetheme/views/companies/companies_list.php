<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\helpers\ImgHelper;

?>
<main class="companiesList">
    <p class="companiesList_title">Список страховых компаний</p>
    <div class="companiesList_alphabet">
        <div class="companiesList_iconSearch">
            <?= Html::beginForm('/companies/index','get')?>
            <?= Html::textInput('search', '', ['class'=>'companiesList_searchField', 'placeholder'=>'Поиск по названию'])?>
            <?= Html::endForm()?>
        </div>
        <div class="mySelectStyle"  id="companiesList_sortBy">
            <?= Html::beginForm('/companies/index','get')?>
            <?= Html::dropDownList('sort', '', ['average'=>'Сортировка по: Средней оценке', 'company_name'=>'Сортировка по: Алфавиту'])?>
            <?= Html::endForm()?>
        </div>
        <div class="companiesList_letterList" id="companiesList_letterList">
            <?=Html::a('a',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'А']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('б',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Б']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('в',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'В']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('г',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Г']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('д',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Д']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('е',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Е']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('ж',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Ж']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('з',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'З']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('и',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'И']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('к',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'К']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('л',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Л']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('м',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'М']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('н',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Н']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('о',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'О']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('п',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'П']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('р',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Р']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('с',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'С']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('т',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Т']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('у',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'У']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('ф',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Ф']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('х',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Х']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('ц',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Ц']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('ч',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Ч']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('ц',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Ц']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('э',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Э']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('ю',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Ю']), ['class' => 'companiesList_letter'])?>
            <?=Html::a('я',Yii::$app->urlManager->createAbsoluteUrl(['/companies/index','search' => 'Я']), ['class' => 'companiesList_letter'])?>
        </div>
    </div>
<div class="companiesList_head clear">
    <div class="companiesList_head_item companiesList_head_name">
        Страховая компания
        <?=$sort->link('company_name')?>
    </div>
    <div class="companiesList_head_item companiesList_head_license">
        Лицензия 
        <?=$sort->link('license_status')?>
    </div>
    <div class="companiesList_head_item companiesList_head_evaluation">
        Средняя оценка 
        <?=$sort->link('average')?>
    </div>
    <div class="companiesList_head_item companiesList_head_feedbackNumber">
        Отзывы
        <?=$sort->link('count')?>
    </div>
</div>
<!-- первая строчка -->

<div class="companiesList_table_line mobile-hidden"></div>
    <section class="companiesList_table">
        
        <?php foreach($models as $model):?>
        <div class="companiesList_table_row clear">
            <div class="companiesList_table_row_bigLetter mobile-show">
                a
            </div>
            <div class="companiesList_table_row_item companiesList_table_row_img">
                <?= Html::img('http://images.711.ru'.Url::toRoute($model['photo']),['style'=>['width'=>'100px', 'height'=>'30px']])
                    //Html::img(ImgHelper::cropImg('http://images.711.ru'.Url::toRoute($model['photo']), 100, 30),['style'=>['width'=>'100px', 'height'=>'30px']])?>

            </div>

            <a href="/companies/<?= $model['user_id'] ?>" class="companiesList_table_row_item companiesList_table_row_name">
                <?=$model['company_name']?>
            </a>

            <div class="companiesList_head_item companiesList_head_license mobile-show companiesList_head_license_mobile">
                <?=$model['license_for_insurance']?>
            </div>
            <div class="companiesList_table_row_item companiesList_table_row_license">
                <?=$model['license_for_insurance']?>
            </div>
            
            <?php if(strpos($model['license_status'], 'Отозвана')===0):?>
            <div class="companiesList_table_row_item companiesList_table_row_status companiesList_table_row_status_stop">
                    <?=$model['license_status']?>
            </div>
            <?php elseif(strpos($model['license_status'], 'Приостановлена')===0):?>
            <div class="companiesList_table_row_item companiesList_table_row_status companiesList_table_row_status_pause">
                   <?=$model['license_status']?>     
            </div>
            <?php else:?>
            <div class="companiesList_table_row_item companiesList_table_row_status companiesList_table_row_status_go">
                <?=$model['license_status']?>
            </div>
            <?php endif;?>

            <div class="companiesList_head_item companiesList_head_evaluation mobile-show companiesList_head_evaluation_mobile">
                Средняя оценка
            </div>

            <div class="stars companiesList_table_row_item companiesList_table_row_stars">
               
                <?php  
                    for($i = 0; $i < round($model['average']); $i++): ?>
                        <img width="16" class="stars-marked star" src="/bluetheme/img/mark.svg">
                    <?php endfor;
                    for($i; $i < 5; $i++): ?>
                        <img width="16" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                    <?php endfor;
                ?> 
                <span class="companiesList_table_row_stars_counter"><?=round($model['average'],1)?></span>
            </div>

            <div class="companiesList_head_item companiesList_head_feedbackNumber mobile-show companiesList_head_feedbackNumber_mobile">
                Отзывы
            </div>

            <div class="companiesList_table_row_item companiesList_table_row_item_feedbackNumber">
                <?=$model['count']?>
            </div>
        </div>
        <div class="companiesList_table_line mobile-hidden"></div>
        <?php endforeach;?>
        
        
       

    </section>
</main>

