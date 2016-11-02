<?php
namespace models;

use app\models\VoteResult;

class VoteResultTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new VoteResult;
        $this->model->vote_id = 1;
        $this->model->user_id = 1;
    }

    protected function _after()
    {
    }

    // tests
    public function testGetResult()
    {
        $result = $this->model->getResult();
        $this->assertInternalType('array', $result);
        $this->assertInternalType('array', $result[0]);
        foreach([
            'answer' => 'int',
            'ans_count' => 'int',
            'percent' => 'float'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
    }
    
    public function testIsUserVote()
    {
        $result = $this->model->isUsersVote();
        $this->assertInternalType('boolean', $result);
    }
}