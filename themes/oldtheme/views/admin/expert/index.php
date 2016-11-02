<div id ='admin-side'>
    <div class ='consultation-index' >
        <h2>Вопросы-ответы: Разделы</h2>
        <a href = '/editexperts' > 
            <button class ='redir-experts'>
                Эксперты 
            </button>
        </a>
        <table class = 'spikers'>
            <thead >
                <tr>
                    <th>Название</th>
                    <th>Вопросов</th>
                    <th>Текущий спикер</th>
                    <th>Видимость</th>
                    <th>Очередность</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (isset($sections)) :
                foreach ($sections as $section) : ?>
                    <tr section = "<?= $section['id'] ?>">
                        <td><?= $section['title'] ?></td>
                        <td><?= $section['all_questions_sum'] ?> </td>
                        <td>
                            <?= $section['full_name'] ?>,
                            <?= $section['position'] ?>
                        </td>
                        <td><?= $section['show_section'] == 1 ? 'Да' : 'Нет' ?></td>
                        <td>
                            <span class ='arr-wrap'><span class ='arr arr-up'>&uArr;</span>Вверх</span><br/>
                            <span class ='arr-wrap'><span class ='arr arr-down'>&dArr;</span>Вниз</span>
                        </td>
                        <td><a href ='/editexpertsection/<?= $section['id'] ?>' class = 'edit-section'>Редактировать</a></td>
                        <td><span class = 'delete-section'>Удалить</span></td>
                    </tr>

                <?php endforeach;
                endif;
                ?>

            </tbody>
        </table>
        <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
        <span class ='add-section'>Добавить новый раздел</span>
        <form action='/admin/addqasection' id ='add-section-form'>
            <table class ='add-section-table'>
                <tr>
                    <td>Название раздела</td>
                    <td>
                        <input type ='text' name='title' placeholder="Введите название раздела"/>
                    </td>
                    <td>
                        <label class = 'error title'></label>
                    </td>
                </tr>
                <tr>
                    <td>Описание раздела</td>
                    <td>
                        <textarea name ='description' placeholder="Введите описание раздела"></textarea>
                    </td>
                    <td>
                        <label class = 'error description'></label>
                    </td>
                </tr>
                <tr>
                    <td>Спикер</td>
                    <td>
                        <select name ='expert_id'>
                            <?php foreach ($droplist as $option) : ?>
                                <option value ='<?= $option['id'] ?>'>
                                    <?= $option['full_name'] ?>,
                                    <?= $option['position'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <label class = 'error expert_id'></label>
                    </td>
                </tr>
                <tr>
                    <td>Подразделы:</td>
                    <td>

                        <?php foreach ($static_types as $type_key => $type_value) : ?>
                            <input type ='checkbox' name ='insurance_types[]' value ='<?= $type_key ?>' /> <?= $type_value ?> <br/>
                        <?php endforeach; ?>

                    </td>
                    <td>
                        <label class = 'error insurance_types'></label>
                    </td>
                </tr>
                <tr>
                    <td>Видимость на сайте:</td>
                    <td>
                        <input type = 'radio' name ='show_section'  checked="checked" value ='1'/>Да
                        <input type = 'radio' name ='show_section'  value ='0'/>Нет
                    </td>
                    <td>
                        <label class = 'error show_section'></label>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type ='hidden'  class = 'toPost' name ='_csrf' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
                        <input type ='submit' value ='Отправить' class ='add-section-button' />
                        <input type ='button' value ='Отмена' class ='add-section-cancel'/>
                    </td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</div>

