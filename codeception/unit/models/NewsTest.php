<?php
namespace models;

use app\models\News;

class NewsTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $model;

    protected function _before()
    {
        $this->model = new News;
        $this->model->id = 17;
        $this->model->alt_name = 'reyting-podtverzhden';
    }

    protected function _after()
    {
    }

    public function testGetMetaInfo()
    {
        $result = $this->model->getMetaInfo();
        $this->assertInternalType('array', $result);
        foreach([
            'title' => 'string',
            'description' => 'string',
            'keywords' => 'string'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result);
            $this->assertInternalType($type, $result[$key]);
        }
    }
    
    public function testGetDetail()
    {
        $result = $this->model->getDetail();
        $this->assertInternalType('array', $result);
        foreach([
            'id' => 'int',
            'title' => 'string',
            'full_story' => 'string',
            'date' => 'string',
            'category_id'=>'int',
            'category_name' => 'string',
            'category_altname' => 'string',
            'image' => 'string',
            'type' => 'array',
            'tags' => 'array',
            'photo' => 'string'
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
        $this->assertInternalType('array', $result['news']);
        foreach([
            'id' => 'int',
            'date' => 'string',
            'title' => 'string',
            'short_story' => 'string',
            'alt_name' => 'string',
            'category_id' => 'int',
            'category_name' => 'string',
            'category_altname' => 'string',
            'descr' => 'string',
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result['news'][0]);
            $this->assertInternalType($type, $result['news'][0][$key]);
        }
    }
    
    public function testGetLastNews()
    {
        $result = $this->model->getLastNews();
        $this->assertInternalType('array', $result);
        $this->assertInternalType('array', $result[0]);
        foreach([
            'date' => 'string',
            'title' => 'string',
            'category' => 'string',
            'url' => 'string',
            'image' => 'string',
            'short_story' => 'string',
            'full_text' => 'string'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
    }
    
    public function testGetCategories()
    {
        $result = $this->model->getCategories();
        $this->assertInternalType('array', $result);
        $this->assertInternalType('array', $result[0]);
        foreach([
            'id' => 'int',
            'name' => 'string'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
    }
    
    public function testEncodestring()
    {
        $result = $this->model->encodestring('');
        $this->assertInternalType('string', $result);
    }
    
    public function testGetListForStatic()
    {
        $result = $this->model->getListForStatic(1);
        $this->assertInternalType('array', $result);
        $this->assertInternalType('array', $result[0]);
        foreach([
            'date' => 'string',
            'title' => 'string',
            'url' => 'string'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
    }
    
    public function testGetRssNews()
    {
        $result = $this->model->getRssNews();
        $this->assertInternalType('array', $result);
        $this->assertInternalType('array', $result[0]);
        foreach([
            'date' => 'string',
            'title' => 'string',
            'category' => 'string',
            'url' => 'string',
            'image' => 'string',
            'short_story' => 'string',
            'full_story' => 'string'
        ] as $key => $type)
        {
            $this->assertArrayHasKey($key, $result[0]);
            $this->assertInternalType($type, $result[0][$key]);
        }
    }
}