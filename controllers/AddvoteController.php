<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\VoteResult;
use app\models\User;
use yii\helpers\Url;

/**
 * Контроллер раздела компании
 */
class AddvoteController extends Controller
{
    /**
     * Действие добавления отзыва
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 15.10.15
     * @return string
     */
    public function actionAdd()
    {   
        if(Yii::$app->session['opros']!=true):
            $vote = new VoteResult;
            $vote->scenario = 'add_vote';
            $user = new User;
            $user->user_id = \yii::$app->user->id;
            $vote->name = $user->getName();
            $vote->vote_id = \yii::$app->request->post('vote_id');
            $vote->answer = \yii::$app->request->post('vote_check');
            $vote->user_id = \yii::$app->user->id;
            $vote->addVote();
            Yii::$app->session->set('opros', true);
        endif;
        
           
        }
        //var_dump(Yii::$app->response->cookies['opros']); die();
        //return $this->redirect([Url::previous()]);
            
}
