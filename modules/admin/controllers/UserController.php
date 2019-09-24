<?php

namespace app\modules\admin\controllers;

use yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\modules\admin\models\AdminUser;
use app\modules\admin\models\LoginForm;
use yii\web\NotFoundHttpException;


class UserController extends AppAdminController {


  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout'],
        'rules' => [
          [
            'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'logout' => ['post'],
        ],
      ],
    ];
  }

  public function actionIndex () {
    $users = AdminUser::find()->all();
    return $this->render('index', ['users' => $users,]);
  }

  public function actionEdit ($id) {
    $model = $this->findModel($id);
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['/admin/user']);
    } else {
      return $this->render('edit', ['model' => $model]);
    }
  }


  public function actionLogin () {
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();
//    print_r($model->username);
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    }
    return $this->render('login', [
      'model' => $model,
    ]);
  }

  public function actionLogout () {
    Yii::$app->user->logout();
    return $this->goHome();
  }


  protected function findModel ($id) {
    if (($model = AdminUser::findOne($id)) !== null) {
      return $model;
    } else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }

}