<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use \app\models\forms;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php echo Html::csrfMetaTags() ?>

</head>
<?=$content?>
