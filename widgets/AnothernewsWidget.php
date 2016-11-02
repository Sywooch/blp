<?php

namespace app\widgets;


use yii\base\Widget;


   /**
    * Вывод дополнительных новостей по теме
    * @author Maxim Shablinskiy
    * @date 04.10.16
    * @param array - массив новостей ['url','image','category','title','short_story','date','count','category_altname']
    * @return string
    */

class AnothernewsWidget extends Widget
{
    public $news;
    public $out;
    public $countNews;
    
    
    
    public function init()
    {
        
        parent::init();
        
    }

    public function run()
    {
        
        if($this->countNews == 4)
            return $this->render('news/news4', ['allnews'=>$this->news]);
        elseif($this->countNews == 2)
            return $this->render('news/news2', ['news'=>$this->news]);
        elseif($this->countNews == 'banner1x2')
            return $this->render('news/news2_banner', ['news'=>$this->news]);
    }
}
