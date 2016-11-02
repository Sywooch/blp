<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "olit_post_extras".
 *
 * @property integer $eid
 * @property integer $news_id
 * @property integer $news_read
 * @property integer $allow_rate
 * @property integer $rating
 * @property integer $vote_num
 * @property integer $votes
 * @property integer $view_edit
 * @property integer $disable_index
 * @property string $related_ids
 * @property string $access
 * @property integer $editdate
 * @property string $editor
 * @property string $reason
 * @property integer $user_id
 */
class OlitPostExtras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_post_extras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'news_read', 'allow_rate', 'rating', 'vote_num', 'votes', 'view_edit', 'disable_index', 'editdate', 'user_id'], 'integer'],
            [['related_ids', 'reason'], 'string', 'max' => 255],
            [['access'], 'string', 'max' => 150],
            [['editor'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eid' => 'Eid',
            'news_id' => 'News ID',
            'news_read' => 'News Read',
            'allow_rate' => 'Allow Rate',
            'rating' => 'Rating',
            'vote_num' => 'Vote Num',
            'votes' => 'Votes',
            'view_edit' => 'View Edit',
            'disable_index' => 'Disable Index',
            'related_ids' => 'Related Ids',
            'access' => 'Access',
            'editdate' => 'Editdate',
            'editor' => 'Editor',
            'reason' => 'Reason',
            'user_id' => 'User ID',
        ];
    }
    /**
     * Получаем количество просмотров по отдельной новости
     * @param $newsId
     * @return int
     */
    public function getViewCount($newsId){
        $query = (new Query)
            ->select(['news_read'])
            ->from('olit_post_extras')
            ->where(['news_id' => $newsId])
            ->one();
        if(!empty($query)){
            return $query['news_read'];
        }else{
            return 0;
        }
    }

    /**
     * Записываем количество просмотров после очередного просмотра
     * @param $newsId
     * @param $count
     * @throws \Exception
     */

    public function setViewCount($newsId , $count){
        $count++;
        $model = self::findOne(['news_id' => $newsId ]);
        $model->news_read = $count;
        $model->update();
    }
}
