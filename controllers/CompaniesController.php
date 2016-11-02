<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Company;
use app\models\CompanyImage;
use app\models\News;
use app\models\Review;
use app\models\ReviewComment;
use app\models\User;
use app\models\Address;
use app\models\Branch;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;
use yii\data\Sort;
use app\models\AllCity;
use app\models\InsuranceRating;
use app\helpers\ImgHelper;
use yii\helpers\Json;

/**
 * Контроллер раздела компании
 */
class CompaniesController extends Controller {

    private static function keywords() {
        return "страховые компании, филиалы страховых компаний, адреса страховых компаний," . "офисы страхования, офисы урегулирования, офисы страховых компаний";
    }

    private static function regionsDescription() {
        return "Более 5000 филиалов страховых компаний по всей России. С адресами, телефонами" . " и режимом работы";
    }

    private static function regionDescription($region_name) {
        return "{$region_name} - более 100 филиалов страховых компаний. С адресами, телефонами" . " и режимом работы";
    }

    private static function branchDescription($company_name, $city) {
        return "Страховая компания {$company_name} - Филиал в городе {$city} - адрес, телефоны, режим работы";
    }

    private static function branchKeywords($company_name, $branch, $address) {
        return "{$company_name}, Филиал {$branch}, адрес филиала {$address}, офис страхования, офис уреголирования, офис страховой компании";
    }

    private static function companiesListDescription() {
        return "Список крупнейших страховых компаний России  - отзывы клиентов о качестве работы, информация о состоянии лицензии, адреса, телефоны, справки о компаниях";
    }

    /**
     * Ajax для изменения имени картинки
     *
     * @author Sergey Kulikov <syrex92@gmail.com>
     *         @date 23.10.15
     */
    public function actionEditimagename() {
        if (!\yii::$app->request->isPost || (User::findOne([
                    'user_id' => \yii::$app->user->id
                ])->user_group != 1) || is_null(\yii::$app->request->post('id')))
            return 'user is not admin or request not post or company_id not defined';
        $companyImage = CompanyImage::findOne([
                    'id' => \yii::$app->request->post('id')
        ]);
        if (is_null($companyImage))
            return 'image not found';
        $companyImage->scenario = 'editname';
        $companyImage->name = \yii::$app->request->post('name');
        if ($companyImage->save())
            return 'success';
        else
            return 'image save error';
    }

    /**
     * Ajax для изменения карусели
     *
     * @author Sergey Kulikov <syrex92@gmail.com>
     *         @date 23.10.15
     */
    public function actionChangecarouselonimage() {
        if (!\yii::$app->request->isPost || (User::findOne([
                    'user_id' => \yii::$app->user->id
                ])->user_group != 1) || is_null(\yii::$app->request->post('id')))
            return 'user is not admin or request not post or company_id not defined';
        $companyImage = CompanyImage::findOne([
                    'id' => \yii::$app->request->post('id')
        ]);
        if (is_null($companyImage))
            return 'image not found';
        $companyImage->scenario = 'changecarousel';
        $companyImage->carousel = \yii::$app->request->post('carousel') == 'true' ? 1 : 0;
        if ($companyImage->save())
            return 'success';
        else
            return 'image save error';
    }

    /**
     * Ajax для добавления картинки в базу
     *
     * @author Sergey Kulikov <syrex92@gmail.com>
     *         @date 23.10.15
     */
    public function actionAddimage() {
        if (!\yii::$app->request->isPost || (User::findOne([
                    'user_id' => \yii::$app->user->id
                ])->user_group != 1) || is_null(\yii::$app->request->post('company-id')))
            return 'user is not admin or request not post or company_id not defined';
        if (empty($_FILES) || is_null($_FILES ['new_image']) || is_null($_FILES ['new_image'] ['tmp_name']) || !file_exists($_FILES ['new_image'] ['tmp_name']))
            return 'file not found';
        $companyImage = new CompanyImage ();
        $companyImage->scenario = 'add';
        $companyImage->company_id = \yii::$app->request->post('company-id');
        $companyImage->name = \yii::$app->request->post('name');
        $companyImage->new_image = $_FILES ['new_image'];
        if ($companyImage->save())
            $this->redirect('/companies/' . \yii::$app->request->post('company-id') . '?gallery');
    }

    /**
     * Ajax для удаления картинки из базы
     *
     * @author Sergey Kulikov <syrex92@gmail.com>
     *         @date 23.10.15
     */
    public function actionDeleteimage() {
        if (!\yii::$app->request->isPost || (User::findOne([
                    'user_id' => \yii::$app->user->id
                ])->user_group != 1) || is_null(\yii::$app->request->post('id')))
            return 'user is not admin or request not post or id not defined';
        $companyImage = CompanyImage::findOne([
                    'id' => \yii::$app->request->post('id')
        ]);
        if (is_null($companyImage))
            return 'image not found';
        if (!$companyImage->delete())
            return 'image delete error';
        else
            return 'success';
    }

    /**
     * Ajax для обновления правил админом
     *
     * @author Sergey Kulikov <syrex92@gmail.com>
     *         @date 20.10.15
     */
    public function actionUpdatehtmlrules() {
        if (!\yii::$app->request->isPost || (User::findOne([
                    'user_id' => \yii::$app->user->id
                ])->user_group != 1) || is_null(\yii::$app->request->post('id')))
            return 'user is not admin or request not post or id not defined';
        $company = Company::findOne([
                    'user_id' => \yii::$app->request->post('id')
        ]);
        $company->scenario = 'update_rules';
        if (is_null($company))
            return 'company is not found';
        $company->html_rules = \yii::$app->request->post('html_rules');
        if (!$company->save())
            return 'company save error';
        else
            return 'success';
    }

     /**
     * Отзыв
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 16.09.2016
     *      
     */
    
    public function actionAddreview()
    {    
        $review = new Review;
        $review->scenario = 'add_review'; 
        
         if($review->load(\Yii::$app->request->post()) && $review->validate() && ($review->mt_rand == Yii::$app->session->get('mt_rand'))){
            Yii::$app->session->set('mt_rand','');
            if(!\Yii::$app->user->isGuest) {
                $review->user_id = \Yii::$app->user->identity->user_id;
                $review->email = \Yii::$app->user->identity->email;
                $review->addReview();
                $rating = new InsuranceRating;
                $rating->company_id = $review->company_id;
                $rating->updateRating($review->rating);
            }else {
                $review->confirmEmail();
                return "confirm";
            }
            return "success";
        }
        
        return JSON::encode($review->errors);
    }
    /**
     * Карточка компании
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 16.09.2016
     *      
     */
    
    public function actionDetail()
    {        
        $model = Company::findOne(['user_id'=>(int) \yii::$app->request->get('id')]);
        if (!is_object($model)) return $this->redirect('/404');
        $params = $model->companyInfo();
        $model->scenario = 'edit';
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $model->update();
        }elseif(\Yii::$app->request->get('gallery')=='create'){
            ImgHelper::createGallery((int) \yii::$app->request->get('id'));
        }
        
        
        if((\yii::$app->request->get('view')=='reviews')){
            
            $reviews = new Review;
            $dossier = $this->renderPartial('list_review', ['reviews' => $reviews->getList(false, true, Yii::$app->request->get('id'))]);
            
        }elseif((\yii::$app->request->get('view')=='rules')){
            
            $dossier = $this->renderPartial('list_rules',['params'=>$params]);
            
        }else{
            
            $companes = $model->getCompany();
            
            //$allCity = new AllCity;
            $review = new Review;
            $review->review_id = (int) \yii::$app->request->get('id');
            $review->mt_rand = mt_rand();
            Yii::$app->session->set('mt_rand',$review->mt_rand);
            foreach (\yii::$app->params['staticTypes'] as $k) $typeArr[$k] = $k;
            $dossier = $this->renderPartial('dossier', ['params'=>$params,
                                                        'review'=>$review,
                                                        //'cities'=>$allCity->cities(), 
                                                        'type'=>$typeArr,
                                                        'companes'=>$companes, 
                                                        'onerev'=>$review->getReviewsCompany()->one(), 
                                                        'revcount'=>$review->reviewCount(), 
                                                        'model'=>$model
            ]);
        
        }
        
        return $this->render('detail', ['dossier'=>$dossier, 'params'=>$params,]);
    }
    
    
    /**
     * Страница детальной информации о компании
     *
     * @return string
     */
    public function actionDetail2() {
        $model = new Company ();
        $model->user_id = (int) \yii::$app->request->get('id');
        $view = \yii::$app->request->get('view');
        if (!in_array($view, ['reviews', 'photos', 'rules'])) {
            $view = 'dossier';
        }
        $params = $model->getDetail();

        if ($params ['id'] == 0)
            $this->redirect('/404');
        $titles = [
            'dossier' => "Страховая компания " . $params ['name'] . ' - информация, отзывы, правила страхования',
            'rules' => "Правила страхования компании " . $params ['name'],
            'reviews' => "Отзывы о работе страховой компании " . $params ['name'],
            'photos' => "Галерея изображений страховой компании " . $params ['name'],
        ];

        $descriptions = [
            'dossier' => "Страховая компания " . $params ['name'] . ' - информация, отзывы, правила страхования',
            'rules' => "Правила страхования компании " . $params ['name'] . ' по каско, имуществу, личному страхованию, ДМС, ВЗР, и другим видам - читать онлайн или скачать полную версию',
            'reviews' => "Отзывы клиентов о качестве работы страховой компании " . $params ['name'] . ' при продаже полисов страхования и урегулирования убытков',
            'photos' => "Фотографии и  изображения офисов и филиалов страховой компании " . $params ['name'],
        ];

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $descriptions[$view]
                ], "description");

//        Yii::$app->view->registerMetaTag([
//            'name' => 'keywords',
//            'content' => "Страховая компания {$params['name']}, {$params['name']}, отзывы о страховой компании {$params['name']}"
//                ], "keywords");
        // Информация и отзывы о страховой компании СК «СОЮЗ»
        $params ['companies'] = $model->getRightList();
        $comments = new ReviewComment ();
        $params ['lastComments'] = $comments->getLastComments(10);
        $review = new Review ();
        $review->company_id = $params ['id'];
        $companyImage = new CompanyImage ();
        $companyImage->company_id = $params ['id'];
        $params ['reviews'] = $review->getList(false, true);
        $params ['avg_raiting'] = $model->getAvgRating();
        $params ['raiting'] = $model->getReviewsRatingStatistics();

//        $params ['in_reviews'] = !is_null(\yii::$app->request->get('page'));
//        $params ['in_gallery'] = !is_null(\yii::$app->request->get('gallery'));
        $params ['images'] = $companyImage->getImagesForCompany();
        $params ['last_news'] = (new News ())->getList('index', $params ['name'], 5);

        $user = User::findOne([
                    'user_id' => \yii::$app->user->id
        ]);
        $params ['is_admin'] = is_null($user) ? false : $user->user_group == 1;
//        var_dump($view);
//        die();
        $params['title'] = $titles[$view];
        if ($view) {
            $params['tab'] = $view;
            $params['view'] = $this->renderPartial($view, $params);
        }
        return $this->render('detail', $params);
    }

    /**
     * Возвращает  список всех компаний в представление companyes
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 06.09.2016
     */
    
    public function actionIndex() 
    {
        $companies = new Company();
        $info = $companies->getInfo();
        //var_dump($info['models']); die();
    return $this->render('companies_list', ['models'=>$info['models'], 'sort'=>$info['sort']]);
        
    }
    
   

    /**
     * map page
     * 
     * @param GET-param url company_id
     * @param GET-param branch branch_id
     * 
     * @return html
     */
    public function actionMap($url = null) {
        $company_id = (int) \yii::$app->request->get('url');
        $this->layout = 'search';
        $ax = \yii::$app->request->get('ax');
        $ay = \yii::$app->request->get('ay');
        $id = \yii::$app->request->get('branch');

        $model = new Address ();
        $companies = new Company ();
        $user = User::findOne([
                    'user_id' => \yii::$app->user->id
        ]);

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => self::regionsDescription()
                ], "description");

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => self::keywords()
                ], "keywords");
        $is_admin = is_null($user) ? false : $user->user_group == 1;
        return $this->render('map', [
                    'is_admin' => $is_admin,
                    'company_id' => $company_id,
                    'regions' => $model->getRegionsStringArray(),
                    'cities' => $model->getCitiesStringArray(),
                    'companies' => $companies->getCompaniesStringArray(),
                    'branch' => [
                        'ax' => $ax,
                        'ay' => $ay,
                        'id' => $id
                    ]
        ]);
    }

    /**
     * get json contains companies info
     * @author Kovalchuk Alexander
     * @date
     * @param $company_name
     * @param $region
     * @param $city
     *        	
     * @return json
     */
    public function actionGetcompaniescoord() {
        $model = new Branch ();
        $company = new Company ();


        $company->company_name = \yii::$app->request->post('company');
        $model->company_id = $company->getCompanyIdByName();
        $model->region = \yii::$app->request->post('region');
        $model->city = \yii::$app->request->post('city');


        $companies = \yii::$app->request->post('company_add');

        if (isset($companies)) {
            $companies_ids = [];
            foreach ($companies as $value) {
                $company->company_name = trim($value);
                $companies_ids [] = $company->getCompanyIdByName();
            }
            $model->company_search = $companies_ids;
        }
        $model->getCoordsArray();

        $model->scenario = 'search';
        if ($model->validate()) {
            echo json_encode($model->getCoordsArray());
        } else {
            return json_encode(array_merge([
                'errors' => $model->errors
                            ], [
                'error' => 'error'
            ]));
        }
    }

    /**
     * get all companies coords
     * @author Kovalchuk Alexander
     * @date
     *        
     * @param $company_name
     * @param $region
     * @param $city
     *        	
     * @return json
     */
    public function actionGetallcompaniescoord() {
        $model = new Branch ();
        $model->scenario = 'total_search';
        // $model->company_search = [(int)\yii::$app->request->post('company_id')];
        if ($model->validate()) {
            echo json_encode($model->getCoordsArray());
        } else {
            return json_encode(array_merge([
                'errors' => $model->errors
                            ], [
                'error' => 'error'
            ]));
        }
    }

    /**
     * get one company by company id
     * @author Kovalchuk Alexander
     * @date
     *
     * @param $company_id
     *        	
     * @return type
     */
    public function actionGetcompanycoord() {
        $model = new Branch ();
        $model->scenario = 'total_search';
        //$model->company_id = (int) \yii::$app->request->post('company_id');
        // echo $model->company_id;
        $model->company_search = [(int) \yii::$app->request->post('company_id'), 0];
        // print_r ($model -> company_search);
        //return;

        if ($model->validate()) {
            // echo 'sdf';
            echo json_encode($model->getCoordsArray());
        } else {
            return json_encode(array_merge([
                'errors' => $model->errors], ['error' => 'error']));
        }
    }

    /**
     *
     * @author Kovalchuk Alexander
     * @date 23.11.2015
     *        
     * @param $region
     *        	
     * @return array cities list
     */
    public function actionClarifycitieslist() {
        $address = new Address ();
        $address->region = \yii::$app->request->post('region');
        echo json_encode($address->doCitiesClarify());
    }

    /**
     *
     * @author Kovalchuk Alexander
     *  @date 23.11.2015
     *        
     * @param $region
     *        	
     * @return array region list
     */
    public function actionClarifyregionslist() {
        $address = new Address ();
        $address->city = \yii::$app->request->post('city');
        echo json_encode($address->doRegionsClarify());
    }

    /**
     * all regions page
     *
     * @author Kovalchuk Alexander
     * @date 25.11.2015
     *        
     * @return html
     */
    public function actionRegions() {
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => self::regionsDescription()
                ], "description");

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => self::keywords()
                ], "keywords");
        
        $model = new Address ();
        $result = $model->getRegionsList();
        $branch = new Branch ();

        return $this->render('/branches/regions', [
            'regions' => $result,
            'count' => count($result),
            'count_branches' => $branch->countBrances()
        ]);
    }

    /**
     * cities by one region
     *
     * @author Kovalchuk Alexander
     * @date 25.11.2015
     *        
     * @return html
     */
    public function actionRegion() {
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => self::keywords()
                ], "keywords");

        $model = new Address ();
        $model->country_id = \yii::$app->request->get('id');
        $region_name = $model->getRegionName();

        $result = $model->getCitiesList();

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => self::regionDescription($region_name)
                ], "description");

        

        return $this->render('/branches/region', [
                    'cities' => $result,
                    'count' => count($result),
                    'region' => $region_name
        ]);
    }

    /**
     * 
     *
     * @author Maxim Shablinskiy
     * @date 05.10.2016
     *        
     * @return html
     */
    public function actionCity() {
        $model = new Branch ();
        $address = new Address;
        $address->zone_id = (int) Yii::$app->request->get('id');
        
        
        $city = $address->getCity();
        //echo '<pre>'; print_r($sort); echo '</pre>';
        
        //echo $model->getFilialsByRegion($city)->orderBy($sort->orders)->createCommand()->getRawSql();
        return $this->render('/branches/city', ['city'=>$city]+$model->getFilialsByRegion($city));
    }

    /**
     * one branch
     *
     * @author Kovalchuk Alexander
     * @date 30.11.2015
     * @param $id branch id
     *
     * @return html
     */
    public function actionBranch() {
       
        $model = new Branch();
        $address = new Address();
        $model->id = (int) \yii::$app->request->get('id');
        $model->company_id = (int) $model->getDataFromId((int) \yii::$app->request->get('id'))->company_id;


        $branch = $model->getOnePoint();

        $address->region = $branch['region'];
        $model->region = $branch['region'];
        
        $region_id = $address->getRegionId();
        $address->name = $branch['city'];
        $city_id = $address->getCityId();
         Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => self::branchDescription($branch['company_name'], $branch['city'])
                ], "description");

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => self::branchKeywords($branch['company_name'], $branch['branch'], $branch['region'] . ", " . $branch['city'] . ", " . $branch['address'])
                ], "keywords");

        $logoType = new Company();
        $logo = \yii::$app->params['photosParam']['imgUrl'].$logoType->getDataFromId($model->getDataFromId((int) \yii::$app->request->get('id'))->company_id)->photo;
        $licensy = $logoType->getDataFromId($model->getDataFromId((int) \yii::$app->request->get('id'))->company_id)->license_status;
        $rating = $logoType->getAvgRating($model->getDataFromId((int) \yii::$app->request->get('id'))->company_id);
        $to = new Review();
        $countReview = $to->getCountReview($model->getDataFromId((int) \yii::$app->request->get('id'))->company_id);
        $city = $model->getDataFromId((int) \yii::$app->request->get('id'))->city;

        $filials = $model->getFilial($city);
        $filialsDataProvider = new ArrayDataProvider([
            'allModels' => $filials,
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);
        $last_news = (new News ())->getList('index', $branch['company_name'], 1);



        return $this->render('/branches/branch', ['branch' => $branch,
                    'region_id' => $region_id,
                    'city_id' => $city_id,
                    'logo' => $logo,
                    'licensy' => $licensy,
                    'rating' => $rating,
                    'countReview' => $countReview,
                    'filialsDataProvider' => $filialsDataProvider,
                    'last_news' => $last_news,


        ]);
    }

    public function actionGetonepoint() {
        $model = new Branch ();
        $model->id = (int) \yii::$app->request->post('branch');
        echo json_encode($model->getOnePoint());
    }

    /**
     * @author Kovalchuk Alexander
     * @date 27.11.15
     * parse Addresses
     * служебный экшн, с его помощью мы парсили таблицу адресов Россгосстраха и получали значения
     * координат
     */
    public function actionParseaddress() {
        $model = new Address ();
        $data = $model->getAllParse();

        foreach ($data as $value) {
            $branch = new Branch();
            echo $value['id'];
            echo "|_|";
            /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
            echo $value ['office_name'];
            $branch->branch = $value ['office_name'];
            echo "|_|";
            /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
            echo $value ['region'];
            $branch->region = $value ['region'];
            // echo str_replace("обл.", "обл", $value['region']);
            echo "|_|";
            /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
            $address = explode(",", $value ['address']);
            // echo count($address);

            for ($i = 0; $i < count($address); $i ++) {

                if ($address [0] == 'Москва г' || $address [0] == 'Санкт-Петербург г') {
                    if ($i == 0) {
                        echo explode(" ", $address [$i]) [0];
                        $branch->city = explode(" ", $address [$i]) [0];
                        echo "|_|";
                    }
                    if ($i != 0) {
                        echo $address [$i];
                        $branch->address.= $address[$i];
                    }

                    if ($i != 0 && $i != count($address) - 1) {
                        echo ", ";
                        $branch->address.= ", ";
                    }
                } else {
                    if ($i == 1) {

                        //echo explode ( " ", trim ( $address [$i] ) ) [0];
                        echo $address [$i];
                        $branch->city = $address[$i];
                        echo "|_|";
                    }
                    if ($i != 0 && $i != 1) {
                        echo $address [$i];
                        $branch->address .= $address[$i];
                    }

                    if ($i != 0 && $i != count($address) - 1 && $i != 1) {
                        echo ", ";
                        $branch->address .= ", ";
                    }
                }
            }
            echo "|_|";
            echo $value ['branch'];
            $branch->functions = "Офис страхования";
            echo "|_|";

            /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
            echo $value ['phone1'];
            if ($value ['phone2'] != '') {
                echo ", ";
            }

            echo $value ['phone2'];
            $branch->phones = $value['phone1'] . ", " . $value['phone2'];
            echo "|_|";
            /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
            echo $value ['email'];
            $branch->email = $value ['email'];
            echo "|_|";
            /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
            echo $value ['work_hours'];
            $branch->work_hours = $value ['work_hours'];
            echo "<br/><br/>";
            $branch->company_id = 78;
            $address = new Address();


            if ($branch->city == 'Санкт-Петербург г' || $branch->city == 'Москва г') {
                $city = '';
            } else {
                $city = $branch->city;
            }

            
        }
        
    }

    
}
