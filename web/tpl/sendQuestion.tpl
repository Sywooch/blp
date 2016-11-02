<div>
    <div class ="sendQuestionPopup" >
        <form id = 'send-question-form'>
        <table>
            <tr>
                <td colspan ='3'>
                    <span class = 'replace' >Форма отправки вопроса </span>
                    <div class ='close'>x</div>
                </td>
            </tr>
            <tr>
                <td>Представьтесь*</td>
                <td>
                    <input placeholder = 'Имя' type = 'text' name = 'name' value ='' disabled/>
                </td>
                <td><label class ='error name'></label></td>
            </tr>
            <tr>
                <td>Ваш email*</td>
                <td><input placeholder ='Адрес электронной почты' type ='text' name ='email' disabled/></td>
                <td><label class ='error email'></label></td>
            </tr>
            <tr>
                <td>Вид страхования*</td>
                <td class ='insurance_type2'></td>
                <td><label class ='error insurance_type'></label></td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea name ='question' placeholder="Напишите здесь свой вопрос" id = 'sendQuestionTextarea'></textarea>
                </td>
                <td><label class ='error question'></label></td>
            </tr>
            <tr>
                <td>
                    <input type ='hidden' name = 'expert_id' value ='' />
                    <input type ='hidden' name = 'section' value ='' />
                    <input type ='button' value ='Отправить вопрос' class ='send-question-button'/>
                    <label class ="sending"></label>
                </td>
                <td>
                    
                </td>
            </tr>
        </table>
    </form>
    </div>
</div>
