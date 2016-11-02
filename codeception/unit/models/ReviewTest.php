<?php
namespace models;

use app\models\Review;

class ReviewTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new Review;
        $this->model->review_id = 87878;
        $this->model->company_id = 58;
    }

    protected function _after()
    {
    }

    // tests
    public function testReviewCount()
    {
        $result = $this->model->reviewCount();
        $this->assertInternalType('int', $result);
    }
    
    public function testReviewCountByCompany()
    {
        $result = $this->model->reviewCountByCompany();
        $this->assertInternalType('int', $result);
    }
    
    public function testReviewCountLastWeek()
    {
        $result = $this->model->reviewCountLastWeek();
        $this->assertInternalType('int', $result);
    }
    
    public function testLastReview()
    {
        $result = $this->model->lastReview();
        $this->assertInternalType('array', $result);
        foreach([
            'id' => 'int',
            'rating' => 'int',
            'company_id' => 'int',
            'company_name' => 'string',
            'type' => 'string',
            'text' => 'string',
            'author' => 'string',
            'date' => 'string'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result);
            $this->assertInternalType($type, $result[$key]);
        }
    }
    
    public function testGetById()
    {
        $result = $this->model->getById();
        $this->assertInternalType('array', $result);
        foreach([
            'id' => 'int',
            'count' => 'int',
            'rating' => 'int',
            'company_name' => 'string',
            'company_id' => 'int',
            'text' => 'string',
            'author' => 'string',
            'author_email' => 'string',
            'type' => 'int',
            'date' => 'string',
            'title' => 'string',
            'answer' => 'array'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result);
            $this->assertInternalType($type, $result[$key]);
        }
    }
    
    public function testGetList()
    {
        $result = $this->model->getList();
        $this->assertInternalType('array', $result);
        $this->assertInternalType('int', $result['count']);
        $this->assertInternalType('array', $result['reviews']);
        $this->assertInternalType('array', $result['reviews'][0]);
        foreach([
            'id' => 'int',
            'author' => 'string',
            'city' => 'string',
            'text' => 'string',
            'type' => 'string',
            'type_name' => 'string',
            'date' => 'string',
            'rating' => 'float',
            'company_name' => 'string',
            'company_id' => 'int',
            'company_color' => 'string',
            'answer' => 'array'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result['reviews'][0]);
            $this->assertInternalType($type, $result['reviews'][0][$key]);
        }
    }
    
    public function testGetRatingByCompany()
    {
        $result = $this->model->getRatingByCompany();
        $this->assertInternalType('array', $result);
        foreach([
            'rating' => 'int',
            'reviews' => 'int',
            'place' => 'int'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result);
            $this->assertInternalType($type, $result[$key]);
        }
    }
}