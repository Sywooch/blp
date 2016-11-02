<?php
use yii\helpers\Html;
?>
<main class="authorization_page">
    <div class="authorization">
        <div class="authorization_block registration_block">
            <div class="authorization_block_title">Регистрация</div>
                <?= Html::beginForm('', 'post', ['class'=>'client_block_form client_block_form_registration'])?>
                
                <?= Html::error($model, 'email', ['class'=>'error', 'tag'=>'div'])?>
                <?= Html::activeInput('text', $model, 'email', ['placeholder'=>'Ваш e-mail'])?>
                
                <?= Html::error($model, 'name', ['class'=>'error', 'tag'=>'div'])?>
                <?= Html::activeInput('text', $model, 'name', ['placeholder'=>'Имя'])?>
                
                <?= Html::error($model, 'repassword', ['class'=>'error', 'tag'=>'div'])?>
                <?= Html::activePasswordInput($model, 'password', ['placeholder'=>'Пароль'])?>
                <?= Html::activePasswordInput($model, 'repassword', ['placeholder'=>'Повторите пароль'])?>
                <?= Html::checkbox('condition', false, ['id'=>'use_agreement_true', 'value'=>'yes'])?>
                <label for="use_agreement_true"></label>
                <span class="registration_block_agreement">
                    С условиями <a href="">пользовательского соглашения</a> ознакомлен и согласен
                </span>

                <?= Html::submitButton('Зарегистрироваться')?>
            <?= Html::endForm()?>


            <div class="social_share">
                <a href="https://twitter.com/711portal" class="social_share_icon social_share_icon_twitter"></a>
                <a href="https://www.facebook.com/711-727071934074783" class="social_share_icon social_share_icon_facebook"></a>
                <a href="https://vk.com/public90605327" class="social_share_icon social_share_icon_vk"></a>
               <!-- <a href="" class="social_share_icon social_share_icon_google"></a> -->
            </div>
        </div>
        <div class="authorization_question">
            <p class="authorization_question_title">Уже зарегистрированы?</p>
            <a href="/register/login" class="authorization_question_linkOutRegistration">Войти</a>
        </div>
    </div>
</main>
<script type="text/javascript">
    $(document ).ready(function() {
        
        $("div.registration_block_agreement").each(function() {
            if($(this).text().length === 0 ) {
               $(this).hide();
            }
      });
    });
</script>