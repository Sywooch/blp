<?php

namespace app\helpers;

use Yii;
use yii\helpers\Url;
use Imagine\Image\Point;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\helpers\BaseFileHelper;

class ImgHelper extends BaseFileHelper
{
    
    private static $cropName;
    private static $cropPath;
    private static $cropRelativPath = true;
    
    /**
     * 
     * Проверяет наличия обрезанного файла картинки с переданными высотой и шириной, 
     * если соответствующая картинка присутствует в web/crops, то возвращает к ней путь,
     * если нет то запускает ее создание.
     * 
     * @author Maxim Shablinskiy 
     * @date 30.09.2016
     * @param string $path путь к картинке
     * @param int $height Требуемая высота картинки
     * @param int $width Требуемая ширина картинки
     * @param string $alt Путь к альтернативной картинке
     * @return boolean
     */
    public static function cropImg($path, $width, $height, $alt = '')
    {    
        ImgHelper::createDirectory(Yii::getAlias("@app/web/crops/"));
        self::$cropName = md5($width.$height.$path);
        self::$cropPath = Yii::getAlias("@app/web/crops/".self::$cropName);
        self::$cropRelativPath = Yii::getAlias("@web/crops/".self::$cropName);
        if(is_file(self::$cropPath)) {
            return self::$cropRelativPath;     
        } else {
            
            if(Url::isRelative($path)) {
                if(is_file(Yii::getAlias('@app/web'.$path))) {
                    $path = Yii::getAlias('@app/web'.$path);
                }elseif($width == 1200) {
                    $path = Yii::getAlias('@app/web/images/default/defaultLong.jpg');
                }else{
                    $path = Yii::getAlias('@app/web/images/default/default.jpg');
                }
            }else {
                
                $urlHeaders = @get_headers($path);
                //return get_resource_type(fopen($path, 'r')).'|'. $urlHeaders[0] .'|'.$urlHeaders[1].'|'.$urlHeaders[2].'|'.$urlHeaders[3].'|'.$urlHeaders[4];
                if(!(strpos($urlHeaders[0], '304') or strpos($urlHeaders[0], '200'))) {
                    if($width == 1200){
                        $path = Yii::getAlias('@app/web/images/default/defaultLong.jpg');
                    
                    }else{
                        $path = Yii::getAlias('@app/web/images/default/default.jpg');
                    }
                }
            }
            return self::changeProportion($path, $height, $width);
           
        }
    
    }
    /**
     *
     * @author Maxim Shablinskiy 
     * @date 18.10.2016    
     */
    public static function createGallery($company_id)
    {    
        
        $files = scandir(Yii::getAlias('@app/web/images/company-images/'.$company_id.'/gallery/gallery'));
        
        for ($i = 0; $i < count($files); $i++) {
           // $arr[]=$files[$i];
            if (($files[$i] != ".") && ($files[$i] != "..")) {            
                $path =  Yii::getAlias('@app/web/images/company-images/'.$company_id.'/gallery/gallery/').$files[$i];
                self::$cropPath = Yii::getAlias('@app/web/images/company-images/'.$company_id.'/gallery/minigallery/').$files[$i];
                self::changeProportion($path, 140, 280);
            }
            
        }
       // return $arr;
    
    }
    
    
    /**
     * 
     * Учитывая требования к размерам картинки и размеры самой картинки, производит обрезку сторон для достижения
     * пропорциональности с требуемым размером. 
     * 
     * @author Maxim Shablinskiy 
     * @date 30.09.2016
     * @param string $path путь к исходной картинке
     * @param int $height Требуемая высота картинки
     * @param int $width Требуемая ширина картинки
     * @return boolean
     */
    private static function changeProportion($path, $height, $width) {
        
        try {
            $size = @getimagesize($path);
            $nativeWidth = $size[0];
            $nativeHeight = $size[1];
            if($nativeWidth <= 0 or $nativeHeight <= 0) {
                if($width == 1200){
                    $path = Yii::getAlias('@app/web/images/default/defaultLong.jpg');
                
                }else{
                    $path = Yii::getAlias('@app/web/images/default/default.jpg');
                }
                $size = @getimagesize($path);
                $nativeWidth = $size[0];
                $nativeHeight = $size[1];
            }
            $prHeight = $height/($width/$nativeWidth);
            $prWidth = $width/($height/$nativeHeight);
            
            if ($prHeight < $nativeHeight) {
                $prWidth = $nativeWidth;
                $pointX = 0;
                $pointY = abs($prHeight-$nativeHeight)/2;
            } elseif($prWidth < $nativeWidth) {
                $prHeight = $nativeHeight;
                $pointX = abs($prWidth-$nativeWidth)/2;
                $pointY = 0;
            } else {
                $pointX = 0;
                $pointY = 0;
            }            
                $imgObj = Image::getImagine()->open($path);           
            try {
                $imgObj->crop(new Point($pointX, $pointY), new Box($prWidth, $prHeight));
                if($nativeWidth > $width and $nativeHeight > $height) $imgObj->resize(new Box($width, $height));                
            }catch (\Imagine\Exception\InvalidArgumentException $e){ }
            
            $imgObj->save(self::$cropPath);
            return self::$cropRelativPath;
        }catch (\yii\base\ExitException $e){ }
    }    
   
    public static function scanDir($path)
    {           
        $files = scandir($path);
        $arr = [];
            for ($i = 0; $i < count($files); $i++){
                if (($files[$i] != ".") && ($files[$i] != "..")){
                    $arr[]=$files[$i];
                }
            }
        return $arr;
    }
    
    public static function getFilePath($path)
    {           
        $files = scandir($path);
            for ($i = 0; $i < count($files); $i++){
                if (($files[$i] != ".") && ($files[$i] != "..")){
                    return $files[$i];
                }
            }
        return false;
    }
}
