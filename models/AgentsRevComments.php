<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "olit_agents_review_comments".
 *
 * @property integer $comment_id
 * @property integer $agent_id
 * @property integer $to_user_id
 * @property integer $from_user_id
 * @property string $message
 */
class AgentsRevComments extends \yii\db\ActiveRecord
{
   
    public static function tableName()
    {
        return 'olit_agents_review_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [            
            [['agent_id', 'to_user_id', 'from_user_id', 'message', 'review_id'], 'required', 'message' => 'Заполнены не все поля'],
            [['agent_id', 'to_user_id', 'from_user_id', 'review_id'], 'integer'],
            [['message', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'captcha' =>'captcha',
            'comment_id' => 'Comment ID',
            'agent_id' => 'Agent ID',
            'to_user_id' => 'To User ID',
            'from_user_id' => 'From User ID',
            'message' => 'Message',
            'created_at' => 'created_at',
            'review_id' => 'review_id',
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
    
}
