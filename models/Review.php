<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\User;
use app\models\Company;
use yii\data\Pagination;
use yii\helpers\HtmlPurifier;
use app\models\Email;
use yii\helpers\StringHelper;
use app\models\Comment;
use app\models\DisabledEmailSending;
use yii\helpers\ArrayHelper;

/**
 * Модель отзывов
 */
class Review extends ActiveRecord {

    const STATUS_ACTIVE = 1;
    const STATUS_NOT_ACTIVE = 0;
    public $mt_rand;
    
    public static function tableName() {
        return 'olit_insurance_reviews';
    }

    public function rules() {
        $rules = [
            #[['user_id', 'type', 'rating'], 'required', 'on' => ['add_review']],]
            [['name'], 'match', 'pattern' => '/^[A-zА-я\s]+$/u', 'message' => 'Допустимы только латинские буквы!','on' => ['add_review', 'add_review_and_register']],
            [['title', 'comment'], 'match', 'pattern' => '/^[A-zА-я0-9-\s?!.,;:)(—"]+$/u', 'message' => 'Разрешены русские латинские символы, цифры a также ?!.,;:)("-_—','on' => ['add_review', 'add_review_and_register']],
            [['city'], 'match', 'pattern' => '/^[A-zА-я\s]+$/u', 'message' => 'Допустимы русские и латинские буквы!','on' => ['add_review', 'add_review_and_register']],
            [['company_id'], 'required', 'message' => 'Укажите компанию', 'on' => ['add_review', 'add_review_and_register']],
            [['type'], 'required', 'message' => 'Укажите вид страхования', 'on' => ['add_review', 'add_review_and_register']],
            [['type'], 'validateInsuranceType', 'message' => 'Такого вида страхования нет', 'on' => ['add_review', 'add_review_and_register']],
            [['rating'], 'required', 'message' => 'Заполните рейтинг', 'on' => ['add_review', 'add_review_and_register']],
            [['rating'], 'in', 'range'=>[1, 2, 3, 4, 5], 'message' => 'Заполните рейтинг', 'on' => ['add_review', 'add_review_and_register']],
            [['name'], 'required', 'message' => 'Имя является обязательным полем', 'on' => ['add_review', 'add_review_and_register']],
            [['email'], 'required', 'message' => 'Почта является обязательным полем', 'on' => ['add_review', 'add_review_and_register']],
            [['city'], 'required', 'message' => 'Город является обязательным полем', 'on' => ['add_review', 'add_review_and_register']],
            [['comment', 'title'], 'required', 'message' => 'Поле обязательно для заполнения', 'on' => ['add_review', 'add_review_and_register']],
            [['email'], 'email', 'message' => 'Email не корректен', 'on' => ['add_review', 'add_review_and_register']],
            [['company_id', 'type', 'rating'], 'integer', 'on' => ['add_review', 'add_review_and_register']],
            [['parent_id', 'company_id', 'comment'], 'required', 'on' => ['add_answer', 'add_review_and_register']],
            [['parent_id', 'company_id'], 'integer', 'on' => ['add_answer', 'add_review_and_register']],
            //['mt_rand', 'validRand', 'on' => ['add_review', 'add_review_and_register']],
            ];
            
        return $rules;
    }

    public function beforeValidate() 
    {
        $this->type = (int) $this->type;
        $this->rating = (int) $this->rating;
        $this->company_id = (int) $this->company_id;
        return parent::beforeValidate();
    }
    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'review_id',
            'user_id',
            'parent_id',
            'company_id',
            'date_add',
            'name',
            'email',
            'city',
            'type',
            'comment',
            'rating',
            'title',
            'mt_rand'
        ]);
    }

    public function scenarios() {

        $scenarios = [
            'add_review' => [
                #'user_id',
                'company_id',
                'name',
                'email',
                'city',
                'type',
                'comment',
                'rating',
                'title',
                'mt_rand'
            ],
            'add_review_and_register' => [
                'company_id',
                'name',
                'email',
                'city',
                'type',
                'comment',
                'rating',
                'title',
                'mt_rand'
            ],
            'add_answer' => [
                'parent_id',
                'company_id',
                'date_add',
                'comment'
            ],
            'edit_answer' => [
                'comment'
            ],
        ];
        return $scenarios;
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);
        $this->name = strip_tags(HtmlPurifier::process($this->name));
        $this->email = strip_tags(HtmlPurifier::process($this->email));
        $this->city = strip_tags(HtmlPurifier::process($this->city));
        $this->title = strip_tags(HtmlPurifier::process($this->title));
        $this->comment = strip_tags(HtmlPurifier::process(htmlspecialchars_decode($this->comment)), '<b><br/><br><ul><ol><i><u><li>');
        $this->date_add = date("Y-m-d H:i:s");
        return true;
    }

    /**
     * валидируем типы полиса
     * @author Kovalchuk Alexander
     * @date 29.12.2015
     * 
     * @param type $attribute
     */
    public function validateInsuranceType($attribute) {
        if (!in_array($this->$attribute, array_keys(\yii::$app->params['staticTypes']))) {
            $this->addError($attribute, "Такого типа полиса не существует!");
            return;
        }
    }

    
    /**
     * фильтрует значение поля, которое присылает редактор(оставлят некоторые теги)
     * @author Kovalchuk Alexander
     * @date 14.10.2015
     * 
     * @param string значение поля
     * @return string отфильтрованое значение 
     */
    public function editorFilter($attribute) {
        return addslashes(trim(strip_tags($this->$attribute, '<b><br/><br><ul><ol><i><u><li>')));
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
     * Возвращает количество отзывов всего
     * @return int
     */
    public function reviewCount() {
        return (int) $this->find()->andWhere('parent_id IS NULL ')->andFilterWhere(['company_id'=> (int) Yii::$app->request->get('id')])->count();
    }

    /**
     * Возвращает количество отзывов всего
     * @return int
     */
    public function reviewCountByCompany() {
        return (int) $this->find()
                        ->where(['company_id' => $this->company_id])
                        ->andWhere('parent_id IS NULL ')
                        ->count();
    }

    /**
     * Возвращает количество отзывов за неделю
     * @return int
     */
    public function reviewCountLastWeek() {
        return (int) $this->find()
                        ->andWhere('DATE( date_add ) >= curdate( ) - INTERVAL 7 DAY')
                        ->andWhere('parent_id IS NULL ')
                        ->count();
    }

    /**
     * Возвращает последний отзыв
     * @return array
     */
    public function lastReview() {
        $last_review = $this->find()
                ->andWhere('parent_id IS NULL ')
                ->addOrderBy(['date_add' => SORT_DESC])
                ->one();
        $user = new User;
        $user->user_id = $last_review['user_id'];
        $company = new Company;
        $company->user_id = $last_review['company_id'];
        return [
            'id' => $last_review['review_id'],
            'rating' => $last_review['rating'],
            'company_id' => $last_review['company_id'],
            'company_name' => $company->getCompanyName(),
            'type' => \yii::$app->params['staticTypes'][$last_review['type']],
            'text' =>  $last_review['comment'],
            'author' =>  $last_review['name'],
            'date' => date_format(date_create_from_format('Y-m-d H:i:s', $last_review['date_add']), 'd-m-Y')
        ];
    }

    /**
     * Возвращает отзыв по ID
     * @return array
     */
    public function getById() {
        $sql_response = $this
                ->find()
                ->where(['review_id' => $this->review_id])
                ->andWhere('parent_id IS NULL ')
                ->one();
        if (!$sql_response)
            return [
                'id' => 0,
                'count' => 0,
                'rating' => 0,
                'company_name' => '',
                'company_id' => 0,
                'text' => '',
                'author' => '',
                'author_email' => '',
                'type' => 0,
                'date' => '',
                'title' => '',
                'city' => '',
                'answer' => ['text' => '', 'date' => '']
            ];
        $user = new User;
        $user->user_id = $sql_response['user_id'];
        $company = new Company;
        $company->user_id = $sql_response['company_id'];
        $this->company_id = $sql_response['company_id'];
        $short =  $sql_response['comment'];
        if (strlen($short) > 140) {
            $short = StringHelper::truncate($short, 140, '');
            $short = substr($short, 0, strripos($short, ' '));
        }

        return [
            'id' => $sql_response['review_id'],
            'count' => $this->reviewCountByCompany(),
            'rating' => $sql_response['rating'],
            'company_name' => $company->getCompanyName(),
            'company_id' => $sql_response['company_id'],
            'company_logo' => $company->getLogoURL($sql_response['company_id']),
            'text' =>  $sql_response['comment'],
            'author' => $user->getFullName(),
            'author_email' => $user->getUser()['email'],
            'type' => isset(\yii::$app->params['staticTypes'][$sql_response['type']]) ? \yii::$app->params['staticTypes'][$sql_response['type']] : 0,
            'date' => $sql_response['date_add'],
            'title' =>  $sql_response['title'],
            'city' =>  $sql_response['city'],
            'answer' => $this->getAnswer($sql_response['review_id']),
            'short' => $short
        ];
    }


    /**
    * @author Peskov Sergey
    * @date 21.09.2016
    * @param $id - id статьи
    * @return array отзывов
    */
    public function getDetailReview($id){

        $arrayFields = [
            'company.company_name',
            'company.user_id',
            'company.descr',
            'company.photo as company_logo',
            'olit_insurance_reviews.city',
            'olit_insurance_reviews.date_add',
            'olit_insurance_reviews.email',
            'olit_insurance_reviews.review_id',
            'olit_insurance_reviews.comment',
            'olit_insurance_reviews.name as full_name',
            'olit_insurance_reviews.title',
            'olit_insurance_reviews.company_id',
            'olit_insurance_reviews.rating',
            'user.name',
        ];
         $query = (new Query)
                ->select($arrayFields)
                ->from(self::tableName())
                ->leftJoin('olit_insurance_users as company', 'company.user_id = olit_insurance_reviews.company_id')
                ->leftJoin('olit_users as user', 'company.user_id = user.user_id')
                ->where(['review_id' => $id])
                ->andWhere('olit_insurance_reviews.status=:status', [':status'=>self::STATUS_ACTIVE])
                ->one();
        return $query;
    }

    public function getCompany() {
        return $this->hasOne(Company::className(), ['user_id' => 'company_id'])->one();
    }

    public function getComments($review_id=null) {
        if (!$review_id)
            $review_id = $this->review_id;
        if (!$review_id)
            return null;
        return Comment::find()
                        ->where(['entity_id' => $review_id])
                        ->andWhere(['entity_type' => 0])
                        ->orderBy('created_date ASC')
                        ->all();
    }

    private function getAnswer($id = 0) {
        $ans = $this->findOne(['parent_id' => $id]);
        return is_null($ans) ? ['text' => '', 'date' => ''] : ['text' =>  $ans['comment'], 'date' => $ans['date_add']];
    }

    /**
     * @author Peskov Sergey
     * @date 20.09.2016
     * Получаем список отзывов (переработанный метод)
     * @param @byweek - за неделю
     *        @truncate - насполько обрезать текст отзыва
     *        @ company_id - по компании
     *        @ limit - показать количество
     * @return array список отзывов
     */
    public function getList($byweek = false, $truncate = false, $company_id = false, $limit = 0) {
        $querySumm = (new Query)
                ->select(['COUNT(review_id) as count','company_id'])
                ->from('olit_insurance_reviews');
                $queryArray = ['mainReview.name',
                    'mainReview.review_id',
                    'mainReview.city',
                    'mainReview.title',
                    'mainReview.comment',
                    'mainReview.date_add',
                    'mainReview.rating',
                    'mainReview.company_id',
                    'company.company_name',
                    'company.color'];
                    
        $query = (new Query)
                ->select($queryArray);
                $query->from('olit_insurance_reviews as mainReview')
                ->leftJoin('olit_insurance_users as company', 'mainReview.company_id = company.user_id');

            if(isset($company_id) && !empty($company_id)){
                $query->andWhere(['mainReview.company_id' => $company_id]);
                $querySumm->where(['company_id' => $company_id]);
            }
        $sumArr = $querySumm->andWhere('status=:status', [':status'=>self::STATUS_ACTIVE])->one(); 

        $pages = new Pagination(['totalCount' => $sumArr['count']]);
        if ($limit != 0)
           $query->limit($limit);
        else
            $query->offset($pages->offset)->limit($pages->limit)->andWhere('status=:status', [':status'=>self::STATUS_ACTIVE])
            ->OrderBy(['mainReview.date_add'=>SORT_DESC]);
            $sql_response = $query->all();

        $result = ['pages' => $pages];

        foreach ($sql_response as $review) {

            $result['reviews'][] = [
                'review_id' => $review['review_id'],
                'author' =>  $review['name'],
                'city' =>  $review['city'],
                'title' =>  $review['title'],
                'text' => $review['comment'],
                'date' => $review['date_add'],
                'rating' => (float) round($review['rating']),
                'company_name' => $review['company_name'],
                'company_id' => $review['company_id'],
                'company_color' => $review['color'],
                'countSumm' => $sumArr['count'],
            ];
        }
        return $result;
    }

    /**
     * @author Peskov Sergey
     * @date 28.09.2016
     * Список отзывов а также комменты к ним + Пагинация (Личный кабинет)
     * @param 
     *        @ company_id - по компании
     *        @ limit - показать количество
     * @return array список отзывов с комментариями
     */
    public function getListLk($company_id = false, $limit = 0) {
        //-- Получаю общую сумму отзывов
        $querySumm = (new Query)
                ->select(['COUNT(review_id) as count','company_id'])
                ->from('olit_insurance_reviews')
                ->where(['company_id' => $company_id])
                ->andWhere('status=:status', [':status'=>self::STATUS_ACTIVE]);
                $sumArr = $querySumm->one();

                //-- создаю пагинатор
                $pages = new Pagination(['totalCount' => $sumArr['count']]);
                $result = ['pages' => $pages];

        //-- Формирую массив из ID
        $queryArrId = (new Query)
                ->select(['review_id'])
                ->from('olit_insurance_reviews')
                ->where(['company_id' => $company_id])
                ->andWhere('status=:status', [':status'=>self::STATUS_ACTIVE])
                ->OrderBy(['date_add'=>SORT_DESC])
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

                $arrIds = ArrayHelper::getColumn($queryArrId,'review_id');
                
        //-- Делаю главную выборку, используя наши ID
                $queryArray = ['mainReview.name',
                    'mainReview.review_id',
                    'mainReview.city',
                    'mainReview.title',
                    'mainReview.comment',
                    'mainReview.date_add',
                    'mainReview.rating',
                    'mainReview.company_id',
                    'company.company_name',
                    'company.color',
                    'olit_comments_2.text as comment_text',
                    'olit_comments_2.author_name as comment_author',
                    'olit_comments_2.created_date as comment_date'];
                    
        $query = (new Query)
                ->select($queryArray)
                ->from('olit_insurance_reviews as mainReview')
                ->leftJoin('olit_insurance_users as company', 'mainReview.company_id = company.user_id')
                ->leftJoin('olit_comments_2', 'olit_comments_2.entity_id = mainReview.review_id')
                ->andWhere(['mainReview.company_id' => $company_id])
                ->andWhere('status=:status', [':status'=>self::STATUS_ACTIVE])
                ->andWhere(['in','mainReview.review_id',$arrIds])
                ->OrderBy(['mainReview.date_add'=>SORT_DESC]);

        $sql_response = $query->all();

        $previus_reviewid = 0;
        foreach ($sql_response as $review) {
        if($review['review_id']!=$previus_reviewid){
            //-- формирую массив с комментариями
            $arrComment = [];
                foreach($sql_response as $comments){
                    if($comments['review_id'] == $review['review_id']){
                        if(!empty($comments['comment_text'])){
                            $arrComment[] = [
                                'comment_text' => $comments['comment_text'],
                                'comment_author' => $comments['comment_author'],
                                'comment_date' => Yii::$app->formatter->asTimestamp($comments['comment_date']),
                            ];   
                        }
                    }
                }
                //-- сортирую по дате
                usort( $arrComment, function($v1, $v2){
                    if ($v1["comment_date"] == $v2["comment_date"]) return 0;
                    return ($v1["comment_date"] < $v2["comment_date"])? -1: 1;
                });
                //-- формирую результирующий массив
                $result['reviews'][] = [
                    'review_id' => $review['review_id'],
                    'author' =>  $review['name'],
                    'city' =>  $review['city'],
                    'title' =>  $review['title'],
                    'text' => $review['comment'],
                    'date' => $review['date_add'],
                    'rating' => (float) round($review['rating']),
                    'company_name' => $review['company_name'],
                    'company_id' => $review['company_id'],
                    'company_color' => $review['color'],
                    'countSumm' => $sumArr['count'],
                    'comment' => $arrComment,
                ];
                
            }
            $previus_reviewid = $review['review_id'];
        }
        return $result;
    }

    public function childrens() {
        return $this->find()
                        ->where(['parent_id' => $this->review_id])->all();
    }

    public function getRatingByCompany() {
        $query = new Query;
        $res = $query->select(['AVG(rating) rating', 'COUNT(review_id) reviews'])
                ->from('olit_insurance_reviews')
                ->Where(['company_id' => $this->company_id])
                ->andWhere(['!=', 'rating', '-1'])
                ->andWhere(['parent_id' => null])
                ->one();
        $subquery = (new Query)
                ->select(['company_id', 'AVG(`rating`) rating'])
                ->from('olit_insurance_reviews')
                ->Where(['parent_id' => null])
                ->andWhere(['!=', 'rating', '-1'])
                ->addGroupBy(['company_id']);
        $query2 = (new Query)
                ->select(['COUNT(t.company_id) place'])
                ->from(['t' => $subquery])
                ->Where(['>', 'rating', $res['rating']]);
        $res2 = $query2->one();
        return [
            'rating' => (int) $res['rating'],
            'reviews' => (int) $res['reviews'],
            'place' => (int) $res2['place'] + 1
        ];
    }
    /**
     * Вывод последних отзывов
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 13.09.2016
     * @param int $num Число отзывов
     * @return object Возвращает объект запроса
     */
    public function getReviews($num=null, $company_id = null, $user_id = null)
    {
        $query = new Query;

        $rows = $query->select(['olit_insurance_reviews.review_id',
                'olit_insurance_reviews.parent_id',
                'olit_insurance_reviews.company_id',
                'olit_insurance_reviews.user_id',
                'olit_insurance_reviews.date_add as date',
                'olit_insurance_reviews.name as author',
                'olit_insurance_reviews.email',
                'olit_insurance_reviews.city',
                'olit_insurance_reviews.comment as text',
                'olit_insurance_reviews.rating',
                'olit_insurance_reviews.title',
                'olit_insurance_reviews.status',
                'olit_insurance_users.company_name',
                'olit_insurance_users.color as company_color'])
        ->from('olit_insurance_reviews')
        ->innerJoin('olit_insurance_users', 'olit_insurance_reviews.company_id = olit_insurance_users.user_id')

        ->where('status=:status', [':status'=>self::STATUS_ACTIVE]);
        $query->andFilterWhere(['olit_insurance_reviews.company_id'=>$company_id, 'olit_insurance_reviews.user_id'=>$user_id]);
        $query->orderBy(['olit_insurance_reviews.review_id'=>SORT_DESC]);
        //$query->orderBy(['rand()' => SORT_DESC]);
        if($user_id == null) $query->limit($num);
        
        //echo $rows->createcommand()->getrawsql();
        //die();
        return $rows;
    }
    /**
     * Вывод последних отзывов о компании
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 20.09.2016
     * @param int $num Число отзывов
     * @return object Возвращает объект запроса
     */
    public function getReviewsCompany()
    {
        $query = new Query;

        $rows = $query->select(['olit_insurance_reviews.review_id',
                'olit_insurance_reviews.parent_id',
                'olit_insurance_reviews.company_id',
                'olit_insurance_reviews.user_id',
                'olit_insurance_reviews.date_add',
                'olit_insurance_reviews.name',
                'olit_insurance_reviews.email',
                'olit_insurance_reviews.city',
                'olit_insurance_reviews.comment',
                'olit_insurance_reviews.rating',
                'olit_insurance_reviews.title',
                'olit_insurance_reviews.status',
                'olit_insurance_users.company_name',
                'olit_insurance_users.color'])
        ->from('olit_insurance_reviews')
        ->innerJoin('olit_insurance_users', 'olit_insurance_reviews.company_id = olit_insurance_users.user_id')
        ->where('status=:status', [':status'=>self::STATUS_ACTIVE])
        ->andWhere(['olit_insurance_reviews.company_id'=>(int)Yii::$app->request->get('id')])
        ->orderBy(['olit_insurance_reviews.review_id'=>SORT_DESC]);
        

        //echo $rows->createcommand()->getrawsql();
        //die();
        return $rows;
    }

        /**
     * Отправка email незарегистрированному или незалогиненному пользователю при создании отзыва.
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 08.09.2016
     */

    public function confirmEmail()
    {
        $user = User::findByEmail($this->email);
        if(!is_object($user)):
            $user = new User;
            $user->scenario = 'reg_from_review';
            $user->email = $this->email;
            $user->name = $this->email;
            $user->full_name = $this->name;
            if(!$user->save()):
                return false;
            endif;
        else:
            $user->generateAuthKey();
            $user->save();
        endif;
        $this->status = self::STATUS_NOT_ACTIVE;
        $this->user_id = $user->user_id;
        $this->save();
        $email = new Email();
        $param = ['email'=>urlencode($this->email), 'auth_key'=>urlencode($user->auth_key), 'review_id'=>$this->review_id];
        $email->send3($this->email, 'confirm_email_from_review', 'Подтверждение E-mail адреса на сайте 711.ru', $param);
    }

    
    /**
     * Добавление отзыва и уведомление о его добавлении
     * @return mixed|void
     */

    public function addReview() {
        if (!$this->save())
            return ;
        else
        $user = User::findOne(['user_id' => $this->user_id]);
        //Отправляем e-mail пользователю
        $company = new Company;
        $company->user_id = $this->company_id;
        $email = new Email;
        $email->template = 'add_review';
        $email->from = \yii::$app->params['emailFrom'];
        $email->to = $user['email'];
        //$email->subject = 'Ваш отзыв №' . $this->review_id . ' успешно размещен на портале 711.ru';
        $email->subject = 'Спасибо! Ваш отзыв успешно размещен';
        $email->params = [
            'name' => $user['name'],
            'id' => $this->review_id,
            'company_name' => $company->getCompanyName(),
            'review_title' =>  $this->title,
            'review_comment' =>  $this->comment,
            'rating' => $this->rating,
            'url' => 'http://'.trim($_SERVER['SERVER_NAME'], "/").'/reviews/'.$this->review_id,
        ];
        //Добавляем проверку на отписку от рассылки, если есть запрет, то удаляем его, т к клиент снова добавил отзыв
        $isEnabledEmail = new DisabledEmailSending();
        $isEnabledEmail->disableToEnable($user['email']);
            $email->send();
        //Отправляем e-mail компании
        $company_user = new User;
        $company_user->user_id = $this->company_id;
        $company_user->getUser()['email'];
        $email->template = 'add_review_company';
        $email->from = \yii::$app->params['emailFrom'];
        $email->to = $company_user->getUser()['email'];
        $companyName = new Company();
        $email->subject = 'Отзыв о работе компании '.$companyName->getNameFromId($this->company_id).' на портале 711.ru (' . $this->review_id . ')';
        $email->params['company_name'] = $company_user->getName();
        $email->params['emailTo'] = $company_user->getUser()['email'];
        //$email->send();
        return $this->review_id;
    }

    /**
     * Получить похожие отзывы
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 28.10.15
     * @param int $this->review_id ID отзыва
     * @return array
     */
    public function getSimilarReviews($rating = true, $type = true, $company = true) {
        $this_review = self::findOne(['review_id' => $this->review_id]);
        $conditions = ['parent_id' => null];
        if ($rating)
            $conditions['rating'] = $this_review->rating;
        if ($type)
            $conditions['type'] = $this_review->type;
        if ($company)
            $conditions['company_id'] = $this_review->company_id;
        $sql_response = self::find()
                ->andWhere($conditions)
                ->andWhere(['not', ['review_id' => $this->review_id]])
                ->addOrderBy(['date_add' => SORT_DESC])
                ->limit(5)
                ->all();
        if (count($sql_response) < 3) {
            if ($rating)
                return $this->getSimilarReviews(false);
            elseif ($type)
                return $this->getSimilarReviews(false, false);
            elseif ($company)
                return $this->getSimilarReviews(false, false, false);
            else
                return [];
        }
        $result = [];
        $staticTypes = \yii::$app->params['staticTypes'];
        $review_like = new ReviewLike;
        foreach ($sql_response as $review) {
            $review_text = strip_tags(html_entity_decode($review['comment']));
            if (strlen($review_text) > 160) {
                $review_text = StringHelper::truncate($review_text, 150, '');
                $review_text = substr($review_text, 0, strripos($review_text, ' ')) . '...<a href="/reviews/' . $review['review_id'] . '">→</a>';
            }
            $company = Company::findOne(['user_id' => $review['company_id']]);
            $review_like->review_id = $review->review_id;
            $result[] = [
                'id' => $review['review_id'],
                'date_add' =>  $review['date_add'],
                'name' =>  $review['name'],
                'comment' => $review_text,
                'type' => $staticTypes[$review['type']],
                'rating' => $review['rating'] == -1 ? 0 : $review['rating'],
                'company' => [
                    'name' =>  $company->company_name,
                    'id' => $company->user_id
                ],
                'likes' => $review_like->getLikeCount()
            ];
        }
        return $result;
    }

    /**
     * Получаем данные по отзыву по Id отзыва
     * @param $id
     * @return null|static
     */

    public function getItemFromReview($id){
        $model = self::findOne(['review_id' => $id]);
        
        return $model;
    }
    /*Получаем Id юзеров всех, которые делали отзывы*/
    public function isUserReview(){
        $model = self::find()
            ->select('user_id')
            ->where('user_id <> 0')
            ->andWhere('company_id >0')
            ->all();
        $usersId = array();
        foreach($model as $val){
            $usersId[] = $val;
        }
        return $usersId;
    }
    

    /**
     * получаем массив с данными о компанияк, по которым клент добавлял отзывы
     * @return array
     */
    public function getArrClientCompany(){
        $model = self::find()
            ->select('user_id, company_id')
            ->where('user_id <> 0')
            ->andWhere('company_id >0')
            ->all();
        $user=array();
        foreach ($model as $val) {
            //if(isset($user[$val['user_id']])) {
           // $user[$val['user_id']] .= $val['company_id'];
            $user[$val['user_id']] = $val['company_id'];

            /* }else{
                 $user[$val['user_id']] = $val['company_id'];
             }
         }
         $data = array();

         foreach ($user as $key => $val){
             if(strpos($val, ','))
                 $data[$key] = array_unique(explode(",", $val));
             else
                 $data[$key] = $val;
         }
         return $data;*/
        }
         return $user;
    }

    
    /**
     * Получаем список компаний (число или массив, если отзывов было в несколько компаний)
     * @param $companyId
     * @param $time
     * @return mixed
     */
  /*  public function getReviewsFromId($companyId){
        if(strpos($companyId, ',')){
            $companies = explode(",", $companyId);
            
            return $companies;
        }else{
            $companies = $companyId;
            
            return $companies;
        }
    }*/


    /**
     * Выбираем все отзывы за последние 2 недели
     * @param $time
     * @return array
     */
    public function getReviewFromTime($time){
        $model = self::find()
            ->where('date_add > :date_add', [':date_add' => $time])
            ->all();
        $dataEmail = array();

        foreach ($model as $val){
            $data['theme'] = $val['title'];
            $data['comment'] = $val['comment'];
            $data['email'] = $val['email'];
            $data['comment'] = $val['comment'];
            $dataEmail[$val['company_id']] = $data;
            }
        return $dataEmail;   

        }
    
    /**
     * Все отзывы об определенной компании
     * @param $companyId
     * @param $time
     * @param $email
     * @return array|string|\yii\db\ActiveRecord[]
     */
    public function getReviewCompany($companyId, $time , $email){
        $model = self::find()
            ->where('date_add > :date_add', [':date_add' => $time])
            ->andWhere(['company_id'=>$companyId])
            //->andWhere('email <> :email',[':email'=>$email])
            ->all();
        if(!empty($model))
            return $model;
        else
            return 'no';
    }    

    /**
     * Все отзывы об определенной компании
     * @param $companyId
     * @param $time
     * @param $email
     * @return array|string|\yii\db\ActiveRecord[]
     */
    public function getReviewC($companyId){

        /*$data  = (new Query)
            ->select(['olit_insurance_reviews.comment'])
                ->from('olit_insurance_reviews')
                ->where(['olit_insurance_reviews.company_id' => $companyId])
                ->limit(10);
                ;

        $data = $data->all();   

        return $data;*/

        $model = self::find()
            //->where('date_add > :date_add', [':date_add' => $time])
            ->where(['company_id'=>$companyId])
            //->andWhere('email <> :email',[':email'=>$email])
            ->limit(10)
            ->all();
        if(!empty($model))
            return $model;
        else
            return 'no';
    }
    
    /*Количество отзывов по id определенной компании*/
    public function getCountReview($id){
       $model =  self::find()
           ->select('company_id')
           ->where(['company_id' => $id])
           ->asArray()
           ->all();
        return count($model);
    }
    
    /**
     * @author Peskov Sergey
     * @date 28/09/2016
     * Обрезает строку до определённого количества символов не разбивая слова.
     * Поддерживает многобайтовые кодировки.
     * @param string $str строка
     * @param int $length длина, до скольки символов обрезать
     * @param string $encoding кодировка, по-умолчанию 'UTF-8'
     * @return string обрезанная строка
     */
    public static function mbCutString($str, $length, $encoding='UTF-8')
    {
        if (mb_strlen($str, $encoding) <= $length) {
            return $str;
        }
     
        $tmp = mb_substr($str, 0, $length, $encoding);
        return mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $encoding), $encoding);
    }    
    

}
