<?php
namespace app\widgets;

use yii\base\Widget;
use yii\data\ActiveDataProvider;
use \app\models\forms\Search;

class BluesearchWidget extends Widget
{
     public $search;
    

    public function init()
    {
        parent::init();
        
    }

    public function run()
    {
        $dataProvider = 0;
        $model = new Search;
        $model->scenario = 'search';
        if ($model->load(\Yii::$app->request->post()) && $model->validate())
        {            
            $sql= $model->search();
            $dataProvider = new ActiveDataProvider([
                'query' => $sql,
                'pagination' => [
                    'pageSize' => 4,
                ],
                
            ]);
           
        }
        
        return $this->render('bluesearch/search', ['dataProvider' => $dataProvider,  'model' => $model]);
        
    }
}