<?php
namespace models;

use app\models\User;

class UserTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new User;
        $this->user_id = 1;
        $this->email = 'partner@711.ru';
        $this->password = '988d6e6eeeb7159d7a2fd4c3c8714e95';
    }

    protected function _after()
    {
    }

    // tests
    public function testCheckAuth()
    {
        $result = $this->model->checkAuth();
        $this->assertInternalType('boolean', $result);
    }
    
    public function testGetName()
    {
        $result = $this->model->getName();
        $this->assertInternalType('string', $result);
    }
    
    public function testUserExist()
    {
        $result = $this->model->userExist();
        $this->assertInternalType('boolean', $result);
    }
    
    public function testEmailExist()
    {
        $result = $this->model->emailExist();
        $this->assertInternalType('string', $result);
    }
    
    public function testGetUser()
    {
        $result = $this->model->getUser();
        $this->assertInternalType('array', $result);
        foreach([
            'name' => 'string',
            'email' => 'string',
            'id' => 'int'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result);
            $this->assertInternalType($type, $result[$key]);
        }
    }
    
    public function testIsCompany()
    {
        $result = $this->model->isCompany();
        $this->assertInternalType('boolean', $result);
    }
}