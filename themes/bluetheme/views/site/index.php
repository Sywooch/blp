<?php
use app\widgets\QuizWidget;
use app\widgets\AnothernewsWidget;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use app\helpers\ImgHelper;
use app\components\ListReviews\ListReviews;
use yii\widgets\Pjax;
//echo '<pre>';print_r($review);echo '</pre>';
?>
<?php
$this->title = $title;
?>
<main class="content clear">

    <section class="clearfix">
        <aside class="content_left clear shadow">
            <div class="content_left_feedback clear">
                <div class="content_left_feedback_title">Отзывы о работе компаний</div>
                <div class="content_left_feedback_all"><a href="<?= Url::to(['/reviews/index']) ?>">Все отзывы</a></div>
            </div>
            <?= ListReviews::widget(['reviews' => $review]) ?>
            <div class="show_more_feedback">
                <a href="" class="show_more_feedback_link">
                Показать еще
                </a>
            </div>
        </aside>
        <aside class="content_right clear">
            <!-- главная новость-->
      
       <?php  $last_new = $news[0]['news'][0]; ?>
            <div class="content_right_mainnews">
                <a href="<?=$last_new['url']?>"><img src="<?=  ImgHelper::cropImg($last_new['image'], 588, 394)?>" alt="" class="content_right_mainnews_content_image">

                <div class="content_right_mainnews_content">
                    
                        <p class="content_right_mainnews_content_title">
                            <?= HtmlPurifier::process($last_new['title']) ?>
                        </p>
                    </a>
                    
                     <a href="/news/<?= HtmlPurifier::process($last_new['category_altname'])?>" class="category" id="category"><?= HtmlPurifier::process($last_new['category'])?></a>
                    <span class="date" id="date"><?= date('d.m.Y', strtotime($last_new['date']))?> </span>
                    <span class="views" id="views"><img src="/bluetheme/img/eye2.png" /><?= HtmlPurifier::process($last_new['count'])?></span>
                </div>
                    <a href="<?=$last_new['url']?>"><div class="gradient_background"></div></a>
            </div>       
            <!-- Маленькие плитки - новости-->
            
            <?php $topNews = array_slice ($news[0]['news'], 1, 1); ?>
                <?= AnothernewsWidget::widget(['news'=>$topNews, 'countNews'=>"banner1x2"]); ?> 
            
            <style>
                .content-row.mainNews .clear_content_right_news-tile{
                    width:48%;
                    margin-right: 23px;
                }
                .content-row .content_right_news-tile_pict_svg_image{
                    width: 120px!important;
                }
            </style>  
            <?php Pjax::begin();?>
                <?=QuizWidget::widget()?>
            <?php Pjax::end();?>
        <div class="content_right_news-list shadow">
                <?php 
                $arrLines = array_slice ($news[0]['news'], 2, 3);
                foreach($arrLines as $newsLines){ ?>
                    <div class="content_right_news-list_item">
                        <a href="<?=$newsLines['url']?>">
                            <p class="title"><?= HtmlPurifier::process($newsLines['title'])?></p>
                        </a>
                        <p class="brief">
                            <?= HtmlPurifier::process($newsLines['short_story'])?>
                        </p>
                        <a href="<?= HtmlPurifier::process($newsLines['category_altname'])?>" class="category" id="category"><?= $newsLines['category']?></a>
                        <span class="date" id="date"><?= date('d.m.Y', strtotime($newsLines['date']))?></span>
                        <span class="views" id="views"><img src="/bluetheme/img/eye1.svg" /><?= HtmlPurifier::process($newsLines['count'])?></span>
                    </div>
                <?php } ?>
            </div>
                <?= AnothernewsWidget::widget(['news'=>array_slice ($news[0]['news'], 5, 2), 'countNews'=>2]); ?> 
                
        </aside>
    </section>
    <section class="content-row clear pad-hidden">        
        <?= AnothernewsWidget::widget(['news'=>array_slice ($news[0]['news'], 7, 4),'countNews'=>4]); ?>         
    </section>
    <section class="content-row clear pad-hidden">        
        <?= AnothernewsWidget::widget(['news'=>array_slice ($news[0]['news'], 11, 4),'countNews'=>4]); ?>         
    </section>
</main>