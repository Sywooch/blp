<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models\User;


/**
 * @author Maxim Shablinskiy maxshabl@yandex.ru
 * @date 04.08.2016
 *
 */

class RegUser extends Model
{
    public $name;
    public $full_name;
    public $password;
    public $repassword;
    public $email;
    public $status;
    public $role;
  
    
    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'full_name'], 'filter', 'filter'=>'trim'],
            ['full_name', 'match', 'pattern' => '/^[A-zА-я\s]+$/u', 'message' => 'Допустимы русские и латинские буквы!'],
            [['name'], 'match', 'pattern' => '/^[A-z0-9]+$/', 'message' => 'Разрешены латинские буквы и цыфры!'],
            [['name', 'email', 'password', 'repassword'], 'required', 'message'=>'Заполните поле!'],
            [['email'], 'email', 'message'=>'Это не email!'],
            ['email', 'unique',
                'targetClass' => User::className(),
                'message'=>'Это почта уже занята'],
            ['name', 'unique',
                'targetClass' => User::className(),
                'message'=>'Это имя уже занято'],
            ['status', 'default', 'value'=>User::STATUS_NOT_ACTIVE, 'on'=>'default'],
            ['status', 'in', 'range'=>[
                User::STATUS_NOT_ACTIVE,
                User::STATUS_ACTIVE
            ]],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'message'=>'Пароли не совпадают'],
            ['name', 'string', 'min'=>3, 'max'=>255, 'message'=>'Логин не может быть менее 3 символов!'],
            ['email', 'string', 'min'=>6, 'max'=>255, 'message'=>'Email не может быть менее 5 символов'],
        ];
    }

    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Логин',
            'password' => 'Введите пароль',
            'repassword' => 'Повторите пароль',            
            'email' => 'Ваш электронный адресс',
            

        ];
    }
    
    /**
     * регистрация. Добавление в базу user 
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * 
     */
    public function reg()
    {

        $user = new User();
        $user->scenario = 'reg_user';

        $user = new User();        

        $user->full_name = $this->name;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
    
    
    /**
     * Отправляет email для активации юзера
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * 
     */
    public function sendRegMail($email, $message)
    {
        \Yii::$app->session->setFlash('success', 'На указанную Вами почту было отправлено письмо для подтверждения регистрации.');                
        $let= new \app\models\Email();
        $let->from = 'noreply@711.ru';
        $let->to = $email;
        $let->subject = 'Активация аккаунта на сайте 711.ru';
        $let->body = $message;
        try{$let->send2();}catch (Swift_SwiftException $e){};
    }
}

