<?php
use app\components\MainMenu\FooterMenu;
?>
<div class="subscribe">
    <div class="subscribe_container">
        <!--<p class="subscribe_container_title">Новые статьи на почту:</p>
        <form action="" method="post">
            <input type="email" placeholder="Ваш e-mail">
            <button class="" type="submit">Подписаться</button>
        </form>-->
    </div>
</div>
<footer class="main-footer">
    <div class="main-footer--wrapper">
        <div class="footer-block">
            <h3 class="item-title">Быстрые переходы</h3>
            <div class='main_footer_item_title_arrow'></div>
            <ul class="menu-footer">
                <li class="item-link">
                    <a class="item-link-ref" href="/">Главная</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/news">Новости</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/reviews">Отзывы</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/o-portale-711ru.html">О портале</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/partners.html">Партнёры</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/contacts.html">Контакты</a>
                </li>
            </ul>
        </div>
        <!-- /footer-block -->
        <div class="footer-block">
            <h3 class="item-title">Cтраховые компании</h3>
            <div class='main_footer_item_title_arrow'></div>
            <ul class="menu-footer">
                <li class="item-link">
                    <a class="item-link-ref" href="/companies/">Рейтинг компаний</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/reviews/">Отзывы о страховых</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/vse-pravila.html">Полный каталог правил страхования</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/regions">Список филиалов страховых компаний</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/map">Карта адресов</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/calculator-kasko">Калькулятор каско</a>
                </li>
            </ul>
        </div>
        <!-- /footer-block -->
        <div class="footer-block">
            <h3 class="item-title">Виды страхования</h3>
            <div class='main_footer_item_title_arrow'></div>
            <ul class="menu-footer">
                <?= FooterMenu::widget(['items'=>$items,'options'=>$options])?>                 
            </ul>
        </div>
        <!-- /footer-block -->
        <div class="footer-block">
            <h3 class="item-title">Новости</h3>
            <div class='main_footer_item_title_arrow'></div>
            <ul class="menu-footer">
                <li class="item-link">
                    <a class="item-link-ref" href="/news/novosti-kompanii">Новости компаний</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/news/smi-o-strahovanii">СМИ о страховании</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/news/est-mnenie">Есть мнение</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/news/eksklyuziv">Наш эксклюзив</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/news/articles">Статьи</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/news/banks">Банки</a>
                </li>
                <li class="item-link">
                    <a class="item-link-ref" href="/news/economics">Экономика</a>
                </li>
            </ul>
            <div class="footer-block footer-block--social">
                <h3 class="item-title item-title--margin">Мы в соц.сетях</h3>
                <div class="social-icons">
                    <a class="social-icons-link" href="https://www.facebook.com/711-727071934074783/">
                        <svg version="1.1" class="facebook-ico"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 10.2 18.8" enable-background="new 0 0 10.2 18.8" xml:space="preserve">
                            <g id="Layer_1" display="none">
                                <g id="Menu" display="inline"></g>
                            </g>
                            <g id="Layer_3">
                                <g>
                                    <path class="fill" d="M10.2,10.2V6.4H6.4V4.8c0-0.6,0.4-1,0.7-1h3.1V0H7.1C4.7,0,2.8,2.3,2.8,4.9v1.5H0v3.8h2.8v8.7h3.6v-8.7
                                        H10.2z"/>
                                </g>
                                <g id="Menu_1_"></g>
                            </g>
                        </svg>
                    </a>
                    <a class="social-icons-link" href="https://vk.com/public90605327">
                        <svg version="1.1" class="vk-ico"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 21.4 12.2" enable-background="new 0 0 21.4 12.2" xml:space="preserve">
                            <g id="Layer_1" display="none">
                                <g id="Menu" display="inline"></g>
                            </g>
                            <g id="Layer_3">
                                <path class="fill" d="M10.5,12.1h1.3c0,0,0.4,0,0.6-0.3c0.2-0.2,0.2-0.6,0.2-0.6
                                    s0-1.7,0.8-2c0.8-0.2,1.8,1.7,2.9,2.4c0.8,0.6,1.4,0.4,1.4,0.4l2.9,0c0,0,1.5-0.1,0.8-1.3c-0.1-0.1-0.4-0.9-2.1-2.5
                                    c-1.8-1.7-1.6-1.4,0.6-4.3c1.3-1.8,1.8-2.8,1.7-3.3c-0.2-0.4-1.1-0.3-1.1-0.3l-3.2,0c0,0-0.2,0-0.4,0.1C16.4,0.8,16.3,1,16.3,1
                                    s-0.5,1.4-1.2,2.5c-1.4,2.4-2,2.6-2.2,2.4c-0.5-0.4-0.4-1.4-0.4-2.2c0-2.4,0.4-3.3-0.7-3.6C11.4,0.1,11.2,0,10.3,0
                                    C9.1,0,8.2,0,7.6,0.3C7.2,0.5,7,0.9,7.1,0.9c0.2,0,0.7,0.1,0.9,0.5c0.3,0.4,0.3,1.5,0.3,1.5S8.6,5.6,8,5.9c-0.4,0.2-1-0.2-2.3-2.5
                                    C5,2.3,4.5,1.1,4.5,1.1S4.4,0.9,4.2,0.7C4,0.6,3.8,0.5,3.8,0.5l-3.1,0c0,0-0.5,0-0.6,0.2c-0.1,0.2,0,0.5,0,0.5s2.4,5.6,5.1,8.4
                                    C7.6,12.3,10.5,12.1,10.5,12.1L10.5,12.1z"/>
                                <g id="Menu_1_"></g>
                            </g>
                        </svg>
                    </a>
                    <a class="social-icons-link" href="https://www.instagram.com/711_ru/">
                        <svg version="1.1" class="instagram-ico"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 17.8 17.8" enable-background="new 0 0 17.8 17.8" xml:space="preserve">
                        <g id="Layer_1" display="none">
                            <g id="Menu" display="inline"></g>
                        </g>
                        <g id="Layer_3">
                            <g>
                                <path class="fill" d="M13.5,8.9c0,2.5-2,4.6-4.6,4.6c-2.5,0-4.6-2.1-4.6-4.6c0-2.5,2.1-4.6,4.6-4.6C11.4,4.3,13.5,6.4,13.5,8.9z
                                    M5.9,8.9c0,1.6,1.3,3,2.9,3c1.7,0,3-1.3,3-2.9c0-1.7-1.3-3-3-3C7.3,5.9,5.9,7.3,5.9,8.9z"/>
                                <g>
                                    <path class="fill" d="M0,11.9c0-2,0-3.9,0-5.9c0-0.1,0-0.1,0-0.2c0-0.7,0.1-1.4,0.2-2C0.6,2.2,1.5,1.1,3,0.5
                                        C3.7,0.2,4.6,0.1,5.4,0C5.6,0,5.8,0,6,0c2,0,3.9,0,5.9,0C11.9,0,12,0,12,0c0.6,0,1.1,0,1.7,0.2c2,0.4,3.3,1.6,3.9,3.6
                                        c0.2,0.9,0.2,1.8,0.2,2.7c0,1.7,0,3.5,0,5.2c0,0.7,0,1.4-0.2,2c-0.4,2-1.6,3.3-3.6,3.8c-0.9,0.2-1.8,0.2-2.7,0.2
                                        c-1.9,0-3.7,0-5.6,0c-0.7,0-1.4,0-2.1-0.2c-1.5-0.4-2.6-1.2-3.2-2.7c-0.4-0.8-0.5-1.7-0.5-2.5C0,12.2,0,12,0,11.9z M16.2,8.9
                                        C16.2,8.9,16.2,8.9,16.2,8.9c0-0.7,0-1.5,0-2.2c0-0.7,0-1.4-0.1-2.1c-0.1-0.7-0.3-1.3-0.8-1.8c-0.6-0.7-1.5-1-2.4-1.1
                                        c-1.1-0.1-2.1-0.1-3.2-0.1c-1,0-2.1,0-3.1,0c-0.7,0-1.4,0-2.1,0.1C3.9,1.8,3.3,2,2.8,2.5C1.9,3.3,1.5,4.2,1.7,4.9
                                        C1.9,5.9,1.6,7,1.6,8c0,1,0,2.1,0,3.1c0,0.7,0,1.4,0.1,2.1c0.1,0.7,0.3,1.3,0.8,1.8c0.6,0.7,1.5,1,2.4,1.1
                                        C5.9,16.2,7,16.2,8,16.2c1,0,2.1,0,3.1,0c0.8,0,1.5,0,2.3-0.2c1.3-0.2,2.2-1,2.5-2.2c0.1-0.4,0.2-0.9,0.2-1.3
                                        C16.2,11.3,16.2,10.1,16.2,8.9z"/>
                                    <g>
                                        <path class="fill" d="M14.7,4.2c0,0.6-0.5,1.1-1.1,1.1c-0.6,0-1.1-0.5-1.1-1.1c0-0.6,0.5-1.1,1.1-1.1
                                            C14.3,3.1,14.7,3.6,14.7,4.2z"/>
                                    </g>
                                </g>
                            </g>
                            <g id="Menu_1_"></g>
                        </g>
                    </a>
                </div>
            </div>
        </div>
            
        <!-- /footer-block -->
        <div class="footer-block footer-block--social footer-block--copyrights">
            <p class="copyrights">
                <center id="counters">
                <!-- Yandex.Metrika counter -->
                <script type="text/javascript"> (function(d, w, c) {
                        (w[c] = w[c] || []).push(function() {
                            try {
                                w.yaCounter30738773 = new Ya.Metrika({id: 30738773, clickmap: true, trackLinks: true, accurateTrackBounce: true, webvisor: true});
                            } catch (e) {
                            }
                        });
                        var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function() {
                            n.parentNode.insertBefore(s, n);
                        };
                        s.type = "text/javascript";
                        s.async = true;
                        s.src = "https://mc.yandex.ru/metrika/watch.js";
                        if (w.opera == "[object Opera]") {
                            d.addEventListener("DOMContentLoaded", f, false);
                        } else {
                            f();
                        }
                    })(document, window, "yandex_metrika_callbacks");
                </script>
                <noscript>
                <div>
                    <img src="https://mc.yandex.ru/watch/30738773" style="position:absolute ; left:-9999px;" alt="" />
                </div>
                </noscript>
                <!-- Rambler counter -->
                <script id="top100Counter" type="text/javascript" src="http://counter.rambler.ru/top100.jcn?3107394"></script>
                <noscript>
                <a  href="http://top100.rambler.ru/navi/3107394/">
                    <img src="http://counter.rambler.ru/top100.cnt?3107394" alt="Rambler's Top100" border="0" />
                </a>
                </noscript>
                <!-- LiveInternet counter -->
                <script type="text/javascript">
                    document.write("<a style='padding-left: 3px;' href='//www.liveinternet.ru/click' " +
                            "target=_blank><img src='//counter.yadro.ru/hit?t45.2;r" +
                            escape(document.referrer) + ((typeof (screen) == "undefined") ? "" :
                            ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                                    screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
                            ";" + Math.random() +
                            "' alt='' title='LiveInternet' " +
                            "border='0' width='31' height='31'><\/a>")
                </script>
            </center>
                <p id="copyright">
                    &copy; 2004-2016, ООО "711.ру"
                    <a href="mailto:info@711.ru">info@711.ru</a> . +7 (495) 778-5-711
                </p>
        </div>
    </div>  
    <!-- /main-footer--wrapper-->
</footer>