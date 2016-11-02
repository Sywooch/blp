<?php
use yii\helpers\Html;
?>
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
                            Для успешного размещения отзыва необходимо подтвердить адрес электронной почты.
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
                                    '/agents/confirm',
                                    'key' => $user->auth_key,
                                    'email' => urlencode($user->email),
                                    'review_id' => $review,
                                ]
                            ), ['target'=>'_blank', 'style' => ['color'=>'#ffffff !important', 'text-decoration' => 'none', 'font' => '16px Arial, sans-serif', 'line-height' =>'24px', '-webkit-text-size-adjust'=>'none', 'display'=>'block']]);
                        ?>
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="2"style="padding: 15px; padding-bottom: 0;">
                        <span style="color: #424955; font: 16px Arial, sans-serif; line-height: 24px; -webkit-text-size-adjust:none; display: block;">
                            Если вы получили это письмо по ошибке, просто проигнорируйте его.
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

