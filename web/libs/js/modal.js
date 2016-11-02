/**
 * Created by user-204-008 on 23.05.16.
 */
/* Поведение модального окна.  Окно popup в свернутом виде есть всегда, окно разворачивается через 15 секунд прибывания на сайте. Если пользователь свернул popup
* то устанавливаются кукки, окно больше не раскрывается.
*/

function myShowItems() {

    $showElements();
    $('div.closeButton ').click(function () {
        $('.modalWin').show();
        $hideElements();
        jQuery.cookie('closeButton','yes');

    })
}

// Функции переключение на альтернативные стили popup окна
$hideElements = function () {
    $('.modalWin').toggleClass('modalWinAlt');
    $('div.modalButtonReview').toggleClass('modalButtonReviewAlt');
    $('div.closeButton').hide();
    $('.modalText').hide();
    $('.hrModal2').hide();
    $('.modalTextMino').hide();
    $('.modalLogo').hide();
}
$showElements = function () {
    $('.modalWin').toggleClass('modalWinAlt');
    $('div.modalButtonReview').toggleClass('modalButtonReviewAlt');
    $('div.closeButton').show();
    $('.modalText').show();
    $('.hrModal2').show();
    $('.modalTextMino').show();
    $('.modalLogo').show();
}

//
$(document ).ready(function() {

    if(jQuery.cookie('closeButton')) {
        var c = jQuery.cookie('closeButton');
            if(c == 'yes'){
                $('.modalWin').show();
                $hideElements();
            }
    }else{
        $('.modalWin').show();
        $hideElements();
        setTimeout(myShowItems, 15000);

    }

    $( '.modalButtonReview' ).click(function() {
        jQuery.cookie('modalWin','yes');
        location.href = '/addreview';
    });

});