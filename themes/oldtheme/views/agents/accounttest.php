<?php

use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

Yii::$app->view->registerJsFile('/js/agents/account.js');
?>

<div class="row"> 
    <div class="col-md-4">
        <div>
            <?php
            echo FileInput::widget([
                'model' => $agent,
                'attribute' => 'Avatar',
                'options' => ['accept' => 'image/*'],
                'language' => 'ru',
                'pluginOptions' => [
                    'showPreview' => true,
                    'showCaption' => false,
                    'showRemove' => true,
                    'showUpload' => true,
                    'uploadUrl' => Url::to(['/agents/upload-avatar']),
                    'initialPreview' => [
                        Html::img($agent->Avatar->url, ['class' => 'them-preview-img', 'alt' => $agent->Avatar->filename, 'title' => $agent->Avatar->filename]),
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
    <?php
    $form = ActiveForm::begin([
                'id' => 'register-form',
                'layout' => 'horizontal',
            ])
    ?>
    <div class="col-md-4">
        <div class="h1">
            <?php echo $agent->name ?> <?php echo $agent->first_name ?> <?php echo $agent->middle_name ?>
        </div>
        <div class="insurances-block">

            <?php
            echo '<label class="control-label">Выбирите специализацию</label>';
            echo Select2::widget([

                'name' => 'insurances',
                'data' => $insurances,
                'options' => [
                    'placeholder' => 'Выбирите специализацию',
                    'class' => 'insurances',
                ],
            ]);
            ?>
            <div class="insurances-div">
                <?php
                if ($agent->insurances):
                    foreach ($agent->insurances as $insurance):
                        ?>
                        <div class="insurance select-item" data-id="<?php echo $insurance->id ?>"><?php echo $insurance->name ?><div class="glyphicon glyphicon-remove btn-remove"></div></div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="companies-block">
            <?php
            echo '<label class="control-label">Выбирите компанию</label>';
            echo Select2::widget([
                'name' => 'companies',
                'data' => $companies,
                'options' => [
                    'placeholder' => 'Выбирите компанию',
                    'class' => 'companies',
                ],
            ]);
            ?>
            <div class="companies-div">
                <?php
                if ($agent->companies):
                    foreach ($agent->companies as $company):
                        ?>
                        <div class="company select-item" data-id="<?php echo $company->user_id ?>"><?php echo $company->company_name ?><div class="glyphicon glyphicon-remove btn-remove"></div></div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end() ?>
    <div class="col-md-4">

    </div>

</div>