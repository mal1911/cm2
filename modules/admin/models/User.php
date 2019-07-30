<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord ;


class User extends ActiveRecord {

  public $password_repeat;

  public static function tableName () {
    return 'user';
  }

  public function rules () {
    return [
      [['username', 'title', 'password', 'auth_key'], 'string', 'max' => 255],
      [['admin'], 'boolean'],
      [['password', 'username'], 'required'],
      ['password_repeat', 'compare', 'compareAttribute' => 'password'/*, 'message' => 'Введенные пароли не совпадают'*/],
    ];
  }

  public function attributeLabels () {
    return [
      'id' => '№',
      'username' => 'Имя пользователя',
      'title' => 'ФИО',
      'password' => 'Пароль',
      'password_repeat' => 'Подтверждение пароля',
      'auth_key' => 'Ключ',
      'admin' => 'Администратор',
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
