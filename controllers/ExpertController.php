<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Expert;
use app\models\Company;
use app\models\Review;
use app\models\ReviewComment;
use app\models\User;
use app\models\QA;
use app\models\Email;
use \app\models\Qasection;
use app\models\Image;

/**
 * Expert Controller
 */
class ExpertController extends Controller {

    /**
     * @author Kovalchuk Alexander
     * @date 10.11.2015
     * 
     * Add answer (by expert), send letter to user, who left question
     * Добвить ответ к вопросу(функция эксперта), послать письмо пользователю, 
     * который оствил вопрос
     * 
     * @param int $question question id
     * @param string $text  answer
     *
     * @return json  json contains result of updating
     */
    public function actionAddanswer() {

        if (\yii::$app->request->isPost && !\yii::$app->user->isGuest) {

            $user = new User;
            $user->user_id = \yii::$app->user->id;
            if ($user->isExpert()) {
                $model = QA::findOne(['id' => (int)\yii::$app->request->post('question')]);
                //$model->id = \yii::$app->request->post('question');
                $model->answer = \yii::$app->request->post('text');
                $model->new_question = 0;
                $model->scenario = 'addanswer';
                $model->answer_date = date('Y-m-d H:i:s');
                if ($model->validate()) {
                    if ($model->save()) {
                        $answer = QA::findOne(['id' => $model->id]);
                        $user_model = User::findIdentity($answer['user_id']);
                        $section = Qasection::findOne(['id' => $answer['section']]);
                        $email = new Email;
                        $email->template = 'pull_answer';
                        $email->from = \yii::$app->params['emailFrom'];
                        $email->to = $user_model['email'];
                        $email->subject = 'Автоматическое уведомление автора вопроса об ответе';

                        $email->params = [
                            'name' => $user_model['name'],
                            'insurance_type' => \yii::$app->params['staticTypes'][$answer['insurance_type']],
                            'section' =>  $section['title'],
                            'answer' =>  $answer['answer'],
                            'section_id' =>  $section['id'],
                            'answer_id' => (int) $answer ['id']
                        ];
                        $email->send();


                        return json_encode(['success' => 'success',
                            'user_id' => $answer['user_id'],
                            'user_email' => $user_model ['email']
                        ]);
                    } else {
                        return json_encode(['error' => 'Что-то пошло не так']);
                    }
                } else
                    return json_encode($model->errors);
            }
        }
        return;
    }

    /**
     * @author Kovalchuk Alexander
     * @date 10.11.2015
     * 
     * Edit Answer
     * 
     * @param int $question question id
     * @param string $text  answer
     *
     * @return json  json contains result of updating
     */
    public function actionEditanswer() {

        if (\yii::$app->request->isPost && !\yii::$app->user->isGuest) {

            $user = new User;
            $user->user_id = \yii::$app->user->id;
            if ($user->isExpert()) {
                $model = new QA();
                $model->id = \yii::$app->request->post('question');
                $model->answer = \yii::$app->request->post('text');
                $model->answer_date = date('Y-m-d H:i:s');
                $model->scenario = 'addanswer';
                if ($model->validate()) {
                    if ($model->editanswer()) {
                        return json_encode(['success' => 'success']);
                    } else {
                        return json_encode(['error' => 'Что-то пошло не так']);
                    }
                } else
                    return json_encode($model->errors);
            }
        }
        return;
    }

    /**
     * @author Kovalchuk Alexander
     * @date 26.10.2015
     * 
     * Edit Expert info
     * 
     * @param int $id user_id
     * @param string    $full_name full_name
     * @param string    $company_name company_name
     * @param string    $position expert position
     * @param string    $reference reference about expert 
     * @param string    $email expert email
     * 
     * 
     * @return json  json contains result of updating
     */
    public function actionEdit() {

        if (\yii::$app->request->isPost && !\yii::$app->user->isGuest) {
            $user = new User;
            $user->user_id = \yii::$app->user->id;
            if ($user->isExpert() || $user->isAdmin()) {
                $id = $user->isAdmin() ? \yii::$app->request->post('expert') : \yii::$app->user->id; //смотрим откуда пришел пост
                
                $expert = Expert::findOne($id);
                $expert->full_name = \yii::$app->request->post('full_name');
                $expert->site_name = \yii::$app->request->post('site_name');
                $expert->company_name = \yii::$app->request->post('company_name');
                $expert->position = \yii::$app->request->post('position');
                $expert->reference = \yii::$app->request->post('reference');
                $expert->notification_email  =   \yii::$app->request->post('email');
                if ($user->isAdmin()) {
                    $expert->active_expert = \yii::$app->request->post('active_expert');
                }
                
                $expert->scenario = 'edit';
                 if ($expert->validate()) {
                    if ($expert->edit())
                        echo json_encode(['success' => 'success']);
                } else {
                    echo json_encode(array_merge($expert->errors));
                }
            } else {
                echo json_encode(['err' => 'Что-то пошло не так']);
            }
        }
        return;
    }

    /**
     * @author Kovalchuk Alexander
     * @date 27.10.2015
     * 
     * Add new expert(by admin)
     * 
     * @param string    $login
     * @param string    $email
     * @param string    $password
     * @param string    $full_name full_name
     * @param string    $company_name company_name
     * @param string    $position expert position
     * @param string    $reference reference about expert 
     * @param string    $email expert email
     * 
     * 
     * @return json  json contains result of action
     */
    public function actionAdd() {
        if (\yii::$app->request->isPost && !\yii::$app->user->isGuest) {
            $user = new User;
            $user->user_id = \yii::$app->user->id;
            if (!$user->isAdmin())
                echo "{'other': 'что-то пошло не так'}";

            else {

                $new_user = new User;
                $new_user->email = \yii::$app->request->post('expert_email');
                $new_user->name = \yii::$app->request->post('login_name');
                $new_user->password = \yii::$app->request->post('password');
                $new_user->full_name = \yii::$app->request->post('full_name');
                $new_user->scenario = 'reg_expert';

                $new_user->user_group = 8;

                $expert = new Expert;
                $expert->scenario = 'add';
                $expert->id = $new_user->id;
                $expert->full_name = \yii::$app->request->post('full_name');
                $expert->site_name = \yii::$app->request->post('site_name');
                $expert->company_name = \yii::$app->request->post('company_name');
                $expert->position = \yii::$app->request->post('position');
                $expert->reference = \yii::$app->request->post('reference');
                $expert->active_expert = \yii::$app->request->post('active_expert');
                $expert->notification_email  =   \yii::$app->request->post('expert_email');

                $usr_validate = $new_user->validate();
                $exprt_validate = $expert->validate();

                if (!$usr_validate || !$exprt_validate) {
                    echo json_encode(array_merge($new_user->errors, $expert->errors));
                } else if ($usr_validate && $exprt_validate) {
                    if ($new_user->register()) {
                        $expert->id = $new_user->id;
                        if ($expert->edit())
                            echo json_encode(
                                    ['success' => 'success',
                                        'new_id' => $expert->id,
                                        'active_expert' => $expert->active_expert]
                            );
                    }
                }
            }
        }
        return;
    }

    /**
     * remove expert from database
     * @author Kovalchuk Alexander
     * @date 27.10.2015 
     * @param int $id expert id
     * @return 
     */
    public function actionDelexpert() {
        if (\yii::$app->request->isPost && !\yii::$app->user->isGuest) {
            $user = new User;
            $expert = new Expert;
            $expert -> id = (int) \yii::$app->request->post('expert');
            $user->user_id = \yii::$app->user->id;
           
            if (!$user->isAdmin()) {
                echo "{'error': 'стой, ты не админ!'}";
            } elseif ($expert->hasQuestions()) {
                echo json_encode(['error' => 'Невозможно удалить, у эксперта есть вопросы']);
            } else {

                $remove_user = new User;
                $remove_expert = new Expert;
                $id = (int) \yii::$app->request->post('expert');
                if ($remove_expert->remove($id) && $remove_user->remove($id)) {
                    echo json_encode(['success' => 'success']);
                } else
                    echo json_encode(['error' => 'Что-то пошло не так']);
            }
        }
    }

    /**
     * получить список экспертов
     * get expert list
     * 
     * @author Kovalchuk Alexander
     * 
     * @return JSON
     */
    public function actionExpertlist() {
        $model = new Expert();
        $experts_list = $model->getList()['experts'];
        foreach ($experts_list as $value) {
            $arr[$value['id']] = $value['full_name'] . ", " . $value['position'];
        }
        echo json_encode($arr);
    }

    public function actionLoadphoto() {



        if (isset($_FILES['uploadfile'])) {

            /* ~~~~~~~~~~~~~~~~~ Каталог, в который мы будем принимать оригинал:~~~~~~~~~~~~ */

            $uploaddir = \yii::$app->params['photosParam']['expertDir'] . '/uploads/expert/original/';
            @mkdir($uploaddir, 0777);
            /* ~~~~~~~~~~~~~~~~~ Путь к оригиналу файла:~~~~~~~~~~~~ */
            $uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);

            /* ~~~~~~~~~~~~~~~~~ Генерим имя для сохранения на основе уже существующего:~~~~~~~~~~~~ */
            $new_photo_name = rand(0, 1000) . basename($_FILES['uploadfile']['name']);
            /* ~~~~~~~~~~~~~~~~~ Каталог, в который мы будем принимать файл:~~~~~~~~~~~~ */
            $reaploadpath = \yii::$app->params['photosParam']['expertDir'] . '/uploads/expert/avatar/';
            @mkdir($reaploadpath, 0777);
            $reaploadfile = $reaploadpath . $new_photo_name;
            /* ~~~~~~~~~~~~~~~~~ Путь к сохраненному файлу:~~~~~~~~~~~~ */
            $show_reaploadfile = \yii::$app->params['photosParam']['imgUrl'] . '/uploads/expert/avatar/' . $new_photo_name;




            /* ~~~~~~~~~~~~~~~~~ Копируем из временного хранилища:~~~~~~~~~~~~ */
            if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile)) {

                /* ~~~~~~~~~~~~~~~~~ Инициализация, загрузка изображения:~~~~~~~~~~~~ */
                $resizeObj = new Image($uploadfile);

                // *** 2) Изменение размера (опции: exact, portrait, landscape, auto, crop)  
                $resizeObj->resizeImage(100, 100, 'auto');

                // *** 3) Сохранение
                $resizeObj->saveImage($reaploadfile, 100);
                @unlink($uploadfile);

                $savePhoto = new Expert();
                if (\yii::$app->request->post('expert')!=''){
                     $savePhoto->id = (int) \yii::$app->request->post('expert');
                }
                else {
                     $savePhoto->id = \yii::$app->user->id;
                }
                $savePhoto->photo = '/uploads/expert/avatar/' . $new_photo_name;
                $savePhoto->updatephoto();
                echo json_encode(['path' => $show_reaploadfile]);
            } else {
                echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>";
                exit;
            }
        }
    }

    public function actionDeletephoto() {
        $savePhoto = new Expert();
        $savePhoto->id = null !== \yii::$app->request->post('avatar') ? \yii::$app->request->post('avatar') : \yii::$app->user->id;
        $savePhoto->photo = '';
        if ($savePhoto->updatephoto())
            return json_encode(['success' => 'success']);
    }

}
