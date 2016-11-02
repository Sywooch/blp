<?php
$this->title = "Отзывы о работе страховых компаний, мнения клиентов | 711.ru";
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Отзывы, отзывы о работе страховых компаний, страховые отзывы, качество работы, мнение клиентов, ОСАГО, автострахование']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Отзывы о работе страховых компаний. Мнения клиентов по каско, ОСАГО и другим видам страхования.']);
use \yii\widgets\LinkPager;
?>
<div class="row"> 
    <div class="col-md-8 no-padding-right">
        <div id="olit-content">
            <a style="padding-left:10px" href="/">711</a> &gt;&gt; Отзывы
            <div style="font-size: 13px; padding: 5px; padding-bottom: 10px;">
                <div>
                    <h1 class="h1Header3">&nbsp;&nbsp;&nbsp;&nbsp;Отзывы о работе страховых компаний</h1>
                    <div style="margin-left: 20px;  display: inline; ">Всего отзывов: 23589</div>
                    <div style=" display: inline; margin-left: 330px;">
                        <a style="line-height:32px;float:none;margin:0px auto;" target="_blank" href="/addreview/" class="">
                            ОСТАВИТЬ ОТЗЫВ
                        </a>
                    </div>
                </div>
                <div>
                    <span style="margin-left: 20px">Отзывы о конкрентой компании:</span>
                    <form style=" display:inline" id="reviews_filter" method="get" action="/reviews/">

                        <select required="" name="company-id" style="width:200px;height:25px;margin-left: 30px;">
                            <option value="">Выберите компанию</option>
                            <? foreach($companies as $company) : ?>
                            <option value="<?= $company['id'] ?>"><?= $company['name'] ?></option>
                            <? endforeach; ?>
                        </select>
                        <input type="submit" style="margin-left:40px" id="button_select_insurance2" value="Найти">
                    </form>
                </div>            
            </div>
            <div style="background:#e5e5e5;">
                <div style="clear:both;text-align:center;">
                </div>
                <div class="print_company_reviews">
                    <section id="company_reviews">
                        <?php foreach ($reviews['reviews'] as $review): ?>
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
                                            <div style="float:right;width:95px;height:18px;background:url(/images/rating<?= $review['rating'] ?>.png);"></div>
                                            <div style="clear:both;"></div>
                                        </div>
                                    </header>
                                    <div style="text-align:justify;"><b></b></div>       
                                    <div style="text-align:justify;">
                                        <a href="/reviews/<?= $review['id'] ?>" class="list"><?= $review['text'] ?></a>
                                    </div>
                                    <footer>
                                        <em style="float:left;">
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
                                        <?php
                                        if (!empty($review['comments'])) {
//                                            echo $review['comments'][0]->text;
                                        }
                                        ?>
                                        <?php //echo $review['answer']['text'] ?>
                                    </article>
                                </section>
                            </section>
                        <?php endforeach; ?>
                        <?= LinkPager::widget(['pagination' => $reviews['pages']]) ?>
                    </section>

                </div>
                <div enctype="multipart/form-data" title="Оставить отзыв" id="add_review_block">
                    <form id="add_review_form" action="#">
                        <h2>Оставить отзыв</h2>
                        <label class="block">
                            Страховая компания 
                            <select required="required" class="companies_list" name="company_id">
                                <option value="">Выберите</option>
                                <option value="-1">Нет в списке</option>
                                <option value="2715">АИГ (бывш. Чартис)</option><option value="25">Айни Международная СК</option><option value="26">Альфастрахование, ОАО</option><option value="76">Альянс (бывш. РОСНО)</option><option value="27">Аско</option><option value="87">БИН Страхование (бывшая 1СК)</option><option value="2705">Важно. Новое страхование</option><option value="28">Верна</option><option value="29">ВСК</option><option value="30">ВТБ Страхование</option><option value="31">Гелиос</option><option value="32">Генеральный Страховой Альянс</option><option value="33">Геополис ООО</option><option value="34">Гефест</option><option value="35">Городская страховая компания</option><option value="36">ГУТА Страхование</option><option value="37">Д2 Страхование</option><option value="2711">ДАР</option><option value="38">ЖАСО</option><option value="50">Зетта Страхование (бывш. Цюрих)</option><option value="2735">Инвестиции и финансы</option><option value="39">Ингосстрах</option><option value="40">Инногарант</option><option value="41">Интач Страхование (INTOUCH)</option><option value="2714">ИСК Евро-Полис</option><option value="2710">Компаньон</option><option value="43">Контакт-Страхование</option><option value="44">КРК-Страхование</option><option value="42">Либерти Страхование</option><option value="49">ЛОЙД-СИТИ</option><option value="51">МАКС</option><option value="55">Мегарусс-Д</option><option value="58">МСК-Стандарт (бывш. Стандарт Резерв)</option><option value="59">Национальная Страховая Группа (НСГ)</option><option value="63">Объединенная страховая компания</option><option value="65">ОРАНТА</option><option value="73">ОСНОВА</option><option value="82">Открытие страхование</option><option value="88">ПАРИ</option><option value="86">Прогресс-Гарант (входит в Альянс)</option><option value="85">РАСО</option><option value="84">Регард Страхование</option><option value="83">Рекон</option><option value="81">Ренессанс Страхование</option><option value="80">РЕСО-Гарантия</option><option value="79">РК гарант</option><option value="78">Росгосстрах ООО</option><option value="77">Росинвест</option><option value="75">Россия ОСАО</option><option value="74">РОССТРАХ</option><option value="72">Ростра</option><option value="71">РСТК</option><option value="2712">РСХБ-Страхование</option><option value="70">РУКСО</option><option value="68">Русская страховая компания</option><option value="67">Русские страховые традиции</option><option value="2727">Русский Стандарт Страхование</option><option value="2708">Сбербанк Страхование</option><option value="2709">Сбербанк страхование жизни</option><option value="69">Северная Казна</option><option value="61">СК «СОЮЗ»</option><option value="66">Советская (бывш. Протектум Мобиле)</option><option value="64">СОГАЗ</option><option value="62">Согласие</option><option value="60">Спасские Ворота</option><option value="2713">СТРАЖ МСК</option><option value="57">Страховая Группа МСК</option><option value="56">Сургутнефтегаз</option><option value="2707">Тинькофф Страхование</option><option value="54">ТПСО</option><option value="53">УралСиб</option><option value="2762">ХОСКА</option><option value="52">Энергетическая Страховая Компания</option><option value="48">Энергогарант</option><option value="47">ЭРГО-Русь</option><option value="46">Югория</option><option value="45">Якорь</option>
                            </select>
                        </label>
                        <label style="display:none;" class="block">
                            Название страховой компании <span class="important">*</span>
                            <input type="text" name="company_name">
                        </label>


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
                            Вид страхования <span class="important">*</span>
                            <select required="required" name="type">
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
                        <label class="block">
                            Подробности <span class="important">*</span>
                            <textarea required="required" name="comment"></textarea>
                        </label>
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
                            или его представителя, в связи с моим обращением.
                        </label>
                        <input type="submit" value="Оставить отзыв">
                    </form>
                </div>
            </div>
            <script>
                /*jQuery(function ($) {
                 // filter
                 $('#reviews_filter').submit(function () {
                 var id = $(this).find('select').val();
                 if (!id)
                 return false;
                 location.href = olit_root + 'companies/' + id + '#company_reviews';
                 return false;
                 });
                 });*/
            </script>
        </div>
    </div> 
    <div class="col-md-4">
        <div>  
            <div id="left_block_top_insurance"></div> 
            <div id="left_insurence_all_content">
                <a id="left_block_middle_head2" href="/companies/">СТРАХОВЫЕ КОМПАНИИ</a>
                <div style="background: white">
                    <div style="width:100%;font-family:verdana;background:white;" id="block_opinion_title">
                        <div style="padding:8px 5px; margin: 0 5px 0 5px; border-bottom: 1px #000 ridge">
                            <div style="font-size:12px;float: left;" id="company_name_name">Название компании</div>
                            <div id="top_insurance_count_reviews">Отзывы</div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <?php foreach ($companies as $company): ?>
                        <a id="link_insurance_company" href="/companies/<?= $company['id'] ?>">
                            <div style="width:100%;font-family:verdana;background:white;" id="block_opinion">
                                <div style="padding:8px 5px; background: white">
                                    <div style="font-size:12px;float: left;" id="company_name"><?= $company['name'] ?></div>
                                    <div id="top_insurance_count_reviews"><?= $company['reviews'] ?><br></div>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div>  

            <div style="background-color:white;margin-top:35px;" id="left_block_top_insurance">
            </div> 
            <div id="left_insurence_all_content">
                <div id="left_block_middle_head">Последние комментарии к отзывам</div>
                <div style="clear:both;"></div>
                <div style="background:white">
                    <?php foreach ($lastComments as $comment): ?>
                        <div style="padding:5px; border-bottom: 1px black dashed">
                            <div style="color:#999999;font-style: italic;"><?= $comment['date'] ?></div>
                            <div id="user_left_block"><?= $comment['author_name'] ?></div>
                            <div id="comment_left_block">
                                <?= $comment['trunc_comment'] ?>
                                <?php if ($comment['full_comment']): ?>
                                    <a href="/reviews/<?= $comment['review_id'] ?>">→</a>
                                <?php endif; ?>
                            </div>

                            <div style="padding-top:4px;text-align:left; word-wrap: break-word;">
                                К отзыву о работе компании <?= $comment['company_name'] ?>: 
                                <a style="text-align: left" href="/reviews/<?= $comment['review_id'] ?>">
                                    №<?= $comment['review_id'] ?>   
                                </a>
                                <div id="count_comments">
                                    <strong><?= $comment['count'] ?></strong>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $('.likes_block > div.like-icon').on('mouseover', function() {
        $(this).next().show();
    });
    $('.likes_block > div.like-icon').on('mouseout', function() {
        $(this).next().hide();
    });
</script>

