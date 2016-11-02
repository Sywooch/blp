<?php
use yii\helpers\Html;
use yii\helpers\Url; 
?>
<div style="position: absolute; width: 100%; background-color: red; padding: 10px;">
    <div style="width: 650px; margin: 0 auto;">
        <span style="font-family: arial;font-size: 36px; color: white;"><a style="text-decoration:none; color:white;" href="http://www.711.ru"><i>711.ru</i></a></span>
    </div>
</div>

<div style="float:left;width:641px; height: auto;">
    <div id="olit-content">
		
       
            <table>
                <tr>
                    <td> <span>Для активации аккаунта пройдите по этой ссылке:</span>
                        <?php 
                            echo Html::a('Активировать.',
                            Yii::$app->urlManager->createAbsoluteUrl(
                                [
                                    '/register/confirm',
                                    'key' => $user->auth_key,
                                    'name' => $user->name
                                ]
                            ));
                        ?>
                    </td>
                 </tr>
           </table>     
                
             
       
        <style>
            #success
            { 
                font-size: 16px;
                position: relative;
                top: 0px;
                padding-left: 65px;
                padding-top: 20px;
                min-height: 500px;
                margin:50px;
            }
        </style>
    </div>
</div>
