<?php
namespace app\components\MainMenu;

use yii\helpers\HtmlPurifier;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use Yii;


   /**
    * Вывод меню на сайте в
    * @author Peskov Sergey
    * @date 22.09.2015
    * @param items (array) - массив с пунктами меню, options (array) - опции
    * @return html
    */

class FooterMenu extends Widget
{
    public $items;
    public $options;


    public function init()
    {
        parent::init();

        /*print_r($this->items);
        print_r($this->options);*/

        foreach($this->items as $menu){?>
            <?php if($menu['inner']){ ?>                
                    <?php foreach($menu['inner'] as $inner){ ?>
                        <li class="<?= $this->options['wrapperClass'] ?>">
                            <a href="<?= $inner['link'] ?>" class="<?= $this->options['itemsClass'] ?>"><?= $inner['item'] ?></a>
                        </li>
                   <?php } ?>               
           <?php }
        }
        
    }
}