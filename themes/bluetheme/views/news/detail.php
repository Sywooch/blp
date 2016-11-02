<?php
use yii\helpers\HtmlPurifier;
use app\components\SocialShare\SocialShare;
use yii\helpers\Url;
use app\helpers\ImgHelper;
use app\widgets\AnothernewsWidget;

$this->title = $new['title'] . " » 711.ru - Независимый портал о страховании";
$this->registerMetaTag(['name' => 'og:title', 'content' => $new['title'] . ' | 711.ru']);
$this->registerMetaTag(['name' => 'og:type', 'content' => 'website']);
$this->registerMetaTag(['name' => 'og:description', 'content' => $new['short_story']]);
$this->registerMetaTag(['name' => 'og:url', 'content' => Url::toRoute(Url::current([]),true)]);
$this->registerMetaTag(['name' => 'og:image', 'content' => $new['photo']]);
?>

<main class="content main_content_sec clear">
    <div class='content_policy_titles_about breadcrumbs' style='margin-bottom: 5px'>
        <a href="/">711.ru</a>
        <span class="quotes">»</span>
        <a href="/news/">Новости</a>
        <span class="quotes">»</span>
        <a href="/news/<?= HtmlPurifier::process($new['category_altname']) ?>"><?= HtmlPurifier::process($new['category_name']) ?></a>
        <span class="quotes">»</span>
        <?= HtmlPurifier::process($new['title']) ?>
    </div>
    <section class="content_sec">
        <?php if (trim($new['image']) != '') { ?>

        <img src="<?= ImgHelper::cropImg($new['image'], 1200, 465) ?>" alt="" class="content_sec_image">
        <?php } ?>
        <div onclick="javascript:history.back();" class="closing_cross"></div>
        <div style='z-index: 500'class="content_sec_top" id="content_news_title">
            <a>
                <h1><?= HtmlPurifier::process($new['title']) ?></h1>
            </a>
            <a href="" class="category" id="category"><?= HtmlPurifier::process($new['category_name']) ?></a>
            <span class="date" id="date"><?= HtmlPurifier::process($new['date']) ?></span>
            <span class="views" id="views"><img src="/bluetheme/img/eye2.png" /><?= HtmlPurifier::process($new['count']) ?></span>
        </div>
        <div class="gradient_background"></div>
    </section>
    <section class="content_policy clearfix" id="content_news_whole">
        <div class="content_policy_titles_about">
            <?= HtmlPurifier::process($new['full_story']) ?>
        </div>
    </section>
    <section class="content_sec_right">
     <div id="unit_87523"><a href="http://net.finam.ru/">Новости net.finam.ru</a></div>
<!-- Новости партнеров -->
        <script type="text/javascript" charset="utf-8">

        (function() {

        var sc = document.createElement('script'); sc.type = 'text/javascript'; sc.async = true;

        sc.src = '//news.net.finam.ru/data/js/87523.js'; sc.charset = 'utf-8';

        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sc, s);

        }());

        </script>
<!-- Новости партнеров конец-->
    </section>
    <!--<section class="content_sec_right">
        <div class="content_sec_right_getPresent">
            <img src="/bluetheme/img/present-book.svg" alt="" width="195" height="140">
            <p class="content_sec_right_getPresent_title">
                Оформи <br>КАСКО и ОСАГО получи 2 500 <span class="rubl">&#8399;</span> в подарок
            </p>
            <a class="content_sec_right_getPresent_btn" href="">Получить подарок</a>
        </div>
        <div class="content_sec_right_ourWork">
            <a class="content_sec_right_ourWork_title">Оказываем юридические консультации</a>
        </div>
    </section>-->

    <section class="social_share_in_news">
        <div class="tags clearfix">
            <div class="tag_one tags_title">Теги:</div>
            <?php foreach($new['tags'] as $k=>$v):?>
            <a href="<?=$v?>" class="tag_one"><?=$k?></a>
            <?php endforeach;?>
        </div>
        <?= SocialShare::widget(['title'=>$new["title"], 'link'=> Url::toRoute(Url::current([]),true) ]) ?>

    </section>

   	<section class="content_sec_bottom clearfix clearfixup">
         <div id="unit_87524"><a href="http://net.finam.ru/">Новости net.finam.ru</a></div>
<!-- Новости партнеров -->
        <script type="text/javascript" charset="utf-8">
            (function() {
            var sc = document.createElement('script'); sc.type = 'text/javascript'; sc.async = true;
            sc.src = '//news.net.finam.ru/data/js/87524.js'; sc.charset = 'utf-8';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sc, s);
            }());
        </script>
<!-- Новости партнеров конец-->
        <p class="content_sec_bottom_title">Другие материалы по теме</p>
        <?php
            //print_r($new['category_altname']);
            //echo '<pre>';print_r($another_news_in_cats); echo '</pre>';
        ?>


        <?= AnothernewsWidget::widget(['news'=>$last_news, 'countNews'=>4]) ?>

    </section>
</main>
