<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\User;
use app\models\Review;
use app\models\Company;
use app\models\ReviewComment;
use yii\data\Pagination;
use yii\helpers\HtmlPurifier;
use yii\data\Sort;

/**
 * филиал компании
 */
class Branch extends ActiveRecord {

    public static function tableName() {
        return 'olit_company_branch';
    }

    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'id',
            'company_id',
            'branch',
            'functions',
            'region',
            'city',
            'address',
            'works_hours',
            'phones',
            'email',
            'coordinates',
            'company_search',
            'active'
        ]);
    }

    public function rules() {
        $rules = parent::rules();
        return array_merge($rules, [
            [['company_id'], 'required', 'message' => 'Компания обязательный параметр', 'on' => ['add']],
            [['branch'], 'required', 'message' => 'Филиал обязательное поле', 'on' => 'add'],
            [['functions'], 'required', 'message' => 'Функции компании обязательное поле', 'on' => 'add'],
            [['region'], 'required', 'message' => 'Регион обязательное поле', 'on' => ['add']],
            [['city'], 'required', 'message' => 'Город обязательное поле', 'on' => ['add']],
            [['address'], 'required', 'message' => 'Адресс обязательное поле', 'on' => 'add'],
            [['email'], 'email', 'message' => 'Неверный формат почты', 'on' => 'add'],
            [['region', 'city', 'company_id'], 'filter', 'filter' => function ($value) {
            return addslashes(trim(strip_tags($value)));
        }, 'on' => 'search'],
            [['region',
            'city',
            'address',
            'company_id',
            'branch',
            'functions',
            'work_hours',
            'phones',
            'email'], 'filter',
                'filter' => function ($value) {
            return addslashes(trim(strip_tags($value)));
        }, 'on' => 'search']]);
    }

    public function simpleFilter($attribute) {
        return addslashes(trim(strip_tags($this->$attribute)));
    }

    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios ['add'] = [
            'region',
            'city',
            'address',
            'company_id',
            'branch',
            'functions',
            'work_hours',
            'phones',
            'email'
                ]
        // 'coordinates'
        ;
        $scenarios ['search'] = [
            'region',
            'city'
                ]
        // 'company_id'
        ;
        $scenarios ['total_search'] = []
        // 'region',
        // 'city',
        // 'company_id'
        ;

        return $scenarios;
    }

    /**
     *
     * @author Kovalchuk Alexander <alexander.kovalchuk307@gmail.com>
     * @date 20.11.2015
     * @param type $insert        	
     */
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        switch ($this->scenario) {
            case 'add' :

                $this->city = HtmlPurifier::process(htmlspecialchars_decode($this->city));
                $this->address =  HtmlPurifier::process(htmlspecialchars_decode($this->address));
                $this->branch =HtmlPurifier::process(htmlspecialchars_decode($this->branch));
                $this->work_hours = HtmlPurifier::process(htmlspecialchars_decode($this->work_hours));
                $this->email = HtmlPurifier::process(htmlspecialchars_decode($this->email));
                $this->phones = HtmlPurifier::process(htmlspecialchars_decode($this->phones));
                $this->functions = HtmlPurifier::process(htmlspecialchars_decode($this->functions));
                $this->region =HtmlPurifier::process(htmlspecialchars_decode($this->region));
                break;
        }
        return true;
    }
    
    /**
     * Выборка всех филиалов в регионе
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 05.10.2016
     * @param string $name имя региона
     * @return object Объект запроса
     * 
     */
    public function getFilialsByRegion($name) {

        $sort = new Sort([
            'attributes' => [
                'company_name' => [
                    'label'=>'<span class="companiesList_head_item_after"></span>',
                    'default' => SORT_DESC,
                ],
                
                'email' => [
                    'label' => '<span class="companiesList_head_item_after"></span>',

                ],
            ],
        ]);
        $queryRegion = new Query();
        $query = new Query();
        $query->select(['functions',
                        'region',
                        'city',
                        'branch',
                        'olit_company_branch.address',
                        'work_hours',
                        'phones',
                        'email',
                        'company_name',
                        'id'])
                ->from('olit_company_branch')
                ->innerJoin('olit_insurance_users', 'olit_company_branch.company_id = olit_insurance_users.user_id')
                ->where(['like', 'city', '%'.$name.'%', false])
               // ->where('city LIKE :city', [':city'=>'%'.$name.'%'])
                ->andfilterWhere(['LIKE', 'company_name', \Yii::$app->request->get('comp_name')]);
        return ['result' => $query->orderBy($sort->orders)->all(), 'sort' => $sort];
    }

        /**
     * find array with branch description and branch coordinates
     * находим массив филиалов с описанием и координатами
     *
     * @author Kovalchuk Alexander
     * @date
     * 
     * @param $company_id company  id
     * @param $region region        	
     * @param $city city        	
     *
     * @return array
     */
    public function getCoordsArray() {


        $query = new Query ();

        $query->addSelect([
                    'users.foto foto',
                    'company.user_id company_id',
                    'company.company_name company_name',
                    'olit_company_branch.id id',
                    'olit_company_branch.branch branch',
                    'olit_company_branch.functions functions',
                    'olit_company_branch.region region',
                    'olit_company_branch.city city',
                    'olit_company_branch.address address',
                    'olit_company_branch.work_hours work_hours',
                    'olit_company_branch.phones phones',
                    'olit_company_branch.email email',
                    'olit_company_branch.active active',
                    "X(olit_company_branch.coordinates) ax",
                    "Y(olit_company_branch.coordinates) ay"
                ])
                ->from(self::tableName())
                ->leftJoin('olit_insurance_users company', 'olit_company_branch.company_id = company.user_id')
                ->leftJoin('olit_users users', 'olit_company_branch.company_id = users.user_id');

        if (isset($this->company_search) && is_array($this->company_search)) {
            $query->andwhere([
                'in', 'olit_company_branch.company_id', $this->company_search
            ]);
        }

        if (isset($this->region)) {
            if (count(explode(" ", $this->region)) > 1) {
                $region = trim(explode(" ", $this->region) [0]);
            } else {
                $region = trim($this->region);
            }
            $query->andWhere(['like', 'olit_company_branch.region', [$region]]);
        }
        if (isset($this->city)) {
            if (count(explode(" ", $this->city)) > 1) {
                $city = trim(explode(" ", $this->city) [0]);
            } else {
                $city = trim($this->city);
            }
            $query->andWhere(['like', 'olit_company_branch.city', [$city]]);
        }


        /*   if (isset($this->company_id)) {
          $query->andWhere([
          'olit_company_branch.company_id' => trim( $this->company_id)
          ]);
          } */





        $q = $query
                ->orderBy(['company.company_name' => SORT_ASC,
                    'olit_company_branch.address' => SORT_ASC])
                ->all();

        $data = [];
        if (isset($q ['0'])) {
            foreach ($q as $key => $value) {
                $data [$key] ['company_photo'] = "http://711.ru/uploads/fotos/" . $value ['foto'];
                $data [$key] ['id'] = $value ['id'];
                $data [$key] ['company_id'] = $value ['company_id'];
                $data [$key] ['company_name'] =  $value ['company_name'];
                $data [$key] ['branch'] =  $value ['branch'];
                $data [$key] ['functions'] =  $value ['functions'];
                $data [$key] ['region'] =  $value ['region'];
                $data [$key] ['city'] =  $value ['city'];
                $data [$key] ['address'] =  $value ['address'];
                $data [$key] ['work_hours'] =  $value ['work_hours'];
                $data [$key] ['phones'] =  $value ['phones'];
                $data [$key] ['email'] =  $value ['email'];
                $data [$key] ['active'] =  $value ['active'];
                $data [$key] ['ax'] = $value ['ax'];
                $data [$key] ['ay'] = $value ['ay'];
            }
        }
        return $data;
    }

    /**
     * @author Kovalchuk Alexander
     * @date 08.12.2015
     * 
     * @param int city_id;
     * 
     * @return array array contains companies ids
     */
    public function companiesInCity() {
        if (count(explode(" ", $this->city)) > 1) {
                $city = trim(explode(" ", $this->city) [0]);
            } else {
                $city = trim($this->city);
            }
        $model = (new Query)
                ->addSelect('companies.company_name company_name')
                ->from(self::tableName())
                ->where(['like', 'olit_company_branch.city',  $city])
                ->leftJoin('olit_insurance_users companies', 'companies.user_id = olit_company_branch.company_id')
                ->groupBy('company_id')
                ->orderBy(['company_name' => SORT_ASC])
                ->all();
       
        $data = "[";
        foreach ($model as $value){
           $data .=  "'". $value['company_name']."', ";
        }
        $data.= "]";
       
        return $data;
    }

    /**
     * save valid data to db
     * 
     * @author Kovalchuk Alexander
     *  @date 20.11.2015
     *        
     * @return boolean
     */
    public function saveBranch() {
        return $this->save();
    }

    /**
     * remove branch from db
     * 
     * @author Kovalchuk Alexander
     * @date 04.12.2015
     *        
     * @return boolean
     */
    public function removeBranch() {
        return $this->deleteALL('id = :id', ['id' => (int) $this->id]);
    }

    /**
     * @author Kovalchuk Alexander
     * count branches
     * @return number|string
     */
    public function countBrances() {
        return $this->find()->count();
    }

    /**
     * get all info about one branch by id
     * @author Kovalchuk Alexander
     * 
     * @return array
     */
    public function getOnePoint() {
        $query = new Query ();
        $q = $query->addSelect([
                    'users.foto foto',
                    'company.user_id company_id',
                    'company.company_name company_name',
                    'olit_company_branch.id id',
                    'olit_company_branch.branch branch',
                    'olit_company_branch.functions functions',
                    'olit_company_branch.region region',
                    'olit_company_branch.city city',
                    'olit_company_branch.address address',
                    'olit_company_branch.work_hours work_hours',
                    'olit_company_branch.phones phones',
                    'olit_company_branch.email email',
                    'olit_company_branch.active active',
                    "X(olit_company_branch.coordinates) ax",
                    "Y(olit_company_branch.coordinates) ay"
                ])
                ->from(self::tableName())
                ->leftJoin('olit_insurance_users company', 'olit_company_branch.company_id = company.user_id')
                ->leftJoin('olit_users users', 'olit_company_branch.company_id = users.user_id')
                ->where([
                    'olit_company_branch.id' => $this->id
                ])
                ->one();

        $data = [];

        if (isset($q)) {
            $value = $q;
            $data ['company_photo'] = "http://711.ru/uploads/fotos/" . $value ['foto'];
            $data ['id'] = $value ['id'];
            $data ['company_id'] = $value ['company_id'];
            $data ['company_name'] =  $value ['company_name'];
            $data ['branch'] =  $value ['branch'];
            $data ['functions'] =  $value ['functions'];
            $data ['region'] =  $value ['region'];
            $data ['city'] =  $value ['city'];
            $data ['address'] =  $value ['address'];
            $data ['work_hours'] =  $value ['work_hours'];
            $data ['phones'] =  $value ['phones'];
            $data ['email'] =  $value ['email'];
            $data ['active'] =  $value ['active'];
            $data ['ax'] = $value ['ax'];
            $data ['ay'] = $value ['ay'];
        }
        return $data;
    }
    

    /**
     * Получаем id головной компании
     * @param $id
     * @return null|static
     */
    public function getDataFromId($id){
        $model = self::findOne(['id' => $id]);
        return $model; 
    }

    /**
     * Получаем  3 филиала в регионе
     * @param $region
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getFilialFromRegion($region){
        $model = self::find()
            ->where(['region' => $region])
            ->orderBy('rand()')
            ->limit(3)
            ->all();
        return $model;
    }

    /**
     Делаем связь один ко многим
     */
    public function getCompany()
    {
        return $this->hasMany(Company::className(), ['user_id' => 'company_id']);
    }
    
    /*Получаем три филиала других страховых компаний */


    public function getFilial($city){

            $model = (new Query)
                ->select(['olit_company_branch.id AS id',
                    'olit_company_branch.company_id AS company_id',
                    'olit_company_branch.branch AS branch',
                    'olit_company_branch.functions AS functions',
                    'olit_company_branch.region AS region',
                    'olit_company_branch.city AS city',
                    'olit_company_branch.address AS address',
                    'olit_company_branch.work_hours AS work_hours',
                    'olit_company_branch.phones AS phones',
                    'olit_company_branch.email AS email',
                    'olit_company_branch.coordinates AS coordinates',
                    'olit_company_branch.active AS active',
                    'olit_insurance_users.photo AS logo',
                    'olit_insurance_users.company_name AS company_name',
                ])
                ->from('olit_company_branch')
                ->leftJoin('olit_insurance_users', 'olit_insurance_users.user_id = olit_company_branch.company_id')
                ->where(['olit_company_branch.city' => $city])
                ->orderBy('rand()')

                ->all();
            
       
        if(count($model)<3){
            $model2 = (new Query)
                ->select(['olit_company_branch.id AS id',
                    'olit_company_branch.company_id AS company_id',
                    'olit_company_branch.branch AS branch',
                    'olit_company_branch.functions AS functions',
                    'olit_company_branch.region AS region',
                    'olit_company_branch.city AS city',
                    'olit_company_branch.address AS address',
                    'olit_company_branch.work_hours AS work_hours',
                    'olit_company_branch.phones AS phones',
                    'olit_company_branch.email AS email',
                    'olit_company_branch.coordinates AS coordinates',
                    'olit_company_branch.active AS active',
                    'olit_insurance_users.photo AS logo',
                    'olit_insurance_users.company_name AS company_name',
                ])
                ->from('olit_company_branch')
                ->leftJoin('olit_insurance_users', 'olit_insurance_users.user_id = olit_company_branch.company_id')
                ->where(['olit_company_branch.region' => $this->region])
               // ->orderBy('rand()')
                ->limit(3-count($model))
                ->all();
            return array_merge($model, $model2);
        }else return $model;
    }
   
}



?>