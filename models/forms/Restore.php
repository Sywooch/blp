<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models;
use app\models\User;

class Restore extends Model {

    public $email;
    

    public function rules() {
        return [
            [['email'], 'required'],
            ['email', 'exist',
                'targetClass' => User::className(),
                'message'=>'С такой почтой никто не зарегистрирован!'],
            ['email', 'email', 'message' => 'Неправильный формат E-mail'],
        ];
    }


    public function attributeLabels() {
        $r = parent::attributeLabels();
        return array_merge($r, array(
            'email' => 'Введите e-mail с которым Вы регистрировались на нашем сайте:',
        ));
    }

}
