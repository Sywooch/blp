<?php
use yii\helpers\HtmlPurifier;
use app\helpers\ImgHelper;
?>
<div class="clear pad-hidden">
    <div class="content_right_news-tile">
        <a href="<?=$news[0]['url']?>" class="news_title_n_first">
            <div class="content_right_news-tile_pict content_right_news-tile_pict_jpg">
                <img class="content_right_news-tile_pict_svg_image" src="<?=  ImgHelper::cropImg($news[0]['image'], 281, 190)?>" alt="Нет картинки">

            </div>
            <div class="content_right_news-tile_title">
                <p>
                    <?= HtmlPurifier::process($news[0]['title'])?>
                </p><p>
            </p></div>

            <div class="content_right_news-tile_text">
                <p><?= HtmlPurifier::process($news[0]['short_story'])?></p>
            </div>
        </a>
        <div class="dcv">
            <a href="/news/<?= HtmlPurifier::process($news[0]['category_altname'])?>" class="category" id="category"><?= HtmlPurifier::process($news[0]['category'])?></a>
            <span style='margin-right: 7px;' class="date" id="date"><?=$news[0]['date']?></span>
            <span class="views" id="views"><img src="/bluetheme/img/eye1.svg"><?=$news[0]['count']?></span>
        </div>
    </div>
    <div class="content_right_news-tile content_right_news-tile_right">
        <a href="<?=$news[1]['url']?>" class="news_title_n_first">
            <div class="content_right_news-tile_pict content_right_news-tile_pict_jpg">
                <img src="<?=  ImgHelper::cropImg($news[1]['image'], 281, 190)?>" alt="" class="content_right_news-tile_pict_jpg_image">
            </div>
            <div class="content_right_news-tile_title">
                <p>
                   <?= HtmlPurifier::process($news[1]['title'])?>
                </p><p>
            </p></div>
            <div class="content_right_news-tile_text">
                <p><?= HtmlPurifier::process($news[1]['short_story'])?></p>
            </div>
        </a>
        <div class="dcv">
            <a href="/news/<?= HtmlPurifier::process($news[1]['category_altname'])?>" class="category" id="category"><?= HtmlPurifier::process($news[1]['category'])?></a>
            <span style='margin-right: 7px;' class="date" id="date"><?=$news[1]['date']?></span>
            <span class="views" id="views"><img src="/bluetheme/img/eye1.svg"><?=$news[1]['count']?></span>
        </div>
    </div>
</div>