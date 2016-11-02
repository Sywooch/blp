<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\User;
use app\models\Review;

/**
 * Description of ReviewLike
 *
 * @author Sergey Kulikov <syrex92@gmail.com>
 */
class ReviewLike extends ActiveRecord {
    
    /**
     * @interhitdoc
     */
    public static function tableName() {
        return 'olit_insurance_review_likes';
    }
    
    /**
     * @interhitdoc
     */
    public function rules() {
        return [
            [['review_id', 'user_id'], 'integer', 'on' => 'add_like']
        ];
    }
    
    /**
     * @interhitdoc
     */
    public function attributes() {
        $result = parent::attributes();
        return array_merge($result, [
            'id',
            'review_id',
            'user_id',
            'footprint'
        ]);
    }
    
    /**
     * @interhitdoc
     */
    public function scenarios() {
        return [
            'add_like' => [
                'review_id',
                'user_id',
                'footprint'
            ]
        ];
    }
    
    /**
     * @interhitdoc
     */
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        $user_id = \yii::$app->user->id;
        $this->user_id = is_null($user_id)?0:$user_id;
        if(($this->user_id == 0 || !is_null(\app\models\User::findOne(['user_id' => $this->user_id])))
                && !is_null(\app\models\Review::findOne(['review_id' => $this->review_id]))
                && !$this->checkAlreadyLiked())
            return true;
        return false;
    }
    
    /**
     * Проверка и установка в свойствах отпечатка пользователя (если не авторизован)
     * @return boolean
     */
    private function checkFootprint(){
        /*$cookies = \yii::$app->request->cookies;
        $newCookies = \yii::$app->response->cookies;
        $this->cookie = (int)$cookies->getValue('likeCookie', '0');*/
        /*if($this->cookie == 0){
            $user_agent = \yii::$app->request->getUserAgent();
            $user_ip = \yii::$app->request->getUserIP();
            $raw_cookie = is_null($user_agent)?'':$user_agent.is_null($user_ip)?'':$user_ip;
            $this->cookie = md5($raw_cookie);
            $newCookies->add(new \yii\web\Cookie(['name'=>'likeCookie', 'value'=>$this->cookie]));
            $result = false;
        } else {*/
        $user_agent = \yii::$app->request->getUserAgent();
        $user_agent = is_null($user_agent)?'':$user_agent;
        $user_ip = \yii::$app->request->getUserIP();
        $user_ip = is_null($user_ip)?'':$user_ip;
        $this->footprint = md5($user_agent.$user_ip);
        return !is_null(self::findOne(['review_id'=>$this->review_id, 'footprint'=>$this->footprint]));
        /*}
        return $result;*/
    }
    
    /**
     * Проверяет лайкал ли уже текущий пользователь этот отзыв
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 27.10.15
     * @param $this->review_id ИД отзыва
     * @param $this->user_id ИД пользователя
     * @return boolean Наличие лайка
     */
    public function checkAlreadyLiked(){
        if(is_null($this->review_id))
            return true;
        if($this->user_id == 0)
            return $this->checkFootprint();
        return !is_null(self::findOne([
            'user_id' => $this->user_id,
            'review_id' => $this->review_id
        ]));
    }
    
    /**
     * Возвращает количество лайков у отзыва
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 27.10.15
     * @param $this->review_id ИД отзыва
     * @return int Количество лайков
     */
    public function getLikeCount(){
        if(is_null($this->review_id))
            return 0;
        return (int)$this->find()
                ->where(['review_id' => $this->review_id])
                ->count();
    }
    
}