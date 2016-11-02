<?php 
use yii\helpers\HtmlPurifier;
use app\helpers\ImgHelper;

foreach($allnews as $news):?>
    <div class="content_right_news-tile">
        <a href="<?= HtmlPurifier::process($news['url'])?>" class="news_title_n_first">
            <div class="content_right_news-tile_pict content_right_news-tile_pict_jpg">
                <img src="<?=  ImgHelper::cropImg($news['image'], 281, 190)?>" alt="" class="content_right_news-tile_pict_jpg_image">
            </div>
            <div class="content_right_news-tile_title">
                <p><?= HtmlPurifier::process($news['title'])?>
                </p><p>
            </p></div>
            <div class="content_right_news-tile_text">
                <p><?= HtmlPurifier::process($news['short_story'])?></p>
            </div>
        </a>
        <div class="dcv">
            <a href="/news/<?= HtmlPurifier::process($news['category_altname'])?>" class="category" id="category"><?= HtmlPurifier::process($news['category'])?></a>
            <span style="margin-right: 7px" class="date" id="date"><?= HtmlPurifier::process($news['date'])?></span>
            <span class="views" id="views"><img src="/bluetheme/img/eye1.svg"><?= $news['count']?></span>
        </div>
    </div>
<?php endforeach;?>