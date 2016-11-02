<?php
namespace app\components\SocialShare;
use yii\web\AssetBundle;
class SocialAsset extends AssetBundle
{
	public $sourcePath = '@app/components/SocialShare';

	public $css = [
		'socialshare.css'
	];
	public $js = [
		'//yandex.st/share/share.js'
	];
}