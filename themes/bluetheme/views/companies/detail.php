<?php
use app\widgets\CompaniesWidget;
use app\helpers\ImgHelper;
?>
<main class="content_fifth clear">
    <section class="content_third_twoBlock content_fourth_top clearfix">
        <div class="content-row_gray">
            
            <img src='/images/company-images/<?=$params['company_id']?>/gallery/main/<?=ImgHelper::getFilePath(Yii::getAlias('@app/web/images/company-images/' . $params['company_id'] . '/gallery/main/'))?>'  class='content-row_gray_image'>
                    
            <a target="_blank" href="" class="content-row_gray_link">
                <p class="content-row_gray_title content-row_gray_title_fifth">
                    <?= $params['company_name']?>
                </p>
                <img src='/images/company-images/<?=$params['company_id']?>/gallery/logo/<?=ImgHelper::getFilePath(Yii::getAlias('@app/web/images/company-images/' . $params['company_id'] . '/gallery/logo/'))?>'  width="140"alt="">
                
            </a>
            <div onclick="javascript:history.back();" class="closing_cross" id="closing_cross_company"></div>
        </div>
    </section>
    <section class="folder_menu clear">
        <div class="folder_menu_item">
            <a href="/companies/<?= $params['user_id']?>" class="<?=(!empty(\yii::$app->request->get('id')) and empty(\yii::$app->request->get('view')))?'folder_menu_item_link folder_menu_item_link-active':'folder_menu_item_link'?>">Досье</a>
        </div>
        <div class="folder_menu_item">
            <a href="/companies/<?= $params['user_id']?>/reviews" class="<?=(\yii::$app->request->get('view')=='reviews')?'folder_menu_item_link folder_menu_item_link-active':'folder_menu_item_link'?>">Отзывы</a>
        </div>
        <div class="folder_menu_item">
            <a href="/companies/<?= $params['user_id']?>/rules" class="<?=(\yii::$app->request->get('view')=='rules')?'folder_menu_item_link folder_menu_item_link-active':'folder_menu_item_link'?>">Правила страхования</a>
        </div>
        <div class="folder_menu_item">
            <a href="/map/<?= $params['user_id']?>" class="folder_menu_item_link">Филиалы</a>
        </div>
    </section>
    <?= $dossier?>
    <section class="content_sec_right content_fifth_right">
    
    <?= CompaniesWidget::widget()?>
</section>
</main>
<script type="text/javascript" src="/bluetheme/js/gallery.js"> </script>

