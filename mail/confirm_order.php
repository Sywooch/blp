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
        <div style="background-color: red; margin-left: 1px; padding:15px; color:white; width: 363px;">
            
            <?php
                
                echo Html::a('Подтвердить адрес электронной почты.',
                Yii::$app->urlManager->createAbsoluteUrl(
                    [
                        '/agents/confirmorder',
                        'key' => $user->auth_key,
                        'email' => urlencode($user->email),
                        'order_id' => $order_id,
                    ]
                ), ['style' => ['color'=>'white', 'text-decoration' => 'none', 'font-size' => '19px', 'font-family' => 'arial']]);
               
            ?>
            
        </div>
        <p style="font-size: 17px; font-family: arial;">Напоминаем, что у Вас есть аккаунт на нашем сайте, оформленный на данный email адресс. </p>
        <p style="font-size: 17px; font-family: arial;">Если Вы забыли пароль, Вы можете его восстановить на нашем сайте.</p>
        <p style="font-size: 17px; font-family: arial;">Если это письмо пришло по ошибке, просто проигнорируйте его.</p>
        <p style="font-size: 17px; font-family: arial;">Данное сообщение является системным. Не нужно отвечать на него.</p>
        <p style="font-size: 17px; font-family: arial;">Желаем Вам удачи и успехов!<br/>
            Команда независимого портала 711.ru</p>
    </div>
    <br/>
</div>
<p align="center" style="font-size: 10px; color:gray;text-decoration: none;font-family: arial;"> OOO "711.ru"<br/>
    Это сообщение отправлено на адрес <span style="font-size: 10px; color:blue; text-decoration: none;font-family: arial;"><?= $user->email ?></span><br/>
    Вы получили это письмо, потому что оставляли отзыв на портале о страховании 711.ru<br/>
    <span style="font-size: 10px; color:blue;text-decoration: none;font-family: arial;">www.711.ru</span></p>