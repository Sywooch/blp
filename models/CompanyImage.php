<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use app\models\Company;
use app\models\ImageResize;

/**
 * Модель картинок для компаний
 * @author Sergey Kulikov <syrex92@gmail.com>
 */
class CompanyImage extends ActiveRecord
{
    const UPLOAD_DIR = '/../../images/images/company-images/';
    const IMAGES_URL = '//www.images.711.ru/images/company-images/';
    
    /**
     *       @var
     */
    public $new_image;
    
    /**
     * 
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'olit_company_images';
    }
    
    /**
     * 
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        return array_merge($rules, [
            [['company_id'], 'required', 'on'=>'add']
        ]);
    }
    
    /**
     * 
     * @inheritdoc
     */    
    public function attributes() {
        $attributes = parent::attributes();
        return array_merge($attributes, [
            'id', 
            'company_id', 
            'name',
            'url',
            'carousel'
            ]);
    }
    
    /**
     * 
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        return array_merge($scenarios, [
            'add'=>['company_id', 'url'],
            'changecarousel'=>['carousel'],
            'editname'=>['name']
        ]);
    }
    
    private function makePreview($src, $previewname)
    {
        $size = getimagesize($src);
        switch($size['mime']) {
            case 'image/jpeg':
                $src_image = imagecreatefromjpeg($src); 
                break;
            case 'image/png':
                $src_image = imagecreatefrompng($src); 
                break;
            case 'image/gif':
                $src_image = imagecreatefromgif($src); 
                break;
        }
        $coef = $size[0]/$size[1];
        if($coef>1)
            $new_size = [
                195,
                195/$coef
            ];
        else
            $new_size = [
                195*$coef,
                195
            ];
        $dst_image = imagecreatetruecolor($new_size[0], $new_size[1]);
        imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $new_size[0], $new_size[1], $size[0], $size[1]);
        return imagepng($dst_image, $previewname);
    }
    
    /**
     * @interitdoc
     */
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        switch($this->scenario){
            case 'add':
                if(!is_null(Company::findOne(['user_id' => $this->company_id])) || !file_exists($this->new_image['tmp_name']))
                {
                    do {
                        $rand_num = rand ( 1 , 65535 );
                        $url = $rand_num.'-'.$this->new_image['name'];
                        $filename = $_SERVER['DOCUMENT_ROOT'].self::UPLOAD_DIR.$rand_num.'-'.$this->new_image['name'];
                        $previewname = $_SERVER['DOCUMENT_ROOT'].self::UPLOAD_DIR.$rand_num.'-'.$this->new_image['name'].'-preview.png';
                    } while(file_exists($filename.'-original.png'));

                    $this->name = \yii\helpers\HtmlPurifier::process(html_entity_decode($this->name));
                    $this->url =  $url;

                    if(!$this->makePreview($this->new_image['tmp_name'], $filename.'-preview.png'))
                            return false;
                    
                    $imageResize = new ImageResize;
                    $imageResize->width = 960;
                    $imageResize->height = 320;
                    $imageResize->image = $this->new_image['tmp_name'];
                    $imageResize->new_image = self::UPLOAD_DIR.$rand_num.'-'.$this->new_image['name'].'-carousel.png';
                    $imageResize->show_substrate = true;
                    $imageResize->color = [255,255,255];
                    $imageResize->resize();

                    return copy($this->new_image['tmp_name'], $filename.'-original.png');
                }
                break;
            case 'changecarousel':
                return true;
                break;
            case 'editname':
                $this->name = \yii\helpers\HtmlPurifier::process(html_entity_decode($this->name));
                return true;
                break;
        }
    }
    
    /**
     * Получает массив картинок для компании
     * @param $this->company_id ИД компании
     * @param $this->carousel (необязательный) признак карусели 
     * @return array массив путей к картинкам
     */
    public function getImagesForCompany() 
    {
        if(is_null($this->company_id))
            return [];
        $cond = ['company_id'=>$this->company_id];
        if(!is_null($this->carousel))
            $cond['carousel'] = $this->carousel;
        $response = $this->findAll($cond);
        $result = [];
        foreach($response as $image)
        {
            $result[] = [
                'id' => $image['id'],
                'name' =>  $image['name'],
                'preview' => self::IMAGES_URL. $image['url'].'-preview.png',
                'original' => self::IMAGES_URL. $image['url'].'-original.png',
                'carousel-img' => self::IMAGES_URL. $image['url'].'-carousel.png',
                'carousel' => $image['carousel']
            ];
        }
        return $result;
    }
    
}
