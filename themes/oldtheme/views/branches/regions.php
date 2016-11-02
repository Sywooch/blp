<?php $this->title = "Филиалы страховых компаний в регионах России - адреса, телефоны, режим работы." ?>
<div id="companyspeedbar">
    <div style="padding-left: 10px">
        <a href="/">711</a> &gt;&gt; Регионы России
    </div>
</div>
<div id ="branch-wrap">
    <!--<span class ="branch-header">--><h1 class="h1Header3">Регионы России - список филиалов страховых компаний</h1><!--</span>-->
    <table class ='branch-list' >
        <?php
        for ($i = 0; $i < ceil($count / 3); $i++) {
            ?>
            <tr>
                <td>
                    <a href ='/region/<?= isset($regions[$i]['id']) ? $regions[$i]['id'] : '' ?>'>
                        <?= isset($regions[$i]['region']) ?  $regions[$i]['region'] : '' ?>
                    </a>
                </td>
                <td>
                    <a href ='/region/<?= isset($regions[$i + ceil($count / 3)]['id']) ? $regions[$i + ceil($count / 3)]['id'] : '' ?>'>
                        <?= isset($regions[$i + ceil($count / 3)]['region']) ?  $regions[$i + ceil($count / 3)]['region'] : '' ?>
                    </a>
                </td>
                <td>
                    <a href ='/region/<?= isset($regions[$i + ceil($count * 2 / 3)]['id']) ? $regions[$i + ceil($count * 2 / 3)]['id'] : '' ?>'>
                        <?= isset($regions[$i + ceil($count * 2 / 3)]['region']) ?  $regions[$i + ceil($count * 2 / 3)]['region'] : '' ?>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<style>
    #branch-wrap{
        background: #fff;
        width: 100%;
        *text-align: center;
        padding: 10px;
    }
    
    #branch-wrap .branch-header {
        font-size: 18px;
        *font-weight: bold;
        
       }
    #branch-wrap .branch-list {
           width: 100%;
           text-align: left;
           margin: 5px;
       }
       #branch-wrap .branch-list td {
           padding: 3px 0;
           font-size: 13px;
       }
       
</style>
