<?php
use app\widgets\QuizWidget;
use app\helpers\ImgHelper;
use yii\widgets\Pjax;
use app\widgets\AnothernewsWidget;
?>
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
<main class="content_six clear content_fifth" id="cont6">
    <section class="folder_menu clear">
	    <?php if ($tag == ''): ?>
	            <?php $all = (is_null($active_category) || $active_category == 'index'); ?>
		            <div class="folder_menu_item">
		                <a href="/news/" class="folder_menu_item_link <?= $all ? 'folder_menu_item_link-active' : '' ?>">Все новости</a>
		            </div>
	            <?php
	            foreach ($categories as $category) :
	                $color = $category['color'];
	                $alt_name = $category['alt_name'];
	                $category_name = $category['name'];
	            ?>
		                 <div class="folder_menu_item">
		                   <a href="/news/<?= $alt_name ?>" class="folder_menu_item_link <?= ($alt_name == $active_category) ? 'folder_menu_item_link-active' : '' ?>"><?= $category_name ?></a>
		                </div>
	            <?php endforeach; ?>
	    <?php else: ?>
	    <?php endif; ?>
	</section>
    <section class="content_sec">
        <?php $last_new = array_shift($news); ?>
                 <img src="<?=ImgHelper::cropImg($last_new['image'], 1200, 465)?>" alt="" class="content_sec_image">
                <div onclick="javascript:history.back();" class="closing_cross"></div>
        <div style="z-index: 400" class="content_sec_top" id="content_news_title">
            <a href="<?= $last_new['url'] ?>">
                <p class="content_sec_top_title"> 
                    <?= $last_new['title']?>
                </p>
            </a>
            
            <a href="<?= $last_new['url'] ?>" class="category" id="category"><?= $last_new['category']?></a>
            <span class="date" id="date"><?= date('d.m.Y', strtotime($last_new['date']))?></span>
            <span class="views" id="views"><img src="/bluetheme/img/eye2.png" /><?= $last_new['count']?></span>
        </div>
        <div class="gradient_background"></div>
    </section>
    
    
    <div class="content_right clear">
        <?php $last_new = array_shift($news); ?>
        <div class="content_right_mainnews">
            <img src="<?=ImgHelper::cropImg($last_new['image'], 588, 395)?>" alt="" class="content_right_mainnews_content_image">

            <div class="content_right_mainnews_content">
                <a href="<?= $last_new['url'] ?>">
                    <p class="content_right_mainnews_content_title">
                        <?= $last_new['title']?>
                    </p>
                </a>
                <a href="<?= $last_new['url'] ?>" class="category" id="category"><?= $last_new['category']?></a>
                <span class="date" id="date"><?= date('d.m.Y', strtotime($last_new['date']))?></span>
                <span class="views" id="views"><img src="/bluetheme/img/eye2.png" /><?= $last_new['count']?></span>
            </div>
             <div class="gradient_background"></div>
        </div>
        
        <?php Pjax::begin();?>
            <?=QuizWidget::widget()?>
        <?php Pjax::end();?>
    </div>
    <section class="content-row clear pad-hidden">
        <?= AnothernewsWidget::widget(['news'=>array_slice( $news, 0, 4, true ), 'countNews'=>4]); ?> 
       
    </section>
    <!--<section class="bottom_content clear">
        <div class="content-row_wide">
            <div class="video">
                <a class="video_button">
                    <div class="video_button_triangle"></div>
                </a>
                <iframe width="100%" height="395"src="https://www.youtube.com/embed/A1Qb4zfurA8?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="video-about">
                <a href="">
                    <p class="video-about_title">От чего защищает полис каско?
                        И какие бывают исключения
                    </p>
                </a>
                <p class="video-about_detail">
                    В апреле портал 711 рассказывал о новой инициативе Российскогосоюза автостраховщиков. Суть инициативы сводилась к тому, ...в проблемных регионах, где страховые компании не хотят продавать ОСАГО, создать агента РСА, который бы и продавал полисы ОСАГО.
                </p>
                <div class='info-block'>
                    <a href="" class="category" id="category">Имущество</a>
                    <span class="date" id="date">15.12.2016</span>
                    <span class="views" id="views"><img src="/bluetheme/img/eye1.svg" />416</span>
                    <a href="" class="allvideos">Все видео</a>
                </div>
            </div>
        </div>
    </section>-->
     <section class="content-row clear pad-hidden" id="content_row3">
        
        <?php foreach (array_slice( $news, 4, 3, true ) as $one_new): ?>
        <div class="content_right_news-tile shadow">
            <a href="<?= $one_new['url'] ?>">
                <div class="content_right_news-tile_pict content_right_news-tile_pict_jpg">
                    <img src="<?=ImgHelper::cropImg($one_new['image'], 384, 190)?>" alt="" class="content_right_news-tile_pict_jpg_image">
                </div>
                <div class="content_right_news-tile_title">
                    <p><?=$one_new['title']?>
                    <p>
                </div>

                <div class="content_right_news-tile_text">
                    <p><?=$one_new['short_story']?></p>
                </div>
            </a>
            <div class="dcv">
                <a href="<?= $one_new['url'] ?>" class="category" id="category"><?=$one_new['category']?></a>
                <span class="date" id="date"><?= date('d.m.Y', strtotime($one_new['date']))?></span>
                <span class="views" id="views"><img src="/bluetheme/img/eye1.svg" /><?=$one_new['count']?></span>
            </div>
        </div>
         <?php endforeach; ?>
    </section>
    
    <div class="content_right clear">
        <?php foreach (array_slice( $news, 7, 2, true ) as $one_new): ?>
        <div class="content_right_mainnews">
            <img src="<?=ImgHelper::cropImg($one_new['image'], 588, 395)?>" alt="" class="content_right_mainnews_content_image">

            <div class="content_right_mainnews_content">
                <a href="<?= $one_new['url'] ?>">
                    <p class="content_right_mainnews_content_title"><?=$one_new['title']?>
                    </p>
                </a>
                
                <a href="<?= $one_new['url'] ?>" class="category" id="category"><?=$one_new['category']?></a>
                <span class="date" id="date"><?= date('d.m.Y', strtotime($one_new['date']))?></span>
                <span class="views" id="views"><img src="/bluetheme/img/eye2.png" /><?=$one_new['count']?></span>
            </div>
            <div class="gradient_background"></div>
        </div>
        <?php endforeach; ?>
    </div>
    <section class="content-row clear pad-hidden">
        <?= AnothernewsWidget::widget(['news'=>array_slice( $news, 9, 4, true ), 'countNews'=>4]); ?> 
    </section>
</main>