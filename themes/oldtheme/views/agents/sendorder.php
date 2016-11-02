<?php
use yii\helpers\Html;
use yii\jui\AutoComplete;
?>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-4">
            <div class="them-block-shadow">   
                <div>
                    <p>Отправить заявку</p>
                    <p>Агент: <?=$surname?> <?=$firstname?><p></p>
                </div>
                <?= Html::beginForm() ?> 
                <?= Html::activeHiddenInput($orders, 'agent_id', ['value' => \Yii::$app->request->get('agent_id')])?>
                <?= Html::activeHiddenInput($orders, 'user_id', ['value' => (!\Yii::$app->user->isGuest) ? \Yii::$app->request->get('agent_id') : null])?>
                <lable>Представтесь:</lable><br>
                <?= Html::activeInput('text', $orders, 'user_fullname')?><br>
                <lable>Email:</lable><br>
                <?= Html::activeInput('text', $orders, 'user_email')?><br>
                <lable>Телефон:</lable><br>
                <?= Html::activeInput('text', $orders, 'user_phone')?> <br> 

                <lable>Выберите город:</lable><br>
                <?= AutoComplete::widget([                    
                        'model' => $orders,
                        'attribute' => 'user_city',
                        'clientOptions' => [
                            'source' => $cites,
                        ],

                    ]);?><br><br>

                <?= Html::activeDropDownList($orders, 'type', [''=>'Выберите тип']+$type) ?><br>

                <lable>Сообщение:</lable><br>
                <?= Html::activeTextarea($orders,'user_message')?> <br>
                <div class="form-group"><br>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                <?php echo Html::a('Очистить',Yii::$app->urlManager->createAbsoluteUrl(['/agents/sendorders']),['class' => 'btn btn-primary']);?>
                <?= Html::endForm() ?> 
                </div>
            </div>    
        </div>        
    </div>
