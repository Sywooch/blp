<?
$this->title = "Отправить вопрос » 711.ru - Независимый портал о страховании";
?>
<div style="float:left;width:641px; height: auto;">
    <div id="olit-content">
        <form action="/addfeedback/add" name="sendmail" id="sendmail" method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <div class="heading">
                <span id="news-title">Задать вопрос</span>
            </div>
            <div style="background:#f3f3f3;padding:10px 30px;" class="baseform">
                <table cellpadding="10" width="100%" style="font-size:14px;font-family:verdana;" class="tableform">
                    <tbody>
                        <tr>
                            <td align="center" colspan="2">* поля, обязательные для заполнения</td>
                        </tr>

                    <tr>
                        <td class="label">
                                Контактный телефон:
                        </td>
                        <td align="right"><input type="text" id="input_feedback" class="f_input" name="" maxlength="45"></td>
                    </tr>
                    <tr>
                        <td class="label">
                                Тема:<span class="impot">*</span>
                        </td>
                        <td align="right"><input type="text" id="input_feedback" class="f_input" name="subject" maxlength="45"></td>
                    </tr>
                    <tr>
                        <td valign="top" class="label">
                                Текст сообщение:<span class="impot">*</span>
                        </td>
                        <td align="right"><textarea id="input_feedback" class="f_textarea" style=" height: 150px;padding-top:10px;" name="message"></textarea></td>
                    </tr>
                    </tbody>
                </table>
                <div class="fieldsubmit">
                    <button id="button_feedback" style="" type="submit" class="fbutton" name="send_btn">
                        <span>Отправить</span>
                    </button>
                </div>
            </div>
            <input type="hidden" value="send" name="send">
        </form>
    </div>
</div>
<div style="float:right;width:290px;margin-top:-35px; ">
    <div>
        <div id="left_block_middle_head">КОММЕНТАРИИ</div>
        <div id="left_block_comment_content">
            <? foreach($lastComments as $comment): ?>
            <div style="border-bottom:1px dashed black;font-size:12px; margin-bottom: 12px;">
                <div style="padding:5px;">
                    <div style="color:#999999;font-style: italic;">
                        <?= $comment['date'] ?>                           
                    </div>
                    <div id="user_left_block">
                        <a class="underline" href="mailto:"><?= $comment['name'] ?></a>
                    </div>
                    <div id="comment_left_block">
                        <?= $comment['text'] ?>
                        <a href="<?= $comment['url'] ?>">→</a>
                    </div>
                    <div style="padding-top:4px;text-align:justify;">
                        К новости: <br> <a href="<?= $comment['url'] ?>" style="text-align: left">
                        <?= $comment['new_title'] ?></a>
                    </div>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>