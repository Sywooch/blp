<div>
    <table class ='edit-answer-form'>
        <tr>
            <td>Имя автора</td>
            <td colspan="4">
                <input type ='text' disabled name='user_name' value =''/>
            </td>

        </tr>
        <tr>
            <td>Email автора</td>
            <td colspan="4">
                <input type ='text' disabled name='user_email' value ='' />
            </td>
        </tr>
        <tr>
            <td>Вопрос:</td>
            <td><textarea name ='question' placeholder="Введите вопрос" id ='question' style = 'width: 400px; height: 150px'></textarea></td>
            <td colspan="3">
                <label class = 'error question'></label>
            </td>
        </tr>
        <tr>
            <td>Ответ:</td>
            <td><textarea name ='answer' placeholder="Введите ответ" id = 'answer' style = 'width: 400px; height: 150px' ></textarea></td>
            <td colspan="3">
                <label class = 'error answer'></label>
            </td>
        </tr>

        <tr>
            <td>Спикер</td>
            <td>
                <select class = 'exp_id' name ='expert_id'></select>
            </td>
            <td colspan="3">
                <label class = 'error expert_id'></label>
            </td>
        </tr>
        <tr>
            <td>Раздел</td>
            <td class = 'section-wrap'>
               
            </td>
            <td colspan="3">
                <label class = 'error section'></label>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="4">
                <input type ='button' value ='Сохранить' class ='add-section-button edit-question-button' />
                <input type ='button' value ='Отмена' class ='add-section-cancel'/>
            </td>
        </tr>
    </table>

    <!------------------ Редактирование эксперта админом, темплейт -------->
    <table class ='edit-expert-table'>
        <tr>
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
        <tr>
            <td>Email</td>
            <td>
                <input type ='text' name='email' placeholder="Введите название раздела"/>
            </td>
            <td>
                <label class = 'error email' ></label>
            </td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td>
                <input style ='width: 80%; float: left' type ='text' name='password' class ="changepass" placeholder="******"/>
                <button class ='edit-expert-pass'>Сменить пароль</button>
            </td>
            <td>
                <label class = 'error password' ></label>
            </td>
        </tr>
        <tr>
            <td>ФИО</td>
            <td>
                <input type ='text' name='full_name' placeholder="Введите название раздела"/>
            </td>
            <td>
                <label class = 'error full_name' ></label>
            </td>
        </tr>
        <tr>
            <td>Компания</td>
            <td>
                <input type ='text' name='company_name' placeholder="Введите название раздела"/>
            </td>
            <td>
                <label class = 'error company_name' ></label>
            </td>
        </tr>
        <tr>
            <td>Сайт</td>
            <td>
                <input type ='text' name='site_name' placeholder="Введите название раздела"/>
            </td>
            <td>
                <label class = 'error site_name' ></label>
            </td>
        </tr>
        <tr>
            <td>Должность</td>
            <td><textarea name ='position' placeholder="Введите описание раздела"></textarea></td>
            <td>
                <label class = 'error position' ></label>
            </td>
        </tr>
        <tr>
            <td>Справка об эксперте</td>
            <td><textarea name ='reference' placeholder="Введите описание раздела"></textarea></td>
            <td>
                <label class = 'error reference' ></label>
            </td>
        </tr>

        <tr>
            <td>Активирован как эксперт:</td>
            <td>
                <input type = 'radio' name ='section-show' class ='radio1'/><label for ='1'>Да</label>
                <input type = 'radio' name ='section-show' class ='radio2'/><label for ='2'>Нет</label>
            <td>
                <label class = 'error active_expert' ></label>
            </td>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type ='hidden' value ='' name ='expert' />
                <input type ='button' value ='Сохранить' class ='edit-expert-button' />

            </td>
        </tr>
    </table>

</div>