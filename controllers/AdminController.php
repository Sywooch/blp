<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Expert;
use app\models\Company;
use app\models\Review;
use app\models\ReviewComment;
use app\models\User;
use app\models\Qasection;
use app\models\QA;
use app\models\Branch;
use app\models\Address;
use yii\helpers\HtmlPurifier;
use app\models\Myfunctions;
use app\models\Image;

/**
 * Admin actions
 * действия осуществляемые админом
 * 
 */
class AdminController extends Controller {

    public function beforeAction($action) {

        $this->enableCsrfValidation = false;
        // ...set `$this->enableCsrfValidation` here based on some
        // conditions...
        // call parent method that will check CSRF if such property is true.
        $user = new User;
        $user->user_id = \yii::$app->user->id;
        if (!$user->isAdmin()) {
            $this->redirect('/404');
        }
        return parent::beforeAction($action);
    }

    /**
     * Change expert password
     * Сменить пароль эксперта
     * @author Kovalchuk Alexander <alexander.kovalchuk307@gmail.com>
     * 
     * @param string $password new pass
     * @param int $expert expert_id
     * 
     * @return json (contains info with resuts of operations)
     */
    public function actionChangeexpertpass() {

        $model = User::findIdentity((int) \yii::$app->request->post('expert'));

        $model->password = \yii::$app->request->post('pass');
        $model->scenario = 'update_pass';
        if ($model->validate()) {
            if ($model->editExpert()) {
                echo json_encode(['success' => 'success']);
            } else
                json_encode(['error' => 'Ужасная ошибка']);
        }
        else {
            echo json_encode($model->errors);
        }
    }

    /**
     * Page with types(sections) of questions
     * Страница с типами(секциями) вопросов
     * 
     * @author KovalchukAlexander <alexander.kovalchuk307@gmail.com>
     * @date 15.10.15
     * @return html
     */
    public function actionIndexexpert() {
        $model = new Qasection;
        $model -> is_admin = true;
        $model_data = $model->getList();
        $droplist = (new Expert)->getList();
        $static_types = \yii::$app->params['staticTypes'];
        return $this->render('/admin/expert/index', ['sections' => $model_data['sections'],
                    'pages' => $model_data['pages'],
                    'droplist' => $droplist['experts'],
                    'static_types' => $static_types]);
    }

    /**
     * Add one question section
     * Добавить один тип вопросов
     * 
     * @author KovalchukAlexander <alexander.kovalchuk307@gmail.com>
     * @date 28.10.15
     * 
     * @param string title
     * @param description
     * @param expert_id
     * @param string show_section
     * @param insurance_type
     * 
     * @return JSON
     */
    public function actionAddsection() {
        if (\yii::$app->request->isPost && !\yii::$app->user->isGuest) {
            $user = new User;
            $user->user_id = \yii::$app->user->id;
            if (!$user->isAdmin())
                echo json_encode(['error' => 'Что-то пошло не так']);

            else {

                $model = new Qasection();
                $model->scenario = 'add';
                $model->title = \yii::$app->request->post('title');
                $model->description = \yii::$app->request->post('description');
                $model->expert_id = (int) \yii::$app->request->post('expert_id');
                $model->show_section = (int) \yii::$app->request->post('show_section');
                $model->insurance_types = \yii::$app->request->post('insurance_types');
                $model->sort_by_this_flag = $model->getSortTag();
                if ($model->validate()) {
                    if ($model->add()) {
                        echo json_encode([
                            'success' => 'success',
                            'new_section' =>
                            ['id' => $model->id,
                                'title' =>  $model->title,
                                'expert' => Qasection::getExpertNameBySectionId($model->id),
                                'expert_description' => Qasection::getExpertDescrBySectionId($model->id),
                                'show_section' => $model->show_section == 1 ? 'Да' : 'Нет'
                            ]
                                ]
                        );
                    }
                } else {
                    echo json_encode($model->errors);
                }
            }
        }
        return;
    }

    /**
     * delete one section
     * удалить одну секцию
     * @author Kovalchuk Alexander <alexander.kovalchuk307@gmail.com>
     * @date 28.10.2015
     * @param int $section section id
     * 
     * @return JSON json contains result of operation
     */
    public function actionRemovesection() {
        if (\yii::$app->request->isPost && !\yii::$app->user->isGuest) {
            $user = new User;
            $user->user_id = \yii::$app->user->id;
            if (!$user->isAdmin()) {
                echo "{'error': 'стой, ты не админ!'}";
            } else {

                $remove_section = new Qasection();
                $remove_section->id = \yii::$app->request->post('section');
                $questions = new QA();
                $questions->section = \yii::$app->request->post('section');
                if ($remove_section->remove()) {
                    $questions->remove_section();
                    echo json_encode(['success' => 'success']);
                } else
                    echo json_encode(['error' => 'Что-то пошло не так']);
            }
        }
    }

    /**
     * swap sections
     * поменять порядок разделов вопросов
     * @author Kovalchuk Alexander <alexander.kovalchuk307@gmail.com>
     * @date 30.10.2015
     * @param int first_id section id
     * @param int second_id section id
     * 
     * @return JSON contains result of swapping
     */
    public function actionSwapsection() {
        if (\yii::$app->request->isPost && !\yii::$app->user->isGuest) {
            $user = new User;
            $user->user_id = \yii::$app->user->id;
            if (!$user->isAdmin()) {
                echo "{'error': 'стой, ты не админ!'}";
            } else {

                $model = new Qasection();
                $first_id = \yii::$app->request->post('id1');
                $second_id = \yii::$app->request->post('id2');

                if ($model->swapsection($first_id, $second_id)) {
                    echo json_encode(['success' => 'success']);
                } else
                    echo json_encode(['error' => 'Что-то пошло не так']);
            }
        }
    }

    /**
     * page 'edit one  sections;
     * страница 'редактировать один раздел вопросов'
     * @author KovalchukAlexander <alexander.kovalchuk307@gmail.com>
     * @date 15.10.15
     * 
     * @return html
     */
    public function actionEditexpertsection() {
        $model = new Qasection();
        $model->id = (int) Yii::$app->request->get('id');
        $droplist = (new Expert)->getList();
        $static_types = \yii::$app->params['staticTypes'];
        $model_answers = (new QA);
        $model_answers->section = (int) Yii::$app->request->get('id');
        $answers = $model_answers->getList();

        return $this->render('/admin/expert/editsection', [
                    'section' => $model->getOne(),
                    'sections_droplist' => $model->getList(),
                    'droplist' => $droplist['experts'],
                    'static_types' => $static_types,
                    'answers' => $answers['questions'],
                    'pages' => $answers['pages']
        ]);
    }

    /**
     * update one question section
     * Апргрейд одной секции вопросов(из джейсона)
     * 
     * @author KovalchukAlexander <alexander.kovalchuk307@gmail.com>
     * @date 28.10.15
     * 
     * 
     * @return boolean
     */
    public function actionEditonesection() {
        if (\yii::$app->request->isPost && !\yii::$app->user->isGuest) {
            $user = new User;
            $user->user_id = \yii::$app->user->id;
            if (!$user->isAdmin())
                echo json_encode(['error' => 'Что-то пошло не так']);

            else {

                $model = new Qasection();
                $model->scenario = 'edit';
                $model->id = \yii::$app->request->post('section');
                $model->title = \yii::$app->request->post('title');
                $model->description = \yii::$app->request->post('description');
                $model->expert_id = \yii::$app->request->post('expert_id');
                $model->show_section = \yii::$app->request->post('show_section');
                $model->insurance_types = \yii::$app->request->post('insurance_types');

                if ($model->validate()) {
                    $model->insurance_types = serialize($model->insurance_types);
                    if ($model->updatesection()) {
                        echo json_encode(['success' => 'success']);
                    }
                } else {
                    echo json_encode($model->errors);
                }
            }
        }
        return;
    }

    /**
     * edit experts page
     * страница редактирования экспертов
     * 
     * @author KovalchukAlexander <alexander.kovalchuk307@gmail.com>
     * @date 15.10.15
     * 
     * @return html
     */
    public function actionEditexperts() {
        $model = (new Expert)->getList();
        return $this->render('/admin/expert/editexperts', ['experts' => $model['experts'],
                    'pages' => $model['pages']]);
    }

    /**
     * edit experts page
     * страница редактирования экспертов
     * 
     * @author KovalchukAlexander <alexander.kovalchuk307@gmail.com>
     * @date 15.10.15
     * 
     * @return html
     */
    public function actionDeletequestion() {
        $model = new QA();
        $model->id = \yii::$app->request->post('question');
        if ($model->remove()) {
            echo json_encode(['success' => 'success']);
        } else {
            echo json_encode(['error' => 'Что-то пошло не так']);
        }
    }

    /**
     * update one qa
     * Апргрейд одного вопрос-ответа
     * 
     * @author KovalchukAlexander <alexander.kovalchuk307@gmail.com>
     * @date 11.11.15
     * 
     * 
     * @return boolean
     */
    public function actionEditoneqa() {
        if (\yii::$app->request->isPost && !\yii::$app->user->isGuest) {
            $user = new User;
            $user->user_id = \yii::$app->user->id;
            if (!$user->isAdmin())
                echo json_encode(['error' => 'Что-то пошло не так']);

            else {

                $model = new QA();
                $model->scenario = 'editbyadmin';
                $model->id = \yii::$app->request->post('question_id');
                $model->question = \yii::$app->request->post('question');
                $model->answer = \yii::$app->request->post('answer');
                $model->expert_id = \yii::$app->request->post('expert');
                $model->section = \yii::$app->request->post('section_id');
                $model->new_question = strlen(trim($model->answer)) == 0 ? 1 : 0;

                if ($model->validate()) {
                    if ($model->editOneQA()) {
                        echo json_encode(['success' => 'success']);
                    }
                } else {
                    echo json_encode($model->errors);
                }
            }
        }
        return;
    }

    /**
     * add new company branch by admin
     * @author Kovalchuk Alexander
     * @date 19.11.2015
     * 
     * @param string branch
     * @param string region
     * @param string city
     * @paran string address
     * @param string work_hours
     * @param string phones
     * @param string email
     * 
     * @return JSON contains result of operation(or errors)
     */
    public function actionAddbranch() {
        $model = new Branch();
        $company = new Company();
        $company->company_name = \yii::$app->request->post('company-add');
        $model->company_id = $company->getCompanyIdByName();
        $model->branch = \yii::$app->request->post('branch');
        $model->functions = \yii::$app->request->post('functions');
        $model->region = \yii::$app->request->post('region-add');
        $model->city = \yii::$app->request->post('city-add');
        $model->address = \yii::$app->request->post('address-add');
        $model->work_hours = \yii::$app->request->post('work_hours');
        $model->phones = \yii::$app->request->post('phones');
        $model->email = \yii::$app->request->post('email');


        $model->scenario = 'add';
        if ($model->validate()) {
            $address = new Address();
            #$address  -> address     =   $model -> region . ' ' .  $model -> city.' '. $model -> address;
            $coords = \yii::$app->request->post('ax') . "," . \yii::$app->request->post('ay');
            $address->point = $coords;
            #Myfunctions::sqlHtmlFilter($coords);
            #$address -> point ()!=false?$address -> point ():false;
            #echo $model -> coordinates;

            $model->coordinates = $address->save_address();
            #echo $model -> coordinates;
            #return;
            if ($model->coordinates == null) {
                return json_encode(['coordinates' => 'Координаты не определены']);
            }


            if ($model->saveBranch()) {
                return json_encode(['success' => 'success', 'id' => $model->id]);
            } else {
                return json_encode(['error' => 'Что-то пошло не так']);
            }
        } else {
            return json_encode($model->errors);
        }
    }

    /**
     * edit company branch by admin
     * @author Kovalchuk Alexander
     * @date 19.11.2015
     * 
     * @param string branch
     * @param string region
     * @param string city
     * @paran string address
     * @param string work_hours
     * @param string phones
     * @param string email
     * 
     * @return JSON contains result of operation(or errors)
     */
    public function actionEditbranch() {
        $model = Branch::findOne(
                        (int) \yii::$app->request->post('branch-id'));
        $company = new Company();
        # $model   -> id            =   (int) \yii::$app -> request ->post('branch-id');
        $company->company_name = \yii::$app->request->post('company-add');
        $model->company_id = $company->getCompanyIdByName();
        $model->branch = \yii::$app->request->post('branch');
        $model->functions = \yii::$app->request->post('functions');
        $model->region = \yii::$app->request->post('region-add');
        $model->city = \yii::$app->request->post('city-add');
        $model->address = \yii::$app->request->post('address-add');
        $model->work_hours = \yii::$app->request->post('work_hours');
        $model->phones = \yii::$app->request->post('phones');
        $model->email = \yii::$app->request->post('email');
        $model->active = (int) \yii::$app->request->post('active');



        $model->scenario = 'add';
        if ($model->validate()) {
            $address = new Address();
            #$address  -> address     =   $model -> region . ' ' .  $model -> city.' '. $model -> address;
            $coords = \yii::$app->request->post('ax') . "," . \yii::$app->request->post('ay');
            $address->point = $coords;
            #Myfunctions::sqlHtmlFilter($coords);
            #$address -> point ()!=false?$address -> point ():false;
            #echo $model -> coordinates;

            $model->coordinates = $address->save_address();
            #echo $model -> coordinates;
            #return;
            if ($model->coordinates == null) {
                return json_encode(['coordinates' => 'Координаты не определены']);
            }


            if ($model->saveBranch()) {
                return json_encode(['success' => 'success', 'id' => $model->id]);
            } else {
                return json_encode(['error' => 'Что-то пошло не так']);
            }
        } else {
            return json_encode($model->errors);
        }
    }

    /**
     * edit company branch by admin
     * @author Kovalchuk Alexander
     * @date 04.12.2015
     * 
     * @param int $branch branch id
     * 
     * @return JSON contains result of operation(or errors)
     */
    public function actionDeletebranch() {
        $model = new Branch();
        $model->id = (int) \yii::$app->request->post('branch');
        if ($model->removeBranch()) {
            return json_encode(['success' => 'success']);
        } else {
            return json_encode(['error' => 'error']);
        }
    }

    public function actionEditcompanyimage() {


        if (isset($_FILES['uploadfile'])) {

            /* ~~~~~~~~~~~~~~~~~ Каталог, в который мы будем принимать оригинал:~~~~~~~~~~~~ */

            $uploaddir = \yii::$app->params['photosParam']['expertDir'] . '/uploads/company-logo/original/';
            @mkdir($uploaddir, 0777);
            /* ~~~~~~~~~~~~~~~~~ Путь к оригиналу файла:~~~~~~~~~~~~ */
            $uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);

            /* ~~~~~~~~~~~~~~~~~ Генерим имя для сохранения на основе уже существующего:~~~~~~~~~~~~ */
            $new_photo_name = rand(0, 1000) . basename($_FILES['uploadfile']['name']);
            /* ~~~~~~~~~~~~~~~~~ Каталог, в который мы будем принимать файл:~~~~~~~~~~~~ */
            $reaploadpath = \yii::$app->params['photosParam']['expertDir'] . '/uploads/company-logo/avatar/';
            @mkdir($reaploadpath, 0777);
            $reaploadfile = $reaploadpath . $new_photo_name;
            /* ~~~~~~~~~~~~~~~~~ Путь к сохраненному файлу:~~~~~~~~~~~~ */
            $show_reaploadfile = \yii::$app->params['photosParam']['imgUrl'] . '/uploads/company-logo/avatar/' . $new_photo_name;




            /* ~~~~~~~~~~~~~~~~~ Копируем из временного хранилища:~~~~~~~~~~~~ */
            if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile)) {

                /* ~~~~~~~~~~~~~~~~~ Инициализация, загрузка изображения:~~~~~~~~~~~~ */
                $resizeObj = new Image($uploadfile);

                // *** 2) Изменение размера (опции: exact, portrait, landscape, auto, crop)  
                $resizeObj->resizeImage(500, 500, 'auto');

                // *** 3) Сохранение
                $resizeObj->saveImage($reaploadfile, 100);
                @unlink($uploadfile);

                $savePhoto = new Company();
                $savePhoto->user_id = null !== \yii::$app->request->post('company-id') ? \yii::$app->request->post('company-id') : null;
                if ($savePhoto->user_id == null)
                    return;
                $savePhoto->photo = '/uploads/company-logo/avatar/' . $new_photo_name;
                $savePhoto->updatephoto();
                echo json_encode(['path' => $show_reaploadfile]);
            } else {
                echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>";
                exit;
            }
        }
        return;
    }

    public function actionDeletecompanylogo() {
        $savePhoto = new Company();
        $savePhoto->user_id = null !== \yii::$app->request->post('logo') ? (int) \yii::$app->request->post('logo') : null;
        if ($savePhoto->user_id == null)
            return;
        $savePhoto->photo = '';
        if ($savePhoto->updatephoto())
            return json_encode(['success' => 'success']);
    }

    public function actionEditcompany() {
        
        $model = Company::findOne([
                    'user_id' => \yii::$app->request->post('user_id')
        ]);
        $model ->company_name = \yii::$app->request->post('company_name');
        $model ->address = \yii::$app->request->post('address');
        $model -> phone = \yii::$app->request->post('phone');
        $model ->site = \yii::$app->request->post('site');
        $model ->license_status = \yii::$app->request->post('license_status');
        $model ->license_for_insurance = \yii::$app->request->post('license_for_insurance');
        $model ->license_for_reinsurance = \yii::$app->request->post('license_for_reinsurance');
       
        $model ->expert_RA_rating = \yii::$app->request->post('expert_RA_rating');
        $model ->charter_capital = \yii::$app->request->post('charter_capital');
        $model ->additional_info = \yii::$app->request->post('additional_info');
        
        $model ->color = \yii::$app->request->post('color');
        
        $model->scenario = 'edit_company';
     
        if ($model->validate()) {
            if ($model -> save()) {
                 return json_encode(['success' => 'success']);
            }
           
        } else {
            return json_encode($model->errors);
        }
    }

}
