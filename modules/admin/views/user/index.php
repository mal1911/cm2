<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Список пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>Логин</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Действия</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td><?= $user->id; ?></td>
                  <td><?= $user->username; ?></td>
                  <td><?= $user->title; ?></td>
                  <td><?= $user->email; ?></td>
                  <td><?= $user->role ? 'Администратор' : 'Пользователь'; ?></td>
                  <td>
                    <?= Html::a(
                      Html::tag('i', '', ['class' => 'fa fa-fw fa-eye']),
                      Url::to(['/admin/user/edit', 'id' => $user->id])
                    ); ?>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="text-center">
            <p>(<? /*=count($users);*/ ?> пользователей из <? /*=$count;*/ ?>)</p>
            <?php /*if($pagination->countPages > 1): */ ?>
            <? /*=$pagination;*/ ?>
            <?php /*endif; */ ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->