<div class="content_fifth_right_alsoWatched clear">
        <p class="content_fifth_right_alsoWatched_title">
            Те, кто интересовался компанией, также просматривал
        </p>
        <?php foreach($companies as $company):?>
        <a href="/companies/<?= $company['company_id']?>" class="content_fifth_right_alsoWatched_company">
                <div class="company_rating_feedback_inside_title">
                    <div style="width: 40px; padding-top: 2px; height:40px; background: #<?= $company['color'] ?>; color: white; font-size: 20px;text-align: center;
                        -moz-border-radius:  50%; /* Firefox */
                        -webkit-border-radius:  50%;  /* Safari 4 */
                        border-radius:  50%;  /* IE 9, Safari 5, Chrome */line-height: 40px; height:40px; font-weight: bold; display: inline-block; vertical-align: middle">
                            <?= substr($company['company_name'], 0, 2) ?>
                    </div> 
                    <div style="display: inline-block; vertical-align: middle" class="content_fifth_right_alsoWatched_company_inDetails_name" ><?= $company['company_name']?></div>
                </div>
                <div class="content_fifth_right_alsoWatched_company_inDetails clearUp">
                    
                    <div class="stars">
                        <?php
                            for($i = 0; $i < round($company['average']); $i++): ?>
                                <img width="16" class="stars-marked star" src="/bluetheme/img/mark.svg">
                            <?php endfor;
                            for($i; $i < 5; $i++): ?>
                                <img width="16" class="stars-marked-no star" src="/bluetheme/img/mark-no.svg">
                            <?php endfor;
                        ?>
                        <img src="/bluetheme/img/cloud.svg" width="16px" alt="">
                        <span class="company_feedbacks_counter"><?= $company['countreviews']?></span>
                    </div>
                </div>
            </a>
        <?php endforeach;?>
    </div>