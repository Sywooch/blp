<?php
use yii\widgets\ListView;
use yii\widgets\Pjax;
$this->title = "Филиал {$branch['company_name']} в городе {$branch['city']} - адрес, телефоны, режим работы" ?>
<div id="companyspeedbar" style="float:left;width:1120px;">
    <div style="padding-left: 10px">
        <a href="/">711</a> &gt;&gt;
        <a href="/regions">Регионы России</a> &gt;&gt;
        <a href="/region/<?= $region_id ?>"><?= $branch['region'] ?></a> &gt;&gt;
        <a href="/city/<?= $city_id ?>"><?= $branch['city'] ?></a> &gt;&gt;
        <?= $branch['branch'] ?>

    </div>
    <div ><a class="caskoCalc" href="/calculator-kasko">Калькулятор каско</a></div>
        <div  class="branchModalWin">

            <img class="branchModalLogo" src="/images/logoModal.png"><br/><br/>

            <p  align="center" class="modalText">Влияйте на рейтинг страховых компаний</p>
            <hr  class="hrModal2">
            <p align="center" class="modalTextMino">Помогите другим выбрать правильного страховщика. Напишите отзыв о страховой компании</p>
            <a class="branchMmodalButtonReview" href="/addreview"></a>
        </div>
    </div>
</div>
<!--Модальное окно оставить отзыв-->



<!--Модальное окно оставить отзыв-->

<div id='branch-wrap' style="">

    <table id='one-branch'>

        <tr>
            <td width="100"><!--<img src="<?//= $branch['company_photo'] ?>"
                     alt="<?= $branch ['company_name'] ?>" />--></td>


            </td>
        </tr>
        <tr>
            <td></td>
            <td>
            <?php if ($branch['active'] == '0') { ?>
            <span class ='non-active' style ='display:inline'>
                Филиал закрыт
            </span>
            <?php } ?>
        </td>
        </tr>
        
        <tr>
            <td><img class="logoCopanyBranch" src="<?=$logo;?>" alt="<?= $branch ['company_name'] ?>" title="<?= $branch ['company_name'] ?>"/></td>
            <td>
                <a href="/companies/<?= $branch['company_id'] ?>" class = '<?=$branch['active']=='0'?'closed':'company-name'?>'><?= $branch['company_name'] ?></a><br/>
                <span>Рейтинг: 
                    <div class="rateit" data-rateit-value="<?= $rating; ?>" data-rateit-readonly="true" data-rateit-preset="true"></div>
                    <?=$countReview;?> отзывов
                    </div>
                </span><br/>
                <span>Лицензия: &nbsp;<?=$licensy;?></span>
            </td>
        </tr>
        <tr>
            <td  colspan="2" align="center">
            <h1 class="h1Header5" align="left">Филиал компании <?= $branch ['company_name'] ?> в г. <?= $branch['city'] ?></h1></td>
        </tr>
        <tr>
            <td>Тип офиса:</td>
            <td><?= $branch['functions'] ?></td>
        </tr>
        <tr>
            <td>Адрес:</td>
            <td><?= $branch['region'] ?>, <?= $branch['city'] ?>, <?= $branch['address'] ?></td>
        </tr>
        <tr>
            <td>Часы работы:</td>
            <td><?= $branch['work_hours'] ?></td>
        </tr>
        <tr>
            <td>Телефоны:</td>
            <td><?= $branch['phones'] ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?= $branch['email'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div id="YMapsID" style="width: 500px; height: 300px;"></div>

            </td>
        </tr>
        <tr>
            <td></td>
            <td><a href="/map/<?=$branch['company_id']?>">Все филиалы компании на карте</a></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="/companies/<?= $branch['company_id'] ?>">Смотреть полную информацию о компании</a></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" id ='ay' value =<?=$branch['ay']?> />
                <input type="hidden" id ='ax' value =<?=$branch['ax']?> />
            </td>
        </tr>
        <tr>
            <td colspan="2" height="100px">
                <h2 align="left" class="h2Header">Филиалы других страховых компаний</h2>
                    <div>
                    <?php
                        Pjax::begin();
                            echo ListView::widget([
                                'dataProvider' => $filialsDataProvider,
                                'itemView' => '_list',
                                'layout' => '{items}{pager}{summary}',

                                    'pager' => [
                                        'maxButtonCount' => 4,
                                        'firstPageLabel' => 'К началу',

                                        'lastPageLabel' => 'В конец',
                                        'options' => [

                                            'class' => 'pagination',
                                    ]

                                ],
                                'summary' => '<div style="margin: 30px; color: red; float: right;">Количество найденных филиалов: {totalCount} </div>',



                            ]);
                        Pjax::end();
                    ?>

                <div  style="margin-left: 24px; ">

                            <?php foreach ($last_news['news'] as $new): ?>
                                <h2 align="left" class="h2Header" style="margin-top: 90px;">  Новости компании <?=$last_news['tag']?></h2>
                                <div style="font-family:verdana;padding-top:10px; height: 80px; margin-bottom: 20px;">

                                    <div style="margin-left: 10px; display:inline; float: left; width: 75px; height: 75px;"><img style="width: 75px; height: 75px; object-fit: cover;" src="<?= $new['image'] ?>"></div>
                                    <div style="  display:inline; float: left; width: 85%; padding-left: 20px; text-align: left;">
                                        <div style="color:#999999;font-style:italic;display:inline-block; ">
                                            <?= $new['date'] ?>
                                            <i style="margin-left: 10px;" class="fa fa-eye"></i>
                                            <?= $new['count']?>
                                        </div>
                                        <div style="" id="name_news_all">
                                            <a href="/news/<?= $new['category_altname'] ?>/<?= $new['id'] ?>-<?= $new['alt_name'] ?>.html"><?= $new['title'] ?></a>
                                            <div>
                                                <div style="display:inline;">
                                                    <?= $new['descr'] ?>
                                                </div>
                                                <a id="shortnewsarray" href="/news/<?= $new['category_altname'] ?>/<?= $new['id'] ?>-<?= $new['alt_name'] ?>.html">→</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                </div>
            </td>
        </tr>
    </table>
</div>
<script src="//api-maps.yandex.ru/2.1/?package.full&lang=ru-RU" type="text/javascript"></script>
<script>

    var myMap;
    ymaps.ready(function() {
        myMap = new ymaps.Map("YMapsID", {
            center: [55.76, 37.64], zoom: 7,
            behaviors: ['default', 'scrollZoom']
        });

        myMap.controls.remove('default');
        myMap.controls.add('zoomControl', {
            float: "none", position: {
                top: '400',
                left: '10'
            }
        });
        
        onePoint();
        function onePoint() {
            var ay = $('#ay').val();
            var ax = $('#ax').val();
            var onePoint = new ymaps.Placemark(
                    [ay, ax], {},
                    {
                        preset: "islands#redIcon",
                    });
            
            myMap.geoObjects.add(onePoint);
            myMap.setCenter([ay, ax], 16);


        } 



    });


</script>
<style>
    .non-active {
    font-size: 18px;
    color: red;
    display: none;
}
.closed {
    text-decoration: line-through;
}
</style>