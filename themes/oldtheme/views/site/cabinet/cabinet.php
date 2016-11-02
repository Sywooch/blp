<?
$this->title = "Личный кабинет » 711.ru - Независимый портал о страховании";
?>
<div style="width:940px;">
    <div id="olit-content"><div style="float:left;width:641px;">
	<h1 class="heading">Ваши отзывы</h1>
	<div style="background:white;">
            <div style="background:#f3f3f3;padding-left:10px;border-bottom:1px solid #bebebe;">
                <div><a style="line-height:32px;float:none;margin:0px auto;" target="_blank" href="/addreview/" class="">ОСТАВИТЬ ОТЗЫВ</a></div>
            </div>
            <div class="print_company_reviews">
                <section id="company_reviews">
                    <? foreach($reviews['reviews'] as $review): ?>
                    <section style="background: white; margin-left: -20px; margin-right: -20px;" id="review_118725" class="review_wrapper">
                        <div style="padding: 10px; margin-left: 50px;  " class="review">
                            <header>
                                <div style="padding-bottom:10px;font-size:16px;">
                                    <div style="float: right; font-size: 14px;font-family: MyriadPro_Cond;">
                                        <a href="/reviews/<?= $review['id'] ?>">Отзыв №<?= $review['id'] ?></a>
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div style="position:relative; margin-left: -45px; margin-top: -10px; float: left;  width: 0px; height:0px; background: yellow">
                                        <div style="width: 40px; height:40px; background: #<?= $review['company_color'] ?>; color: white; font-size: 20px;text-align: center;
                                            -moz-border-radius:  20px 20px 20px 20px; /* Firefox */
                                            -webkit-border-radius:  20px 20px 20px 20px;  /* Safari 4 */
                                            border-radius:  20px;  /* IE 9, Safari 5, Chrome */">
                                            <div style="padding-top:12px; font-weight: bold;"><?= substr($review['company_name'], 0, 2) ?></div>
                                        </div>
                                    </div>                
                                    <div style="float:left;display:inline"><a href="/companies/<?= $review['company_id'] ?>"><?= $review['company_name'] ?></a></div>
                                    <div style="float:right;width:95px;height:18px;background:url(/images/rating5.png);"></div>
                                    <div style="clear:both;"></div>
                                </div>
                            </header>
                            <div style="text-align:justify;"><b></b></div>       
                            <div style="text-align:justify;">
                                <p><?= $review['text'] ?></p>
                            </div>
                            <footer>
                                <em>
                                    <div style="padding:5px 0px;color:#999999;font-size:12px;font-style:italic;">Тип полиса: <?= $review['type'] ?>, оставлен <?= $review['date'] ?></div>
                                </em>
                            </footer>
                        </div>
                    </section>
                    <? endforeach; ?>
                    <?= \yii\widgets\LinkPager::widget(['pagination' => $reviews['pages']]) ?>
                </section>
            </div>
            <script>
                function hide_answer_form(id){
                    $("[data-id = '" + id + "']").slideToggle("medium");
                }
            </script>
        </div>
</div>
<div style="float:right;width:290px;">
    <div id="left_block_top_head">ПРОФИЛЬ</div>
    <div style="background:white;font-size:14px;">
        <div style="border-bottom:1px solid #f3f3f3;padding:10px 0px;text-align:center;"><?= $username ?><br></div>
        <div style="border-bottom:1px solid white;padding:20px 10px;background:#f3f3f3;"><a href="/?do=legal_aid_form" class="underline">Заявка на юридическую помощь</a></div>
        <div style="border-bottom:1px solid #f3f3f3;padding:20px 10px;"><a href="/cabinet/edituserinfo" class="underline">Личные данные</a></div>
        <div style="border-bottom:1px solid #f3f3f3;padding:20px 10px;"><a href="/index.php?do=logout" class="underline">Выйти</a></div>
    </div>
</div>











</div>
</div>

