<?php

namespace app\modules\admin\controllers;


class SiteController extends AppAdminController {

  public function actionIndex()
  {
    return $this->render('index');
  }
}

