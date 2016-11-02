<?php
namespace models;

use app\models\NewComment;

class NewCommentTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new NewComment;
        $this->model->post_id = 16124;
    }

    protected function _after()
    {
    }

    // tests
    public function testEditorFilter()
    {
        $result = $this->model->editorFilter('text');
        $this->assertInternalType('string', $result);
    }
    
    public function testGetForPost()
    {
        $result = $this->model->getForPost();
        $this->assertInternalType('array', $result);
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
    
    public function testGetLast()
    {
        $result = $this->model->getLast();
        $this->assertInternalType('array', $result);
        foreach([
            'date' => 'string',
            'name' => 'string',
            'text' => 'string',
            'new_title' => 'string',
            'url' => 'string'
        ] as $key => $type) 
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
    }
}