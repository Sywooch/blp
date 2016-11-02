<?php
use yii\widgets\ListView;
use yii\widgets\Pjax;

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