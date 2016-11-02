<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "olit_counter".
 *
 * @property integer $id
 * @property integer $count
 * @property string $name
 */
class Counter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_counter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['count', 'name'], 'required'],
            [['count'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'count' => 'Count',
            'name' => 'Name',
        ];
    }
    
    public function count($name)
    {
        $date = date("Y-m-d",time());
        $counter = $this->findOne(['name'=>$name, 'date'=>$date]);
        if(is_object($counter)):
            $counter->updateCounters(['count'=>1]);
        else:
            $this->name = $name;
            $this->count = 1;
            $this->date = $date;
            $this->insert();
        endif;
        
    }
    
    public function view($name)
    {
        $view = $this->find()->where(['name'=>$name]);
        return $view;
        
    }
}
