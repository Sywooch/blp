<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * 
 * @author Maxim Shablinskiy maxshabl@yandex.ru
 * @date 06.09.2016 
 * 
 */
class BlueAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
        
        'bluetheme/css/style.css',
        'bluetheme/css/owl.carousel.css',
        //'bluetheme/css/owl.jquery.rating.css',
        'bluetheme/jquery.rating.css',
        'bluetheme/css/common.css',
        
        
    ];

    public $js = [
        'bluetheme/js/index.js',
        'bluetheme/js/resize.js',
        'bluetheme/js/script.js',
        'bluetheme/jquery.form.js',
        'bluetheme/jquery.MetaData.js',       
        'bluetheme/jquery.rating.js',
        'bluetheme/jquery.rating.pack.js',
        //'bluetheme/js/owl.carousel.js',
        'bluetheme/js/funcfeeds.js',
        //'/js/tablesorter/jquery.tablesorter.min.js',
        //'/js/jquery-ui/jquery-ui.js'
        //'ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'

    ];

    public $jsOptions = [
        'position' =>  View::POS_END,
    ];
    
    public $depends = [
        //'yii\web\YiiAsset',
       //'yii\web\JqueryAsset',
       
       
    ];
}