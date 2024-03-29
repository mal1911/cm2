<?php


namespace app\modules\admin\assets;

use yii\web\AssetBundle;

class AppAdminAsset extends AssetBundle {
  public $basePath = '@webroot';
  public $baseUrl = '@web';

  public $css = [
    'css/admin.css',
  ];
  public $js = [
    'js/admin.js'
  ];
  public $depends = [
    'app\modules\admin\assets\AppAdminBootstrapAsset',
    'dmstr\web\AdminLteAsset',
  ];
}