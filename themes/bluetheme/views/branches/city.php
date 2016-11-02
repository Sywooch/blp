<?php 
use yii\helpers\Html;
    $this->title = "Филиалы страховых компаний в городе {$city}: - адреса, телефоны, режим работы." ;
?>

<main class="companiesList officeslist">
    <p class="companiesList_title officeslist_title">
        Список филиалов страховых компаний в городе
            <span class="officeslist_title_cityname">
                Кострома
            </span>
    </p>
    <div class="companiesList_alphabet officeslist_form">
        <div class="companiesList_iconSearch">
            <?= Html::beginForm('/city/'.\Yii::$app->request->get('id'),'get')?>
            <?= Html::textInput('comp_name', '', ['class'=>'companiesList_searchField', 'placeholder'=>'Введите имя компании'])?>
            <?= Html::endForm()?>
            
        </div>
    </div>
    <section class="companiesList_table officeslist_table">
        <div class="companiesList_head clear officeslist_table_head">
            <div class="companiesList_head_item">
                Страховая компания
                <?=$sort->link('company_name')?>
            </div>
            <div class="companiesList_head_item">
                Функции 
               
            </div>
            <div class="companiesList_head_item">
                Адрес
                
            </div>
            <div class="companiesList_head_item">
                Часы работы
                
            </div>
            <div class="companiesList_head_item">
                Телефоны
                
            </div>
            <div class="companiesList_head_item">
                Email
                <?=$sort->link('email')?>
            </div>
        </div>

<?php foreach($result as $values){ ?>
        <div class="companiesList_table_row clear officeslist_table_body">
            <div class="officeslist_table_body_item">
                <a href="/branch/<?= $values['id'] ?>" class="officeslist_table_body_item_link"><?= $values['company_name'] ?></a>
                <?= $values['branch'] ?>
            </div>

            <div class="officeslist_table_body_item">
                <?= $values['functions'] ?>
            </div>

            <div class="officeslist_table_body_item">
               <?=$values['city']?><br><?= $values['address'] ?>
                <a href="/map/0/<?= $values['id'] ?>" class="officeslist_table_body_item_link">Показать на карте</a>
            </div>
            <div class="officeslist_table_body_item">
                <?= $values['work_hours'] ?>
            </div>
            <div class="officeslist_table_body_item">
                <a href="tel:<?= $values['phones'] ?>" class="officeslist_table_body_item_link"><?= $values['phones'] ?></a>
            </div>
            <div class="officeslist_table_body_item">
                <a href="mailto:fghjkl@mail.ru" class="officeslist_table_body_item_link">
                    <?= $values['email'] ?>
                </a>
            </div>
        </div>

<?php } ?>
        <div class="companiesList_table_line"></div>
    </section>
</main>

