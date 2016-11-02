<?php
namespace app\themes;
use Yii;

class themerout extends \yii\base\Theme
{
    
    public $pathMap = [
       '@app/' => '@app/themes/bluetheme',
       //'@app/' => '@app/themes/oldtheme',
        //'@app/modules' => '@app/themes/oldtheme/modules'
       //'@web/' => '@web/themes/oldtheme'
        
    ];

    public function init()
    {
        parent::init();
        
       /* $typeDevice = Yii::$app->params['devicedetect'];
        
        if ($typeDevice['isDesktop']==true)
        {
            $this->pathMap['@app/'] = '@app/themes/oldtheme';
        }elseif ($typeDevice['isTablet']==true) 
        {
            $this->pathMap['@app/'] = '@app/themes/oldtheme';
        }elseif ($typeDevice['isMobile']==true)
        {
            $this->pathMap['@app/'] = '@app/themes/oldtheme';
        }*/
    }
}