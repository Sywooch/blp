<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\News;
use app\models\NewComment;
use app\models\Company;
use yii\helpers\HtmlPurifier;
use app\models\Myfunctions;
use app\models\User;

/**
 * Контроллер раздела компании
 */
class NewsController extends Controller {

    /**
     * Действие редактирования/удаления комментарий админом
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 19.10.15
     * @return string
     */
    public function actionEditcommentbyadmin() {
        if (!\yii::$app->request->isPost ||
                (User::findOne(['user_id' => \yii::$app->user->id])->user_group != 1) ||
                is_null(\yii::$app->request->post('id')))
            return 'user is not admin or request not post or id not defined';
        $comment = NewComment::findOne(['id' => \yii::$app->request->post('id')]);
        if (is_null($comment))
            return 'comment not found';
        switch (\yii::$app->request->post('action')) {
            case 'edit':
                if (!is_null(\yii::$app->request->post('comment')))
                    $comment->text = \yii::$app->request->post('comment');
                if (!$comment->save())
                    return 'edit error';
                return 'edit successful';
                break;
            case 'delete':
                if (!$comment->delete())
                    return 'delete error';
                return 'delete successful';
                break;
        }
    }

    /**
     * Добавляет комментарий к новости (AJAX)
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @return type
     */
    public function actionAddcomment() {

        if (Myfunctions::checkhash(Yii::$app->request->post('defaultReal')) == Yii::$app->request->post('defaultRealHash')) {

            if (!\yii::$app->request->isPost)
                $this->redirect('javascript://history.go(-1)');
            $model = new NewComment;
            $model->scenario = 'add';
            $model->post_id = HtmlPurifier::process(Yii::$app->request->post('post_id'));
            $model->date = date("Y-m-d H:i:s");
            $model->autor = Yii::$app->request->post('name');
            $model->text = Yii::$app->request->post('comment');
            if (Yii::$app->user->isGuest) {
                $model->user_id = 0;
                $model->is_register = 0;
                return;
            } else {
                $model->user_id = Yii::$app->user->getId();
                $model->is_register = 1;
            }

            if (!$model->addComment())
                return json_encode($model->errors);

            echo 'success';

            // $this->redirect(HtmlPurifier::process(htmlspecialchars_decode(Yii::$app->request->post('backUrl'))));
            // else
            //   return 'Ошибка при добавлении комментария';
        } else {
            echo "error";
        }
    }

    /**
     * Страница детальной информации по новости
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @return string
     */
    public function actionDetail() {

        $model = new News;

        //$model->id = Yii::$app->request->get('id');
        //Кол-во просмотров новости
        /*$modelNews = new OlitPostExtras();
        $idNews = Yii::$app->request->get('id');
        $count = $modelNews->getViewCount($idNews);
        $modelNews->setViewCount($idNews , $count);*/
        //echo $idNews;
        //exit;
        //$model->alt_name = Yii::$app->request->get('altname');
        $new = $model->getDetail(Yii::$app->request->get('id'),Yii::$app->request->get('altname'));
        //if ($new['id'] == 0) $this->redirect('/404');        
        if ((int)$new['id']==0) {
            return $this->redirect('/404');
        }    
        $new['count'] = $new['count']+1;        
        $model->setViewCountNews($new['id'],$new['count']);
        //$modelCounter = new OlitPostExtras();
        //$modelNews->setViewCount(Yii::$app->request->get('id') , $new['count']);

        //$meta_tags = $model->getMetaInfo();

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $new['description'],
                ], "description");

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $new['keywords'],
                ], "keywords");

        //$comments = new NewComment;
        //$comments->post_id = $new['id'];
        $another_news_in_cats = [];
        /*foreach ([['novosti-kompanii', 6], ['smi-o-strahovanii', 5], ['est-mnenie', 4], ['banks', 2], ['economics', 3], ['eksklyuziv', 13], ['articles', 14]] as $altname) {
            $another_news_in_cats[$altname[0]]['news'] = $model->getLastNews($altname, 4);
            $another_news_in_cats[$altname[0]]['color'] = $altname[1];
        }*/
        //$user = User::findOne(['user_id' => \yii::$app->user->id]);
        //$admin = is_null($user) ? false : $user->user_group == 1;
        //$company = new Company;
        return $this->render('detail', [
                    //'title' => $meta_tags['title'],
                    'new' => $new,
                    //'comments' => $comments->getForPost(),
                    //'another_news' => $model->getLastNews('index', 8, 'innews', $new),
                    //'another_news_in_cats' => $another_news_in_cats,
                    //'lastComments' => $comments->getLast(),
                    //'username' => isset(\Yii::$app->user->identity->name) ? \Yii::$app->user->identity->name : '',
                    //'is_admin' => $admin,
                    //'random_company_top' => $company->getRandomCompanies(),
                    'last_news' => $model->getLastNews('index', 4, 'main', $new, true),
                    //'count' => $count+1,
        ]);
    }

    /**
     * Страница списка новостей
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @return string
     */
    public function actionIndex() {

        if (!is_null(Yii::$app->request->get('id')))
            return $this->actionDetail();
        $model = new News;
        $comments = new NewComment;
        $company = new Company;
        //$lastComments = $comments->getLast();
        if (!is_null(Yii::$app->request->get('cat')))
            $params = $model->getList(Yii::$app->request->get('cat'));
        elseif (!is_null(Yii::$app->request->get('tag')))
            $params = $model->getList('index', Yii::$app->request->get('tag'));
        else
            $params = $model->getList();
        //$params['lastComments'] = $lastComments;
        //$params['random_company_top'] = $company->getRandomCompanies();
        $params['category'] = Yii::$app->request->get('cat');
        $params['active_category'] = Yii::$app->request->get('cat');
        $show_category_ids = [
            6, 5, 2, 3, 4, 13, 14
        ];
        $params['categories'] = $model->getCategories($show_category_ids);
        if (Yii::$app->request->get('cat') == 'articles')
            return $this->render('list-tile', $params);
        return $this->render('list', $params);
    }

}
