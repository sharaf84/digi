<?php

namespace common\models\base;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "base_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $token
 * @property integer $tokent_type
 * @property string $auth_key
 * @property string $sso_key
 * @property integer $status
 * @property string $last_login
 * @property string $created
 * @property string $updated
 */
class User extends Base implements IdentityInterface {

    const STATUS_DELETED = 0;
    const STATUS_SUSPENDED = 1;
    const STATUS_VERIFIED = 2;
    const STATUS_BANNED = 3;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%base_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'email', 'password'], 'required'],
            //['email', 'email'],
            ['status', 'default', 'value' => self::STATUS_SUSPENDED],
            //['status', 'in', 'range' => [self::STATUS_VERIFIED, self::STATUS_DELETED]],
            [['tokent_type', 'status'], 'integer'],
            [['username'], 'string', 'min' => 3, 'max' => 64],
            [['email'], 'string', 'max' => 128],
            [['password', 'token', 'auth_key', 'sso_key'], 'string', 'max' => 123],
            [['username', 'email', 'token', 'auth_key', 'sso_key'], 'unique'],
            [['token', 'tokent_type', 'last_login', 'created', 'updated'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'token' => 'Token',
            'tokent_type' => 'Tokent Type',
            'auth_key' => 'Auth Key',
            'sso_key' => 'Sso Key',
            'status' => 'Status',
            'last_login' => 'Last Login',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_VERIFIED]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => self::STATUS_VERIFIED]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => self::STATUS_VERIFIED,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        //var_dump($password, $this->password);die;
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->token = null;
    }

    //////////////////Sharaf///////////////////////////

    public function resetPassword($password) {
        $this->setPassword($password);
        $this->removePasswordResetToken();
        return $this->save(false);
    }

    /**
     * Retrieves status list
     */
    public static function getStatusList() {
        return [
            self::STATUS_SUSPENDED => Yii::t('app', 'Suspended'),
            self::STATUS_VERIFIED => Yii::t('app', 'Verified'),
            self::STATUS_BANNED => Yii::t('app', 'Banned'),
        ];
    }

}
