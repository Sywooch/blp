<div id ='admin-side'>
    <div class ='experts-edit-section' >
        <h2>Вопросы-ответы: Эксперты</h2>
        <a href = '/indexexpert' > 
            <button class ='redir-experts'>
                Разделы 
            </button>
        </a>
        <table class = 'experts' border>
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Компания</th>
                    <th>Должность</th>
                    <th>Активирован</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($experts as $expert) : ?>
                    <tr class ='expert' expert = '<?= $expert['id'] ?>'
                        email ="<?= $expert['email'] ?>"
                        photo ="<?= $expert['photo'] ?>"
                        full_name ='<?= $expert['full_name'] ?>'
                        company_name ='<?= $expert['company_name'] ?>'
                        site_name ='<?= $expert['site_name'] ?>'
                        position ='<?= $expert['position'] ?>'
                        reference ='<?= $expert['reference'] ?>'
                        active_expert ='<?= $expert['active_expert'] ?>'
                        >
                        <td><?= $expert['full_name'] ?></td>
                        <td><?= $expert['company_name'] ?></td>
                        <td>
                            <?= $expert['position'] ?>
                        </td>
                        <td><?= $expert['active_expert'] == 1 ? 'Да' : 'Нет' ?></td>
                        <td>
                            <a href ='#' class ='edit-link'>Редактировать</a>
                            <a href ='#' class ='hide-link'>Свернуть</a>
                        </td>
                        <td><a href ='#' class ='delete-link'>Удалить</a></td>
                    </tr>

                    <tr class ='expert-edit-cell'>
                        <td colspan = "6" class ='edit-answer-cell'></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
        <span class ='add-expert'>Добавить нового спикера</span>
        <span class ='add-expert-cancel'>Отменить</span>
        <form id = 'add-expert-form' method ='post' action = '/expert/add'>
            <table class ='add-expert-table' >
             <!---   <tr>
                    <td class = 'left-cell'>
                        Фотография 
                    </td>
                    <td>
                        <div class ="avatar-wrap">
                            <img class="avatar" src ='/images/default_profile_image.png' />
                            <img class ="load-avatar" src ="/images/download.png" />
                            <div class="delete-avatar" avatar ="">&times;</div>
                        </div>
                    </td>
                    <td>

                    </td>
                </tr>
             --->
                <tr>
                    <td>Логин</td>
                    <td>
                        <input type ='text' name='login_name' placeholder="Введите логин"/>
                    </td>
                    <td>
                        <label class ='error name'></label>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type ='text' name='expert_email' placeholder="Введите email експерта"/>
                    </td>
                    <td>
                        <label class ='error email'></label>
                    </td>
                </tr>
                <tr>
                    <td>Пароль</td>
                    <td>
                        <input type ='text' name='password' placeholder="Введите пароль експерта"/>
                    </td>
                    <td>
                        <label class ='error password'></label>
                    </td>
                </tr>
                <tr>
                    <td>ФИО</td>
                    <td>
                        <input type ='text' name='full_name' placeholder="Введите полное имя"/>
                    </td>
                    <td>
                        <label class ='error full_name'></label>
                    </td>
                </tr>
                <tr>
                    <td>Компания</td>
                    <td>
                        <input type ='text' name='company_name' placeholder="Введите название компании"/>
                    </td>
                    <td>
                        <label class ='error company_name'></label>
                    </td>
                </tr>
                <tr>
                    <td>Сайт</td>
                    <td>
                        <input type ='text' name='site_name' placeholder="Введите название сайта"/>
                    </td>
                    <td>
                        <label class ='error site_name'></label>
                    </td>
                </tr>
                <tr>
                    <td>Должность</td>
                    <td><textarea name ='position' placeholder="Введите должность эксперта"></textarea></td>
                    <td>
                        <label class ='error position'></label>
                    </td>
                </tr>
                <tr>
                    <td>Справка об эксперте</td>
                    <td><textarea name ='reference' placeholder="Введите справку об эксперте"></textarea></td>
                    <td>
                        <label class ='error reference'></label>
                    </td>
                </tr>

                <tr>
                    <td>Активирован как эксперт:</td>
                    <td>
                        <input type = 'radio' name ='active_expert' value = '1' id ='1' checked=""/>Да
                        <input type = 'radio' name ='active_expert' value = '0' id ='2'/>Нет
                    </td>
                    <td>
                        <label class ='error active_expert'></label>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type ='hidden'  class = 'toPost' name ='_csrf' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
                        <input type ='submit' value ='Сохранить' class ='add-section-button' />

                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<form   hidden id = 'send-image' action="/expert/loadphoto" enctype="multipart/form-data" method="post" target = 'frame'>
    <input type ='file' name="uploadfile" class ='imgfile'/>
    <input type ='hidden'  name ='_csrf' class ='toPost' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
    <input type="hidden" name ='expert' class = 'expert' value ='' />
    <input type ='submit' name ='sumbit' value ='' />
</form>
<iframe  hidden src ='/expert/loadphoto' name = 'frame' id = 'img-path'></iframe>