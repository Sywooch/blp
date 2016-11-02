<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
?>
    
<?= Html::beginForm("/addreview/addreview", "post")?>
    <?= Html::activeInput('text', $model, 'search', ['type'=>'search', 'placeholder'=>'Поиск по сайту'])?>
<?= Html::endForm()?>

<!-- Результаты поиска -->
   
<?php if($dataProvider):?>
    
        <?php foreach ($dataProvider->getModels() as $k => $v):?>
            <div class="news_list_day_item clear">
                <div class="news_list_search_result clear">
                    <div class="news_list_day_item_picture">
                        <img src=src='<?=$v['photo']?>' alt="">
                    </div>
                    <div class="news_list_day_item_content">
                        <div class="news_list_day_item_content_title"><?= mb_substr($v['name'], 0,50,'utf8')?></div>
                        <div class="news_list_day_item_content_brief">
                            <?=mb_substr($v['descr'],0,100,'utf8')?> ...
                        </div>
                        <div class="category_date_views">
                            <a href="" class="category" id="category">Имущество</a>
                            <span class="date" id="date">15.12.2016</span>
                            <span class="views" id="views"><img src="/bluetheme/img/eye1.svg">416</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <div class="searchResults_more">
            <?=Html::a('Показать еще результаты: <span class="searchResults_more_counter">154</span>', Url::toRoute(['/search', 'req' => $model->search]), ['class'=>'searchResults_more_link']);?>
            
        </div>
    </div>
<?php endif;?>