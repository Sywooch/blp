$('span.full').click(function(){
        $('td.full').show();
        $('td.brief').hide();
    });
    $('span.brief').click(function(){
        $('td.full').hide();
        $('td.brief').show();
    });
    
    $(document).ready(function() { // Ждём загрузки страницы
	
	$("div.item").click(function(){	// Событие клика на маленькое изображение
                
            var img = $(this).children('img');
            // Получаем изображение, на которое кликнули
            var src = img.attr('path'); // Достаем из этого изображения путь до картинки
            $(".popup").remove();
            $("body").append("<div class='popup'>"+ //Добавляем в тело документа разметку всплывающего окна
                                             "<div class='popup_bg'></div>"+ // Блок, который будет служить фоном затемненным
                                             "<img src='"+src+"' class='popup_img' />"+ // Само увеличенное фото
                                             "</div>"); 
            $(".popup").fadeIn(800); // Медленно выводим изображение
            $(".popup").click(function(){	// Событие клика на затемненный фон	   
                    $(".popup").fadeOut(800);	// Медленно убираем всплывающее окно
                    setTimeout(function() {	// Выставляем таймер
                      $(".popup").remove(); // Удаляем разметку всплывающего окна
                    }, 800);
            });
	});
        
        $("p#correct_info").click(function(){
            $("table#admin_table").fadeOut(800);
            $("p#correct_info").fadeOut(800);
            $("table#admin_form").fadeIn(800);
        });
	
        
});

