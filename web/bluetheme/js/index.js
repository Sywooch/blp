//На всех страницах. По клику на бургер открывается меню в pad и mobile
function showMenu(){
    var burger = document.querySelector('#item_burger');
    var pad_menu = document.querySelector('#header_menu_bg');
    burger.addEventListener('click', function(){
        pad_menu.classList.toggle('show_this');
    });
    var closCrossHeader = document.querySelector('#closing_cross_header');
    closCrossHeader.addEventListener('click', function(event){
        pad_menu.classList.toggle('show_this');
    })
}
showMenu();

//Скрывает и показыват меню в футере в mobile
function showFooterMenu(){
    var itemTitle = document.querySelectorAll('.item-title');
    var itemFooterMenu = document.querySelectorAll('.menu-footer');
    var arrows = document.querySelectorAll('.main_footer_item_title_arrow');
    [].forEach.call(itemTitle, function(item, i, itemTitle){
        itemTitle[i].addEventListener('click', function(event){
            itemFooterMenu[i].classList.toggle('show_this');
            arrows[i].classList.toggle('rotateArrow');
        })
    })
}
showFooterMenu();

//Для страницы с отзывами о компании. Скрывает верхний баннер по клику на крестик. Пятая страница.
function hideTop(){
    var myBlock = document.querySelector('.content_fourth_top');
    var cross = document.querySelector('#closing_cross_company');
    // cross.addEventListener('click', function(){
    //     myBlock.style.display = 'none';
    // })
}
hideTop();
// Все страницы. Меню хедера в версии pad, mobile
function showHeaderMenu(){
    var itemTitle = document.querySelectorAll('.header_menu_item');
    var itemHeaderMenu = document.querySelectorAll('.header_menu_item_links');
    var arrows = document.querySelectorAll('.header_arrow');
    [].forEach.call(itemTitle, function(item, i, itemTitle){
        var k = i - 2;
        if(document.documentElement.clientWidth < 769 && i > 2 || i == 2){
            itemTitle[i].addEventListener('click', function(event){
                event.preventDefault();
                itemHeaderMenu[k].classList.toggle('show_this');
                arrows[k].classList.toggle('rotateArrow_header');
            })
        }
    })
}

showHeaderMenu();

function showSearchField(){
    // место клика для показа результатов
    var iconSearch = document.querySelector('#header_icon_search');

    // результаты поиска
    var searchFied = document.querySelector('#top-navigation_item_search');

    // весь боди. на нем слушает нажатие escape
    var myBody = document.querySelector('body');

    // блок для клика - закрытия
    var closeLayer = document.querySelector('#backlayer')

    myBody.addEventListener('keydown',function(event){
        if(event.which == 27){
            searchFied.classList.remove('show_this');
        }
    })
    iconSearch.addEventListener('click', function(event){
        event.preventDefault();
        searchFied.classList.add('show_this');
        closeLayer.classList.add('show_this');
    })
    closeLayer.addEventListener('click',function(event){
        searchFied.classList.remove('show_this');
        closeLayer.classList.remove('show_this');
    })

}
showSearchField();
