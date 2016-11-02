<?php
namespace models;

use app\models\StaticFile;

class StaticFileTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new StaticFile;
        $this->model->id = 1;
        $this->model->name = 'akt.doc';
    }

    protected function _after()
    {
    }

    // tests
    public function testGetHref()
    {
        $result = $this->model->getHref();
        $this->assertInternalType('string', $result);
    }
}