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
		
        <div id="success">
            <?php
                
                echo Html::a('Для активации аккаунта перейдите по этой ссылке.',
                Yii::$app->urlManager->createAbsoluteUrl(
                    [
                        '/agents/confirm',
                        'key' => $user->auth_key,
                        'email' => urlencode($user->email)
                    ]
                ));
            ?>
                
                
                
             </p>
        </div>
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
