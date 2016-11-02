
<div style="width:100%;background-color:#F5F2F0;padding: 10px;">
    <br/>
    <div style="width:600px; border:1px solid lightgrey; margin: 0 auto; padding-left:15px; padding-right:15px; background-color: white">
        <p style="font-size: 19px; font-family: arial;">Вы успешно зарегистрировались на портале 711.ru в качестве автора отзыва.</p>
        <p style="font-size: 17px; font-family: arial;">Ваши регистрационные данные:</p>
        <p style="font-size: 17px; font-family: arial;">Логин: <?= $login ?><br/>пароль: <?= $password ?> <br/>e-mail: <?= $email ?></p>
        <table cellspacing="14">
            <tr>
                <td>
                    <div style="background-color: #4d81ef; margin-left: 1px; padding:12px; color:white; width: 151px;">
                        <a style="color: white; text-decoration: none; font-size: 19px; font-family: arial;" href="http://<?=trim($_SERVER['SERVER_NAME'], "/");?>/addreview">Оставить отзыв</a>
                    </div>
                </td>
                <td>
                    <div style="background-color: #4d81ef; margin-left: 1px; padding:12px; color:white; width: 144px;">
                        <a style="color: white; text-decoration: none; font-size: 19px; font-family: arial;" href="http://<?=trim($_SERVER['SERVER_NAME'], "/");?>/reviews">Читать отзывы</a>
                    </div>
                </td>
                <td>
                    <div style="background-color: #4d81ef; margin-left: 1px; padding:12px; color:white; width: 151px;">
                        <a style="color: white; text-decoration: none; font-size: 19px; font-family: arial;" href="http://<?=trim($_SERVER['SERVER_NAME'], "/");?>/register/login">Личный кабинет</a>
                    </div>
                </td>
            </tr>
        </table>
        <p style="font-size: 17px; font-family: arial;">Данное сообщение является системным. Не нужно отвечать на него.<br/>Просто прочтите и сохраните на всякий случай.</p>
        <p style="font-size: 17px; font-family: arial;">Желаем вам удачи и успехов!<br/>
            Команда независимого портала 711.ru</p>
    </div>
    <br/>
</div>
<p align="center" style="font-size: 10px; color:gray;text-decoration: none;font-family: arial;"> OOO "711.ru"<br/>
    Это сообщение отправлено на адрес <span style="font-size: 10px; color:blue; text-decoration: none;font-family: arial;"><?= $email ?></span><br/>
    <span style="font-size: 10px; color:blue;text-decoration: none;font-family: arial;">www.711.ru</span></p>
