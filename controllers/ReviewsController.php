<?php

namespace app\controllers;

use Yii;

use app\models\Comment;

use app\models\forms\Capcha;
use yii\web\Controller;
use app\models\Review;
use app\models\ReviewComment;
use app\models\LogEmailSending;

use app\models\Company;
use app\models\EmailSending;

use app\models\Myfunctions;
use app\models\User;
use app\models\ReviewLike;
use app\models\DisabledEmailSending;
use Swift_SwiftException;
use yii\helpers\Json;

/**
 * Контроллер раздела компании
 */
class ReviewsController extends Controller {

    public function actionSetlike() {
        if (!\yii::$app->request->isPost)
            return 'request type is not post';
        $review_like = new ReviewLike;
        $review_like->scenario = 'add_like';
        $review_like->user_id = \yii::$app->user->id;
        $review_like->review_id = (int) \yii::$app->request->post('review_id');
        if ($review_like->save())
            return 'success';
        else
            return 'add like error';
    }

    /**
     * Действие редактирования/удаления комментарий админом
     * @author Sergey Kulikov, Maxim Shablinskiy
     * @date 19.10.15
     * @return string
     */
    public function actionEditcommentbyadmin() {
        if(!Yii::$app->user->can('admin')) return 'У Вас недостаточно прав!';
        
        $comment_id = \yii::$app->request->post('id');
        $comment = Comment::findOne(['id'=>$comment_id]);
        
        //ReviewComment::findOne(['id' => \yii::$app->request->post('id')]);
        if (!is_object($comment))
            return 'comment not found';
        else $comment->scenario = 'add';
        switch (Yii::$app->request->post('action')) {
            case 'edit':
                if (!is_null(Yii::$app->request->post('comment')))
                    $comment->text = Yii::$app->request->post('comment');
                    $comment->author_name = Yii::$app->request->post('author');
                if ($comment->save()) {
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return 'edit successful';
                }else{
                    return Json::encode($comment->errors);
                }

                break;
            case 'delete':

                if (!$comment->delete())
                    return 'delete error';
                return 'delete successful';
                break;
        }
    }

    public function actionAddcomment_old() {

        if (Myfunctions::checkhash(Yii::$app->request->post('defaultReal')) == Yii::$app->request->post('defaultRealHash')) {

            if (!\yii::$app->request->isPost)
                $this->redirect('javascript://history.go(-1)');
            if (!yii::$app->user->isGuest)
                $user_id = yii::$app->user->id;
            else {
                $user_id = 0;
                return;
            }
            $comment = new ReviewComment;
            $comment->date = date("Y-m-d H:i:s");
            $comment->review_id = Yii::$app->request->post('review_id');
            $comment->author_id = $user_id;
            $comment->comment = Yii::$app->request->post('comment');
            $comment->name = Yii::$app->request->post('name');
            $comment->scenario = 'add';
            if (!$comment->AddComment())
                return json_encode($comment->errors);

            $review = new Review;
            $review->review_id = $comment->review_id;
            $review_arr = $review->getById();
            $name = $review_arr['author'];

            $email = new \app\models\Email;
            $email->template = 'add_comment';
            $email->from = \yii::$app->params['emailFrom'];
            $email->to = $review_arr['author_email'];
            $email->subject = 'Комментарий на ваш отзыв №' . $comment->review_id . ' на портале 711.ru ';
            $email->params = [
                'name' => $name,
                'author' => $comment->name,
                'url' => 'http://www.711.ru/review/' . $comment->review_id,
                'id' => $comment->review_id,
                'comment' => $comment->text
            ];
            $email->send();

            echo 'success';
            // $this->redirect('/reviews/' . HtmlPurifier::process(htmlspecialchars_decode(Yii::$app->request->post('review_id'))));
        } else {
            echo "error";
        }
    }


    /**
     * Добавление комментария к отзыву
     * @return mixed
     */
    public function actionAddcomment() {
        
        
        $comment = new Comment();
        $comment->scenario = 'add';
        if($comment->load(Yii::$app->request->post()) && $comment->validate()) {
            $comment->save();
            return json_encode($comment);
        } else {
            return json_encode($comment->errors);
        }
           
        
    }

    /**
     * Страница детальной информации об отзыве
     * @return string
     */
    public function actionDetail_old() {
        $model = new Review;

        $model->review_id = Yii::$app->request->get('id');
        $comments = new ReviewComment;
        $comments->review_id = Yii::$app->request->get('id');
        $review = $model->getById();
        if ($review['id'] == 0)
            return $this->redirect('/404');
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => "Отзыв о работе компании " . $review['company_name']
                ], "description");

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => "Отзыв о работе компании {$review['company_name']}, Страховая компания {$review['company_name']}, {$review['type']}",
                ], "keywords");

        $user = User::findOne(['user_id' => \yii::$app->user->id]);
        $admin = is_null($user) ? false : $user->user_group == 1;

        $review_like = new ReviewLike;
        $review_like->review_id = $review['id'];
        $review_like->user_id = \yii::$app->user->isGuest ? 0 : \yii::$app->user->id;
        
        
        return $this->render('detail', [
                    'username' => isset(\Yii::$app->user->identity->name) ?  \Yii::$app->user->identity->name : '',
                    'review' => $review,
                    'comments' => $comments->getList(),
                    'lastComments' => $comments->getLastComments(10),
                    'is_admin' => $admin,
                    'like_count' => $review_like->getLikeCount(),
                    'already_liked' => $review_like->checkAlreadyLiked(),
                    'similar_reviews' => $model->getSimilarReviews()
        ]);
    }

    public function actionDetail() {

        $model = new Review;
        $comment = new Comment;
        $reviews = $model->getDetailReview(Yii::$app->request->get('id'));

        if(!$reviews['review_id']){
            return $this->redirect('/404');
        }
        
        $commentsLast = $comment->fastGetLastComments(5);
        $comment->scenario = 'add';
        $capcha = new Capcha;
        if($capcha->load(Yii::$app->request->post()) && $capcha->validate() && $comment->load(Yii::$app->request->post()) && $comment->validate()) {
            $comment->save();
        }
        
        $getComments = $comment->getCommentsToRev(Yii::$app->request->get('id'));
        $relativeReviews = $model->getReviews(5,$reviews['company_id'])->all();
        return $this->render('detail', [
            'review' => $reviews,
            //'model' => $comment,
            'lastComments' => $commentsLast,
            'relativeReviews' => $relativeReviews,
            'capcha' => $capcha, 
            'entity_id'=>Yii::$app->request->get('id')  
           
            
        ]+$getComments);       
    }

    
    
    private function getLastComments($amount = 10) {

        $arr_comments = Comment::getLastComments($amount);
        foreach ($arr_comments as $key=>&$comment) {
            //переделать...заменить review На company или запихать получение компании в comment
            $review = Review::findOne([ 'review_id' => $comment['entity_id']]);
            if(!$review){
                unset($arr_comments[$key                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ]);
                continue;
            }
            $company = $review->getCompany();
            $comment['company_name'] = empty($company) ? $company->company_name : '';
            $comment['review_id'] = $comment['entity_id'];
        }
//        var_dump($arr_comments);
//        die();
        return $arr_comments;
    }

    /**
     * Страница списка отзывов
     * @return string
     */
    public function actionIndex_old() {
        if (!is_null(Yii::$app->request->get('id')))
            return $this->actionDetail();
        $model = new Review;
        $comments = new ReviewComment;
        $company = new Company;
        if (!is_null(Yii::$app->request->get('company-id')))
            $model->company_id = Yii::$app->request->get('company-id');
        return $this->render('list', [
                    'reviews' => $model->getList(false, true),
                    'companies' => $company->getRightList(['field' => 'company_name', 'orderBy' => SORT_ASC]),
                    'lastComments' => $comments->getLastComments(10),
        ]);
    }

    public function actionIndex() {
        /*if (!is_null(Yii::$app->request->get('id')))
            return $this->actionDetail();*/
        $model = new Review;

        if(isset($_GET['company-id']) && Yii::$app->request->get('company-id')==''){
            return $this->redirect('/reviews');
        }
        
        $company = new Company;
        $comments = new Comment;
        
        return $this->render('list', [
                    'reviews' => $model->getList(false, true, Yii::$app->request->get('company-id')),
                    'companies' => $company->getRightList(['field' => 'company_name', 'orderBy' => SORT_ASC]),
                    'lastComments' => $comments ->fastGetLastComments(5),
        ]);
    }

    /**
     * @author Kulikov Sergey
     * @date 14.10.2014
     *
     * Страница списка отзывов
     *
     * @param int id GET параметр
     * @return string
     */
    public function actionWeek() {
        if (!is_null(Yii::$app->request->get('id')))
            return $this->actionDetail();
        $model = new Review;
        $company = new Company;
        $comments = new ReviewComment;
        return $this->render('list', [
                    'reviews' => $model->getList(true, true),
                    'companies' => $company->getRightList(['field' => 'company_name', 'orderBy' => SORT_ASC]),
                    'lastComments' => $this->getLastComments(10),
        ]);
    }

    /**
     * Заполнение таблицы email_sending с похожими отзывами  перед отправкой через крон  и их отправка
     * @throws \yii\db\Exception
     */
    public function actionNewReview()
    {

        $dates = new LogEmailSending();
        $day = $dates->getLastUpdate();
        //echo $day;
        //exit;
        //$day =  \yii::$app->params['daysSending']; //Период в днях, за который собирается и отправляется почта
        $hourStart = \yii::$app->params['timeStart']; // начало рассылки
        $hourStop = \yii::$app->params['timeStop'];
        $hour = date('H'); //Для Московского времени
        $dayNow = date('N');
        $mydate = date('Y-m-d');
        //если день недели не пятница, то собираем почтовые сообщения в таблицу email_sending
        $isLogMail = new LogEmailSending();
        $mailToSend = new EmailSending();

        $isEnabledEmail = new DisabledEmailSending();
        $arrDisabledMail = $isEnabledEmail->isEnabledSend();
        $arrDisable = array();
        foreach ($arrDisabledMail as $val){
            $arrDisable[] = $val['email'];
        }

        //проверка на то, что сегодня не день отправки, смотрим в log таблицу и проверяем, что отправки сегодня не было, проверяем, что сейчас нужное время
        if (in_array($dayNow, \yii::$app->params['daySend']) && $isLogMail->isSuccess($mydate) && $hour >= $hourStart && $hour <= $hourStop){
            if($isLogMail->isEmptyLog($mydate)) {
                $logEmailSend = new LogEmailSending();
                $logEmailSend->date_add_message = $mydate;
                $logEmailSend->is_message_error = 1; //ставим флаг - сообщение не отправлено
                $logEmailSend->save();
            }
                $is = new Review();
                $time = time() - $day * 86400; //Текущая дата за минусом  $day дней (периодичность запуска данной рассылки)
                $date = date("Y-m-d H:i:s", $time);

                $arrUser = $is->getArrClientCompany(); //Получаем всех клиентов и все компании, по которым клиент делал отзывы

                $reviews = $is->getReviewFromTime($date); //Получаем все отзывы за прошедшие 2 недели
                //Формируем массив для отправки
                $i = 0;
                $email = [];
                //Данные по пользователю
                $user = new User();
                $arrUsers = $user->getDataArr();
                //Данные по компании
                $similar = new Company();
                $arrCompany = $similar->getDataArrCompany(); //получаем юзера и название компании
                $isEmailSending = new EmailSending();

                foreach ($arrUser as $key => $val) {
                    $reviewid = $val;
                    if (!empty($arrUsers[$key]['email'])) {
                        $sendMail = $arrUsers[$key]['email'];
                        $review = $is->getReviewCompany($reviewid, $date, $sendMail); //получаем компании, к которым юзер делал отзыв

                        $similarCompany = $similar->getRatingFromId();
                        if ($review != 'no' && $isEmailSending->isAdd($key, $mydate)) {
                            //Добавляем проверку на рассылку
                            if(!in_array($arrUsers[$key]['email'] , $arrDisable)) {
                                $i++;
                                $imgLogo = $arrCompany[$reviewid]['user_id'];
                                $email[$i]['to'] = $mailToSend->isSandbox($arrUsers[$key]['email']);
                                $email[$i]['from'] = \yii::$app->params['emailFrom'];
                                $email[$i]['user_name'] =$arrCompany[$reviewid]['company_name'];
                                $email[$i]['subject'] = 'Новые отзывы о компании ' . $arrCompany[$reviewid]['company_name'];
                                $email[$i]['user_id'] = $key;
                                $email[$i]['message'] = $this->renderPartial('similar_review', [
                                    'review' => $review, //отзывы о работе компании на которые откликался юзер
                                    'emailTo' => $arrUsers[$key]['email'],
                                    'similarCompany' => $similarCompany,
                                    'log' => $similar->getLogoURL($imgLogo),
                                    'user_id' => $arrCompany[$reviewid]['user_id'],
                                    'company_name' => $arrCompany[$reviewid]['company_name'],

                                ]);
                                $email[$i]['count'] = count($review);
                                $email[$i]['day_add'] = $mydate;
                                $email[$i]['is_send'] = 0;
                            }

                        }
                    }

                }

                if ($email) {
                    Yii::$app->db->createCommand()
                        ->batchInsert(
                            EmailSending::tableName(), ['to', 'from', 'user_name', 'subject', 'user_id', 'message', 'count', 'day_add' , 'is_send'], $email
                        )->execute();
                    Yii::$app->db->createCommand()
                        ->delete('email_sending', ['is_send'=>1])->execute();
                }

            //После отработки добавляем в лог запись об успешном добавлении

            $logEmailEnd = LogEmailSending::findOne(['date_add_message' => $mydate]);
            $logEmailEnd->is_message_error = 0; // флаг отработки скрипта
            $logEmailEnd->update();

        }elseif(in_array($dayNow, \yii::$app->params['daySend']) && !$isLogMail->isSuccess($mydate) && $hour >= $hourStart && $hour <= $hourStop){   //Если пятница, то идет отправка почты
            $models = new EmailSending();
            $model = $models->getDataFromSend();

                if (!empty($model)) {
                    foreach ($model as $send) {
                        $email = new \app\models\Email();
                        $email->from = $send['from'];
                        $email->to = $send['to'];
                        $email->subject = $send['subject'];
                        $email->body = $send['message'];
                        //если при отправке сообщения возникла ошибка, перехватить искл и продолжить
                        try{$email->send2();}catch (Swift_SwiftException $e){};
                        $sendOk = EmailSending::findOne(['id' => $send['id']]);
                        $sendOk->is_send = 1;
                        $sendOk->update();

                    }

                }


        }
       // var_dump((in_array($dayNow, \yii::$app->params['daySend']) && !$isLogMail->isSuccess($mydate) && $hour >= $hourStart && $hour <= $hourStop));

    }

    /**
     * Отправка из крона уведомлений
     * @throws \Exception
     */

    public function actionSendemail(){

        $models = new EmailSending();
        $model = $models->getDataFromSend();
        if(!empty($model)){
        foreach($model as $send){
            $email = new \app\models\Email();
            $email->from = $send['from'];
            $email->to = $send['to'];
            //$email->to = 'maxshabl@yandex.ru';
            $email->subject = $send['subject'];
            $email->body = $send['message'];
            $email->send2();
            $sendOk = EmailSending::findOne(['id' => $send['id']]);
            $sendOk->is_send = 1;
            $sendOk->update();
            echo "ok";
            }
        }


    }

    /**
     * Отписка от e-mail уведомлений
     */
    public function actionDisableEmail(){
        if(Yii::$app->request->get('enabled'))
            $mail = base64_decode(Yii::$app->request->get('enabled'));
        else
            return $this->render('404');

        $model = DisabledEmailSending::findOne(['email' => $mail]);
        if(empty($model)){
            $nosend = new DisabledEmailSending();
            $userId = new User();
            $nosend->user_id = $userId->getDataFromMail($mail)->user_id;
            $nosend->email = $mail;
            $nosend->save();
            return $this->render('disable', [
                'mail' => $mail,
                'fullname' => $userId->getDataFromMail($mail)->full_name,
            ]);
        }
        else
            return $this->render('404');
    }

}
