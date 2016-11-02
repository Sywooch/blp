<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\AutoComplete;

Yii::$app->view->registerJsFile('/js/agents/agents.js');

$user = \Yii::$app->user->identity;

?>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="them-block-shadow">

<h3>Оставьте Ваш отзыв</h3><br>
<p>Агент:<?=$surname?> <?=$firstname?><p>
<div class="regAgent">

    <?php $form = ActiveForm::begin(); ?>
    <?php 
    
    if(!\Yii::$app->user->isGuest):
        echo $form->field($model, 'name')->textInput($options = ['value'=>$user->name]);
        echo $form->field($model, 'email')->textInput($options = ['value'=>$user->email]);
    Else:
        echo $form->field($model, 'name')->textInput();
        echo $form->field($model, 'email')->textInput();
    
    endif;
    ?>
    <label>Город:</label><br>
    <?= AutoComplete::widget([                    
                    'model' => $model,
                    'attribute' => 'city',
                    'clientOptions' => [
                        'source' => $cites,
                    ],
                    
                ]);
        ?>
        <?= $form->field($model, 'mark') ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'comment')->textarea(['rows' => 5, 'cols' => 5])->label('Оставьте свой отзыв'); ?>
        
       
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

           
        </div>
    </div>
</div>