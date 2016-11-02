<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'libs/pro_dropdown_2/pro_dropdown_2.css',
        'libs/rate_it/rateit.css',
        'libs/jquery_slick/slick.css',
        'libs/jquery_slick/slick-theme.css',
//        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
//        '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css',
        //'css/site.css',
        'css/mapsite.css',
        //'css/main.css',
        '/js/src/rateit.css'
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $js = [        
        //'//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js',
        //'libs/pro_dropdown_2/pro_dropdown_2.js',
        'libs/rate_it/jquery.rateit.min.js',
        '//cdn.ckeditor.com/4.5.4/standard/ckeditor.js',
//        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js',
        'libs/jquery_slick/slick.min.js',
        '/js/jquery.gvChart.js',
        '/js/src/jquery.rateit.js'
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
        '\rmrevin\yii\fontawesome\AssetBundle'
    ];
}
