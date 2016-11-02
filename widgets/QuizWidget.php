<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Vote;
use app\models\VoteResult;


/**
 * Опрос на главной
 * @author Maxim Shablinskiy maxshabl@yandex.ru
 * @date 06.09.2016
 * 
 */

class QuizWidget extends Widget
{
    
   
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if(Yii::$app->request->isAjax && Yii::$app->session['opros']!=true) {
            $vote = new Vote;
            $vote->user_id = (Yii::$app->user->isGuest ? 0 : Yii::$app->user->identity->user_id);
            $voteResult = new VoteResult;
            $voteResult->scenario = 'add_vote';
            $voteResult->vote_id = Yii::$app->request->post('vote_id');
            $voteResult->answer = Yii::$app->request->post('vote_check');
            $voteResult->name = (Yii::$app->user->isGuest ? 'guest' : Yii::$app->user->identity->name);
            $voteResult->user_id = Yii::$app->user->isGuest ? 0 : Yii::$app->user->identity->user_id;
           
            if($voteResult->answer != NULL){
                $voteResult->addVote();
                Yii::$app->session->set('opros', true);
                return $this->render('quiz/result', ['poll' => $vote->getLastVote()]);
            }
        }
        elseif(Yii::$app->session['opros']==true) {
            
            $vote = new Vote;
            $vote->user_id = (Yii::$app->user->isGuest ? 0 : Yii::$app->user->identity->user_id);
            return $this->render('quiz/result', ['poll' => $vote->getLastVote()]);
        }
        
        $vote = new Vote;
        $vote->user_id = (Yii::$app->user->isGuest ? 0 : Yii::$app->user->id);
        //var_dump(Yii::$app->session['opros']);die();
        return $this->render('quiz/quiz', ['poll' => $vote->getLastVote()]);
      
    }
}