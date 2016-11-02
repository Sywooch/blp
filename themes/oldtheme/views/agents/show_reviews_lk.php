<?php
use yii\widgets\ListView;
?>
<div class="row">
    <div class="col-lg-2">
         <?php echo $this->render('//layouts/agents/_left_nav_cabinet') ?>
    </div>
   <div class="col-lg-10"
    <?= ListView::widget([
        'dataProvider' => $provider,
        'layout' => "{pager}{items}{pager}",
        'itemView' => 'lists/_list_reviews_agent',
    ]);?>
    </div>
</div>
