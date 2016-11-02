<?php

namespace app\controllers;

use Yii;

use app\models\Company;
use app\controllers\BehaviorsController;
use app\models\Review;
use app\models\forms\UpdateUser;
use app\models\User;
use yii\helpers\HtmlPurifier;
use app\models\Comment;
use yii\data\Pagination;


class CabinetController extends BehaviorsController {


    /**
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @return string
     */
    public function actionIndex() {
        $this->redirect('/?do=cabinet');
    }

    /**
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @return string
     */
    public function actionEditinfo() {
        if (!\yii::$app->request->isPost || \yii::$app->user->isGuest)
            $this->redirect('/?do=cabinet');
        $user = new User;
        $user->user_id = \yii::$app->user->id;
        if (!$user->isCompany())
            $this->redirect('/?do=cabinet');
        $company = Company::findOne(['user_id' => \yii::$app->user->id]);
        $company->scenario = 'edit';
        $company->address = \yii::$app->request->post('address');
        $company->phone = \yii::$app->request->post('phone');
        $company->site = \yii::$app->request->post('site');
        $company->license = \yii::$app->request->post('license');
        $company->editCompany();
        $this->redirect('/?do=cabinet');
    }

    /**
     * Ajax действие для сохранения пользовательской информации
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 6.11.15
     * @return string
     */
    public function actionAjaxsaveuserinfo() {
        if (!Yii::$app->request->isPost || Yii::$app->user->isGuest)
            return 'request is not post or user is guest';
        $user = User::findOne(['user_id' => \Yii::$app->user->identity->user_id]);
        if (is_null($user))
            return 'user is not found';
        $post = Yii::$app->request->post();
        if (is_null(Yii::$app->request->post('name')) || is_null(Yii::$app->request->post('email')))
            return 'name or email not defined';
        //$user->scenario = 'edit_user_info';
        $user->name = Yii::$app->request->post('name');
        $user->email = Yii::$app->request->post('email');
        $user->full_name = Yii::$app->request->post('full_name');
        if (Yii::$app->request->post('password') != '') {
            //$user->passwordChanged = true;
            $user->password = $user->crypt(Yii::$app->request->post('password'));
            
        }
        if ($user->save())
            return 'success';
        else
            return isset($user->getFirstErrors()['name']) ? $user->getFirstErrors()['name'] : $user->getFirstErrors()['email'];
        
        
    }

    /**
     * Страница редактирования пользовательской информации
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 6.11.15
     * @return string
     */
    public function actionEdituserinfo() {
        if (Yii::$app->user->isGuest)
            return $this->redirect('/');
        $user = User::findOne(['user_id' => Yii::$app->user->id]);
        return $this->render('/site/cabinet/cabinet_user_info', [
                    'name' => $user->getName(),
                    'full_name' => $user->getFullName(),
                    'email' => $user->email
        ]);
    }

    /**
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @return string
     */
    
    public function actionAddanswer_old() {
        if (!\yii::$app->request->isPost || \yii::$app->user->isGuest)
            $this->redirect('/?do=cabinet');
        $user = new User;
        $user->user_id = \yii::$app->user->id;
        if (!$user->isCompany())
            $this->redirect('/?do=cabinet');
        $parent = new Review;
        $parent_id = \yii::$app->request->post('parent_id');
        $parent->review_id = $parent_id;
        if ($parent->getById()['company_id'] != \yii::$app->user->id)
            $this->redirect('/?do=cabinet');
        $answer = new Review;
        $answer->scenario = 'add_answer';
        $answer->parent_id = $parent_id;
        $answer->company_id = $parent->getById()['company_id'];
        $answer->comment = \yii::$app->request->post('answer');
        $answer->addReview();
        $this->redirect('/?do=cabinet');
    }

    public function actionAddanswer() {


//        if (Myfunctions::checkhash(Yii::$app->request->post('defaultReal')) == Yii::$app->request->post('defaultRealHash')) {
        if (!\yii::$app->request->isPost || \yii::$app->user->isGuest)
            $this->redirect('/?do=cabinet');
        $user = new User;
        $user->user_id = \yii::$app->user->id;
        if (!$user->isCompany())
            $this->redirect('/?do=cabinet');

        $user = User::findOne(['user_id' => $user->user_id]);

        $comment = new Comment();

        $comment->entity_id = Yii::$app->request->post('review_id');
        $comment->user_id = $user->user_id;
        $comment->text = Yii::$app->request->post('comment');
        $author_name = Yii::$app->request->post('name');
        $comment->author_name = !empty($author_name) ? $author_name : $user->name;
        $comment->scenario = 'add';


        if (!$comment->save()) {
            Yii::error($comment->errors, 'test');
            return json_encode($comment->errors);
        }

        $review = Review::findOne(['review_id' => $comment->entity_id]);
        $email = new \app\models\Email;
        $email->template = 'add_comment';
        $email->from = \yii::$app->params['emailFrom'];
        $email->to = $user['email'];
        $email->subject = 'Комментарий на ваш отзыв №' . $comment->entity_id . ' на портале 711.ru ';
        $email->params = [
            'name' => $review->name,
            'author' => $comment->author_name,
            'url' => 'http://www.711.ru/review/' . $comment->entity_id,
            'id' => $comment->entity_id,
            'comment' => $comment->text
        ];
//            $email->send();

        $this->redirect('/?do=cabinet');
//        } 
    }

    public function actionEditanswer() {
        if (!\yii::$app->request->isPost || \yii::$app->user->isGuest)
            $this->redirect('/?do=cabinet');
        $user = new User;
        $current_user_id = \yii::$app->user->id;
        $user->user_id = $current_user_id;

        if (!$user->isCompany())
            $this->redirect('/?do=cabinet');
        $answer = new Review;
        $answer_id = \yii::$app->request->post('entity_id');
        $answer = $answer->findOne(['review_id' => $answer_id]);

        if ($answer['company_id'] != $current_user_id)
            $this->redirect('/?do=cabinet');
        
        $comment_id = \yii::$app->request->post('comment_id');
        $comment = Comment::findOne(['id' => $comment_id]);

        if ($comment and $comment->user_id == $current_user_id) {
            $comment->text = \yii::$app->request->post('comment');
            $comment->save();
        }

        

        $this->redirect('/?do=cabinet');
    }

    public function actionBanners() {
        
      return $this->render('/site/cabinet/banners');
    }
    /**
     * Разделение по ролям.
     * Кабинет пользователя со всеми его отзывами 
     * и комментами к ним. Плюc Ajax добавление комментов
     * @author Peskov Sergey
     * @date 27.08.2016
     */
    public function actionCabinet()
    {
            if (\Yii::$app->user->isGuest) {
                return $this->goHome();
            }  
            $reviews = new Review;        
            $comments_model = new Comment;
        if(\Yii::$app->user->can('user')){  
            $query = $reviews->getReviews(null, null, Yii::$app->user->identity->user_id);
            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count()]);
            $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();              
            return $this->render('myreviews', ['models' => $models, 'pages' => $pages]);
        }elseif(\Yii::$app->user->can('company')){
            if(Yii::$app->request->isAjax){
                $comments_model->scenario = 'add';
                if($comments_model->load(\Yii::$app->request->post()) && $comments_model->validate()){
                    $comments_model->author_name = Yii::$app->user->identity->name;
                    $comments_model->text = HtmlPurifier::process($comments_model->text);
                    if($comments_model->save()){
                        $comments_model = new Comment;
                    }
                }
            }

            return $this->render('reviewscompany', [
                'reviewsCompany'=>$reviews->getListLk(Yii::$app->user->identity->user_id),
                'modelComment'=>$comments_model
            ]);
                
        }
    }
    
    /**
     * Кабинет пользователя с его личными данными 
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 22.08.2016
     * 
     */
    public function actionMydata()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $user = new UpdateUser;
        if($user->load(Yii::$app->request->post()) && $user->validate()) {
            if(!$user->update()) {
                $user->addError('email', 'Человек с таким email был зарегистрирован на сайте!');
                return $this->render('mydata', ['user'=>$user]);
            } 
            return $this->render('message', ['message'=>'Ваши данные успешно изменены!']);
        }
        
        
        return $this->render('mydata', ['user'=>$user]);
    }
}
