<?php
use yii\helpers\Html;

$this->title = "Смена пароля";
?>
<main class="authorization_page recallPassword">
<div class="authorization">
    <div class="authorization_block registration_block">
        <div class="authorization_block_title">Восстановление пароля</div>
        <span class="registration_block_agreement">
            Введите адрес электронной почты, который был указан при регистрации
        </span>
            <?= Html::beginForm('/register/passrecovery', 'post', ['class'=>'client_block_form', 'id'=>'client_block_form'])?>

                <?= Html::error($model, 'email', ['class'=>'error', 'tag'=>'div'])?>
                <?= Html::activeInput('text', $model, 'email', ['placeholder'=>'Ваш e-mail'])?>
                <?= Html::submitButton('Отправить')?>
            <?= Html::endForm()?>

            <div class="social_share">
                <a href="" class="social_share_icon social_share_icon_twitter"></a>
                <a href="" class="social_share_icon social_share_icon_facebook"></a>
                <a href="" class="social_share_icon social_share_icon_vk"></a>
                <!-- <a href="" class="social_share_icon social_share_icon_google"></a> -->
            </div>
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
