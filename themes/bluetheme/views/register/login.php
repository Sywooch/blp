<?php
use yii\helpers\Html;

$this->title = "Вход";
?>
<main class="authorization_page">
    <div class="authorization">
        <div class="authorization_block">
            <div class="authorization_block_title">Авторизация</div>
            <?= Html::beginForm('/register/login', 'post', ['class'=>'client_block_form', 'id'=>'client_block_form'])?>
            
                <?= Html::error($model, 'email', ['class'=>'error', 'tag'=>'div'])?>
                <?= Html::activeInput('text', $model, 'email', ['placeholder'=>'Ваш e-mail или логин'])?>
            
                <?= Html::error($model, 'password', ['class'=>'error', 'tag'=>'div'])?>
                <?= Html::activePasswordInput($model, 'password', ['placeholder'=>'Пароль'])?>
                <?= Html::submitButton('Войти')?>
                <a href="/register/passrecovery" class="forget_password">Забыли пароль?</a>
            <?= Html::endForm()?>

            <div class="social_share">
                <a href="https://twitter.com/711portal" class="social_share_icon social_share_icon_twitter"></a>
                <a href="https://www.facebook.com/711-727071934074783" class="social_share_icon social_share_icon_facebook"></a>
                <a href="https://vk.com/public90605327" class="social_share_icon social_share_icon_vk"></a>
               <!-- <a href="" class="social_share_icon social_share_icon_google"></a> -->
            </div>
        </div>
        <div class="authorization_question">
            <p class="authorization_question_title">Еще не зарегистрированы?</p>
            <a href="/register/register" class="authorization_question_linkOutRegistration">Регистрация</a>
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

