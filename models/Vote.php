<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\User;

/**
 * @author Sergey Kulikov <syrex92@gmail.com>
 */
class Vote extends ActiveRecord
{
    public $user_id;
    
    /**
     * 
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_vote';
    }

    /**
     * 
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        return $rules;
    }
    
    /**
     * 
     * @inheritdoc
     */
    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'id',
            'title',
            'body'
            ]);
    }
    
    /**
     * 
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        return $scenarios;
    }
    /**
     * Получает информацию и результаты последнего голосования и участвовал ли в нем текущий пользователь
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     * @param int $this->user_id ID пользователя
     * @return array
     */
    public function getLastVote()
    {
        $lastVote = $this   ->  find()
                            //->  addOrderBy(['id' => SORT_DESC])
                            ->  where(['approve' => 1 ])
                            ->  one();


        $vote_result = new VoteResult;
        $vote_result->user_id = $this->user_id;
        $vote_result->vote_id = $lastVote['id'];
        return [
            'question' =>  $lastVote['title'],
            'answers' => explode('<br />', $lastVote['body']),
            'vote_id' => $lastVote['id'],
            'results' => $vote_result->getResult(),
            //'result' => $vote_result->isUsersVote()
           // 'result' => $vote_result->isUsersCloseWin(),
            
        ];
    }
}