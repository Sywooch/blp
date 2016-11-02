<?php
$this->title = "Страховые компании России - рейтинг компаний ,отзывы о работе, состояние лицензий, справочная информация";
?>
<link href="/js/src/rateit.css" rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script src="/js/src/jquery.rateit.js"></script>

<?php
//var_dump($list);
//print_r( implode(',', $list['all_companies']['companies']) );
//echo ($list['all_companies']);
//return;
?>



<div style="padding-left: 10px">
    <a href="/">711</a> &gt;&gt; Страховые компании
</div>
<div class="row">
    <div class="col-md-12">
        <div class="widget-block-white">
            <div class="widget-header-red">Список страховых компаний</div>
            <div class="row">
                <div class="col-md-12">

                    <div style="background:white;height:86px;">
                        <div style="margin:0px 20px;padding-top:30px;">
                            <div id ="filter">
                                <form action="" method ="">
                                    <input type ="text" id ="city" name ="company"   placeholder="Выбрать компанию"  class ="big-autoselect" required />
                                    <div class ="arrow">&#8744;</div>
                                    <label class ="error city"></label>
                                    <input type="button" value = "Сбросить" id = "search">
                                    <input type ="hidden" name ="_csrf" class = "toPost" value ="<?= Yii::$app->request->getCsrfToken() ?>" />
                                    <input type ="hidden" value ="<?php // $companies                    ?>" id ="companies"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="companies_table" id = 'myTable0'>
                <thead>
                    <tr company = 'none' >
                        <th class="company_row" colspan="3">
                            Страховая компания 

                        </th>
                        <th style="" colspan="2">Лицензия</th>
                        <th>
                            Средняя оценка

                        </th>
                        <th>
                            Количество отзывов
                        </th>
                    </tr>
                </thead>
                <tbody>
                <td>1</td>
                <td>
                    <img class="company_logo" src="">
                </td>
                <td>
                    <a href="">Имя компании</a>
                </td>
                <td>
                    описание лицензии
                </td>
                <td class = 'withdrowed_license' >
                    активна нет
                </td>
                <td>
                    <div hidden> рейтинг цифра </div>
                    <div style ='overflow: hidden; width: 100px; height: 17px'>
                        <div class="rateit" data-rateit-value="5" data-rateit-readonly="true"></div>
                    </div>
                </td>
                <td>
                    <a href="/companies/<?php // $company['id']               ?>#namename"><?php // $company['reviews']               ?></a>
                </td>
                </tr>
                </tbody>
            </table> 

            <table class="companies_table" id = "myTable">
                <thead>
                    <tr>
                        <th class="company_row" colspan="3">
                            Страховая компания 
                        </th>
                        <th style="width:400px" colspan="2">Лицензия</th>
                        <th>
                            Средняя оценка
                        </th>
                        <th>
                            Количество отзывов
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $c = 1;
                    foreach ($list['active_companies']['companies'] as $company) :
                        ?>
                        <tr company = '<?= str_replace(" ", "", $company['name']) ?>' >
                            <td><?= $c ?></td>
                            <td>
                                <img class="company_logo" src="<?= $company['logo'] ?>">
                            </td>
                            <td>
                                <a href="/companies/<?= $company['id'] ?>"><?= $company['name'] ?></a>
                            </td>
                            <td>
                                <?= $company['license_for_insurance'] ?>
                            </td>
                            <td class = 'active_license'>
                                <?= $company['license_status'] ?>
                            </td>

                            <td>
                                <div hidden>  <?= $company['rating'] ?> </div>

                                <div style ='overflow: hidden; width: 100px; height: 17px'>
                                    <div hidden>  <?= $company['rating'] ?> </div>
                                    <div class="rateit" data-rateit-value="<?= $company['rating'] ?>" data-rateit-readonly="true"></div>

                                </div>
                            </td>
                            <td>
                                <a href="/companies/<?= $company['id'] ?>#namename"><?= $company['reviews'] ?></a>
                            </td>
                        </tr>
                        <?php
                        $c++;
                    endforeach;
                    ?>
                </tbody>
            </table>   

            <div class = 'cemetary-book'>Книга памяти. Компании, у которых отозвана лицензия</div>
            <table class="companies_table" id = 'myTable2'>
                <thead>
                    <tr>
                        <th class="company_row" colspan="3">
                            Страховая компания 
                        </th>
                        <th style="width:400px" colspan="2">Лицензия</th>
                        <th>
                            Средняя оценка
                        </th>
                        <th>
                            Количество отзывов
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $c = 1;
                    foreach ($list['withdrowed_companies']['companies'] as $company) :
                        ?>
                        <tr company = '<?= str_replace(" ", "", $company['name']) ?>'>
                            <td><?= $c ?></td>
                            <td>
                                <img class="company_logo" src="<?= $company['logo'] ?>">
                            </td>
                            <td>
                                <a href="/companies/<?= $company['id'] ?>"><?= $company['name'] ?></a>
                            </td>
                            <td>
                                <?= $company['license_for_insurance'] ?>
                            </td>
                            <td class = 'withdrowed_license' >
                                <?= $company['license_status'] ?>
                            </td>
                            <td>
                                <div hidden>  <?= $company['rating'] ?> </div>
                                <div style ='overflow: hidden; width: 100px; height: 17px'>
                                    <div class="rateit" data-rateit-value="<?= $company['rating'] ?>" data-rateit-readonly="true"></div>

                                </div>
                            </td>
                            <td>
                                <a href="/companies/<?= $company['id'] ?>#namename"><?= $company['reviews'] ?></a>
                            </td>
                        </tr>
                        <?php
                        $c++;
                    endforeach;
                    ?>
                </tbody>
            </table>  

            <? //= \yii\widgets\LinkPager::widget(['pagination' => $pages])  ?>
            <div style="clear:both;"></div>
            <script src = '/js/jquery-ui/jquery-ui.js'></script>
            <script src = '/js/tablesorter/jquery.tablesorter.min.js'></script>
            <script>
                jQuery(function($) {
                    // filter
                    $('#reviews_filter').submit(function() {
                        var id = $(this).find('select').val();
                        if (!id)
                            return false;
                        location.href = olit_root + 'companies/' + id;
                        return false;
                    });
                    //charts
                    var data = [[9.84, 71.05, 19.11], [0.6, 0.35]]
                    //chartRating('chart_1', data[0], olit_chart_rating);
                    //chartResponse('chart_2', data[1], olit_chart_response);
                });
                //   $(document).ready(function() {
                $("#myTable").tablesorter();
                $("#myTable2").tablesorter();
                //   $("#myTable").tablesorter({sortList: [[0, 0], [1, 0], [2, 0], [3, 0], [4, 0], [5, 0]]});

                $("#city").autocomplete({
                    source: <?= $list['all_companies'] ?>, minLength: 0

                });
                $('#city').parent().on('click', '.arrow', function(event) {
                    event.stopPropagation();
                    $("#city").autocomplete("search", "");
                });


                $('div:not(.arrow)').click(function(event) {
                    event.stopPropagation();
                    // event.preventDefault();

                    $('.ui-autocomplete').css('display', 'none');
                });

                $('#city').autocomplete({select: function(event, ui) {
                        $('#myTable0 tbody tr').replaceWith('<tr></tr>');
                        $('#myTable').hide();
                        $('#myTable2').hide();
                        $('.cemetary-book').hide();
                        var company = ui.item.value;
                        var tr = $('table').find('tr[company=' + ui.item.value.replace(/\s+/g, '') + ']').clone();
                        $('#myTable0 tbody tr').replaceWith(tr);
                        $('#myTable0').show();

                    }
                });

                $('#search').on('click', function() {
                    $('#myTable0').hide();
                    $('#myTable').show();
                    $('#myTable2').show();
                    $('.cemetary-book').show();
                });
                // }

            </script>
        </div>
    </div>
</div>

<style>
    span[role=status] {
        display: none;
    }
    #myTable0 {
        display: none;
    }
    #filter {
        position: relative;
        float: left;
        margin-left: 5px;
        margin-bottom: 20px;
    }
    #filter input[type=text]{
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

    #filter #search{
        width: 120px;
        position: absolute;
        top: 0px; 
        left: 365px;
        background: #fff none repeat scroll 0 0;
        border: 1px solid #EF2929;
        color: #EF2929;
    }
    #filter #search:hover {
        background: #EF2929;
        border: 1px solid #EF2929;
        color: #fff;

    }
    #filter input[type=button]{

        border-radius: 3px;
        box-shadow: none;
        font-size: 13px;
        line-height: 26px;
        text-align: center;
        box-shadow:     0 0 3px rgba(0,0,0,0.5);
    }
    #filter input[type=button]:hover{
        border-radius: 3px;
        box-shadow: none;
        font-size: 13px;
        text-align: center;
        width: 120px;
        cursor: pointer;
        text-decoration: underline;
    }

    #filter .arrow{
        position: absolute;
        width:  30px;
        height: 30px;
        border-left: 1px #ABB1A8 solid;
        top: 0px;
        right: 0px;
        padding: 7px 0 0 7px;
        font-size: 17px;
        color: #008000;
        border-radius: 0 3px 3px 0;
        cursor: pointer;

    }

    #filter .arrow:hover{
        color: red;
        background: #F7EDD1;
    }

    #ui-id-1 {
        z-index: 2000;
    }

    #ui-id-1 li{
        cursor: pointer;
        font-size: 15px;
        width: 343px;
        height: 40px;
        border-radius: 3px;
        background: #fefcea;
        background: linear-gradient(to top, #F5f5f5, #FFFFFF);
        border: none;
        box-shadow: 0 0 3px rgba(0,0,0,0.5);
        padding: 8px 0 0 6px;
        margin: 1px 0;
        list-style: none;
    }

    #ui-id-1 li:hover{
        background: #F3E7CA;
        color: #eb1e1e;
        font-weight: bold;
    }
    .ui-autocomplete{
        max-height: 600px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        position: absolute;
        background-color: whitesmoke;
    }

    .cemetary-book{
        font-size: 18px;
        font-weight: bold;
        padding: 20px;
    }

    
</style>

