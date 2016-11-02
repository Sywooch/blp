<?php
use yii\helpers\Html;
?>
<main class="content_fifth clear feedbackPage">
    <section class="content_fifth_left change_personal_data clear shadow">
        <div class="content_fifth_left_leaveFeedback">
            <p class="feedbackPage_title">Изменение личных данных</p>
            <div id="change_personal_data" class="clear">
                <p class="content_fifth_left_infoTitle">Личная информация:</p>
                <?= Html::beginForm('', 'post', ['class'=>'client_block_form client_block_form_registration'])?>


                <label class="registasagent_left">
                    Ваше имя
                    <?= Html::error($user, 'name', ['class'=>'error', 'tag'=>'div'])?>
                </label>
                <?= Html::activeInput('text', $user, 'name', ['placeholder'=>'Логин', 'value'=>Yii::$app->user->identity->name])?>

                <label class="registasagent_left">
                    Ваш email
                    <?= Html::error($user, 'email', ['class'=>'error', 'tag'=>'div'])?>
                </label>

                <?= Html::activeInput('text', $user, 'email', ['placeholder'=>'Ваш e-mail', 'value'=>Yii::$app->user->identity->email])?>

                <label class="registasagent_left">
                    Подпись на сайте
                    <?= Html::error($user, 'full_name', ['class'=>'error', 'tag'=>'div'])?>
                </label>

                <?= Html::activeInput('text', $user, 'full_name', ['placeholder'=>'ФИО', 'value'=>Yii::$app->user->identity->full_name])?>

                <label class="registasagent_left">
                    Пароль
                    <?= Html::error($user, 'repassword', ['class'=>'error', 'tag'=>'div'])?>
                </label>
                <?= Html::activePasswordInput($user, 'password', ['placeholder'=>'Пароль'])?>

                <label class="registasagent_left">Повторите пароль</label>
                <?= Html::activePasswordInput($user, 'repassword', ['placeholder'=>'Повторите пароль'])?>
                <?//= Html::checkbox('condition', false, ['id'=>'use_agreement_true', 'value'=>'yes'])?>

                <?= Html::submitButton('Сохранить', ['id'=>'change_personal_data_button'])?>

                <?= Html::endForm()?>

            </div>
            <div class="gotYourFeedback">
                <div class="gotYourFeedback_center">
                    <img src="img/feedback_picture.svg" height="150"  alt="">
                    <div class="gotYourFeedback_center_message">Ваш отзыв принят, находится в обработке</div>
                </div>
                <div class="closing_cross" id="closing_cross_feedbackGot"></div>
            </div>
        </div>
    </section>
    <?= $this->render("_right_bar") ?>
</main>
