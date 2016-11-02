<?php
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\helpers\HtmlPurifier;
use app\components\LinkPager711\LinkPager711;

//echo '<pre>'; print_r($branch); echo '</pre>';
//echo '<pre>'; print_r($reviews); echo '</pre>';
//echo '<pre>'; print_r($licensy); echo '</pre>';

//echo $rating;
?>


<main class="content_fifth clear">

     <section class="content_fifth_left clear">

     <div class="branchOnTop" style="padding: 20px 0;">
            <img src="<?= $logo ?>" width="150px" style="vertical-align:middle;">
            <span class="stars" style="margin-left:50px;">
                <?if($rating == '-1'){ $rating = 0; }?>
                <?php for($i=0; $i<round($rating); $i++){ ?>
                    <img width="16" class="stars-marked star" src="/bluetheme/img/mark.svg">
               <?php } ?>
                <?php for($i=0; $i<5-round($rating); $i++){ ?>
                    <img width="16" class="stars-marked star" src="/bluetheme/img/mark-no.svg">
               <?php } ?>
            </span>
    </div>

        <p class="content_fifth_left_infoTitle">Филиал компании <?= $branch ['company_name'] ?> в г. <?= $branch['city'] ?></p>
        <table class="content_fifth_left_table">
            <tbody><tr class="content_fifth_left_table_row">
                <td class="content_fifth_left_table_leftColumn">Наименование:</td>
                <td><?= HtmlPurifier::process($branch['company_name']) ?></td>
            </tr>
            <tr class="content_fifth_left_table_row">
                <td class="content_fifth_left_table_leftColumn">Тип офиса:</td>
                <td><?= HtmlPurifier::process($branch['functions']) ?></td>
            </tr>
            <tr class="content_fifth_left_table_row">
                <td class="content_fifth_left_table_leftColumn">Адрес:</td>
                <td><?= HtmlPurifier::process($branch['region']) ?>, <?= HtmlPurifier::process($branch['city']) ?>, <?= HtmlPurifier::process($branch['address']) ?></td>
            </tr>
            <tr class="content_fifth_left_table_row">
                <td class="content_fifth_left_table_leftColumn">Часы работы:</td>
                <td><?= HtmlPurifier::process($branch['work_hours']) ?></td>
            </tr>
            <tr class="content_fifth_left_table_row">
                <td class="content_fifth_left_table_leftColumn">Телефоны:</td>
                <td><?= HtmlPurifier::process($branch['phones']) ?></td>
            </tr>
            <tr class="content_fifth_left_table_row">
                <td class="content_fifth_left_table_leftColumn">Email:</td>
                <td><?= HtmlPurifier::process($branch['email']) ?></td>
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
        </tbody>
        </table>
        <p class="content_fifth_left_infoTitle">Другие филиалы страховых компаний</p>
                        <?php
                        Pjax::begin();
                            echo ListView::widget([
                                'dataProvider' => $filialsDataProvider,
                                'itemView' => '_list',
                                'layout' => '{items}',
                            ]);
                              echo LinkPager711::widget(['maxButtonCount'=>5,'pagination' => $filialsDataProvider->pagination,'linkOptions'=>['class'=>'pagination_item'],'nextPageLabel'=>'<p><img src="/bluetheme/img/arrow_right.svg" width="10" height="10"></p>','prevPageLabel'=>'<p><img src="/bluetheme/img/arrow_left.svg" width="10" height="10"></p>','lastPageCssClass'=>'pagination_item','firstPageCssClass'=>'pagination_item','prevPageCssClass'=>'pagination_item pagination_item_left','nextPageCssClass'=>'pagination_item pagination_item_right','pageCssClass'=>'pagination_item']);
                        Pjax::end();
                    ?>
    </section>
           <!-- <section class="content_sec_right content_fifth_right">
                    <div class="content_sec_right_getPresent pad-hidden mobile_hidden">
                        <img src="/bluetheme/img/present-book_blue.svg" alt="" width="195" height="140">
                        <p class="content_sec_right_getPresent_title">
                            Оформи <br>КАСКО и ОСАГО получи 2 500 <span class="rubl">⃏</span> в подарок
                        </p>
                        <a class="content_sec_right_getPresent_btn" href="">Получить подарок</a>
                    </div>
                </section> -->
</main>

<script src="//api-maps.yandex.ru/2.1/?package.full&amp;lang=ru-RU" type="text/javascript"></script>
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