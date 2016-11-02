<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "olit_all_city".
 *
 * @property integer $id
 * @property integer $id_region
 * @property integer $id_country
 * @property integer $oid
 * @property string $city_name_ru
 * @property string $city_name_en
 */
class AllCity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_all_city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_region', 'id_country', 'oid', 'city_name_en'], 'required'],
            [['id_region', 'id_country', 'oid'], 'integer'],
            [['city_name_ru', 'city_name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_region' => 'Id Region',
            'id_country' => 'Id Country',
            'oid' => 'Oid',
            'city_name_ru' => 'City Name Ru',
            'city_name_en' => 'City Name En',
        ];
    }
    /**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016
     * Возвращает массив значений городов
     */
    public function cities()
    {
        $query = new Query;
        foreach($query->select(['city_name_ru as value', 'city_name_ru as label'])->from('olit_all_city')->all() as $k):
            $arr[] = $k;
        endforeach;
       
        return $arr;
    }
}
