<?php

namespace app\controllers;
/**
 * Created by PhpStorm.
 * User: user-204-008
 * Date: 18.05.16
 * Time: 12:30
 */
use Yii;
use yii\web\Controller;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\News;
use app\models\OlitCategory;
use app\models\StaticPage;
use app\models\Review;
use app\models\User;
use app\models\Company;
use app\models\Branch;
use app\models\Address;

class SitemapController extends Controller
{


    /**
     * Выводим xml-страницу с разделением по разделам
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');
        return $this->renderPartial('index', array(
            'host' => Yii::$app->request->hostInfo,
        ));


    }

    /**
     * Выводим статические страницы в том числе и главную
     * @return string
     */
    public function actionStatic()
    {
        $urls = array();
        //Новости (категории)
        $news = StaticPage::find()
            ->select('name')
            ->where(['allow_count' => 1])
            ->all();

        foreach ($news as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl([$new->name.'.html']), 'daily');
        }


        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');
        return $this->renderPartial('static', array(
            'host' => Yii::$app->request->hostInfo,
            'urls' => $urls,
        ));
       
    }


    /**
     * Выводим новости, категории новостей, страницы с пагенацией
     * @return string
     */
    public function actionNews(){
        $urls = array();
        //Страницы категорий
        $news = OlitCategory::find()
            ->select('id, alt_name')
            ->where(['parentid' => 10])
            ->all();
        foreach ($news as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl(['/news/' . $new->alt_name]), 'daily');
        }

        //Все новости по категориям
        $allNews = (new Query)
            ->select(['olit_post.id AS postid',
                'olit_post.alt_name AS altname',
                'olit_post.category AS category_id',
                'olit_post.allow_main AS allow_main',
                'olit_post.allow_comm AS allow_comm',
                'olit_category.alt_name AS name',
            ])
            ->from('olit_post')
            ->leftJoin('olit_category', 'olit_post.category = olit_category.id')
            ->andWhere(['olit_post.allow_main' => 1, 'olit_post.allow_comm' => 1])
            ->all();

        foreach ($allNews as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl(['/news/' . $new['name'] . '/' . $new['postid'] . '-' . $new['altname'] . '.html']), 'daily');
        }



        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');
        return $this->renderPartial('news', array(
            'host' => Yii::$app->request->hostInfo,
            'urls' => $urls,
        ));

    }

    /**
     * Выводим все отзывы
     * @return string
     */
    public function actionReview()
    {
        $urls = array();
        //Выводим страницы каждого отзыва
        $reviews = Review::find()
            ->select('review_id')
            ->all();
        foreach ($reviews as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl(['/reviews/' . $new['review_id']]), 'daily');
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');
        return $this->renderPartial('review', array(
            'host' => Yii::$app->request->hostInfo,
            'urls' => $urls,
        ));
    }
    

    /**
     * Выводим все отзывы по отдельным компаниям
     * @return string
     */
    public function actionCompanyReview(){
        $urls = array();
        //Выводим все компании
        $company = Company::find()
            ->select('user_id')
            ->all();
        foreach ($company as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl(['/companies/' . $new['user_id']]), 'daily');
        }
        //rules
        foreach ($company as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl(['/companies/' . $new['user_id'] . '/rules']), 'daily');
        }
        //reviews
        foreach ($company as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl(['/companies/' . $new['user_id'] . '/reviews']), 'daily');
        }
        //photos
        foreach ($company as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl(['/map/' . $new['user_id']]), 'daily');
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');
        return $this->renderPartial('companyreview', array(
            'host' => Yii::$app->request->hostInfo,
            'urls' => $urls,
        ));    
    }
    
    /**
     * Выводим информацию по региональным филиалам
     * @return string
     */
    public function actionRegion(){
        $urls = array();
        //Выводим все филиалы
        $branches = Branch::find()
            ->select('id , active')
            ->where(['active' => 1])
            ->all();
        foreach ($branches as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl(['/branch/' . $new['id']]), 'daily');
        }
        //Выводим филиалы на карте
        foreach ($branches as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl(['/map/0/' . $new['id']]), 'daily');
        }
        //Выводим регионы
        $regions = (new Query)
            ->select('country_id')
            ->from('oc_country')
            ->all();
        foreach ($regions as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl(['/region/' . $new['country_id']]), 'daily');
        }
        //Списки филиалов по городам
        $city = Address::find()
            ->select('zone_id')
            ->all();
        foreach ($city as $new) {
            $urls[] = array(Yii::$app->urlManager->createUrl(['/city/' . $new['zone_id']]), 'daily');
        }
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');
        return $this->renderPartial('branch', array(
            'host' => Yii::$app->request->hostInfo,
            'urls' => $urls,
        ));
    }
    
}
