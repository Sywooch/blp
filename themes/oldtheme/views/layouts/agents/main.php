<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AgentsAsset;
use app\models\User;

AgentsAsset::register($this);

$login_success = !Yii::$app->user->isGuest;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php Html::csrfMetaTags() ?>

        <?php //$module = Yii::app()->getModule('yupe');   ?>
        <title><?= Html::encode($this->title) ?></title>        

        <?php $this->head() ?>
    </head>
    <body>
        <!-- Flash start-->
        <div class="col-lg-12">
            <?php if(Yii::$app->session->hasFlash('success')): ?>                
                    <?= Yii::$app->session->getFlash('success') ?>                 
            <?php endif; ?>
            <?php if(Yii::$app->session->hasFlash('confirm')): ?>               
                    <?= Yii::$app->session->getFlash('confirm') ?>               
            <?php endif; ?>
            <?php if(Yii::$app->session->hasFlash('error')): ?>                
                   <?= Yii::$app->session->getFlash('error') ?>                
            <?php endif; ?>
           

        </div>
        <!--Flash end -->
        
      
        <?= Html::csrfMetaTags() ?>
        <?php echo $this->render('//layouts/agents/_header',array('login_success'=>$login_success)) ?>
        <?php echo $this->render('//layouts/agents/_nav_bar') ?>
        <?php $this->beginBody() ?>
        <div class="container">
            <?php echo $content ?>
        </div>

        <?php $this->endBody() ?>
    
    </body>
</html>
<?php $this->endPage() ?>
