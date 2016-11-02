
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
<!--<div title="Оставить отзыв" id="add_review_block">
    <form enctype="multipart/form-data" data-redirect-to="/companies/<?php //echo $id ?>#company_reviews" id="add_review_form" action="#">
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
</div>-->
