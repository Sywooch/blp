/**
 * Модуль: consultationPages
 * стартовый загрузчик модулей на страницу консультаций
 */
modular.define('adminPage',
        [
            '/css/admin.css',
            '/tpl/adminTpls.tpl',
                    // 'http://js.nicedit.com/nicEdit-latest.js',
        ],
        function(tpl) {
            var editAnswerTpl = $(tpl).find('.edit-answer-form');
            var editExpertTpl = $(tpl).find('.edit-expert-table');
            /*~~~~~~~~~~~~~~~~~~~~~~~~INICIALIZATION~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
            if ($('#admin-side .consultation-index').length) {
                indexExpertFunctions();
            }

            if ($('#admin-side .consultation-edit-section').length) {
                sectionEditFunctions(editAnswerTpl);
            }

            if ($('#admin-side .experts-edit-section').length) {
                expertsFunctions(editExpertTpl);
            }

            if ($('#admin-side .consultation-edit-section').length) {
                editSectionFunctions();
            }
            /*~~~~~~~~~~~~~~~~~~~~~~~~~~ADMIN FUNCTIONS~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

            function indexExpertFunctions() {

                /*~~~~~~~~~~~~~show-hide ADD new section form~~~~~~~~~~~~~~~~~~~*/



                $('.add-section').on('click', function() {
                    $('table.add-section-table').fadeIn(1000);
                });
                $('table.add-section-table .add-section-cancel').on('click', function() {
                    $('table.add-section-table').fadeOut(1000);
                });
                /*~~~~~~~~~~~~~~~~~~~~~DELETE section~~~~~~~~~~~~~~~~~~~~~~~~~~*/
                $('#admin-side table.spikers').on('click', '.delete-section', function() {
                    var section = $(this).closest('tr').attr('section');
                    var rowToRemove = $(this).closest('tr');
                    var postData = 'section=' + section + '&_csrf=' + $('.toPost').val();
                    if (confirm('Удалить вместе со всеми ответами?')) {
                        $.post('/admin/removesection', postData, function(data) {
                            var answer = jQuery.parseJSON(data);
                            if (answer.success == 'success') {
                                $(rowToRemove).css('background-color', 'red').fadeOut(1000, function() {
                                    $(this).remove();
                                })
                            }
                            else {
                                alert('Произошла какая-то внутренняя ошибка, ну удалось удалить');
                            }
                        });
                    }
                });
                /*~~~~~~~~~~~~~~~~~~ADD new secton~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

                $('#add-section-form').on('submit', function() {
                    var postData = $(this).serialize();
                    $.post('/admin/addsection', postData, function(data) {
                        $('#add-section-form table').css('opacity', '0.5');
                        $('#add-section-form .add-section-button').attr('disabled', 'disabled')
                        var answer = jQuery.parseJSON(data);
                        if (answer.success == 'success') {
                            var section = answer.new_section.id;
                            var title = answer.new_section.title;
                            var expert = answer.new_section.expert;
                            var expertDescription = answer.new_section.expert_description;
                            var showSection = answer.new_section.show_section;
                            var insertRow = "<tr section = '" + section + "'>\n\
                        <td>" + title + "</td>\n\
                        <td>0</td>\n\
                        <td>\n\
                            " + expert + ",\n\
                            " + expertDescription + "\n\
                        </td>\n\
                        <td>" + showSection + "</td>\n\
                        <td>\n\
                            <span class ='arr-wrap'><span class ='arr arr-up'>&uArr;</span>Вверх</span><br/>\n\
                            <span class ='arr-wrap'><span class ='arr arr-down'>&dArr;</span>Вниз</span>\n\
                        </td>\n\
                        <td><a href ='/editexpertsection/" + section + "' class = 'edit-section'>Редактировать</a></td>\n\
                        <td><span class = 'delete-section'>Удалить</span></td>\n\
                    </tr>";
                            $('#admin-side table.spikers tbody').prepend(insertRow);
                            $('#add-section-form table').css('opacity', '1');
                            $('#add-section-form .add-section-button').removeAttr('disabled', 'disabled');
                            $('table.add-section-table').fadeOut(1000);
                            $('.error').html('');
                            $('#add-section-form input[type=text]').val('');
                            $('#add-section-form textarea').val('');
                            $('#add-section-form input[type=checkbox]').removeAttr('checked');


                        } else {
                            $('.error').html('');
                            $.each(answer, function(index, value) {
                                $('label.' + index).html(value);
                                $('label.' + index).show();
                            });
                            $('#add-section-form table').css('opacity', '1');
                            $('#add-section-form .add-section-button').removeAttr('disabled', 'disabled');
                        }
                    });
                    return false;
                    //$('table.add-section-table').fadeOut(1000);
                });
                /*~~~~~~move row up-down~~~~~~~~~~~~~~~~~~*/


                $('table.spikers').on('click', 'tr td .arr-up', function() {
                    /*----------клонируем нажатый TR----------------*/
                    var movedTr = $(this).closest('tr').clone();
                    var movedId = $(movedTr).attr('section');
                    $(movedTr).css('display', 'none');
                    /*-----------ссылка на удаляемый TR-------------*/
                    var deletedTr = $(this).closest('tr');

                    /*-----------ссылка на предыдущий TR-------------*/
                    var beforeTr = $(this).closest('tr').prev();
                    var beforeId = $(beforeTr).attr('section');
                    var toPost = $('#admin-side').find('.toPost').val();
                    var postData = 'id1=' + movedId + '&id2=' + beforeId + '&_csrf=' + toPost;
                    $.post('/admin/swapsection', postData, function(data) {
                        var answer = jQuery.parseJSON(data);
                        if (answer.success == 'success') {
                            $(beforeTr).css('display', 'none');
                            $(deletedTr).remove()
                            $(movedTr).insertBefore(beforeTr);
                            $(movedTr).fadeIn(3000);
                            $(beforeTr).fadeIn(1500);
                        }
                        else {
                            alert('Что-то пошло не так!');
                        }
                    })

                    return;
                });



                $('table.spikers').on('click', 'tr td .arr-down', function() {

                    /*----------клонируем нажатый TR----------------*/
                    var movedTr = $(this).closest('tr').clone();
                    var movedId = $(movedTr).attr('section');
                    $(movedTr).css('display', 'none');
                    /*-----------ссылка на удаляемый TR-------------*/
                    var deletedTr = $(this).closest('tr');
                    /*-----------ссылка на следующий TR-------------*/
                    var afterTr = $(this).closest('tr').next();
                    var afterId = $(afterTr).attr('section');



                    var toPost = $('#admin-side').find('.toPost').val();
                    var postData = 'id1=' + movedId + '&id2=' + afterId + '&_csrf=' + toPost;
                    $.post('/admin/swapsection', postData, function(data) {
                        var answer = jQuery.parseJSON(data);
                        if (answer.success == 'success') {
                            $(afterTr).css('display', 'none');
                            $(deletedTr).remove()
                            $(movedTr).insertAfter(afterTr);
                            $(movedTr).fadeIn(3000);
                            $(afterTr).fadeIn(1500);
                        }
                        else {
                            alert('Что-то пошло не так!');
                        }
                    })

                    return;
                });
            }


            function sectionEditFunctions(tpl) {
                ///slide-up, slide-down
               
                new nicEditor({buttonList:
                            ['bold',
                                'italic',
                                'underline',
                                'strikeThrough',
                                'ol',
                                'ul']}).panelInstance('ckdescription');
                //$('.consultation-edit-section .nicEdit-panelContain').css('width', '700px !important');

                $('.answers .slide-down').on('click', function() {
                    $(this).closest('tr').next().slideDown(800);
                    $(this).closest('tr').find('.read-more').fadeIn(800);
                    $(this).hide();
                });
                $('.answers .slide-up').on('click', function() {
                    $(this).closest('tr').slideUp(1000);
                    $(this).closest('tr').prev().find('.read-more').hide();
                    $(this).closest('tr').prev().find('.slide-down').fadeIn(800);
                });
                //show-hide edit form
                $('#admin-side table.answers .edit-link').on('click', function() {
                    
                    
                     var showButton = $('.add-section-cancel')
                            .closest('.edit-answer-form')
                            .closest('tr')
                            .prev()
                            .prev()
                            .find('.edit-link');
                    $('.add-section-cancel').closest('.edit-answer-form').fadeOut(1000, function() {
                        $(this).remove();
                        $(showButton).show();
                    });
                    
                    
                    
                    $(this).hide();
                    var inputTpl = $(tpl).clone();
                    var closestSection = $(this).closest('tr');

                    var userName = $(closestSection).find('input[name=user_name]').val();
                    var userEmail = $(closestSection).find('input[name=user_email]').val();
                    var userQuestion = $(closestSection).find('input[name=question]').val();
                    var userAnswer = $(closestSection).find('input[name=answer]').val();
                    var userExpertId = $(closestSection).find('input[name=expert_id]').val();
                    var expertName = $(closestSection).find('input[name=expert_name]').val();
                    var expertPosition = $(closestSection).find('input[name=expert_position]').val();




                    $(inputTpl).find('input[name=user_name]').val(userName);
                    $(inputTpl).find('input[name=user_email]').val(userEmail);
                    $(inputTpl).find('textarea[name=question]').val(userQuestion);
                    $(inputTpl).find('textarea[name=answer]').val(userAnswer);

                    $.post('/expert/expertlist', '_csrf=' + $('.toPost').val(), function(data) {
                        var answer = jQuery.parseJSON(data);
                        var droplist = '<option value ="' + userExpertId + '">' + expertName + ', ' + expertPosition + '</option>';
                        $.each(answer, function(index, value) {
                            droplist += '<option value ="' + index + '">' + value + '</option>';
                        });

                        $(inputTpl).find('select[name=expert_id]').prepend(droplist);

                    });
                    $(inputTpl).find('.section-wrap').html($('.consultation-edit-section .section_id').parent().html());


                    $(inputTpl).css('display', 'none');
                    $(this).closest('tr').next().next().find('td').prepend(inputTpl);

                    new nicEditor({buttonList:
                                ['bold',
                                    'italic',
                                    'underline',
                                    'strikeThrough',
                                    'ol',
                                    'ul']}).panelInstance('question');

                    new nicEditor({buttonList:
                                ['bold',
                                    'italic',
                                    'underline',
                                    'strikeThrough',
                                    'ol',
                                    'ul']}).panelInstance('answer');
                    $(inputTpl).fadeIn(1000);
                    return false;
                });

                $('#admin-side').on('click', '.edit-answer-form .add-section-cancel', function() {
                    var showButton = $(this)
                            .closest('.edit-answer-form')
                            .closest('tr')
                            .prev()
                            .prev()
                            .find('.edit-link');
                    $(this).closest('.edit-answer-form').fadeOut(1000, function() {
                        $(this).remove();
                        $(showButton).show();
                    });
                    return false;
                });


                $('#admin-side').on('click', '.remove-link', function() {
                    var objToRemove = $(this).closest('tr');
                    var objToRemoveNext = $(this).closest('tr').next();
                    var question = $(this).closest('tr').find('.question_id').val();
                    var toPost = $('.toPost').val();
                    var postData = 'question=' + question + '&_csrf=' + toPost;
                    $.post('/admin/deletequestion', postData, function(data) {
                        var answer = jQuery.parseJSON(data);
                        if (answer.success === 'success') {
                            alert('Вопрос успешно удален');

                            $(objToRemove).css('background', 'red').fadeOut(1000, function() {
                                $(this).remove();
                            });
                            $(objToRemoveNext).css('background', 'red').fadeOut(1000, function() {
                                $(this).remove();
                            });

                        }


                    });
                });

                $('#admin-side').on('click', '.edit-question-button', function() {
                    var toPost = $('.toPost').val();
                    var editForm = $(this).closest('.edit-answer-form');
                    var question_id = $(editForm).closest('tr').prev().prev().find('.question_id').val();
                    var question = $(editForm).find('textarea[name=question]').closest('td').find('.nicEdit-main').html();
                    var answerA = $(editForm).find('textarea[name=answer]').closest('td').find('.nicEdit-main').html();
                    var expert = $(editForm).find('.exp_id').val();
                    var section = $(editForm).find('.section_id').val();

console.log(question);
console.log(answerA);



                    var postData = 'question=' + question +
                            '&answer=' + answerA +
                            '&expert=' + expert +
                            '&question_id=' + question_id +
                            '&section_id=' + section +
                            '&_csrf=' + toPost;
                    $.post('/admin/editoneqa', postData, function(data) {
                        var answer = jQuery.parseJSON(data);

                        if (answer.success === 'success') {
                            alert('Вопрос успешно отредактирован');

                            var closestSection = $(editForm).closest('tr').prev().prev();

                            $(closestSection).find('input[name=question]').val(question);
                            $(closestSection).find('input[name=answer]').val(answerA);
                            $(closestSection).find('input[name=expert_id]').val(expert);

                            $(closestSection).find('.quest1').html(question.slice(0, 20));
                            $(closestSection).find('.quest2').html(question.slice(21, 1000));
                            $(editForm).closest('tr').prev().find('.answr').html(answerA);

                            var expertNamePosition = $(editForm).find('select option:selected').text().split(',');
                            console.log(expertNamePosition);
                            var expertName = expertNamePosition[0];
                            var expertPosition = expertNamePosition[1];
                            $(closestSection).find('input[name=expert_name]').val(expertName.trim());
                            $(closestSection).find('input[name=expert_position]').val(expertPosition.trim());
                            $(editForm).remove();
                            $(closestSection).find('.edit-link').show();
                        }
                        else {

                            $('.error').html('');
                            $.each(answer, function(index, value) {
                                $('label.' + index).html(value);
                                $('label.' + index).show();
                            });

                        }
                    });
                });
            }

            function expertsFunctions(tpl) {
                //показать форму добавление нового эксперта
                $('.experts-edit-section').on('click', '.add-expert', function() {
                    $('table.add-expert-table').fadeIn(1000);
                    $(this).hide();
                    $('.add-expert-cancel').show();
                });
                //спрятать форму добавления нового эксперта
                $('.experts-edit-section').on('click', '.add-expert-cancel', function() {
                    $('table.add-expert-table').fadeOut(1000);
                    $(this).hide();
                    $('.add-expert').show();
                });
                //добавление нового эксперта
                $('.experts-edit-section #add-expert-form').on('submit', function() {
                    $('.experts-edit-section #add-expert-form').css('opacity', '0.5');
                    $('.experts-edit-section #add-expert-form .add-section-button').attr('disabled', 'disabled');
                    var postData = $(this).serialize();
                    $.post('/expert/add', postData, function(data) {
                        var answer = jQuery.parseJSON(data);
                        if (answer.success == 'success') {
                            $('.error').html('').hide();
                            var newExpertId = answer.new_id;
                            var newEmail = $('#add-expert-form input[name=expert_email]').val();
                            var newFullName = $('#add-expert-form input[name=full_name]').val();
                            var newCompanyName = $('#add-expert-form input[name=company_name]').val();
                            var newCompanySite = $('#add-expert-form input[name=site_name]').val();
                            var newPosition = $('#add-expert-form textarea[name=position]').val();
                            var newReference = $('#add-expert-form textarea[name=reference]').val();
                            var newActiveExpert = answer.active_expert;
                            var showActiveExpert = newActiveExpert == 1 ? 'Да' : 'Нет';
                            var insertRows = "<tr class ='expert' expert = '" + newExpertId + "'\n\\n\
                                        email ='" + newEmail + "'\n\
                                        full_name ='" + newFullName + "'\n\
                                        company_name ='" + newCompanyName + "'\n\
                                        site_name ='" + newCompanySite + "'\n\
                                        position ='" + newPosition + "'\n\
                                        reference ='" + newReference + "'\n\
                                        active_expert ='" + newActiveExpert + "'\n\
                        >\n\
                        <td>" + newFullName + "</td>\n\
                        <td>" + newCompanyName + "</td>\n\
                        <td>\n\
                            " + newPosition + "\n\
                        </td>\n\
                        <td>" + showActiveExpert + "</td>\n\
                        <td><a href ='#' class ='edit-link'>Редактировать</a>\n\
                        <a class='hide-link' href='#'>Свернуть</a>\n\
                        </td>\n\
                        <td>\n\
                        <a class='delete-link' href='#'>Удалить</a>\n\
                        </td>\n\
                    </tr>\n\
                        <tr class ='expert-edit-cell'>\n\
                        <td colspan = '6' class ='edit-answer-cell'></td>\n\
                    </tr>";
                            $(insertRows).css('display', 'none');
                            $('#admin-side .experts tbody').prepend(insertRows);
                            $(insertRows).fadeIn(3000);
                            $('.experts-edit-section #add-expert-form').css('opacity', '1');
                            $('.experts-edit-section #add-expert-form .add-section-button').removeAttr('disabled', 'disabled');
                            $('table.add-expert-table').fadeOut(1000);
                            $('table.add-expert-table input[type=text]').val('');
                            $('table.add-expert-table textarea').val('');
                            $('.add-expert-cancel').hide();
                            $('.add-expert').show();
                        }
                        else {
                            $('.error').html('');
                            $.each(answer, function(index, value) {
                                $('label.' + index).html(value);
                                $('label.' + index).show();
                            });
                            $('.experts-edit-section #add-expert-form').css('opacity', '1');
                            $('.experts-edit-section #add-expert-form .add-section-button').removeAttr('disabled', 'disabled');
                        }

                    });
                    return false;
                });

                //редактировать фото эксперта

                $('#admin-side table.experts').on('click', '.load-avatar', function() {
                    $('.imgfile').click();

                });

                $('#admin-side table.experts').on('click', '.delete-avatar', function() {
                    var avatar = $(this).closest('.expert-edit-cell').prev().attr('expert');
                    var toPost = $('.toPost').val();
                    var postData = 'avatar=' + avatar + '&_csrf=' + toPost;
                    $.post('expert/deletephoto', postData, function(data) {
                        var answer = jQuery.parseJSON(data);
                        if (answer.success == 'success') {
                            $('.avatar').attr('src', '/images/default_profile_image.png');
                        }
                    });

                });


                $('#admin-side table.experts').on('mouseover', '.avatar', function() {
                    $('.load-avatar').fadeIn(300);

                });

                $('#admin-side table.experts').on('mouseout', '.load-avatar', function() {
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






                //редактировать эксперта
                $('#admin-side table.experts ').on('click', '.edit-link', function() {

                    $('.edit-expert-table').remove();
                    var inputTpl = $(tpl).clone();
                    $(inputTpl).css('display', 'none');
                    $(this).closest('tr').next().find('td').prepend(inputTpl);
                    var expert = $(this).closest('tr').attr('expert');
                    var photo = $(this).closest('tr').attr('photo');
                    var email = $(this).closest('tr').attr('email');
                    var expertName = $(this).closest('tr').attr('full_name');
                    var companyName = $(this).closest('tr').attr('company_name');
                    var companySite = $(this).closest('tr').attr('site_name');
                    var position = $(this).closest('tr').attr('position');
                    var reference = $(this).closest('tr').attr('reference');
                    var activeExpert = $(this).closest('tr').attr('active_expert');

                    $('#send-image .expert').val(expert);
                    $(inputTpl).find('input[name=expert]').val(expert);
                    $(inputTpl).find('.avatar').attr('src', photo);

                    $(inputTpl).find('input[name=email]').val(email);
                    $(inputTpl).find('input[name=full_name]').val(expertName);
                    $(inputTpl).find('input[name=company_name]').val(companyName);
                    $(inputTpl).find('input[name=site_name]').val(companySite);
                    $(inputTpl).find('textarea[name=position]').val(position);
                    $(inputTpl).find('textarea[name=reference]').val(reference);
                    var number = activeExpert == '1' ? '1' : '2';
                    $(inputTpl).find('.radio' + number).prop('checked', true);
                    $(inputTpl).fadeIn(1000);
                    $(this).parent().find('.hide-link').show();
                    $(this).hide();
                });
                //свернуть форму редактирования
                $('#admin-side').on('click', 'table.experts .hide-link', function() {
                    $(this).parent().find('.edit-link').show();
                    $(this).hide();
                    $(this).closest('tr').next().find('.edit-expert-table').fadeOut(1000, function() {
                        $(this).remove();
                    })


                });



                $('#admin-side').on('click', '.edit-expert-table .edit-expert-pass', function() {
                    var button = $(this);
                    $(button).css('disabled', 'disabled');
                    var sendEditData = $(this).closest('.edit-expert-table');
                    $(button).css('opacity', '0.5');
                    var pass = $(sendEditData).find('input[name=password]').val();
                    var expert = $(sendEditData).find('input[name=expert]').val();
                    var toPost = $('#admin-side').find('.toPost').val();


                    $.ajax({
                        method: "POST",
                        url: "/admin/changeexpertpass",
                        data:
                                {
                                    pass: pass,
                                    _csrf: toPost,
                                    expert: expert
                                }
                    })
                            .done(function(msg) {
                                var answer = jQuery.parseJSON(msg);
                                if (answer.success == 'success') {
                                    alert('Пароль успешно сменен');
                                    $(button).removeAttr('disabled', 'disabled');
                                    $(button).css('opacity', '1');

                                }
                                else {
                                    var error = '';
                                    $.each(answer, function(index, value) {
                                        error = error + value;

                                    });
                                    alert(error);
                                    $(button).removeAttr('disabled', 'disabled');
                                    $(button).css('opacity', '1');
                                }

                            });




                });


                //закрыть форму редактирования эксперта
                $('#admin-side').on('click', '.edit-expert-table .edit-expert-button', function() {

                    //$(this).closest('tr.expert-edit-cell').prev().find('.edit-link').show();
                    var button = $(this);
                    var sendEditData = $(this).closest('.edit-expert-table');
                    $(button).css('disabled', 'disabled');
                    $(sendEditData).css('opacity', '0.5');
                    var expert = $(sendEditData).find('input[name=expert]').val();
                    var email = $(sendEditData).find('input[name=email]').val();
                    var expertName = $(sendEditData).find('input[name=full_name]').val();
                    var companyName = $(sendEditData).find('input[name=company_name]').val();
                    var companySite = $(sendEditData).find('input[name=site_name]').val();
                    var companyPosition = $(sendEditData).find('textarea[name=position]').val();
                    var reference = $(sendEditData).find('textarea[name=reference]').val();
                    var activeExpert = $(sendEditData).find('.radio1').prop('checked') === true ? 1 : 0;
                    var toPost = $('#admin-side').find('.toPost').val();




                    $.ajax({
                        method: "POST",
                        url: "/expert/edit",
                        data:
                                {
                                    expert: expert,
                                    email: email,
                                    full_name: expertName,
                                    company_name: companyName,
                                    site_name: companySite,
                                    position: companyPosition,
                                    reference: reference,
                                    active_expert: activeExpert,
                                    _csrf: toPost,
                                }
                    })
                            .done(function(msg) {
                                var answer = jQuery.parseJSON(msg);
                                if (answer.success == 'success') {
                                    var refreshAttr = $(sendEditData).closest('tr').prev();
                                    $(refreshAttr).find('.edit-link').show();
                                    $(refreshAttr).find('.hide-link').hide();
                                    $(sendEditData).find('.error').html('').hide();
                                    $(refreshAttr).attr('email', email);
                                    $(refreshAttr).attr('full_name', expertName);
                                    $(refreshAttr).attr('company_name', companyName);
                                    $(refreshAttr).attr('position', companyPosition);
                                    $(refreshAttr).attr('reference', reference);
                                    $(refreshAttr).attr('active_expert', activeExpert);
                                    $(refreshAttr).attr('email', email);
                                    $(refreshAttr).find('td:nth-of-type(1)').html(expertName);
                                    $(refreshAttr).find('td:nth-of-type(2)').html(companyName);
                                    $(refreshAttr).find('td:nth-of-type(3)').html(companyPosition);
                                    var refreshActive = activeExpert == '1' ? 'Да' : 'Нет';
                                    $(refreshAttr).find('td:nth-of-type(4)').html(refreshActive);
                                    $(button).removeAttr('disabled', 'disabled');
                                    $(sendEditData).css('opacity', '1');
                                    $(sendEditData).fadeOut(1000, function() {
                                        $(this).remove();
                                    });
                                }
                                else {
                                    $(sendEditData).find('.error').html('');
                                    $.each(answer, function(index, value) {
                                        $(sendEditData).find('label.' + index).html(value);
                                        $(sendEditData).find('label.' + index).show();
                                    });
                                    $(button).removeAttr('disabled', 'disabled');
                                    $(sendEditData).css('opacity', '1');
                                }

                            });
                    //$(this).remove();
                });
                // return false;


                //удалить эксперта
                $('#admin-side table.experts ').on('click', '.delete-link', function() {
                    if (confirm('Удалить эксперта полностью?')) {
                        var elemToRemove1 = $(this).closest('tr');
                        var elemToRemove2 = $(this).closest('tr').next();
                        var expert = $(this).closest('tr').attr('expert');
                        var postData = 'expert=' + expert + '&_csrf=' + $('.toPost').val();
                        $.post('/expert/delexpert', postData, function(data) {
                            var answer = jQuery.parseJSON(data);
                            if (answer.success == 'success')
                            {
                                $(elemToRemove1).remove();
                                $(elemToRemove2).remove();
                            }
                            else {
                                alert(answer.error);
                            }
                        });
                    }
                });
            }

            function editSectionFunctions() {
                $('#edit-one-section').on('click', '.add-section-button', function() {
                    var textareaValue = $('#edit-one-section .edit-section-table').find('.nicEdit-main').html();
                    if (textareaValue == '<br>') {
                        $('#edit-one-section #ckdescription').val('');
                    }
                    else {
                        $('#edit-one-section #ckdescription').val(textareaValue);
                    }
                    console.log($('#edit-one-section #ckdescription').val());
                    // return;
                    var postData = $(this).closest('#edit-one-section').serialize();

                    $.post('/admin/editonesection', postData, function(data) {

                        if (data.length === 0) {
                            alert('Ничего не было отредактировано!');
                            $('#edit-one-section table').css('opacity', '1');
                            $('#edit-one-section table .add-section-button').removeAttr('disabled', 'disabled');
                            return false;
                        }
                        $('#edit-one-section table').css('opacity', '0.5');
                        $('#edit-one-section .add-section-button').attr('disabled', 'disabled')
                        var answer = jQuery.parseJSON(data);
                        if (answer.success == 'success') {
                            $('.error').html('');
                            alert('Запись успешно отредактирована');
                            $('#edit-one-section table').css('opacity', '1');
                            $('#edit-one-section table .add-section-button').removeAttr('disabled', 'disabled');
                        } else {
                            $('.error').html('');
                            $.each(answer, function(index, value) {
                                $('label.' + index).html(value);
                                $('label.' + index).show();
                            });
                            $('#edit-one-section table').css('opacity', '1');
                            $('#edit-one-section table .add-section-button').removeAttr('disabled', 'disabled');
                        }
                    });
                    return false;
                });
            }

        }




);




