<?php
namespace models;

use app\models\Myfunctions;

class MyfunctionsTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new Myfunctions;
    }

    protected function _after()
    {
    }

    // tests
    public function testAlphanumeric()
    {
        $result = $this->model->alphanumeric('');
        $this->assertInternalType('boolean', $result);
    }
    
    public function testCheckhash()
    {
        $result = $this->model->checkhash('');
        $this->assertInternalType('int', $result);
    }
    
    public function testLeftShift32()
    {
        $result = $this->model->leftShift32(1,2);
        $this->assertInternalType('integer', $result);
    }
}