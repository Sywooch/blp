<?php $this->title = "Личный кабинет » 711.ru - Независимый портал о страховании"; ?>
<?php use \yii\widgets\LinkPager; ?>
<div style="width:940px;" id = 'cabinet-expert'>
    <div id="olit-content">
        <div style="float:left;width:641px;" >
            <h1 class="heading">Вопрос-ответы:</h1>
            <div style="background:#E5E5E5;">

                <div class="print_company_reviews">
                    <div id="panel1" class="text-pannel">
                        
                        <?php
                        if (isset($answers)) :
                            foreach ($answers['questions'] as $answer) :
                                ?>
                                <div class ='one-question' question = '<?= $answer['id'] ?>' <?= $answer['new_question'] == 1 ? 'new' : 'old' ?>>

                                    <div class ='insurance-body'>
                                        <div class ='top-body'>
                                            <?php if ($answer['new_question'] == 1) { ?>
                                                <span class ='new'>NEW!</span> Вопрос в разделе <?= $answer['section_name'] ?>
                                                <span class ='do-answer'>Ответить</span>
                                                <span class ='do-slide-up'>Свернуть</span>   
                                            <?php } else { ?>
                                                Вопрос в разделе <?= $answer['section_name'] ?>
                                                <span class ='do-answer'>Читать / редактировать</span>
                                                <span class ='do-slide-up'>Свернуть</span>
                                            <?php } ?>

                                        </div>
                                        <div class ='top-body'>
                                            <?php if ($answer['new_question'] == 0) { ?>
                                                <span class ='answered'>
                                                    Вы ответили на вопрос
                                                </span>
                                            <?php } ?>
                                        </div>
                                        <div style ='clear:both'></div>
                                        <div class ='left-body' style='padding-top: 0px'>Автор:</div>
                                        <div class ='right-body'><?= $answer['user_name']?></div>
                                        
                                        <div class ='left-body'>
                                            Вопрос:
                                        </div>
                                        <div class ="right-body">
                                            <div class ='big-text'>
                                                <?= $answer['question'] ?>
                                              <!----   <a class="read-more-link">Читать дальше</a>
                                               <span class ='read-more'>
                                                    <?= mb_substr($answer['question'], 21, 1000) ?>
                                                </span> --->
                                            </div>
                                            <div class ='insurance-type'>
                                                вид страхования <?= \yii::$app->params['staticTypes'][$answer['insurance_type']] ?>
                                            </div>
                                            <div class ="answer-date">
                                                Добавлен <?= $answer['question_date'] ?>
                                            </div>


                                        </div>


                                    </div>
                                    <?php if ($answer['new_question'] == 0) { ?>
                                        <div class ='insurance-body read-more'>
                                            <div class ='left-body'>
                                                Ответ:
                                            </div>
                                            <div class ="right-body">
                                                <div class ='big-text'>
                                                    <p><?= $answer['answer'] ?></p>
                                                    <textarea style = 'width: 410px; height: 150px' class ='edit-answer' id = 'replace-me<?=$answer['id']?>'><?= $answer['answer'] ?></textarea>
                                                    <button class = 'send-edit-answer'>Отправить</button>
                                                    <button class ='cancel-edit-answer'>Отмена</button>
                                                </div>



                                            </div>

                                            <div class ="bottom-body">
                                                <span class ='do-edit'>Редактировать ответ</span>
                                                <span class='do-slide-up'>Свернуть</span>
                                            </div>

                                        </div>
                                    <?php } else { ?>
                                        <div class ='insurance-body read-more'>
                                            <div class ='left-body'></div>
                                            <div class ='right-body'>
                                                <div class ='big-text'>
                                                    <textarea style = 'width: 410px; height: 150px' name ='answer' class ='answer-text' placeholder="Напишите здесь свой ответ" id = 'replace-me<?=$answer['id']?>'></textarea>
                                                    <input type ='button' value = 'Опубликовать' class ='answer-button'>
                                                </div>
                                            </div>
                                        </div>  
                                    <?php } ?>

                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                      <?= LinkPager::widget(['pagination' => $answers['pages']]) ?>  
                    </div>
                    
                    <div id ='panel2' class ='text-pannel hide-pannel' >

                        <div class ='edit-info'>
                            <form id = 'edit-expert-form' method = 'post' action = '/expert/edit' >
                                <table>
                                    <tr>
                                        <td class = 'left-cell'>
                                            Фотография 
                                        </td>
                                        <td>
                                            <div class ="avatar-wrap">
                                                <img class="avatar" src ='<?= $expert['photo'] ?>' />
                                                <img class ="load-avatar" src ="/images/download.png" />
                                                <div class="delete-avatar" avatar ="<?= $expert['id'] ?>">&times;</div>
                                            </div>
                                        </td>
                                        <td>
                                            <label class='success'>Данные успешно обновлены</label>
                                            <label class ='error other'>Произошла ошибка, попробуйте позже</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ФИО:
                                        </td>
                                        <td>
                                            <div class= 'full_name'><?= $expert['full_name'] ?></div> 
                                            <input name ='full_name' type ='text' class ='edit-fields' value ='<?= $expert['full_name'] ?>' />

                                        </td>
                                        <td>
                                            <label class ='error full_name'></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Компания:
                                        </td>
                                        <td>
                                            <div class='company_name'>
                                                <?= $expert['company_name'] ?> 
                                            </div>
                                            <input name ='company_name' type ='text' class ='edit-fields' value ='<?= $expert['company_name'] ?>' />
                                        </td>
                                        <td>
                                            <label class ='error company_name'></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Адрес сайта:
                                        </td>
                                        <td>
                                            <div class ='site_name'>
                                                <?= $expert['site_name'] ?> 
                                            </div>
                                            <input name ='site_name' type ='text' class ='edit-fields' value ='<?= $expert['site_name'] ?>' />
                                        </td>
                                        <td>
                                            <label class ='error site_name'></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Должность:
                                        </td>
                                        <td>
                                            <div class='position'>
                                                <?= $expert['position'] ?> 
                                            </div>
                                            <textarea name ='position' class ='edit-fields' id = 'expert-position'><?= $expert['position'] ?> </textarea>
                                        </td>
                                        <td>
                                            <label class ='error position'></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Справка об эксперте: 
                                        </td>
                                        <td>
                                            <div class='reference'>
                                                <?= $expert['reference'] ?> 
                                            </div>

                                            <textarea name ='reference' class='edit-fields' id = 'expert-reference'><?= $expert['reference'] ?> </textarea>
                                        </td>
                                        <td>
                                            <label class ='error reference'></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           Почта для уведомлений: 
                                        </td>
                                        <td>
                                            <div class='email'><?= $expert['notification_email'] ?> </div>
                                            <input name ='email' type ='text' name ='email' value ='<?= $expert['notification_email'] ?>' class='edit-fields'/>
                                        </td>
                                        <td>
                                            <label class ='error notification_email'></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <input type ='hidden'  name ='_csrf' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
                                            <span class ='start-edit'>Редактировать</span>
                                            <button class ='end-edit'>Сохранить</button>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>

                                </table>
                            </form>
                        </div>

                    </div>
                </div>
                <form hidden  id = 'send-image' action="/expert/loadphoto" enctype="multipart/form-data" method="post" target = 'frame'>
                    <input type ='file' name="uploadfile" class ='imgfile'/>
                    <input type ='hidden'  name ='_csrf' class ='toPost' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
                    <input type ='submit' name ='sumbit' value ='' />
                    <input type ='hidden' name ='expert' value ='' id ='one-expert' />
                </form>
                <iframe  hidden src ='/expert/loadphoto' name = 'frame' id = 'img-path'></iframe>

                <script>
                    function hide_answer_form(id) {
                        $("[data-id = '" + id + "']").slideToggle("medium");
                    }
                </script>
            </div>
        </div>
        <div style="float:right;width:290px;">
            <div id="left_block_top_head">ЭКСПЕРТ</div>
            <div style="background:white;font-size:14px;">
                <div style="border-bottom:1px solid #f3f3f3;padding:10px 0px;text-align:center;"><?= $user['name'] ?><br></div>    


                <div style="border-bottom:1px solid white;padding:20px 10px;background:#f3f3f3;"><a  href="#" class="underline panel" panel = 'panel1'>Ответы</a></div>
                <div style="border-bottom:1px solid white;padding:20px 10px;background:#f3f3f3;"><a  href="#" class="underline panel" panel = 'panel2'>Редактировать информацию</a></div>

                <div style="border-bottom:1px solid #f3f3f3;padding:20px 10px;"><a href="/cabinet/edituserinfo" class="underline">Личные данные</a></div>
                <div style="border-bottom:1px solid #f3f3f3;padding:20px 10px;"><a href="/index.php?do=logout" class="underline">Выйти</a></div>
            </div>
        </div>
    <!--    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> -->
        <script>
                  
                    
                    $("#edit_button").click(function() {
                        $(".cpmpany_info_text").hide();
                        $(".cpmpany_info_input").show();
                    });
                    $("#save_button").click(function() {
                        $("#edit_form").submit();
                    });
                    $(".cabinet_button_answer").click(function() {
                        $(this).hide();
                        $(".cabinet_form_answer[data-id=" + $(this).data("id") + "]").show();
                    });


        </script>

    </div>
</div>
<style>
    


</style>