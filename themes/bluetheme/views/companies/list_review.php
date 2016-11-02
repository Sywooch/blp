<?php

use app\components\ListReviews\ListReviews;
use app\components\LinkPager711\LinkPager711;

?>
<main class="content clear">
 <aside class="content_left content_reviews clear shadow" id="review_list">
    
    
    <?= ListReviews::widget(['reviews' => $reviews['reviews']]) ?>

    <?= LinkPager711::widget(['maxButtonCount'=>5,'pagination' => $reviews['pages'],
            'linkOptions'=>['class'=>'pagination_item'],
                'nextPageLabel'=>'<p><img src="/bluetheme/img/arrow_right.svg" width="10" height="10"></p>',
                    'prevPageLabel'=>'<p><img src="/bluetheme/img/arrow_left.svg" width="10" height="10"></p>',
                        'lastPageCssClass'=>'pagination_item','firstPageCssClass'=>'pagination_item',
                            'prevPageCssClass'=>'pagination_item pagination_item_left',
                                'nextPageCssClass'=>'pagination_item pagination_item_right','pageCssClass'=>'pagination_item']) ?>


</aside>
</main>