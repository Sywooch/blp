<?php
use app\models\Company;

?>


<div style="position: absolute; width: 100%; background-color: red; padding: 10px;">
    <div style="width: 650px; margin: 0 auto;">
        <span style="font-family: arial;font-size: 36px; color: white;"><a style="text-decoration:none; color:white;" href="http://www.711.ru"><i>711</i></a></span><a style="color: white;margin-left: 350px;font-family: Arial;font-size: 20px;text-decoration: none;" href="http://<?=trim($_SERVER['SERVER_NAME'], "/")?>/reviews">Отзывы</a> <span style="color: white; font-family: Arial;font-size: 20px;">|</span> <a href="http://<?=trim($_SERVER['SERVER_NAME'], "/")?>/index.php?do=cabinet" style="color: white; font-family: Arial;font-size: 20px;text-decoration: none;" >Личный кабинет</a>
    </div>
</div>

<div style="width:100%;background-color:#F5F2F0; padding: 10px;">
    <br/>
    <div style="width:600px; border:1px solid lightgrey; margin: 0 auto; padding-left:15px; padding-right:15px; background-color: white">
        <p style="font-size: 19px; font-family: arial;"><?=count($review);?> новых отзывов о работе компании, которой Вы интересуетесь</p>
        <hr style="border-color: silver;">
        <?php foreach ($review as $val): ?>
            <?php if($emailTo != $val['email']): ?>
        <table>
            <tr>
                <td width="25%">
                    <?php
                    $logo = new Company();
                    echo "<div style=\"max-height: 40.5px; max-width: 40.5px;\"><img src='http://711.ru/".$logo->getLogoURL($val['company_id'])."'/>";
                    echo "<br>";
                    echo '<span><img src="http://711.ru/images/rating'.$val['rating'].'.png"></span>';
                    ?>

                </td>
                <td width="50%">
                    <p style="font-size: 19px; font-family: arial;"><?=$val['title']?></p>
                    <?php if(strlen($val['comment']) > 90): ?>
                       <p style="font-size: 17px; font-family: arial;"><?=mb_strimwidth($val['comment'], 0, 70, "...");?><a href="http://<?=trim($_SERVER['SERVER_NAME'], "/")?>/reviews/<?=$val['review_id']?>">читать далее</a></p>
                    <?php else: ?>
                        <p style="font-size: 17px; font-family: arial;"><?=$val['comment'];?></p>
                    <?php endif; ?>
                </td>
                <td width="25%" align="right">
                    <p><?=date("d-m-Y", strtotime($val['date_add']));?></p>
                    <p><div style="background-color: silver;width: 115px;padding-right: 20px;padding-top: 5px;padding-bottom: 5px;"><a style="color:black;text-decoration: none;" href="http://<?=trim($_SERVER['SERVER_NAME'], "/")?>/reviews/<?=$val['review_id']?>">Читать отзыв</a></div></p>
                </td>
            </tr>
        </table>
        <hr style="border-color: silver;">
         <?php endif; ?>
        <?php endforeach; ?>
        <p style="font-size: 19px; font-family: arial;">Рекомендуем почитать, что пишут о компании</p>

        <table>
            <tr>
                <td width="100" align="left">
                    <?php
                    echo "<div style=\"max-height: 40.5px; max-width: 40.5px;\"><img src='http://711.ru/".$log."'/>";
                    ?>
                </td>
                <td width="300" align="center">
                    <p style="font-size: 17px;font-family: arial;"><?=$company_name;?></p>
                    <p style="font-size: 17px;font-family: arial;"><a href="http://<?=trim($_SERVER['SERVER_NAME'], "/")?>/companies/<?=$user_id;?>">читать</a></p>
                </td>

            </tr>
        </table>
         <hr style="border-color: silver;">

        <p style="font-size: 15px; font-family: arial; color: lightgrey;">Данное сообщение является системным. Не нужно отвечать на него.<br/>Настроить уведомления можно в личном кабинете</p>
        <p style="font-size: 17px; font-family: arial;">Желаем вам удачи и успехов!<br/>
            Команда независимого портала 711.ru</p>
    </div>
    <br/>
</div>
<p align="center" style="font-size: 10px; color:gray;text-decoration: none;font-family: arial;"> OOO "711.ru"<br/>
    Это сообщение отправлено на адрес <span style="font-size: 10px; color:blue; text-decoration: none;font-family: arial;"><?=$emailTo?></span><br/>
    Вы получили это письмо, потому что оставляли отзыв на портале о страховании 711.ru<br/>
    <a href="http://<?=trim($_SERVER['SERVER_NAME'], '/')?>/reviews/disable-email?enabled=<?=base64_encode($emailTo);?>">Отписаться от рассылки </a><br>
    <span style="font-size: 10px; color:blue;text-decoration: none;font-family: arial;">www.711.ru</span></p>
