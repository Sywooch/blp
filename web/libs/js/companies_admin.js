$(document).ready(function() {
    var company_id = $('#company-id').val();
    $('.edit_rules_btn_block').on('click', '.edit_rules_btn', function() {
        $('.show_rules_block').hide();
        $('.edit_rules_btn').text('Сохранить')
                .removeClass('edit_rules_btn')
                .addClass('save_rules_btn');
        CKEDITOR.replace('edit_rules_textarea');
        $('.edit_rules_block').show();
    });
    $('.edit_rules_btn_block').on('click', '.save_rules_btn', function() {
        var editor = CKEDITOR.instances['edit_rules_textarea'];
        var new_rules = editor.getData();
        $.ajax({
            url: '/companies/updatehtmlrules',
            type: 'post',
            data: {
                id: company_id,
                html_rules: new_rules,
                //_csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
            }
        }).done(function(data) {
            if (data != 'success')
            {
                alert('Ошибка при обновлении правил');
                return;
            }
            $('.show_rules_block').html(new_rules).show();
            CKEDITOR.instances['edit_rules_textarea'].destroy();
            $('.save_rules_btn').text('Редактировать')
                    .removeClass('save_rules_btn')
                    .addClass('edit_rules_btn');
            $('.edit_rules_block').hide();
        });
    });
    $(".del_img_btn").on('click', function() {
        var $this = $(this);
        var id = $this.data('id');
        $.ajax({
            url: '/companies/deleteimage',
            type: 'post',
            data: {
                id: id,
                // _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
            }
        }).done(function(data) {
            if (data != 'success')
            {
                alert('Ошибка при удалении изображения');
                return;
            }
            else
            {
                console.log($this.hide());
                $parent = $this.parent();
                $parent.children('div').hide();
                $parent.children('img').prop('src', '/images/new_design/image-deleted.png');
            }
        });
    });
    $('.carousel_checkbox').on('change', function() {
        var $this = $(this);
        var id = $this.data('id');
        $.ajax({
            url: '/companies/changecarouselonimage',
            type: 'post',
            data: {
                id: id,
                carousel: $this.prop('checked'),
                //   _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
            }
        }).done(function(data) {
            if (data != 'success')
                alert('Ошибка при изменении признака');
        });
    });
    $("#image_upload_btn").on('click', function() {
        $("#image_upload_btn_hidden").click();
    });
    $("#image_upload_btn_hidden").on('change', function() {
        var value = $(this).val();
        if (value != '')
            if (value.slice(-4) == '.png' || value.slice(-4) == '.jpg' || value.slice(-4) == '.gif' || value.slice(-5) == '.jpeg')
                $(this).parent().submit();
            else
                alert('Неправильный формат файла');
        else
            alert('Файл не выбран');
    });
    $(".gallery-item").on('click', '.edit_img_btn', function() {
        $this = $(this);
        $this.parent().children('.name-text').hide();
        $this.parent().children('.name-edit').show();
        $this.text('Сохранить').addClass('save_img_btn').removeClass('edit_img_btn');
    });
    $(".gallery-item").on('click', '.save_img_btn', function() {
        var $this = $(this);
        var id = $this.data('id');
        var name = $this.parent().children('.name-edit').val();
        $.ajax({
            url: '/companies/editimagename',
            type: 'post',
            data: {
                id: id,
                name: name,
                // _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
            }
        }).done(function(data) {
            if (data != 'success')
            {
                alert('Ошибка при изменении признака');
                return;
            }
            $this.parent().children('.name-edit').hide();
            $this.parent().children('.name-text').show().text(name);
            $this.text('Изменить').addClass('edit_img_btn').removeClass('save_img_btn');
        });

    });
});


$('.change-logo-arr').on('click', function() {
    $('#send-image .imgfile').click();
});

$('.imgfile').on('change', function() {
    $('#send-image').submit();
});

$('#img-path').on('load', function() {
    var img = jQuery.parseJSON($('#img-path').contents().find("body").html());
    var imgPath = img.path;
    $('.company-logo-refresh').attr('src', imgPath);
});

$('.delete-logo-cross').on('click', function() {
    var logo = $(this).attr('logo');
    var toPost = $('.toPost').val();
    var postData = 'logo=' + logo + '&_csrf=' + toPost;
    $.post('/admin/deletecompanylogo', postData, function(data) {
        var answer = jQuery.parseJSON(data);
        if (answer.success == 'success') {
            $('.company-logo-refresh').attr('src', '/images/default_profile_image.png');
        }
    });

});


//показываем скрытые поля редактирования
$('.edit-company-button').on('click', function() {
    $('.save-company-button').show();
    $(this).hide();
    $('#cke_vertigo').fadeIn(1000);
    $('.edit-field').fadeIn(1000);
    $('.color-picker').fadeIn(1000);
    $('.show-field').hide();

});

$('.save-company-button').on('click', function() {

    var textareaValue = $('#edit-company-form iframe').contents().find('body').html();
    if (textareaValue == '<p><br></p>') {
        $('#edit-company-form #vertigo').val('');
    }
    else {
        $('#edit-company-form #vertigo').val(textareaValue);
    }

    var postData = $('#edit-company-form').serialize();

    $.post('/admin/editcompany', postData, function(data) {
        //console.log(data);
        var answer = jQuery.parseJSON(data);
        console.log(answer);
        if (answer.success == 'success') {
            $('.error').html('');
            $('.edit-company-button').show();
            $('.save-company-button').hide();
            $('#cke_vertigo').fadeOut(1000);
            $('.color-picker').fadeOut(1000);
            $('.edit-field').hide();
            $('.show-field').fadeIn(1000);

            $('.show_additional_info').html(textareaValue);
            var readyData = $('#edit-company-form').serializeArray();
            $.each(readyData, function(index, value) {
                console.log(value);
                $('.show-' + value.name).html(value.value);
                if (value.name == 'site') {
                    $('.show-' + value.name).attr('href', value.value);
                }


            });
        }
        else {
            $('.error').html('');
            $.each(answer, function(index, value) {
                $('span.' + index).html(value);
                $('span.' + index).show();
            });
        }

    });


});

CKEDITOR.replace('vertigo');
$('#colorpicker').farbtastic('#color');