<?php

use yii\helpers\HtmlPurifier;
use \yii\widgets\LinkPager; 
$this->title = " » 711.ru - Независимый портал о страховании";


?>

<div id="consultationspeedbar" style="float:left;width:645px;">
    <div style="padding-left: 10px">
        <div class="speedbar">
            <span id="olit-speedbar">
                <a href="/" > 711.ru</a> > Вопросы - ответы
            </span>
        </div>
    </div>
</div>
<div id = 'consultation-wrap'>
    <div class ='reference' style = 'display:none'>
        <div class ='reference-title'>
            Юридическая консультация по страхованию
        </div>
        <div class ='reference-body'>

            У вас есть вопрос по страхованию?<br/>
            <br/>
            Хотите разобраться в том:
            <ul>
                <li>
                    - что на самом деле написано в пункте Правила страхования или страхование полиса? 
                </li>
                <li>
                    - что на самом деле написано в пункте Правила страхования или страхование полиса? 
                </li>
                <li>
                    - что на самом деле написано в пункте Правила страхования или страхование полиса? 
                </li>
                <li>
                    - что на самом деле написано в пункте Правила страхования или страхование полиса? 
                </li>
                <li>
                    - что на самом деле написано в пункте Правила страхования или страхование полиса? 
                </li>
                <li>
                    - что на самом деле написано в пункте Правила страхования или страхование полиса? 
                </li>
            </ul>
            Задайте его профессиональным юристам через наш портал 711.ru<br/>
            И получите совершенную консультацию бесплатно.<br/>
            <br/>
            В данный момент вы можете получить юридическую консультацию по видам страхования:<br/>
            -ОСАГО<br/>
            -КАСКО<br/>

        </div>
    </div>
    <?php foreach ($sections as $section) : ?>

        <div class ='insurance-type'>
            <a href ="/consultations/<?= $section['id'] ?>" class = 'insurance-title-href'>
                <div class ='insurance-title'>
                    <?= $section['title'] ?>
                </div>
            </a>
            <div class ='insurance-body'>
                <div class ='left-body'>
                    <img class ='face' src ='<?= $section['photo'] ?>' />
                </div>
                <div class ="right-body">
                    <div class ='expert'>
                        Сегодня на вопросы отвечает <?= $section['full_name'] ?>

                    </div>
                    <div class ='expert-description'>
                        <?= $section['position'] ?>
                        <div class ='questions'>
                            <?= $section['questions_sum'] ?> вопросов 
                        </div>
                    </div>
                    <div class ="company-name">
                        <?= $section['company_name'] ?>
                    </div>
                    <div class ="expert-site">
                        <?= $section['site_name'] ?>
                    </div>
                    <div class ="reference">
                        <?= $section['reference'] ?>
                    </div> 
                    <div class ="expert-link">
                        <input type ="button" value ="Задать вопрос" class ='send-button'/>
                        <a class="know-more">Узнать больше о спикере</a>
                        <span class ="know-less">Свернуть</span>
                        <span class = 'more'>
                            <a href ="/consultations/<?= $section['id'] ?>">Читать ответы</a> 

                        </span>
                        <span class ="know-less">Свернуть</span>
                    </div>

                    <input type ='hidden' value ='<?= $section['id'] ?>' name ='section' />
                    <input type ='hidden' value ='<?= $section['expert_id'] ?>' name ='expert'/>
                </div>

                <div class ="down-body">
                    <?php if ($section['last_question']['question_date'] != null) : ?>
                        <div class ='triangle-up'></div>

                        <div class ="last-question">

                            <div class ="title">Последний вопрос:</div>
                            <div class ="question">
                                <?= \yii\helpers\StringHelper::truncateWords($section['last_question']['question'], 40, '...'); ?>
                            </div>
                            <div class ="author-date">
                                <?= $section['last_question']['user_name']; ?>
                                <?= $section['last_question']['question_date']; ?>
                                <a  class = 'read-full-quest' href ="/consultations/<?= $section['id'] ?>/<?= $section['last_question']['id']; ?>" >
                                    Читать еще
                                </a>

                            </div>                        


                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    <?php endforeach; ?> 
   <?= LinkPager::widget(['pagination' => $pages]); ?> 
</div>

<div style="float:right;width:290px;margin-top:-35px; ">


    <div id="left_block_middle_head">Читайте также</div>
    <div id="left_block_comment_content">
        <?php foreach ($another_news_in_cats as $altname => $category): ?>
            <div class="left-news_category">
                <a class="category<?= HtmlPurifier::process($category['color']) ?>  left-news_category-title" href="/news/<?= HtmlPurifier::process($altname) ?>">  
                    <?= HtmlPurifier::process($category['news'][0]['category']) ?>
                </a>
                <div style="clear: both"></div>
                <?php foreach ($category['news'] as $another_new): ?>
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
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div style="clear:both"></div>
    <input type ='hidden'  class = 'toPost' name ='_csrf' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
    <input type ='hidden'  class = 'q_name' name ='q_name' value ='<?=  $user['full_name'] ?>' />
    <input type ='hidden'  class = 'q_email' name ='q_email' value ='<?= $user['email'] ?>' />
    <input type ='hidden'  class = 'user_type' name ='u_type'  value ='<?= $guest ?>' />
</div>



