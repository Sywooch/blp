<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\AutoComplete;

Yii::$app->view->registerJsFile('/js/agents/agents.js');
?>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="them-block-shadow">


<div class="regAgent">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($formuser, 'name')?>
        <?= $form->field($formuser, 'email')?>
        <?= $form->field($formagent, 'firstname')?>
        <?= $form->field($formagent, 'surname')?>
        <?= $form->field($formagent, 'birthday')->widget(\yii\jui\DatePicker::classname(), [
          //'language' => 'ru',
          //'dateFormat' => 'dd-MM-yyyy',
      ]) ?>
        <?= $form->field($formagent, 'gender')->radioList(['female' => 'Ж', 'male' => 'М'])?>
        <?= $form->field($formagent, 'city')->widget(
                AutoComplete::className(), [
                    'clientOptions' => [
                        'source' => $cities,
                    ],
                    
                ]);?>  
        <?= $form->field($formagent, 'ins_type')->dropDownList($type, ['multiple'=>'multiple']) ?>
        <?= $form->field($formagent, 'company')->dropDownList($company, ['multiple'=>'multiple'])?>
        <?= $form->field($formagent, 'phone') ?>
        <?= $form->field($formuser, 'password')->passwordInput() ?>
        <?= $form->field($formuser, 'repassword')->passwordInput() ?>
    <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

           
        </div>
    </div>
</div>