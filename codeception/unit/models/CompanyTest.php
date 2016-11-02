<?php
namespace models;

use app\models\Company;
 
class CompanyTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new Company;
        $this->model->user_id = 25;
    }

    protected function _after()
    {
    }

    // tests
    public function testGetTop5()
    {
        $result = $this->model->getTop5();
        $this->assertCount(5, $result);
        foreach([
            'name' => 'string', 
            'id' => 'integer', 
            'count' => 'integer', 
            'rating' => 'integer'
            ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
    }
    
    public function testGetMostPopular()
    {
        $result = $this->model->getMostPopular();
        $this->assertCount(10, $result);
        foreach([
            'name' => 'string', 
            'id' => 'integer', 
            'count' => 'integer', 
            'rating' => 'float'
            ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
        $result = $this->model->getMostPopular(11);
        $this->assertCount(11, $result);
        foreach([
            'name' => 'string', 
            'id' => 'integer', 
            'count' => 'integer', 
            'rating' => 'float'
            ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
    }
    
    public function testGetRightList()
    {
        $result = $this->model->getRightList();
        $this->assertNotEmpty($result);
        foreach([
            'id' => 'int', 
            'name' => 'string', 
            'reviews' => 'int'
            ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
    }
    
    public function testGetList()
    {
        $result = $this->model->getList(['field'=>'user_id', 'orderBy'=>SORT_DESC]);
        $companies = $result['companies'];
        $this->assertNotEmpty($companies);
        foreach([
            'id' => 'int', 
            'logo' => 'string', 
            'name' => 'string', 
            'license_status' => 'string', 
            'license_for_insurance' => 'string', 
            'rating' => 'int', 
            'reviews' => 'int'
            ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $companies[0]);
            $this->assertInternalType($type, $companies[0][$key]);
        }
        
    }
    
    public function testGetCompanyName()
    {
        $result = $this->model->getCompanyName();
        $this->assertInternalType('string', $result);
    }
    
    public function testGetDetail()
    {
        $result = $this->model->getDetail();
        foreach([
            'id' => 'int',
            'logo' => 'string',
            'name' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'site' => 'string',
            'license' => 'string',
            'license_status' => 'string',
            'license_for_insurance' => 'string',
            'license_for_reinsurance' => 'string',
            'rating' => 'int',
            'capital' => 'int',
            'additional_info' => 'string',
            'html_rules' => 'string'
        ] as $key => $type) 
        {
            $this->assertArrayHasKey($key, $result);
            $this->assertInternalType($type, $result[$key]);
        }
    }
    
    public function testGetColor()
    {
        $result = $this->model->getColor();
        $this->assertInternalType('string', $result);
    }
    
    public function testGetReviewsRatingStatistics()
    {
        $result = $this->model->getReviewsRatingStatistics();
        $this->assertInternalType('array', $result);
    }
    
    public function testGetAvgRating()
    {
        $result = $this->model->getAvgRating();
        $this->assertInternalType('float', $result);
    }
}