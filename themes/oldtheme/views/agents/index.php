<?php
use yii\helpers\Html;
use yii\helpers\Url; 
use yii\jui\AutoComplete;
use yii\widgets\ListView;

?>
       
 <div class="row">    
    <div class="col-lg-4">
        <div class="them-block-shadow">

            
            
            
            <?= Html::beginForm('/agents/index', 'GET') ?> 
            <lable>Укажите id номер агента:</lable><br>
            <?= Html::Input('text', 'agent_id', \yii::$app->request->get('agent_id'))?><br>
            <lable>Выберите город:</lable><br>
            <?= AutoComplete::widget([                    
                    'name' => 'city',
                    'clientOptions' => [
                        'source' => $cites,
                    ],
                    
                ]);?><br>
            
            <lable>Выберите имя агента:</lable><br>
            <?= Html::Input('text', 'firstname', \yii::$app->request->get('firstname'))?><br>
            <lable>Выберите фамилию агента:</lable><br>
            <?= Html::Input('text', 'surname', \yii::$app->request->get('surname'))?> <br>
            <lable>Выберите компанию:</lable><br>
            <?= Html::DropDownList('company', \yii::$app->request->get('company'), [''=>''] + $companes, ['multiple'=>'multiple', 'size'=>5]);?>            
            <?= Html::CheckboxList('status', \yii::$app->request->get('status') , ['10'=>'Наличие активного статуса']) ?>
            <?= Html::CheckboxList('photo', \yii::$app->request->get('photo') , ['true'=>'Наличие фото'])  ?>   
            <?= Html::CheckboxList( 'ins_type',\yii::$app->request->get('type'), $type) ?>
            <div class="form-group">
            <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Очистить',Yii::$app->urlManager->createAbsoluteUrl(['/agents/index']),['class' => 'btn btn-primary']);?>
            <?= Html::endForm() ?> 
            </div>
            
        </div>
    </div>
     
    <div class="col-lg-8">
        
        <span>Сортировать: <br></span><?php echo  $provider->sort->link('rating').'<br>'. $provider->sort->link('experience').'<br>'. $provider->sort->link('birthday')?>
            <?= ListView::widget([
                'dataProvider' => $provider,
                'itemView' => 'lists/_list_agents',

                 'pager' => [            
                    'maxButtonCount' => 3,
                     'options' => ['class'=>'pagination'],
                ],  
                'layout' => "{pager}{items}{pager}",
                ]);?> 
       
    </div>
     
    
</div>

<style>
    .pagination {
    display: block;
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
}
</style>

