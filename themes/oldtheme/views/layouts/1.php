<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);

$login_success = !\Yii::$app->user->isGuest;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php Html::csrfMetaTags() ?>

        <?php //$module = Yii::app()->getModule('yupe'); ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this -> registerCssFile('/css/search.css') ; ?>
        <?php $this -> registerJsFile('/js/jquery-ui/jquery-ui.js'); ?>
        <?php $this -> registerJsFile('/js/search/search.js'); ?>
        
        <link rel="alternate" type="application/rss+xml" title="RSS feed" href="/rss.xml" />
        <link title="711 - Независимый портал о страховании" href="http://711prod/engine/opensearch.php" type="application/opensearchdescription+xml" rel="search">
        <link href="http://711.ru/rss.xml" title="711 - Независимый портал о страховании" type="application/rss+xml" rel="alternate">
        
        
       
        <?php $this->head() ?>
    </head>
    <body>
 

        <?php $this->beginBody() ?>
       
    </body>
</html>
<?php $this->endPage() ?>


