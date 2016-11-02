<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_email_sending".
 *
 * @property integer $id
 * @property string $date_add_message
 * @property integer $is_message_error
 */
class LogEmailSending extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_email_sending';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_add_message'], 'safe'],
            [['is_message_error'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_add_message' => 'Date Add Message',
            'is_message_error' => 'Is Message Error',
        ];
    }

    /**
     * Делаем запись в БД при успешном срабатывании скрипта
     * @param $date
     * @return bool
     */
    public function isSuccess($date){
        $model = self::find()
            ->where(['date_add_message' => $date])
            ->one();
        if(empty($model))
            return true;
        elseif(!empty($model) && $model->is_message_error == 1)
            return true;
        else
            return false;
    }

    
    /**
     * Проверяет были ли записи в логе
     * @param $date
     * @return bool
     */
    public function isEmptyLog($date){
        $model = self::find()
            ->where(['date_add_message' => $date])
            ->one();
        if(empty($model))
            return true;
        else
            false;
    }
    
    /**
     * Получаем скорректированное кол-во дней, если отправок в неделю несколько
     * @return int
     */

    public function getLastUpdate(){
        $model = self::find()
            ->orderBy(['id' => SORT_DESC,])
            ->limit(1)
            ->one();
        if(empty($model))
            return 14;
        else{
            $date = ceil((time()-strtotime($model->date_add_message))/86400);
            return $date;
        }
    }
}
