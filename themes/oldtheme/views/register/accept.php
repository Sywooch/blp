<? $this->title = "Регистрация посетителя » 711.ru - Независимый портал о страховании"; ?>
<div id="newsspeedbar" style="float:left;width:900px;">
    <div style="padding-left: 10px">
        <div class="speedbar"><span id="olit-speedbar"><a href="/">711.ru</a> » Регистрация посетителя</span></div>
    </div>
</div>
<div style="float:left;width:900px; height: auto;">
    <div class="heading">
        Регистрация нового пользователя
    </div>
    <form id="regForm" method="post" action="/register/register" >
        <div class="baseform" style="padding:10px;">
            <table class="tableform" width = '1000px'>
                <tr>
                    <td colspan="2">
                        <b>Здравствуйте, уважаемый посетитель нашего сайта!</b><br />
                        Регистрация на нашем сайте позволит Вам быть его полноценным участником.
                        Вы сможете добавлять новости на сайт, оставлять свои комментарии, просматривать скрытый текст и многое другое.
                        <br />В случае возникновения проблем с регистрацией, обратитесь к <a href="/index.php?feedback">администратору</a> сайта.
                        <br/>
                    </td>
                </tr>
                <tr>
                    <td>Ваш E-Mail:<span class="impot">*</span></td>
                    <td>
                        <input type="text" name="email" class="f_input" id ="email" />
                        <label  id="emailMsg" style="display:inline"></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                         e-mail будет вашим логином для входа на сайт 711.ru 
                    </td>
                </tr>
                <tr>
                    <td  width = '200px'>
                        Имя:<span class="impot">*</span>
                    </td>
                    <td width ='600px;'>
                        <input type="text" name="name" id='full_name' style=" margin-right: 6px;" class="f_input" />
                        <label  id="existMsg" style="display:inline"></label>
                        <!----<input class="bbcodes" style="height: 22px; font-size: 11px;" title="Проверить доступность логина для регистрации" id="checkBtn" type="button" value="Проверить имя" />-->
                        <div id='result-registration'></div>
                    </td>
                </tr>
                <tr>
                    <td  colspan="2" style="text-align:center;display:none;">Логин занят</td>
                </tr>
                <tr>
                    <td >
                        Пароль:<span class="impot">*</span>
                    </td>
                    <td>
                        <input type="password" id="password1" name="password1" class="f_input" />
                        <label  id="pass1Msg" style="display:inline"></label>

                    </td>
                </tr>
                <tr>
                    <td >
                        Повторите пароль:<span class="impot">*</span>
                    </td>
                    <td>
                        <input type="password" id="password2" name="password2" class="f_input" />
                        <label  id="pass2Msg" style="display:inline"></label><br/>
                        <label id="passMsg" style="display:inline"></label>
                    </td>
                </tr>
                
            </table>
            <div class="fieldsubmit" style ='margin-left: 230px; margin-top: 10px;'>
                <button name="submit" class="fbutton" type="submit"><span>Регистрация</span></button>
            </div>
        </div>
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
    </form>
</div>
<script>
    
    $('#password2, #password1').on('keyup', function () {
         $('#passMsg').text("");
         $('#pass1Msg').text("");
        checkPassword($('#password1').val(), 1);  
        checkPassword($('#password2').val(), 2);
        
        
        if ($("#password1").val() != $("#password2").val())
            $('#passMsg').css("color", "red").show().text("Пароли не совпадают");
        else
            $('#passMsg').css("color", "green").show().text("Пароли совпадают");
        
        
    });

    $("#regForm").submit(function () {
        if (!emptyValue())
        {
            return false;
        }

        if ($("#password1").val() != $("#password2").val()) {
            $('#passMsg').css("color", "red").show().text("Пароли не совпадают");

            return false;
        }
    });


    $("#name").on('keyup', function () {
        checkName();
    });

    $('#email').on('keyup', function () {
        // checkEmail($('#email').val());
        $.getJSON('/register/checkemail', 'email=' + $("#email").val(), function (data) {
            var $td = $("#emailMsg");
            switch (data.exist) {
                case 'success':
                    $td.css("color", "green").show().text("Правильно!");
                    break;
                case 'exist':
                    $td.css("color", "red").show().text("Такая почта существует!");
                    break;
                case 'not_email':
                    $td.css("color", "red").show().text("Неверный формат почты!");
                    break;
            }

        });
    });

    function checkName() {
        $.getJSON('/register/check',
                {'name': $("#name").val()},
        function (data) {
            var $td = $("#existMsg");
            switch (data['exist']) {
                case true:
                    $td.css("color", "red").show().text("Логин занят");
                    break;
                case false:
                    $td.css("color", "green").show().text("Логин свободен");
                    break;
            }
        });
    }





    function checkEmail(str) {
        var reg = /^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/;
        if (!reg.test(str)) {
            $('#emailMsg').css("color", "red").show().text("Неверный формат почты");
        }
        else {
            $('#emailMsg').css("color", "green").show().text("Правильно!");
        }
    }
    
    
        function checkPassword(str, n) {
        var reg = /^([A-Za-z0-9]+[\s\,\.\-]*)+$/;
        if (!reg.test(str)) {
            $('#pass'+ n +'Msg').css("color", "red").show().text("Только английские буквы и цифры");
            return false;
        }
        else {
            $('#pass'+ n +'Msg').css("color", "green").show().text("Вы используете разрешенные символы! Продолжайте!");
        }
    }

    function emptyValue() {
        if ($("#name").val() == '') {
            $('#existMsg').css("color", "red").show().text("Имя не должно быть пустым");
            return false;
        }
        if ($("#password1").val() == '') {
            $('#pass1Msg').css("color", "red").show().text("Поле не может быть пустым");
            return false;
        }
        if ($("#password2").val() == '') {
            $('#passMsg').css("color", "red").show().text("Поле не может быть пустым");
            return false;
        }

        if ($("#email").val() == '') {
            $('#emailMsg').css("color", "red").show().text("Почта обязательное поле");
            return false;
        }
        return true;
    }


</script>
<?php if (isset($_GET['check']) && $_GET['check'] == 'yes') : ?>
    <script>
        alert("Проверьте правильность введенных данных");
    </script>
<?php endif; ?>