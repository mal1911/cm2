<?php

namespace app\modules\admin\models;

use Yii;

class AdminUser extends  \app\models\User {

  public $password_repeat;

  public function rules () {
    return [
      [['username', 'title', 'email', 'password', 'auth_key'], 'string', 'max' => 255],
      [['role'], 'boolean'],
      //[['password', 'username'], 'required'],
      ['password_repeat', 'compare', 'compareAttribute' => 'password'],
    ];
  }

  public function attributeLabels () {
    return [
      'id' => 'ID',
      'username' => 'Логин',
      'title' => 'Имя',
      'email' => 'email',
      'password' => 'Пароль',
      'password_repeat' => 'Подтверждение пароля',
      'auth_key' => 'Ключ',
      'role' => 'Администратор',
    ];
  }

  public function beforeSave ($insert) {
    if (parent::beforeSave($insert)) {
      $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
      return true;
    }
    return false;
  }

  public function afterFind () {
    $this->password = '';
  }
}
