<?php
use yii\helpers\Html;
use yii\helpers\Url; 

$this->title = "Регистрация";
?>
                    <!-- шапка таблицы с рассылкой -->
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; width: 100%; background: #4d81ef; font-family: Arial, Helvetica, sans-serif;">
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; width: 600px;">
                <tr>
                    <td style="padding: 10px;">
                        <span style="color: #ffffff !important">
                            <a href="http://www.711.ru/" target="_blank" style="width: 150px;
                            vertical-align: top; text-align: center; color: #ffffff !important; text-decoration: none;
                            font: 38px Arial, sans-serif; line-height: 36px; -webkit-text-size-adjust:none;
                            display: inline-block;">
                                <span style="display: block; color: white; font-style: italic">711</span>
                            </a>
                        </span>
                        <span style="width: 420px; vertical-align: top;
                        text-align: left; color: #ffffff;
                        font: 24px Arial, sans-serif; line-height: 36px;
                        -webkit-text-size-adjust:none; display: inline-block;">
                            Просим подтвердить Ваш e-mail !
                        </span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
                <!-- конец шапки с рассылкой -->

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; width: 100%; background: #eaedef;">
    <tr>
        <td style="padding-bottom: 10px">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; width: 600px; background: #ffffff;">
                <tr>
                    <td colspan="2" style="padding: 15px; padding-bottom: 0;">
                        <span style="color: #424955; font: 16px Arial, sans-serif; line-height: 24px; -webkit-text-size-adjust:none; display: block;">Что это?</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"style="padding: 15px; padding-bottom: 0;">
                        <span style="color: #424955; font: 16px Arial, sans-serif; line-height: 24px; -webkit-text-size-adjust:none; display: block;">
                            Для регистрации на сайте 711.ru необходимо подтвердить email адрес.
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"style="padding: 15px;">
                        <span style="color: #424955; font: 16px Arial, sans-serif; line-height: 24px; -webkit-text-size-adjust:none; display: block;">
                            Для этого нажмите кнопку ниже:
                        </span>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#4d81ef" align="center" style="padding: 15px">
                        <?php 
                            echo Html::a('<span style="display: block; color: white;">Подтвердить адрес электронной почты!</span>',
                            Yii::$app->urlManager->createAbsoluteUrl(
                                [
                                    '/register/confirm',
                                    'key' => $user->auth_key,
                                    'name' => $user->name
                                ]
                            ), ['target'=>'_blank', 'style' => ['color'=>'#ffffff !important', 'text-decoration' => 'none', 'font' => '16px Arial, sans-serif', 'line-height' =>'24px', '-webkit-text-size-adjust'=>'none', 'display'=>'block']]);
                        ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="2"style="padding: 15px; padding-bottom: 0;">
                        <span style="color: #424955; font: 16px Arial, sans-serif; line-height: 24px; -webkit-text-size-adjust:none; display: block;">
                            Если Вы получили это письмо по ошибке, просто проигнорируйте его.
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"style="padding: 15px; padding-bottom: 0;">
                        <span style="color: #424955; font: 16px Arial, sans-serif; line-height: 24px; -webkit-text-size-adjust:none; display: block;">
                            Данное сообщение является системным. Не нужно отвечать на него.
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"style="padding: 15px; padding-bottom: 0;">
                        <span style="color: #424955; font: 16px Arial, sans-serif; line-height: 22px; -webkit-text-size-adjust:none; display: block;">
                            Желаем вам удачи и успехов!
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 15px; padding-top: 0;">
                        <span style="color: #424955; font: 16px Arial, sans-serif; line-height: 22px; -webkit-text-size-adjust:none; display: block;">
                            Команда независимого портала 711.ru
                        </span>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

<!-- табличка футера рассылки -->
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; width: 100%; background: #eaedef;">
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; width: 600px;">
                <tr>
                    <td  align="center" style="padding: 5px; padding-bottom: 0;">
                        <span style="vertical-align: top;
                        text-align: left; color: #808080;
                        font: 13px Arial, sans-serif; line-height: 18px;
                        -webkit-text-size-adjust:none; display: block; text-align: center;">
                             ООО «711.ru»
                        </span>
                    </td>
                </tr>
                <tr>
                    <td  align="center" style="padding: 5px;">
                        <span style="vertical-align: top;
                        text-align: left; color: #808080;
                        font: 13px Arial, sans-serif; line-height: 18px;
                        -webkit-text-size-adjust:none; display: block; text-align: center;">
                             Вы получили это письмо, потому что оставили отзыв на портале 711.ru
                        </span>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-bottom: 10px;">  <!-- спорный момент  -->
                        <a href="http://www.711.ru/" target="_blank" style="text-align: center; text-decoration: none; color: #4d81ef; font: 12px Arial, sans-serif; line-height: 16px; -webkit-text-size-adjust:none; display: block;">
                            www.711.ru
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

