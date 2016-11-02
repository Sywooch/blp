<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\Pagination;
use yii\helpers\HtmlPurifier;
use app\models\Myfunctions;
use yii\helpers\StringHelper;
use app\models\Email;

class Comment extends ActiveRecord {

    /**
     * 
     * @inheritdoc
     */
    public static function tableName() {
        return 'olit_comments_2';
    }

    /**
     * 
     * @inheritdoc
     */
    public function rules() {
        return [
            [['entity_id'], 'required', 'on' => 'add'],
            ['author_name', 'string', 'max' => 50, 'on' => 'add'],
            ['author_name', 'match', 'pattern' => '/^[A-zА-я\s]+$/u', 'message' => 'Допустимы русские и латинские буквы!','on' => ['add']],
            ['text', 'required', 'message' => 'Необходмио ввести комментарий', 'on' => 'add'],
            ['text', 'match', 'pattern' => '/^[A-zА-я0-9-\s?!.,;:)(—"]+$/u', 'message' => 'Разрешены русские латинские символы, цифры a также ?!.,;:)("-_—','on' => ['add']],
            ['text', 'string', 'max' => 4000, 'on' => 'add'],
            [['text, author_name'], 'editorFilter', 'on' => 'add'],
            
        ];
    }

    public function scenarios() {

        $scenarios = [
            'add' => [
                'entity_id', 'author_name', 'text'                
            ]
        ];
        return $scenarios;
    }
    
    public function beforeDelete() {
        if(!$this->isNewRecord){
            self::deleteAll(['parent_id'=>$this->id]);
        }
        return parent::beforeDelete();
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        
        $this->author_name = strip_tags(HtmlPurifier::process(htmlspecialchars_decode($this->author_name)));
        $this->text = strip_tags(HtmlPurifier::process(htmlspecialchars_decode($this->text)), '<b><br/><br><ul><ol><i><u><li>');
        
        return true;
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
        return strip_tags(HtmlPurifier::process(htmlspecialchars_decode($this->$attribute)), '<b><br/><br><ul><ol><i><u><li>');
    }

    public function childrens() {
        if (!$this->id)
            return null;
        return $this->find()
                        ->where(['parent_id' => $this->id])
                        ->andWhere(['entity_type' => 0])
                        ->all();
    }

    public function getAuthorName(){
        $author_name ='Гость';
        if($this->author_name)
            return $this->author_name;
        if($user = $this->user()){
            return $user->name;
        }
        return $author_name;
    }
    public function user(){
       return User::findOne(['user_id']==$this->user_id);
    }
    public static function getLastComments($limit = 5, $entity_type = 0) {
        // думаю здесь нужна группировка
        $comments = self::find()
                ->where(['entity_type' => $entity_type])
                ->orderBy(['created_date' => SORT_DESC])
                ->limit($limit)
                ->all();
//        var_dump($comments);
//        die();
        $result = [];

        foreach ($comments as $comment) {
//            $comment->text = $comment->text ;
            $full_comment = strlen($comment['text']) > 190;
            $comment_text = $comment['text'];
            if ($full_comment) {
                $comment_text = StringHelper::truncate($comment_text, 150, '');
                $comment_text = substr($comment_text, 0, strripos($comment_text, ' ')) . '...';
                $comment_text = strip_tags($comment_text);  
            }

            $result[] = [
                'date' => $comment['created_date'],
                'author_name' => $comment->getAuthorName(),
                'entity_id' => $comment['entity_id'],
                'trunc_comment' => $comment_text,
                'full_comment' => $full_comment,
                'count' => self::CountComments($comment['entity_id']),
            ];
        }
        return $result;
    }

    private static function CountComments($entity_id, $entity_type = 0) {
        return self::find()
                        ->andWhere(['entity_id' => $entity_id])
                        ->andWhere(['entity_type' => $entity_type])
                        ->count();
    }


    /**
    * @author Peskov Sergey
    * @get 20.09.2016
    * Метод тащит комменты из базы одним запросом
    * при этом считает количество комментов в этом отзыве
    * @param $limit - ограничение комментов
    * @return (array) $result - массив с комментом
    */
    public function fastGetLastComments($limit = 5) {

        $arraySelect = [
            'users.name as review_author', 
            'comment.created_date as date', 
            'comment.id as id', 
            'comment.author_name as author_name', 
            'comment.entity_id as entity', 
            'clone.entity_id', 
            'COUNT(clone.entity_id) as countEntity', 
            'comment.text as text'
        ];

         $query = (new Query)
        ->select($arraySelect)
        ->from('olit_comments_2 as comment')
        ->leftJoin('olit_comments_2 as clone', 'comment.entity_id = clone.entity_id')
        ->leftJoin('olit_insurance_reviews as review', 'review.review_id = comment.entity_id')
        ->leftJoin('olit_users as users', 'review.company_id = users.user_id')
        ->where('comment.id > (select id from olit_comments_2 ORDER BY created_date DESC limit :limit,1)',[':limit'=>$limit])
        ->GroupBy(['comment.id'])
        ->OrderBy(['clone.entity_id'=>SORT_DESC])
        ->all();
                
            $result['comments'] = [];

            foreach($query as $value){

                $short = strip_tags($value['text']);
                if (strlen($short) > 140) {
                    $short = StringHelper::truncate($short, 140, '');
                    $short = substr($short, 0, strripos($short, ' '));
                }

                $result['comments'][] = [
                    'review_id' => $value['entity'],
                    'author_name' => $value['author_name'],
                    'trunc_comment' => $short,
                    'date' => Yii::$app->formatter->asDate($value['date'], 'dd.MM.yyyy'),
                    'count' => $value['countEntity'],
                    'review_author' => $value['review_author'],
                ];
            }
            return $result;
    }
    /**
    * @author Peskov Sergey
    * @get 21.09.2016
    * Коменты для текущего отзыва
    * @param $limit - ограничение комментов
    * @return (array) $result - массив с комментом
    */
    public function getEntitytComments($entity) {

         $query = (new Query)
                ->select(['id',
                    'author_name',
                    'text',
                    'created_date'])
                ->from(self::tableName())
                ->where(['entity_id' => $entity])
                ->orderBy(['created_date' => SORT_ASC])
            ->all(); 

            $result['reviewComment'] = [];
           
                foreach($query as $value){

                    $result['reviewComment'][] = [
                        'id' => $value['id'],
                        'author_name' => $value['author_name'],
                        'text' => $value['text'],
                        'date' => Yii::$app->formatter->asDate($value['created_date'], 'dd.MM.yyyy'),
                    ];
                }
            
            return $result;
    } 
    
    /**
     * @author Maxim Shablinskiy
     * @date 07.10.2016
     * 
     */
    public function addCommentToReview($reviews){
        $this->scenario = 'add';
        if($this->load(\Yii::$app->request->post()) && $this->validate()){

            if (!yii::$app->user->isGuest)
                $user_id = yii::$app->user->id;
            else {
                $user_id = 0;
                return;
            }

            //$user = User::findOne(['user_id' => $user_id]);
            $this->user_id = $user_id;

            $email = new Email;
            $email->template = 'add_comment';
            $email->from = \yii::$app->params['emailFrom'];
            $sendMail = new Review();
            $companyName = new Company();
            $email->to = $reviews['email'];
            $email->subject = 'Новый комментарий на ваш отзыв о компании ' . $companyName->getNameFromId($sendMail->getItemFromReview($this->entity_id)->company_id);
            $email->params = [
                'name' => $reviews['company_name'],
                'author' => $this->author_name,
                'url' => 'http://www.711.ru/review/' . $this->entity_id,
                'id' => $this->entity_id,
                'comment' => strip_tags($this->text),
                'to' => $reviews['email'],
            ];
            //Добавляем проверку на отписку от рассылки
            $isDesabled = new DisabledEmailSending();
            if($isDesabled->isEnabledEmail($sendMail->getItemFromReview($this->entity_id)->email))
                $email->send();

            //echo 'success';

            $this->save();
        }
    }
    
    /**
    * @author Shablinskiy Maxim
    * @get 07.10.2016
    * Коменты для текущего отзыва
    * 
    * 
    */
    public function getCommentsToRev($entity) {

        $query = (new Query)
                ->select(['id',
                    'author_name',
                    'text',
                    'created_date'])
                ->from(self::tableName())
                ->where(['entity_id' => $entity])
                ->orderBy(['created_date' => SORT_DESC]);
        $countQuery = clone $query;
        $count = $countQuery->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize' => 5]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();  
           
        return ['models'=>$models, 'pages'=>$pages, 'count'=>$count];
    }
    
    
}