<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Insurance extends ActiveRecord {

    /**
     * 
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%insurance}}';
    }

    /**
     * 
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
        ];
    }
    
}
