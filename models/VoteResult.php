<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\User;

/**
 * @author Sergey Kulikov <syrex92@gmail.com>
 */
class VoteResult extends ActiveRecord
{
    public $user_id;
    
    /**
     * 
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_vote_result';
    }

    /**
     * 
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        array_merge($rules, [
            [['name', 'vote_id', 'answer'], 'required', 'on' => 'add_vote'],
            [['vote_id','answer'], 'integer', 'on' => 'add_vote'],
            //['vote_id', 'exist', 'on' => 'add_vote'],
        ]);
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
            'name',
            'vote_id',
            'answer'
            ]);
    }
    
    /**
     * 
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        $scenarios['add_vote'] = [
            'name',
            'vote_id',
            'answer'
        ];
        return $scenarios;
    }
    /**
     * Возвращает результаты голосования $this->vote_id
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     * @param int $this->vote_id ID голосования
     * @return array
     */
    public function getResult()
    {
        $ansVote = new Vote();
        $lastVote = $ansVote   ->  find()
            ->  where(['approve' => 1 ])
            ->  one();
        $allAnswers = explode('<br />', $lastVote['body']); // Помещаем все вопросы в массив


        $response = $this   ->find()
                            ->andWhere(['vote_id' => $this->vote_id])
                            ->addGroupBy('answer')
                            ->addOrderBy('answer')
                            ->all();


        $res = [];
        foreach(is_null($response)?[]:$response as $ans)
        {
            $count = $this  ->  find()
                            ->  andWhere([
                                    'vote_id'=>$this->vote_id,
                                    'answer'=>$ans->answer
                                ])
                            ->  count();
            $res[] = [
                'answer' => $ans->answer,
                'ans_count' => (int)$count
            ];
        }


        if (count($allAnswers) > count($res)) // Сравниваем количество вопросов с вариантами ответа пользователей
        {
            while (count($allAnswers) > count($res)) //Если вариантов ответа больше вариантов вопроса, то добавляем в массив варианты ответов, которые никто не выбирал
            {
                $res[] = [
                    'answer' => count($res),
                    'ans_count' => 0
                ];
            }

        }


        $sum = 0;
        foreach($res as $str)
            $sum += $str['ans_count'];
        foreach($res as &$str)
            if($str['ans_count']==0) $str['percent'] = 0;
                else $str['percent'] = round($str['ans_count']/(($sum==0)?1:$sum)*100, 2);
       
        return $res;
    }
    
    /**
     * Добавляет голос
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     */
    public function addVote()
    {
        //if($this->user_id != 0 && !$this->isUsersVote())
            return $this->save();
       
    }
    
    /**
     * Проверяет проголосовал пользователь или нет
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     * @param int $this->user_id ИД пользователя
     * @param int $this->vote_id ID голосования
     * @return boolean
     */
    public function isUsersVote()
    {
        if($this->user_id == 0)
            return true;
        $user   =   new User;
        $user->user_id = $this->user_id;
        $name   =   $user->getName();
        $count  =   $this->find()
                        ->andWhere([
                            'name' => $name,
                            'vote_id' => $this->vote_id
                                ])
                        ->count();
        if($count == 0)
            return false;
        return true;
    }


    /**
     * Делает опрос снова активным после закрытия браузера
     * @return bool
     */
    public function isUsersCloseWin(){
        if(Yii::$app->session->get('opros'))
            return true;
        else {
            return false;
        }
    }

}