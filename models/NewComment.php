<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\Pagination;
use yii\helpers\HtmlPurifier;
use app\models\Myfunctions;

/**
 * Модель отзывов
 */
class NewComment extends ActiveRecord {

    /**
     * 
     * @inheritdoc
     */
    public static function tableName() {
        return 'olit_comments';
    }

    /**
     * 
     * @inheritdoc
     */
    public function rules() {
        return [
            [['post_id', 'user_id', 'is_register'], 'required', 'on' => 'add'],
            [['post_id', 'user_id'], 'integer', 'on' => 'add'],
            ['autor', 'required', 'message' => 'Имя является обязательным полем', 'on' => 'add'],
            ['autor', 'editorFilter', 'on' => 'add'],
            ['text', 'required', 'message' => 'Необходмио ввести комментарий', 'on' => 'add'],
            [['text'], 'editorFilter', 'on' => 'add'],
        ];
    }

    /**
     * 
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        $scenarios['add'] = [ 'autor', 'text', 'user_id', 'is_register'];
        return $scenarios;
    }

    /**
     * 
     * @inheritdoc
     */
    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'id',
            'post_id',
            'date',
            'autor',
            'text',
            'user_id',
            'is_register'
        ]);
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
     * @author Sergey Kulikov
     * @date 14.10.15
     * @updated by Kovalchuk Alexander 15.05.2015
     * 
     * Получает комментарии для новости
     * 
     * @param int post_id id новости 
     * 
     * @return array
     */
    public function getForPost() {
        $sql_response = $this->findAll(['post_id' => $this->post_id]);
        $result = [];
        if (!is_null($sql_response)) {
            foreach ($sql_response as $comment) {
                $result[] = [
                    'id' => $comment['id'],
                    'date' => $comment['date'],
                    'name' =>  $comment['autor'],
                    'comment' =>  $comment['text']
                ];
            }
        }
        return $result;
    }

    /**
     * Проверка
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @param type $insert
     * @return boolean
     */
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        $this->autor = strip_tags(HtmlPurifier::process(htmlspecialchars_decode($this->autor)));
        $this->text = strip_tags(HtmlPurifier::process(htmlspecialchars_decode($this->text)), '<b><i><u><ul><il><li>');
        return true;
    }

    /**
     * 
     * @author Sergey Kulikov <syrex92@gmail.com>
     * 
     * Добавляет комментарий в БД
     * @param int post_id идентификатор новости к которой добавлятся комментарий
     * @param datetime date дата добавления комментария  
     * @param string    autor имя пользователя
     * @param string text текст комментария
     * @param int user_id идентификатор пользователя
     * @param tinyint/boolean is_register зарегестрирован или нет
     *  
     * @return bool 
     */
    public function addComment() {
        return $this->save();
    }
    /**
     * @author Sergey Kulikov
     * 
     * @param type $limit количество последних комментариев
     * @return type
     */
    public function getLast($limit = 5) {
        $sql_response = (new Query)->select(['olit_comments.autor AS name',
                    'olit_comments.text', 'olit_comments.date', 'olit_post.title AS new_title',
                    'olit_post.id AS new_id', 'olit_post.alt_name as new_altname',
                    'olit_category.alt_name AS category_altname'])
                ->from('olit_comments')
                ->leftJoin('olit_post', 'olit_comments.post_id = olit_post.id')
                ->leftJoin('olit_category', 'olit_post.category = olit_category.id')
                ->orderBy(['olit_comments.id' => SORT_DESC])
                ->limit($limit)
                ->all();
        $result = [];
        if (!is_null($sql_response)) {
            foreach ($sql_response as $comment) {
                $result[] = [
                    'date' => $comment['date'],
                    'name' =>  $comment['name'],
                    'text' =>  $comment['text'],
                    'new_title' =>  $comment['new_title'],
                    'url' => '/news/' . $comment['category_altname'] . '/' . $comment['new_id'] . '-' . $comment['new_altname'] . '.html'
                ];
            }
        }
        return $result;
    }

}
