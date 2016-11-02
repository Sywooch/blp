<?php
use yii\grid\GridView;
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'layout'=>"{pager}{items}",
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [            
            'attribute' => 'date',            
            'label' => 'Дата',            
        ],
        [            
            'attribute' => 'count',            
            'label' => 'Количество кликов',            
        ],
    ],
]) ?>