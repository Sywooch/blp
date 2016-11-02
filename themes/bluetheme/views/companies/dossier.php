<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\widgets\Pjax;
use app\helpers\ImgHelper;
use mihaildev\elfinder\InputFile;

$this->title = $params['company_name'];

ImgHelper::createDirectory(Yii::getAlias('@app/web/images/company-images/'.\Yii::$app->request->get('id').'/gallery/gallery'));
ImgHelper::createDirectory(Yii::getAlias('@app/web/images/company-images/'.\Yii::$app->request->get('id').'/gallery/minigallery'));
ImgHelper::createDirectory(Yii::getAlias('@app/web/images/company-images/'.\Yii::$app->request->get('id').'/gallery/main'));
ImgHelper::createDirectory(Yii::getAlias('@app/web/images/company-images/'.\Yii::$app->request->get('id').'/gallery/logo'));
?>

<section class="content_fifth_left clear">
    <p class="content_fifth_left_infoTitle">Информация</p>
        <div class="content_fifth_left_leaveFeedback">
            <?php if(\Yii::$app->user->can('admin')):?>
                <?= Html::beginForm("/companies/".\Yii::$app->request->get('id'), 'post', ['data-pjax'=>''])?><br>
                    <table style="display:none" id="admin_form" class="content_fifth_left_table">
                        <?= Html::activeHiddenInput($model, 'user_id', ['value'=>\Yii::$app->request->get('id')])?>
                        <tr  class="content_fifth_left_table_row">
                            <td class="content_fifth_left_table_leftColumn">Наименование:</td>
                            <td><?= Html::activeTextInput($model, 'company_name', ['value'=>$params['company_name']])?></td>
                        </tr>
                        <tr class="content_fifth_left_table_row">
                            <td class="content_fifth_left_table_leftColumn">Адрес:</td>
                            <td><?= Html::activeTextInput($model, 'address', ['value'=>$params['address']])?></td>
                        </tr>
                        <tr class="content_fifth_left_table_row">
                            <td class="content_fifth_left_table_leftColumn">Телефон</td>
                            <td><?= Html::activeTextInput($model, 'phone', ['value'=>$params['phone']])?></td>
                        </tr>
                        <tr class="content_fifth_left_table_row">
                            <td class="content_fifth_left_table_leftColumn">Сайт:</td>
                            <td class="content_policy_titles_about_linkOut"><?= Html::activeTextInput($model, 'site', ['value'=>$params['site']])?></td>
                        </tr>
                        <tr class="content_fifth_left_table_row">
                            <td class="content_fifth_left_table_leftColumn">Лицензия:</td>
                            <td><?= Html::activeTextInput($model, 'license_for_insurance', ['value'=>$params['license_for_insurance']])?></td>
                        </tr>
                        <tr class="content_fifth_left_table_row">
                            <td class="content_fifth_left_table_leftColumn">Рейтинг эксперт РА:</td>
                            <td><?= Html::activeTextInput($model, 'expert_RA_rating', ['value'=>$params['expert_RA_rating']])?></td>
                        </tr>
                        <tr class="content_fifth_left_table_row">
                            <td class="content_fifth_left_table_leftColumn">Уставной капитал:</td>
                            <td><?= Html::activeTextInput($model, 'charter_capital', ['value'=>$params['charter_capital']])?><span class="rubl"> рублей</span></td>
                        </tr>
                        <tr class="content_fifth_left_table_row mobile-hidden">
                            <td class="content_fifth_left_table_leftColumn">Справка о компании:</td>
                            <td><?= Html::activeTextarea($model, 'additional_info', ['value'=>$params['additional_info']])?> </td>
                        </tr>
                        <tr class="content_fifth_left_table_row mobile-hidden">
                            <td class="content_fifth_left_table_leftColumn"></td>
                            <td><?= Html::submitButton('Редактировать', ['id'=>'leave_feedback_button'])?> </td>

                        </tr>
                    </table>

                 <?= Html::endForm()?>
            <?php endif;?>
        </div>
    <table id="admin_table" class="content_fifth_left_table">

        <tr  class="content_fifth_left_table_row">
            <td class="content_fifth_left_table_leftColumn">Наименование:</td>
            <td><?= $params['company_name']?></td>
        </tr>
        <tr class="content_fifth_left_table_row">
            <td class="content_fifth_left_table_leftColumn">Адрес:</td>
            <td><?= $params['address']?></td>
        </tr>
        <tr class="content_fifth_left_table_row">
            <td class="content_fifth_left_table_leftColumn">Телефон</td>
            <td><?= $params['phone']?></td>
        </tr>
        <tr class="content_fifth_left_table_row">
            <td class="content_fifth_left_table_leftColumn">Сайт:</td>
            <td class="content_policy_titles_about_linkOut"><?= $params['site']?></td>
        </tr>
        <tr class="content_fifth_left_table_row">
            <td class="content_fifth_left_table_leftColumn">Лицензия:</td>
            <td><?= $params['license_for_insurance']?></td>
        </tr>
        <tr class="content_fifth_left_table_row">
            <td class="content_fifth_left_table_leftColumn">Рейтинг эксперт РА:</td>
            <td><?= $params['expert_RA_rating']?></td>
        </tr>
        <tr class="content_fifth_left_table_row">
            <td class="content_fifth_left_table_leftColumn">Уставной капитал:</td>
            <td><?= $params['charter_capital']?><span class="rubl"> рублей</span></td>
        </tr>
        <tr class="content_fifth_left_table_row mobile-hidden">
            <td class="content_fifth_left_table_leftColumn">Справка о компании:</td>
            <td class='brief'>
               <?= mb_substr($params['additional_info'], 0, 300)?>
                <br><br>
                <span class='full' style='color: #4d81ef; cursor: pointer; padding-top: 25px'>Подробнее</span>
            </td>
            <td class='full' id='full' style='display: none'>
                <?=$params['additional_info']?>
                <br><br>
                <span class='brief' style='color: #4d81ef; cursor: pointer; padding-top: 25px'>Скрыть</span>
                <br><br>

            </td>

        </tr>
        <tr class="content_fifth_left_table_row mobile-hidden">
            <td class="content_fifth_left_table_leftColumn"></td>
            <td>

            </td>

        </tr>

    </table>
    <?php if(\Yii::$app->user->can('admin')):?>
        <p id="correct_info" class="company_rating_feedback_all"
           style="width: 300px; color: gray; border: 1px solid grey;"> Редактировать информацию о компании </p>
    <?php endif;?>
    <div class="mobile_table_block">
        <div class="content_fifth_left_table_leftColumn">Справка о компании:</div>
        <div class="content_fifth_left_table_leftColumn">
            <?=$params['additional_info']?>
        </div>
    </div>
    <p class="content_fifth_left_infoTitle">Рейтинг по отзывам</p>
    <div class="company_rating clear">
        <div class="company_rating_average">
            <div class="stars">
                <img width="22px"class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="22px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="22px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="22px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="22px" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <span class="company_rating_counter">
                <?= round($params['average'], 1)?>
                </span>
            </div>
        </div>
        <div class="company_rating_block">
            <div class="stars">
                <img width="16px"class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <span class="company_rating_counter">
                <?= $params['five_star']?>

                </span>
            </div>
            <div class="stars">
                <img width="16px"class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <span class="company_rating_counter">
                <?= $params['four_star']?>
                </span>
            </div>
            <div class="stars">
                <img width="16px"class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <img  width="16px" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <span class="company_rating_counter">
                <?= $params['three_star']?>
                </span>
            </div>
            <div class="stars">
                <img width="16px"class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <img  width="16px" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <img  width="16px" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <span class="company_rating_counter">
                <?= $params['two_star']?>
                </span>
            </div>
            <div class="stars">
                <img width="16px"class="stars-marked star" src="/bluetheme/img/mark.svg">
                <img  width="16px" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <img  width="16px" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <img  width="16px" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <img  width="16px" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <span class="company_rating_counter">
                <?= $params['one_star']?>
                </span>
            </div>
        </div>
    </div>
    <div class="company_rating_feedback">

        <div class="company_rating_feedback_inside">
            <div class="company_rating_feedback_inside_title">
                <?= $onerev['title']?>
            </div>
            <div class="stars">
            <?php
                for($i = 0; $i < round($onerev['rating']); $i++): ?>
                    <img width="16" class="stars-marked star" src="/bluetheme/img/mark.svg">
                <?php endfor;
                for($i; $i < 5; $i++): ?>
                    <img width="16" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                <?php endfor;
            ?>
            </div>
            <div class="name_n_sity clear">
                <div class="company_rating_feedback_inside_name">
                    <?= $onerev['name']?>
                    <span>|</span>
                </div>
                <div class="company_rating_feedback_inside_city">
                    <?= $onerev['city']?>
                </div>
            </div>
            <div class="company_rating_feedback_inside_date">
                <?= date('d.m.Y', strtotime($onerev['date_add']))?>
            </div>
            <div class="company_rating_feedback_inside_inDetail clear">
                <?= $onerev['comment']?>
            </div>
            <a href='/companies/<?= $onerev['company_id']?>/reviews'  class="company_rating_feedback_all">
            Все отзывы - <span  class="company_rating_feedback_all_counter"><?=$revcount?></span>
            </a>
        </div>
    </div>
     <div class="content_fifth_left_photo">

        <p class="content_fifth_left_infoTitle">Фото компании <?=$params['company_name']?> </p>
        <div class="content_fifth_left_photo_manage">

            <?php if(Yii::$app->user->can('admin')):?>
                <img src="/bluetheme/img/add_photo.svg" width="15" alt="">
                <?php if(Yii::$app->request->get('gallery')=='create') ImgHelper::createGallery(\Yii::$app->request->get('id'));?>
                <?= InputFile::widget([
                    'language'   => 'ru',
                    'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
                    'path' => 'company-images/'.\Yii::$app->request->get('id'), // будет открыта папка из настроек контроллера с добавлением указанной под деритории
                    'filter'     => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
                    'name'       => 'myinput',
                    'value'      => '',
                    'options'    => ['class' => 'form-control'],

                ]); ?>

                <?=Html::a('Сформировать минигалерею',
                        Yii::$app->urlManager->createAbsoluteUrl(['/companies/'.Yii::$app->request->get('id'),'gallery' => 'create']),
                            ['class' => 'content_fifth_left_photo_all'])?>

            <?php endif;?>
        </div>

        <div class="owl-carousel content_fifth_left_photo_downloaded">

            <?php foreach(ImgHelper::scanDir(Yii::getAlias('@app/web/images/company-images/' . $params['company_id'] . '/gallery/gallery/')) as $k => $v):?>
            <div class="item" style="width: 100%; height: 100%;">
                <img style="width: 100%; height: 100%;"
                     path = "<?=Yii::getAlias('@web/images/company-images/'.$params['company_id'].'/gallery/gallery/').$v?>"
                        src="<?=Yii::getAlias('@web/images/company-images/'.$params['company_id'].'/gallery/minigallery/').$v?>"
                            alt="">
            </div>

            <?php endforeach;?>
        </div>
        <script src="/bluetheme/js/owl.carousel.js"></script>
        <script src="/bluetheme/js/owl.carousel.min.js"></script>
        <script>
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            });


        </script>
    </div>

    <div class="content_fifth_left_leaveFeedback">
        <p class="content_fifth_left_infoTitle">Есть опыт общения с компанией <?= $params['company_name']?> ?</p>
        <p class="content_fifth_left_leaveFeedback_share">Поделитесь опытом с друзьями</p>
        <p class="content_fifth_left_infoTitle">Личная информация</p>
        <form id="sendreview" action = "" method="post">
            <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=\Yii::$app->request->getCsrfToken(); ?>" />
            <input type="hidden" id="review-mt_rand" name="Review[mt_rand]" value="<?=Yii::$app->session->get("mt_rand")?>">
            <div id='name' class="error"></div><br>
            <input type="text" name="Review[name]" placeholder="Ваше Имя" value="<?= (!\Yii::$app->user->isGuest) ? \Yii::$app->user->identity->full_name : ''?>"><br>
            <div id='email' class="error"></div><br>
            <input type="text" name="Review[email]" placeholder="Ваш e-mail" value="<?= (!\Yii::$app->user->isGuest) ? \Yii::$app->user->identity->email : ''?>"><br>
             <div id='city' class="error"></div><br>
            <input type="text" name="Review[city]" placeholder="Ваш город"><br>
            <p class="content_fifth_left_infoTitle">Информация о компании</p>

            <div class="mySelectStyle">
                <select class="" name="Review[company_id]">
                    <?php foreach($companes as $k => $v):?>
                        <option <?=($k == \Yii::$app->request->get('id')) ? 'selected' : ''?>  value="<?=$k?>"><?=$v?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mySelectStyle">
                <select class="" name="">
                    <?php foreach([''=>'Вид страхования']+$type as $k => $v):?>
                    <option value="<?=$k?>"><?=$v?></option>
                    <?php endforeach;?>
                </select>
                <!-- <div class="mySelectStyle_arrow">
                    <img src="img/mySelectStyle_arrow.svg" width="13"alt="">
                    </div> -->
            </div>
            <div id='rating' class="error"></div><br>
            <span class="content_fifth_left_leaveFeedback_share">Оценка</span>
            <!-- <span class="stars">
                <img width="16px"class="stars-marked star" src="img/mark-no.svg">
                <img  width="16px" class="stars-marked star" src="img/mark-no.svg">
                <img  width="16px" class="stars-marked star" src="img/mark-no.svg">
                <img  width="16px" class="stars-marked star" src="img/mark-no.svg">
                <img  width="16px" class="stars-marked-no star" src="img/mark-no.svg">
                </span>-->

            <table cellspacing="5" width="100%" class="rating_table">
                <tr>
                    <td valign="top" style="display: none">
                        <code class="html">
                        &lt;input name="star1" type="radio" class="star"/&gt;
                        &lt;input name="star1" type="radio" class="star"/&gt;
                        &lt;input name="star1" type="radio" class="star"/&gt;
                        &lt;input name="star1" type="radio" class="star"/&gt;
                        &lt;input name="star1" type="radio" class="star"/&gt;
                        </code>
                    </td>
                    <td valign="top" width="180">
                        <input name="Review[rating]" value="1" type="radio" class="star"/>
                        <input name="Review[rating]" value="2" type="radio" class="star"/>
                        <input name="Review[rating]" value="3" type="radio" class="star"/>
                        <input name="Review[rating]" value="4" type="radio" class="star"/>
                        <input name="Review[rating]" value="5" type="radio" class="star"/>
                    </td>
                </tr>
            </table>
            <br><br>
            <div id='title' class="error"></div><br>
            <input type="text" name="Review[title]" placeholder="Заголовок отзыва"><br>
            <div id='comment' class="error"></div><br>
            <textarea name="Review[comment]" rows="2" cols="40" placeholder="Ваше мнение о компании"></textarea>
            <br>
             <button  id="leave_feedback_button">Оставить отзыв</button>
        </form>
       <main style="display: none" class="content_fifth clear feedbackPage">
            <section class="content_fifth_left clear" style="margin-left: -30px; margin-top: -60px;">
                <div class="gotYourFeedback" style="display: inherit">
                    <div class="gotYourFeedback_center" >
                        <img src="/bluetheme/img/feedback_picture.svg" height="150"  alt="">
                        <div class="gotYourFeedback_center_message">  </div>
                    </div>
                    <a href='/companies/<?=\Yii::$app->request->get('id')?>' class='closing_cross' id='closing_cross_feedbackGot'></a>

                </div>
            </section>
        </main>
    </div>

</section>
<style type="text/css" src="/bluetheme/css/gallery.css"> </style>
<script type="text/javascript">
    $('form#sendreview').submit(function(){
       var msg = $(this).serialize();
               
       $.ajax({
        type: "POST",
        url: "/companies/addreview",
        data: msg,

    }).done(function(data){
        //console.log(data);
            switch(data) {
                case "confirm":
                        $('form#sendreview').remove();
                        $('main').show();
                        $('div.gotYourFeedback_center_message').text('Для подтверждения \n\
                                    Вашего электронного адреса Вам на почту отправлено письмо. Следуйте указанным инструкциям.');
                        break;
                case "success":
                        $('form#sendreview').remove();
                        $('main').show();
                        $('div.gotYourFeedback_center_message').text('Ваш отзыв опубликован!');
                        break;
                default:
                        resp = jQuery.parseJSON(data);
                        $('div#name').text(resp.name);
                        $('div#email').text(resp.email);
                        $('div#city').text(resp.city);
                        $('div#rating').text(resp.rating);
                        $('div#title').text(resp.title);
                        $('div#comment').text(resp.comment);
                        
                       
                        
            }
        });
         return false;
    });



</script>
