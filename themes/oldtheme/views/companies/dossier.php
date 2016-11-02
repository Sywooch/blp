
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

    <?php endforeach; ?>
          --->
    <form id ='edit-company-form'>
        <div class="row m">
            <div class="col-md-4 text-right "><b>Наименование:</b></div>
            <div class="col-md-8">
                <span class ='show-field show-company_name'><?= $name ?></span>
                <?php if ($is_admin): ?>
                    <input class = 'edit-field' type ='text' name ='company_name' value ='<?= $name ?>' />
                    <span  class = 'error company_name'></span>
                <?php endif ?>
            </div>
        </div>

        <div class="row m">
            <div class="col-md-4 text-right "><b>Адрес:</b></div>
            <div class="col-md-8">
                <span class ='show-field show-address'><?= $address ?></span>
                <?php if ($is_admin): ?>
                    <input class = 'edit-field' type ='text' name ='address' value ='<?= $address ?>' /> 
                    <span  class = 'error address'></span>
                <?php endif ?>
            </div>
        </div>

        <div class="row m">
            <div class="col-md-4 text-right "><b>Телефон:</b></div>
            <div class="col-md-8">
                <span class ='show-field show-phone'><?= $phone ?></span>
                <?php if ($is_admin): ?>
                    <input class = 'edit-field' type ='text' name ='phone' value ='<?= $phone ?>' /> 
                    <span  class = 'error phone'></span>
                <?php endif ?>
            </div>
        </div>

        <div class="row m">
            <div class="col-md-4 text-right "><b>Сайт:</b></div>
            <div class="col-md-8">
                <span class ='show-field'>
                    <a target="_blank" href="<?= $site ?>" class = 'show-site'><?= $site ?></a>
                </span>
                <?php if ($is_admin): ?>
                    <input class = 'edit-field' type ='text' name ='site' value ='<?= $site ?>' />  
                    <span  class = 'error site'></span>
                <?php endif ?>
            </div>
        </div>

        <div class="row m">
            <div class="col-md-4 text-right "><b>Лицензия:</b></div>
            <div class="col-md-8">
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
        </div>

        <div class="row m">
            <div class="col-md-4 text-right "><b>Рейтинг эксперт РА:</b></div>
            <div class="col-md-8">
                <span class ='show-field show-expert_RA_rating'><?= $rating ?></span>
                <?php if ($is_admin): ?>
                    <input class = 'edit-field name-field' type ='text' name ='expert_RA_rating' value ='<?= $rating ?>' />
                    <span  class = 'error expert_RA_rating'></span>
                <?php endif ?>
            </div>
        </div>
        <div class="row m">
            <div class="col-md-4 text-right "><b>Уставной капитал(руб.):</b></div>
            <div class="col-md-8">
                <span class ='show-field show-charter_capital'><?= (string) number_format($capital, 0, '.', ' ') . ' руб.' ?></span>
                <?php if ($is_admin): ?>
                    <input class = 'edit-field name-field' type ='text' name ='charter_capital' value ='<?= $capital ?>' /> 
                    <span  class = 'error charter_capital'></span>
                <?php endif ?>
            </div>
        </div>

        <div class="row m">
            <div class="col-md-4 text-right ">
                <b>Справка о компании:</b>
            </div>
            <div class="col-md-8">
                <span class ='show-field show_additional_info'><?= $additional_info ?></span>
                <?php if ($is_admin): ?>
                    <textarea class = 'name-field' id = 'vertigo' name = "additional_info" ><?= $additional_info ?></textarea>

                    <span  class = 'error additional_info'></span>
                    <input type ='hidden'  name ='_csrf' class ='toPost' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
                    <input hidden type ="submit" value ="go" />
                <?php endif ?>
            </div>
        </div>
    </form>
</div>




<?php if ($is_admin): ?>
    <div class="row">
        <div class = 'left-column '><span class = 'color-picker'><b>Цвет:</b></span></div>
        <div class = 'right-cloumn'>
            <input type ='hidden' value ='<?= $id ?>' name ='user_id' />
            <input type="text" id="color" name="color" class = 'color-picker' value="#<?= $color ?>" />
            <span  class = 'error color'></span>
            <div id="colorpicker" class ='color-picker'></div>

        </div>
    </div>
<?php endif ?>

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
<div class="clearfix"></div>
<?php if (!empty($last_news['news'])): ?>
    <!--<h2>Новости о компании</h2>-->
    <h2>Страховая компания <?php print_r($last_news['tag']) ?></h2>
<?php endif; ?>
<?php foreach ($last_news['news'] as $new): ?>
    <div style="font-family:verdana;padding-top:10px; height: 80px; margin-bottom: 20px;">
        <div style="margin-left: 10px; display:inline; float: left; width: 75px; height: 75px;"><img style="width: 75px; height: 75px; object-fit: cover;" src="<?= $new['image'] ?>"></div>
        <div style="  display:inline; float: right; width: 85%; padding-right: 5px">
            <div style="color:#999999;font-style:italic;display:inline-block;">
                <?= $new['date'] ?>
                <i style="margin-left: 10px;" class="fa fa-eye"></i>
                <?=$new['count']?>
            </div>
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
    <style>
        .modalButtonReviewAlt {
            background-image: url("/images/sendHover.png");
            margin-left: 5%;
            margin-top: -16.5%;
            cursor: pointer;
            height: 45px;
    }
    </style>