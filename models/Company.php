<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\Review;
use yii\data\Pagination;
use yii\helpers\HtmlPurifier;
use yii\data\Sort;


/**
 * Модель компаний
 */
class Company extends ActiveRecord {

    /**
     *
     * @var boolean true - active, false - withdrown
     * true - компания активна, false - компания отозвана
     */
    public $activity = null;

    public static function tableName() {
        return 'olit_insurance_users';
    }

    public function rules() {
        $rules = parent::rules();
        return array_merge($rules, [
            [['company_name', 
                'address', 
                'phone', 
                'site', 
                'license_for_insurance', 
                'expert_RA_rating', 
                'additional_info', 
                'charter_capital', 
                'user_id'], 'required', 'on' => 'edit'],
            
            
            [['company_name',
            'address',
            'phone',
            'site',
            'license_status',
            'license_for_insurance',
            'license_for_reinsurance',    
            'expert_RA_rating',
            'charter_capital',
            'additional_info',
            'color'], 'required', 'message' => 'поле обязательно должно быть заполнено', 'on' => 'edit_company'],
          
        ]);
    }

    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'user_id',
            'company_name',
            'address',
            'phone',
            'site',
            'license',
            'license_status',
            'license_for_insurance',
            'expert_RA_rating',
            'charter_capital',
            'additional_info',
            'color',
            'html_rules'
        ]);
    }

    public function scenarios() {

        $scenarios = parent::scenarios();
        $scenarios['edit'] = ['company_name', 
            'address', 'phone', 'site', 
            'license_for_insurance', 
            'expert_RA_rating', 'additional_info', 
            'charter_capital', 
            'user_id'];
        
        $scenarios['update_rules'] = ['html_rules'];
        $scenarios['edit_company'] = [
            'company_name',
            'address',
            'phone',
            'site',
           // 'license',
            'license_status',
            'license_for_insurance',
            'license_for_reinsurance',
            'expert_RA_rating',
            'charter_capital',
            'additional_info',
            'color'
        ];
        return $scenarios;
    }

    /**
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @param type $insert
     */
    public function beforeSave($insert) {
        //  parent::beforeSave($insert);
        switch ($this->scenario) {
            case 'edit':
                $this->address = HtmlPurifier::process(htmlspecialchars_decode($this->address));
                $this->phone = HtmlPurifier::process(htmlspecialchars_decode($this->phone));
                $this->site = HtmlPurifier::process(htmlspecialchars_decode($this->site));
                $this->license = HtmlPurifier::process(htmlspecialchars_decode($this->license));
                break;
            case 'update_rules':
                $this->html_rules = HtmlPurifier::process(htmlspecialchars_decode($this->html_rules));
                break;
           case 'edit_company':
               
                $this->company_name =  HtmlPurifier::process(htmlspecialchars_decode($this->company_name));
                $this->address = HtmlPurifier::process(htmlspecialchars_decode($this->address));
                $this->phone = HtmlPurifier::process(htmlspecialchars_decode($this->phone));
                $this->site =  $this->site;
                $this->license_for_insurance =  HtmlPurifier::process(htmlspecialchars_decode($this->license_for_insurance));
                $this->license_for_reinsurance = HtmlPurifier::process(htmlspecialchars_decode($this->license_for_reinsurance));
                $this->expert_RA_rating = HtmlPurifier::process(htmlspecialchars_decode($this->expert_RA_rating));
                $this->charter_capital = HtmlPurifier::process(htmlspecialchars_decode($this->charter_capital));
                $this->license_status = HtmlPurifier::process(htmlspecialchars_decode($this->license_status));
                $this->additional_info = HtmlPurifier::process(htmlspecialchars_decode($this->additional_info));
                preg_match('/[A-Fa-f0-9]{6}/', $this->color, $matches);
                $this->color = $matches[0];
                break; 
        }
        return true;
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
     * Вовзвращет ТОП5 компаний с их ID, количеством отзывов и средним рейтингом
     * @return array
     */
    public function getTop5() {

        $query = new Query;
        $query->select('olit_insurance_users.company_name as name,'
                        . ' olit_insurance_reviews.company_id as company_id,'
                        . ' count( olit_insurance_reviews.review_id ) as review_id ,'
                        . ' avg( olit_insurance_reviews.rating ) as rating')
                ->from('olit_insurance_reviews')
                ->rightJoin('olit_insurance_users', 'olit_insurance_reviews.company_id = olit_insurance_users.user_id')
                //->andWhere('rating != -1')
                ->addGroupBy('company_id')
                ->addOrderBy('avg( rating ) desc')
                ->limit(5);
        $sql_response = $query->all();
        $result = [];
        if (!is_null($sql_response)) {
            foreach ($sql_response as $one_company) {
                $company_name =  $one_company['name'];
                array_push($result, [
                    'name' => strlen($company_name) > 31 ? substr($company_name, 0, 31) . '...' : $company_name,
                    'id' => (int) $one_company['company_id'],
                    'count' => (int) $one_company['review_id'],
                    'rating' => (int) $one_company['rating']
                ]);
            }
        }
        return $result;
    }

    /**
     * Get 10 companies with the greatest number of reviews
     * 
     */
    public function getMostPopular($limit = 10) {
        $query = new Query;
        $query->select('olit_insurance_users.company_name as name,'
                        . ' olit_insurance_reviews.company_id as company_id,'
                        . ' count( olit_insurance_reviews.review_id ) as review_id ,'
                        . ' avg( olit_insurance_reviews.rating ) as rating')
                ->from('olit_insurance_reviews')
                ->rightJoin('olit_insurance_users', 'olit_insurance_reviews.company_id = olit_insurance_users.user_id')
                ->andWhere("olit_insurance_users.license_status LIKE '" . 'Действует' . "'")
                //->where(array('like', 'olit_insurance_users.license_status', "%".  'Действует')."%")
                ->addGroupBy('company_id')
                ->addOrderBy(' count(rating)  desc')
                ->limit($limit);
        $sql_response = $query->all();
        $result = [];
        if (!is_null($sql_response)) {
            foreach ($sql_response as $one_company) {
                //  $company_name =  $one_company['name'];
                array_push($result, [
                    'name' =>  $one_company['name'],
                    'id' => (int) $one_company['company_id'],
                    'count' => (int) $one_company['review_id'],
                    'rating' => (float) $this->getAvgRating($one_company['company_id'])
                ]);
            }
        }
        return $result;
    }

    /**
     * Определяет адрес файла (подбирает расширение)
     * @param int $id ID компании
     * @return string адрес файла
     */
    public function getLogoURL($id) {
        foreach (['.png', '.gif', '.jpeg', '.jpg'] as $ext) {
            $filename = '/uploads/fotos/foto_' . $id . $ext;
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $filename))
                return $filename;
        }
        return '';
    }

    /**
     * @author Sergey Kulikov
     * @return array массив с названиями компаний и количеством отзывов
     */
    public function getRightList() {
        $query = new Query;
        $query->select(['olit_insurance_users.user_id', 
            'olit_insurance_users.company_name, COUNT( olit_insurance_reviews.review_id ) as reviews'])
                ->from('olit_insurance_users')
                ->leftJoin('olit_insurance_reviews', 'olit_insurance_users.user_id = olit_insurance_reviews.company_id')
                //->andWhere('olit_insurance_reviews.rating != -1')
                ->addGroupBy('olit_insurance_users.user_id')
                ->addOrderBy(['company_name' => SORT_ASC]);
        $sql_response = $query->all();

        /*$query = new Query;
        $query->select('olit_insurance_users.user_id, olit_insurance_users.company_name, olit_insurance_users.license_status, olit_insurance_users.license_for_insurance, AVG( olit_insurance_reviews.rating ) as rating, COUNT( olit_insurance_reviews.review_id ) as reviews')
                ->from('olit_insurance_users')
                ->leftJoin('olit_insurance_reviews', 'olit_insurance_users.user_id = olit_insurance_reviews.company_id')
                //->andWhere('olit_insurance_reviews.rating != -1')
                ->addGroupBy('olit_insurance_users.user_id')
                ->addOrderBy(['company_name' => SORT_ASC]);
        $sql_response = $query->all();*/

        //echo '<pre>'; print_r($sql_response); echo '</pre>';
        //die;

        $result = [];
        if (!is_null($sql_response)) {
            foreach ($sql_response as $company) {
                array_push($result, [
                    'id' => (int) $company['user_id'],
                    'name' =>  $company['company_name'],
                    'reviews' => (int) $company['reviews']
                ]);
            }
        }
        return $result;
    }

    /**
     * Возвращает список всех компаний в определенном порядке сортировки
     * @author Sergey Kulikov
     * 
     * @param array $sort содержит правила сортировки (поле и порядок)
     * @return array
     */
    public function getList() {
        $query = new Query;
        $query->select('olit_insurance_users.user_id,'
                        . ' olit_insurance_users.company_name,'
                        . ' olit_insurance_users.license_status, '
                        .'olit_insurance_users.photo photo,'
                        . 'olit_insurance_users.license_for_insurance,'
                        . ' AVG( olit_insurance_reviews.rating )'
                        . ' as rating,'
                        . ' COUNT( olit_insurance_reviews.review_id ) as reviews')
                ->from('olit_insurance_users')
                ->leftJoin('olit_insurance_reviews', 'olit_insurance_users.user_id = olit_insurance_reviews.company_id')
                ->andWhere('olit_insurance_reviews.rating != -1');
        // return $this -> activity;
        //  divide list for active and withdrowed ------->


        if ($this->activity === true) {

            $query->andWhere(['not like',
                'olit_insurance_users.license_status',
                ['Отозвана']]);
        }
        if ($this->activity === false) {
            /* $query->andWhere([ 
              'olit_insurance_users.license_status' =>
              iconv('utf8', 'cp1251', 'Действует2')]); */
            $query->andWhere(['like',
                'olit_insurance_users.license_status',
                ['Отозвана']]);
        }

        // ----------------------------------------------<   
        $query->addGroupBy('olit_insurance_users.user_id')
                ->addOrderBy(['olit_insurance_users.company_name' => SORT_ASC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $sql_response = $query//->offset($pages->offset)
                //->limit($pages->limit)
                ->all();
        $result = ['companies' => [], 'pages' => $pages];
        if (!is_null($sql_response)) {
            foreach ($sql_response as $company) {
                array_push($result['companies'], [
                    'id' => (int) $company['user_id'],
                    'logo' => \yii::$app->params['photosParam']['imgUrl']. $company['photo'], 
                    //$this->getLogoURL($company['user_id']),
                    'name' =>  $company['company_name'],
                    'license_status' =>  $company['license_status'],
                    'license_for_insurance' =>  $company['license_for_insurance'],
                    'rating' => (int) round($company['rating']),
                    'reviews' => (int) $company['reviews'],
                ]);
            }
        }
        return $result;
    }
    

    /**
     * Возвращает имя компании
     * @author Sergey Kulikov
     * @param int user_id идентификатор пользователя
     * @return string
     */
    public function getCompanyName() {
        $company = $this->findOne(['user_id' => $this->user_id]);
        return  $company['company_name'];
    }
    
    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016
     * Возвращает массив id и company_name
     */
    public function getCompany() {
        $query = new Query;
        foreach($query->select('user_id, company_name')->from('olit_insurance_users')->all() as $k =>$v):
            $company[$v['user_id']] = $v["company_name"];            
        endforeach;
    return  $company;  
     
    }

    
    /**
     * Возвращает детальную информацию по компании
     * @author Sergey Kulikov
     * @param int $user_id идентификатор пользователя
     * @return array
     */
    public function getDetail() {
        $company = $this->find()->andWhere(['user_id' => $this->user_id])->one();
        echo '';
        return is_null($company) ? [
            'id' => 0,
            'logo' => '',
            'name' => '',
            'address' => '',
            'phone' => '',
            'site' => '',
            'license' => '',
            'license_status' => '',
            'license_for_insurance' => '',
            'license_for_reinsurance' => '',
            'rating' => '',
            'capital' => 0,
            'additional_info' => '',
            'html_rules' => '',
            'color' => 'white'
                ] : [
            'id' => (int) $company['user_id'],
            'logo' => \yii::$app->params['photosParam']['imgUrl']. $company['photo'],
                    //$this->getLogoURL($company['user_id']),
            'name' =>  $company['company_name'],
            'address' =>  $company['address'],
            'phone' =>  $company['phone'],
            'site' => $company['site'],
            'license' =>  $company['license'],
            'license_status' =>  $company['license_status'],
            'license_for_insurance' =>  $company['license_for_insurance'],
            'license_for_reinsurance' =>  $company['license_for_reinsurance'],
            'rating' =>  $company['expert_RA_rating'],
            'capital' => (int) $company['charter_capital'],
            'additional_info' =>  $company['additional_info'],
            'html_rules' =>  $company['html_rules'],
            'color' => $company['color']
        ];
    }

    public function getColor() {
        $company = $this->find()
                ->andWhere(['user_id' => $this->user_id])
                ->one();
        return $company['color'];
    }

    public function editCompany() {
        $this->save();
    }

    /**
     * data for statistics plugin, data returned as array of count of each rate
     * данные для плагина статистика, данные возвращаются как массив с подсчетами
     *  для каждой оценки
     * @author Kovalchuk Alexander
     * @date 08/09/2015
     * 
     * @return array
     */
    public function getReviewsRatingStatistics() {

        $ratings = [1, 2, 3, 4, 5];
        $rating_arr = [];


        foreach ($ratings as $rating) {
            $query = (new Query)
                    ->select("COUNT(*) as c,SUM(rating) as summ")
                    ->from("olit_insurance_reviews")
                    ->andWhere('parent_id IS NULL')
                    ->andWhere('rating = ' . $rating)
                    ->andWhere("company_id = " . (int) $this->user_id)
                    ->all();
            $rating_arr['res' . $rating] = $query[0]['c'];
        }

        return $rating_arr;
    }

    /**
     * data for statistics plugin, data returned is avg rating
     * возвращает средний рейтинг компании
     * @author Kovalchuk Alexander
     * @date 08/09/2015
     * 
     */
    public function getAvgRating($id = null) {
        $id = isset($this->user_id) ? $this->user_id : $id;
        $all_marks = (new Query)
                ->select("AVG(rating) as avg")
                ->from("olit_insurance_reviews")
                ->andWhere('parent_id IS NULL')
                ->andWhere('rating != -1')
                ->andWhere("company_id = " . (int) $id)
                ->all();
        return (float) $all_marks[0]['avg'];
    }

    public function getRandomCompanies($max_count = 5) {
        $companies = self::findAll(['license_status' => 'Действует']);
        $count = count($companies) - 1;
        $result = [];
        $company_ids = [];
        $companies_array = [];
        $company_ratings = [];
        $review = new Review;
        for ($i = 0; $i < min($max_count, $count); $i++) {
            do {
                $key = rand(0, $count);
            } while (in_array($key, $company_ids));
            $company = $companies[$key];
            $company_ids[] = $key;
            $review->company_id = $company->user_id;
            $rating = $review->getRatingByCompany();
            $company_ratings[$i] = $rating['rating'];
            $companies_array[] = [
                'id' => $company->user_id,
                'name' => $company->getCompanyName(),
                'rating' => $rating['rating'],
                'reviews' => $rating['reviews']
            ];
        }
        arsort($company_ratings);
        foreach ($company_ratings as $key => $value)
            $result[] = $companies_array[$key];
        return $result;
    }

    /**
     * get all companies as string
     * @author Kovalchuk Alexander
     * @date 18.11.15
     * 
     * @return string( js array constructor)
     */
    public function getCompaniesStringArray() {
        $companies = $this->find()
                ->orderBy(['company_name' => SORT_ASC])
                ->all();
        $data = "[";
        foreach ($companies as $value) {
            $data .= "'" .  $value['company_name'] . "', ";
        }
        $data.= "]";
        return $data;
    }

    /**
     * @author Kovalchuk Alexander
     * @date 20.11.2015
     * 
     * @param string $this->company_name company name
     * @return int company_id
     */
    public function getCompanyIdByName() {
        $this->company_name = trim(strip_tags($this->company_name));
        return $this->find()
                        ->where(['company_name' => $this->company_name])
                        ->select('user_id')
                        ->one() ['user_id'];
    }

    public function updatephoto() {
        $old_path =self::findOne(['user_id' => $this->user_id])['photo'];
        @chmod(\yii::$app->params['photosParam']['expertDir'] . $old_path, 0777);
        @unlink(\yii::$app->params['photosParam']['expertDir'] . $old_path);
        return $this->updateALL(
                        ['photo' =>  $this->photo], 'user_id = :user_id', ['user_id' => (int) $this->user_id]);
    }
    
    public function getAttributeLabel($attribute) {
        $d_attr = parent::getAttributeLabel($attribute);
    }

    /**
     * Получаем  название компании 
     * @param $id
     * @return mixed
     */
    public function getNameFromId($id){
        $model = self::findOne(['user_id' => $id]);
        return $model->company_name;
    }
    
    /**
     * Подсчет рейтингов
     * @return array|null|ActiveRecord
     */
    public function getRatingFromId(){
        $model = self::find()
            //->where(['expert_RA_rating'=>'А. Высокий уровень надежности.'])
            //->where(['user_id' => $id])
            ->orderBy('rand()')
            ->limit(1)
            ->one();


       return $model;

    }

    /**
     * Получить данные о user по ID
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getDataFromId($id){
        $model = self::find()
            ->where(['user_id'=> $id])
            ->one();
        return $model;
    }
    
    
    /**
     * Получаем данные по компании по id 
     * @return array
     */
    public function getDataArrCompany(){
        $model = self::find()
            ->all();
        $arrData = array();
        foreach($model as $val){
            $arrData[$val['user_id']]['user_id']=$val['user_id'];
            $arrData[$val['user_id']]['company_name']=$val['company_name'];
            //$arrData[$val['user_id']]['email']=$val['email'];
        }
        return $arrData;
    }
    
    /**
     * Выборка и фильтрация информации о компании и рейтинге
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 09.09.2016
     * 
     */
    public function getInfo()
    {
        $sort = new Sort([
            'attributes' => [
                'company_name' => [
                    'label'=>'<span class="companiesList_head_item_after"></span>',
                    'default' => SORT_DESC,
                ],
                
                'license_status' => [
                    'label' => '<span class="companiesList_head_item_after"></span>',

                ],
                'average' => [
                    'label' => '<span class="companiesList_head_item_after"></span>',

                ],
                'count' => [
                    'label' => '<span class="companiesList_head_item_after"></span>',

                ],
            ],
        ]);
        $rows = new Query;
        $search = \Yii::$app->request->get('search').'%';
        $rows->select('olit_insurance_users.user_id, company_name, photo, license_for_insurance, license_status, one_star, two_star, three_star, four_star, five_star, average, count')
                ->from('olit_insurance_users')->leftjoin('olit_insurance_rating', 'olit_insurance_rating.company_id=olit_insurance_users.user_id');
        $rows->FilterWhere(['like', 'company_name', $search, false]);      
        
        //Yii::$app->request->getParams()
        //echo $rows->createCommand()->getRawSql();
        //die();
        return ['models' => $rows->orderBy($sort->orders)->all(), 'sort'=>$sort];
    }
    
    /**
     *      
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 16.09.2016
     * 
     */
    public function companyInfo() 
    {
        $rows = new Query;
        $company = $rows->select(''
                . 'company_id,'
                . 'olit_insurance_users.user_id,'
                . 'company_name, '
                . 'photo,'
                . 'html_rules,'
                . 'license_for_insurance, license_status,'
                . 'company_name,'
                . 'address,'
                . 'phone,'
                . 'site,'
                . 'additional_info,'
                . 'license_for_insurance,'
                . 'expert_RA_rating,'
                . 'charter_capital,'
                . 'one_star, two_star, three_star, four_star, five_star, average, count')                
                ->from('olit_insurance_users')->innerJoin('olit_insurance_rating', 'olit_insurance_users.user_id=olit_insurance_rating.company_id')
                ->andWhere(['user_id' => $this->user_id])->one();

        if(is_array($company)) return $company;
        else return false;
    }
    
    /**
     * Выборка 4 
     * @author Maxim Shablinskiy
     * @data 06.10.16
     * @return array
     */
    public function get4RandCompany() {
        $rows = new Query;
        $company = $rows->select(['color', 'average', 'company_id', 'company_name', 'countreviews'])
            ->from('olit_insurance_users')
            ->innerJoin('olit_insurance_rating', 'olit_insurance_users.user_id = olit_insurance_rating.company_id')
            ->where(['license_status'=>'Действует'])
            ->andWhere('average >= 1')
            ->orderBy(['rand()' => SORT_DESC])->limit(4)->all();
            
            
            //->limit(4);
        
        return $company;

    }
}
