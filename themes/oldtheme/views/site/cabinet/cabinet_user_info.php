<?
$this->title = "Личный кабинет » 711.ru - Независимый портал о страховании";
?>
<div style="width:940px;height:500px;">
    <div id="olit-content">
        <div style="float:left;width:641px;">
            <h1 class="heading">Изменение личных данных</h1>
            <div style="background:white; padding: 10px;">
                <form>
                    <div class="form-group">
                        <label for="name">Логин:</label>
                        <input type="text" class="form-control" id="name" placeholder="Логин" value="<?= $name ?>">
                    </div>
                    <div class="form-group">
                        <label for="full_name">Имя:</label>
                        <input type="full_name" class="form-control" id="full_name" placeholder="E-mail" value="<?= $full_name ?>">
                    </div>
                     <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" placeholder="E-mail" value="<?= $email ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль:</label>
                        <input type="password" class="form-control" id="password" placeholder="Пароль">
                        <input type="password" class="form-control" id="password2" placeholder="Подтвердите пароль">
                    </div>
                    <div class="form-group">
                        <p style="display:none;" class="help-block"></p>
                    </div>
                    <button id="send_btn" type="button" class="btn btn-default">Сохранить</button>
                </form>
            </div>
        <div class ="clr"></div>    
        </div>
        
    </div>
    <div style="float:right;width:290px;">
        <div id="left_block_top_head">СТРАХОВАТЕЛЬ</div>
        <div style="background:white;font-size:14px;">
            <div style="border-bottom:1px solid #f3f3f3;padding:10px 0px;text-align:center;"><?= $name ?><br></div>
            <div style="border-bottom:1px solid white;padding:20px 10px;background:#f3f3f3;"><a href="/?do=legal_aid_form" class="underline">Заявка на юридическую помощь</a></div>
            <div style="border-bottom:1px solid #f3f3f3;padding:20px 10px;"><a href="/cabinet/edituserinfo" class="underline">Личные данные</a></div>
            <div style="border-bottom:1px solid #f3f3f3;padding:20px 10px;"><a href="/index.php?do=logout" class="underline">Выйти</a></div>
        </div>
    </div>
    
</div>
<script>
    function showMessage(msg, color) {
        $help_block = $('.help-block');
        $help_block.text(msg).css('color', color);
        $help_block.show();
    }
    $(document).ready(function(){
        $('#password, #password2').on('keyup', function(){
            if($('#password').val() != $('#password2').val()) 
                showMessage('Пароли не совпадают', 'red');
            else
                if($('#password').val() != '')
                    showMessage('Пароль будет изменен', 'black');
                else
                    showMessage('', 'black');
        });
        $('#send_btn').on('click', function(){
            if($('#password').val() != $('#password2').val()) {
                showMessage('Пароли не совпадают', 'red');
                return;
            }
            var name = $('#name').val();
            var email = $('#email').val();
            var full_name = $('#full_name').val();
            var password = $('#password').val();
            $.ajax({
                method: 'post',
                url: '/cabinet/ajaxsaveuserinfo',
                data: {
                    _csrf: '<?= Yii::$app->request->getCsrfToken(); ?>',
                    name: name,
                    email: email,
                    full_name: full_name,
                    password: password
                }
            }).done(function(data){
                switch(data){
                    case 'success':
                        showMessage('Изменения успешно сохранены', 'green');
                        break;
                    case 'request is not post or user is guest':
                        showMessage('Ошибка отправки запроса', 'red');
                        break;
                    case 'user is not found':
                        showMessage('Ошибка! Пользователь не найден', 'red');
                        break;
                    case 'name or email not defined':
                        showMessage('Ошибка! Имя пользователя или почта не указана', 'red');
                        break;
                    default:
                        showMessage('Ошибка! '+data, 'red');
                        break;
                }
            });
        });
    });
</script>

</div>
</div>

<style>
    .modalButtonReviewAlt {
    background-image: url("/images/sendHover.png");
    margin-left: 5%;
    margin-top: -17%;
    cursor: pointer;
    }


</style>