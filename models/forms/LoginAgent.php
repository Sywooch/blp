<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models;

class LoginAgent extends Model {

    
    public $email;
    public $password;
    public $rememberMe;
    private $_user = false;

    public function rules() {
        return [
            [['email', 'password'], 'required'],
            //['rememberMe', 'boolean'],
            ['password', 'validatePassword', 'message' => 'Неверный логин или пароль'],
        ];
    }

    public function validatePassword($attribute, $params) {

       $user = User::findUser($this->email);
       if(is_object($user)):
           
           if($user->password==md5(md5($this->password))):
               return true;
           else:  $this->addError($attribute, 'Пароль неверный!');
           endif;
           
        else: return  $this->addError($attribute, 'Не найдено имя');
       endif;
    }

    public function getUser() {

        if (!$this->_user) {
            $this->_user = models\User::findOne(['email' => $this->email]);
            
        }

        return $this->_user;
    }

    public function login() {

        if ($this->validate()) {
            $this->rememberMe = 1;
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    public function attributeLabels() {
        $r = parent::attributeLabels();
        return array_merge($r, array(
            'email' => 'Имя',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить пароль',
        ));
    }

}

