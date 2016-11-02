<?php
/**
 * Created by PhpStorm.
 * User: user-204-008
 * Date: 06.05.16
 * Time: 14:28
 */

$this->registerJsFile('http://f.sravni.ru/f/apps/build/widgets/sravni-widgets.js');
$this->registerJsFile('/js/responseWidj.js');

$this->title = 'Калькулятор каско, онлайн расчет цены каско, стоимость каско в '.date("Y").' году';
$this->registerMetaTag(['name' => 'keywords', 'content' => 'калькулятор каско, стоимость каско, каско онлайн, автострахование, страховка на машину, автостраховка, рассчитать каско']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Рассчитать и сравнить предложения страховых компаний по каско на автомобиль']);
?>
<main class="companiesList">
    <div>
        <h1 class="h1Header2">Калькулятор каско</h1>
        <sravni-widget partner="711.ru"></sravni-widget>    
    </div>
</main>


