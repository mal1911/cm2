<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    /*
     * Этот метод находит экземпляр identity class, используя ID пользователя.
     * Этот метод используется, когда необходимо поддерживать состояние
     * аутентификации через сессии.
     */

    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /*
     * Этот метод находит экземпляр identity class, используя токен доступа.
     * Метод используется, когда требуется аутентифицировать пользователя только
     * по секретному токену (например в RESTful приложениях, не сохраняющих
     * состояние между запросами).
     */

    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /*
     * Этот метод возвращает ID пользователя, представленного данным экземпляром identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /*
     * Этот метод возвращает ключ, используемый для основанной
     * на cookie аутентификации. Ключ сохраняется в аутентификационной cookie
     * и позже сравнивается с версией, находящейся на сервере, чтобы удостоверится,
     * что аутентификационная cookie верная.
     */

    public function getAuthKey()
    {
        return $this->authKey;
    }

    /*
     * Этот метод реализует логику проверки ключа для основанной на cookie аутентификации.
    */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
