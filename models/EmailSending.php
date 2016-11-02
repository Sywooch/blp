<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email_sending".
 *
 * @property integer $id
 * @property string $to
 * @property string $from
 * @property string $user_name
 * @property string $subject
 * @property integer $user_id
 * @property string $message
 * @property integer $count
 * @property string $day_add
 * @property integer $is_send
 */
class EmailSending extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email_sending';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'count', 'is_send'], 'integer'],
            [['message'], 'string'],
            [['day_add'], 'safe'],
            [['to', 'from', 'user_name', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'to' => 'To',
            'from' => 'From',
            'user_name' => 'User Name',
            'subject' => 'Subject',
            'user_id' => 'User ID',
            'message' => 'Message',
            'count' => 'Count',
            'day_add' => 'Day Add',
            'is_send' => 'Is Send',
        ];
    }


    /**
     * Отбор по 30 писем для отправки
     * @return $this|bool
     */
    public function getDataFromSend(){
        $model = self::find()
            ->where(['is_send' => 0])
            ->limit(\yii::$app->params['countEmail'])
            ->all();
        if(empty($model))
            return false;
        else
            return $model;
    }

    
    /**
     * Проверка на задвоение при добавлении писем для отправки
     * @param $userId
     * @param $date
     * @return bool
     */
    public function isAdd($userId, $date){
        $model = self::find()
            ->where(['user_id' => $userId])
            ->andWhere(['day_add' => $date])
            ->andWhere(['is_send' => 0])
            ->all();
        if(empty($model))
            return true;
        else
            return false;
    }

    
    /**
     * Отправка уведомлений в песочнице и на продакшне
     * @param $emailTo
     * @return mixed
     */
    public function isSandbox($emailTo){
        $url = trim($_SERVER['SERVER_NAME'], "/");
        if(in_array( $url, \yii::$app->params['urlSandbox'] )){
            $countMail = count(\yii::$app->params['sandboxEmail']);
            $key = rand(0, $countMail-1);
            return \yii::$app->params['sandboxEmail'][$key];
        }else{
            return $emailTo;
        }
    }

}
