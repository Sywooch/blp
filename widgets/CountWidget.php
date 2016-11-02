<?php
namespace app\widgets;

use yii\base\Widget;
use app\models\Counter;
use yii\data\ActiveDataProvider;
/**
 * @author Maxim Shablinskiy maxshabl@yandex.ru
 * @date 16.08.2016
 * Виджет подсчета посещений. Работает в режиме показа и в режиме подсчета в зависимости от $mode. 
 * Если счетчика с текущей датой отсутствует, то создается новый с укзанным именем. 
 * Показ выводится по имени в виде массива объектов. Лимит задается в viewlimit
 */

class CountWidget extends Widget
{
    public $mode;
    public $namecounter;
    public $model;
   
    public function init()
    {
        parent::init();
        
        $this->model = new Counter;       
  
    }

    public function run()
    {
        if ($this->mode == 'count'):
            $this->model->count($this->namecounter);
        elseif ($this->mode == 'view'):
            $query = $this->model->view($this->namecounter);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 15,
                ],
            ]);
            return $this->render('count/count', ['dataProvider'=> $dataProvider]);
        endif;
        
    }
}