<?php
namespace app\models\forms;

use yii\base\Model;
use app\models\AboutAgents;
use yii\web\UploadedFile;
use Yii;
use Imagine\Image\Point;
use yii\imagine\Image;
use Imagine\Image\Box;

use yii\helpers\BaseFileHelper;
/**
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016 
     */
class UploadForm extends Model
{
    /**
     * 
     */
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'avatar'],
        ];
    }
    
    /**
     * Загружает картинку и изменяет ее размер. Сохраняет в папку uploads/agents/avatars
     * @author Maxim Shablinskiy maxshabl@yandex.ru
     * @date 10.08.2016 
     * @param int $id id юзера
     * @return boolean 
     */
    public function upload($id)
    { 
        $account = AboutAgents::findOne(['agent_id'=>$id]);
        
        if ($this->validate()):
            $path = Yii::getAlias("@app/web/uploads/agents/avatars/agent_".$id);
            BaseFileHelper::createDirectory($path);
            $name = 'agent_'.$id.'.'.$this->image->extension;
            if(is_file($path . DIRECTORY_SEPARATOR . $name)) unlink($path .DIRECTORY_SEPARATOR . $name);
                    
            $this->image->saveAs($path . DIRECTORY_SEPARATOR . $name);
            $image  = $path . DIRECTORY_SEPARATOR . $name;
            $new_name = $path . DIRECTORY_SEPARATOR . "small_" . $name;
            
            $size = getimagesize($image);
            $width = $size[0];
            $height = $size[1];
            
            $account->photo = '/uploads/agents/avatars/agent_' . $id. '/small_' . $name;
            $account->scenario = 'photo';
            $account->save();
            
            if(is_file($new_name)) unlink($new_name);
            
            Image::frame($image, 0, '666', 0)
                ->crop(new Point(0, 0), new Box($width, $height))
                ->resize(new Box(100,64))
                ->save($new_name, ['quality' => 100]);
           
            return true;
        endif;
    }
     /**
     *
     * @inheritdoc
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        $scenarios['avatar'] = ['image'];
        return $scenarios;
    }
}