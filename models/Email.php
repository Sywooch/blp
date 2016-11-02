<?php

namespace app\models;

use Yii;
use yii\db\Exception;
use Swift_SwiftException;

class Email
{
    public $template;
    public $params;
    public $from;
    public $to;
    public $subject;
    
    public function __construct() {
        $this->params = [];
    }
    
    public function send()
    {
        return \yii::$app->mailer->compose($this->template, $this->params)
                ->setFrom($this->from)
                ->setTo($this->to)
                ->setSubject($this->subject)
                ->send();
    }
    /**
     * проверить почту
     * @param string $this->email;
     * 
     * return boolean;
     */
    public function isEmail(){
        if (preg_match('/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/u', trim($this->to)) != 1)
            return false;
    }

    /**
     * Отправка почты из БД таблицы email_sending
     * @return bool
     */
    
    public function send2(){
        
            return \Yii::$app->mailer->compose()
            ->setTo($this->to)
            ->setFrom($this->from)
            ->setSubject($this->subject)
            ->setHtmlBody($this->body)
            ->send();
        
    }
    
    
    /**
     * Отправка email для подтверждения регистрации
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 29.08.2016
     * @param string $email адрес отправки
     * @param string $templ используемое представление
     * @param string $name Тема сообщения
     * @param array $params массив, передаваемый во view письма 
     * @param string $pass сгенерированный пароль
     * 
     */
    public function send3($email, $templ, $subject='', $params=[])
    {
        try{
        \Yii::$app->session->setFlash('success', 'Вам на почту было отправлено письмо. Для публикации вашего отзыва необходимо подтвердить Ваш email.');               
        $let= new \app\models\Email();
        $let->from = 'noreply@711.ru';
        $let->to = $email;
        $let->template=$templ;
        $let->params = $params;
        $let->subject = $subject;      
        $let->send();        
        }catch (Swift_SwiftException $e){};
    }
}

