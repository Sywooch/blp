<?php
namespace app\components\AnotherNews;

use yii\helpers\HtmlPurifier;
use yii\base\Widget;
use yii\helpers\Html;
use app\helpers\ImgHelper;

   /**
    * Вывод дополнительных новостей по теме
    * @author Peskov Sergey
    * @date 15.09.2015
    * @param array - массив новостей ['url','image','category','title','short_story','date','count','category_altname']
    * @return string
    */

class AnotherNews extends Widget
{
    public $news;
    public $out;

    public function init()
    {
        parent::init();


        /**
        * Можно включить эту строчку, если нужен полноценный модуль, без нее виджет нужно встраивать
        * в обертку
        */
        //$this->out = '<section class="content_sec_bottom clearfix clearfixup">';

        foreach($this->news as $other){
            $this->out  .= '<div class="clear_content_right_news-tile content_right_news-tile">
            <a href="'. $other['url'] .'">';
                    if(isset($other['image']) && !empty($other['image'])){
                       $this->out  .= '<div class="content_right_news-tile_pict content_right_news-tile_pict_jpg">
                            <img src="'. HtmlPurifier::process(ImgHelper::cropImg($other['image'], 282, 190)) .'" alt="" class="content_right_news-tile_pict_jpg_image">
                        </div>';
                    }else{
                        $this->out  .= '<div class="content_right_news-tile_pict content_right_news-tile_pict_svg">
                            <img class="content_right_news-tile_pict_svg_image" src="/bluetheme/img/backpack.svg" alt="">
                        </div>';
                    }

                        $this->out  .= '<div class="content_right_news-tile_title">
                            <p>'. HtmlPurifier::process($other['title']) .'<p>
                        </div>';
                $this->out  .= '</a>
                <div class="content_right_news-tile_text">
                    <p>'. HtmlPurifier::process($other['short_story']) .'</p>
                </div>
                <div class="dcv">
                    <a href="/news/'.HtmlPurifier::process($other['category_altname']).'" class="category" id="category">'. HtmlPurifier::process($other['category']) .'</a>
                    <span style="margin-right: 4px" class="date" id="date">'. HtmlPurifier::process($other['date']) .'</span>
                    <span class="views" id="views"><img src="/bluetheme/img/eye1.svg" />'. HtmlPurifier::process($other['count']) .'</span>
                </div>
            </div>';
        }
        //$this->out .= '</div>';

    }
   

    public function run()
    {
        
        return $this->out;
    }
}