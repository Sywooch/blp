<?php



namespace app\models\forms;

use Yii;
use yii\base\Model;

class UploadGallery extends Model{
    
    public $imageFiles;
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4 , 'on' => 'files'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'file'],
        ];
    }
    
     /**
     * Загружает картинку и сохраняет.
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 18.10.2016 
     * 
     * @return boolean 
     */
    public function upload()
    { 
        
    }
    
    public function scenarios() {

        $scenarios = parent::scenarios();

        $scenarios['files'] = [
            'imageFiles'
        ];
        $scenarios['file'] = [
            'imageFile'
        ];
        return $scenarios;
    }
}
