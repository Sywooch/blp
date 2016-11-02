<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\StaticPage;
use app\models\StaticFile;

/**
 * Контроллер статических страниц
 */
class StaticController extends Controller
{
    /**
     * @autor Sergey Kulikov
     * @date 14.10.2015
     * 
     * Выводит статические страницы из БД
     * 
     * @param (get) page GET параметр статической страницы
     * 
     * @return html
     */
    public function actionIndex()
    {
        $model = new StaticPage;
        $model->name = Yii::$app->request->get('page');
        $st_file = new StaticFile;
        $page = $model->getPage();
        
        if($page == false)
            return $this->redirect ('/404');
        
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' =>  $page['description'],
                ], "description");

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $page['keywords'],
                ], "keywords");
        
        $file = new StaticFile;
        $regexp = "/\\[attachment=(.*):(.*)\\]/";
 //       print_r($page['name']);
  //      die();
        $result = $this->render('index', $page);
        preg_match_all($regexp, $result, $matches);
        for($i=0;$i<count($matches[0]);$i++)
        {
            $st_file->id = $matches[1][$i];
            $st_file->name = $matches[2][$i];
            $res_str = $st_file->getHref();
            $result = str_replace($matches[0][$i], $res_str, $result);
        }
        $model->addViewCounter();
        return $result;
    }
}