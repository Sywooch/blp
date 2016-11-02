<?php
use yii\widgets\LinkPager
?>
<main class="content_fifth clear feedbackPage">
    <aside class="content_left clear shadow my_feedbacks">
        <div class="content_left_feedback clear">
            <div class="content_left_feedback_title">Список отзывов</div>
            <div class="content_left_feedback_all my_feedbacks_all">
                <a href="/reviews">Все отзывы</a>
            </div>
        </div>
        <?php foreach($models as $onerev):?>
        <div class="content_left_feedback-item clear">
            <div class="content_left_feedback-item--wrapper">
                <div class="content_left_feedback-item--wrapper_img">
                    <img  src="img/company_feed_lgoo.svg">
                </div>
                
                <div class="content_left_feedback-item--wrapper_content">
                    <a class="content_left_feedback-item--wrapper_content_title"><?= $onerev['title']?></a>
                    <span class="stars">
                    <?php for($i=0; $i<5; $i++):
                        if($onerev['rating'] == -1) $onerev['rating'] = 0;
                        for($i; $i<round($onerev['rating']); $i++):?>
                            <img width="16" class="stars-marked star" src="/bluetheme/img/mark.svg">
                            <?php continue;
                        endfor;?>
                            <img width="16" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                    <?php endfor; ?>
                    </span>
                    <span class="content_left_feedback-item--wrapper_content_whos">
                        <?= $onerev['author']?>
                    <span> | </span>
                    </span>
                    <span class="content_left_feedback-item--wrapper_content_city">
                        <?= $onerev['city']?>
                    </span>
                    <span class="content_left_feedback-item--wrapper_content_date"><?= date('d.m.Y', strtotime($onerev['date']))?></span>
                    <p class="content_left_feedback-item--wrapper_content_letter">
                        <?=$onerev['text']?>
                    </p>
                    <a href="/reviews/<?=$onerev['review_id']?>" class="read_next">
                    <img src="/bluetheme/img/readNext.svg" width="20" />
                    <img src="/bluetheme/img/readNextHover.svg" width="20">
                    </a>
                </div>
            </div>
            <div class="content_left_feedback-item_line"></div>
        </div>
        <?php endforeach;?>
        
        <?= LinkPager::widget(['pagination' => $pages]);?>
    </aside>
    <?= $this->render("_right_bar") ?>

</main>