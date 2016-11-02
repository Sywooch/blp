<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin();
echo Nav::widget([
    'items' => [
        ['label' => 'Главная', 'url' => ['/agents']],
        ['label' => 'Агенты', 'url' => ['agents/search']],
        
        
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();