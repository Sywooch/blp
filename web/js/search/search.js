//~~~~~~~~~~~~~~~~~~инициализируем карту~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

var myMap;
ymaps.ready(function() {
    myMap = new ymaps.Map("YMapsID", {
        center: [55.76, 37.64], zoom: 7,
        behaviors: ['default', 'scrollZoom']
    });
    myMap.controls.remove('default');
    
    myMap.controls
            .add("zoomControl", {
                float: "none",
                position: {
                    bottom: 150, left: 10
                }
            });
    

//~~~~~~~~~~~~~~~~~~~~~~~~~~показать/спрятать окно добавления точки на карту~~~~
    $('.add-popup-button').on('click', function() {
        var tpl = $('#company-add').clone()
        $('#company-add form').show();
        $('#company-add h2').hide();
        $('#company-add').fadeIn(1000);
    });

    $('.hide-this').on('click', function() {

        $('#company-add').fadeOut(1000);
    });

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//
//    
//
//                
//                
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//~~~~~~~~~~~~~~~~~~~~~~поиск по карте по вводу пользователя~~~~~~~~~~~~~~~~~~~~
    $('.search-button').on('click', function() {

        var postData = $(this).closest('form').serialize();
        //myMap.geoObjects.removeAll();
        $.post('/companies/getcompaniescoord', postData, function(data) {
            myMap.geoObjects.removeAll();
            var data = jQuery.parseJSON(data);

            if (data.error == 'error') {
                $('#company-search .error').html('');
                $.each(data.errors, function(index, value) {
                    $('#company-search label.' + index).html(value);
                    $('#company-search label.' + index).show();
                });
            }
            else {

                $('#company-search .error').html('');
                var answer = jQuery.makeArray(data);
                var myGeoObjects = [];

                for (var i = 0; i < answer.length; i++) {
                    myGeoObjects[i] = prepareOnePlacemark(answer[i]);
                }

                var myClusterer = new ymaps.Clusterer();
                myClusterer.add(myGeoObjects);
                myMap.geoObjects.add(myClusterer);
                myMap.setBounds(myClusterer.getBounds());
            }




        });

    });

    /*~~~~~~~~~~~~~~~~~~~~~~~~~первоначальное состояние карты~~~~~~~~~~~~~~~~~~~~~*/
    var company_id = $('#company_id').val();
    var branch_id = $('#branch_id').val();


    if (branch_id != '') {
        $('.one-point').click();
    } else if (company_id == 0 || typeof (company_id) == undefined) {
        $('.clean-filter').click();
    } else {
        $('.company-filter').click();
    }
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/



});
//~~~~~~~~~~~~~~~~~~~~~~~~~поиск всех точек компании~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function setCoordsIfCompany() {
    var company_id = $('#company_id').val();



    var postData = '_csrf=' + $('.toPost').val() + '&company_id=' + company_id;

    $.post('/companies/getcompanycoord', postData, function(data) {
        myMap.geoObjects.removeAll();
        // console.log(data);
        console.log(data);
        // return;
        var data = jQuery.parseJSON(data);

        if (data.error == 'error') {
            $('#company-search .error').html('');
            $.each(data.errors, function(index, value) {
                $('#company-search label.' + index).html(value);
                $('#company-search label.' + index).show();
            });
        }
        else {
            var answer = jQuery.makeArray(data);
            var myGeoObjects = [];

            for (var i = 0; i < answer.length; i++) {
                myGeoObjects[i] = prepareOnePlacemark(answer[i]);

            }

            var myClusterer = new ymaps.Clusterer(
                    {clusterDisableClickZoom: true}
            );
            myClusterer.add(myGeoObjects);
            myMap.geoObjects.add(myClusterer);
            myMap.setBounds(myClusterer.getBounds());
            var company_name = answer[0].company_name;
            addLabel(company_name);
        }




    });
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//
//
//
//~~~~~~~~~~~~~~~~~~получаем все координаты~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function getAllCoords() {

    var postData = '_csrf=' + $('.toPost').val();

    $.post('/companies/getallcompaniescoord', postData, function(data) {
        myMap.geoObjects.removeAll();
        var data = jQuery.parseJSON(data);

        if (data.error == 'error') {
            $('#company-search .error').html('');
            $.each(data.errors, function(index, value) {
                $('#company-search label.' + index).html(value);
                $('#company-search label.' + index).show();
            });
        }
        else {
            var answer = jQuery.makeArray(data);
            var myGeoObjects = [];

            for (var i = 0; i < answer.length; i++) {
                myGeoObjects[i] = prepareOnePlacemark(answer[i]);

            }

            var myClusterer = new ymaps.Clusterer();
            myClusterer.add(myGeoObjects);
            myMap.geoObjects.add(myClusterer);
            myMap.setBounds(myClusterer.getBounds());
        }




    });
}


/**
 * prepare one placemark
 * 
 * @param object answer
 * 
 */
function prepareOnePlacemark(answer) {

    /*--------------видимые поля-----------------------*/
    var template = $('.company-wrap').clone();
    $(template).find('#company-baloon').css('display', 'inline-block');

    if (answer.active == '0') {
        $(template).find('.non-active').show();
        $(template).find('.company-branch').addClass('closed');
        $(template).find('.company-name').addClass('closed');
    }

    $(template).find('.company-name').html(answer.company_name);
    $(template).find('.company-name').attr('href', '/companies/' + answer.company_id);
    $(template).find('.company-functions').html(answer.functions);
    $(template).find('.company-branch').html(answer.branch);
    $(template).find('.company-branch').attr('href', '/branch/' + answer.id);
    $(template).find('.company-address').html(answer.region + ", " + answer.city + ", " + answer.address);
    $(template).find('.company-works-hours').html(answer.work_hours);
    $(template).find('.company-phones').html(answer.phones);
    $(template).find('.company-email').html(answer.email);
    $(template).find('.company-img').attr('src', answer.company_photo);
    $(template).find('.branch-branch').val(answer.id);
    $(template).find('.review-link').attr('href', 'http://711.ru/addreview/' + answer.company_id);


    var hiddenFields = $(template).find('.edit-admin-fields');
    /*--------------если админ, то заполнить скрытые поля-----------------------*/
    if ($(hiddenFields).length) {
        $(hiddenFields).find('.company-name').val(answer.company_name);
        $(hiddenFields).find('.company-branch').val(answer.branch);
        $(hiddenFields).find('.company-functions').val(answer.functions);
        $(hiddenFields).find('.company-region').val(answer.region);
        $(hiddenFields).find('.company-city').val(answer.city);
        $(hiddenFields).find('.company-email').val(answer.email);
        $(hiddenFields).find('.company-true-address').val(answer.address);
        $(hiddenFields).find('.company-work-hours').val(answer.work_hours);
        $(hiddenFields).find('.company-phones').val(answer.phones);
        $(hiddenFields).find('.branch-id').val(answer.id);
        $(hiddenFields).find('.company-ax').val(answer.ax);
        $(hiddenFields).find('.company-ay').val(answer.ay);
        $(hiddenFields).find('.company-id').val(answer.company_id);
        $(hiddenFields).find('.company-name').val(answer.company_name);
        $(hiddenFields).find('.active').val(answer.active);
    }



    var onePoint = new ymaps.Placemark(
            [answer.ay, answer.ax], {
        hintContent: answer.company_name,
        balloonContent: template.html(),
        pointContent: '1',
        clusterCaption: answer.branch,
    },
            {
                preset: "islands#blueCircleIcon",
            });
    return onePoint;

}


/**
 * set point on map
 * @param number     ax x coord
 * @param number     ay y coord
 * 
 */
function setPointOnMap(ax, ay) {
    myMap.geoObjects.removeAll();
    var onePoint = new ymaps.Placemark(
            [ay, ax], {},
            {
                preset: "islands#redIcon",
            });

    myMap.geoObjects.add(onePoint);
    myMap.setCenter([ay, ax], 16);
}


function setPointWithoutDelete(ax, ay) {
    var onePoint = new ymaps.Placemark(
            [ay, ax], {},
            {
                preset: "islands#redIcon",
            });

    myMap.geoObjects.add(onePoint);
    myMap.setCenter([ay, ax], 16);
}
var companyLabel =
        "<label class ='company-label'>\n\
                 <span>Компания Z</span>\n\
                 <label class = 'del-from-search' > X </label>\n\
                 <input type = 'hidden' name = 'company_add[]' class = 'hidden-company-name' arr-number ='' />\n\
                </label>";
function addLabel(labelValue) {
    var hiddenLabel = $(companyLabel).clone();
    $(hiddenLabel).find('span').html(labelValue);
    $(hiddenLabel).find('.hidden-company-name').attr('value', labelValue);
    $(hiddenLabel).attr('display', 'none');
    $('#company-search .company_id').after(hiddenLabel);
    $(hiddenLabel).fadeIn(1000);
    $("#company").autocomplete("search", "1");
}


$(document).ready(function() {


    //~~~~~~~~~~~~~~~~~~~~~~~~~~РЕДАКТИРОВАНИЕ ФИЛИАЛА~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    $('#map-wrapper').on('click', '.edit-branch-button', function() {

        var secretForm = $(this).closest('form');

        $('#company-edit').find('form').show();
        $('#company-edit').find('h2').hide();
        $('#company-edit').fadeIn(1000);

        /*---------------заполняем поля редактирования-----------------------------------------------*/
        $('#company-edit').find('input[name=region-add]').val($(secretForm).find('.company-region').val());
        $('#company-edit').find('input[name=city-add]').val($(secretForm).find('.company-city').val());
        $('#company-edit').find('input[name=address-add]').val($(secretForm).find('.company-true-address').val());
        $('#company-edit').find('input[name=ax]').val($(secretForm).find('.company-ax').val());
        $('#company-edit').find('input[name=ay]').val($(secretForm).find('.company-ay').val());
        $('#company-edit').find('input[name=company-add]').val($(secretForm).find('.company-name').val());
        $('#company-edit').find('input[name=branch]').val($(secretForm).find('.company-branch').val());
        $('#company-edit').find('input[name=functions]').val($(secretForm).find('.company-functions').val());
        $('#company-edit').find('input[name=work_hours]').val($(secretForm).find('.company-work-hours').val());
        $('#company-edit').find('input[name=phones]').val($(secretForm).find('.company-phones').val());
        $('#company-edit').find('input[name=email]').val($(secretForm).find('.company-email').val());
        $('#company-edit').find('input[name=branch-id]').val($(secretForm).find('.branch-id').val());
        //console.log('checkbox value' + $(secretForm).find('.active').val());
        if ($(secretForm).find('.active').val() == '1') {

            $('#company-edit').find('input[name=active]').prop({'checked': true});
        }

        /*----------------------------------------------------------------------------------------------*/


        /*------------------------найти точку на карте---------------------------------*/
        $('#company-edit').find('.show-on-map').on('click', function() {
            var form = $(this).closest('form');
            var coordsData = $(this).closest('form').serializeArray();
            var myGeocoder;
            myGeocoder = ymaps.geocode(coordsData[0].value + ", " + coordsData[1].value + ", " + coordsData[2].value);
            var ax = coordsData[3].value;
            var ay = coordsData[4].value;
            setPointWithoutDelete(ax, ay);


        });

        /*-----------------------------------------------------------------------------*/



        /*-------------------------------найти по адресу-------------------------------*/

        $('#company-edit').find('.refresh-coords').on('click', '', function() {
            var form = $(this).closest('form');
            var coordsData = $(this).closest('form').serializeArray();
            var myGeocoder;
            myGeocoder = ymaps.geocode(coordsData[0].value + ", " + coordsData[1].value + ", " + coordsData[2].value);
            var coords;
            myGeocoder.then(
                    function(res) {
                        coords = res.geoObjects.get(0).geometry.getCoordinates();
                        $(form).find('input[name=ay]').val(coords[0]);
                        $(form).find('input[name=ax]').val(coords[1]);
                        setPointWithoutDelete(coords[1], coords[0]);


                    },
                    function(err) {
                        alert('Произошла какая-то ошибка, координаты не определены.\n\
                           Попробуйте еще раз');
                    }
            );
            //delete(myGeocoder);
        });
        /*------------------------------------------------------------------------*/
        /*-------------------------------найти по адресу-------------------------------*/

        $('#company-edit').find('.delete').on('click', function() {
            if (confirm('Вы точно хотите удалить филиал из базы? Это действие необратимо :(')) {
                var branchId = $(secretForm).find('.branch-id').val();
                console.log($(secretForm).find('input[name=_csrf]'));
                var toPost = $('#company-edit .toPost').val();
                var postData = 'branch=' + branchId + '&_scrf=' + toPost;

                $.post('/admin/deletebranch', postData, function(data) {
                    var answer = jQuery.parseJSON(data);
                    if (answer.success = 'success') {
                        $(secretForm).find('input[type=text]').val('');
                        $(secretForm).find('input[type=hidden]').val('');
                        var branch_id = $('#branch_id').val('');
                        $('#company-edit h2').text('Филиал успешно удален из БД!\n\
                                         Его больше не вернуть :(');
                        $('#company-edit h2').show();
                        $('#company-edit form').hide();
                        $('#company-edit').fadeOut(3000);

                    }
                    else {
                        $(secretForm).find('input[type=text]').val('');
                        $(secretForm).find('input[type=hidden]').val('');
                        var branch_id = $('#branch_id').val('');
                        $('#company-edit h2').html('<span style = "color: red" >Произошло что-то ужасное!\n\
                                                    Филиал не был удален, попробуйте позже</span>');
                        $('#company-edit h2').show();
                        $('#company-edit form').hide();
                        $('#company-edit').fadeOut(3000);
                    }
                });
            }
        });
        /*------------------------------------------------------------------------*/


        /*-----------------------------------------------редактировать(отсылаем пост)---------------------*/
        $('#company-edit').find('.add-branch').on('click', function() {
            $(this).off();
            var postData = $(this).closest('form').serialize();
            var form = $(this).closest('form');
            $.post('/admin/editbranch', postData, function(data) {

                var answer = jQuery.parseJSON(data);
                if (answer.success == 'success') {
                    $('#company-edit h2').html('Филиал отредактирован!');
                    $('#company-edit h2').show();
                    $('#company-edit form').hide();
                    $('#company-edit').fadeOut(3000);

                    $('#branch_id').attr('value', answer.id);
                    myMap.geoObjects.removeAll();
                    //$('.one-point').click();
                    $(form).find('input[type=text]').val('');
                    $(form).find('input[type=hidden]').val('');
                    var branch_id = $('#branch_id').val();
                    var postData = 'branch=' + branch_id + '&_csrf=' + $('.toPost').val();
                    $.post('/companies/getonepoint', postData, function(data) {
                        var answer = jQuery.parseJSON(data);

                        onePoint = prepareOnePlacemark(answer);
                        myMap.geoObjects.add(onePoint);
                        myMap.setCenter([answer.ay, answer.ax], 16);

                    });
                }
                else {
                    $('#company-edit .error').html('');
                    $.each(answer, function(index, value) {
                        $('#company-edit label.' + index).html(value);
                        $('#company-add label.' + index).show();
                    });
                }
            });

        });




    });

    /*-----------------спрятать форму редактирования филиала-----------------------------------------*/
    $('#map-wrapper #company-edit').on('click', '.hide-this', function() {

        $('#company-edit').fadeOut(1000, function()
        {
            $(this).css('opacity', '1');
            $(this).css('display', 'none');
        });

    });

    /*------------------------------------------------------------------------------------------------*/




//<<<<<<<<<<<<<<<<<<<<<<<<ADD BRANCH FUNCTONS<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    $('#company-add .add-branch').on('click', function() {

        var postData = $(this).closest('form').serialize();
        var form = $(this).closest('form');
        $.post('/admin/addbranch', postData, function(data) {

            var answer = jQuery.parseJSON(data);
            if (answer.success == 'success') {
                $('#company-add h2').show();
                $('#company-add form').hide();
                $('#company-add').fadeOut(3000);
                console.log(answer.id);
                $('#branch_id').attr('value', answer.id);
                myMap.geoObjects.removeAll();


                var branch_id = $('#branch_id').val();
                var postData = 'branch=' + branch_id + '&_csrf=' + $('.toPost').val();
                $.post('/companies/getonepoint', postData, function(data) {
                    var answer = jQuery.parseJSON(data);

                    onePoint = prepareOnePlacemark(answer);
                    myMap.geoObjects.add(onePoint);
                    myMap.setCenter([answer.ay, answer.ax], 16);

                });

                $(form).find('input[type=text]').val('');

            }
            else {
                $('#company-add .error').html('');
                $.each(answer, function(index, value) {
                    $('#company-add label.' + index).html(value);
                    $('#company-add label.' + index).show();
                });
            }
        });

    });

    /**
     * find coords by address,
     * set point by coords on map
     */
    $('#company-add').on('click', '.refresh-coords', function() {

        var form = $(this).closest('form');
        var coordsData = $(this).closest('form').serializeArray();
        var myGeocoder;
        myGeocoder = ymaps.geocode(coordsData[0].value + ", " + coordsData[1].value + ", " + coordsData[2].value);
        var coords;
        myGeocoder.then(
                function(res) {
                    coords = res.geoObjects.get(0).geometry.getCoordinates();
                    $(form).find('input[name=ay]').val(coords[0]);
                    $(form).find('input[name=ax]').val(coords[1]);
                    setPointWithoutDelete(coords[1], coords[0])




                },
                function(err) {
                    alert('Произошла какая-то ошибка, координаты не определены.\n\
                           Попробуйте еще раз');
                }
        );
        delete(myGeocoder);
    });


    /**
     * find coords by address,
     * set point by coords on map
     */
    $('.show-on-map').on('click', function() {
        var form = $(this).closest('form');
        var coordsData = $(this).closest('form').serializeArray();
        var myGeocoder;
        myGeocoder = ymaps.geocode(coordsData[0].value + ", " + coordsData[1].value + ", " + coordsData[2].value);
        var ax = coordsData[3].value;
        var ay = coordsData[4].value;
        console.log(ax + " " + ay);
        setPointWithoutDelete(ax, ay);


    });




//>>>>>>>>>>>>>>>>>>>>>>END>ADD>BRANCH>FUNCTIONS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

//<<<<<<<<<<<<<<<<<<<<<<<<AUTOCOMPLETE  functions<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<


    startInit();

    /*~~~~~~~~~~~~~~~~~~~~~~~~~SET ONE POINT ON MAP~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
    function onePoint() {
        var branch_id = $('#branch_id').val();
        var postData = 'branch=' + branch_id + '&_csrf=' + $('.toPost').val();
        $.post('/companies/getonepoint', postData, function(data) {
            var answer = jQuery.parseJSON(data);

            onePoint = prepareOnePlacemark(answer);
            myMap.geoObjects.add(onePoint);
            myMap.setCenter([answer.ay, answer.ax], 16);

        });
    }



    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~END SET ONE POINT ON MAP~~~~~~~~~~~~~~~~~~~~~~*/

    function startInit() {
        $('.clean-filter').click();
    }

    $('.clean-filter').on('click', function() {
        initSelects();
    });
    $('.company-filter').on('click', function() {
        initSelectsWithoutRefresh();
    })
    $('.one-point').on('click', function() {
        onePoint();
    })

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~refresh cities when region is selected~~~~~~~~~~~

    $('#region').on('click keyup', function() {
        var postData = 'region=' + $('#region').val() + '&_csrf=' + $('.toPost').val();
        refresh(postData);
    });
    $('#region').autocomplete({select: function(event, ui) {

            var postData = 'region=' + ui.item.value + '&_csrf=' + $('.toPost').val();
            refresh(postData);


        }
    });

    function refresh(postData) {

        $.post('/companies/clarifycitieslist', postData, function(data) {
            data = jQuery.makeArray(jQuery.parseJSON(data));
            $("#city").autocomplete({
                source: data, minLength: 0
            });

            $('#ui-id-1', '#ui-id-3', '#ui-id-4, #ui-id-5, #ui-id-6').hide();
            // $("#city").autocomplete("search", "");


        });
    }

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~refresh regions when city is selected~~~~~~~~~~~

    $('#city').on('click keyup', function() {
        var postData = 'city=' + $('#city').val() + '&_csrf=' + $('.toPost').val();
        refreshRegions(postData);
    });
    $('#city').autocomplete({select: function(event, ui) {

            var postData = 'city=' + ui.item.value + '&_csrf=' + $('.toPost').val();
            refreshRegions(postData);


        }
    });

    function refreshRegions(postData) {

        $.post('/companies/clarifyregionslist', postData, function(data) {
            data = jQuery.makeArray(jQuery.parseJSON(data));
            $("#region").autocomplete({
                source: data, minLength: 0
            });

            //$('#ui-id-1', '#ui-id-3', '#ui-id-4, #ui-id-5, #ui-id-6').hide();
            //$("#city").autocomplete("search", "");


        });
    }

    function addLabel(labelValue) {
        var hiddenLabel = $(companyLabel).clone();
        $(hiddenLabel).find('span').html(labelValue);
        $(hiddenLabel).find('.hidden-company-name').attr('value', labelValue);
        $(hiddenLabel).attr('display', 'none');
        $('#company-search .company_id').after(hiddenLabel);
        $(hiddenLabel).fadeIn(1000);
        $("#company").autocomplete("search", "1");
    }
    function initSelects() {

        $("#company-search #region").val('');
        $("#city").val('');
        $("#company").val('');
        $('.company-label').remove();
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~region~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        $("#company-search #region").autocomplete({
            source: regions,
            minLength: 0,
        });
        $('#company-search #region').parent().on('click', '.arrow', function() {
            $('#ui-id-2', '#ui-id-3', '#ui-id-4, #ui-id-5, #ui-id-6').hide();
            $("#company-search #region").autocomplete("search", "");
        });
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~city~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~            
        $("#city").autocomplete({
            source: cities, minLength: 0
        });
        $('#city').parent().on('click', '.arrow', function() {
            $('#ui-id-1', '#ui-id-3', '#ui-id-4, #ui-id-5, #ui-id-6').hide();
            $("#city").autocomplete("search", "");
        });


        getAllCoords();

    }

    function initSelectsWithoutRefresh() {

        $("#company-search #region").val('');
        $("#city").val('');
        $("#company").val('');

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~region~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        $("#company-search #region").autocomplete({
            source: regions,
            minLength: 0,
        });
        $('#company-search #region').parent().on('click', '.arrow', function() {
            $('#ui-id-2', '#ui-id-3', '#ui-id-4, #ui-id-5, #ui-id-6').hide();
            $("#company-search #region").autocomplete("search", "");
        });

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~city~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~            
        $("#city").autocomplete({
            source: cities, minLength: 0
        });

        $('#city').parent().on('click', '.arrow', function() {
            $('#ui-id-1', '#ui-id-3', '#ui-id-4, #ui-id-5, #ui-id-6').hide();
            $("#city").autocomplete("search", "");
        });

        setCoordsIfCompany();


    }

//~~~~~~~~~~~~~~~~~~~~~~~~~~~company~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    $('#company-search').on('click', '.del-from-search', function() {
        var remove = $(this).closest('.company-label');
        $(remove).fadeOut(1000, function() {
            $(this).remove();
        });
    });


    $("#company").autocomplete({
        source: companies,
        minLength: 0
    });
    $('#company').parent().on('click', '.arrow', function() {

        $('#ui-id-1', '#ui-id-2', '#ui-id-4, #ui-id-5, #ui-id-6').hide();
        $("#company").autocomplete("search", "");

    });

    $('#company').autocomplete({select: function(event, ui) {
            //$(this).val('');


            if (!$('.company-label').length) {
                addLabel(ui.item.value);
            }
            var flag = 0;
            $.each($('.company-label'), function(index, value) {
                if (($(value).find('span').html() === ui.item.value)) {
                    flag = 1;
                }
            });
            if (flag === 0) {
                addLabel(ui.item.value);
            }
            //var e = jQuery.Event("keydown", { keyCode: 8 });

            console.log($(this).val());
            ui.item.value = '';

        }
    });
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~region-add~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    $("#company-add #regionadd").autocomplete({
        source: regions,
        minLength: 0,
    });
    $('#company-add #regionadd').parent().on('click', '.arrow', function() {
        $('#ui-id-1', '#ui-id-2', '#ui-id-3, #ui-id-5, #ui-id-6').hide();
        $("#company-add #regionadd").autocomplete("search", "");

    });
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~city-add~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~            
    $("#company-add #cityadd").autocomplete({
        source: cities, minLength: 0
    });

    $('#company-add #cityadd').parent().on('click', '.arrow', function() {
        $('#ui-id-1', '#ui-id-2', '#ui-id-2, #ui-id-5, #ui-id-6').hide();
        $("#cityadd").autocomplete("search", "");

    });
//~~~~~~~~~~~~~~~~~~~~~~~~~~~company-add~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    $("#company-add #companyadd").autocomplete({
        source: companies,
        minLength: 0
    });
    $('#company-add #companyadd').parent().on('click', '.arrow', function() {
        $('#ui-id-1', '#ui-id-2', '#ui-id-3, #ui-id-4, #ui-id-5').hide();
        $("#companyadd").autocomplete("search", "");
    });

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~region-edit~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    $("#company-edit #regionedit").autocomplete({
        source: regions,
        minLength: 0,
    });
    $('#company-edit #regionedit').parent().on('click', '.arrow', function() {
        $('#ui-id-1', '#ui-id-2', '#ui-id-3, #ui-id-5, #ui-id-6').hide();
        $("#company-edit #regionedit").autocomplete("search", "");

    });
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~city-add~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~            
    $("#company-edit #cityedit").autocomplete({
        source: cities, minLength: 0
    });

    $('#company-edit #cityedit').parent().on('click', '.arrow', function() {
        $('#ui-id-1', '#ui-id-2', '#ui-id-2, #ui-id-5, #ui-id-6').hide();
        $("#cityedit").autocomplete("search", "");

    });
//>>>>>>>>>>>>>>>>>>>>>>END>AUTOCOMPLETE>FUNCTIONS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
});

