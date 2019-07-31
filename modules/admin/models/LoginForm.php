<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use app\models\User;


class LoginForm  extends Model {
  public $login;
  public $password;
  public $rememberMe = true;

  private $_user = false;

  public function rules() {
    return [
      // username and password are both required
      [['login', 'password'], 'required'],
      // rememberMe must be a boolean value
      ['rememberMe', 'boolean'],
      // password is validated by validatePassword()
      ['password', 'validatePassword'],
    ];
  }

  public function validatePassword($attribute, $params) {
    if (!$this->hasErrors()) {
      $user = $this->getUser();

      if (!$user || !$user->validatePassword($this->password)) {
        $this->addError($attribute, 'Некорректные имя входа или пароль.');
      }
    }
  }

  public function login() {
    if ($this->validate()) {
      return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
    }
    return false;
  }

  public function getUser() {
    if ($this->_user === false) {
      $this->_user = User::findByUsername($this->username);
    }

    return $this->_user;
  }

}