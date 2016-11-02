<?php
use app\widgets\BluesearchWidget;
use app\components\MainMenu\MainMenu;

?>

  <!-- START header -->
<header class="main-header">
    <div class="main-header--blue">
        <div class="main-header-wrapper">
            <div class="main-header--logo">
                <img onclick='javascript: document.location.href="/";' style="cursor: pointer" src="/bluetheme/img/white-logo.svg" alt="" class="main-header--logoIcon">
                <p class="main-header--description">Независимый портал о страховании</p>
            </div>
            <div class="main-header--icons">
                <ul class="top-navigation">
                    <li class="item item-text">
                        <a class="item-link item-link--hover" href="/reviews">Отзывы</a>
                    </li>
                    <li class="item item-text">
                        <a class="item-link item-link--hover" href="/news">Новости</a>
                    </li>
                    <li class="item" id="header_icon_search">
                        <a class="item-link item-link--search item-link--border" href="">
                            <img src="/bluetheme/img/search.svg" alt="">
                        </a>
                    </li>
                    <li id="top-navigation_item_search">
                        <?= BluesearchWidget::widget()?>
                    </li>
                    <li class="item item_profile_icon">
                        <?php if(\Yii::$app->user->isGuest):?>
                            <a class="item-link item-link--border" href="/register/register">
                                <img src="/bluetheme/img/profile.svg" alt="">
                            </a>
                        <?php else:?>
                            <a class="item-link item-link--border" href="/lk">
                                <img src="/bluetheme/img/profile.svg" alt="">
                            </a>
                        <?php endif;?>
                        </li> 
                    <li class="item item_burger" id="item_burger">
                        <a class="item-link">
                        <img src="/bluetheme/img/burger.svg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>                
    <div class="header_menu_bg" id="header_menu_bg">
        <div  class="main-header--logo">
            <img  src="/bluetheme/img/white-logo.svg" alt="" class="main-header--logoIcon">
            <p class="main-header--description">Независимый портал о страховании</p>
        </div>
        <div class="closing_cross" id="closing_cross_header"></div>
        <div class="header_menu clear">
            <a href="/reviews" class="header_menu_item header_menu_item_active mobile-show"  >
            Отзывы
            </a>
            <a href="/news" class="header_menu_item header_menu_item_active mobile-show" >
            Новости
            </a>
            <?= MainMenu::widget(['items'=>$items,'options'=>$options])?>                        
            <a class="header_menu_item mobile-show">
                <div class="header_menu_item_login">
                    <img clas="header_menu_item_icon" src="/bluetheme/img/profile.svg" width="16" alt="">
                </div>
                <div class="header_menu_item_login">Войти</div>
            </a>
        </div>
    </div>
</header>
<!-- END header -->