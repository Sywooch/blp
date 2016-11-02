<?php

if(!is_null(Yii::$app->request->get('cat')) && Yii::$app->request->get('cat')=='novosti-kompanii') {
    $this->title = "Новости и пресс-релизы страховых компаний | 711.ru";
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'Новости, страховые новости, новости страхования, страховые компании, страховая компания']);
    $this->registerMetaTag(['name' => 'description', 'content' => 'Новости и пресс-релизы страховых компаний.']);
    $newHeader = '<h1 class="h1Header3">Новости и пресс-релизы компании</h1>';
}elseif(!is_null(Yii::$app->request->get('cat')) && Yii::$app->request->get('cat')=='smi-o-strahovanii') {
    $this->title = "СМИ о страховании — новости, статьи, публикации | 711.ru";
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'страховые сми, сми о страховании, новости, страховые новости, новости страхования, страховые компании, страховая компания']);
    $this->registerMetaTag(['name' => 'description', 'content' => 'Публикации в центральных СМИ по теме страхования. Статьи, интервью, рецензии.']);
    $newHeader = '<h1 class="h1Header3">СМИ о страховании — новости, статьи, публикации</h1>';
}elseif(!is_null(Yii::$app->request->get('cat')) && Yii::$app->request->get('cat')=='banks') {
    $this->title = "Банковские новости — кредиты, депозиты, вклады, события, мнения | 711.ru";
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'Банк, банки, банковские новости, новости банков, кредит, потребительский кредит, ипотека, вклад, депозит, залог, ставка, процентная ставка, ставка по кредиту']);
    $this->registerMetaTag(['name' => 'description', 'content' => 'Новости банковского сектора о кредитах, ипотеке, вкладах и участниках рынка.']);
    $newHeader = '<h1 class="h1Header3">Банковские новости — кредиты, депозиты, вклады, события, мнения</h1>';
}elseif(!is_null(Yii::$app->request->get('cat')) && Yii::$app->request->get('cat')=='economics') {
    $this->title = "Новости экономики — рынки, компании, тренды, события | 711.ru";
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'экономика, новости экономики, экономические новости, рыночные тенденции, курсы валют, центробанк, котировки, биржа, акции']);
    $this->registerMetaTag(['name' => 'description', 'content' => 'Новости экономики — рынки, события, мнения, участники']);
    $newHeader = '<h1 class="h1Header3">Новости экономики — рынки, компании, тренды, события</h1>';
}elseif(!is_null(Yii::$app->request->get('cat')) && Yii::$app->request->get('cat')=='est-mnenie') {
    $this->title = "Мнение участников страхового рынка о страховании в России | 711.ru";
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'мнение, мнение о страховании, новости, страховые новости, новости страхования, страховые компании, страховая компания']);
    $this->registerMetaTag(['name' => 'description', 'content' => 'Мнение участников рынка о том, как развивается страхование в России.']);
    $newHeader = '<h1 class="h1Header3">Мнение участников страхового рынка о страховании в России</h1>';
}elseif(!is_null(Yii::$app->request->get('cat')) && Yii::$app->request->get('cat')=='eksklyuziv') {
    $this->title = "Эксклюзивные публикации о страховании: события, люди, мнения | 711.ru";
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'эксклюзив, эксклюзив на 711, новости, страховые новости, новости страхования, страховые компании, страховая компания']);
    $this->registerMetaTag(['name' => 'description', 'content' => 'Эксклюзивные материалы портала 711.ru о страховании.']);
    $newHeader = '<h1 class="h1Header3">Эксклюзивные публикации о страховании: события, люди, мнения</h1>';
}else {
    $this->title = "Новости страхования | 711.ru";
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'Новости, страховые новости, новости страхования, новости компаний, новости рынка, события, участники рынка, ОСАГО, каско']);
    $this->registerMetaTag(['name' => 'description', 'content' => 'Актуальные новости страхования в России. Новости компаний. События, мнения, репортажи, интерьвю, статьи.']);
    $newHeader =  '<h1 class="h1Header3">Новости страхования</h1>';
}
?>

<div class="row">
    <div class="col-md-12 nopadding them-content">
        <div id="newsspeedbar">
            <div class="speedbar">
                <span id="olit-speedbar">
                    <a href="/">711.ru</a> » <a href="/news/">Новости</a>
                    <?php if ($tag != ''): ?>
                        » Новости с тегом: <?= $tag ?>
                        <?php $this->title = "Новости с тегом: $tag » 711.ru - Независимый портал о страховании"; ?>
                    <?php endif; ?>
                </span>
            </div>
        </div>
        <div class="categories-block">
            <?php if ($tag == ''): ?>
                <ul class="them-tabs no-margin" id="tabs">
                    <?php $all = (is_null($active_category) || $active_category == 'index'); ?>
                    <li style="<?= $all ? 'background-color:gray!important;' : '' ?>" class="<?= $all ? 'active' : '' ?>">
                        <a style="<?= $all ? 'background-color:gray!important;' : '' ?>" href="/news/">
                            Все новости
                        </a>
                    </li>
                    <?php
                    foreach ($categories as $category) :
                        $color = $category['color'];
                        $alt_name = $category['alt_name'];
                        $category_name = $category['name'];
                        ?>
                        <li class="<?= ($alt_name == $active_category) ? 'active' : '' ?>" style="border-color: <?= $category['color'] ?>;<?= ($alt_name == $active_category) ? "background-color:$color;" : '' ?>">
                            <a style="<?= $category == $active_category ? "background-color:$color;" : '' ?>" href="/news/<?= $alt_name ?>"><?= $category_name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
            <?php endif; ?>
        </div>
        <div class="clearfix"></div>
        <?php echo $newHeader; ?><br/>
  
        <?php foreach ($news as $new): ?>
       
            <div class="news">
                <div class="them-news-logo" >
                    <img style="width: 170px; height: 170px; object-fit: cover;" src="<?= $new['image'] ?>">
                </div>
                <div style="margin-right:300px">
                    <div class="them-float-left"><?= $new['date'] ?>
                        <i style="margin-left: 10px;" class="fa fa-eye"></i>
                            <?=$new['count']?> 
                    </div>
                    <a class="category_small"href="/news/<?= $new['category_altname'] ?>" style="background-color:<?= $new['category_color'] ?>"><?= $new['category_name'] ?></a>
                    <div class="name_news_all">
                        <a href="/news/<?= $new['category_altname'] ?>/<?= $new['id'] ?>-<?= $new['alt_name'] ?>.html"><?= $new['title'] ?></a>
                        <div>            
                            <div style="display:inline;">
                                <?= $new['descr'] ?>
                            </div>
                            <a id="shortnewsarray" href="/news/<?= $new['category_altname'] ?>/<?= $new['id'] ?>-<?= $new['alt_name'] ?>.html">→</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
        <?php endforeach; ?>

        <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
    </div>
   <!--  <div class="col-md-4 nopadding">

       <div id="left_block_middle_head">КОММЕНТАРИИ</div>
        <div id="left_block_comment_content">
            <?php foreach ($lastComments as $comment): ?>
                <div style="border-bottom:1px dashed black;font-size:12px; margin-bottom: 12px;">
                    <div style="padding:5px;">
                        <div style="color:#999999;font-style: italic;">
                            <?= $comment['date'] ?>
                        </div>
                        <div id="user_left_block">
                            <a class="underline" href="mailto:"><?= $comment['name'] ?></a>
                        </div>
                        <div id="comment_left_block">
                            <?= $comment['text'] ?>
                            <a href="<?= $comment['url'] ?>">→</a>
                        </div>
                        <div style="padding-top:4px;text-align:justify;">
                            К новости: 
                            <br>
                            <a href="<?= $comment['url'] ?>" style="text-align: left">
                                <?= $comment['new_title'] ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>-->

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
    .modalButtonReviewAlt {
        background-image: url("/images/sendHover.png");
        height: 47px;
        margin-left: 81px;
        position: absolute;
        width: 195px;
        cursor: pointer;
        margin-top: -15.5%;
        right: 9%;
    }
</style>
<script>
    $(document).ready(function() {
        $('.them-tabs').on('mouseover', 'li', function() {
            if ($(this).hasClass('active'))
                return;
            var color = $(this).css('border-color');
            $(this).css('background-color', color);
            $(this).children('a').css('color', 'white').css('background-color', color).css('border-color', color);
        });
        $('.them-tabs').on('mouseout', 'li', function() {
            if ($(this).hasClass('active'))
                return;
            $(this).css('background-color', 'white');
            $(this).children('a').css('color', 'black').css('background-color', 'white').css('border-color', 'white');
        });
    });
</script>
