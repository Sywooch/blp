<?php
use yii\helpers\Html;
use yii\helpers\Url; 
use yii\jui\AutoComplete;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
?>
 <div class="row">    
    <div class="col-lg-offset-3 col-lg-7">
        <div class="them-block-shadow">
<H1>Личная информация</H1>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($agent, 'firstname')?>
        <?= $form->field($agent, 'surname')?>
        <?= $form->field($agent, 'patronymic') ?>
        <?= DatePicker::widget([
            'model' => $agent,
            'attribute' => 'birthday',
            //'language' => 'ru',
            //'dateFormat' => 'yyyy-MM-dd',
            
        ]); ?>
        <?= $form->field($agent, 'gender')->radioList(['female' => 'Ж', 'male' => 'М'])?>
        <?= $form->field($agent, 'city')->widget(
                AutoComplete::className(), [
                    'clientOptions' => [
                        'source' => $cities,
                        
                    ],
                ]);?> 

        <lable>Выбранные Вами компании:</lable><br>
        <?= Html::activeDropDownList($agent, 'company', ['' => ''] + $company, ['multiple'=>'multiple', 'size'=>5, 'options' => $agent->company])?><br>
        <lable>Выбранные Вами типы страхования:</lable><br>
        <?= Html::activeDropDownList($agent, 'ins_type', $type, ['multiple'=>'multiple', 'size'=>5, 'options' => $agent->ins_type])?>       
        <?= $form->field($agent, 'phone') ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
        </div>
    </div>
 </div>