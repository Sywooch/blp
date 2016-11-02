<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
?>
<main class="content_fifth clear feedbackPage">
    <section class="content_fifth_left clear" style="margin-left: -30px; margin-top: -60px;">
        <div class="gotYourFeedback" style="display: inherit">
            <div class="gotYourFeedback_center" >
                <img src="/bluetheme/img/feedback_picture.svg" height="150"  alt="">
                <div class="gotYourFeedback_center_message"><?=$message?></div>
            </div>
            <a href='/companies/<?=$id?>' class='closing_cross' id='closing_cross_feedbackGot'></a>
                       
        </div>
    </section>
</main>
