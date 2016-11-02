<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii;
use yii\console\Controller;
use app\models\Company;
use app\helpers\ImgHelper;
use yii\imagine\Image;
use Imagine\Exception\RuntimeException;



/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MainController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }
    
    public function actionSortdir()
    {
        $company = Company::find()->all();
        foreach($company as $k=>$v){
            
            $path = 'http://images.711.ru'.$v->photo;
            $extension = end(explode(".", $path));
            ImgHelper::createDirectory(Yii::getAlias('@app/web/images/company-images/'.$v->user_id.'/gallery/gallery'));
            ImgHelper::createDirectory(Yii::getAlias('@app/web/images/company-images/'.$v->user_id.'/gallery/minigallery'));
            ImgHelper::createDirectory(Yii::getAlias('@app/web/images/company-images/'.$v->user_id.'/gallery/main'));
            ImgHelper::createDirectory(Yii::getAlias('@app/web/images/company-images/'.$v->user_id.'/gallery/logo'));
            $saveTo = \Yii::getAlias('@app/web/images/company-images/'.$v->user_id.'/gallery/logo/');
            try{$imgObj = Image::getImagine()->open($path);} catch(RuntimeException $e){};
            if($imgObj) $imgObj->save($saveTo.$v->user_id.'.'.$extension);
            
            echo $path."\n";
            
            $saveTo2 = \Yii::getAlias('@app/web/images/company-images/'.$v->user_id.'/gallery/main/');
            
                try{$imgObj2 = Image::getImagine()->open('http://www.images.711.ru/images/company-images/12079-default_photo.jpg-carousel.png');} catch(RuntimeException $e){};
                if($imgObj2) $imgObj2->save($saveTo2.$v->user_id.'.'.$extension);
            
        }
       
    }
    
    public function actionCropimg()
    {
       // $company = new Company;
        $query = new yii\db\Query;
        //echo $query->select(['xfields', 'photo', 'category'])->from('olit_post')->orderBy(['id'=> SORT_DESC])->createcommand()->getrawsql(); die();
        $imagesArr = $query->select(['xfields', 'photo', 'category'])->from('olit_post')->orderBy(['id'=> SORT_DESC])->all();
       
        foreach ($imagesArr as $k => $v){
            $photo_type = 'small';
            $photo = @json_decode($v['photo'])->$photo_type;
            preg_match("/image-news\\|(.*)/", $v['xfields'], $matches);
            $matches = isset($matches[1]) ? $matches[1] : '';
            $photo = isset($photo) ? $photo : $matches;
            if($v['category'] == 10){
                echo ImgHelper::cropImg($photo, 588, 395) . "\n";
                echo ImgHelper::cropImg($photo, 280, 187) . "\n";
                echo ImgHelper::cropImg($photo, 281, 190) . "\n";
                echo ImgHelper::cropImg($photo, 384, 190) . "\n";
            }
            echo ImgHelper::cropImg($photo, 1200, 465) . "\n";
            echo ImgHelper::cropImg($photo, 155, 110) . "\n";
        }
        
        
        
    }
}
