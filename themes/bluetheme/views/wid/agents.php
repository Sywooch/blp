<main class="agents clear">



    <div class="agents_search shadow clear">
        <h3 class="agents_search_title clear">
            Поиск страховых агентов
            <img src="../bluetheme/img/arrow_bottom_black.svg" id="agents_search_title_img" alt="">
        </h3>
        <span id="agents_search_form_specialization">
            Специализация
        </span>
        <form action="" class="agents_search_form">
            <div id="agents_search_form_specialization_choosed"><!-- Здесь результаты выбора специализаций --></div>
            <div id="company-search">
                <div>
                    <input type="text" id="region" name="region" placeholder="Выбрать регион" class="big-autoselect ui-autocomplete-input" autocomplete="off">
                    <div class="arrow">∨</div>
                    <label class="error region"></label>
                </div>
                <div>
                    <input type="text" id="city" name="city" placeholder="Выбрать город" class="big-autoselect ui-autocomplete-input" required="" autocomplete="off">
                    <div class="arrow">∨</div>
                    <label class="error city"></label>
                </div>
            </div>
            <div class="agents_placeholder">Ф.И.О.</div>
            <input type="text" id="agent_name" placeholder="Ф.И.О. агента">
            <div class="agents_placeholder">Компания</div>
            <div id="company-search">
                <div class="agents_companies_choose">
                    <input type="text" id="city" name="city" placeholder="Выбрать город" class="big-autoselect ui-autocomplete-input" required="" autocomplete="off">
                    <div class="arrow">∨</div>
                    <label class="error city"></label>
                </div>
            </div>

            <input class="agents_search_form_options_inputs" type="checkbox" name="" id="isonline" placeholder="">
            <label class="agents_search_form_options" for="isonline">Сейчас на сайте</label>
            <input class="agents_search_form_options_inputs" type="checkbox" name="" id="withphoto" placeholder="">
            <label class="agents_search_form_options" for="withphoto">С фотографией</label>
            <input class="agents_search_form_options_inputs" type="checkbox" name="" id="top-agent" placeholder="">
            <label class="agents_search_form_options" for="top-agent">Топ-агент</label>

            <button type="submit" href="" class="find_agent">
                Найти агента
            </button>


        </form>
        <form action="">
            <div class="agents_search_form_specialization_items shadow">
                <div class="agents_search_form_specialization_items_block">
                    <input class="agents_search_form_specialization_items_input" type="checkbox" value='1' id='1'>
                    <label class="agents_search_form_specialization_items_label" for="1">Каско</label>
                </div>
                <div class="agents_search_form_specialization_items_block">
                    <input class="agents_search_form_specialization_items_input" type="checkbox" value='2' id='2'>
                    <label class="agents_search_form_specialization_items_label" for="2">Осаго</label>
                </div>
                <div class="agents_search_form_specialization_items_block">
                    <input class="agents_search_form_specialization_items_input" type="checkbox" value='3' id='3'>
                    <label class="agents_search_form_specialization_items_label" for="3">Страхование квартиры</label>
                </div>
                <div class="agents_search_form_specialization_items_block">
                    <input class="agents_search_form_specialization_items_input" type="checkbox" value='4' id='4'>
                    <label class="agents_search_form_specialization_items_label" for="4">Страхование дома</label>
                </div>
                <div class="agents_search_form_specialization_items_block">
                    <input class="agents_search_form_specialization_items_input" type="checkbox" value='5' id='5'>
                    <label class="agents_search_form_specialization_items_label" for="5">Страхование от несчастных случаев</label>
                </div>
                <div class="agents_search_form_specialization_items_block">
                    <input class="agents_search_form_specialization_items_input" type="checkbox" value='6' id='6'>
                    <label class="agents_search_form_specialization_items_label" for="6">ДМС</label>
                </div>
                <div class="agents_search_form_specialization_items_block">
                    <input class="agents_search_form_specialization_items_input" type="checkbox" value='7' id='7'>
                    <label class="agents_search_form_specialization_items_label" for="7">Туристическое страхование</label>
                </div>
                <div class="agents_search_form_specialization_items_block">
                    <input class="agents_search_form_specialization_items_input" type="checkbox" value='8' id='8'>
                    <label class="agents_search_form_specialization_items_label" for="8">Ипотечное страхование</label>
                </div>
                <div class="agents_search_form_specialization_items_block">
                    <input class="agents_search_form_specialization_items_input" type="checkbox" value='9' id='9'>
                    <label class="agents_search_form_specialization_items_label" for="9">Страхование жизни</label>
                </div>
                <span id="agents_search_form_specialization_items_choose">
                    Применить
                </span>
                <button type="reset"class="agents_search_form_specialization_items_reset">
                    Сбросить все
                </button>
                <img id="agents_search_form_specialization_items_close" src="../bluetheme/img/closing_cross_gray.svg" alt="">
            </div>
        </form>
    </div>



    <div class="agents_right">
        <h3 class="agents_right_title">Страховые агенты в Москве и Московской обл.</h3>

        <p class="agents_right_searched">Найдено
            <span class="agents_right_searched_counter">11 432</span>
            страховых агента
        </p>

        <div class="agents_right_fil clear">
            <p class="agents_right_filter">
                Сортировать по:
            </p>
            <select class="agents_right_filter_items" name="">
                <option value="">По умолчанию</option>
                <option value="">По возрасту</option>
                <option value="">По рейтингу</option>
                <option value="">На сайте</option>
            </select>

            <a href="" class="agents_right_filter_aboutservice">
                О сервисе
            </a>
        </div>

        <div class="agents_right_card">
            <div class="agents_right_card_photo agents_right_card_punkt">
                <img src="http://doseng.org/uploads/posts/2012-05/thumbs/1337281219_funny_faces_collection_46.jpg" alt="">
            </div>
            <div class="agents_right_card_information agents_right_card_punkt">
                <a href="" class="agents_right_card_information_name">Самуил Яковлевич Фахрутдинов</a>
                <span class="agents_right_card_information_name_top">Топ-агент</span>
                <div class="agents_right_card_information_experience">
                    Опыт работы лет - <span class="agents_right_card_experience_counter">19</span>.
                </div>
                <div class="agents_right_card_information_experienceIn">
                    Специализируется на следующих видах страхования:
                    <br>
                    <a href="" class="tag_one">ОСАГО</a>
                    <a href="" class="tag_one">Каско</a>
                    <a href="" class="tag_one">Страхование квартир</a>
                    <a href="" class="tag_one">Какое-то другое страхование</a>
                    <a href="" class="tag_one">Каско</a>
                    <a href="" class="tag_one">Страхование квартир</a>
                    <a href="" class="tag_one">Какое-то другое страхование</a>
                </div>
            </div>
            <div class="agents_right_card_rating agents_right_card_punkt">
                Рейтинг

                <span class="stars">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark-no.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark-no.svg">
                </span>
                <a class="agents_right_card_punkt_online">На сайте</a>
            </div>
        </div>


        <div class="agents_right_card">
            <div class="agents_right_card_photo agents_right_card_punkt">
                <img src="http://lifeglobe.net/media/entry/479/image007_3.jpg" alt="">
            </div>
            <div class="agents_right_card_information agents_right_card_punkt">
                <a href="" class="agents_right_card_information_name">Страховщиков Страховщик Страховщикович</a>
                <!-- <span class="agents_right_card_information_name_top">Топ-агент</span> -->
                <div class="agents_right_card_information_experience">
                    Опыт работы лет - <span class="agents_right_card_experience_counter">19</span>.
                </div>
                <div class="agents_right_card_information_experienceIn">
                    Специализируется на следующих видах страхования:
                    <br>
                    <a href="" class="tag_one">ОСАГО</a>
                </div>
            </div>
            <div class="agents_right_card_rating agents_right_card_punkt">
                Рейтинг

                <span class="stars">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark-no.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark-no.svg">
                </span>
                <!-- <a class="agents_right_card_punkt_online">На сайте</a> -->
            </div>
        </div>


        <div class="agents_right_card">
            <div class="agents_right_card_photo agents_right_card_punkt">
                <img src="http://cdn.trinixy.ru/pics5/20120717/grimace_06.jpg" alt="">
            </div>
            <div class="agents_right_card_information agents_right_card_punkt">
                <a href="" class="agents_right_card_information_name">Самуил Яковлевич Фахрутдинов</a>
                <span class="agents_right_card_information_name_top">Топ-агент</span>
                <div class="agents_right_card_information_experience">
                    Опыт работы лет - <span class="agents_right_card_experience_counter">19</span>.
                </div>
                <div class="agents_right_card_information_experienceIn">
                    Специализируется на следующих видах страхования:
                    <br>
                    <a href="" class="tag_one">Каско</a>
                    <a href="" class="tag_one">Страхование квартир</a>
                    <a href="" class="tag_one">Какое-то другое страхование</a>
                </div>
            </div>
            <div class="agents_right_card_rating agents_right_card_punkt">
                Рейтинг

                <span class="stars">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark-no.svg">
                    <img width="20" class="stars-marked star" src="/bluetheme/img/mark-no.svg">
                </span>
                <a class="agents_right_card_punkt_online">На сайте</a>
            </div>
        </div>

        <div class="agents_right_pagination">
            <ul>
                <li>
                    <a class="agents_right_pagination_turn agents_right_pagination_prev" href=""></a>
                </li>
                <li>
                    <a href="">1</a>
                </li>
                <li>
                    <a href="">2</a>
                </li>
                <li>
                    <a href="">3</a>
                </li>
                <li>
                    <a href="">4</a>
                </li>
                <li>
                    <a href="">5</a>
                </li>
                <li>
                    <a class="agents_right_pagination_turn agents_right_pagination_turn--active agents_right_pagination_next" href=""></a>
                </li>
            </ul>
        </div>

    </div>

    <div class="motivate_block shadow">
        <p class="motivate_block_text">Влияйте на рейтинг страховых агентов и компаний!</p>
        <p class="motivate_block_text">Помогите другим выбрать правильного страховщика.</p>
        <a href="" class="leaveTheCommentBlock_button">
                Оставить отзыв
            </a>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var fadeInBlock = $('.agents_search_form_specialization_items');//,блок с инпутами
        var checkedInputs = $('.agents_search_form_specialization_items_input');//инпуты. проверять чекнут или нет
        var specialized = $('#agents_search_form_specialization'); //куда кликаем, чтобы показать блок?
        var cross = $('#agents_search_form_specialization_items_close'); //крестик для закрытия
        // var block_with_input = $('.agents_search_form_specialization_items_block');
        var primenit = $('#agents_search_form_specialization_items_choose');
        specialized.click(function(){
            fadeInBlock.fadeIn();
        })
        cross.click(function(){
            fadeInBlock.fadeOut();
        })
        primenit.click(function(){
            fadeInBlock.fadeOut();
            checkedInputs.each(function(key, item){
                    // console.log(key, item);
                    // console.log($(item).is(':checked'));
                    if($(item).is(':checked')){
                        $(this).next().clone().appendTo($('#agents_search_form_specialization_choosed'));
                        $(this).clone().appendTo($('#agents_search_form_specialization_choosed'));
                    }
            })
            specialized.text('Выбранные специализации: ');
            specialized.unbind(); //убиваем обработчик события на специализации
            specialized.css({'cursor':'default'});
        })
        //проверяем количество элементов в блоке со вставленными инпутами
        // function aaa(){
        //     console.log($('#agents_search_form_specialization_choosed').find('label').length)
        // }
        // setInterval(aaa, 2000)
    })
</script>
<script>
    $(document).ready(function(){
        $('.agents_search_title').click(function(){
            if($(window).width() < 321){
                $('.agents_search').toggleClass('agents_search_fullheight');
                $('#agents_search_title_img ').toggleClass('agents_search_title_img');
            }
        })
    })
</script>

