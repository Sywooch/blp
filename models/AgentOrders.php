<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use app\models\Email;

/**
 * This is the model class for table "olit_orders_agents".
 *
 * @property integer $order_id
 * @property integer $user_id
 * @property integer $agent_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $user_email
 * @property string $user_phone
 * @property string $user_fullname
 * @property string $user_message
 * @property integer $order_status
 */
class AgentOrders extends \yii\db\ActiveRecord
{
    const STATUS_NOT_ACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_IN_WORK = 2;
    const STATUS_CLOSED = 3;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_agent_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'agent_id',  'status'], 'integer'],
            ['user_email', 'email'],
            [['user_email', 'user_phone', 'user_fullname', 'user_message', 'type', 'agent_id'], 'required', 'message'=>'Заполните все поля'],
            [['user_email', 'user_phone', 'user_fullname', 'user_message', 'type', 'user_city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'agent_id' => 'Agent ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_email' => 'User Email',
            'user_phone' => 'User Phone',
            'user_fullname' => 'User Fullname',
            'user_message' => 'User Message',
            'user_city' => 'User City',
            'type' => 'Тип страхования',
            'status' => 'Статус',
        ];
    }
    
  
    
    /**
     * Сохранение заявки, присвоение статуса. Если пользователь не залогинен или не зарегистрирован, то отправляется письмо с 
     * подтверждением по почте 
     * В результате подтверждения регистрация, активация юзера и отзыва
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 01.09.2016
     * 
     * 
     */
    public function saveOrders()
    {  
        $email = new Email; 
        if(\Yii::$app->user->isGuest):
            $user = User::findByEmail($this->user_email);
            if(is_object($user)):
                $this->user_id = $user->user_id;
                $this->save();
                $params = ['user' => $user, 'order_id' => $this->order_id];
                $email->send3($this->user_email, 'confirm_order', $params);
            else:
                $user = new User();
                $user->full_name = $this->user_fullname;
                $user->name = $this->user_email;
                $user->email = $this->user_email;
                $user->status = User::STATUS_NOT_ACTIVE;
                $user->role = 'client';
                $pass = $user->generate_password(8);
                $user->password = $user->crypt($pass);
                $user->generateAuthKey();
                $user->save();
                $this->user_id = $user->user_id;                
                $this->save();
                $params = ['user' => $user, 'order_id' => $this->order_id, 'pass'=>$pass];
                $email->send3($this->user_email, 'confirm_order_and_reg', $params);
            endif;
        else:
            $this->status = self::STATUS_ACTIVE;
            $this->save();
            //$email->send3($this->user_email, 'notify_about_order_to_client');
            $agent = User::findOne(['user_id' => $this->agent_id]);
            $email->send3($agent->email, 'notify_about_order_to_agent');
        endif;  
    }
    
     /**
     *  
     * Уведомление агенту о пришедшей подтвержденной заявке со статусом 1
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 02.09.2016
     *
     */
    public function agentNotify()
    {  
        
    }
    
     /**
     *  
     * Уведомление клиенту о взятии в работу его заявки - изменение статуса на 2
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 02.09.2016
     *
     */
    public function clientNotify()
    {  
        
    }
    
    /**
     * Поиск по order_id
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 02.09.2016
     * 
     */
    public static function findByid($order_id)
    {
        return static::findOne(['order_id'=>$order_id]);
    }
    
    /**
     * Изменяет статус заявки в зависимости от данных, полученных методом get
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 02.09.2016
     * 
     */
    
    public function changeOrderStatus()
    {
        if(\Yii::$app->request->get('accept') == self::STATUS_IN_WORK):
            $row = AgentOrders::find()->where('agent_id=:agent_id AND status=:status AND order_id=:order_id' , [':agent_id'=>\Yii::$app->user->identity->user_id, ':order_id'=>\Yii::$app->request->get('order_id'), ':status' => self::STATUS_ACTIVE])->one();
            if(is_object($row)):
                $email = new Email;
                $row->status = self::STATUS_IN_WORK;
                $row->save();
                $param = ['status' => 'Агент принял Вашу заявку.'];
                $email->send3($row->user_email, 'agents/notify_about_order_to_client', $param);
                
            endif;
        elseif(\Yii::$app->request->get('accept') == self::STATUS_CLOSED):
            $row = AgentOrders::find()->where('agent_id=:agent_id AND status=:status AND order_id=:order_id', [':agent_id'=>\Yii::$app->user->identity->user_id,':order_id'=>\Yii::$app->request->get('order_id'), ':status' => self::STATUS_IN_WORK])->one();
            if(is_object($row)):
                $email = new Email;
                $row->status = self::STATUS_CLOSED;
                $row->save();
                $param = ['status' => 'Ваша заявка выполнена.'];
                $email->send3($row->user_email, 'agents/notify_about_order_to_client', $param);
                
                
            endif;
        else:
            return false;
        endif;
    }
    
    /**
     * Поведение для автоматического заполнения свойств created_at и updated_at
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 02.09.2016
     * 
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }
}
