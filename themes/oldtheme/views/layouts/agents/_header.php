<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="them-logo col-md-6">
                    <div class="them-logo-text">711</div>
                    <div class="them-logo-text-small">
                        <div>Независимый портал</div>
                        <div>о страховании</div>
                    </div>   
                </div>
                <div class="col-md-6">
                    <div class="them-header-btn">
                        <?php if ($login_success): ?>
                            <?php echo Html::a('Личный кабинет', Url::toRoute('agents/account'), array('class' => 'btn btn-default')) ?>
                            <?php echo Html::a('Выход', Url::toRoute('agents/logout'), array('class' => 'btn btn-default')) ?>
                        <?php else : ?>
                            <?php echo Html::a('Регистрация', Url::toRoute('agents/register'), array('class' => 'btn btn-default')) ?>
                            <?php echo Html::a('Вход', Url::toRoute('agents/login'), array('class' => 'btn btn-default')) ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        