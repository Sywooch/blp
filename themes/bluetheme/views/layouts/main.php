<?php
use yii\helpers\Html;
use yii\widgets\Nav;
use app\assets\BlueAsset;
use yii\helpers\Url;
use app\components\MainMenu\MenuItems;
BlueAsset::register($this);
$this->registerJsFile('/bluetheme/js/jquery.js', ['position'=> \yii\web\View::POS_HEAD]);
$this->registerJsFile('/bluetheme/js/jquery.cookie.js', ['position'=> \yii\web\View::POS_HEAD]);

$items = $items = MenuItems::show();
$options = [
    'rootClass' => 'header_menu_item',
    'wrapperClass' => 'shadow1 header_menu_item_links clear header_menu_item_links',
    'itemsClass' => 'header_menu_item_links_item'
];
$optionsFooter = [
    'wrapperClass' => 'item-link',
    'itemsClass' => 'item-link-ref'
];


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->registerLinkTag([
            'rel' => 'shortcut icon',
            'type' => 'image/x-icon',
            'href' => Yii::getAlias("@web/favicon.ico"),
        ]);?>

        <meta charset="<?= Yii::$app->charset ?>">

        <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1">
        <title>711</title>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body>
    <div class="global-wrapper">
        <div id="backlayer"></div>

    <?php $this->beginBody();?>
        <?= $this->render("./common/_header", ['items'=>$items,'options'=>$options]) ?>
        <?=$content ?>
        <div class="leaveTheCommentBlock mobile-hidden">
            <div id="leaveTheCommentBlock_invite">
                <img src="/bluetheme/img/feedback_picture.svg" alt="" width="100" class="leaveTheCommentBlock_invite_img">
                <p class="leaveTheCommentBlock_invite_act">
                    Влияйте на рейтинг страховых компаний!
                </p>
                <div class="leaveTheCommentBlock_invite_carve"></div>
                <p class="leaveTheCommentBlock_invite_help">
                    Помогите другим выбрать правильного страховщика.
                    Напишите отзыв о страховой компании.
                </p>
                <img id="closing_cross_feed" src="/bluetheme/img/closing_cross_gray.svg" alt="">
            </div>
            <a href="/addreview" class="leaveTheCommentBlock_button">
                Оставить отзыв
            </a>
        </div>
        <?= $this->render("./common/_footer", ['items'=>$items,'options'=>$optionsFooter]) ?>
    <?php $this->endBody(); ?>

        <!-- <div class="email-sending"><div class="email-sending-wrapper"><p class="email-sending-title">Новые статьи на почту:</p><form class="email-sending-form"><input type="text" class="email-sending-input" placeholder="Ваш e-mail"><button class="basic-green">Подписаться</button></form></div></div> /email-sending -->
        <!-- Footer -->

        <!-- Footer -->
    </div>
        <!-- /global-wrapper-->
    </body>
</html>
<?php $this->endPage();?>
