<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class File extends ActiveRecord {

    /**
     * 
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%file}}';
    }

    /**
     * 
     * @inheritdoc
     */
    public function rules() {
        return [
        ];
    }

    public function beforeDelete() {
        @unlink($this->path);
        return parent::beforeDelete();
    }

}
