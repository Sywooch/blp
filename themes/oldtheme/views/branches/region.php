<?php $this->title = "{$region}: филиалы страховых компаний - адреса, телефоны, режим работы." ?>
<div id="companyspeedbar" style="float:left;width:941px;">
    <div style="padding-left: 10px">
        <a href="/">711</a> &gt;&gt; <a href="/regions">Регионы России</a> &gt;&gt; <?=$region?>
    </div>
</div>
<div id ="branch-wrap">
    <!--<span class ="branch-header">--><h1 class="h1Header3"><?=$region?> - список филиалов страховых компаний по городам</h1><!--</span>-->
    <table class ='branch-list' >
        <?php
        for ($i = 0; $i < ceil($count / 3); $i++) {
            ?>
            <tr>
                <td>
                    <a href ='/city/<?= isset($cities[$i]['id']) ? $cities[$i]['id'] : '' ?>'>
                        <?= isset($cities[$i]['city']) ?  $cities[$i]['city'] : '' ?>
                    </a>
                </td>
                <td>
                    <a href ='/city/<?= isset($cities[$i + ceil($count / 3)]['id']) ? $cities[$i + ceil($count / 3)]['id'] : '' ?>'>
                        <?= isset($cities[$i + ceil($count / 3)]['city']) ?  $cities[$i + ceil($count / 3)]['city'] : '' ?>
                    </a>
                </td>
                <td>
                    <a href ='/city/<?= isset($cities[$i + ceil($count * 2 / 3)]['id']) ? $cities[$i + ceil($count * 2 / 3)]['id'] : '' ?>'>
                        <?= isset($cities[$i + ceil($count * 2 / 3)]['city']) ?  $cities[$i + ceil($count * 2 / 3)]['city'] : '' ?>
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
        text-align: center;
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
           padding: 3px;
           font-size: 13px;
       }
       
</style>
