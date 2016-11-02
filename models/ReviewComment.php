<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\User;
use app\models\Company;
use yii\data\Pagination;
use \yii\helpers\StringHelper;
use app\models\Myfunctions;
use yii\helpers\HtmlPurifier;
use app\models\Review;

/**
 * Модель отзывов
 */
class ReviewComment extends ActiveRecord {

    /**
     *
     * @inheritdoc
     */
    public static function tableName() {
        return 'olit_insurance_reviews_comment';
    }

    /**
     *
     * @inheritdoc
     */
    public function rules() {


        return [
            [['review_id', 'author_id'], 'required', 'on' => 'add'],
            [['review_id', 'author_id'], 'integer', 'on' => 'add'],
            ['comment', 'required', 'message' => 'Необходмио ввести комментарий', 'on' => 'add'],
            [['comment'], 'filter', 'filter' => function ($value) {
            return Myfunctions::sqlHtmlEditorFilter($value);
        }, 'on' => ['add', 'edit']],
            ['name', 'required', 'message' => 'Имя является обязательным полем', 'on' => 'add'],
            ['name', 'filter', 'filter' => function ($value) {
            return Myfunctions::sqlHtmlFilter($value);
        }, 'on' => 'add']
        ];
    }

    /**
     *
     * @inheritdoc
     */
    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'id',
            'review_id',
            'author_id',
            'comment',
            'name',
            'date',
        ]);
    }

    /**
     * 
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        $scenarios['add'] = ['review_id', 'author_id', 'comment', 'name'];
        $scenarios['edit'] = ['comment'];
        return $scenarios;
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

    public function beforeSave($insert) {
        parent::beforeSave($insert);
        $this->comment =  $this->comment;
        $this->name =  $this->name;
        return true;
    }

    /**
     * @author Sergey Kulikov
     * 
     * Возвращает список комментариев
     * @param int review_id идентификатор отзыва
     * @param int $limit 
     * @return array
     */
    public function getList($limit = 0) {
        $query = $this->find()
                ->select(['id', 'date', 'name', 'comment'])
                ->Where(['review_id' => $this->review_id]);
        $query2 = $this->find()
                ->select(['review_id id', 'date_add date', 'name', 'comment'])
                ->from('olit_insurance_reviews')
                ->Where(['parent_id' => $this->review_id]);
        $sql_response = $this->find()
                ->select(['id', 'date', 'name', 'comment'])
                ->from(['united_table' => $query->union($query2)])
                ->addOrderBy(['date' => SORT_DESC]);
        if ($limit != 0)
            $sql_response->limit($limit);
        $sql_response->orderBy(['date' => SORT_DESC]);
        $sql_response = $sql_response->all();
        $result = [];
        if (!is_null($sql_response)) {
            foreach ($sql_response as $comment) {
                $result[] = [
                    'id' => $comment['id'],
                    'date' => $comment['date'],
                    'name' =>  $comment['name'],
                    'comment' =>  $comment['comment'],
                ];
            }
        }
        return $result;
    }

    /**
     * @author Sergey Kulikov
     * 
     * Возвращает последние комментарии
     * @param $limit
     * @return array
     */
    public function getLastComments($limit = 5) {
        $sql_response = $this->find()
                ->limit($limit)
                ->orderBy(['date' => SORT_DESC])
                ->all();
        $result = [];
        $review = new Review;
        foreach ($sql_response as $comment) {
            $comment_text = strip_tags($comment['comment']);
            $long_comment = strlen($comment_text) > 190;
            if ($long_comment) {
                $comment_text = StringHelper::truncate($comment_text, 150, '');
                $comment_text = substr($comment_text, 0, strripos($comment_text, ' ')) . '...';
            }
            if (!is_null($sql_response)) {
                $review->review_id = $comment['review_id'];
                $result[] = [
                    'date' => $comment['date'],
                    'name' => strip_tags($comment['name']),
                    'review' => (int) stripcslashes($comment['review_id']),
                    'comment' => $comment_text,
                    'long_comment' => $long_comment,
                    'count' => $this->CommentCountByReviewId($comment['review_id']),
                    'company_name' => $review->getById()['company_name']
                ];
            }
        }
        return $result;
    }

    /**
     * Возвращает количество комментариев к одному отзыву
     * @author Sergey Kulikov
     * 
     * 
     * @return int
     */
    private function CommentCountByReviewId($id) {
        return (int) $this->find()
                        ->andWhere(['review_id' => $id])
                        ->count();
    }

    /**
     * Сохраняет один комментарий к отзыву
     * @author Sergey Kulikov
     * 
     */
    public function AddComment() {
        $this->save();
    }

    public function updateComment() {
        return $this->updateAll(['comment' =>
            strip_tags(
                     $this->comment,
                    '<b><br/><br><ul><ol><i><u><li><p>')],
                'id = :id',
                ['id' => $this->id]);
    }
    
    public function deleteComment() {
        return $this -> deleteAll('id =:id', [':id' => $this -> id]);
    }

}
