<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Email;
use app\models\forms\RegUser;
use app\models\forms\Restore;

/**
 * @author Maxim Shablinskiy maxshabl@yandex.ru
 * @date 04.08.2016
 */
class RegisterController extends Controller
{
    /**
     * Перенаправляем пользователя на статью с правилами
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * 
     */
    public function actionIndex()
    {
        return $this->render("rules");
    }
    
    /**
     * Выход
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 07.09.2016
     * 
     */
    public function actionLogout()
    {        
        Yii::$app->user->logout();
        return $this->goHome();
    }
    
    /**
     * Вход
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 07.09.2016
     * 
     */
    public function actionLogin()
    {   
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new User;
        $user = $model->findUser();
        $model->scenario='login';
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = $model->findUser();
            if(is_object($user)) {
                Yii::$app->user->login($user);
                return $this->goHome();
            }else {
            $model->addError('email', 'Пользователь не найден или не активирован');
            }
        }
        return $this->render('login', ['model'=>$model]);
    }
    /**
     * Регистрация пользователя и отправка email для подтверждения аккаунта
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * 
     */
    public function actionRegister()
    {       
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new RegUser;
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($user = $model->reg()) {
                if($user->status === User::STATUS_NOT_ACTIVE) {
                    $message = $this->renderPartial('emailreg', ['user' => $user]);
                        $email = new Email;
                        $email->from = 'noreply@711.ru';
                        $email->to = $user->email;
                        $email->subject = 'Активация аккаунта на сайте 711.ru';
                        $email->body = $message;
                        try{$email->send2();}catch (Swift_SwiftException $e){};
                    return $this->render('message', ['message'=>'Вам на почту был отправлен email для подтверждения Ваших регистрационных данных']);
                }
            }
            
        }
        return $this->render('register', ['model'=>$model]);

    }
     /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * Подтверждение регистрации
     */
    public function actionConfirm()
    {
        $user = User::findByUsername(Yii::$app->request->get('name'));
        if(!is_object($user)) return $this->render('message', ['message'=>'Возникла ошибка! Ваша ссылка недействительна!']);
        if($user->auth_key == Yii::$app->request->get('key') and $user->status == User::STATUS_NOT_ACTIVE):         
            Yii::$app->getUser()->login($user);
            Yii::$app->user->identity->status = User::STATUS_ACTIVE;            
            Yii::$app->user->identity->save();
            return $this->render('message', ['message'=>'Ваш аккаунт активирован']);
        elseif($user->auth_key == Yii::$app->request->get('key') and $user->status == User::STATUS_ACTIVE):
            return $this->render('message', ['message'=>'Вы уже активировали свой аккаунт!']);
        else:
            return $this->render('message', ['message'=>'Возникла ошибка! Ваша ссылка недействительна!']);
        endif;
    }
    
    public function actionRememberPassword(){
        
        $email = Yii::$app->request->post('Restore')['email'];
        if($email){
            $user = User::findOne(['email'=>$email]);
            if($user){
                $user->rememberPassword();
                return $this->render('/register/remember_password_success');
            }else{
                return  $this->render('/register/remember_password_failed');
            }
        }
        $model = new Restore();
        return $this->render('/register/remember_password', [
            'model' => $model,
        ]);
        
    }
    
    public function actionPassrecovery()
    {
        $model = new Restore();
        if($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $user = User::findOne(['email'=>$model->email]);
            if(is_object($user)) {
                $user->rememberPassword();
                return $this->render('message', ['model' => $model,
                    'message'=>'Ваш пароль успешно изменён и выслан Вам на почту!']);
            }
        }    
        return $this->render('chenge_pass', ['model' => $model]);
    
    }
    
}