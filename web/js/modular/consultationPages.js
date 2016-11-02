/**
 * Модуль: consultationPages
 * стартовый загрузчик модулей на страницу консультаций
 */
modular.define('consultationPages',
        [
            '/css/consultation.css',
            '/tpl/sendQuestion.tpl',
            'http://js.nicedit.com/nicEdit-latest.js'
        ],
        function(tpl) {

            var sendQuestionTpl = $(tpl).find('.sendQuestionPopup');
            if ($('#consultation-wrap').length) {
                sendQuestion(sendQuestionTpl);

            }

            if ($('#cabinet-expert').length) {
                cabinetExpertInit();
            }




            /*~~~~~~~~~~~~~~~~~~~~~~~~~~Отправка нового вопроса со страницы Консультация~~~~~~~~~~~~~~*/
            function sendQuestion(Tpl) {
                //получаем список видов страхования по ид секции
                function getInsuranceList(section_id) {
                    var postData = 'section=' + section_id + '&_csrf=' + $('.toPost').val();
                    var radio;


                    return radio;
                }

                $('#consultation-wrap').on('click', '#login_form_show', function() {
                    $('.sendQuestionPopup').remove();
                    $('body #bg_layer').fadeOut(3000, function() {
                        $(this).remove();
                    });
                    $('#login_btn').click();
                });

                $('#consultation-wrap').on('click', '.send-button', function() {
                    var askPopup = $(Tpl).clone();
                    var userType = $('.user_type').val();
                    if (userType == '1') {
                        var unloginedHTML = '<div id="" style="border: 1px solid #cccccc;\n\
                    border-left-width: 4px;\n\
                    padding: 15px 15px 15px 35px;\n\
                    font-size: 1.1em;\n\
                    margin-bottom: 20px;\n\
                    \n\
                    ">\n\
                    <b>Желаете задать вопрос?</b><br>\n\
                    Если вы зарегистрированный пользователь <a id="login_form_show" href="#login_form">авторизуйтесь</a>,<br>\n\
                    если незарегистрированный <a href="/register">зарегистрируйтесь.</a>\n\
                </div>';
                        $(askPopup).find('tr:not(:nth-of-type(1))').remove();
                        $(askPopup).find('.replace').html(unloginedHTML);
                        $('body').prepend('<div id ="bg_layer"></div>');

                        $('#consultation-wrap').prepend(askPopup);
                        return;
                    }


                    $(askPopup).find('input[name=name]').val($('.q_name').val());
                    $(askPopup).find('input[name=email]').val($('.q_email').val());
                    $(askPopup).find('input[name=expert_id]').val($('.q_expert_id').val());
                    var expert = $(this).closest('.right-body').find('input[name=expert]').attr('value');
                    $(askPopup).find('input[name=expert_id]').val(expert);
                    var section = $(this).closest('.right-body').find('input[name=section]').attr('value');

                    var postData = 'section=' + section + '&_csrf=' + $('.toPost').val();
                    $.post('/consultation/getinsuranselist', postData, function(data) {
                        var answer = jQuery.parseJSON(data);
                        var radio = '';
                        $.each(answer, function(index, value) {
                            radio += "<input type = 'radio' name ='insurance_type' value = '" + index + "' />" + value;
                        });

                        $(askPopup).find('.insurance_type2').prepend(radio);

                    });
                    $(askPopup).find('input[name=section]').attr('value', section);

                    $('body').prepend('<div id ="bg_layer"></div>');


                    $('#consultation-wrap').prepend(askPopup);
                       new nicEditor({buttonList:
                     ['bold',
                     'italic',
                     'underline',
                     'strikeThrough',
                     'ol',
                     'ul']}).panelInstance('sendQuestionTextarea'); 
                    $('.nicEdit-panelContain').css('width', '400px !important');
                    
                    
                    $(askPopup).on('click', '.send-question-button', function() {
                        
                        var textareaValue = $(askPopup).find('.nicEdit-main').html();
                        if (textareaValue == '<br>') {
                            $(askPopup).find('#sendQuestionTextarea').val('');
                        }
                        else {
                            $(askPopup).find('#sendQuestionTextarea').val(textareaValue);
                        }


                        var postData = $(this).closest('#send-question-form').serialize();
                        $('.error').html('');
                        $(askPopup).find('.send-question-button').attr('disabled', 'disabled');
                        $(askPopup).find('.sending').css('color', 'green').html('Идет отправка...');

                        //var full_name = $('.expert span').html();
                        //var position = $('.expert-description').html();

                        $.post('/consultation/addquestion', postData + '&_csrf=' + $('.toPost').val(), function(data) {

                            var answer = jQuery.parseJSON(data);
                            switch (answer.success) {
                                case 'success':
                                    $(askPopup).html('<h1>Вы успешно добавили вопрос!</h1>');

                                    $(askPopup).fadeOut(3000, function() {
                                        $(this).remove();


                                        var question = answer.question;
                                        var insurance_type_name = answer.insurance_type_name;
                                        var question_date = answer.question_date;


                                        if ($('.your-questions').length) {
                                            var questionHTML =
                                                    "<div class ='one-question'> \n\
                                                      <div class ='insurance-body'>\n\
                                                        <div class ='left-body'>\n\
                                                            Вопрос:\n\
                                                        </div>\n\
                                                        <div class ='right-body'>\n\
                                                            <div class ='big-text'>\n\
                                                                " + question + "\n\
                                                            </div>\n\
                                                        <div class ='insurance-type'>\n\
                                                             " + insurance_type_name + "\n\
                                                        </div>\n\
                                                        <div class ='answer-date'>\n\
                                                            Добавлен" + question_date + "\n\
                                                        </div>\n\
                                                         </div>\n\
                                                        </div>\n\
                                        <div class ='insurance-body'>\n\
                                                    <div class ='left-body'>\n\
                                                </div>\n\
                                                    <div class ='right-body'>\n\
                                                </div>\n\
                                                        </div>\n\
                                                    </div>";


                                            var questionHTML = "<div class ='one-question'>\n\
                                                                <div class ='insurance-body'>\n\
                                                                    <div class ='question-title'>\n\
                                                                        Вопрос:\n\
                            <!---<a href ='/consultations//' > \n\
                                &#10042;\n\
                            </a>-->\n\
                        </div>\n\
                        <div class ='question-body'>\n\
                            <div class ='big-text'>\n\
                                 " + question + "\n\
                            </div>\n\
                            <span class ='insurance-type'>\n\
                                " + insurance_type_name + "\n\
                            </span>\n\
                            <span class ='answer-date'>\n\
                                 Добавлен" + question_date + "\n\
                            </span>\n\
                            <div class ='clr'></div>\n\
                        </div>\n\
                        </div>\n\
                            </div>";
                                            console.log(questionHTML);

                                            $(questionHTML).css('display', 'none');
                                            $('.questions-list').prepend(questionHTML);
                                            $(questionHTML).fadeIn(2000);



                                        }

                                    });

                                    $('body #bg_layer').fadeOut(3000, function() {
                                        $(this).remove();
                                    });

                                    break;
                                default:
                                    $('.error').html('');
                                    $.each(answer, function(index, value) {
                                        $('label.' + index).html(value);
                                        $('label.' + index).show();
                                    });
                                    $(askPopup).find('.send-question-button').removeAttr('disabled');
                                    $(askPopup).find('.sending').html('');
                                    break;
                            }
                        });
                        return false;
                    });

                });

                $('#consultation-wrap ').on('click', '.sendQuestionPopup .close', function() {
                    $('#bg_layer').remove();
                    $('#consultation-wrap .sendQuestionPopup').remove();

                });


                /*####свернуть-резвернуть карточку спикера############*/
                $('.expert-link').on('click', '.know-more', function() {
                    $(this).hide();
                    $(this).next().show();
                    $(this).closest('.right-body').find('.company-name').fadeIn();
                    $(this).closest('.right-body').find('.expert-site').fadeIn();
                    $(this).closest('.right-body').find('.reference').fadeIn();
                });

                $('.expert-link').on('click', '.know-less', function() {
                    $(this).hide();
                    $(this).prev().show();
                    $(this).closest('.right-body').find('.company-name').fadeOut();
                    $(this).closest('.right-body').find('.expert-site').fadeOut();
                    $(this).closest('.right-body').find('.reference').fadeOut();
                });



            }
            function cabinetExpertInit() {

                /*~~~~~~~~~~~~~~~~~~~~edit photo ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
                function initEditors() {

                    var answers = $('.one-question');
                    $.each(answers, function(index, value) {
                        // console.log( $(value).attr('question'));
                        new nicEditor({buttonList:
                                    ['bold',
                                        'italic',
                                        //'underline',
                                        'ol',
                                        'ul']}).panelInstance('replace-me' + $(value).attr('question'));


                    });
                    $('#cabinet-expert .one-question .answered')
                            .closest('.one-question')
                            .find('.nicEdit-panelContain')
                            .parent()
                            .css('display', 'none');
                    $('#cabinet-expert .one-question .answered')
                            .closest('.one-question')
                            .find('.nicEdit-main')
                            .parent()
                            .css('display', 'none');


                }
                initEditors();
                $('#cabinet-expert').on('click', '.load-avatar', function() {
                    $('.imgfile').click();

                });

                $('#cabinet-expert').on('click', '.delete-avatar', function() {
                    var avatar = $(this).attr('avatar');
                    var toPost = $('.toPost').val();
                    var postData = 'avatar=' + avatar + '&_csrf=' + toPost;
                    $.post('expert/deletephoto', postData, function(data) {
                        var answer = jQuery.parseJSON(data);
                        if (answer.success == 'success') {
                            $('.avatar').attr('src', '/images/default_profile_image.png');
                        }
                    });

                });


                $('#cabinet-expert').on('mouseover', '.avatar', function() {
                    $('.load-avatar').fadeIn(300);

                });

                $('#cabinet-expert').on('mouseout', '.load-avatar', function() {
                    $('.load-avatar').fadeOut(300);

                });

                $('.imgfile').on('change', function() {
                    $('#send-image').submit();
                });

                $('#img-path').on('load', function() {
                    var img = jQuery.parseJSON($('#img-path').contents().find("body").html());
                    var imgPath = img.path;
                    $('.avatar').attr('src', imgPath);
                });

                /*~~~~~~~~~~tabs switch~~~~~~~~~~*/
                $('#cabinet-expert').on('click', '.panel', function() {
                    var panel = $(this).attr('panel');
                    $('#cabinet-expert .text-pannel').fadeOut(500);
                    $('#' + panel).fadeIn(500);
                });
                /*~~~~~~~~~~~~~~~~~~~~~show edit fields~~*/
                $('#cabinet-expert').on('click', '.start-edit', function() {
                    $('#cabinet-expert table tr td:nth-of-type(2) div').fadeOut(100);
                    $('#cabinet-expert table tr td .edit-fields, .start-edit').fadeOut(10);
                    $('#cabinet-expert table tr td .edit-fields, .end-edit').fadeIn(500);

                });
                /*~~~~~~~~do edit~~~~~~~~~~~~~~~~~~~~~~~~~~*/
                $('#edit-expert-form').on('submit', function() {

                    $('#cabinet-expert .edit-info').css('opacity', '0.5');
                    $('#cabinet-expert .end-edit').attr('disabled', 'disabled');
                    var postData = $(this).serialize();

                    $.post('/expert/edit', postData, function(data) {
                        var answer = jQuery.parseJSON(data);
                        if (answer.success == 'success') {
                            $('.error').html('').hide();
                            var newFull_name = $('#edit-expert-form input[name=full_name]').val();
                            var newCompany_name = $('#edit-expert-form input[name=company_name]').val();
                            var newSite_name = $('#edit-expert-form input[name=site_name]').val();
                            var newPosition = $('#edit-expert-form textarea[name=position]').val();
                            var newReference = $('#edit-expert-form textarea[name=reference]').val();
                            var newEmail = $('#edit-expert-form input[name=email]').val();

                            $('div.full_name').html(newFull_name);
                            $('div.company_name').html(newCompany_name);
                            $('div.site_name').html(newSite_name);
                            $('div.position').html(newPosition);
                            $('div.reference').html(newReference);
                            $('div.email').html(newEmail);



                            $('#cabinet-expert table tr td .success').fadeIn(300).delay(3000).fadeOut(300);
                            $('#cabinet-expert table tr td:nth-of-type(2) div').fadeIn(500);
                            $('#cabinet-expert table tr td .edit-fields, .start-edit').fadeIn(500);
                            $('#cabinet-expert table tr td .edit-fields, .end-edit').fadeOut(100);
                            $('#cabinet-expert .edit-info').css('opacity', '1').removeAttr('disabled');
                            $('#cabinet-expert .end-edit').removeAttr('disabled', 'disabled');
                        }
                        else {
                            $('.error').html('');
                            $.each(answer, function(index, value) {
                                $('label.' + index).html(value);
                                $('label.' + index).show();
                            });
                            $('#cabinet-expert .edit-info').css('opacity', '1');
                            $('#cabinet-expert .end-edit').removeAttr('disabled', 'disabled');
                        }


                    });

                    return false;
                });
                /*~~~~~~~~~~~~~~read more~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
                $('#cabinet-expert').on('click', ' .one-question .read-more-link, .do-answer', function() {
                    var thisQuestion = $(this).closest('.one-question');
                    $(thisQuestion).find('.read-more').slideDown(1000, function() {
                        $(this).css('display', 'inline');
                    })
                    $(thisQuestion).find('.read-more-link, .do-answer').hide();
                    $(this).fadeOut(1000);
                    $(thisQuestion).find('.do-slide-up').show();
                });

                $('#cabinet-expert').on('click', '.answer-button', function() {
                    // var button = $(this);
                    //      $(button).css('disabled', 'disabled');

                    var questionBlock = $(this).closest('.one-question');
                    var question = $(this).closest('.one-question').attr('question');
                    var answerText = $(this).closest('.big-text').find('.nicEdit-main').html();
                    
                    if (answerText=='<br>') {
                        answerText = '';
                    }
                    var crsf = $('#cabinet-expert').find('input[name=_csrf]').val();
                    var postData = 'question=' + question + '&text=' + answerText + '&_csrf=' + crsf;

                    $.post('/expert/addanswer', postData, function(data) {
                        var answer = jQuery.parseJSON(data);
                        if (answer.success == 'success') {
                            $(questionBlock).find('.error').remove();
                            var clone = $(questionBlock).clone();
                            $(clone).find('.new').remove();
                            $(clone).find('.do-answer').html('Читать / редактировать');
                            $(clone).find('.do-slide-up').html('Свернуть');
                            $(clone).find('.top-body:nth-of-type(2)')
                                    .prepend("<span class ='answered'>Вы ответили на вопрос</span>");

                            $(clone).find('.insurance-body.read-more')
                                    .html("<div class ='left-body'>\n\
                                            Ответ:\n\
                                        </div>\n\
                                        <div class ='right-body'>\n\
                                            <div class ='big-text'>\n\
                                                <p>" + answerText + "</p>\n\
                                        <textarea style ='width: 410px; height: 150px' class ='edit-answer' id = 'replace-me"+question+"'>" + answerText + "</textarea>\n\
                                            <button class = 'send-edit-answer'>Отправить</button>\n\
                                                <button class ='cancel-edit-answer'>Отмена</button>\n\
                                            </div>\n\
                                            </div>\n\
                                        <div class ='bottom-body'>\n\
                                            <span class ='do-edit'>Редактировать ответ</span>\n\
                                            <span class='do-slide-up'>Свернуть</span>\n\
                                        </div>");
                            $(clone).removeAttr('new');
                            $(clone).attr('old', '');
                            
                            $(questionBlock).remove();
                            /*   new nicEditor({buttonList:
                             ['bold',
                             'italic',
                             'underline',
                             'strikeThrough',
                             'ol',
                             'ul']}).panelInstance('random' + randomInt); */
                            //$('#panel1').prepend(clone);
                            
                            if ($('#cabinet-expert div').is('.one-question[new]')) {
                                console.log('Условие выполняется');
                                $('#cabinet-expert').find('.one-question[new]:last').after(clone);
                            } else if ($('#cabinet-expert div').is('.one-question[old]')) {
                                console.log('Условие выполняется');
                                $('#cabinet-expert').find('.one-question[old]:first').before(clone);
                            }  else  if (!$('#cabinet-expert').find('.one-question[old]').length &&
                                    !$('#cabinet-expert').find('.one-question[new]').length) {
                                $('#panel1').prepend(clone);
                            } 
                            //      $(button).removeAttr('disabled', 'disabled');
                            
                            new nicEditor({buttonList:
                                    ['bold',
                                        'italic',
                                        'ol',
                                        'ul']}).panelInstance('replace-me' + question);
                            $(clone).find('.nicEdit-panelContain').parent().css('display', 'none');
                            $(clone).find('.nicEdit-main').parent().css('display', 'none');
                            
                            
                        }
                        else if (answer.error != undefined) {
                            $(questionBlock).find('.error').remove();
                            $(questionBlock)
                                    .find('.answer-text')
                                    .after("<div class ='error' style = 'color: red'>" + answer.error + "</div>");
                        } else {
                            $(questionBlock).find('.error').remove();
                            $.each(answer, function(index, value) {
                                $(questionBlock)
                                        .find('.answer-text')
                                        .after("<div class ='error' style = 'color: red'>" + value + "</div>");
                            });
                            //    $(button).removeAttr('disabled', 'disabled');
                        }

                    });
                });

                $('#cabinet-expert').on('click', '.do-edit', function() {
                    $(this).hide();
                    var questionBlock = $(this).closest('.one-question');
                    $(questionBlock).find('.big-text p:nth-of-type(1)').fadeOut();
                    $(questionBlock).find('.send-edit-answer,.cancel-edit-answer').fadeIn();
                    $(questionBlock).find('.nicEdit-panelContain').parent().fadeIn();
                    $(questionBlock).find('.nicEdit-main').parent().fadeIn();
                    //startEditValue = $(questionBlock).find('.edit-answer').val();
                    startEditValue = $(questionBlock).find('.nicEdit-main').html();
                });
                startEditValue = '';
                $('#cabinet-expert').on('click', '.cancel-edit-answer', function() {
                    var questionBlock = $(this).closest('.one-question');
                    
                    
                    $(questionBlock).find('.nicEdit-main').html(startEditValue);
                    $(questionBlock).find('.error').remove();
                    $(questionBlock).find('.do-edit').show();
                    
                    $(questionBlock).find('.big-text p:nth-of-type(1)').fadeIn();
                    $(questionBlock).find('.send-edit-answer,.cancel-edit-answer').fadeOut();
                    $(questionBlock).find('.nicEdit-panelContain').parent().fadeOut();
                    $(questionBlock).find('.nicEdit-main').parent().fadeOut();
                            

                });


                $('#cabinet-expert').on('click', '.send-edit-answer', function() {
                    var questionBlock = $(this).closest('.one-question');
                    var editText = $(questionBlock).find('.nicEdit-main').html();
                    
                    if (editText=='<br>') {
                        editText = '';
                    }
                    
                    //$(questionBlock).find('.edit-answer').val();
                    var question = $(this).closest('.one-question').attr('question');
                    var crsf = $('#cabinet-expert').find('input[name=_csrf]').val();
                    var postData = 'question=' + question + '&text=' + editText + '&_csrf=' + crsf;

                    $.post('/expert/addanswer', postData, function(data) {
                        var answer = jQuery.parseJSON(data);
                        if (answer.success == 'success') {
                            $(questionBlock).find('.error').remove();
                            $(questionBlock).find('.big-text p:nth-of-type(1)').html(editText);
                            $(questionBlock).find('.big-text p:nth-of-type(1)').fadeIn();
                            $(questionBlock).find('.send-edit-answer,.cancel-edit-answer').fadeOut();
                            $(questionBlock).find('.nicEdit-panelContain').parent().fadeOut();
                            $(questionBlock).find('.nicEdit-main').parent().fadeOut();
                            $(questionBlock).find('.do-edit').show();


                        }
                        else if (answer.error != undefined) {
                            $(questionBlock).find('.error').remove();
                            $(questionBlock)
                                    .find('.edit-answer')
                                    .after("<div class ='error' style = 'color: red'>" + answer.error + "</div>");
                        } else {
                            $(questionBlock).find('.error').remove();
                            $.each(answer, function(index, value) {
                                $(questionBlock)
                                        .find('.edit-answer')
                                        .after("<div class ='error' style = 'color: red'>" + value + "</div>");
                            });
                        }

                    });



                });
            }



            /*~~~~~~~~~~~~~~~~~slide up~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
            $('#cabinet-expert').on('click', ' .one-question .do-slide-up', function() {
                var thisQuestion = $(this).closest('.one-question');
                $(thisQuestion).find('.read-more').slideUp(1000);
                $(thisQuestion).closest('.one-question').find('.read-more-link').fadeIn(1000);
                $(thisQuestion).find('.do-slide-up').hide();
                $(thisQuestion).find('.read-more-link, .do-answer').show();
                $(thisQuestion).find('.do-edit').show();
            });

        }




);


