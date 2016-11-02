<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Company;
use app\models\Review;
use app\models\AllCity;
use app\models\InsuranceRating;

/**
 * Контроллер раздела компании
 */
class AddreviewController extends Controller {

   
    /**
     * Действие добавления отзыва с активным статусом для залогиненного пользователя
     * и нового пользователя с неактивным статусом, если он не был зарегистрирован
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 08.09.2016
     * 
     */

    public function actionAddreview()
    {
        $obj_company = new Company;        
        $companes = $obj_company->getCompany();
        $review = new Review;        
        $review->scenario = 'add_review';     
        if($review->load(\Yii::$app->request->post()) && $review->validate() && ($review->mt_rand == Yii::$app->session->get('mt_rand'))){
            Yii::$app->session->set('mt_rand','');
            if(!\Yii::$app->user->isGuest){
                $review->user_id = \Yii::$app->user->identity->user_id;
                $review->email = \Yii::$app->user->identity->email;
                $review->name = (\Yii::$app->user->identity->full_name != '') ? \Yii::$app->user->identity->full_name : \Yii::$app->user->identity->name;
                $review->addReview();
                $review->mt_rand = mt_rand();
                $rating = new InsuranceRating;
                $rating->company_id = $review->company_id;
                $rating->updateRating($review->rating);
                Yii::$app->session->setFlash('success');
                return  $this->refresh();
            }else{
                $review->confirmEmail();
                Yii::$app->session->setFlash('confirm');
                return  $this->refresh();
            }
            
        }
        foreach (\yii::$app->params['staticTypes'] as $k) $typeArr[$k] = $k;
        $review->mt_rand = mt_rand();
        Yii::$app->session->set('mt_rand',$review->mt_rand);
        return $this->render('formreview', ['review'=>$review, 'type'=>$typeArr, 'companes'=>$companes]);

    }
     
   
    /**
     * Активация пользователя, если он не был активен, и отзыва.
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016
     * @return string
     */


    public function actionAddnew()
    {        
        $email = urldecode(Yii::$app->request->get('email'));
        $auth_key = urldecode(Yii::$app->request->get('auth_key'));
        $review = Review::findOne(['review_id'=>Yii::$app->request->get('review_id')]);
        $user = User::findByEmail($email);
        $message = '';
        //var_dump(is_object($user));die();
        if(is_object($user) && is_object($review) && $user->validateAuthKey($auth_key)){
            $user->scenario = 'reg_user';
            if($user->status == User::STATUS_NOT_ACTIVE){
                $user->status = User::STATUS_ACTIVE;
                $pass = $user->generate_password(8);
                $user->password = $user->crypt($pass);
                $user->sendUserInfoByEmail($pass);
                $message = 'Ваш аккаунт на сайте 711.ru активирован.';
            }
            if($review->status==Review::STATUS_NOT_ACTIVE && $user->validateAuthKey($auth_key) && $user->user_id==$review->user_id){
                $review->user_id = $user->user_id;
                $review->status = Review::STATUS_ACTIVE;
                $review->scenario = 'add_review';
                $review->addReview();
                $rating = new InsuranceRating;
                $rating->company_id = $review->company_id;
                $rating->updateRating($review->rating);               
                $user->generateAuthKey();
                $user->save();
                return $this->render('message', ['message'=>'Ваш отзыв опубликован. '.$message]);
            }
        
        
        }
    }
    

    /**
     * Страница добавления отзыва
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @return string
     */
    public function actionIndex() {
        $user = new User;
        $user->user_id = yii::$app->user->id;
        $user_info = $user->getUser();
        $company = Yii::$app->request->get('id');
        $static_types = \yii::$app->params['staticTypes'];
        return $this->render('index', [
                    'company' => is_null($company) ? 0 : $company,
                    'id' => $user_info['id'],
                    'name' => $user_info['name'],
                    'full_name' => $user_info['full_name'],
                    'email' => $user_info['email'],
                    'types' => $static_types,
                    'companies' => (new Company)->getRightList()
        ]);
    }

}
