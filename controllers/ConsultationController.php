<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Company;
use app\models\Consultation;
use app\models\User;
use app\models\News;
use app\models\NewComment;
use yii\helpers\HtmlPurifier;
use \app\models\Qasection;
use \app\models\QA;
use \app\models\Email;
use \app\models\Expert;

/**
 * Контроллер раздела компании
 */
class ConsultationController extends Controller {

    /**
     * main Consultation Page
     * @author Kovalchuk Alexander <alexander.kovalchuk307@gmail.com>
     * @date 21.10.2015
     * 
     * @return html 
     */
    public function actionConsultations() {

        $meta_tags = \yii::$app->params['defaultTags'];

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $meta_tags['description'],
                ], "description");

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $meta_tags['keywords'],
                ], "keywords");
        $model = new News;
        $another_news_in_cats = [];
        $sections_model = new Qasection;
        $sections_model -> is_admin = null;
        $sections = $sections_model->getList();
        
        $user = User::findIdentity(\yii::$app->user->id);


        $static_types = \yii::$app->params['staticTypes'];
        foreach ([['novosti-kompanii', 6], ['smi-o-strahovanii', 5], ['est-mnenie', 4], ['eksklyuziv', 13]] as $altname) {
            $another_news_in_cats[$altname[0]]['news'] = $model->getLastNews($altname, 3);
            $another_news_in_cats[$altname[0]]['color'] = $altname[1];
        }
        return $this->render('consultations', [
                    'another_news_in_cats' => $another_news_in_cats,
                    'sections' => $sections['sections'],
                    'pages' => $sections['pages'],
                    'static_types' => $static_types,
                    'user' => $user,
                    'guest' => \yii::$app->user->isGuest
        ]);
    }

    /**
     * получить список типов страхования по ид секции
     * get insuranse type list by section_id
     * 
     * @author Kovalchuk Alexander
     * 
     * @param int $this->section section id
     * @return json
     */
    public function actionGetinsuranselist() {
        $model = new Qasection();
        $model->id = (int) \yii::$app->request->post('section');
        $insurance_list = unserialize($model->getOne()['insurance_types']);

        foreach ($insurance_list as $value) {
            $arr[$value] = \yii::$app->params['staticTypes'][$value];
        }
        echo json_encode($arr);
    }

    /**
     *  Consultation By One Type page
     *  Консультация по виду страхования
     * @author Kovalchuk Alexander <alexander.kovalchuk307@gmail.com>
     * @date 22.10.2015
     * 
     * @return html 
     */
    public function actionConsultbytype($id=null) {
        $meta_tags = \yii::$app->params['defaultTags'];

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $meta_tags['description'],
                ], "description");

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $meta_tags['keywords'],
                ], "keywords");

        $model = new News;
        $another_news_in_cats = [];

        $section = new Qasection;
        $section->id = (int) \yii::$app->request->get('id');
     //   echo $section->id;
        $expert = new Expert();
        $expert->id = $section->getOne()['expert_id'];
        $QA = new QA;
        
        $QA -> is_admin = null;
        $QA->section = $section->getOne()['id'];
      //  echo $QA->section;
        $user = User::findIdentity(\yii::$app->user->id);
        
        foreach ([['novosti-kompanii', 6], ['smi-o-strahovanii', 5], ['est-mnenie', 4], ['eksklyuziv', 13]] as $altname) {
            $another_news_in_cats[$altname[0]]['news'] = $model->getLastNews($altname, 3);
            $another_news_in_cats[$altname[0]]['color'] = $altname[1];
        }
        return $this->render('consultbytype', ['another_news_in_cats' => $another_news_in_cats,
                    'section' => $section->getOne(),
                    'expert' => $expert->getDetail(),
                    'question_sum' => $QA->getAnsweredQuestionSum(),
                    'questions' => $QA->getList(),
                    'user' => $user,
                    'guest' => \yii::$app->user->isGuest
                        ]
        );
    }

    /**
     *  One question-answer
     *  Один вопрос-ответ
     * 
     * @author Kovalchuk Alexander <alexander.kovalchuk307@gmail.com>
     * @date 21.10.2015
     * 
     * @return html 
     */
    public function actionOneanswer() {
        $meta_tags = \yii::$app->params['defaultTags'];

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $meta_tags['description'],
                ], "description");

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $meta_tags['keywords'],
                ], "keywords");


        $question_detail = new QA;
        $question_detail->id = (int) \yii::$app->request->get('qid');

        $expert_detail = new Expert;
        $expert_detail->id = $question_detail->getOne()['expert_id'];
        $user_name = User::findIdentity($question_detail->getOne()['user_id'])['full_name'];
        $section_detail = Qasection::findOne((int) \yii::$app->request->get('id'));
        return $this->render('oneanswer', ['question' => $question_detail->getOne(),
                    'expert' => $expert_detail->getDetail(),
                    'section' => $section_detail,
                    'user_name' => $user_name
                ]);
    }

    /**
     * добавление вопроса
     * если пользователь не зарегестрирован проверяем пользователя на существование
     * в базе. Если нету, регистрируем нового пользователя
     * @author Kovalchuk Alexander
     * @date 
     * 
     * @param string question вопрос
     * @param int section ид секции
     * @param int expert_id ид эксперта
     * @param int insurance_type ид типа полиса
     *  
     * 
     * @return json
     */
    public function actionAddquestion() {

        $model = new QA;
        $model->question = \yii::$app->request->post('question');
        $model->section = \yii::$app->request->post('section');
        $model->expert_id = \yii::$app->request->post('expert_id');
        $model->insurance_type = \yii::$app->request->post('insurance_type');
        $model->question_date = date('Y-m-d H:i:s');
        $model->new_question = 1;
        $model->scenario = 'add';


        $user = new User;
        $user->email = \yii::$app->request->post('email');
        $user->name = \yii::$app->request->post('email');
        $user->scenario = 'reg_from_qa';
        if (!\yii::$app->user->isGuest) {
            $userCheck = true;
        } else {
            $userCheck = $user->validate();
        }

        $modelCheck = $model->validate();

        if (!$userCheck || !$modelCheck) {
            echo json_encode(array_merge($user->errors, $model->errors));
            return;
        }


        if (\yii::$app->request->isPost && !\yii::$app->user->isGuest) {
            $model->user_id = \yii::$app->user->id;
        } else {

            if ($user->register()) {
                //$registration_message = ['success_registration' => 'success'];
                $model->user_id = $user->user_id;
            }
        }


        $model->add();
        $expert = User::findIdentity($model->expert_id);
        $section = Qasection::findOne($model->section);
        $email = new Email;
        $email->template = 'add_question';
        $email->from = \yii::$app->params['emailFrom'];
        $email->to = $expert['email'];
        $email->subject = 'Автоматическое уведомление эксперта о вопросе';

        $email->params = [
            'name' => $expert['name'],
            'section' =>  $section['title'],
            'question' =>  $model->question
        ];
        $email->send();
        return json_encode(['success' => 'success',
            
            'question' =>  $model->question,
            'question_date' => $model->question_date,
            'insurance_type_name' => \yii::$app->params['staticTypes'][$model->insurance_type]]);
    }

}
