<?php
namespace models;

use app\models\StaticPage;

class StaticPageTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new StaticPage;
        $this->model->name = 'olit-rules-page';
    }

    protected function _after()
    {
    }

    // tests
    public function testGetPage()
    {
        $result = $this->model->getPage();
        $this->assertInternalType('array', $result);
        foreach([
            'name' => 'string',
            'descr' => 'string',
            'template' => 'string',
            'description' => 'string',
            'keywords' => 'string',
            'type' => 'string',
            'pages' => 'array',
            'news' => 'array',
            'views' => 'int'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result);
            $this->assertInternalType($type, $result[$key]);
        }
    }
}