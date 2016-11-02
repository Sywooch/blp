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
use yii\helpers\Url;
use \app\models\forms;
use \app\models\forms\Login;

AppAsset::register($this);

$login_success = !\Yii::$app->user->isGuest;
Yii::$app->session->set('currentUrl',Url::to(''));
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
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
        <div class="new_header" >

            <div class="fixed-container map-header">
                <div >
                    
                    <div class="logo-block col-md-5">
                        <a href="/" class="" style="text-decoration: none;">
                            <div class="them-logo-text">711</div>
                            <div class="them-logo-text-small">
                                <div>Независимый портал</div>
                                <div>о страховании</div>
                            </div> 
                        </a>
                    </div>
                    <div class="col-md-7">
                        <div class="btns-block them-float-right" style="margin-top:10px;">
                            <div class="btn reviews-btn-block">
                                <a href="/reviews">Отзывы</a>
                            </div>
                            <div class=" btn news-btn-block">
                                <a href="/news">Новости</a>
                            </div>
                            <div class="btn login-btn-block">
                                <?php if ($login_success): ?>
                                    <a id="cabinet_btn" href="/index.php?do=cabinet">ЛК</a>
                                <?php else: ?>
                                    <a id="login_btn" href="#login_form">Войти</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->beginBody() ?>
        <div id="map-wrapper">


            <?= $content ?>        

            <!--Старое модальное окно регистрации-->
            <div class="modal fade" id="login" tabindex="-1">
                <?php
                $form = ActiveForm::begin([
                    'action' => Url::toRoute('/login/ajax'),
//                        'enableAjaxValidation' => true,
//                        'validationUrl' => Url::toRoute('/login/ajax-validation'),
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                ])
                ?>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div class="h4 modal-title" id="login_title">&nbsp;</div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-offset-3 text-danger login-error"></div>
                                <?php
                                $login_model = new Login();
                                echo$form->field($login_model, 'username');
                                echo$form->field($login_model, 'password')->passwordInput(['class' => 'form-control'])
                                ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right "><?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?></div>
                                    <div class="pull-right padding-right-3px margin-right-10"><?= Html::a('Регистрация', Url::toRoute('/register'), ['class' => 'btn btn-default btn-register']) ?></div>
                                    <div class="margin-top-10"><?php echo Html::a('Забыли пароль?', Url::toRoute('/register/remember-password'),['class'=>'padding-right-10']) ?></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <?php ActiveForm::end() ?>
            </div>
        <!--Старое модальное окно регистрации-->
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


