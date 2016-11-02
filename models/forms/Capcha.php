<?php

namespace app\models\forms;
use yii\base\Model;

class Capcha extends Model
{
    /**
     * @var string
     */
    public $captcha;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['captcha', 'required'];
        $rules[] = ['captcha', 'captcha'];
        return $rules;
    }
    
    public function attributeLabels() {
        
       return ['capcha' => 'capcha'];
    }
}