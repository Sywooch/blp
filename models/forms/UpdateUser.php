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

class UpdateUser extends Model
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
            [['name', 'email', 'password', 'repassword'], 'required', 'message'=>'Не может быть пустым!'],
            ['name', 'string', 'min'=>3, 'max'=>255],
            ['email', 'string', 'min'=>6, 'max'=>255],
            ['status', 'default', 'value'=>User::STATUS_NOT_ACTIVE, 'on'=>'default'],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'message'=>'Пароли не совпадают'],
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
     * Обновление данных 
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 21.09.2016
     * 
     */
    public function update()
    {
        $user = User::findOne(['user_id'=>Yii::$app->user->identity->user_id]);
        $user->scenario = 'reg_user';
        $user->name = $this->name;
        $user->email = $this->email;
        $user->full_name = $this->full_name;
        $user->password = $user->crypt($this->password);
        return $user->update();
    }  
    
}