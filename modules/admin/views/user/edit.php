<!-- Main content -->
<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;


$this->title = 'Редактирование пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Список пользователей', 'url' => ['/admin/user']];
$this->params['breadcrumbs'][] = $this->title;

/*
$this->title = 'Редактировать пользователя: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
*/
?>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">

<!--        <h1><?/*= Html::encode($this->title) */?></h1>
-->
        <?= $this->render('form', ['model' => $model,])?>

      </div>

    </div>
  </div>

</section>
<!-- /.content -->