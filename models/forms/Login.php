<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models;

/**
 * Класс для логина пользователя
 * @author Maxim Shablinskiy maxshabl@yandex.ru
 * @date 06.09.2016
 */

class Login extends Model {

    
    public $username;
    public $status;
    public $password;
    public $rememberMe;
    private $_user = false;

    public function rules() {
        return [
            [['username', 'password'], 'required'],
            //['rememberMe', 'boolean'],
            ['password', 'validatePassword', 'message' => 'Неверный логин или пароль'],
        ];
    }
    
    /**
     * Валидация пароля
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 06.09.2016
     * @param text $attribute атрибут к которому применяется метод
     * @param text $params 
     */
    
    
    public function validatePassword($attribute, $params) {

        if (!$this->hasErrors()):
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)):
                $field = ($this->scenario === 'loginWithEmail') ? 'email' : 'username';
                $this->addError($attribute, 'Неправильный '.$field.' или пароль.');
            endif;
        endif;
    }

    /**
     * Получение юзера по email или логину
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 06.09.2016
     * @return object Возвращает объект класса User
     */
    public function getUser() {

        if (!$this->_user) {
            $this->_user = models\User::find()->where(['email' => $this->username])->orwhere(['name' => $this->username])->one();
            
        }

        return $this->_user;
    }

    /**
     * Логирование юзера
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 06.09.2016
     * @return boolean 
     */
    
    public function login() {

        if ($this->validate()):
            $this->status = ($user = $this->getUser()) ? $user->status : User::STATUS_NOT_ACTIVE;
            if ($this->status === models\User::STATUS_ACTIVE):
                return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }

    public function attributeLabels() {
        $r = parent::attributeLabels();
        return array_merge($r, array(
            'username' => 'Имя',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить пароль',
        ));
    }

    
}