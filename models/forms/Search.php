<?php

namespace app\models\forms;

use yii\base\Model;
use yii\db\Query;

/**
* @author Maxim Shablinskiy maxshabl@yandex.ru
* @date 04.08.2016
* Быстрый поиск на всех страницах
*/
class Search extends Model
{
    public $search;
    public $mainsearch;
    public $companysearch;

    public function rules()
    {
        return [
            [['search'], 'required', 'on' => 'search'],
            [['mainsearch'], 'required', 'on' => 'mainsearch'],
            [['companysearch'], 'required', 'on' => 'companysearch'],
           /* [['search'], 'required', 'on' => 'search'],
            [['mainsearch'], 'required', 'on' => 'mainsearch'],
            [['companysearch'], 'required', 'on' => 'companysearch'],*/
        ];
    }
    /**
     * Главный поиск. Возвращает количество записей и результат поиска. 
     * Лимит ставит SQLdataProvider который используется в контроллере.
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * 
     */
    public function search($stem_str = false)
    {
        $query = new Query;
        $raws = $query->select('id, name, descr, photo, link, branch_id, post_id, static_id, MATCH(name, descr)'
                . 'AGAINST(:stem_str IN BOOLEAN MODE)')
                ->from('olit_search')
                ->where('MATCH(name, descr) AGAINST(:stem_str)>0')
                ->orderBY('MATCH(name, descr) AGAINST(:stem_str IN BOOLEAN MODE)');
        $raws->addParams([':stem_str'=> $this->search]);
        
        return $raws;
       
    }
    
    /**
     * Поиск по компаниям
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 04.08.2016
     * @param string $param название компании
     * @return object Возвращает объект запроса
     */
    /*public function companySearch($str = '') 
    {
        $query = new Query;
        foreach($query->select(['company_name as value', 'company_name as label'])->from('olit_insurance_user')->all() as $k) $arr[] = $k;
        
        $query2 = new Query;
        $query2->select(['company_name as company'])->from('olit_insurance_user');
        $query2->filterWhere('company_name = :str', [':str'=>$str]);
                
        return $params = [
            'companys' => $arr,
            'search' => $query2
        ];
    }*/
    
}