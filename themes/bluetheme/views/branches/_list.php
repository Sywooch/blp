<a  href='javascript: document.location.href = "/branch/<?= $model['id'];?>";' class="filial clearfix" >
    <div class="filial"  style="margin-left: 24px; border: 1px">
        <div style="font-family:verdana;padding-top:10px; height: 80px; margin-bottom: 20px;">
            <div style="margin-left: 10px; display:inline; float: left; width: 100px; height: 75px;"><img class="logoComm"  width="125" height="56" src="<?=\yii::$app->params['photosParam']['imgUrl'].$model['logo']?>"></div>
            <div style="display:inline; float: left; width: 80%; padding-left: 10px; text-align: left;">
                <div id="name_news_all" style="margin-left: 80px; ">
                    <div class="company_rating_feedback_inside_title">Компания: <?=$model['company_name']?></div>
                    <div class="company_rating_feedback_inside_inDetail clear">
                        <span>Филиал: <?=$model['region']?></span><br>
                        <span>Адрес: <?=$model['city'];?>, <?=$model['address']?></span><br>
                        <span>Режим рабоы: <?=$model['work_hours']?></span><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>
