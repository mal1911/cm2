<?php

namespace app\modules\admin\controllers;

use yii;
use app\modules\admin\models\LoginForm;

class UserController extends AppAdminController {

  public function actionIndex () {

    return $this->render('index');
  }

  public function actionLogin()
  {
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    }
    return $this->render('login', [
      'model' => $model,
    ]);
  }



}