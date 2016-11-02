<?php
namespace app\components\MainMenu;

use yii\helpers\HtmlPurifier;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use Yii;


   /**
    * Вывод меню на сайте
    * @author Peskov Sergey
    * @date 22.09.2015
    * @param items (array) - массив с пунктами меню, options (array) - опции
    * @return html
    */

class MainMenu extends Widget
{
    public $items;
    public $options;


    public function init()
    {
        parent::init();

        /*print_r($this->items);
        print_r($this->options);*/
        foreach($this->items as $menu){?>
            <a href="<?= $menu['link'] ?>" class="<?= $this->options['rootClass'] ?>">
                <?= $menu['root'] ?>
                <div class="header_arrow"></div>
            </a>
            <?php if($menu['inner']){ ?>
                <div class="<?= $this->options['wrapperClass'].$menu['id'] ?>">
                    <?php foreach($menu['inner'] as $inner){ ?>
                        <a href="<?= $inner['link'] ?>" class="<?= $this->options['itemsClass'] ?>"><?= $inner['item'] ?></a>
                   <?php } ?>
               </div>
           <?php }
        }
        
    }
}