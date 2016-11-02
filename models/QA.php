<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\User;
use app\models\Myfunctions;
use app\models\Review;
use app\models\ReviewComment;
use yii\data\Pagination;
use yii\helpers\HtmlPurifier;

//use app\models\Company;

/**
 * Question-ansver model
 */
class QA extends ActiveRecord {

    public $is_admin = true;

    public static function tableName() {
        return 'olit_qa';
    }

    /**
     *
     * @inheritdoc
     */
    public function rules() {
        $rules = parent::rules();
        return array_merge($rules, [
            [['id'], 'required', 'on' => ['addanswer']],
            [['id'], 'integer', 'on' => ['addanswer']],
            [['insurance_type'], 'required', 'message' => 'Вид страхования не должно быть пустым', 'on' => ['add']],
            [['insurance_type'], 'integer', 'on' => ['add']],
            [['question'], 'required', 'message' => 'Вопрос обязательное поле', 'on' => ['add', 'editbyadmin']],
            [['question'], 'string', 'min' => 3, 'max' => 20000,
                'message' => 'Должно быть строкой',
                'tooShort' => 'Не меньше 3х символов',
                'tooLong' => 'Не больше 20000 символов',
                'on' => ['add']],
            [['answer'], 'required', 'message' => 'Ответ обязательное поле', 'on' => ['addanswer']],
            [['answer'], 'string', 'min' => 3, 'max' => 20000,
                'message' => 'Должно быть строкой',
                'tooShort' => 'Не меньше 3х символов',
                'tooLong' => 'Не больше 20000 символов',
                'on' => ['addanswer']],
            [['answer'], 'filter', 'filter' => function ($value) {
            return Myfunctions::sqlHtmlEditorFilter($value);
        }, 'on' => ['addanswer', 'editbyadmin']],
            [['question'], 'filter', 'filter' => function ($value) {
            return Myfunctions::sqlHtmlEditorFilter($value);
        },
                'on' => ['add', 'editbyadmin']],
            [['section'], 'required', 'message' => 'Раздел обязательное поле', 'on' => ['add', 'editbyadmin']],
            [['section'], 'integer', 'on' => ['add', 'editbyadmin']],
            [['expert_id'], 'required', 'on' => ['add', 'editbyadmin']],
            [['expert_id'], 'integer', 'on' => ['add', 'editbyadmin']],
        ]);
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
     *
     * @inheritdoc
     */
    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'id',
            'question',
            'answer',
            'section',
            'insurance_type',
            'question_date',
            'answer_date',
            'expert_id',
            'user_id',
            'new_question',
            'user_name',
            'full_name'
        ]);
    }

    /**
     *
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        $scenarios['add'] = [
            'question',
            'section',
            'insurance_type',
            'expert_id',
                //'user_id'
        ];
        $scenarios['add'] = [
            'id',
            'insurance_type',
            'question'
                //'user_id'
        ];
        $scenarios['editbyadmin'] = [

            'answer',
            'question',
            'expert_id',
            'section'
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

            case 'add':
                $this->question =  $this->question;
                $this->section = (int) $this->section;
                $this->insurance_type = (int) $this->insurance_type;
                $this->expert_id = (int) $this->expert_id;
                $this->user_id = (int) $this->user_id;
                $this->new_question = (int) $this->new_question;
                break;
            case 'addanswer':
                $this->answer =  $this->answer;
                $this->new_question = (int) $this->new_question;
        }

        return true;
    }

    /**
     * Info about all QA sections
     * Получаем инфо о все разделаx Вопрос-Ответ
     * @author Kovalchuk Alexander
     * 
     * @params (param) различные параметры, в зависимости от которых устанавливаются условия поиска
     * 
     * @return array
     */
    public function getList() {

        $query = $this->find();

          
        if (isset($this->section)) {
            $query->where(['section' => $this->section]);
            $query->OrderBy(['id' => SORT_DESC]);
        }

        if (isset($this->expert_id)) {
            
            $query->where(['expert_id' => $this->expert_id]);
            $query->OrderBy(['id' => SORT_DESC]);
            $query->OrderBy(['new_question' => SORT_DESC]);
        }
        if ($this->is_admin == null) {
            $query->andWhere(['new_question' => 0]);
        }


        /*  else {
          $query ->orderBy(['id' => SORT_DESC]);
          }
         */

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => count($countQuery->all())]);
        $query->offset($pages->offset)->limit($pages->limit);
        $sql_response = $query->all();
        $result = ['pages' => $pages];
        $expert = new Expert();
        $user = new User();
        $section = new Qasection();
        if (count($sql_response) > 0) {
            foreach ($sql_response as $value) {
                $expert->id = $value['expert_id'];
                $section->id = $value['section'];
                $result['questions'][] = [

                    'id' => (int) $value['id'],
                    'question' =>  $value['question'],
                    'answer' =>  $value['answer'],
                    'insurance_type' => (int) $value['insurance_type'],
                    'question_date' => $value['question_date'],
                    'answer_date' => $value ['answer_date'],
                    'expert_id' => (int) $value['expert_id'],
                    'user_id' => (int) $value['user_id'],
                    'new_question' => (int) $value['new_question'],
                    'expert_name' => $expert->getDetail()['full_name'],
                    'expert_position' => $expert->getDetail()['position'],
                    'user_name' => User::findIdentity($value['user_id'])['full_name'],
                    'user_email' => User::findIdentity($value['user_id'])['email'],
                    'section' => (int) $value['section'],
                    'section_name' => $section->getOne()['title'],
                    'insurance_type_name' => \yii::$app->params['staticTypes'][$value['insurance_type']],
                ];
            }
        } else {
            $result['questions'] = [];
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
        foreach ($section_model as $key => $value) :
            $section[$key] =  $value;
        endforeach;
        //$section['question_date'] = 'sfd sfd 123 ';
        return $section;
    }

    /**
     * get question sum by section id
     * получить количество вопросов в секции
     * 
     * @author Kovalchuk Alexander
     * @date 06.10.2015
     * @param $this->section
     * 
     * @return array
     */
    public function getQuestionSum() {

        return $this->find()
                        ->where(['section' => $this->section])
                        ->count();
    }

    /**
     * get question sum by section id
     * получить количество вопросов в секции
     * 
     * @author Kovalchuk Alexander
     * @date 06.10.2015
     * @param $this->section
     * 
     * @return array
     */
    public function getAnsweredQuestionSum() {

        return $this->find()
                        ->where(['section' => $this->section])
                        ->andWhere(['new_question' => 0])
                        ->count();
    }

    /**
     * get question sum by section id
     * получить количество вопросов в секции
     * 
     * @author  Kovalchuk Alexander
     * @date    16.10.2015
     * @param   $this->section_id
     * 
     * @return array
     */
    public function getLastQuestion() {
       $model = $this->find()
                ->select('u.full_name as full_name,'
                        . ' olit_qa.id id,'
                        . ' question,'
                        . ' question_date')
                ->leftJoin('olit_users u', 'olit_qa.user_id = u.user_id')
                ->where(['section' => $this->section])
                ->andWhere(['new_question' => 0])
                ->OrderBy(['id' => SORT_DESC])
                ->one();

        return [
            'id' => $model['id'],
            'user_name' =>  $model['full_name'],
            'question' =>  $model ['question'],
            'question_date' => $model ['question_date']
        ];
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
     * добавляем ответ на вопрос
     * @author Kovalchuk Alexander
     * @date 10.11.2015
     * 
     * @id int $id идентификатор вопроса
     * @param sting $answer ответ
     * 
     * @return boolean
     */
    public function addanswer() {
        return $this->updateALL(['answer' =>  $this->answer,
                    'new_question' => 0,
                    'answer_date' => date('Y-m-d H:i:s')
                        ], 'id = :id', ['id' => (int) $this->id]);
    }

    /**
     * добавляем ответ на вопрос
     * @author Kovalchuk Alexander
     * @date 10.11.2015
     * 
     * @id int $id идентификатор вопроса
     * @param sting $answer ответ
     * 
     * @return boolean
     */
    public function editanswer() {
        return $this->updateALL(
                        ['answer' =>  $this->answer,
                          'answer_date' => date('Y-m-d H:i:s')
                        ], 'id = :id', ['id' => (int) $this->id]);
    }

    /**
     * редактируем вопрос (админка)
     * @author Kovalchuk Alexander
     * @date 11.11.2015
     * 
     * @param int $id идентификатор вопроса
     * @param sting $answer ответ
     * 
     * @return boolean
     */
    public function editOneQA() {
        return $this->updateALL(
                        ['answer' =>  $this->answer,
                    'question' =>  $this->question,
                    'answer_date' => date('Y-m-d H:i:s'),
                    'expert_id' => (int) $this->expert_id,
                    'new_question' => (int) $this->new_question,
                    'section' => (int) $this->section,
                        ], 'id = :id', ['id' => (int) $this->id]);
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
     * удаляет по ид секции, используется при удалении секции
     * @author Kovalchuk Alexander
     * @date 09.10.2015
     * 
     * @param int $this->section ид секции
     * 
     */
    public function remove_section() {

        return $this->deleteALL('section = :section', ['section' => (int) $this->section]);
    }

}
