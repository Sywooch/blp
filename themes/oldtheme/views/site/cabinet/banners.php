<?php
use app\widgets\CountWidget; 


?>
<div style="width: 700px;">
    <div id="left_block_top_head">Баннеры</div>
    <div style="background:white;font-size:14px;">
        <h1>Баннер Согласие</h1>
        <div style="border-bottom:1px solid #f3f3f3;padding:10px 0px;text-align:center;">
            
            <table>
                <tr>
                     
                    <?php echo CountWidget::widget([
                        'mode' => 'view',
                        'namecounter' => 'soglasie'
                    ]);?>
                </tr>
            </table>
        </div>
       
    </div>
</div>

<style>
    th{
        padding: 10px;
        padding-left: 30px;
    }
</style>
