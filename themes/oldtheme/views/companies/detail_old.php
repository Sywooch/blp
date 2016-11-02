<?php
$this->title = "$name » 711.ru - Независимый портал о страховании";

$this->registerCss(" 
        .company-tabs {
            width: 610px;
        }
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
?>


<div id="companyspeedbar" style="float:left;width:941px;">
    <div style="padding-left: 10px">
        <a href="/">711</a> &gt;&gt; <a href="/companies">Страховые компании</a> &gt;&gt; <?= $name ?>
    </div>
</div>

<div class="clr"></div>

<div class="carousel" style="min-height: 70px;">
    <?php foreach ($images as $image): ?>
        <?php if ($image['carousel']): ?>
            <div><img src="<?= $image['carousel-img'] ?>" style="height: 320px; width: 960px;"></div>
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

<form hidden  id = 'send-image' action="/admin/editcompanyimage" enctype="multipart/form-data" method="post" target = 'frame'>
    <input type ='file' name="uploadfile" class ='imgfile'/>
    <input type ='hidden'  name ='_csrf' class ='toPost' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
    <input type ='submit' name ='sumbit' value ='' />
    <input type ='hidden' name ='company-id' value ='<?= $id ?>' id ='one-expert' />
</form>
<iframe hidden src ='/admin/editcompanyimage' name = 'frame' id = 'img-path'></iframe>

<div class="company-info">
    <div style="float:left;width:650px; height: auto">
        <div id="olit-content">
            <div style="font-family:verdana;font-size:12px;" class="dpad">
                <ul class="nav nav-tabs company-tabs" id="tabs">
                    <li class="<?= ($in_reviews || $in_gallery) ? '' : 'active' ?>"><a data-toggle="tab" href="#panel1">Досье</a></li>
                    <li class=""><a data-toggle="tab" href="#panel2">Правила страхования</a></li>
                    <li class="<?= $in_reviews ? 'active' : '' ?>"><a data-toggle="tab" href="#panel3">Отзывы</a></li>
                    <li class="<?= $in_gallery ? 'active' : '' ?>" id="gallery_btn"><a data-toggle="tab" href="#panel4">Галерея</a></li>
                    <li><a href = '/map/<?= $id ?>' >Филиалы</a></li>

                </ul>
                <div class="tab-content" style="; margin-top: 20px;">
                    <div id="panel1" class="tab-pane <?= ($in_reviews || $in_gallery) ? '' : 'fade in active' ?>">
                        <div style="position:relative;">
                            <!---      <?php
                            foreach ([
                        'Наименование:' => $name,
                        'Адрес:' => $address,
                        'Телефон:' => $phone,
                        'Сайт:' => '<a target="_blank" href="' . $site . '">' . $site . '</a>',
                        'Лицензия:' => $license_status . '<br/>' . $license_for_insurance . '<br/>' . $license_for_reinsurance,
                        'Рейтинг Эксперт РА:' => $rating,
                        'Уставной капитал(руб.):' => (string) number_format($capital, 0, '.', ' ') . ' руб.',
                        'Справка о компании:' => $additional_info,
                            ] as $field => $text):
                                ?>
                                                                                                          <div style="float:left; width:200px; text-align: right; padding-right: 10px; padding-bottom: 10px;"><b><?= $field ?></b></div>
                                                                                                          <div style="float:left;width:400px;text-align:left;padding-bottom: 10px;"><?= $text ?></div>
                            <?php endforeach; ?>
                                  --->
                            <form id ='edit-company-form'>
                                <div class = 'left-column'><b>Наименование:</b></div>
                                <div class = 'right-cloumn'>
                                    <span class ='show-field show-company_name'><?= $name ?></span>
                                    <?php if ($is_admin): ?>
                                        <input class = 'edit-field' type ='text' name ='company_name' value ='<?= $name ?>' />
                                        <span  class = 'error company_name'></span>
                                    <?php endif ?>
                                </div>      
                                <div class = 'left-column'><b>Адрес:</b></div>
                                <div class = 'right-cloumn'>
                                    <span class ='show-field show-address'><?= $address ?></span>
                                    <?php if ($is_admin): ?>
                                        <input class = 'edit-field' type ='text' name ='address' value ='<?= $address ?>' /> 
                                        <span  class = 'error address'></span>
                                    <?php endif ?>
                                </div>
                                <div class = 'left-column'><b>Телефон:</b></div>
                                <div class = 'right-cloumn'>
                                    <span class ='show-field show-phone'><?= $phone ?></span>
                                    <?php if ($is_admin): ?>
                                        <input class = 'edit-field' type ='text' name ='phone' value ='<?= $phone ?>' /> 
                                        <span  class = 'error phone'></span>
                                    <?php endif ?>
                                </div>
                                <div class = 'left-column'><b>Сайт:</b></div>
                                <div class = 'right-cloumn'>
                                    <span class ='show-field'>
                                        <a target="_blank" href="<?= $site ?>" class = 'show-site'><?= $site ?></a>
                                    </span>
                                    <?php if ($is_admin): ?>
                                        <input class = 'edit-field' type ='text' name ='site' value ='<?= $site ?>' />  
                                        <span  class = 'error site'></span>
                                    <?php endif ?>
                                </div>
                                <div class = 'left-column'><b>Лицензия:</b></div>
                                <div class = 'right-cloumn'>
                                    <div class ='show-field show-license_status'><?= $license_status ?></div>
                                    <div class ='show-field show-license_for_insurance'><?= $license_for_insurance ?></div>
                                    <div class ='show-field show-license_for_reinsurance'><?= $license_for_reinsurance ?></div>


                                    <?php if ($is_admin): ?>
                                        <input class = 'edit-field address-field' type ='text' name ='license_status' placeholder="Статус лицензии" value ='<?= $license_status ?>' />
                                        <br/>
                                        <span  class = 'error license_status'></span>

                                        <input class = 'edit-field address-field' type ='text' name ='license_for_insurance' placeholder="Лицензия на страхование" value ='<?= $license_for_insurance ?>' />
                                        <br/>
                                        <span  class = 'error license_for_insurance'></span>

                                        <input class = 'edit-field address-field' type ='text' name ='license_for_reinsurance' placeholder="Лицензия на перестрахование" value ='<?= $license_for_reinsurance ?>' />
                                        <br/>
                                        <span  class = 'error license_for_reinsurance'></span>
                                    <?php endif ?>
                                </div>
                                <div class = 'left-column'><b>Рейтинг эксперт РА:</b></div>
                                <div class = 'right-cloumn'>
                                    <span class ='show-field show-expert_RA_rating'><?= $rating ?></span>
                                    <?php if ($is_admin): ?>
                                        <input class = 'edit-field name-field' type ='text' name ='expert_RA_rating' value ='<?= $rating ?>' />
                                        <span  class = 'error expert_RA_rating'></span>
                                    <?php endif ?>
                                </div>
                                <div class = 'left-column'><b>Уставной капитал(руб.):</b></div>
                                <div class = 'right-cloumn'>
                                    <span class ='show-field show-charter_capital'><?= (string) number_format($capital, 0, '.', ' ') . ' руб.' ?></span>
                                    <?php if ($is_admin): ?>
                                        <input class = 'edit-field name-field' type ='text' name ='charter_capital' value ='<?= $capital ?>' /> 
                                        <span  class = 'error charter_capital'></span>
                                    <?php endif ?>
                                </div>

                                <div class = 'left-column'><b>Справка о компании:</b></div>
                                <div class = 'right-cloumn'>
                                    <span class ='show-field show_additional_info'><?= $additional_info ?></span>
                                    <?php if ($is_admin): ?>
                                        <textarea class = 'name-field' id = 'vertigo' name = "additional_info" ><?= $additional_info ?></textarea>

                                        <span  class = 'error additional_info'></span>
                                        <input type ='hidden'  name ='_csrf' class ='toPost' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
                                        <input hidden type ="submit" value ="go" />
                                    <?php endif ?>
                                </div>
                                <?php if ($is_admin): ?>
                                    <div class = 'left-column '><span class = 'color-picker'><b>Цвет:</b></span></div>
                                    <div class = 'right-cloumn'>
                                        <input type ='hidden' value ='<?= $id ?>' name ='user_id' />
                                        <input type="text" id="color" name="color" class = 'color-picker' value="#<?= $color ?>" />
                                        <span  class = 'error color'></span>
                                        <div id="colorpicker" class ='color-picker'></div>

                                    </div>
                                <?php endif ?>
                            </form>
                            <?php if ($is_admin): ?>
                                <div class = 'left-column'>

                                    <button class = 'edit-company-button'>Редактировать</button>
                                    <button class = 'save-company-button'>Сохранить</button>
                                </div>
                                <div class = 'right-cloumn'></div>
                            <?php endif ?>
                        </div>
                        <?php if ($id == 87): ?>
                            <div class ='advertising' style ='margin-left: 5px;'>
                                <a href = "https://online.binins.ru/PARTNERS/VZROnLineN.aspx?ID_PARTNER=62434fc8-0f28-4dc2-adaa-b5a40344b280" />
                                <img src ="/olitimages/banners/insurance-policy-for-travelers.jpg" />
                                </a>
                                <a href = "https://online.binins.ru/PARTNERS/FlatOnLineN.aspx?ID_PARTNER=62434fc8-0f28-4dc2-adaa-b5a40344b280" />
                                <img src ="/olitimages/banners/insurance-policy-apartments.jpg" style =''/>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($last_news['news'])): ?>
                            <h1>Новости о компании</h1>
                        <?php endif; ?>
                        <?php foreach ($last_news['news'] as $new): ?>
                            <div style="font-family:verdana;padding-top:10px; height: 80px; margin-bottom: 20px;">
                                <div style="margin-left: 10px; display:inline; float: left; width: 75px; height: 75px;"><img style="width: 75px; height: 75px; object-fit: cover;" src="<?= $new['image'] ?>"></div>
                                <div style="  display:inline; float: right; width: 85%; padding-right: 5px">
                                    <div style="color:#999999;font-style:italic;display:inline-block;"><?= $new['date'] ?></div>
                                    <div style="" id="name_news_all">
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
                            <?php /* <div style="font-family:verdana;padding-top:10px; height: 80px;">
                              <div style="color:#999999;font-style:italic;display:inline; float:left; height:100%; width: 13%; padding-left: 5px; padding-top: 8px;"><?= $new['date'] ?></div>
                              <div style="  display:inline; float: right; width: 85%; padding-right: 5px">
                              <div style="" id="name_news_all">
                              <a href="/news/<?= $new['category_altname'] ?>/<?= $new['id'] ?>-<?= $new['alt_name'] ?>.html"><?= $new['title'] ?></a>
                              <div>
                              <div style="display:inline;">
                              <?= $new['descr'] ?>
                              </div>
                              <a id="shortnewsarray" href="/news/<?= $new['category_altname'] ?>/<?= $new['id'] ?>-<?= $new['alt_name'] ?>.html">→</a>
                              </div>
                              </div>
                              </div>
                              </div> */ ?>
                        <?php endforeach; ?>
                        <?php if ($last_news['pages']->totalCount > 5): ?>
                            <div style="font-family:verdana;padding-top:10px; height: 80px;">
                                <div style="  display:inline; float: right; width: 85%; padding-right: 5px">
                                    <div style="margin-top: 20px;" id="name_news_all">
                                        <a href="/news/tag/<?= $name ?>">Другие новости о компании <?= $name ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div id="panel2" class="tab-pane fade">
                        <?php if ($is_admin): ?>
                            <div class="edit_rules_btn_block">
                                <button class="edit_rules_btn">Редактировать</button>
                            </div>
                            <div class="edit_rules_block" style="display:none">
                                <textarea id="edit_rules_textarea"><?= $html_rules ?></textarea>
                            </div>
                        <?php endif; ?>
                        <div class="olit_content show_rules_block">
                            <?= $html_rules ?>
                        </div>
                    </div>
                    <div id="panel3" class="tab-pane fade <?= $in_reviews ? 'fade in active' : '' ?>">
                        <div id="graph" style="padding:10px;">
                            <div id="graph" style="padding:10px;">
                                Рейтинг: <?= $avg_raiting; ?><br><br><br>
                                <table style="display: none;position:absolute; top:100px;" id="myTable3" >
                                    <caption></caption>
                                    <thead>
                                        <tr><th style=""></th>
                                            <th style=""></th>
                                            <th style=""></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <td><?= $raiting['res5'] ?></td>
                                            <td><?= $raiting['res4'] ?></td>
                                            <td><?= $raiting['res3'] ?></td>
                                            <td><?= $raiting['res2'] ?></td>
                                            <td><?= $raiting['res1'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-----star rating --->
                                <div style ="position: relative; bottom: 150px; height: 20px;">  
                                    <div style ="position: relative; left:10px; bottom: 25px;">
                                        <div class="rateit" data-rateit-value="<?= $avg_raiting; ?>" data-rateit-readonly="true" data-rateit-preset="true"></div>
                                        <?= $reviews['count'] ?> отзывов
                                    </div><br/>
                                    <div style = "position:relative;left:10px; bottom:10px">
                                        <div class="rateit" data-rateit-value="5" data-rateit-readonly="true"></div>
                                    </div>
                                    <br/>
                                    <div style ="position: relative;left:10px; bottom:25px ">
                                        <div class="rateit" data-rateit-value="4" data-rateit-readonly="true"></div>
                                    </div>
                                    <br/>
                                    <div style ="position: relative;left:10px; bottom:40px ">
                                        <div class="rateit" data-rateit-value="3" data-rateit-readonly="true"></div>
                                    </div>
                                    <br/>
                                    <div style ="position: relative;left:10px; bottom:55px ">
                                        <div class="rateit" data-rateit-value="2" data-rateit-readonly="true"></div>
                                    </div>
                                    <br/>
                                    <div style ="position: relative; left:10px; bottom:70px">
                                        <div class="rateit" data-rateit-value="1" data-rateit-readonly="true"></div>
                                    </div>

                                </div>
                            </div>
                            <p style="font-size:larger;padding-top: 20px;">Отзывы о работе <?= $name ?> <br></p>
                            <div style="float:left; width:200px; text-align: left; padding-right: 10px;padding-bottom: 10px;">
                                Всего отзывов: <?= $reviews['count'] ?>
                            </div>
                            <div style="float:left;width:200px;text-align:left;padding-bottom: 10px;"><!----Ответов компании: 144335260--></div>
                            <div style="float:left;width:200px;text-align:left;padding-bottom: 10px;"><!---Среднее время ответа: 144335260---></div>
                            <br>
                            <a href="/addreview/<?= $id ?>" style="display:block;margin:10px auto;" id="button_select_insurance" target="_blank" class="">
                                Оставить отзыв
                            </a>
                            <section id="company_reviews">
                                <a style="" name="namename"></a>
                                <?php foreach ($reviews['reviews'] as $review): ?>
                                    <section style="border-bottom: 1px dashed black;" id="review_109727" class="review_wrapper">
                                        <div class="review">
                                            <header>
                                                <div style="padding-bottom:10px;font-size:16px;">
                                                    <div style="float: right; font-size: 14px;font-family: MyriadPro_Cond;"><a href="/reviews/<?= $review['id'] ?>">Отзыв №<?= $review['id'] ?></a></div>
                                                    <div style="clear:both;"></div>
                                                    <div style="float:left;"></div>
                                                    <div style="float:right;width:95px;height:18px;background:url(/images/rating<?= $review['rating'] ?>.png);"></div>
                                                    <div style="clear:both;"></div>
                                                </div>
                                            </header>
                                            <div style="text-align:justify;"><b></b></div>       
                                            <div style="text-align:justify;"><?= $review['text'] ?></div>
                                            <footer>
                                                <em style="float: left;">
                                                    <div style="padding:5px 0px;color:#999999;font-size:12px;font-style:italic;">Тип полиса: <?= $review['type'] ?>, оставлен <?= $review['date'] ?></div>
                                                </em>
                                                <div class="likes_block <?= $review['already_liked'] ? '' : 'set_like' ?>" style="float: right; ">
                                                    <div class="like-icon"></div>
                                                    <span class="tooltip" style="display: none;
                                                          background: black;
                                                          color: white;
                                                          font-size: 10px;
                                                          height: 40px;
                                                          opacity: 1;
                                                          padding: 5px;
                                                          position: absolute;
                                                          width: 74px;
                                                          border-radius: 3px;
                                                          border: 1px gray solid;">
                                                        Отзыв полезен
                                                    </span>
                                                    <span class="like_counter"><?= $review['likes'] ?></span>
                                                </div>
                                                <div class="clr"></div>
                                            </footer>
                                        </div>
                                        <section class="response">
                                            <article>
                                                <section class="response">
                                                    <article>
                                                        <?= is_null($review['answer']) ? '' : $review['answer']['text'] ?>
                                                    </article>
                                                </section>
                                            </article>
                                        </section>
                                    </section>
                                <?php endforeach; ?>
                            </section>
                        </div>
                        <?= \yii\widgets\LinkPager::widget(['pagination' => $reviews['pages']]) ?>
                        <div title="Оставить отзыв" id="add_review_block">
                            <form enctype="multipart/form-data" data-redirect-to="/companies/<?= $id ?>#company_reviews" id="add_review_form" action="#">
                                <input type="hidden" value="25" name="company_id">
                                <h2>Оставить отзыв</h2>
                                <label class="block">
                                    Имя <span class="important">*</span>
                                    <input type="text" readonly="" value="" required="required" name="name">
                                </label>
                                <label class="block">
                                    Телефон <span class="important">*</span>
                                    <input type="text" readonly="" value="" required="required" name="phone">
                                </label>
                                <label class="block">
                                    Эл. почта <span class="important">*</span>
                                    <input type="email" readonly="" value="sfsdas@gdfs.ru" required="required" name="email">
                                </label>
                                <label class="block">
                                    Город <span class="important">*</span>
                                    <input type="text" readonly="" value="" required="required" name="city">
                                </label>
                                <label class="block">
                                    Тип полиса <span class="important">*</span>
                                    <select required="" name="type">
                                        <option value="">Выберите</option>
                                        <option value="2">Каско</option><option value="1">ОСАГО</option><option value="7">Зеленая карта</option><option value="8">Квартира</option><option value="9">Дом</option><option value="10">Ответственность граждан</option><option value="3">Выезжающие за рубеж</option><option value="11">Путешествующие по РФ</option><option value="12">Багаж</option><option value="5">Несчастный случай</option><option value="4">ДМС</option><option value="13">OMC</option><option value="14">Страхование жизни</option><option value="15">Ипотечное страхование</option><option value="16">Титульное страхование</option><option value="6">Другое</option>
                                    </select>
                                </label>
                                <p style="color:red;">
                                    Внимание! При размещении отрицательного<br> отзыва указывайте №  дела, № страхового полиса.
                                </p>
                                <label class="block">
                                    Номер дела 
                                    <input type="text" maxlength="30" name="contract">
                                </label>
                                <label class="block">Подробности <span class="important">*</span> <textarea required="" name="comment"></textarea></label>
                                <label class="block">
                                    Файл
                                    <input type="file" name="file">
                                </label>
                                <label>Оценка</label>
                                <label>
                                    <input type="radio" value="1" name="rating">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star1.png">
                                    <img src="/templates/portal711/images/star1.png">
                                    <img src="/templates/portal711/images/star1.png">
                                    <img src="/templates/portal711/images/star1.png">
                                </label>
                                <label>
                                    <input type="radio" value="2" name="rating">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star1.png">
                                    <img src="/templates/portal711/images/star1.png">
                                    <img src="/templates/portal711/images/star1.png">
                                </label>
                                <label>
                                    <input type="radio" value="3" name="rating">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star1.png">
                                    <img src="/templates/portal711/images/star1.png">
                                </label>
                                <label>
                                    <input type="radio" value="4" name="rating">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star1.png">
                                </label>
                                <label>
                                    <input type="radio" value="5" name="rating">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star2.png">
                                    <img src="/templates/portal711/images/star2.png">
                                </label>
                                <label>
                                    <input type="checkbox" checked="" value="1" name="newsletters">
                                    [Опция:] Я выражаю свое согласие на получение<br>информации об услугах от портала "711.ru"<br>
                                    и его представителя, в связи с моим обращением.
                                </label>
                                <input type="submit" value="Оставить отзыв">
                            </form>
                        </div>
                    </div>
                    <div id="panel4" class="tab-pane fade <?= $in_gallery ? 'fade in active' : '' ?>">
                        <div class="container">
                            <?php if ($is_admin): ?>
                                <div class="row">
                                    <form enctype="multipart/form-data" action="/companies/addimage" method="POST">
                                        <input style="display: none;" id="image_upload_btn_hidden" accept="image/png" name="new_image" type="file" />
                                        <b>Подпись:</b>
                                        <input type="text" name="name"/>
                                        <button type="button" id="image_upload_btn">Загрузить</button>
                                        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                                        <input type="hidden" name="company-id" value="<?= $id ?>"/>
                                    </form>
                                </div>
                                <div style="height: 20px;"></div>
                            <?php endif; ?>
                            <div class="row">
                                <?php for ($i = 0; $i < count($images); $i++): ?>
                                    <?php if ($images[$i]['carousel'] && !$is_admin) continue; ?>
                                    <?php if ($i != 0 && $i % 3 == 0): ?>
                                    </div>
                                    <div class="row">
                                    <?php endif; ?>
                                    <div class="col-md-2 gallery-item">
                                        <?php if ($is_admin): ?>
                                            <a data-id="<?= $images[$i]['id'] ?>" style="color:red;" class="del_img_btn">Удалить</a>
                                            <a data-id="<?= $images[$i]['id'] ?>" style="color:green;" class="edit_img_btn">Изменить</a>
                                            <div style="float:right">Карусель
                                                <input data-id="<?= $images[$i]['id'] ?>" type="checkbox" class="carousel_checkbox" <?= $images[$i]['carousel'] ? 'checked' : '' ?> ></div>
                                        <?php endif; ?>
                                        <div class="image-helper"></div>
                                        <img data-original="<?= $images[$i]['original'] ?>" src="<?= $images[$i]['preview'] ?>">
                                        <center class="name-text"><?= $images[$i]['name'] ?></center>
                                        <input class="name-edit" style="display: none;" type="text" value="<?= $images[$i]['name'] ?>"/>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>


                </div>



            </div>
        </div>
    </div>
</div>
</div>
<div style="clear:both"></div>
<?php if ($is_admin): ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.edit_rules_btn_block').on('click', '.edit_rules_btn', function() {
                $('.show_rules_block').hide();
                $('.edit_rules_btn').text('Сохранить')
                        .removeClass('edit_rules_btn')
                        .addClass('save_rules_btn');
                CKEDITOR.replace('edit_rules_textarea');
                $('.edit_rules_block').show();
            });
            $('.edit_rules_btn_block').on('click', '.save_rules_btn', function() {
                var editor = CKEDITOR.instances['edit_rules_textarea'];
                var new_rules = editor.getData();
                $.ajax({
                    url: '/companies/updatehtmlrules',
                    type: 'post',
                    data: {
                        id: <?= $id ?>,
                        html_rules: new_rules,
                        _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
                    }
                }).done(function(data) {
                    if (data != 'success')
                    {
                        alert('Ошибка при обновлении правил');
                        return;
                    }
                    $('.show_rules_block').html(new_rules).show();
                    CKEDITOR.instances['edit_rules_textarea'].destroy();
                    $('.save_rules_btn').text('Редактировать')
                            .removeClass('save_rules_btn')
                            .addClass('edit_rules_btn');
                    $('.edit_rules_block').hide();
                });
            });
            $(".del_img_btn").on('click', function() {
                var $this = $(this);
                var id = $this.data('id');
                $.ajax({
                    url: '/companies/deleteimage',
                    type: 'post',
                    data: {
                        id: id,
                        _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
                    }
                }).done(function(data) {
                    if (data != 'success')
                    {
                        alert('Ошибка при удалении изображения');
                        return;
                    }
                    else
                    {
                        console.log($this.hide());
                        $parent = $this.parent();
                        $parent.children('div').hide();
                        $parent.children('img').prop('src', '/images/new_design/image-deleted.png');
                    }
                });
            });
            $('.carousel_checkbox').on('change', function() {
                var $this = $(this);
                var id = $this.data('id');
                $.ajax({
                    url: '/companies/changecarouselonimage',
                    type: 'post',
                    data: {
                        id: id,
                        carousel: $this.prop('checked'),
                        _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
                    }
                }).done(function(data) {
                    if (data != 'success')
                        alert('Ошибка при изменении признака');
                });
            });
            $("#image_upload_btn").on('click', function() {
                $("#image_upload_btn_hidden").click();
            });
            $("#image_upload_btn_hidden").on('change', function() {
                var value = $(this).val();
                if (value != '')
                    if (value.slice(-4) == '.png' || value.slice(-4) == '.jpg' || value.slice(-4) == '.gif' || value.slice(-5) == '.jpeg')
                        $(this).parent().submit();
                    else
                        alert('Неправильный формат файла');
                else
                    alert('Файл не выбран');
            });
            $(".gallery-item").on('click', '.edit_img_btn', function() {
                $this = $(this);
                $this.parent().children('.name-text').hide();
                $this.parent().children('.name-edit').show();
                $this.text('Сохранить').addClass('save_img_btn').removeClass('edit_img_btn');
            });
            $(".gallery-item").on('click', '.save_img_btn', function() {
                var $this = $(this);
                var id = $this.data('id');
                var name = $this.parent().children('.name-edit').val();
                $.ajax({
                    url: '/companies/editimagename',
                    type: 'post',
                    data: {
                        id: id,
                        name: name,
                        _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
                    }
                }).done(function(data) {
                    if (data != 'success')
                    {
                        alert('Ошибка при изменении признака');
                        return;
                    }
                    $this.parent().children('.name-edit').hide();
                    $this.parent().children('.name-text').show().text(name);
                    $this.text('Изменить').addClass('edit_img_btn').removeClass('save_img_btn');
                });

            });
        });
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