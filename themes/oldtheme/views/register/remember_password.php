<?php
/**
 * Created by PhpStorm.
 * User: user-204-008
 * Date: 11.05.16
 * Time: 15:15
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


$this->title = "Восстановление пароля» 711.ru - Независимый портал о страховании";
?>


<div id="newsspeedbar" style="">
    <div style="padding-left: 10px">
        <div class="speedbar"><span id="olit-speedbar"><a href="/">711.ru</a> » Восстановление пароля</span></div>
    </div>
</div>
<div style="">
    <div id="olit-content">
        <div class="basecont">
            <div class="dpad">

                    <h1 style="" class="heading"><span id="news-title">Восстановление пароля.</span></h1>
                <div style="padding:5px;width: 60%;">
                    <?php
                    $form = ActiveForm::begin([
                        'method' => 'post',
                        'action' => ['register/remember-password'],
                    ]);
                    ?>
                    <?=$form->field($model, 'email')->input('email');?>
                    <?=Html::submitButton('Восстановить', ['class' => 'btn btn-primary']);?>
                    <?php ActiveForm::end();?>
                    <br clear="all">
                    <div class="storenumber"></div>
                </div>
            </div>
        </div>
    </div>
</div>


