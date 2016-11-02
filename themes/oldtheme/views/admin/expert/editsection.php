


 
<div id ='admin-side'>
    <div class ='consultation-edit-section' >
        <h2>Вопросы-ответы: Разделы</h2>
        <a href = '/indexexpert' > 
            <button class ='redir-experts'>
                Разделы 
            </button>
        </a>
        <div hidden id  ='section-droplist'>
            <select class ='section_id' name = 'section_id' >
                <option value = "<?= $section['id'] ?>"><?=$section['title']?></option>
                <?php foreach ($sections_droplist['sections'] as $value) : ?>
                <option value = "<?= $value['id'] ?>"><?=$value['title']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <form id = 'edit-one-section' method = 'post' action = 'admin/editonesection'>
            <table class ='edit-section-table'>
                <tr>
                    <td>Название раздела</td>
                    <td>
                        <input type ='text' name='title' placeholder="Введите название раздела" value ="<?= $section['title'] ?>" />
                    </td>
                    <td>
                        <label class = 'error title'></label>
                    </td>
                </tr>
                <tr>
                    <td>Описание раздела</td>
                    <td>
                        <textarea id = 'ckdescription' style = 'width: 600px; height: 150px' name ='description' placeholder="Введите описание раздела"><?= $section['description'] ?></textarea>
                        <!---<script>CKEDITOR.replace('ckdescription');</script>-->
                    </td>
                    <td>
                        <label class = 'error description'></label>
                    </td>
                </tr>
                <tr>
                    <td>Спикер</td>
                    <td>
                        <select name ='expert_id'>

                            <option value ='<?= $section['expert_id'] ?>'><?= $section['full_name'] ?></option>
                            <?php foreach ($droplist as $expert) : ?>
                            <option value ="<?= $expert['id'] ?>"><?= $expert['full_name'] ?></option>
                            <?php endforeach; ?>

                        </select>
                    </td>

                    <td>
                        <label class = 'error expert_id'></label>
                    </td>
                </tr>
                <tr>
                    <td>Типы полиса:</td>
                    <td>
                        <?php foreach ($static_types as $type_key => $type_value) : ?>
                            <input <?= in_array($type_key, unserialize($section['insurance_types'])) ? 'checked' : '' ?>
                                type ='checkbox' name ='insurance_types[]' value ='<?= $type_key ?>' /> <?= $type_value ?> <br/>
                            <?php endforeach; ?>
                    </td>
                    <td>
                        <label class = 'error insurance_types'></label>
                    </td>
                </tr>
                <tr>
                    <td>Видимость на сайте:</td>
                    <td>
                        <input type = 'radio' name ='show_section' value = '1' <?= $section['show_section'] == 1 ? 'checked' : '' ?> />Да
                        <input type = 'radio' name ='show_section' value = '0' <?= $section['show_section'] == 0 ? 'checked' : '' ?> />Нет
                    </td>
                    <td>
                        <label class = 'error show_section'></label>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type ='hidden' name ='section' value ='<?= $section['id'] ?>' />
                        <input type ='hidden'  class = 'toPost' name ='_csrf' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
                        <input type ='button' value ='Отправить' class ='add-section-button' />
                    </td>
                    <td></td>
                </tr>
                
            </table>
        </form>


        <table class = 'answers' >
            <thead>
                <tr>
                    <th>Тип</th>
                    <th>Текст</th>
                    <th>Дата добавления</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>


                <?php
                if (count($answers) > 0) :
                    foreach ($answers as $answer) :
                        ?>
                        <tr class ='question'>
                            <td>Вопрос <?= $answer['id'] ?></td>

                            <td>
                                <div style = 'max-width: 500px'>
                                    <span class ='quest1'><?= substr($answer['question'], 0, 150) ?></span> 
                                   <?php // strlen($answer['question'])>150?"" ?>
                        <a class ='slide-down'>Развернуть</a>
                       <?php // . "":"" ?>

                                    <span class ='read-more quest2'>
                                        <?= substr($answer['question'], 151, 1000) ?>  
                                    </span>
                                </div>
                            </td>
                            <td><?= $answer['question_date'] ?></td>
                            <td><a href ='#' class ='edit-link'>Редактировать</a></td>
                            <td>
                                <span class ='remove-link'>Удалить</span>
                                <input type ='hidden' name ='question_id' value ='<?= $answer['id'] ?>' class ='question_id' />
                                <input type ='hidden' name ='user_name' value ='<?= $answer['user_name'] ?>' />
                                <input type ='hidden' name ='user_email' value ='<?= $answer['user_email'] ?>' />
                                <input type ='hidden' name ='answer' value ='<?= $answer['answer'] ?>' />
                                <input type ='hidden' name ='question' value ='<?= $answer['question'] ?>' />
                                <input type ='hidden' name ='expert_id' value ='<?= $answer['expert_id'] ?>' />
                                <input type ='hidden' name ='expert_name' value ='<?= $answer['expert_name'] ?>' />
                                <input type ='hidden' name ='expert_position' value ='<?= $answer['expert_position'] ?>' />
                            </td>
                        </tr>
                        <tr class ='answer'>
                            <td>Ответ <?= $answer['id'] ?></td>
                            <td >
                                <div style = 'max-width: 500px' >
                                    <span class = 'answr'><?= $answer['answer'] ?> </span>
                                    <a class ='slide-up'>Свернуть</a>
                                </div> 
                            </td>
                            <td><?= $answer['answer_date'] ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan = "5" class ='edit-answer-cell'></td>
                        </tr>
                        <?php
                    endforeach;
                     
                endif;
                ?>

                        <tr><td colspan="5"> <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?></td></tr>
            </tbody>
        </table>
        
    </div>
</div>

