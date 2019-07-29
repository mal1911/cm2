<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle {
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $css = [
    'css/site.css',
  ];
  public $js = [
  ];
  public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap4\BootstrapAsset',
    'yii\bootstrap4\BootstrapPluginAsset'

/*    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',*/
  ];
}
