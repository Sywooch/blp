<?php
use app\helpers\ImgHelper;
use app\components\LinkPager711\LinkPager711;

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
<main class="content_six clear content_fifth">
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
    <section class="news_list">
        <section class="content_sec_right content_fifth_right">
            <a href=" http://raexpert.ru/project/insur_future/2016/conference/"><img src="/images/banners/282x424.gif"></a>
        </section>
       <!-- <section class="content_sec_right content_fifth_right">
            <div class="content_sec_right_getPresent pad-hidden mobile_hidden">
                <img src="/bluetheme/img/present-book_blue.svg" alt="" width="195" height="140">
                <p class="content_sec_right_getPresent_title">
                    Оформи <br>КАСКО и ОСАГО получи 2 500 <span class="rubl">⃏</span> в подарок
                </p>
                <a class="content_sec_right_getPresent_btn" href="">Получить подарок</a>
            </div>
        </section>-->
        <div class="news_list_day">
            <?php $passedDate=0; 
                foreach ($news as $new):
                    if($passedDate!=$new['date']):?>
                        <a class="news_list_day_date" style="margin-top:20px;"><?=$new['date']?></a>
                    <?php endif;
                    if($new['category'] == 'Статьи'):?>
                        <div class="news_list_day_item news_list_day_item_big clear">
                            <div class="news_list_day_item_time"><?= $new['time'] ?></div>
                            <div class="news_list_day_item_picture">
                                <img src="<?=ImgHelper::cropImg($new['image'], 280, 187)?>" alt="">
                            </div>
                            <div class="news_list_day_item_content">
                                <div class="news_list_day_item_content_title">
                                    <a href="<?= $new['url'] ?>">
                                        <?= $new['title'] ?>
                                    </a>
                                </div>
                                <div class="news_list_day_item_content_brief">
                                    <?= $new['descr'] ?>
                                </div>
                                <div class="category_date_views">
                                    <a href="" class="category" id="category"><?= $new['category'] ?></a>
                                    <span class="date" id="date"><?=$new['date']?></span>
                                    <span class="views" id="views"><img src="/bluetheme/img/eye1.svg" /><?= $new['count'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php continue; endif; ?>
                    <div class="news_list_day_item clear">
                        <div class="news_list_day_item_time"><?= $new['time'] ?></div>
                        <div class="news_list_day_item_picture">
                            
                            <img src="<?=ImgHelper::cropImg($new['image'], 155, 110)?>" alt="Нет изображения">
                        </div>
                        <div class="news_list_day_item_content">
                            <div class="news_list_day_item_content_title"><a href="<?= $new['url'] ?>"><?= $new['title'] ?></a></div>
                            <div class="news_list_day_item_content_brief">
                                <?= $new['descr'] ?>
                            </div>
                            <div class="category_date_views">
                                <a href="" class="category" id="category"><?= $new['category'] ?></a>
                                <span class="date" id="date"><?= $new['date'] ?></span>
                                <span class="views" id="views"><img src="/bluetheme/img/eye1.svg"><?= $new['count'] ?></span>
                            </div>
                        </div>
                    </div>
                    <?php $passedDate = $new['date']; ?>
                <?php endforeach;?>
        </div>
    </section>
	<?= LinkPager711::widget(['maxButtonCount'=>5,'pagination' => $pages,
            'linkOptions'=>['class'=>'pagination_item'],
                'nextPageLabel'=>'<p><img src="/bluetheme/img/arrow_right.svg" width="10" height="10"></p>',
                    'prevPageLabel'=>'<p><img src="/bluetheme/img/arrow_left.svg" width="10" height="10"></p>',
                        'lastPageCssClass'=>'pagination_item','firstPageCssClass'=>'pagination_item',
                            'prevPageCssClass'=>'pagination_item pagination_item_left',
                                'nextPageCssClass'=>'pagination_item pagination_item_right','pageCssClass'=>'pagination_item']) ?>
</main>