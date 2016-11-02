<?php
$this->title = "Отзывы о работе страховых компаний, мнения клиентов | 711.ru";
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Отзывы, отзывы о работе страховых компаний, страховые отзывы, качество работы, мнение клиентов, ОСАГО, автострахование']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Отзывы о работе страховых компаний. Мнения клиентов по каско, ОСАГО и другим видам страхования.']);
use \yii\widgets\LinkPager;
use app\components\ListReviews\ListReviews;
use yii\helpers\Url;
use app\components\LinkPager711\LinkPager711;

//echo '<pre>'; print_r($lastComments); echo '</pre>';
//echo '<pre>'; print_r($reviews['reviews']); echo '</pre>';

?>

<main class="content clear">
 <aside class="content_left content_reviews clear shadow" id="review_list">
    <div class="content_left_feedback clear">
        <div class="content_left_feedback_title">Отзывы о работе компаний</div>
        <div class="content_left_feedback_total">
            Всего отзывов: <span class="content_left_feedback_total_counter"><?= number_format($reviews['reviews'][0]['countSumm'], 0, ',', ' ') ?></span>
        </div>
        <a href="/addreview" class="content_left_feedback_leavefeedback">Оставить отзыв</a>
    </div>
    <div class="feedback_about_this_company">
        <p class="feedback_about_this_company_title">Отзывы о конкретной компании:</p>
        <form action="" class="feedback_about_this_company_form" method="get" action="/reviews/">
            <div class="mySelectStyle feedback_about_this_company_form_select">
                <select class="" name="company-id">
                    <option value="">Выберите компанию</option>
                    <option value="">Все</option>
                    <?php foreach($companies as $company) : ?>
                        <option <?php if($company['id'] == Yii::$app->request->get('company-id')){?>selected="selected"<?php } ?> value="<?= $company['id'] ?>"><?= $company['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" class="feedback_about_this_company_form_btn" value="Найти">
        </form>
    </div>
    <?php
    //echo '<pre>'; print_r($reviews['reviews']); echo '</pre>';
    ?>
    <?= ListReviews::widget(['reviews' => $reviews['reviews']]) ?>

    <?= LinkPager711::widget(['maxButtonCount'=>5,'pagination' => $reviews['pages'],
            'linkOptions'=>['class'=>'pagination_item'],
                'nextPageLabel'=>'<p><img src="/bluetheme/img/arrow_right.svg" width="10" height="10"></p>',
                    'prevPageLabel'=>'<p><img src="/bluetheme/img/arrow_left.svg" width="10" height="10"></p>',
                        'lastPageCssClass'=>'pagination_item','firstPageCssClass'=>'pagination_item',
                            'prevPageCssClass'=>'pagination_item pagination_item_left',
                                'nextPageCssClass'=>'pagination_item pagination_item_right','pageCssClass'=>'pagination_item']) ?>


</aside>
<aside class="insurance_companies_list shadow">
    <a href="/companies" class="insurance_companies_list_title">Страховые компании</a>

    <table class="insurance_companies_list_head">
        <tr>
            <td class="insurance_companies_list_head_left">Название компании</td>
            <td class="insurance_companies_list_head_right">Отзывы</td>
        </tr>
    </table>
    <table class="insurance_companies_list_body insurance_companies_list_head">
    <?php foreach ($companies as $company): ?>
        <tr>
            <td class="insurance_companies_list_head_left">
                <a href="<?= Url::to(['/companies/detail','id'=>$company['id']]) ?>" class="insurance_companies_list_head_left_link">
                    <?= $company['name'] ?>
                </a>
            </td>
            <td class="insurance_companies_list_head_right">
                <span class="counter"><?= $company['reviews'] ?></span>
            </td>
        </tr>
    <?php endforeach; ?>                       
    </table>


    <!-- Перенесенные отзывы из за верстки -->
        <p class="last_feedbacks_comments_title">
            Последние комментарии к отзывам
        </p>
            <?php foreach ($lastComments['comments'] as $comment): ?>
        <div class="last_feedbacks_comments_item">
            <p class="last_feedbacks_comments_item_date">
                <?= $comment['date'] ?>
            </p>
            <div class="last_feedbacks_comments_item_person">
                <img src="/bluetheme/img/profile1.svg" alt="">
                <?= $comment['author_name'] ?>
            </div>

            <div class="last_feedbacks_comments_item_iconComment">
                <img src="/bluetheme/img/cloud_comment.png" alt="">
            </div>
            <div class="last_feedbacks_comments_item_comment">
                    <?= $comment['trunc_comment'] ?>
            </div>
            <div class="last_feedbacks_comments_item_from">
                К отзыву о работе компании: <a href="<?= Url::to(['/reviews/detail','id'=>$comment['review_id']]) ?>" class="last_feedbacks_comments_item_from">№<?= $comment['review_id'] ?></a>
                <img src="/bluetheme/img/cloud_comment.png" alt="">
                <span class="last_feedbacks_comments_item_from_counter"><?= $comment['count'] ?></span>
            </div>
        </div>
    <?php endforeach; ?>


</aside>


</main>