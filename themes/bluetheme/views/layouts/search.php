<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use yii\bootstrap\ActiveForm;
use app\widgets\BluesearchWidget;
use app\components\MainMenu\MainMenu;
use app\components\MainMenu\MenuItems;
use yii\helpers\Url;
use \app\models\forms;
use \app\models\forms\Login;

AppAsset::register($this);

$login_success = !\Yii::$app->user->isGuest;
Yii::$app->session->set('currentUrl',Url::to(''));


$items = MenuItems::show();
$options = [
    'rootClass' => 'header_menu_item',
    'wrapperClass' => 'shadow1 header_menu_item_links clear header_menu_item_links',
    'itemsClass' => 'header_menu_item_links_item'
];

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<link href="/bluetheme/css/style.css" rel="stylesheet">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php Html::csrfMetaTags() ?>

        <?php //$module = Yii::app()->getModule('yupe'); ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->registerCssFile('/css/search.css'); ?>
        <?php $this->registerJsFile('/js/jquery-ui/jquery-ui.js'); ?>
        <?php $this->registerJsFile('/js/search/search.js'); ?>
        <?php $this->registerJsFile('/js/modular/modular.js'); ?>

        <link rel="alternate" type="application/rss+xml" title="RSS feed" href="/rss.xml" />
        <link title="711 - Независимый портал о страховании" href="http://711prod/engine/opensearch.php" type="application/opensearchdescription+xml" rel="search">
        <link href="http://711.ru/rss.xml" title="711 - Независимый портал о страховании" type="application/rss+xml" rel="alternate">



        <?php $this->head() ?>
    </head>
    <body>

        <div id="backlayer"></div>
        <header class="main-header" style="position:fixed;width: 100%;z-index: 9999;">
            <div class="main-header--blue" style="background:rgba(77, 129, 239);">
                <div class="main-header-wrapper">
                    <div class="main-header--logo">
                        <img onclick='javascript: document.location.href="/";' style="cursor: pointer" src="/bluetheme/img/white-logo.svg" alt="" class="main-header--logoIcon">
                        <p class="main-header--description">Независимый портал о страховании</p>
                    </div>
                    <div class="main-header--icons">
                        <ul class="top-navigation">
                            <li class="item item-text">
                                <a class="item-link item-link--hover" href="/reviews">Отзывы</a>
                            </li>
                            <li class="item item-text">
                                <a class="item-link item-link--hover" href="/news">Новости</a>
                            </li>
                            <li class="item" id="header_icon_search">
                                <a class="item-link item-link--search item-link--border" href="">
                                    <img src="/bluetheme/img/search.svg" alt="">
                                </a>
                            </li>
                            <li id="top-navigation_item_search">
                                <?= BluesearchWidget::widget()?>
                            </li>
                            <li class="item item_profile_icon">
                                <?php if(\Yii::$app->user->isGuest):?>
                                    <a class="item-link item-link--border" href="/register/register">
                                        <img src="/bluetheme/img/profile.svg" alt="">
                                    </a>
                                <?php else:?>
                                    <a class="item-link item-link--border" href="/lk">
                                        <img src="/bluetheme/img/profile.svg" alt="">
                                    </a>
                                <?php endif;?>
                                </li>
                            <li class="item item_burger" id="item_burger">
                                <a class="item-link">
                                <img src="/bluetheme/img/burger.svg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </header>

        <?php $this->beginBody() ?>

        <div id="map-wrapper">
            <?= $content ?>
        </div>

    <center id="counters" style ='display: none'>
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript"> (function(d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter30738773 = new Ya.Metrika({id: 30738773, clickmap: true, trackLinks: true, accurateTrackBounce: true, webvisor: true});
                    } catch (e) {
                    }
                });
                var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function() {
                    n.parentNode.insertBefore(s, n);
                };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/watch.js";
                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript>
        <div>
            <img src="https://mc.yandex.ru/watch/30738773" style="position:absolute; left:-9999px;" alt="" />
        </div>
        </noscript>
        <!-- Rambler counter -->
        <script id="top100Counter" type="text/javascript" src="http://counter.rambler.ru/top100.jcn?3107394"></script>
        <?php $this->registerJsFile('/bluetheme/js/index.js'); ?>
        <noscript>
        <a href="http://top100.rambler.ru/navi/3107394/">
            <img src="http://counter.rambler.ru/top100.cnt?3107394" alt="Rambler's Top100" border="0" />
        </a>
        </noscript>
        <!-- LiveInternet counter -->
        <script type="text/javascript">
            document.write("<a href='//www.liveinternet.ru/click' " +
                    "target=_blank><img src='//counter.yadro.ru/hit?t45.2;r" +
                    escape(document.referrer) + ((typeof (screen) == "undefined") ? "" :
                    ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                            screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
                    ";" + Math.random() +
                    "' alt='' title='LiveInternet' " +
                    "border='0' width='31' height='31'><\/a>")
        </script>
        <script>
            $(".logo-block").on('click', function() {
                location.assign('/');
            });
           /* $("#button_logout, #login_form_show, #login_btn").click(function(e) {
                e.preventDefault();
                $.fancybox({
                    'href': "#login_form"
                });
            });*/
            $("#button_logout, #login_form_show, #login_btn").click(function(e) {
                e.preventDefault();
                $('#login').modal('show');
            });
            $('body').on('beforeSubmit', '#login-form', function() {
                var form = $(this);
                // return false if form still have some validation errors
                if (form.find('.has-error').length) {
                    return false;
                }
                // submit form

                $.ajax({
                    dataType: 'json',
                    url: form.attr('action'),
                    type: 'post',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.error != '') {
                            form.find('.login-error').html(response.error);
                        }
                        console.log(response);
                        console.log(response.error)
                    }

                });
                return false;
            });
           /* $("#button_check_expertise").click(function(e) {
                e.preventDefault();
                $.fancybox({
                    'href': "#form_check_expertise"
                });
            });*/
            $(".new_header .head, .new_menu .top-block .main-block .menu-item").on('mouseover', function() {
                id = $(this).data('id');
                $(".new_menu .bottom-block .sub-block").hide();
                $(".withsubmenu").removeClass("withsubmenu");
                $(".new_menu .bottom-block .sub-block[data-id=" + id + "]").show();
                $(this).addClass("withsubmenu");
            });
            $(".new_menu").on('mouseleave', function() {
                $(".new_menu .bottom-block .sub-block").hide();
                $(".withsubmenu").removeClass("withsubmenu");
            });
        </script>
    </center>

</div>


</div>
<?php $this->endBody() ?>
<script>
    $(".logo-block").on('click', function() {
        location.assign('/');
    });
   /* $("#button_logout, #login_form_show, #login_btn").click(function(e) {
        e.preventDefault();
        $.fancybox({
            'href': "#login_form"
        });
    });
    $("#button_check_expertise").click(function(e) {
        e.preventDefault();
        $.fancybox({
            'href': "#form_check_expertise"
        });
    });*/
    $(".new_header .head, .new_menu .top-block .main-block .menu-item").on('mouseover', function() {
        id = $(this).data('id');
        $(".new_menu .bottom-block .sub-block").hide();
        $(".withsubmenu").removeClass("withsubmenu");
        $(".new_menu .bottom-block .sub-block[data-id=" + id + "]").show();
        $(this).addClass("withsubmenu");
    });
    $(".new_menu").on('mouseleave', function() {
        $(".new_menu .bottom-block .sub-block").hide();
        $(".withsubmenu").removeClass("withsubmenu");
    });
</script>

</body>
</html>
<?php $this->endPage() ?>
