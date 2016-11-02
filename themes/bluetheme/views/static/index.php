<?php
use app\components\SocialShare\SocialShare;
use yii\helpers\HtmlPurifier;
use app\widgets\AnothernewsWidget;
use app\helpers\ImgHelper;

$this->title = HtmlPurifier::process($descr)." » 711.ru - Независимый портал о страховании";

?>
<main class="content_fourth clear">
    <div class="content_fourth_block">
        <section class="content_sec">
            <img src="<?= ImgHelper::cropImg($mainimage, 1200, 465) ?>" alt="" class="content_sec_image">
            <div onclick="javascript:history.back();" class="closing_cross"></div>
            <div style="z-index: 500" class="content_sec_top" id="content_news_title">
                <a href="">
                    <h1><?= HtmlPurifier::process($descr) ?></h1>
                </a>
                <a href="" class="category" id="category"><?= HtmlPurifier::process($type) ?></a>
                <span class="date" id="date"><?= HtmlPurifier::process($date) ?></span>
                <span class="views" id="views"><img src="/bluetheme/img/eye2.png"><?= HtmlPurifier::process($views) ?></span>
            </div>
            <div class="gradient_background"></div>
        </section>


        <?php
            if ((isset($pages[0]['type'])) &&
                    (($pages[0]['type'] == 1 ) ||
                    ($pages[0]['type'] == 2 ))):

            switch ($pages[0]['type']):
                case 1:
                echo '<section class="widjets">';
                echo '<div>';
                    echo '<script src="//f.sravni.ru/f/apps/build/widgets/sravni-widgets.js"></script>';
                    echo '<sravni-micro-widget size=300 type="osago" logo="true" partner="711.ru"></sravni-micro-widget>';
                echo '</div>';
                echo '</section>';
                break;
            case 2:
            echo '<section class="widjets">';
            echo '<div>';
                    echo '<script src="//f.sravni.ru/f/apps/build/widgets/sravni-widgets.js"></script>';
                    echo '<sravni-micro-widget size=300  type="kasko" logo="true" partner="711.ru"></sravni-micro-widget>';
                break;
            endswitch;
            echo '</div>';
            echo '</section>';
            endif;
        ?>

    <section class="content_policy clearfix" id="news_static_page" style="margin-bottom: 30px;">
        <div class="content_policy_titles_about">
            <?= str_replace("\\\"", "\"", $template) ?>

        </div>
    </section>
    <section class="content_fourth_right_list" id="content_fourth_right_list">
        <?php if (!empty($pages) && count($pages)>0){
            foreach($pages as $numb=>$link) { ?>
                <a href="/<?= HtmlPurifier::process($link['name']) ?>.html" class="content_fourth_right_list_link">
                    <span class="content_fourth_right_list__link_number"><?=$numb+1 ?></span>
                    <span class="content_fourth_right_list__link_item"><?= HtmlPurifier::process($link['descr']) ?></span>
                </a>
        <?php }
        } ?>
    </section>
    <section class="content_sec_bottom mobile-hidden clearfix clearfixup">
            <?= AnothernewsWidget::widget(['news'=>$news, 'countNews'=>4]) ?>
    </div>
    </div>
</main>

<script type="text/javascript">
/*window.onscroll = function() {
    var scrolled = window.pageYOffset || document.documentElement.scrollTop;
    var myWidth = document.documentElement.clientWidth;
    var companiesList_letterList = document.querySelector('#content_fourth_right_list');
    console.log(scrolled);
    if(scrolled < 600){
        companiesList_letterList.classList.remove('content_fourth_right_list_fixed');
        companiesList_letterList.classList.remove('content_fourth_right_list_absolute');
    }
    else if(scrolled > 600 && scrolled < 2800){
        companiesList_letterList.classList.add('content_fourth_right_list_fixed');
        companiesList_letterList.classList.remove('content_fourth_right_list_absolute');
    }
    else if(scrolled > 2800){
        companiesList_letterList.classList.remove('content_fourth_right_list_fixed');
        companiesList_letterList.classList.add('content_fourth_right_list_absolute');
    }
}*/
var elementTable = document.getElementsByTagName('table')[0];
var elementHr = document.getElementsByTagName('hr')[0];
if(elementTable.classList.length == 0){
    elementTable.style.display = 'none';
}
elementHr.style.display = 'none';
</script>
