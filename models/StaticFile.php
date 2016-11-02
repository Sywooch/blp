<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * Модель статических страниц
 * @author Sergey Kulikov <syrex92@gmail.com>
 */
class StaticFile extends ActiveRecord
{
    
    /**
     * 
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_static_files';
    }
    
    /**
     * 
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        return array_merge($rules, []);
    }
    
    /**
     * 
     * @inheritdoc
     */    
    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'id', 
            'name', 
            'onserver',
            ]);
    }
    
    /**
     * 
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        return $scenarios;
    }
    
    /**
     * Получает блок <a href> для статического файла на статический файл
     * @author Sergey Kulikov <syrex92@gmail.com>
     * @date 14.10.15
     * @param int $this->id Идентификатор файла
     * @param string $this->name Имя файла
     * @return type
     */
    public function getHref()
    {
        $oneFile = $this->findOne(['id' => $this->id, 'name' => $this->name]);
        return is_null($oneFile)?'':'<a href="/upload/files/'.$oneFile['onserver'].'">'.$this->name.'</a>';
    }
    
}
