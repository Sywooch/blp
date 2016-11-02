<section class="personalarea_right shadow">
    <p class="personalarea_right_head">Мой профиль</p>
    <div class="personalarea_right_links">
        <p class="personalarea_right_links_item"><?= Yii::$app->user->identity->name?></p>

         <a href="/lk" class="personalarea_right_links_item">Список отзывов</a>
        <a href="/mydata" class="personalarea_right_links_item">Личные данные</a>
        <a href="/register/logout" class="personalarea_right_links_item">Выйти</a>
    </div>
</section>