<?php
namespace app\components\SocialShare;

use yii\base\Widget;
use yii\helpers\Html;
use app\components\SocialShare\SocialAsset;

   /**
    * Соц. иконки на основе Yandex Share
    * @author Peskov Sergey
    * @date 15.09.2015
    */

class SocialShare extends Widget
{
    public $link;
    public $title;
    public $out;
    public $desc;

    public function init()
    {
        parent::init();
        $view = $this->getView();
        SocialAsset::register($view);
        $this->out = '
            <div data-yasharequickservices="twitter,facebook,vkontakte,gplus" 
                data-yashareTitle="'. $this->title .' | 711.ru" '
                . 'data-yashareDescription="'.$this->desc.'" '
                . 'data-yashareUrl="'.$this->link.'" '
                . 'data-yasharetype="none" '
                . 'data-yasharel10n="ru" '
                . 'class="yashare-auto-init" >'
                . '</div>';            
    }
   

    public function run()
    {
        return $this->out;
    }
}