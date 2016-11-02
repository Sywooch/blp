<?php
namespace models;

use app\models\Vote;

class VoteTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new Vote;
    }

    protected function _after()
    {
    }

    // tests
    public function testGetLastVote()
    {
        $result = $this->model->getLastVote();
        $this->assertInternalType('array', $result);
        foreach([
            'question' => 'string',
            'answers' => 'array',
            'vote_id' => 'int',
            'results' => 'array',
            'result' => 'boolean'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result);
            $this->assertInternalType($type, $result[$key]);
        }
    }
}