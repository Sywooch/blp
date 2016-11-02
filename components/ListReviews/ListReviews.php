<?php
namespace app\components\ListReviews;

use yii\helpers\HtmlPurifier;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use Yii;
use yii\helpers\Url;
use app\models\Review;

   /**
    * Вывод списка отзывов на сайте
    * @author Peskov Sergey
    * @date 20.09.2015
    * @param reviews (array) - массив отзывов
    * [0] => Array
    *    (
    *        [review_id] => 119376
    *        [comments] => Array
    *            (
    *            )
    *
    *        [author] => Administrator
    *        [title] => Заголовок 
    *        [city] => Москва
    *        [text] => Мой отзыв о компании...
    *        [type] => ОСАГО
    *        [type_name] => ОСАГО
    *        [date] => 2016-09-20 09:58:34
    *        [rating] => 3
    *        [company_name] => Айни Международная СК
    *        [company_id] => 25
    *        [company_color] => d0291e
    *        [answer] => Array
    *            (
    *                [text] => 
    *                [date] => 
    *            )
    *
    *        [likes] => 0
    *        [already_liked] => 
    *    )
    *
    * @return string
    */

class ListReviews extends Widget
{
    public $reviews;

    public function init()
    {
        parent::init();

        $summElements = count($this->reviews);
        $counter = 0;
        $displayNoneLast = '';
        $totalSum = 0;
        $browser = '';

        //-- Здесь задаю высоту, которую не будет привышать блок при загрузки

        if (strpos($_SERVER["HTTP_USER_AGENT"], "Firefox") !== false) {
            $browser = "firefox";
        }else{
            $browser == 'other';
        }

        if($browser == 'firefox'){
            $heightSumm = 1900;
        }else{
            $heightSumm = 2000;
        }
        
        foreach($this->reviews as $model){
        
            $tmp_text=preg_replace('/\s+/',' ',strip_tags(trim($model['text'])));

            if($counter == 0){
                $lenthToCrap = 500; 
                $getLengthFirst = mb_strlen($tmp_text, 'UTF-8');   
            }else{
                $lenthToCrap = 215;
            }
            $review_text = Review::mbCutString($tmp_text,$lenthToCrap);

            if(Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index'){

                $getLength = mb_strlen($review_text, 'UTF-8'); 
                $numberLines = 0;
                if($getLength <= 60){
                    $numberLines = 1;
                    $totalSum += 120;
                }elseif($getLength <= 110){
                    $numberLines = 2;
                    $totalSum += 140;
                }elseif($getLength <= 200){
                    $numberLines = 3;
                    $totalSum += 160;
                }elseif($getLength <= 260){
                    $numberLines = 4;
                    $totalSum += 180;
                }elseif($getLength <= 310){
                    $numberLines = 5;
                    $totalSum += 200;
                }elseif($getLength <= 370){
                    $numberLines = 6;
                    $totalSum += 240; 
                }elseif($getLength <= 420){
                    $numberLines = 7;
                    $totalSum += 260; 
                }elseif($getLength <= 480){
                    $numberLines = 8;
                    $totalSum += 280;
                }elseif($getLength <= 530){
                    $numberLines = 9;
                    $totalSum += 300;
                }elseif($getLength <= 600){
                    $numberLines = 10;
                    $totalSum += 320;
                }
                
                if($totalSum>=$heightSumm){
                        return false;
                }

            }
            ?>

                <div class="content_left_feedback-item clear">
                    <div class="content_left_feedback-item--wrapper">         
                        <div class="content_left_feedback-item--wrapper_img">
                            <div style="width: 40px; height:40px; background: #<?= $model['company_color'] ?>; color: white; font-size: 20px;text-align: center;
                                -moz-border-radius:  50%; /* Firefox */
                                -webkit-border-radius:  50%;  /* Safari 4 */
                                border-radius:  50%;  /* IE 9, Safari 5, Chrome */">
                               <div style="line-height: 40px; height:40px; font-weight: bold;"><?= substr($model['company_name'], 0, 2) ?></div>
                           </div>
                        </div>
                        <div class="content_left_feedback-item--wrapper_content">
                            <?php if($model['title']){?><a href="<?= Url::to(['/reviews/detail','id'=>$model['review_id']]) ?>" class="content_left_feedback-item--wrapper_content_title"><?=$model['title']?></a><?php }else{?>
                                    <a href="<?= Url::to(['/reviews/detail','id'=>$model['review_id']]) ?>" class="content_left_feedback-item--wrapper_content_title"><?=$model['company_name']?></a>
                                <?php } ?>
                            <span class="stars">
                                <?if($model['rating'] == '-1'){ $model['rating'] = 0; }?>
                                <?php for($i=0; $i<round($model['rating']); $i++){ ?>
                                    <img width="16" class="stars-marked star" src="/bluetheme/img/mark.svg">
                               <?php } ?>
                                <?php for($i=0; $i<5-round($model['rating']); $i++){ ?>
                                    <img width="16" class="stars-marked star" src="/bluetheme/img/mark-no.svg">
                               <?php } ?>
                            </span>
                            <span class="content_left_feedback-item--wrapper_content_whos">
                            <?= (empty($model['author'])) ? '' : $model['author']?>
                            <?php if($model['city']){?>
                                <span> | </span>                                
                                <span class="content_left_feedback-item--wrapper_content_city">
                                    <?= $model['city']?>
                                </span>
                            <?php }?>    
                            </span>
                            <span class="content_left_feedback-item--wrapper_content_date"><?= Yii::$app->formatter->asDate($model['date'], 'dd.MM.yyyy')?></span>
                            <?= '<p class="content_left_feedback-item--wrapper_content_letter">'.$review_text.'<a href="'.Url::to(['/reviews/detail','id'=>$model['review_id']]).'" class="read_next"><img src="/bluetheme/img/readNext.svg" width="20"><img src="/bluetheme/img/readNextHover.svg" width="20"></a></p>' ?>
                        </div>
                            </div>
                    <?php if($counter != ($summElements-1)){ ?><div class="content_left_feedback-item_line"></div> <?php } ?>
                </div>         
        <?php 
        $counter++;
        }
    }
}