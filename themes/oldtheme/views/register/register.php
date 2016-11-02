<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\forms\RegUser */
/* @var $form ActiveForm */
?>
<div class="col-md-12">
    <div class="heading">
        Регистрация нового пользователя
    </div>
    
        <div class="widget-block-white">
            <div style="margin: 30px; padding-top: 30px;">
                <b style="font-size: 1.5em;">Здравствуйте, уважаемый посетитель нашего сайта!</b><br />
                <span style="font-size: 1.2em;">Регистрация на нашем сайте позволит Вам быть его полноценным участником.
                 Вы сможете добавлять новости на сайт, оставлять свои комментарии, просматривать скрытый текст и многое другое.
                 <br />В случае возникновения проблем с регистрацией, обратитесь к <a href="/contacts.html">администратору</a> сайта.
                </span>
    </div>
            <div class="register" style="margin-left: 300px;margin-right: 300px;">

                <?php $form = ActiveForm::begin(['options' => ['class'=>'form-vertical']]); ?>

                    <?= $form->field($model, 'name') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'repassword')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-primary']) ?>
                    </div>
                <?php ActiveForm::end(); ?>

            </div><!-- register -->
       
    
</div>