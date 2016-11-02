<?
$this->title = "Добавить новость » 711.ru - Независимый портал о страховании";
?>
<div style="float:left;width:641px; height: auto;">
    <div id="olit-content">  
        <form action="/addnews/add" id="entryform" name="entryform" method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <div class="pheading"><h2>Добавить новость</h2></div>
            <div class="baseform">	
                <table class="tableform">
                        <tbody><tr>
                                <td class="label">
                                        Заголовок:<span class="impot">*</span>
                                </td>
                                <td><input type="text" class="f_input" maxlength="150" value="" name="title"></td>
                        </tr>

                        <tr>
                                <td class="label">
                                        Категория:<span class="impot">*</span>
                                </td>
                                <td>
                                    <select multiple style="width:350px;height:140px;" id="category" name="category" data-placeholder="Выберите категорию ...">
                                        <option value="0"></option>
                                        <? foreach($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>" style="color: black"><?= $category['name'] ?></option>
                                        <? endforeach; ?>
                                    </select></td>
                        </tr>
                        <tr>
                            <td>
                                    <b>Вводная часть: <span class="impot">*</span></b> (Обязательно)
                            </td>
                            <td>
                                <textarea name = "short_story" required id="short_story" >
                                </textarea>
                            </td>
                            <script>
                                CKEDITOR.replace('short_story');
                            </script>  
                        </tr>
                        <tr>
                            <td>
                                    <b>Подробная часть:</b> (Необязательно)
                            </td>
                            <td>
                                <textarea name = "full_story" required id="full_story" >
                                </textarea>
                            </td>
                            <script>
                                CKEDITOR.replace('full_story');
                            </script>  
                        </tr>
                        <tr id="xfield_holder_image-news">
                            <td class="addnews">Главная картинка новости (ссылка):</td>
                            <td colspan="2" class="xfields">
                                <input type="text" value="" id="xfield[image-news]" name="xfield[image-news]">
                                &nbsp;&nbsp;(необязательно)
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Ключевые слова для облака тегов:</td>
                            <td>
                                <input type="text" autocomplete="off" class="f_input" maxlength="150" value="" id="tags" name="tags">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="fieldsubmit">
                        <button type="submit" class="fbutton" name="add"><span>Отправить</span></button>
                        <button type="submit" class="fbutton" onclick="preview()" name="nview"><span>Просмотр</span></button>
                </div>
            </div>
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