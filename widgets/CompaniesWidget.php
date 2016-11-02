<?php
namespace app\widgets;

use yii\base\Widget;
use app\models\Company;

class CompaniesWidget extends Widget
{
     public $search;
    

    public function init()
    {
        parent::init();
        
    }

    public function run()
    {
        $companies = new Company;
       // var_dump($companies->get4RandCompany()); 
       $get4comp = $companies->get4RandCompany();
       //echo $companies->get4RandCompany()->createCommand()->getRawSql(); die();
        
        return $this->render('companies/companies', ['companies'=>$get4comp]);
        
    }
}