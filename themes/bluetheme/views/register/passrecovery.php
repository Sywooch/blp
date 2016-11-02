<?php
use yii\helpers\Html;
?>
<main class="authorization_page recallPassword">
    <div class="authorization">
        <div class="authorization_block registration_block">
            <div class="authorization_block_title">Восстановление пароля</div>
                <span class="registration_block_agreement">
                    <?=$message?>
                </span>
                <?php if($status != 'OK'):?>
                    <?= Html::beginForm('passrecovery', 'post', ['class'=>'error'])?>
                        <?= Html::error($model, 'email', ['class'=>'error', 'tag'=>'div'])?>
                        <?= Html::activeInput('text', $model, 'email', ['placeholder'=>'Ваш e-mail'])?>
                        <?= Html::submitButton('Сбросить текущий пароль')?>
                    <?= Html::endForm()?>
                <?php endif;?>
            <div class="social_share">
                <a href="https://twitter.com/711portal" class="social_share_icon social_share_icon_twitter"></a>
                <a href="https://www.facebook.com/711-727071934074783" class="social_share_icon social_share_icon_facebook"></a>
                <a href="https://vk.com/public90605327" class="social_share_icon social_share_icon_vk"></a>
               <!-- <a href="" class="social_share_icon social_share_icon_google"></a> -->
                
            </div>
        </div>
    </div>
</main>