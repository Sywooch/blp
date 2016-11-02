<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\forms\RegUser;
use app\models\AboutAgents;
use app\models\User;
use app\models\forms\Login;
use yii\helpers\Url;
use app\models\Company;
use app\models\AllCity;
use app\models\forms\UploadForm;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use app\models\AgentsReviews;
use app\models\AgentOrders;
use app\models\AgentsRevComments;
use app\models\forms\Capcha;
use app\models\Email;

class AgentsController extends Controller 
{

    public $layout = 'agents/main';
    
     /**
     * 
     * Регистрация клиента
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016
     * 
     */
    public function actionRegister(){
        
        $model = new RegUser;
        if($model->load(Yii::$app->request->post()) && $model->validate()):
            if($user = $model->reg()):
                if($user->status === User::STATUS_NOT_ACTIVE):
                    $message = $this->renderPartial('emailreg', ['user' => $user]);
                    $model->sendRegMail($model->email, $message);      
                    return $this->redirect(Url::to(['/agents']));
                endif;
            else:
                Yii::$app->session->setFlash('error', 'Возникла ошибка');
                return $this->refresh();
            endif;
        endif;      
        
        return $this->render('reguser', ['model'=>$model]);       
      
    }
    
     /**
     * 
     * Подтверждение email и активация заявки, а так же активация юзера, если он ранее не был активирован.
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 02.09.2016
     * 
     */
    public function actionConfirmorder()
    {
        $user = User::findByEmail(urldecode(\Yii::$app->request->get('email')));
        $order = AgentOrders::findById(\Yii::$app->request->get('order_id'));
        if(is_object($user) && is_object($order)):
            if($user->auth_key == Yii::$app->request->get('key') && $user->status == User::STATUS_NOT_ACTIVE):
                $user->status = User::STATUS_ACTIVE;
                $user->save();
                Yii::$app->getUser()->login($user);
            endif;
            if($user->auth_key == Yii::$app->request->get('key') && $order->status == AgentOrders::STATUS_NOT_ACTIVE):
                $email = new Email;
                $order->status = AgentOrders::STATUS_ACTIVE;
                $order->save();
                Yii::$app->session->setFlash('confirm', 'Ваш email подтвержден, Ваша заявка активирована!');
                $agent = User::findOne(['user_id' => $order->agent_id]);
                $email->send3($agent->email, 'notify_about_order_to_agent');
            endif;
        else:
            Yii::$app->session->setFlash('error', 'Возникла ошибка c активацией заявки!');
        endif;
        return $this->redirect(Url::to(['/agents'])); 
    }
    
     /**
     *
     * Подтверждение email и активация отзыва об агенте, а так же активация юзера, если он ранее не был активирован.
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016
     * 
     */
    public function actionConfirm()
    {       
        
        $user = User::findByEmail(urldecode(Yii::$app->request->get('email')));
        $revAboutAgent = AgentsReviews::findById(Yii::$app->request->get('review_id'));  
        if(is_object($user) && is_object($revAboutAgent)):
            if($user->auth_key == Yii::$app->request->get('key') &&  
                        $revAboutAgent->status == AgentsReviews::STATUS_NOT_ACTIVE && $revAboutAgent->user_id == $user->user_id):                
                Yii::$app->getUser()->login($user);            
                if(Yii::$app->user->identity->status == User::STATUS_NOT_ACTIVE):
                    Yii::$app->user->identity->status = User::STATUS_ACTIVE;
                    Yii::$app->user->identity->save();
                endif;
                $revAboutAgent->status = AgentsReviews::STATUS_ACTIVE;
                $revAboutAgent->save();
                Yii::$app->session->setFlash('confirm', 'Ваш email подтвержден, Ваш отзыв опубликован!');
                return $this->redirect(Url::to(['/agents']));
            elseif($user->auth_key == Yii::$app->request->get('key') && 
                    $user->status == User::STATUS_ACTIVE && 
                        $revAboutAgent->status == AgentsReviews::STATUS_NOT_ACTIVE && $revAboutAgent->user_id == $user->user_id):
                Yii::$app->session->setFlash('confirm', 'Ваш отзыв опубликован!');
                return $this->redirect(Url::to(['/agents']));                
            endif;
        elseif(is_object($user) && !is_object($revAboutAgent)):
            if($user->auth_key == Yii::$app->request->get('key') && $user->status == User::STATUS_NOT_ACTIVE):
            Yii::$app->getUser()->login($user);
            Yii::$app->user->identity->status = User::STATUS_ACTIVE;
            Yii::$app->user->identity->save();
            Yii::$app->session->setFlash('confirm', 'Ваш email подтвержден, Ваш аккаунт активорован!');
            return $this->redirect(Url::to(['/agents'])); 
            endif;
        endif;
            Yii::$app->session->setFlash('error', 'Возникла ошибка! Ваша ссылка недействительна!');
            return $this->redirect(Url::to(['/agents'])); 
               

    }
    
    
     /**
     * 
     * Регистрация агента, если такая почта есть у юзера, то высылаем письмо для подтверждения все равно.
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016
     * 
     */
    public function actionRegagent(){
        $AllCitiy = new AllCity();
        $cities = $AllCitiy->cities();
        $obj_company = new Company();
        $company = $obj_company->getCompany();
        foreach (\yii::$app->params['staticTypes'] as $k) $type[$k] = $k;
        //var_dump($arr);
        $formagent = new AboutAgents;
        $formagent->scenario = 'reg';
        $formuser = new RegUser;
        if($formuser->load(Yii::$app->request->post()) && $formuser->validate() && $formagent->load(Yii::$app->request->post()) && $formagent->validate()):
            if($user = $formuser->reg('agent')): 
                if($user->status === User::STATUS_NOT_ACTIVE): 
                    $message = $this->renderPartial('emailreg', ['user' => $user]);
                    $formuser->sendRegMail($user->email, $message);
                    $formagent->addAccount($user->user_id);
                    return $this->redirect(['/agents']);
                endif;
            else:
                Yii::$app->session->setFlash('error', 'Возникла ошибка');
                return $this->refresh();
            endif;        
        endif;
        
        return $this->render('regagent', ['formagent'=>$formagent, 'formuser'=>$formuser, 'company'=>$company, 'type'=>$type, 'cities'=>$cities]);
    }
   
    /**
     * Загрузка картинок для зарегистрированных пользователей
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016
     * 
     */
    
    public function actionUploadimg()
    {
        $model = new UploadForm();
        if (Yii::$app->request->isPost)
        {
            $id = Yii::$app->user->identity->user_id;
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->upload($id))
                return $this->redirect(['index']);
        }
        
        return $this->render('uploadimg', ['model'=>$model]);
    }
    
    /**
     * Собирает данные профиля агента
     * 
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016
     * 
     */
    public function actionAccount()
    {
        $agent = AboutAgents::findOne(['agent_id' => \yii::$app->user->identity->user_id]);
        return $this->render('account', ['agentdata'=>$agent]);
    }
    
    /**
     * Вход
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016
     * 
     */
    
    public function actionLogin()
    {
        $model = new Login;  
        if($model->load(Yii::$app->request->post())):
           $model->login();
           return $this->redirect(['/agents']);  
        endif;       
        return $this->render('login', ['model'=>$model]);
    }
    
    /**
     * Выход
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 16.08.2016
     * 
     */
    
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/agents']);
    }
    
     /**
     * Оставить отзыв об агенте
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 16.08.2016
     * 
     */
    public function actionAddreview()
    {
        $model = new AgentsReviews;
        $AllCitiy = new AllCity();
        $cites = $AllCitiy->cities();
        if ($model->load(Yii::$app->request->post())):
            if ($model->validate())
                $model->saveReview();
            $this->redirect(['index']);
        endif;
        $firstname = \Yii::$app->request->get('firstname');
        $surname = \Yii::$app->request->get('surname');
        return $this->render('addreview', ['model' => $model, 'firstname'=>$firstname, 'surname'=>$surname, 'cites'=>$cites]);
    }
    
    /**
     * 
     * Показать отзывы об агенте в его личном кабинете
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 31.08.2016
     * 
     */
    public function actionShowreviewslk()
    {
        $provider = new ActiveDataProvider([
            'query' => AgentsReviews::find()->where(['agent_id'=>\Yii::$app->user->identity->user_id])->orderBy(['created_at' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        
        $providerComment = new ActiveDataProvider([
            'query' => AgentsRevComments::find()->where(['agent_id'=>\Yii::$app->user->identity->user_id]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('show_reviews_lk', ['provider' => $provider, 'providerComment' => $providerComment]);
    }
    
    /**
     * 
     * Показать заявки агенту в его личном кабинете
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 02.09.2016
     * 
     */
    public function actionShoworderslk()
    {
        if(\Yii::$app->request->get('menu')=='arhive'):
            $order = new AgentOrders;
            $order->changeOrderStatus();
            $provider = new ActiveDataProvider([
                'query' => AgentOrders::find()->where('status=:status AND agent_id=:agent_id', [':agent_id'=>\Yii::$app->user->identity->user_id, ':status' => AgentOrders::STATUS_CLOSED])->orderBy(['created_at' => SORT_ASC]),
                'pagination' => [
                    'pageSize' => 5,
                ],
            ]);
            
            return $this->render('show_orders_lk', ['provider' => $provider]);
        endif;
        
        $order = new AgentOrders;
        $order->changeOrderStatus();
        $provider = new ActiveDataProvider([
            'query' => AgentOrders::find()->where('(status=:status1 OR status=:status2) AND agent_id=:agent_id', [':agent_id'=>\Yii::$app->user->identity->user_id, ':status1' => AgentOrders::STATUS_ACTIVE, ':status2' => AgentOrders::STATUS_IN_WORK])->orderBy(['created_at' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('show_orders_lk', ['provider' => $provider]);
    }
    
    /**
     * 
     * Показывает комментарии к отзывам
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 01.09.2016
     * 
     */
    public function actionAddrevcomments()
    {      
        $review = AgentsReviews::findone(['review_id' => \Yii::$app->request->get('review_id')]);
        $provider = new ActiveDataProvider([
            'query' => AgentsRevComments::find()->where(['review_id' => \Yii::$app->request->get('review_id')])->orderBy(['created_at' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        $AgentsRevComments = new AgentsRevComments;
        $AgentsRevComments->name = \Yii::$app->user->identity->name;
        $capcha = new Capcha;
        if($AgentsRevComments->load(\Yii::$app->request->post()) && $AgentsRevComments->validate() && $capcha->load(\Yii::$app->request->post()) && $capcha->validate())
            $AgentsRevComments->save();
        
            
        return $this->render('add_rev_comments', ['review' => $review, 'provider' => $provider, 'comment' => $AgentsRevComments, 'capcha' => $capcha]);
    }
    
    /**
     * 
     * Поиск и фильтрация агентов по различным параметрам.
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 16.08.2016
     * 
     */
    public function actionIndex() 
    {         
        $agents = new AboutAgents;       
        $agents->scenario = 'indexsearch';
        $obj_company = new Company();
        $AllCitiy = new AllCity();
        $cites = $AllCitiy->cities();
        $companes = $obj_company->getCompany();
        foreach (\yii::$app->params['staticTypes'] as $k) $typeArr[$k] = $k;        
        $rows = $agents->search();
        $provider = new ActiveDataProvider([
            'query' => $rows,
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort' => ['attributes'=>['experience' => ['label'=>'По опыту работы'],                                         
                                        'birthday' => ['label'=>'По дате рождения'],
                                        'rating' => ['label'=>'По рейтингу']]]
        ]);  
        echo $rows->createCommand()->getRawSql();
           //var_dump($cites);
        return $this->render('index', ['provider'=>$provider, 'agents'=>$agents, 'cites'=>$cites, 'companes'=>$companes, 'type'=>$typeArr]);
        
    }
    
    /**
     * Отправка заявки агенту.
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 29.08.2016
     * 
     */
    public function actionSendorder()
    {
        $firstname = \Yii::$app->request->get('firstname');
        $surname = \Yii::$app->request->get('surname');
        $AllCitiy = new \app\models\AllCity();
        $cites = $AllCitiy->cities();        
        foreach (\yii::$app->params['staticTypes'] as $k) $typeArr[$k] = $k;
        $orders = new AgentOrders;
        if($orders->load(\Yii::$app->request->post()) && $orders->validate()):
            $orders->saveOrders();
            return $this->redirect(['/agents/sendorder']);
        endif;
        return $this->render('sendorder', ['orders'=>$orders, 'cites'=>$cites, 'type'=>$typeArr, 'surname'=>$surname, 'firstname'=>$firstname]);
    }
    
    /**
     * Обновление информации об агенте.
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 30.08.2016
     * 
     */
    public function actionUpdateinfo()
    {
        $AllCitiy = new AllCity();
        $cities = $AllCitiy->cities();
        $obj_company = new Company();
        $company = $obj_company->getCompany();     
        foreach (\yii::$app->params['staticTypes'] as $k) $type[$k] = $k;
        $agent = AboutAgents::findOne(['agent_id' => \yii::$app->user->identity->user_id]);
        $agent->scenario = 'reg';
        if($agent->load(\Yii::$app->request->post()) && $agent->validate()) $agent->save();
        $agent->company = $agent->selectedHtml($agent->company);
        $agent->ins_type = $agent->selectedHtml($agent->ins_type);
        $agent->birthday = date('M j, Y', strtotime($agent->birthday));
        
        return $this->render('updateinfo', ['agent'=>$agent, 'cities'=>$cities, 'company'=>$company, 'type' => $type]);
    }
    
}
