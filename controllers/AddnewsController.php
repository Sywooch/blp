<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\News;
use yii\helpers\HtmlPurifier;

/**
 * Контроллер раздела компании
 */
class AddnewsController extends Controller
{
    /**
     * Действие добавления отзыва
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @return string
     */
    public function actionAdd()
    {
        if(!yii::$app->request->isPost)
            $this->redirect ('javascript://history.go(-1)');
        if(yii::$app->user->isGuest)
            $this->redirect ('/');
        $news = new News;
        $news->title = Yii::$app->request->post('title');
        $news->category = Yii::$app->request->post('category');
        $news->short_story = Yii::$app->request->post('short_story');
        $news->full_story = Yii::$app->request->post('full_story');
        $news->image = Yii::$app->request->post('xfield')['image-news'];
        $news->tags = Yii::$app->request->post('tags');
        $news->alt_name = Yii::$app->request->post('title');
        $news->date = date("Y-m-d H:i:s");
        $news->scenario = 'add_post';
        $news->AddPost();
        $this->redirect('/?do=cabinet&new=sent');
    }
}