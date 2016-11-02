<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\helpers\HtmlPurifier;



/**
 * @author Maxim Shablinskiy maxshabl@yandex.ru
 * @date 04.08.2016
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $auth_key
 * @property string $password
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public $access_token;
    public $authKey;
    public $passwordChanged;
    const STATUS_DELETED = 0;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE=10;

    /**
     *
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne([
            'user_id' => $id,
            'status' => self::STATUS_ACTIVE
                ]);
    }

    /**
     *
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     *
     * @inheritdoc
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     *
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     *
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     *
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_users';
    }

    public function rules()
    {
        return [
            //['email', 'validateUser', 'on'=>'login'],
            [['name', 'email', 'password'], 'trim'],
            //[['name', 'email'], 'onlyEnglish'],
            [['name', 'email'], 'required', 'on'=>'reg_user'],
            ['email', 'email', 'on'=>'reg_user'],
            [['name', 'full_name'], 'string', 'min'=>3, 'max'=>255, 'on'=>'reg_user'],
            ['password', 'required', 'message'=>'Не может быть пустым!', 'on'=>'login, reg_user'],
            ['name', 'unique', 'message'=>'Это имя занято!', 'on'=>'reg_user'],
            ['email', 'unique', 'message'=>'Эта почта уже зарегистрирована', 'on'=>'reg_user']
        ];
        
    }
    
    public function validateUser($attribute, $params) 
    {
        
        $user = $this::find()->where(['email' => $params])->one();
        if(!is_object($user)) {
            $this->addError($attribute, 'Такой пользователь не найден!');
        }
        elseif($user->status == self::STATUS_NOT_ACTIVE) {
            $this->addError($attribute, 'Вы не подтвердили свою почту!');
        }
    }
    
    public function onlyEnglish($attribute) {
        if (preg_match('/^([A-Za-z0-9]+[\s\,\.\-]*)+$/u', trim($this->$attribute)) != 1)
            $this->addError($attribute, "Только цифры и английские  буквы");
    }
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        
        return [
            'user_id' => 'ID',
            'name' => 'Name',
            'auth_key' => 'Auth Key',
            'password' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'reg_data' => 'Reg data',
            'full_name' => 'ФИО',
            'user_group' => 'user_group'
        ];
    }
    
    
    
    public function beforeSave($insert) {
         parent::beforeSave($insert);
         switch ($this->scenario) {
            
             case 'reg_agent':
                 $this->email = HtmlPurifier::process(htmlspecialchars_decode($this->email));
                 $this->name = HtmlPurifier::process(htmlspecialchars_decode($this->email));
                 $this->sendUserInfoByEmail();
                 $this->password = $this->crypt($this->password);
                 break;
             case 'reg_from_review':
                 $this->email = HtmlPurifier::process(htmlspecialchars_decode($this->email));
                 $this->name = HtmlPurifier::process(htmlspecialchars_decode($this->email));
                 //$this->password = $this->generate_password(8);
                 $this->full_name = HtmlPurifier::process(htmlspecialchars_decode($this->full_name));
                 //$this->password = $this->crypt($this->password);
                 $this->generateAuthKey();
                 $this->status = User::STATUS_NOT_ACTIVE;
                 break;
             case 'reg_user':
                 $this->name = HtmlPurifier::process(htmlspecialchars_decode($this->name));
                 $this->email = HtmlPurifier::process(htmlspecialchars_decode($this->email));
                 $this->full_name = HtmlPurifier::process(htmlspecialchars_decode($this->full_name));
                 break;
             case 'reg_expert':
                 // $this->name = HtmlPurifier::process(htmlspecialchars_decode($this->name));
                 $this->email = HtmlPurifier::process(htmlspecialchars_decode($this->email));
                 $this->name = HtmlPurifier::process(htmlspecialchars_decode($this->name));
                 $this->full_name = HtmlPurifier::process(htmlspecialchars_decode($this->full_name));
                 if (is_null($this->password))
                     $this->password = $this->generate_password(8);
                 /* if (preg_match('/^([A-Za-zА-Яа-яЁё0-9]+[\s\,\.\-]*)+$/u', trim($this->name)) != 1)
                   return false; */
                 $this->sendExpertInfoByEmail();
                 $this->password = $this->crypt($this->password);
                 break;
             case 'edit_expert':
                 break;
             case 'update_pass':
                 $this->password = $this->crypt($this->password);
                 break;
             case 'edit_user_info':
                 $this->email = HtmlPurifier::process(htmlspecialchars_decode($this->email));
                 $this->full_name = HtmlPurifier::process(htmlspecialchars_decode($this->full_name));
 
                 if ($this->passwordChanged)
                     $this->password = $this->crypt($this->password);
                 break;
         }
         return true;
     }
     
   
    /**
     *
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     */
    public function setPassword($password)
    {
        $this->password = $this->crypt($password);
    }
    
    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     *
     */
    public function validatePassword($password) {

        return $this->password == $this->crypt($password);
    }
   
    
    /**
     * Поведение для автоматического заполнения свойств created_at и updated_at
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * 
     */
    public function behaviors()
    {
        return  [
                    [
                        'class' => TimestampBehavior::className(),
                        'attributes' => [
                            ActiveRecord::EVENT_BEFORE_INSERT => ['reg_date', 'updated_at'],
                            ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                        ],
                    ],
        ];
    }
    
    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * 
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email'=>$email]);
    }
    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * 
     */
    public static function findByUsername($name)
    {
        return static::findOne(['name'=>$name]);
    }
    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * 
     */
    public function findUser()
    {
        return $this::find()
                ->where(['email' => $this->email, 'password' =>  $this->crypt($this->password), 'status' => User::STATUS_ACTIVE])
                ->orwhere(['name' => $this->email, 'password' =>  $this->crypt($this->password), 'status' => User::STATUS_ACTIVE])
                ->one();
    }
    
    /**
     * Проверяет логин и пароль, если правильные - заполняет ID
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     * @param string $this->name Имя пользователя
     * @param string $this->password MD5(MD5) пароля
     * @return boolean наличие в базе такого логина и пароля 
     */
    public function checkAuth() {
      
        $oneUser = $this->find()
                ->where(['name' => $this->name,
                    'password' => $this->password])
                ->orWhere(['email' => $this->name,
                    'password' => $this->password])
                ->andWhere(['status' => User::STATUS_ACTIVE])
                ->one();

        /*   $oneUser = $this->findOne([
          'name' =>  $this->name,
          // 'name' =>   $this->name,
          // 'name' => $this->name,
          'password' => $this->password,
          ]);

         */

        if (is_null($oneUser) || !isset($oneUser['user_id']))
            return false;
        $this->user_id = $oneUser['user_id'];
        return true;
    }

   

    public function crypt($password) {
        return md5(md5($password));
    }

    
    
     /**
     * Получает имя пользователя по ID
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     * @param int $this->user_id ID пользователя
     * @return string
     */
    public function getName() {
        $response = $this->findOne(['user_id' => $this->user_id]);
        return (!is_null($response) && isset($response['name'])) ? $response['name'] : '';
    }
        /**
     * Проверяет является ли пользователь компанией
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     * @param int $this->user_id ID пользователя
     * @return boolean
     */
    public function isCompany() {
        $model = $this->findOne(['user_id' => $this->user_id]);
        if (!is_null($model) && isset($model['user_group']) && $model['user_group'] == self::ROLE_COMPANY)
            return true;
        return false;
    }

    /**
     * Проверяет является ли пользователь  экспертом
     * @author Kovalchuk Alexander
     * @date 22.10.15
     * @param int $this->user_id ID пользователя
     * @return boolean
     */
    public function isExpert() {
        $model = $this->findOne(['user_id' => $this->user_id]);
        if (!is_null($model) && isset($model['user_group']) && $model['user_group'] == self::ROLE_EXPERT)
            return true;
        return false;
    }
   

    /**
     * Получает имя пользователя по ID
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     * @param int $this->user_id ID пользователя
     * @return string
     */
    public function getFullName() {
        $response = $this->findOne(['user_id' => $this->user_id]);
        return (!is_null($response) && isset($response['full_name'])) ? $response['full_name'] : '';
    }
    
     /**
     * Получает имя и электронную почту пользователя
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     * @param int $this->user_id ИД пользователя
     * @return type
     */
    public function getUser() {
        $model = $this->findOne(['user_id' => $this->user_id]);
        return !is_null($model) ? [
            'name' => isset($model['name']) ? $model['name'] : '',
            'email' => isset($model['email']) ? $model['email'] : '',
            'full_name' => isset($model['full_name']) ? $model['full_name'] : '',
            'id' => isset($model['id']) ? $model['id'] : 0
                ] : [
            'name' => '',
            'email' => '',
            'full_name' => '',
            'id' => 0
        ];
    }
    
    /**
     * Находим пользователя по емайл
     * @author Kovalchuk Alexander <syrex92@gmail.com>
     * @date 02.15
     * @param strint $this->email email пользователя
     * @return bool
     */
    public function findUserByEmail() {
        return $this->find()->where(['email' => $this->email])->one();
    }
    /**
     *
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();

        $scenarios['reg_expert'] = [
            'name',
            'email',
            'password'];

        $scenarios['reg_user'] = [
            'full_name',
            'name',
            'email',
            'password', 
            'status',
            ];
        $scenarios['edit_expert'] = [
            'email'
        ];

        $scenarios['reg_from_qa'] = [
            'name',
            'email'
        ];
        $scenarios['reg_from_review'] = [
            'name',
            'email',
            'full_name',
            'password',
            
        ];
         $scenarios['reg'] = [
            'name',
            'email',
            'password',
            'full_name',
             'status'
        ];


        $scenarios['edit_user_info'] = [
            'name',
            'email',
            'password',
            'full_name'
        ];
        
        $scenarios['login'] = [
            'email',            
            'password',
            
        ];

        $scenarios['update_pass'] = ['password'];
        return $scenarios;
    }
    
     /**
     * Проводит регистрацию пользователя по заполненным данным
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     * @return bool
     */
    public function register() {
        return $this->save();
    }
    public function rememberPassword(){
        $email = new Email;
        $email->template = 'remember_password';
        $email->from = \yii::$app->params['emailFrom'];
        $email->to = $this->email;
        $email->subject = 'Ваш новый пароль';
        $new_pass = $this->generate_password(8);
        $email->params = [
            'name' => $this->name,
            'login' => $this->name,
            'email' => $this->email,
            'password' =>$new_pass
        ];
        
        $this->update_pass = 'update_pass';
        $this->password = md5(md5($new_pass));
        $this->save();
        $email->send();
    }
    
    
     /**
     * Возвращает сгенерированный пароль
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @param int $number Длина пароля
     * @return string
     */
    public function generate_password($number) {
        $arr = array('a', 'b', 'c', 'd', 'e', 'f',
            'g', 'h', 'i', 'j', 'k', 'l',
            'm', 'n', 'o', 'p', 'r', 's',
            't', 'u', 'v', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F',
            'G', 'H', 'I', 'J', 'K', 'L',
            'M', 'N', 'O', 'P', 'R', 'S',
            'T', 'U', 'V', 'X', 'Y', 'Z',
            '1', '2', '3', '4', '5', '6',
            '7', '8', '9', '0', '.', ',',
            '(', ')', '[', ']', '!', '?',
            '&', '^', '%', '@', '*', '$',
            '<', '>', '/', '|', '+', '-',
            '{', '}', '`', '~');
        // Генерируем пароль
        $pass = "";
        for ($i = 0; $i < $number; $i++) {
            // Вычисляем случайный индекс массива
            $index = rand(0, count($arr) - 1);
            $pass .= $arr[$index];
        }
        return $pass;
    }
   
    

    /**
     * Получаем данные по ID
     * @param $id
     * @return array|null|string|ActiveRecord
     */
    public function getDataFromId($id){
        $model = self::find()
            ->where(['user_id'=> $id])
            ->one();
        if(!empty($model))
            return $model;
        else
            return 'no';
    }

    
    /**
     * Получаем массив с данными по пользователям для рассылки*
     * @return array
     */
    public function getDataArr(){
        $model = self::find()
            ->all();
        $arrData=array();
        foreach($model as $val){
            $arrData[$val['user_id']]['user_id'] = $val['user_id'];
            $arrData[$val['user_id']]['email'] = $val['email'];
        }
        return $arrData;

    }
     


    /**
     * Проверяет является ли пользователь  админом
     * @author Kovalchuk Alexander
     * @date 23.10.15
     * @param int $this->user_id ID пользователя
     * @return boolean
     */
    public function isAdmin() {
        $model = $this->findOne(['user_id' => $this->user_id]);
        if (!is_null($model) && isset($model['user_group']) && $model['user_group'] == self::ROLE_ADMIN)
            return true;
        return false;
    }

    /**
     * Сохранить изменения информации об эксперте
     * @author Kovalchuk Alexander
     * @date 26.10.15
     * @param int $this->user_id ID пользователя
     * @return boolean
     */
    public function editExpert() {
        return $this->save();
    }

    /**
     * удаляет по ид
     * @author Kovalchuk Alexander
     * @date 27.10.2015
     * 
     * @param int $id ид записи
     * 
     */
    public function remove($id) {
        return $this->deleteALL('user_id = :id', ['id' => (int) $id]);
    }

    /**
     * Получаем данные по e-mail
     * @param $mail
     * @return array|null|ActiveRecord
     */
    public function getDataFromMail($mail){
        $model = self::find()
            ->where(['email'=> $mail])
            ->one();
        if(!empty($model))
            return $model;
    }

     /**
     * Отправляет информацию о пользователе по электронной почте
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @param string $this->email Почта пользователя
     * @param string $this->name Имя пользователя
     * @param string $this->password Пароль пользователя
     */
    public function sendUserInfoByEmail($pass) {
        $email = new Email;
        $email->template = 'register';
        $email->from = \yii::$app->params['emailFrom'];
        $email->to = $this->email;
        $email->subject = 'Ваша регистрация на портале 711.ru успешно завершена.';
        $email->params = [
            'name' => $this->full_name,
            'login' => $this->name,
            'email' => $this->email,
            'password' => $pass
        ];
        $email->send();
    }
    
}
