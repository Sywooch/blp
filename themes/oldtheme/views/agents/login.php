<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


?>
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="them-block-shadow">
            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                    ])
            ?>
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="col-md-offset-3 them-remember-password"><?php echo Html::a('Забыли пароль?',  Url::toRoute('/agents/remember-password'))?></div>
            <div class="form-group">
                <div class="col-md-9">
                    <div class="pull-right"><?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?></div>
                    <div class="pull-right margin-right-10"><?= Html::a('Регистрация',Url::toRoute('/agents/register') ,['class' => 'btn btn-default btn-register']) ?></div>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>