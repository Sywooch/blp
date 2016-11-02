<?php
use yii\helpers\Html;
?>
<div style="position: absolute; width: 100%; background-color: red; padding: 10px;">
    <div style="width: 650px; margin: 0 auto;">
        <span style="font-family: arial;font-size: 36px; color: white;"><a style="text-decoration:none; color:white;" href="http://www.711.ru"><i>711</i></a></span><span style="font-family: arial;font-size: 22px; color: white; margin-left: 184px;">Нам нужно убедиться, что вы - это вы</span>
    </div>
</div>

<div style="width:100%;background-color:#F5F2F0; padding: 10px;">
    <br/>
    <div style="width:600px; border:1px solid lightgrey; margin: 0 auto; padding-left:15px; padding-right:15px; background-color: white">
        <p style="font-size: 19px; font-family: arial;">Что это?</p>
        <p style="font-size: 17px; font-family: arial;">Для успешной отправки заявки необходимо подтвердить адрес электронной почты.</p>
        <p style="font-size: 17px; font-family: arial;">Для этого нажмите кнопку ниже:</p>
<<<<<<< HEAD:mail/confirm_order_and_reg.php
        <div style="background-color: red; margin-left: 1px; padding:15px; color:white; width: 363px;">
            
            <?php
                
                echo Html::a('Подтвердить адрес электронной почты.',
                Yii::$app->urlManager->createAbsoluteUrl(
                    [
                        '/agents/confirmorder',
                        'key' => $user->auth_key,
                        'email' => urlencode($user->email),
                        'order_id' => $order,
                    ]
                ), ['style' => ['color'=>'white', 'text-decoration' => 'none', 'font-size' => '19px', 'font-family' => 'arial']]);
            ?>
            
        </div>
        <p style="font-size: 17px; font-family: arial;">В качестве логина для входа на сайт Вы можете использовать Ваш email адресс.</p>
        <p style="font-size: 17px; font-family: arial;">Ваш пароль после подтверждения: <b><?=$pass?></b></p>
        <p style="font-size: 17px; font-family: arial;">Если Вы получили это письмо по ошибке, просто проигнорируйте его.</p>
=======
        <div style="background-color: red; margin-left: 1px; padding:15px; color:white; width: 363px;"><a style="color: white; text-decoration: none; font-size: 19px; font-family: arial;" href="http://<?=trim($_SERVER['SERVER_NAME'], "/");?>/addreview/addnew?mail=<?=base64_encode($email).'&rand_string='.base64_encode($rand_string);?>">Подтвердить адрес электронной почты</a></div>
        <p style="font-size: 17px; font-family: arial;">Если вы получили это письмо по ошибке, просто проигнорируйте его.</p>
>>>>>>> dev:mail/confirm_email.php
        <p style="font-size: 17px; font-family: arial;">Данное сообщение является системным. Не нужно отвечать на него.</p>
        <p style="font-size: 17px; font-family: arial;">Желаем вам удачи и успехов!<br/>
            Команда независимого портала 711.ru</p>
    </div>
    <br/>
</div>
<p align="center" style="font-size: 10px; color:gray;text-decoration: none;font-family: arial;"> OOO "711.ru"<br/>
    Это сообщение отправлено на адрес <span style="font-size: 10px; color:blue; text-decoration: none;font-family: arial;"><?= $user->email ?></span><br/>
    Вы получили это письмо, потому что оставляли отзыв на портале о страховании 711.ru<br/>
    <span style="font-size: 10px; color:blue;text-decoration: none;font-family: arial;">www.711.ru</span></p>

