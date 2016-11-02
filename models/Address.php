<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\User;
use app\models\Review;
use app\models\ReviewComment;
use yii\data\Pagination;
use yii\helpers\HtmlPurifier;
use yii\web\HttpException;
use yii\web\Response;

//use app\models\Company;

/**
 * Модель компаний
 */
class Address extends ActiveRecord {

    public static function tableName() {
        return 'oc_zone';
    }

    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'address',
            'point',
            'name',
            'region',
            'city',
            'zone_id',
            'country_id'
        ]);
    }

    /**
     * get all citites
     * @author Kovalchu Alexander
     * @date 18.11.15
     * 
     * @return stirng (js array constructior)
     */
    public function getCitiesStringArray() {
        $query = $this->find()->orderBy(['name' => SORT_ASC]);
        if (isset($this->region)) {

            $query->where(['country_id' => $this->getRegionId()]);
        }

        $cities = $query->all();
        $data = "[";
        foreach ($cities as $value) {
            $data .= "'" .  $value['name'] . "', ";
        }
        $data.= "]";
        return $data;
    }

    /**
     * get all regions
     * @author Kovalchuk Alexander
     * @date 18.11.15
     * 
     * @return string( js array constructor)
     */
    public function getRegionsStringArray() {
        $countries = (new Query)
                ->select('country_id, name')
                ->from('oc_country')
                ->orderBy(['country_id' => SORT_ASC])
                ->all();
        $data = "[";
        foreach ($countries as $value) {
            $data.= "'" .  $value['name'] . "', ";
        }
        $data.= "]";
        return $data;
    }

    /**
     * @author Glazyrev Konstantin
     * Получеие информации об адресе из yandex
     * Информация запрашивается через @simplexml_load_file
     * @param char $this->address - адрес 
     */
    public function point() {
        //$this->point = '';
        $address = '';
        $this->point = [];
        #    http://geocode-maps.yandex.ru/1.x/?format=xml&geocode=%D0%91%D0%B8%D1%80%D1%8E%D0%BB%D1%91%D0%B2%D1%81%D0%BA%D0%B0%D1%8F%2023
        if (strlen($this->address) > 10) {
            $xml = @simplexml_load_file('http://geocode-maps.yandex.ru/1.x/?format=xml&geocode=' . urlencode($this->address) . '&results=1');
            $found = @$xml->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found;

            if ($found > 0) {
                $this->point = str_replace(' ', ',', $xml->GeoObjectCollection->featureMember->GeoObject->Point->pos);
                $address = urlencode($this->address);
            }
            return $this->point;
        }
        return FALSE;
    }

    /**
     * http://www.yiiframework.com/forum/index.php/topic/22377-mysql-spatial-view-create-update/
     * Получение адреса в формате MYsql
     * @param char  $this->address -  адрес в свободной форме
     * @return Geo object
     */
    public function save_address() {
        $xml = simplexml_load_file('http://geocode-maps.yandex.ru/1.x/?format=xml&geocode=' . urlencode($this->point) . '&results=1');
        $found = $xml->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found;
        if ($found > 0) {
            $geo = str_replace(' ', ' ', $xml->GeoObjectCollection->featureMember->GeoObject->Point->pos);
            $geo = new \yii\db\Expression("GeomFromText('POINT({$geo})')");
            return $geo;
        }
    }

    /**
     * @author Kovalchuk Alexander
     * @date 23.11.2015
     * 
     * @return int region id
     */
    public function getRegionId() {
        $this->region = trim(strip_tags($this->region));
        return (new Query)
                        ->from('oc_country')
                        ->where(['name' => $this->region])
                        ->select('country_id')
                        ->one() ['country_id'];
    }

    /**
     * @author Kovalchuk Alexander
     * @date 23.11.2015
     * 
     * @return int region id
     */
    public function getRegionName() {

        $name = (new Query)
                        ->from('oc_country')
                        ->where(['country_id' => $this->country_id])
                        ->select('name')
                        ->one() ['name'];

        return  $name;
    }
    
    /**
     * @author Kovalchuk Alexander
     * @date 26.11.2015
     * 
     * @return int region id
     */
    public function getCityName() {

        $name = $this->find()
                        
                        ->where(['zone_id' => (int) $this->zone_id])
                        ->select('name')
                        ->one() ['name'];
        if(empty($name)){
            Yii::$app->getResponse()->redirect(['/404']);
        }
        return  $name;
    }
    
    /**
     * @author Kovalchuk Alexander
     * @date 23.11.2015
     *
     * @return int region id
     */
    public function getCityId() {
    	$this -> name = trim(strip_tags($this->name));
    	$name_arr = explode(" ", $this -> name);
    	if (count($name_arr)>1) {
    		$this->name = $name_arr[0];
    	}
    	return $this->find()
    	->where(['like', 'name', $this->name])
    	->select('zone_id')
    	->one() ['zone_id'];
    }

    /**
     * @author Kovalchuk Alexander
     * @date 23.11.2015
     * 
     * @return int region id
     */
    public function getRegionIdsByCity() {
        $this->city = trim(strip_tags($this->city));
        return $this->find()
                        ->where(['name' => $this->city])
                        ->select('country_id')
                        ->all();
    }

    /**
     * do cities clarify by region
     * @author Kovalchuk Alexander
     * @date 23.11.2015
     * 
     * 
     * @return type
     */
    public function doCitiesClarify() {

        $cities = $this->find()
                ->orderBy(['name' => SORT_ASC])
                ->where(['country_id' => $this->getRegionId()])
                ->all();
        $data = [];
        foreach ($cities as $value) {
            $data[] =  $value['name'];
        }

        return $data;
    }

    /**
     * do cities clarify by region
     * @author Kovalchuk Alexander
     * @date 23.11.2015
     * 
     * 
     * @return type
     */
    public function doRegionsClarify() {

        $query = (new Query)
                ->from('oc_country')
                ->select('name')
                ->orderBy(['name' => SORT_ASC]);

        $regions_array = $this->getRegionIdsByCity();

        foreach ($regions_array as $value) {
            $query->where(['country_id' => $value['country_id']]);
        }


        $regions = $query->all();
        $data = [];
        foreach ($regions as $value) {
            $data[] =  $value['name'];
        }

        return $data;
    }

    /**
     * all regions list
     * @author Kovalchuk Alexander
     * @date 25.11.2015
     * 
     * @return arr $data all regions list
     */
    public function getRegionsList() {
        $query = (new Query)
                ->select('country_id, name')
                ->from('oc_country')
                ->orderBy(['country_id' => SORT_ASC])
                ->all();
        $data = [];
        $i = 0;

        if(count($query)<=0){
            Yii::$app->getResponse()->redirect(['/404']);
        } 

        foreach ($query as $value) {
            $data[$i]['id'] = $value['country_id'];
            $data[$i]['region'] =  $value['name'];
            $i++;
        }
        return $data;
    }

    public function getCitiesList() {
        $cities = $this->find()
                ->orderBy(['name' => SORT_ASC])
                ->where(['country_id' => $this->country_id])
                ->all();
        $data = [];
        $i = 0;

        if(count($cities)<=0){
            Yii::$app->getResponse()->redirect(['/404']);
        } 

        foreach ($cities as $value) {
            $data[$i]['id'] = $value['zone_id'];
            $data[$i]['city'] =  $value['name'];
            $i++;
        }

        return $data;
    }
    
    public function getAllParse() {
    	return $query = (new Query)
    	->from('parse_table')
    	->select('*')
    	->orderBy(['id' => SORT_ASC])
    	->where(['>', 'id', 4000])
        ->andWhere(['<', 'id', 5107])
    	->all();
    }
    
    /**
     * Возвращает имя города по id
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 05.10.2016
     * @param int $this->zone_id 
     */
    public function getCity() {
        $queryRegion = new Query();
        return $queryRegion->select(['zone_id', 'name'])->from('oc_zone')
                ->where(['oc_zone.zone_id'=>$this->zone_id])->one()['name'];
    }

    /**********************************************************************************************/

    
    
}
