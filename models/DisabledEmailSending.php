<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disabled_email_sending".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $email
 */
class DisabledEmailSending extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disabled_email_sending';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'email' => 'Email',
        ];
    }

    /**
     * Проверка на отписку от рассылки 
     * @param $email
     * @return bool
     */
    public function isEnabledEmail($email){
        $model = self::findOne(['email' => $email]);
        if(empty($model))
            return true;
        else 
            return false;
    }

    /**
     * Получаем все запрещенные для рассылки адреса e-mail
     * @return array|\yii\db\ActiveRecord[]
     */
    public function isEnabledSend(){
        $model = self::find()
            ->select('email')
            ->all();
        return $model;
    }


    /**
     * Если клиент оставил отзыв после отписки то разрешаем рассылку снова (удаляя его из таблицы запрета)
     * @param $mail
     * @throws \Exception
     */
    public function disableToEnable($mail){
        $model = self::findOne(['email' => $mail]);
        if(!empty($model)){
            $model->delete();
        }
    }
    
}
