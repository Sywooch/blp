<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Review;
use app\models\Company;
use app\models\News;
use app\models\NewComment;
use app\models\Comment;
use app\widgets\CountWidget;
use yii\captcha\CaptchaAction;
/**
 * Контроллер главной страницы
 */
class SiteController extends Controller {
    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * 
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ],
        ];
    }
    
    public function actionError() {

        $exception = Yii::$app->errorHandler->exception;
        $statusCode = $exception->statusCode;
        if ($exception !== null and $statusCode == '404') {
            return $this->render('/site/404');
        }
        elseif ($exception !== null and $statusCode == '403') {
            return $this->render('/site/403');
        }
        else {
            return $this->render('/site/500');
        }
        
    }

    public function Convert() {
        $comments = Comment::find()->all();
        $converted = 0;
        foreach ($comments as $comment) {
            $converted++;
            $c_text = $comment->text ;
            echo "------=-= {$converted} -=-=----\n";
            var_dump($c_text, $comment->text);
            echo "------=-=-=-=----\n";
            $comment->text = $c_text;
            $comment->save();
            
        }
        echo $converted;
        die();
    }

    public function Import() {
//        $sql = "insert into 
//            `olit_comments_2` (`entity_id`,`entity_type`,`user_id`,`author_name`,`text`,`created_date`) 
//        SELECT 
//            `olit_insurance_reviews`.`parent_id` as entity_id,
//            0 as entity_type,
//            `olit_insurance_reviews`.`user_id` as user_id,
//            `olit_insurance_reviews`.`name` as author_name,
//            `olit_insurance_reviews`.`comment` as text,
//            `olit_insurance_reviews`.`date_add` as created_date
//
//        FROM 
//            `olit_insurance_reviews` 
//
//        where 
//            `olit_insurance_reviews`.`parent_id` <> 0
//            limit 1
//";
//
//        $sql2 = "insert into 
//            `olit_comments_2` (`entity_id`,`entity_type`,`user_id`,`author_name`,`text`,`created_date`) 
//SELECT 
//            `olit_insurance_reviews_comment`.`review_id` as entity_id,
//            0 as entity_type,
//            `olit_insurance_reviews_comment`.`author_id` as user_id,
//            `olit_insurance_reviews_comment`.`name` as author_name,
//            `olit_insurance_reviews_comment`.`comment` as text,
//            `olit_insurance_reviews_comment`.`date` as created_date
//
//        FROM 
//            `olit_insurance_reviews_comment` 
//
//        where 
//            `olit_insurance_reviews_comment`.`review_id` <> 0
//            ";
//
//
//        $sql = "SELECT * 
//            FROM  `olit_insurance_reviews` 
//            RIGHT JOIN olit_comments_2 ON entity_id = review_id
//            WHERE review_id IS NULL 
//            ";
    }

    /**
     * @author Sergey Kulikov
     * Выводит главную страницу сайта
     * 
     * @param string/(get) GET параметр
     * 
     * 
     * @return string
     */
    public function actionIndex() {
        $login_error = false;
       
        $meta_tags = \yii::$app->params['defaultTags'];

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $meta_tags['description'],
                ], "description");

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $meta_tags['keywords'],
                ], "keywords");

        $review = new Review;
        //$company = new Company;
        $news = new News;
        //$newComment = new NewComment;

        $params = [
            'login_error' => $login_error,
            'title' => $meta_tags['title'],
            'review' => $review->getReviews(15)->all(),
            'news' => [
                [
                    'name' => 'Статьи',
                    'code' => 'articles',
                    'news' => $news->getLastNews('index', 16, 'main')
                ],
                
            ],
        ];
        return $this->render("index", $params);
        
    }

    /**
     * @author Kovalchuk Alexander
     * @date 12.10.2015
     * 
     * Выводит страницу RSS
     * @url <адрес.сайта>/rss.xml
     * 
     * @return type xml
     */
    public function actionRss() {
        //$this->layout = 'rss';
        //set up some dummy values to be rendered
        //set content type xml in response
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');
        $model = new News();
        return $this->renderPartial('rss', ['news' => $model->getRssNews('index', 10)]);
    }
    
    public function actionCount()
    {
       // if((Yii::$app->request->post('counter') == true)):
            CountWidget::widget(["mode" => "count","namecounter" => "soglasie"]);
            return true;
       // endif;
    }
    
    
}
