<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\News;
use app\controllers\SiteController;
use yii\helpers\HtmlPurifier;

/**
 * Модель статических страниц
 * @author Sergey Kulikov <syrex92@gmail.com>
 */
class StaticPage extends ActiveRecord {
    
    /**
     * 
     * @inheritdoc
     */
    public static function tableName() {
        return 'olit_static';
    }
    
    /**
     * 
     * @inheritdoc
     */
    public function rules() {
        $rules = parent::rules();
        return array_merge($rules, []);
    }
    
    /**
     * 
     * @inheritdoc
     */
    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'name',
            'descr',
            'template',
            'type',
            'views',
        ]);
    }
    
    /**
     * 
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        return $scenarios;
    }

    /**
     * Получает данные статической страницы и выдает их в виде массива
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     * @param string $this->name Имя страницы, которую необходимо получить
     * @return array
     */
    public function getPage() {

        $news = new News;
        $static_types = [
            'ОСАГО',
            'Каско',
            'Выезжающие за рубеж',
            'ДМС',
            'Несчастный случай',
            'Другое',
            'Зеленая карта',
            'Квартира',
            'Дом',
            'Ответственность граждан',
            'Путешествующие по РФ',
            'Багаж',
            'OMC',
            'Страхование жизни',
            'Ипотечное страхование',
            'Титульное страхование'
        ];
        $sql_response = $this->findOne(['name' => $this->name]);
        if(is_null($sql_response))
            return false;
        $pages = [];
        if($sql_response['type'] != 0)
        {
            $pages_response = $this->findAll(['type' => $sql_response['type']]);
            foreach ($pages_response as $page) {
                array_push($pages, [
                    'name' => $page['name'],
                    'descr' =>  $page['descr'],
                    'current' => $page['name'] == $sql_response['name'],
                    'type' => $page['type']
                ]);
            }
        }

        /*$content = preg_replace("#(</?\w+)(?:\s(?:[^<>/]|/[^<>])*)?(/?>)#ui", '$1$2', $sql_response['template']);*/
        //echo $sql_response['template'];
        
        $clearHtml = str_replace('\\', '', $sql_response['template']);
        //echo $clearHtml;
        
        $content = preg_replace('~style="[^"]*"~i', '', $clearHtml);
        //echo $content;
        //die;

        /*$content = HtmlPurifier::process($sql_response['template'], function ($config) {
          $config->set('AutoFormat.AutoParagraph', true);
        });*/
        //$content = $sql_response['template'];

        return [
            'mainimage' =>  $sql_response['mainimage'],
            'name' =>  $sql_response['name'],
            'descr' =>  $sql_response['descr'],
            'template' => $content,
            'description' =>  $sql_response['metadescr'],
            'keywords' =>  $sql_response['metakeys'],
            'type' => ($sql_response['type'] == 0) ? '' : $static_types[$sql_response['type'] - 1],
            'pages' => $pages,
            'date' => Yii::$app->formatter->asDate($sql_response['date'], 'dd.MM.yyyy'),
            'news' => (new News)->getListForStatic($sql_response['type']),
            'views' => $sql_response['views']
        ];
    }
    
    /**
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 20.10.15
     * @param $this->name Имя страницы
     */
    public function addViewCounter()
    {
        $page = $this->findOne(['name' => $this->name]);
        if(is_null($page))
            return;
        $page->views++;
        $page->save();
    }

}
