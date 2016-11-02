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
<div>
    <h1 class="h1Header2">Калькулятор каско</h1>
    <sravni-widget partner="711.ru"></sravni-widget>
<!-- <iframe src="http://f.sravni.ru/f/casco.html#711.ru" width="100%" height="100%" id="casco-iframe" frameborder="0" scrolling="yes"></iframe> -->
</div>