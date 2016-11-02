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
                            Отзыв о работе компании <?= $name ?> прокомментировали.
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"style="padding: 15px;">
                        <span style="color: #424955; font: 16px Arial, sans-serif; line-height: 24px; -webkit-text-size-adjust:none; display: block;">
                            Автор комментария: <?= $author ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"style="padding: 15px;">
                        <span style="color: #424955; font: 16px Arial, sans-serif; line-height: 24px; -webkit-text-size-adjust:none; display: block;">
                           <?php
                                if(strlen($comment) > 70){
                                    //$com = iconv( "windows-1251" , "utf-8" , strip_tags($comment));
                                    echo "<br/><i>".mb_strimwidth($comment, 0, 80, "...")."</i> <a href='http://".trim($_SERVER['SERVER_NAME'], "/")."/reviews/".$id."'>читать далее</a>";
                                }else
                                    echo "<br><i>".$comment."</i>... <a href='http://".trim($_SERVER['SERVER_NAME'], "/")."/reviews/".$id."'>читать далее</a>";
                            ?> 
                        </span>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#4d81ef" align="center" style="padding: 15px">
                        <span style="color: #424955; font: 16px Arial, sans-serif; line-height: 24px; -webkit-text-size-adjust:none; display: block;">
                            Ответить на комментарий Вы можете на странице отзыва по
                        </span> 
                        <a href="http://<?=trim($_SERVER['SERVER_NAME'], "/");?>/reviews/<?=$id;?>" target="_blank" style="text-decoration: none; color: #ffffff !important; font: 16px Arial, sans-serif; line-height: 24px; -webkit-text-size-adjust:none; display: block;">
                            <span style="display: block; color: white;">Ссылке</span>
                        </a>
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


