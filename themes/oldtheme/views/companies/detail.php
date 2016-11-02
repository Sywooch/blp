<?php

use yii\helpers\Url;

$this->title = $title;

$this->registerCss(" 

        .company-tabs li {
            border: 1px solid #$color;
        }
        .company-tabs .active {
            background-color: #$color;
        }
        .company-tabs .active a {
            background-color: #$color !important;
        }
         ");
$this->registerCssFile('/css/companies.css');
$this->registerMetaTag(['name' => 'keywords', 'content' => 'страховая компания '.$name.', '.$name.', страховая компания, новости компании '.$name.', отзыв о компании '.$name.', филиалы, правила страхования, адрес, контакты ']);
?>
    <!--Модальное окно оставить отзыв-->
    <div id="cboxOverlay"></div>
    <div class="modalWin">
        <div class="closeButton"></div>
        <img class="modalLogo" src="/images/logoModal.png"><br/><br/>
        <p  align="center" class="modalText">Влияйте на рейтинг страховых компаний</p>
        <hr  class="hrModal2">
        <p align="center" class="modalTextMino">Помогите другим выбрать правильного страховщика. Напишите отзыв о страховой компании</p>
        <div class="modalButtonReview"></div>
    </div>
<?php
$this->registerJsFile('/js/modal.js');
?>

    <!--Модальное окно оставить отзыв-->

<div style="padding-left: 10px">
    <a href="/">711</a> &gt;&gt; <a href="/companies">Страховые компании</a> &gt;&gt; <?= $name ?>
</div>


<div class="clr"></div>

<div class="carousel" style="min-height: 70px;">
    <?php foreach ($images as $image): ?>
        <?php if ($image['carousel']): ?>
            <div class="img-width-100p"><img src="<?= $image['carousel-img'] ?>"></div>
            <?php
        endif;
    endforeach;
    ?>
</div>

<div style="position: relative; background: white; -webkit-box-shadow: 0px 2px 5px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow: 0px 2px 5px 0px rgba(50, 50, 50, 0.75);box-shadow: 0px 2px 5px 0px rgba(50, 50, 50, 0.75);" class="company-logo">
    <div id="logo-helper"></div>
    <img src="<?= $logo ?>" class = 'company-logo-refresh'>
    <?php if ($is_admin): ?>
        <div class = 'change-logo-arr'> &uArr; </div>
        <div class="delete-logo-cross" logo ="<?= $id ?>">&times;</div>
    <?php endif ?>
</div>
<?php if ($is_admin): ?>
    <input type ='hidden' name ='company-id' value ='<?= $id ?>' id ='company-id' />
    <form hidden  id = 'send-image' action="/admin/editcompanyimage" enctype="multipart/form-data" method="post" target = 'frame'>
        <input type ='file' name="uploadfile" class ='imgfile'/>
        <input type ='hidden'  name ='_csrf' class ='toPost' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
        <input type ='submit' name ='sumbit' value ='' />
        <input type ='hidden' name ='company-id' value ='<?= $id ?>' id ='one-expert' />
    </form>
    <iframe hidden src ='/admin/editcompanyimage' name = 'frame' id = 'img-path'></iframe>
<?php endif ?>
<div class="company-info widget-block-white widget-content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 m">
            <?php if(!is_null(Yii::$app->request->get('view')) &&  Yii::$app->request->get('view')=='rules'): ?>
                <h1 class="h1Header">Правила страхования компании <?=$name;?></h1>
            <?php elseif(!is_null(Yii::$app->request->get('view')) &&  Yii::$app->request->get('view')=='reviews'): ?>
                <h1 class="h1Header">Отзывы о работе компании <?=$name;?></h1>
            <?php elseif(!is_null(Yii::$app->request->get('view')) &&  Yii::$app->request->get('view')=='photos'): ?>
                <h1 class="h1Header">Фотографии компании <?=$name;?></h1>
            <?php else: ?>
                <h1 class="h1Header"><?=$name;?></h1>
            <?php endif; ?>


            <ul class="nav nav-tabs company-tabs" id="tabs">
                <li class="<?= ($tab == 'dossier') ? 'active' : '' ?>"><a  href="<?php echo Url::to(["@web/companies/$id"]) ?>">Досье</a></li>
                <li class="<?= ($tab == 'rules') ? 'active' : '' ?>"><a  href="<?php echo Url::to(["@web/companies/$id/rules"]) ?>">Правила страхования</a></li>
                <li class="<?= ($tab == 'reviews') ? 'active' : '' ?>"><a href="<?php echo Url::to(["@web/companies/$id/reviews"]) ?>">Отзывы</a></li>
                <li class="<?= ($tab == 'photos') ? 'active' : '' ?>" id="gallery_btn"><a  href="<?php echo Url::to(["@web/companies/$id/photos"]) ?>">Галерея</a></li>
                <li><a href = '/map/<?= $id ?>' >Филиалы</a></li>
            </ul>

        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="tab-content" style="; margin-top: 20px;">
                <?php echo $view ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


<?php if ($is_admin): ?>
    <script type="text/javascript">

    </script>
<?php endif; ?>
<script type="text/javascript" src="/js/colorpicker/farbtastic/farbtastic.js"></script> 
<link rel="stylesheet" href="/js/colorpicker/farbtastic/farbtastic.css" type="text/css" />



<?php
if ($is_admin) :
    $this->registerJsFile('/js/companies_admin.js');
endif;
$this->registerJsFile('/js/companies.js');
?>
