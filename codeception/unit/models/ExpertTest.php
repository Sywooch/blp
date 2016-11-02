<?php
namespace models;

use Yii;
use yii\app\models\Expert;

class ExpertTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new Expert;
        $this->model->user_id = 2858;
    }

    protected function _after()
    {
    }


    
    public function testGetDetail()
    {
        $result = $this->model->getDetail();
        foreach([
            'id' => 'int',
            'full_name' => 'string',
            'company_name' => 'string',
            'position' => 'string',
            'reference' => 'string',
            'site_name' => 'string',
            'active_expert' => 'string'
        ] as $key => $type) 
        {
            $this->assertArrayHasKey($key, $result);
            $this->assertInternalType($type, $result[$key]);
        }
    }
    

}

