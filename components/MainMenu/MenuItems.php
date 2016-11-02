<?php
namespace app\components\MainMenu;

use yii\helpers\Html;
use Yii;
use yii\helpers\Url;


   /**
    * Все пункты главного меню на сайте
    * @author Peskov Sergey
    * @date 30.09.2015
    * @return $items (array)
    */

class MenuItems
{
	//public $items;

	    static function show()
	    {
		$items = [
		    ['root' => 'Автомобили',
		     'link' => 'javascript:void(0);',
		     'id' => '1',
		            'inner' => [
		                [
		                    'item' => 'Калькулятор каско',
		                    'link' => '/calculator-kasko'
		                ],
		                [
		                    'item' => 'КАСКО',
		                    'link' => URL::to(['static/index','page'=>'kasko'])
		                ],
		                [
		                    'item' => 'ОСАГО',
		                    'link' => URL::to(['static/index','page'=>'osago'])
		                ],
		                [
		                    'item' => 'Зеленая карта',
		                    'link' => URL::to(['static/index','page'=>'greencard'])
		                ],
		            ]
		    ],
		    ['root' => 'Имущество',
		     'link' => 'javascript:void(0);',
		     'id' => '2',
		            'inner' => [
		                [
		                    'item' => 'Квартира',
		                    'link' => URL::to(['static/index','page'=>'property'])
		                ],
		                [
		                    'item' => 'Дом',
		                    'link' => URL::to(['static/index','page'=>'house'])
		                ],
		                [
		                    'item' => 'Ответственность',
		                    'link' => URL::to(['static/index','page'=>'liability-fl'])
		                ]
		            ]
		    ],
		    ['root' => 'Путешествия',
		     'link' => 'javascript:void(0);',
		     'id' => '3',
		            'inner' => [
		                [
		                    'item' => 'Выезжающие за рубеж',
		                    'link' => URL::to(['static/index','page'=>'vzr'])
		                ],
		                [
		                    'item' => 'Путешествующие по РФ',
		                    'link' => URL::to(['static/index','page'=>'travel-rf'])
		                ],
		                [
		                    'item' => 'Багаж',
		                    'link' => URL::to(['static/index','page'=>'luggage'])
		                ]
		            ]
		    ],
		    ['root' => 'Жизнь и здоровье',
		     'link' => 'javascript:void(0);',
		     'id' => '4',
		            'inner' => [
		                [
		                    'item' => 'Несчастный случай',
		                    'link' => URL::to(['static/index','page'=>'ns'])
		                ],
		                [
		                    'item' => 'ДМС',
		                    'link' => URL::to(['static/index','page'=>'dms'])
		                ],
		                [
		                    'item' => 'ОМС',
		                    'link' => URL::to(['static/index','page'=>'oms'])
		                ],
		                [
		                    'item' => 'Страхование жизни',
		                    'link' => URL::to(['static/index','page'=>'life'])
		                ]
		            ]
		    ],
		    ['root' => 'Ипотека',
		     'link' => 'javascript:void(0);',
		     'id' => '5',
		            'inner' => [
		                [
		                    'item' => 'Ипотечное страхование',
		                    'link' => URL::to(['static/index','page'=>'ipoteka'])
		                ],
		                [
		                    'item' => 'Титульное страхование',
		                    'link' => URL::to(['static/index','page'=>'title'])
		                ],
		            ]
		    ],
		];	    	
	        return $items;
	    }			
}