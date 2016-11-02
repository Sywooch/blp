<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\User;
use app\models\Review;
use app\models\ReviewComment;
use yii\data\Pagination;
use yii\helpers\HtmlPurifier;

//use app\models\Company;

/**
 * Expert model
 */
class Expert extends ActiveRecord {

    public static function tableName() {
        return 'olit_expert_users';
    }

    /**
     *
     * @inheritdoc
     */
    public function rules() {
        $rules = parent::rules();
        return array_merge($rules, [
            [['id'], 'required', 'on' => ['edit']],
            [['id'], 'integer', 'on' => ['edit', 'add']],
            [['full_name'], 'required', 'message' => 'ФИО обязательное поле', 'on' => ['edit', 'add']],
            [['full_name'], 'string', 'min' => 3, 'max' => 40,
                'message' => 'Должно быть строкой',
                'tooShort' => 'Не меньше 3х символов',
                'tooLong' => 'Не больше 40-ка символов',
                'on' => ['edit', 'add']],
            [['company_name'], 'required', 'message' => 'Компания обязательное поле', 'on' => ['edit', 'add']],
            [['site_name'], 'required', 'message' => 'Сайт обязательное поле', 'on' => ['edit', 'add']],
            //[['site_name'], 'url', 'message' => 'Неверный формат url', 'on' => ['edit', 'add']],
            [['position'], 'required', 'message' => 'Должность обязательное поле', 'on' => ['edit', 'add']],
           /* [['reference'], 'required', 'message' => 'Справка об эксперте обязательное поле', 'on' => ['edit', 'add']],
            [['reference'], 'string', 'max' => 500,
                'tooLong' => 'Не больше 500 символов',
                'on' => ['edit', 'add']], */
            [['active_expert'], 'required', 'on' => 'add'],
            [['company_name', 'site_name', 'position', 'site_name'], 'string', 'min' => 3, 'max' => 50,
                'message' => 'Должно быть строкой',
                'tooShort' => 'Не меньше 3х символов',
                'tooLong' => 'Не больше 40-ка символов',
                'on' => ['edit', 'add']],
            [['full_name', 'company_name', 'site_name', 'position', 'reference', 'notification_email'],'filter', 'filter' => function ($value) {
            return Myfunctions::sqlHtmlFilter($value);
        }, 'on' => ['edit', 'add']],
            [['notification_email'], 'required', 'message' => 'Почта обязательное поле', 'on' => ['edit', 'add']], 
            [['notification_email'], 'email', 'message' => 'Неверный формат почты', 'on' => ['edit', 'add']],
        ]);
    }

    /**
     *
     * @inheritdoc
     */
    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'id',
            'full_name',
            'company_name',
            'site_name',
            'position',
            'reference',
            'active_expert',
            'photo',
            'notification_email'
            
            
        ]);
    }

    /**
     *
     * attributes, used on update
     * аттрибути, используемые при редактировании(апдейте)
     */
    public function attributesUpdate() {
        return [
            'full_name',
            'company_name',
            'site_name',
            'position',
            'reference',
            'notification_email'
        ];
    }

    /**
     *
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        $scenarios['edit'] = ['id',
            'full_name',
            'company_name',
            'site_name',
            'position',
            'reference',
            'notification_email'
                //'active_expert'
        ];

        $scenarios['add'] = ['id',
            'full_name',
            'notification_email',
            'company_name',
            'site_name',
            'position',
            'reference',
            'active_expert',
            'notification_email'
        ];
       /* $scenarios['add'] = ['id',
            'password'
        ];*/
        
        return $scenarios;
    }

    /**
     * befor save
     * перед сохранением
     * 
     * @author Kovalchuk Alexander <alexander.kovalchuk307@gmail.com>
     * @date 26.10.15
     * @param type $insert
     * @return bool
     */
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        switch ($this->scenario) {
            case 'edit':
                $this->full_name = HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->full_name)));
                $this->company_name =  HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->company_name)));
                $this->site_name = HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->site_name)));
                $this->position = HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->position)));
                $this->reference = HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->reference)));
                $this->notification_email = HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->notification_email)));
                
                break;
            case 'add':
                $this->full_name = HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->full_name)));
                $this->company_name = HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->company_name)));
                $this->site_name = HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->site_name)));
                $this->position = HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->position)));
                $this->reference = HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->reference)));
                $this->notification_email = HtmlPurifier::process(htmlspecialchars_decode(strip_tags($this->notification_email)));
                break;
        }
        return true;
    }

    /**
     * Detail info about expert
     * Детальная информация об экперте
     * 
     * @author Kovalchuk Alexander
     * @date 27.10.2015 
     * @param int $user_id идентификатор пользователя
     * 
     * @return array
     */
    public function getDetail() {
        $expert = $this->find()->andWhere(['id' => $this->id])->one();

        return [
            'id' => (int) $expert['id'],
            'photo' => $expert['photo'] != '' ? \yii::$app->params['photosParam']['imgUrl']. $expert['photo'] : '/images/default_profile_image.png',
            'full_name'     =>  $expert['full_name'],
            'company_name'  =>  $expert['company_name'],
            'site_name'     =>  $expert['site_name'],
            'position'      =>  $expert['position'],
            'reference'     =>  $expert['reference'],
            'active_expert' =>  $expert['active_expert'],
            'notification_email' =>  $expert['notification_email'],
        ];
    }

    /**
     * Info about few experts(use paginator)
     * Получаем инфо о нескольких экспертах(испоьзуем пагинатор)
     * 
     * @author Kovalchuk Alexander
     * @param int $user_id идентификатор пользователя
     * 
     * @return array
     */
    public function getList() {

        $query = $this->find()->OrderBy(['id' => SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => count($countQuery->all())]);
        $query->offset($pages->offset)->limit($pages->limit);
        $sql_response = $query->all();
        $result = ['pages' => $pages];
        $result['experts'] = [];
        $user = new User;
        foreach (is_null($sql_response) ? [] : $sql_response as $new) {

            $result['experts'][] = [
                'id' => (int) $new['id'],
                'email' =>  $new['notification_email'],
                'full_name' =>  $new['full_name'],
                'company_name' =>  $new['company_name'],
                'site_name' =>  $new['site_name'],
                'position' =>  $new['position'],
                'reference' =>  $new['reference'],
                'active_expert' => (int) $new['active_expert'],
                'photo' => $new['photo'] != '' ? \yii::$app->params['photosParam']['imgUrl']. $new['photo'] : '/images/default_profile_image.png',
                
                    ];
        }
        return $result;
    }

    /**
     * фильтрует значение поля
     * @author Kovalchuk Alexander
     * @date 14.10.2015
     * 
     * @param string значение поля
     * @return string отфильтрованое значение 
     */
    public function simpleFilter($attribute) {
        return addslashes(trim(strip_tags($this->$attribute)));
    }

    /**
     * сохраняет значения полей
     * @author Kovalchuk Alexander
     * @date 26.10.2015
     * 
     * @params (type) значения полей
     * @return boolean
     */
    public function edit() {
        return $this->save();
    }

    /**
     * удаляет по ид
     * @author Kovalchuk Alexander
     * @date 27.10.2015
     * 
     * @param int $id ид записи
     * 
     */
    public function remove($id) {
        return $this->deleteALL('id = :id', ['id' => (int) $id]);
    }

    public function updatephoto() {
        $old_path  = self::findOne(['id' => $this -> id])['photo'];
        @chmod (\yii::$app->params['photosParam']['expertDir'].$old_path, 0777);
        @unlink(\yii::$app->params['photosParam']['expertDir'].$old_path); 
        return $this->updateALL(
                        ['photo' => $this->photo], 'id = :id', ['id' => (int) $this->id]);
    }
    
    /**
     * @author Kovalchuk Alexander <alexander.kovalchuk307@gmail.com>
     * @date 12.01.2016
     * 
     * @param int $id ид 
     */
    public function hasQuestions() {
        $has_questions = QA::findOne(['expert_id' => $this->id]);
        if (is_int($has_questions['id']))
            return true;
        if ($has_questions==null)
            return false;
        
    }

}
