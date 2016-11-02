<?php
$this->title = "Полезные статьи о страховании: советы, рекомендации, ликбез | 711.ru";
$this->registerMetaTag(['name' => 'description', 'content' => 'Полезные статьи. Что такое страхование? Сколько стоят страховые полисы? Как правильно страховать имущество, жизнь и здоровье. Нюансы страхования.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Полезные статьи, статьи о страховании, материалы по страхованию, всё о страховании, нюансы страхования, страховые лайфхаки']);


$news = array_merge($news, [
    [
        'title' => 'Экспресс-ремонт: лобовое стекло как новое за 30 минут',
        'image' => 'http://qacollision.ca/wp-content/uploads/2013/12/Glass-Repair-and-Install.jpg',
        'short_story' => 'Руководитель дирекции по урегулированию убытков Либерти Страхование Михаил БАРЫШЕВ рассказал 711.ru о том, как страховые компании работают над улучшением сервиса при урегулировании убытков на примере новой опции «Экспресс-ремонт стекол», с недавнего времени доступной клиентам Либерти Страхование.',
        'url' => '/kasko-express-remont-stekol.html',
        'date' => ''
    ], [
        'title' => 'Онлайн-страхование квартиры',
        'image' => 'http://www.images.711.ru/uploads/003_propeerty-online.jpg',
        'short_story' => 'Изменения законодательства последних лет позволило открыть новое направление в развитии страхования: онлайн-страхование. В сферу онлайн в последнее время стремятся многие отрасли, причины очевидны – просто, быстро, удобно.',
        'url' => '/property-online.html',
        'date' => ''
    ], [
        'title' => 'Как сэкономить в кризис на корпоративном ДМС?',
        'image' => 'http://www.images.711.ru/uploads/011_dms-corporate-economy.jpg',
        'short_story' => 'Несмотря на кризисные явления в экономике спрос на корпоративное ДМС растет, правда вместе с ним растут и страховые тарифы. Предотвратить повышение стоимости программ ДМС страховщики не в силах, ведь в его основе  - рост цен на медицинские услуги, препараты и оборудование.',
        'url' => '/dms-corporate-economy.html',
        'date' => ''
    ],
        ]);
?>

<div style="padding-left: 10px">
    <div class="speedbar">
        <span id="olit-speedbar">
            <a href="/">711.ru</a> » <a href="/news/">Новости</a>
            <? if($tag != ''): ?>
            » Новости с тегом: <?= $tag ?>
            <? $this->title = "Новости с тегом: $tag » 711.ru - Независимый портал о страховании"; ?>
            <? endif; ?>
        </span>
    </div>
</div>
<div class="row widget-block-white widget-content">

    <div class="col-md-12">
        <? if($tag == ''): ?>

        <ul class="nav nav-tabs company-tabs m" id="tabs">
            <li style="border-color:gray; <?= (is_null($category) || $category == 'index') ? 'background-color:gray!important;' : '' ?>" class="<?= (is_null($category) || $category == 'index') ? 'active' : '' ?>"><a style="margin-right: 0px; <?= (is_null($category) || $category == 'index') ? 'background-color:gray!important;' : '' ?>" href="/news/">Все новости</a></li>
            <li style="border-color:#3386d3; <?= $category == 'novosti-kompanii' ? 'background-color:#3386d3!important;' : '' ?>" class="<?= $category == 'novosti-kompanii' ? 'active' : '' ?>"><a style="margin-right: 0px; <?= $category == 'novosti-kompanii' ? 'background-color:#3386d3!important;' : '' ?>" href="/news/novosti-kompanii">Новости СК</a></li>
            <li style="border-color:#f95858; <?= $category == 'smi-o-strahovanii' ? 'background-color:#f95858!important;' : '' ?>" class="<?= $category == 'smi-o-strahovanii' ? 'active' : '' ?>"><a style="margin-right: 0px; <?= $category == 'smi-o-strahovanii' ? 'background-color:#f95858!important;' : '' ?>" href="/news/smi-o-strahovanii">СМИ о страховании</a></li>
            <li style="border-color:#c76dc4; <?= $category == 'est-mnenie' ? 'background-color:#c76dc4!important;' : '' ?>" class="<?= $category == 'est-mnenie' ? 'active' : '' ?>"><a style="margin-right: 0px; <?= $category == 'est-mnenie' ? 'background-color:#c76dc4!important;' : '' ?>" href="/news/est-mnenie">Есть мнение</a></li>
            <li style="border-color:#82b440; <?= $category == 'eksklyuziv' ? 'background-color:#82b440!important;' : '' ?>" class="<?= $category == 'eksklyuziv' ? 'active' : '' ?>"><a style="margin-right: 0px; <?= $category == 'eksklyuziv' ? 'background-color:#82b440!important;' : '' ?>" href="/news/eksklyuziv">Эксклюзив</a></li>
            <li style="border-color:#05a39f; <?= $category == 'articles' ? 'background-color:#05a39f!important;' : '' ?>" class="<?= $category == 'articles' ? 'active' : '' ?>"><a style="margin-right: 0px; <?= $category == 'articles' ? 'background-color:#05a39f!important;' : '' ?>" href="/news/articles">Статьи</a></li>
        </ul>
        <div class="clearfix"></div>
        <? else: ?>
        <? endif; ?>

        <h1 class="h1Header3">&nbsp;&nbsp;&nbsp;Статьи о страховании</h1>
        <div id="olit-content" style="margin-bottom: 10px;">
            <?php $last_new = array_shift($news); ?>
            <div class="last_new">
                <div class="last_new_image" style="float: left; height: auto; width: 50%;padding-left: 15px;">
                    <img style="height: auto; width: 100%;" src="<?= $last_new['image'] ?>">
                </div>
                <div class="last_new_text" style="float: right; height: auto; width: 50%; padding-left: 20px; padding-top: 10px;">
                    <div>
                        <a style="text-decoration: none;font-size: xx-large;line-height: 1;" href="<?= isset($last_new['url']) ? $last_new['url'] : '/news/' . $last_new['category_altname'] . '/' . $last_new['id'] . '-' . $last_new['alt_name'] . '.html' ?>"><?= $last_new['title'] ?></a>
                    </div>
                    <div style="margin-top: 15px;">
                        <?= strip_tags($last_new['short_story']) ?>
                    </div>
                    <div style="color: rgb(153, 153, 153);font-style: italic;padding-top: 5px;">
                        <?= $last_new['date'] ?>
                    </div>
                </div>
            </div>
            <?php foreach ($news as $one_new): ?>
                <div class="one_new">
                    <div class="new_photo">
                        <img style="visibility: hidden" onload="with (this) {
                                        if (offsetHeight < offsetWidth)
                                            style.height = '188px';
                                        else
                                            style.width = '282px';
                                        style.visibility = 'visible'
                                    }" src="<?= $one_new['image'] ?>">
                    </div>
                    <div class="news_title">
                        <a href="<?= isset($one_new['url']) ? $one_new['url'] : '/news/' . $one_new['category_altname'] . '/' . $one_new['id'] . '-' . $one_new['alt_name'] . '.html' ?>"><?= $one_new['title'] ?></a>
                    </div>
                    <div class="news_sub_title">
                        <?= strip_tags($one_new['short_story']) ?>
                    </div>
                    <div class="news_date">
                        <?= $one_new['date'] ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <div style="clear:both;text-align:center;"></div>
            <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
        </div>
    </div> 
</div>
<style>
    .nav>li {
        margin-left: 5px;
        margin-right: 5px;
    }
    .nav>li>a {
        padding: 10px 5px;
    }
    .one_new {
        margin-right: 12px;
        margin-left: 15px;
        width: 282px;
        border: none;
        box-shadow: none;
    }
    .last_new {
        width: 100%;
        height: 470px;
    }
    .new_photo {
        width: 282px;
        height: 188px;
        overflow: hidden;
        text-align: center;
    }
    .new_photo img {
        width: auto;
    }
</style>
<script>
    $(document).ready(function() {
        $('.last_new').height(Math.max($('.last_new_image').height(), $('.last_new_text').height()) + 20);
    });
</script>
