<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
<?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'role')->checkbox([ '0', '1', ]) ?>



<!--        <? /*= $form->field($model, 'password')->passwordInput(['maxlength' => true]) */ ?>
        <? /*= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) */ ?>

        --><? /*= $form->field($model, 'admin')->checkbox([ '0', '1', ]) */ ?>


<div class="form-group">
  <?= Html::submitButton('Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


<!--        <form action="<?/*= ; */?>/user/edit" method="post" data-toggle="validator">
          <div class="box-body">
            <div class="form-group has-feedback">
              <label for="login">Логин</label>
              <input type="text" class="form-control" name="login" id="login" value="<?/*= h($user->login); */?>" required>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group">
              <label for="password">Пароль</label>
              <input type="password" class="form-control" name="password" id="password"
                     placeholder="Введите пароль, если хотите его изменить">
            </div>
            <div class="form-group has-feedback">
              <label for="name">Имя</label>
              <input type="text" class="form-control" name="name" id="name" value="<?/*= h($user->title); */?>" required>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="<?/*= h($user->email); */?>" required>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            </div>
          </div>
          <div class="box-footer">
            <input type="hidden" name="id" value="<?/*= $user->id; */?>">
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </div>
        </form>
-->
