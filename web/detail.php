<?php
use yii\helpers\HtmlPurifier;
$this->title = $new['title']." » 711.ru - Независимый портал о страховании";
?>
<div id="newsspeedbar" style="float:left;width:645px;">
    <div style="padding-left: 10px">
        <div class="speedbar">
            <span id="olit-speedbar">
                <a href="/">711.ru</a> » <a href="/news/">Новости</a> » <a href="/news/<?= HtmlPurifier::process($new['category_altname']) ?>"><?= HtmlPurifier::process($new['category_name']) ?></a> » <?= HtmlPurifier::process($new['title']) ?>
            </span>
        </div>
    </div>
</div>
<div style="float:left;width:645px; height: auto;">
    <div id="olit-content">
        <h1 class="fullh1">
            <span id="selection_index1" class="selection_index"></span>
            <?= HtmlPurifier::process($new['title']) ?>
        </h1>
        <br>
        <div class="clr"></div>
        <p class="datefull">
            <span id="selection_index2" class="selection_index"></span>
            <?= HtmlPurifier::process($new['date']) ?>
        </p>
        <br>
        <div data-yasharequickservices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,friendfeed,moikrug,gplus" data-yasharetype="none" data-yasharel10n="ru" class="yashare-auto-init" style="margin:0px 10px;"><span class="b-share"><a data-service="vkontakte" href="https://share.yandex.net/go.xml?service=vkontakte&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__vkontakte" title="ВКонтакте" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_vkontakte"></span></a><a data-service="facebook" href="https://share.yandex.net/go.xml?service=facebook&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__facebook" title="Facebook" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_facebook"></span></a><a data-service="twitter" href="https://share.yandex.net/go.xml?service=twitter&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__twitter" title="Twitter" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_twitter"></span></a><a data-service="odnoklassniki" href="https://share.yandex.net/go.xml?service=odnoklassniki&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__odnoklassniki" title="Одноклассники" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_odnoklassniki"></span></a><a data-service="moimir" href="https://share.yandex.net/go.xml?service=moimir&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__moimir" title="Мой Мир" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_moimir"></span></a><a data-service="lj" href="https://share.yandex.net/go.xml?service=lj&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__lj" title="LiveJournal" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_lj"></span></a><a data-service="friendfeed" href="https://share.yandex.net/go.xml?service=friendfeed&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__friendfeed" title="FriendFeed" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_friendfeed"></span></a><a data-service="moikrug" href="https://share.yandex.net/go.xml?service=moikrug&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__moikrug" title="Мой Круг" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_moikrug"></span></a><a data-service="gplus" href="https://share.yandex.net/go.xml?service=gplus&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__gplus" title="Google Plus" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_gplus"></span></a></span></div>
        <div class="clr"></div>
        <div style="float:left;margin:0px 20px;" class="fullstory-img">
            <img style="max-width: 610px" src="<?= HtmlPurifier::process($new['image']) ?>">
        </div>
        <div class="clr"></div>
        <div class="fullnews">
            <div style="display:inline;" id="news-id-17412">
                <?= HtmlPurifier::process($new['full_story']) ?>
            </div>
        </div>
        <div class="clr"></div>
        <p style="float:left;margin:0px 20px;">
            <span id="selection_index35" class="selection_index"></span>
            Источник: 711
        </p>
        <div class="clr"></div>
        <script charset="utf-8" src="//yandex.st/share/share.js" type="text/javascript"></script>
        <div data-yasharequickservices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,friendfeed,moikrug,gplus" data-yasharetype="none" data-yasharel10n="ru" class="yashare-auto-init" style="margin:0px 10px;"><span class="b-share"><a data-service="vkontakte" href="https://share.yandex.net/go.xml?service=vkontakte&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__vkontakte" title="ВКонтакте" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_vkontakte"></span></a><a data-service="facebook" href="https://share.yandex.net/go.xml?service=facebook&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__facebook" title="Facebook" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_facebook"></span></a><a data-service="twitter" href="https://share.yandex.net/go.xml?service=twitter&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__twitter" title="Twitter" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_twitter"></span></a><a data-service="odnoklassniki" href="https://share.yandex.net/go.xml?service=odnoklassniki&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__odnoklassniki" title="Одноклассники" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_odnoklassniki"></span></a><a data-service="moimir" href="https://share.yandex.net/go.xml?service=moimir&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__moimir" title="Мой Мир" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_moimir"></span></a><a data-service="lj" href="https://share.yandex.net/go.xml?service=lj&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__lj" title="LiveJournal" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_lj"></span></a><a data-service="friendfeed" href="https://share.yandex.net/go.xml?service=friendfeed&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__friendfeed" title="FriendFeed" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_friendfeed"></span></a><a data-service="moikrug" href="https://share.yandex.net/go.xml?service=moikrug&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__moikrug" title="Мой Круг" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_moikrug"></span></a><a data-service="gplus" href="https://share.yandex.net/go.xml?service=gplus&amp;url=http%3A%2F%2Fwww.711.ru%2Fnews%2Fest-mnenie%2F17412-nikolay-galushin-o-buduschem-strahovom-rynke.html&amp;title=%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B9%20%D0%93%D0%B0%D0%BB%D1%83%D1%88%D0%B8%D0%BD%3A%20%D0%BE%20%D0%B1%D1%83%D0%B4%D1%83%D1%89%D0%B5%D0%BC%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%BC%20%D1%80%D1%8B%D0%BD%D0%BA%D0%B5%20%C2%BB%20711%20-%20%D0%9D%D0%B5%D0%B7%D0%B0%D0%B2%D0%B8%D1%81%D0%B8%D0%BC%D1%8B%D0%B9%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B8" class="b-share__handle b-share__link b-share-btn__gplus" title="Google Plus" target="_blank" rel="nofollow"><span class="b-share-icon b-share-icon_gplus"></span></a></span></div>
        <p style="float:left;margin:0px 20px;">
            <a href="javascript:history.go(-1)">
                <span id="selection_index36" class="selection_index"></span>
                Назад
            </a>
        </p>
        <div class ='advertising' style ='margin-left: 10px;'>
            <a href = "https://online.binins.ru/PARTNERS/VZROnLineN.aspx?ID_PARTNER=62434fc8-0f28-4dc2-adaa-b5a40344b280" />
            <img src ="/olitimages/banners/insurance-policy-for-travelers.jpg" />
            </a>
            <a href = "https://online.binins.ru/PARTNERS/FlatOnLineN.aspx?ID_PARTNER=62434fc8-0f28-4dc2-adaa-b5a40344b280" />
            <img src ="/olitimages/banners/insurance-policy-apartments.jpg" style =''/>
            </a>
        </div>
        <div class="clr"></div>
        <div class="more-news ">
            <div style="font-weight: bold; font-size: 16px" class="fullnews">
                <span id="selection_index37" class="selection_index"></span>
                Другие новости:
            </div>
            <div class="clr"></div>
            <div class="same_news">
                <?php foreach ($another_news as $another_new): ?>
                    <div class="same_one_new">
                        <div class="same_new_photo">
                            <img src="<?= HtmlPurifier::process($another_new['image']) ?>">
                        </div>
                        <div class="same_news_title">
                            <a href="<?= HtmlPurifier::process($another_new['url']) ?>"><span id="selection_index38" class="selection_index"></span>
                                <?= HtmlPurifier::process($another_new['title']) ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="clr"></div>
        <div style="height: 20px;">
            <hr>
        </div>
        <div id="comments">
            Коментарии: (<?= HtmlPurifier::process(count($comments)) ?>)
            <a style="float: right" href="#comment_form">Оставить комментарий:</a>
            <? foreach($comments as $comment): ?>
            <div id="comment">
                <div class="gray_comment">
                    <?= HtmlPurifier::process($comment['date']) ?>
                    <br>
                    <?= HtmlPurifier::process($comment['name']) ?>
                </div>
                <div style="width:100%;" class="black_comment">
                    <?= HtmlPurifier::process($comment['comment']) ?>
                </div>
            </div>
            <? endforeach; ?>
        </div>
        <a name="comment_form"></a>
        <form method="post" action="/news/addcomment">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
            <input type="hidden" name="backUrl" value="<?= $_SERVER['REQUEST_URI'] ?>#comment_form" />
            <input type="hidden" name="post_id" value="<?= $new['id'] ?>" />
            <table width="80%" align="center">
                <tbody><tr>
                        <td colspan="2">
                            Добавить комментарий: 
                        </td>
                    </tr>
                    <tr>
                        <td width="20%">
                            Представьтесь*
                        </td>
                        <td>
                            <input type="text" value="" class="name_comment" name="name">
                        </td><td></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea cols="80" rows="8" class="comment_comment" id="editor" name="comment" style="visibility: hidden; display: none;"></textarea>
                            <script>
                                CKEDITOR.replace('editor');
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Опубликовать" name="review_comment">  
                        </td>
                    </tr>
                </tbody></table>
        </form>
    </div>
</div>
<div style="float:right;width:290px;margin-top:-35px; ">


    <div id="left_block_middle_head">Читайте также</div>
    <div id="left_block_comment_content">
        <? foreach($another_news_in_cats as $altname => $category): ?>
        <div class="left-news_category">
            <a class="category<?= HtmlPurifier::process($category['color']) ?>  left-news_category-title" href="/news/<?= HtmlPurifier::process($altname) ?>">  
                <?= HtmlPurifier::process($category['news'][0]['category']) ?>
            </a>
            <div style="clear: both"></div>
            <? foreach($category['news'] as $another_new): ?>
            <div class="left-one_new">
                <div class="left-news_date">
                    <?= HtmlPurifier::process($another_new['date']) ?>            
                </div>   
                <div class="left-news_title">
                    <a href="<?= HtmlPurifier::process($another_new['url']) ?>">
                        <?= HtmlPurifier::process($another_new['title']) ?>
                    </a>
                </div>
            </div>
            <? endforeach; ?>
        </div>
        <? endforeach; ?>
    </div>
    <div style="clear:both"></div>

    <?php print_r($new['type'])
    ?>
    <!------ если Путешествия или Имущество показываем баннер ------>
    <?php
    $show = false;
    if (isset($new['type']) && is_array($new['type'])) {
        foreach ($new['type'] as $one_type) {
            if (in_array($one_type, ['3', '11', '12'], true)) {
                $link = 'VZR.JPG';
                $link_out = 'https://online.binins.ru/PARTNERS/VZROnLineN.aspx?ID_PARTNER=62434fc8-0f28-4dc2-adaa-b5a40344b280';
                $show = true;
                break;
            }

            if (in_array($one_type, ['8', '9', '10'], true)) {
                $link = 'property.JPG';
                $link_out = 'https://online.binins.ru/PARTNERS/FlatOnLineN.aspx?ID_PARTNER=62434fc8-0f28-4dc2-adaa-b5a40344b280';
                $show = true;
                break; 
                
            }
        }
    }
    if ($show == true):
        ?>
        <div style="float:right;width:290px;margin-top:-5px; ">
            <a href = "<?= $link_out ?>" />
            <img src ="/olitimages/banners/<?= $link ?>" />
            </a>
        </div>
        <div style ='clear:both'></div>
<?php endif; ?>
    <!----- конец баннера ---->

    <div>
        <div id="left_block_middle_head">КОММЕНТАРИИ</div>
        <div id="left_block_comment_content">
            <? foreach($lastComments as $comment): ?>
            <div style="border-bottom:1px dashed black;font-size:12px; margin-bottom: 12px;">
                <div style="padding:5px;">
                    <div style="color:#999999;font-style: italic;">
<?= HtmlPurifier::process($comment['date']) ?>                           
                    </div>
                    <div id="user_left_block">
                        <a class="underline" href="mailto:"><?= HtmlPurifier::process($comment['name']) ?></a>
                    </div>
                    <div id="comment_left_block">
<?= HtmlPurifier::process($comment['text']) ?>
                        <a href="<?= HtmlPurifier::process($comment['url']) ?>">→</a>
                    </div>
                    <div style="padding-top:4px;text-align:justify;">
                        К новости: <br> <a href="<?= HtmlPurifier::process($comment['url']) ?>" style="text-align: left">
                        <?= HtmlPurifier::process($comment['new_title']) ?></a>
                    </div>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>