<?php

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

class AdminBootstrapAsset extends AssetBundle {
  public $sourcePath = '@bower/bootstrap/dist';

  public $css = [
    'css/bootstrap.css',
  ];
  public $js = [
    'js/bootstrap.js'
  ];
}