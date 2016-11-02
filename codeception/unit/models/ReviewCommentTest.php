<?php
namespace models;

use app\models\ReviewComment;

class ReviewCommentTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new ReviewComment;
    }

    protected function _after()
    {
    }

    public function testGetList()
    {
        $result = $this->model->getList(1);
        $this->assertInternalType('array', $result);
        $this->assertInternalType('array', $result[0]);
        foreach([
            'id' => 'int',
            'date' => 'string',
            'name' => 'string',
            'comment' => 'string'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
    }
    
    public function testGetLastComments()
    {
        $result = $this->model->getLastComments(1);
        $this->assertInternalType('array', $result);
        $this->assertInternalType('array', $result[0]);
        foreach([
            'date' => 'string',
            'name' => 'string',
            'review' => 'int',
            'comment' => 'string',
            'long_comment' => 'boolean',
            'count' => 'int',
            'company_name' => 'string'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
    }
}