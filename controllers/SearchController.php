<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\data\SqlDataProvider;
use app\models\forms\MainSearch;

/**
 * @author Maxim Shablinskiy maxshabl@yandex.ru
 * @date 04.08.2016
 * Поиск по сайту
 */
class SearchController extends Controller
{
    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * Главный поиск
     */
    public function actionSearch() 
    {       
     
        /*$str = Yii::$app->request->get('req');
       
        $model = new MainSearch();
        if ($model->load(\Yii::$app->request->get()) && $model->validate())
            $str = $model->search;
      

        $sql= $model->search();
        $count = $model->search($str);
        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'params' => ['stem_str' => $str],
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);        
        
        return $this->render('search', ['dataProvider' => $dataProvider,  'model' => $model]);*/
        return $this->render('search');
    }
    
}

