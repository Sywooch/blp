<?php
use yii\helpers\Html;
$this->title = "Добавить отзыв » 711.ru - Независимый портал о страховании";
$this->registerMetaTag(['name' => 'description', 'content' => 'Оставить отзыв о качестве работы страховой компании, урегулировании убытков, ценах страховых продуктов.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Добавить отзыв, оставить отзыв, отзывы, отзывы о работе страховых компаний, страховые отзывы, качество работы, мнение клиентов']);
?>
<h1 class="h1Header3">Добавить новый отзыв о работе страховой компании</h1>
<div style="float:left;width:641px;">
    <div id="olit-content">
        <div id = 'success2' style='display: none'>
            <p>  Остался один шаг. </p>
            <p>Вам на электронную почту отправлено письмо со ссылкой </p>
            <p> Пройдите по  указанной ссылке для подтверждения адреса электронной почты и публикации отзыва </p>
        </div>
        <div id = 'success' style='display: none'>
            <p> Ваш отзыв успешно добавлен! </p>
            <p><a class = 'review_link' href ='http://711.ru/reviews/' targer = 'blank_'>
                    Перейти на страницу отзыва №
                    <span class ='review_number'></span></a> </p>
            
        </div>
        
        <form method ="post" action ="/addreview/add" id = 'form'>  
            <input type="hidden" name="user_id" value="<?= $id ?>"/>
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
            <div style="padding:10px;font-family: MyriadPro_Cond;">
                <div class="add-reviews-form">
                    <div class="label">Представьтесь*</div>
                    <div class="input">
                        <input type ="text" name ="name" value = "<?= $full_name ?>"/>
                    </div>
                </div>
                <div class="add-reviews-form clearFix">
                    <div class="label">Ваш e-mail*</div>
                    <div class="input">
                        <input type ="text" name ="email" value = "<?= $email ?>"  />
                    </div>
                </div>
                <div class="add-reviews-form clearFix">
                    <div class="label">Город*</div>
                    <div class="input">
                        <input type ="text" name ="city" value = ""   >
                    </div>
                </div>
                <div class="add-reviews-form clearFix">
                    <div class="label">Название страховой компании*</div>
                    <div class="input">
                        <select name ="company_id" >
                            <?php foreach($companies as $c_company): ?>
                            <option value='<?= $c_company['id'] ?>'><?= $c_company['name'] ?></option>
                            <?php endforeach; ?>
                        </select> 
                        <script type='text/javascript'>
                            $('option[value=<?= $company ?>]')[0].selected = true
                        </script>
                    </div>
                </div>
                <div class="add-reviews-form clearFix">
                    <div class="label">Вид страхования*</div>
                    <div class="radio-my">
                        <div class ="inside">
                            <?php foreach($types as $type_id => $type_name): ?>
                            <input type="radio" value="<?= $type_id ?>" name="type">
                            <?= $type_name ?>
                            <br>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="add-reviews-form clearFix">
                    <div class="label">Оценка*</div>
                    <div class="input">
                        <select id="backing2b" name="rating" required>
                            <option value="0">Bad</option>
                            <option value="1">OK</option>
                            <option value="2">Great</option>
                            <option value="3">Excellent</option>
                            <option value="4">Excellent</option>
                            <option value="5">Excellent</option>
                        </select>
                        <div style ='overflow: hidden; width: 100px; height: 17px'>
                            <div class="rateit" data-rateit-backingfld="#backing2b" ></div>
                        </div>
                        
                        <script type='text/javascript'>
                            $('.rateit').rateit();
                        </script>
                    </div>

                </div> 
                <div class="add-reviews-form">
                    <div class="label">Заголовок отзыва</div>
                    <div class="input">
                        <input type ="text" name ="title" value = "" >
                    </div>
                </div>

                <div class="add-reviews-form clearFix">
                    <table>
                        <tr>
                            <td style = 'vertical-align: top; '>
                                <div class="label"> Текст отзыва* </div>
                            </td>
                            <td width = 400px>

                                <div style ='position: relative; left: -10px; width: 400px'>
                                    <textarea name = "comment" required id="editor" >
                                    </textarea>
                                </div>

                                <span id ="error-input" style ='color:red'></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                               

                            </td>
                            <td>
                                <div class="input" style ='position:relative; left: -10px;'>
                                    <input type ="submit" value ="Оставить отзыв"/>
                                </div> 
                            </td>
                        </tr>
                    </table>

                </div>



            </div>
        </form>

        <script>
            document.getElementById('success').style.display = '{switch_1}';
            document.getElementById('form').style.display = '{switch_2}';
        </script>    
        <style>
            #success
            { 
                font-size: 16px;
                position: relative;
                top: 0px;
                padding-left: 65px;
                padding-top: 20px;
                min-height: 500px;

            }


            .add-reviews-form {
                margin-bottom: 10px;
            }	
            .label {
                float: left;
                width: 150px;
                text-align: right;
                margin-right: 15px;	
                font-size: 14px;
                display: block;
                padding: 0 0 0 0;
                font-size: 14px;
                font-weight: normal;
                line-height: 16px;
                color: rgb(31, 40, 44);
                text-align: right;
                white-space: normal;
                vertical-align: baseline;
                /* border-radius: .25em; */
            }
            .radio-my {

                float: left;
                width: 400px;
                text-align: left;
                margin-right: 15px;	
                font-size: 14px;
            }
            .inside
            {
                float: left;
            }


            .clearFix {
                clear: both;	
            }
            .input INPUT {
                line-height: 22px;
                padding-left: 6px;	
                width: 220px;
            }
            .input TEXTAREA {
                padding-left: 6px;	
                width: 220px;
                height: 70px;
            }
            .select {
                padding-left:6px;
                width: 220px;
                height: 70px;
            }
            
            .rateit-hover{
                display: none;
            }
        </style>
    </div>
</div>
<div class="clr"></div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<link rel="stylesheet" type="text/css" href="/js/jquery_real_person/jquery.realperson.css"> 
<script type="text/javascript" src="/js/jquery_real_person/jquery.plugin.js"></script> 
<script type="text/javascript" src="/js/jquery_real_person/jquery.realperson.js"></script>

<script>
            $(document).ready(function () {
                new nicEditor({buttonList: ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough', 'ol', 'ul']}).panelInstance('editor');
                // $('#defaultReal').realperson();


                $('.nicEdit-panel').parent().css('width', '420px');
                $('.nicEdit-main').parent().css('width', '420px');
                $('.nicEdit-main').css('width', '410px');
                $('#form').on('submit', function () {
                    var postData = $(this).serialize();
                    $('#error-input').css("color", 'green');
                    $('#error-input').html('Идет отправка...');
                    $.post('/addreview/add', postData, function (data) {
                        data = jQuery.parseJSON(data);
                        if (data.success == 'success') {
                            $('form').fadeOut();
                            $('#success').fadeIn();
                            $('#success .review_number').html(data.last_id);
                            $('#success .review_link').attr('href', '/reviews/'+data.last_id);
                            $('#error-input').html('');
                            $('#error-input').css({color: 'green'});
                            $('#error-input').append('Отзыв успешно добавлен!');
                            return;
                        }else if(data.success == 'send_email'){
                            $('form').fadeOut();
                            $('#success2').fadeIn();
                        }
                        else {
                            
                            $('#error-input').html('');
                            $('#error-input').css({color: 'red'});
                            $.each(data, function (key, value) {
                                $('#error-input').append(value + "<br/>");
                            });
                        }


                    });
                    return false;

                });


            });



</script>