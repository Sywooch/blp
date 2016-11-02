<?php
use yii\widgets\ListView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>


<div class="row">
    <div  class="col-md-12 nopadding them-content">      
        <div id="form" class="btn news-btn-block">
    <?php
        $form = ActiveForm::begin(['options' => ['class'=>'main-search-form'],'method' => 'get']); 
            echo Html::activeTextInput($model, 'search');
        $form = ActiveForm::end();
        

    ?>
</div>
<?php


//var_dump($dataProvider->getmodels());
echo ListView::widget([
    'dataProvider' => $dataProvider,
        'itemView' => '_list',
    
    'layout' => "{items}\n{pager}",
]);

?>
 
    </div>
</div>