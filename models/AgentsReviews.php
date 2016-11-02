<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "olit_agents_reviews".
 *
 * @property integer $review_id
 * @property integer $user_id
 * @property integer $agent_id
 * @property string $date_add
 * @property string $title
 * @property string $comment
 * @property integer $mark
 * @property string $email
 * @property integer $status
 */
class AgentsReviews extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 10;
    const STATUS_NOT_ACTIVE = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_agents_reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'email', 'mark' , 'comment', 'name', 'city'], 'trim'],
            [['user_id', 'agent_id', 'mark', 'status'], 'integer'],
            ['mark', 'in', 'range'=>[0,1,2,3,4,5]],
            [['created_at'], 'safe'],
            [['comment'], 'string'],
            [['title', 'email'], 'string', 'max' => 255],
            ['email', 'email'],
            [['title', 'email', 'mark' , 'comment', 'name', 'city'], 'required', 'message' => 'Поле обязательно для заполнения'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'review_id' => 'Review ID',
            'user_id' => 'User ID',
            'agent_id' => 'Agent ID',
            'created_at' => 'Date Add',
            'title' => 'Title',
            'comment' => 'Comment',
            'mark' => 'Mark',
            'email' => 'Email',
            'name' => 'Имя',
            'status' => 'Status',
            'city' => 'Город',
        ];
    }
    
    /**
     * Поведение для автоматического заполнения свойств created_at и updated_at
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 02.09.2016
     * 
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }
    
    /**
     * Сохранение отзыва, либо отправка сообщения для 
     * подтверждения email незарегистрированным и незалогиненным пользователям.
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 29.08.2016
     * 
     */
    public function saveReview()
    {
        
        $user = User::findByEmail($this->email);
        if(!\Yii::$app->user->isGuest):
            $this->status = AgentsReviews::STATUS_ACTIVE;
            $this->email = \Yii::$app->user->identity->email;
            $this->user_id = \Yii::$app->user->identity->user_id; 
            $this->save();
        elseif (!is_object($user)):
            $email = new Email;
            $user = new User();
            $user->full_name = $this->name;
            $user->name = $this->name;
            $user->email = $this->email;
            $user->status = User::STATUS_NOT_ACTIVE;
            $user->role = 'client';
            $pass = $user->generate_password(8);
            $user->password = $user->crypt($pass);
            $user->generateAuthKey();
            $user->save();
            $this->status = AgentsReviews::STATUS_NOT_ACTIVE;
            $this->user_id = $user->user_id;
            $this->agent_id = \Yii::$app->request->get('agent_id');
            $this->save();
            $params = ['user' => $user, 'review' => $this->review_id, 'pass'=>$pass];
            $email->send3($this->user_email, 'confirm_email_and_reg', $params);
            
        elseif(\Yii::$app->user->isGuest && is_object($user)):
            $email = new Email;
            $this->status = AgentsReviews::STATUS_NOT_ACTIVE;
            $this->user_id = $user->user_id;
            $this->agent_id = \Yii::$app->request->get('agent_id');
            $this->save();
            $params = ['user' => $user, 'review' => $this->review_id];
            $email->send3($this->user_email, 'confirm_email_and_reg', $params);
            $this->sendRegMail($user->email,'confirm_review', $user, $this->review_id);
            
        else:
            return false;
        endif;
       
    }
    
    /**
     * поиск по review_id
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 30.08.2016
     * 
     */
    public static function findByid($review_id)
    {
        return static::findOne(['review_id'=>$review_id]);
    }
    
}
