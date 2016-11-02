<?php

namespace app\models\forms;

use yii\base\Model;
use Yii;

class MainSearch extends Model
{
    public $search;
 

    public function rules()
    {
        return [
            [['search'], 'required'],
        
        ];
    }
    /**
     * Главный поиск. Возвращает количество записей и результат поиска. Лимит ставит SQLdataProvider!!! который используется в контроллере
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * 
     */
    public function search($stem_str = false)
    {

        if($stem_str)
        {
            $query=Yii::$app->db->createCommand("SELECT count(id), MATCH(name, descr) AGAINST(:stem_str IN BOOLEAN MODE) FROM olit_search WHERE MATCH(name, descr) AGAINST(:stem_str)>0
                    ORDER BY MATCH(name, descr) AGAINST(:stem_str IN BOOLEAN MODE)", [':stem_str' => $stem_str])->queryScalar();

            return $query;
            
        }else{
           $query="SELECT id, name, descr, photo, link, branch_id, post_id, static_id, MATCH(name, descr) AGAINST(:stem_str IN BOOLEAN MODE) FROM olit_search WHERE MATCH(name, descr) AGAINST(:stem_str)>0
                    ORDER BY MATCH(name, descr) AGAINST(:stem_str IN BOOLEAN MODE) DESC";

            return $query; 
        }
                
    }
}