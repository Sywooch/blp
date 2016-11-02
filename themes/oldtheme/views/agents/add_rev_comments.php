<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\captcha\Captcha;
?>
<div class="row">
    
   <div class="col-lg-12"
        <p><span><b>Прокомментировал:</b> <?=$review->name?></span></p>
        <p><span><b>Тема:</b> <?=$review->title?></span></p>
        <p><span><b>Текст отзыва:</b> <?=$review->comment?></span></p><br>
        
            
             
            
        
    </div>
    
    <div class="col-lg-offset-2 col-lg-10">
        <?= ListView::widget([
                'dataProvider' => $provider,
                'layout' => "{items}{pager}",
                'itemView' => 'lists/_list_add_rev_comments',
            ]);?>
        <?= Html::beginForm()?>
        <label> Имя: </label><br>
        <?=   Html::activeInput('text', $comment, 'name')?><br><br>
        <label> Комментировать: </label><br>
        <?=   Html::activeTextarea($comment, 'message')?> <br>
        <?php echo Captcha::widget([
            'model' => $capcha,
            'attribute' => 'captcha',
            'options' => ['width' => '20%']
        ]);?>
        <?= Html::activeHiddenInput($comment, 'review_id', ['value' => \Yii::$app->request->get('review_id')])?>
        <?= Html::activeHiddenInput($comment, 'agent_id', ['value' => \Yii::$app->request->get('agent_id')])?>
        <?= Html::activeHiddenInput($comment, 'to_user_id', ['value' => (!empty(\Yii::$app->request->get('to_user_id'))) ? \Yii::$app->request->get('to_user_id') : \Yii::$app->request->get('agent_id') ])?>
        <?= Html::activeHiddenInput($comment, 'from_user_id', ['value' => \Yii::$app->user->identity->user_id])?> <br> 
        <?= Html::submitButton('Комментировать')?>
        <?= Html::endForm()?> 
    </div>
    
</div>