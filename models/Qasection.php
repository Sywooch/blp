<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\User;
use app\models\Review;
use app\models\ReviewComment;
use app\models\Myfunctions;
use yii\data\Pagination;
use yii\helpers\HtmlPurifier;

//use app\models\Company;

/**
 * Question-ansver sections model
 */
class Qasection extends ActiveRecord {
    
    public $is_admin = null;

    public static function tableName() {
        return 'olit_qa_section';
    }

    /**
     *
     * @inheritdoc
     */
    public function rules() {
        $rules = parent::rules();
        return array_merge($rules, [
            //[['id'], 'required', 'on' => ['edit']],
            [['id'], 'integer', 'on' => ['edit']],
            [['title'], 'required', 'message' => 'Название раздела обязательное поле', 'on' => ['edit', 'add']],
            [['title'], 'string', 'min' => 3, 'max' => 150,
                'message' => 'Должно быть строкой',
                'tooShort' => 'Не меньше 3х символов',
                'tooLong' => 'Не больше 150 символов',
                'on' => ['add', 'edit']],
            [['description'], 'required', 'message' => 'Описание раздела обязательное поле', 'on' => ['edit', 'add']],
            [['description'], 'string', 'min' => 3, 'max' => 500,
                'message' => 'Должно быть строкой',
                'tooShort' => 'Не меньше 3х символов',
                'tooLong' => 'Не больше 500 символов',
                'on' => ['add', 'edit']],
            [['expert_id'], 'required', 'message' => 'Обязательно выберите эксперта', 'on' => ['add', 'edit']],
            [['expert_id'], 'integer', 'on' => ['add', 'edit']],
            [['show_section'], 'required', 'message' => 'Показывать поле или нет? Выберите', 'on' => ['add', 'edit']],
            [['show_section'], 'integer', 'on' => ['add', 'edit']],
            [['insurance_types'], 'required', 'message' => 'Обязательно укажите хотя бы один тип полиса', 'on' => ['add', 'edit']],
            [['insurance_types'], 'validateInsuranceType', 'on' => ['add', 'edit']],
            [['title', 'expert_id', 'show_section'], 'filter',
                'filter' => function($value) {
            return Myfunctions::simpleFilter($value);
        },
                'on' => ['edit', 'add']],
                [['description'], 'filter',
                'filter' => function($value) {
            return Myfunctions::sqlHtmlEditorFilter($value);
        },
                'on' => ['edit', 'add']],
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
            'title',
            'description',
            'expert_id',
            'show_section',
            'sort_by_this_flag',
            'insurance_types'
        ]);
    }

    /**
     *
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        $scenarios['edit'] = 
            ['id',
            'title',
            'description',
            'expert_id',
            'show_section',
            'insurance_types'
        ];

        $scenarios['add'] = [
            'title',
            'description',
            'expert_id',
            'show_section',
            'insurance_types'
        ];

        return $scenarios;
    }

    /**
     * @author Kovalchuk Alexander <alexander.kovalchuk307@gmail.com>
     * @date 26.10.15
     * @param type $insert
     * @return bool
     */
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        switch ($this->scenario) {
            case 'edit':
                
            case 'add':
                $this->title = HtmlPurifier::process(htmlspecialchars_decode($this->title));
                $this->description = HtmlPurifier::process(htmlspecialchars_decode($this->description));
                $this->expert_id = (int) $this->expert_id;
                $this->show_section = (int) $this->show_section;
                // $this->sort_by_this_flag =  HtmlPurifier::process(htmlspecialchars_decode($this->position));
                $this->insurance_types = serialize($this->insurance_types);
                break;
        }
        return true;
    }

    /**
     * @author Kovalchuk Alexander
     * @date 27.10.
     * @param type $id
     * @return type
     */
    public static function getExpertNameBySectionId($id) {
        $model = new Expert;
        $model->id = self::findOne($id)->expert_id;
        return $model->getDetail()['full_name'];
    }

    public static function getExpertDescrBySectionId($id) {
        $model = new Expert;
        $model->id = self::findOne($id)->expert_id;
        return $model->getDetail()['position'];
    }

    public function getSortTag() {
        return $this->find()
                        ->OrderBy(['sort_by_this_flag' => SORT_DESC])
                        ->one()['sort_by_this_flag'] + 1;
    }

    /**
     * Info about all QA sections
     * Получаем инфо о все разделаx Вопрос-Ответ
     * @author Kovalchuk Alexander
     * 
     * 
     * @return array
     */
    public function getList() {

        $query = $this->find();
        if ($this -> is_admin == null) {
            $query->where(['show_section' => 1]);
        }
        $query->OrderBy(['sort_by_this_flag' => SORT_ASC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => count($countQuery->all())]);
        $query->offset($pages->offset)->limit($pages->limit);
        $sql_response = $query->all();
        $result = ['pages' => $pages];
        $result['sections'] = [];
        $expert = new Expert;
        $QA = new QA();

        foreach (is_null($sql_response) ? [] : $sql_response as $new) {
            $expert->id = $new['expert_id'];
            $QA->section = $new['id'];
            $result['sections'][] = [
                'id' => (int) $new['id'],
                'title' =>  $new['title'],
                'expert_id' =>  $new['expert_id'],
                'full_name' => $expert->getDetail()['full_name'],
                'photo' => $expert->getDetail()['photo'],
                'position' => $expert->getDetail()['position'],
                'company_name' => $expert->getDetail()['company_name'],
                'reference' => $expert->getDetail()['reference'],
                'site_name' => $expert->getDetail()['site_name'],
                'show_section' =>  $new['show_section'],
                'sort_by_this_flag' =>  $new['sort_by_this_flag'],
                'insurance_types' =>  $new['insurance_types'],
                'questions_sum' => $QA->getAnsweredQuestionSum(),
                'all_questions_sum' => $QA->getQuestionSum(),
                'last_question' => $QA->getLastQuestion()
            ];
        }
        return $result;
    }

    /**
     * get information about one section
     * получить информацию об одном разделе
     * 
     * @author Kovalchuk Alexander
     * @date 30.10.2015
     * 
     * @return array
     */
    public function getOne() {
        $section_model = $this->find()->where(['id' => $this->id])->one();
        $section = [];
        if (isset($section_model)) {
            foreach ($section_model as $key => $value) :
                $section[$key] =  $value;
            endforeach;
        }
                $expert = new Expert();
                $expert -> id = $section['expert_id'];
                $section['full_name'] = $expert->getDetail()['full_name'];
        return $section;
    }

    /**
     * сохраняет значения полей
     * @author Kovalchuk Alexander
     * @date 27.10.2015
     * 
     * @params (type) значения полей
     * @return boolean
     */
    public function add() {
        return $this->save();
    }

    /**
     * сохраняет значения полей
     * @author Kovalchuk Alexander
     * @date 27.10.2015
     * 
     * @params (type) значения полей
     * @return boolean
     */
    public function updatesection() {
        return $this->updateALL(
                        ['title' =>  $this->title,
                    'description' =>  $this->description,
                    'expert_id' => $this->expert_id,
                    'show_section' => $this->show_section,
                    'insurance_types' => $this->insurance_types
                        ], 'id = :id', ['id' => $this->id]);
    }

    /**
     * удаляет по ид
     * @author Kovalchuk Alexander
     * @date 27.10.2015
     * 
     * @param int $id ид записи
     * 
     */
    public function remove() {

        return $this->deleteALL('id = :id', ['id' => (int) $this->id]);
    }

    /**
     * меняет приоритет показа секции
     * @author Kovalchuk Alexander
     * @date 27.10.2015
     * 
     * @param int $id ид записи
     * 
     */
    public function swapsection($first_id, $second_id) {
        $first_model = self::findOne((int) $first_id);
        $first_flag = $first_model->sort_by_this_flag;
        $second_model = self::findOne((int) $second_id);
        $second_flag = $second_model->sort_by_this_flag;
        $first_model->sort_by_this_flag = $second_flag;
        $second_model->sort_by_this_flag = $first_flag;
        if ($first_model->save() && $second_model->save())
            return true;
    }

    /**
     * валидируем типы полиса
     * @author Kovalchuk Alexander
     * @date 10.12.2015
     * 
     * @param type $attribute
     */
    public function validateInsuranceType($attribute) {
        $error = false;
        
        foreach ($this->$attribute as $value) {
            if (!in_array( $value, array_keys(\yii::$app->params['staticTypes']))) {
                $error = true;
                break;
            }
        }
        if ($error)
            $this->addError($attribute, "Такого типа полиса не существует!");
    }

}
