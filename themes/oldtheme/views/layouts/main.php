<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\widgets\SearchWidget;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use \app\models\forms;

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
        <meta name="google-site-verification" content="vk78N2BBhh8ZBn66Pfw5JiCNqJfUtDuKe5da9MsqReY" />

        <?php echo Html::csrfMetaTags() ?>

        <?php //$module = Yii::app()->getModule('yupe');  ?>
        
        <title><?= Html::encode($this->title) ?></title>

<!--        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="/js/jquery-ui/jquery-ui.js"></script>-->
        <?php //$this->registerJsFile('/js/jquery-ui/jquery-ui.js'); ?>
        <?php $this->registerJsFile('/js/modular/modular.js'); ?>
        <?php $this->registerJsFile('/js/modular/adminPage.js'); ?>
        <?php $this->registerJsFile('/js/modular/mainPage.js'); ?>
        <?php $this->registerJsFile('/js/modular/consultationPages.js'); ?>
        <?php $this->registerJsFile('/js/globalVar.js'); ?>
        <?php $this->registerJsFile('/js/jquery.cookie.js'); ?> 
        <?php $this->registerJsFile('/js/stellar.js'); ?>
        <?php $this->registerJsFile('/js/modal.js'); ?>
        
        <!-- Баннер согласие начало -->  
        <script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script>   
        <script src="/js/bannersoglasie/1170x100_SK_Soglasie.js"></script>            
        
        <script>
                var canvas, stage, exportRoot;
                function init() {
                        // --- write your JS code here ---

                        canvas = document.getElementById("canvas");
                        images = images||{};

                        var loader = new createjs.LoadQueue(false);
                        loader.addEventListener("fileload", handleFileLoad);
                        loader.addEventListener("complete", handleComplete);
                        loader.loadManifest(lib.properties.manifest);
                }

                function handleFileLoad(evt) {
                        if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
                }

                function handleComplete(evt) {
                        exportRoot = new lib._1170x100_SK_Soglasie();

                        stage = new createjs.Stage(canvas);
                        stage.addChild(exportRoot);
                        stage.update();
                        stage.enableMouseOver();

                        createjs.Ticker.setFPS(lib.properties.fps);
                        createjs.Ticker.addEventListener("tick", stage);
                }

        </script>
        <!-- Баннер согласие конец -->


        <link rel="alternate" type="application/rss+xml" title="RSS feed" href="/rss.xml" />
        <link title="711 - Независимый портал о страховании" href="http://711prod/engine/opensearch.php" type="application/opensearchdescription+xml" rel="search">
        <link href="http://711.ru/rss.xml" title="711 - Независимый портал о страховании" type="application/rss+xml" rel="alternate">
        <?php $this->head() ?>
    </head>
     <body onload="init();" style="background-color:#D4D4D4;margin:0px;"> 
        <div class="main-header">
            <div class="container main-block">
                <div class="row">
                    <div class="logo-block col-md-5">
                        <h1 class="topLogo"><a href="/" class="" style="text-decoration: none;">
                            <div class="them-logo-text">711</div>
                            <div class="them-logo-text-small">
                                <div>Независимый портал</div>
                                <div>о страховании</div>
                            </div>
                        </a></h1>
                    </div>
                    <div class="col-md-7">
                        <div class="btns-block">
                            <div class="btn reviews-btn-block">
                                <a href="/reviews">Отзывы</a>
                            </div>
                            <div class="btn news-btn-block">
                                <a href="/news">Новости</a>
                            </div>
                                <?= SearchWidget::widget() ?>
                            <div class="btn login-btn-block">
                                
                                <?php if ($login_success): ?>
                                    <a id="cabinet_btn" href="/index.php?do=cabinet">ЛК</a>
                                <?php else: ?>
                                    <a id="login_btn" href="">Войти</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="new_menu">
            <div class="top-block">
                <div class="main-block container  text-center">
                    <div class="menu-item" data-id="1">Автомобили</div>
                    <div class="menu-item" data-id="2">Имущество</div>
                    <div class="menu-item" data-id="3">Путешествия</div>
                    <div class="menu-item" data-id="4">Жизнь и здоровье</div>
                    <div class="menu-item" data-id="5">Ипотека</div>
                </div>
            </div>
            <div class="bottom-block container">
                <div class=" text-center">
                    <div class="sub-block" data-id="1">
                        <div class="menu-item"><a href="/calculator-kasko">Калькулятор каско</a></div>
                        <div class="menu-item"><a href="/kasko.html">КАСКО</a></div>
                        <div class="menu-item"><a href="/osago.html">ОСАГО</a></div>
                        <div class="menu-item"><a href="/greencard.html">Зеленая карта</a></div>
                    </div>
                    <div class="sub-block" data-id="2">
                        <div class="menu-item"><a href="/property.html">Квартира</a></div>
                        <div class="menu-item"><a href="/house.html">Дом</a></div>
                        <div class="menu-item"><a href="/liability-fl.html">Ответственность</a></div>
                    </div>
                    <div class="sub-block" data-id="3">
                        <div class="menu-item"><a href="/vzr.html ">Выезжающие за рубеж</a></div>
                        <div class="menu-item"><a href="/travel-rf.html ">Путешествующие по РФ</a></div>
                        <div class="menu-item"><a href="/luggage.html">Багаж</a></div>
                    </div>
                    <div class="sub-block" data-id="4">
                        <div class="menu-item"><a href="/ns.html">Несчастный случай </a></div>
                        <div class="menu-item"><a href="/dms.html">ДМС</a></div>
                        <div class="menu-item"><a href="/oms.html">ОМС</a></div>
                        <div class="menu-item"><a href="/life.html">Страхование жизни</a></div>
                    </div>
                    <div class="sub-block" data-id="5">
                        <div class="menu-item"><a href="/ipoteka.html">Ипотечное страхование</a></div>
                        <div class="menu-item"><a href="/title.html">Титульное страхование</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->beginBody() ?>
    <div class="container wrapper">
        <div class="content">
            <?= $content ?>        
        </div>
        <div title="Оставить отзыв" style="padding: 15px; display: none;" id="form_check_expertise">
            <form enctype="multipart/form-data" method="post" action="/check-expertise">
                <h2>Проверка экспертизы</h2>
                <label class="block">
                    Ваше имя*
                    <input name="name" required="">
                </label>
                <label class="block">
                    Ваш e-mail*
                    <input name="email" required="">
                </label>
                <label class="block">
                    Ваш телефон*
                    <input name="phone" required="">
                </label>
                <label class="block">
                    Ваш регион*
                    <input name="region" required="">
                </label>
                <hr>
                <label class="block">
                    Загрузите фотографии повреждений
                    <input type="file" name="damage[]" multiple="">
                </label>
                <hr>
                <label class="block">
                    Загрузите копию акта осмотра*
                    <input type="file" name="inspection[]" multiple="">
                </label>
                <hr>
                <label class="block">
                    Когда произошло ДТП?*
                    <input name="date" required="">
                </label>
                <label class="block">
                    Сколько вам насчитала страховая компания?
                    <input name="cost" required="">
                </label>
                <input type="submit" value="Получить расчет реального размера ущерба">
            </form>
        </div>
        <!--Модальное окно оставить отзв--> 
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
           
          
           ?>
       <!--Модальное окно оставить отзыв--> 
        <!--Модальное окно регистрации-->
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
                            $login_model = new forms\Login();
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
        <!--Модальное окно регистрации --конец-->
           
    </div>
    <div class="clr"></div>
</div>
<?php echo $this->render('@app/views/layouts/_footer.php'); ?>

<?php $this->endBody() ?>
<script type="text/javascript">
    
    
     $("#ingosstrah").on('click', function() {
         $.post(
            "/site/count",
        {
            counter: "true",        
        }
        
        );
    });
   
    
    
    $(".logo-block").on('click', function() {
        location.assign('/');
    });
    $("#button_logout, #login_form_show, #login_btn").click(function(e) {
        e.preventDefault();
        $('#login').modal('show');
    });
    $("#button_check_expertise").click(function(e) {
        e.preventDefault();
        $.fancybox({
            'href': "#form_check_expertise"
        });
    });
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
</script>
</body>
</html>
<?php $this->endPage() ?>