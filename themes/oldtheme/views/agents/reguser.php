<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;

?>
<div class="row">
    <div class="col-md-6">
        <div class="them-block-shadow">
            <input style="display:none" type="text" name="fakeusernameremembered"/>
            <input style="display:none" type="password" name="fakepasswordremembered"/>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                    ])
            ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'repassword')->passwordInput() ?>
                
   
            <div class="form-group">
                <div class="">
                    <div class="text-center"><?= Html::input('submit') ?></div>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="them-block-shadow">
            <div class="them-agent-logo">
                <?php echo Html::img('/images/agents/agent.jpg'); ?>
            </div>
            <div class="them-register-agent-text">
                <div>Зарегистрируйтесь как страховой агент </div>
                <div>и получайте больше клиентов</div>
            </div>
            <div class="form-group">
                <div class="them-center-reg-btn">
                    <div class="text-center"><?= Html::a('Зарегистрировать', Url::toRoute('/agents/regagent'), ['class' => 'btn btn-default btn-register']) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>