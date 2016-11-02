<?php $this->title = "Филиалы страховых компаний в городе {$city}: - адреса, телефоны, режим работы." ?>
<div id="companyspeedbar" style="float:left;width:941px;">
    <div style="padding-left: 10px">
        <a href="/">711</a> &gt;&gt;
        <a href="/regions">Регионы России</a> &gt;&gt;
        <a href ="/region/<?= $region['id'] ?>"> <?= $region['name'] ?> </a> &gt;&gt;
        <?= $city ?>
    </div>
</div>
<div id ="branch-wrap">
    <!--<div class ="branch-header">--><h1 class="h1Header3">Список филиалов страховых компаний в городе <?= $city ?></h1><!--</div>-->
    <div id ='filter'>
        <form action="" method ='post' >
            <input type ='text'     id ='city' name ='company'   placeholder="Выбрать компанию"  class ='big-autoselect' required />
            <div class ='arrow'>&#8744;</div>
            <label class ="error city"></label>
            <input type="submit" value = "Искать" id = 'search'>
            <input type ='hidden' name ='_csrf' class = 'toPost' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
            <input type ='hidden' value ='<?= $companies ?>' id ='companies'/>
        </form>
        <form action="" method ='post' id = "refresh">
            <input type="submit" value = "Сбросить" id = 'refresh-button'>
            <input type ='hidden' name ='refresh' value ='refresh' />
            <input type ='hidden' name ='_csrf' class = 'toPost' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
        </form>
    </div>
    <table class ='city-list tablesorter' id = 'myTable'>


        <thead>
            <tr>
                <th>Компания</th>
                <th>Тип офиса</th>
                <th>Адрес</th>
                <th>Часы работы</th>
                <th>Телефоны</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($cities) >=1 ) {
            foreach ($cities as $branch) : ?>
                <tr>
                    <td>
                        <a href ='/branch/<?= $branch['id'] ?>' class = 'company_name'><?= $branch['company_name'] ?></a><br/>
                        <?= $branch['branch'] ?>
                    </td>
                    <td>
                        <?= $branch['functions'] ?>
                    </td>
                    <td>
                        <?= $branch['city'] . " " . $branch['address'] ?><br/>
                        <a href ="/map/0/<?= $branch['id'] ?>" target ='_blank'>показать на карте</a>
                    </td>
                    <td>
                        <?= $branch['work_hours'] ?>
                    </td>
                    <td>
                        <?= $branch['phones'] ?>
                    </td>
                    <td>
                        <?= $branch['email'] ?>
                    </td>
                </tr>

            <?php endforeach;
            }
            else { ?>
             <tr>
                 <td colspan="6">
                       К сожалению, у нас нет информации о филиалах в данном регионе.
                    </td>
                </tr>
           <?php }
            ?>
        </tbody>


    </table>
</div>
<script src = '/js/tablesorter/jquery.tablesorter.min.js'></script>
<script src='/js/jquery-ui/jquery-ui.js'></script>
<script>
   // $(document).ready(function() {
        $("#city").autocomplete({
            source: <?= $companies ?>, minLength: 0
        });

        $('#city').parent().on('click', '.arrow', function(event) {
            event.stopPropagation();
            event.preventDefault();

            $("#city").autocomplete("search", "");
        });


        $('div:not(.arrow)').click(function(event) {
            event.stopPropagation();
            // event.preventDefault();

            $('.ui-autocomplete').css('display', 'none');
        });
        $("#myTable").tablesorter({sortList: [[0, 0], [1, 0], [2, 0], [3, 0], [4, 0], [5, 0]]});

        //  });


</script>

<style>
    #branch-wrap{
        background: #fff;
        width: 100%;
        text-align: center;
        padding: 10px;
    }

    #branch-wrap .branch-header {
        font-size: 18px;
        margin: 20px 0px;
        text-align: left;
        *font-weight: bold;

    }
    #branch-wrap .city-list {
        width: 100%;
        text-align: left;
        margin: 5px;
    }
    #branch-wrap .city-list td {
        padding: 5px 4px 5px 2px;
        font-size: 12px;
        background: #F7F7F7;
        min-width: 100px;
    }
    #branch-wrap .city-list th{
        background: #0084EE url(/js/tablesorter/themes/blue/bg.gif) no-repeat 80px 8px;
        padding: 5px 4px 5px 2px;
        text-align: left;
        cursor: pointer;

    }
    #branch-wrap .city-list tr{
        border-bottom: 1px black solid;
    }
    #branch-wrap .city-list .company_name{
        text-decoration: underline;
        font-size: 13px;
        color: black;
    }
    #branch-wrap .city-list .company_name:hover{
        color: blue;
        cursor: pointer;
    }
    #branch-wrap #filter {
        position: relative;
        float: left;
        margin-left: 5px;
        margin-bottom: 20px;
    }
    #branch-wrap #filter input[type=text]{
        font-size:      15px;
        width:          360px;
        height:         30px;
        border-radius:  3px;
        background:     #fefcea; /* Для старых браузров */
        background:     linear-gradient(to top, #F5f5f5, #FFFFFF);
        border:         none;
        box-shadow:     0 0 3px rgba(0,0,0,0.5);
        padding-left:   6px;

    }

    #branch-wrap #filter #search{
        width: 120px;
        position: absolute;
        top: 0px;
        left: 365px;
        background: #fff none repeat scroll 0 0;
        border: 1px solid #4D81C1;
        color: #4D81C1;
    }
    #branch-wrap #filter #search:hover {
        background: #4D81C1;
        border: 1px solid #4D81C1;
        color: #fff;

    }
    #branch-wrap #filter input[type=submit]{

        border-radius: 3px;
        box-shadow: none;

        font-size: 13px;
        line-height: 26px;
        text-align: center;


        box-shadow:     0 0 3px rgba(0,0,0,0.5);
    }
    #branch-wrap #filter input[type=submit]:hover{
        border-radius: 3px;
        box-shadow: none;
        font-size: 13px;
        text-align: center;
        width: 120px;
        cursor: pointer;
        text-decoration: underline;
    }

    #branch-wrap #filter .arrow{
        position: absolute;
        width:  30px;
        height: 30px;
        border-left: 1px #ABB1A8 solid;
        top: 0px;
        right: 0px;
        padding: 7px 0 0 3px;
        font-size: 17px;
        color: #008000;
        border-radius: 0 3px 3px 0;
        cursor: pointer;

    }

    #branch-wrap #filter .arrow:hover{
        color: red;
        background: #F7EDD1;
    }

    .ui-autocomplete{
        max-height: 500px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        position: absolute;
    }

    #ui-id-1 {
        z-index: 2000;
        background: whitesmoke;
        margin-top: 2px;
    }

    #ui-id-1 li{
        cursor: pointer;
        font-size: 15px;
        width: 360px;
        height: 30px;
        border-radius: 3px;
        background: #fefcea;
        background: linear-gradient(to top, #F5f5f5, #FFFFFF);
        border: none;
        box-shadow: 0 0 3px rgba(0,0,0,0.5);
        padding: 8px 0 0 6px;
        margin:  0px 0px;
        list-style: none;
    }

    #ui-id-1 li:hover{
        color: #4d81ef;
    }
    #refresh {
        position: relative;
        float: right;
    }

    #branch-wrap #refresh-button {
        width: 120px;
        position: absolute;
        top: -40px;
        left: 130px;
        background: #fff none repeat scroll 0 0;
        border: 1px solid #EF2929;
        color: #EF2929;

    }

    #branch-wrap #refresh-button:hover {
        background: #EF2929 none repeat scroll 0 0;
        border: 1px solid #EF2929;
        color: #fff;
    }

</style>
