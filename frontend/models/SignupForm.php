<?php

namespace frontend\models;

use yii\base\Model;
use common\models\custom\User;
use common\models\custom\Profile;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $name;
    public $email;
    public $password;
    public $phone;
    public $city;
    public $address;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 3, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => Yii::t('app', 'This email address has already been taken.')],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['phone', 'filter', 'filter' => 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'length' => 11],
            ['phone', 'number', 'integerOnly' => true],
            ['city', 'filter', 'filter' => 'trim'],
            ['city', 'required'],
            ['city', 'exist', 'targetClass' => '\common\models\base\Tree', 'targetAttribute' => 'id', 'message' => Yii::t('app', 'Invalid City.')],
            ['address', 'filter', 'filter' => 'trim'],
            ['address', 'required'],
            ['address', 'string', 'min' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'name' => Yii::t('app', 'Full Name'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'phone' => Yii::t('app', 'Mobile Number'),
            'city' => Yii::t('app', 'City'),
            'address' => Yii::t('app', 'Address'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if ($this->validate()) {
            $oUser = new User();
            $oProfile = new Profile();
            $oUser->username = $oUser->email = $this->email;
            $oUser->status = User::STATUS_SUSPENDED;
            $oUser->setPassword($this->password);
            $oUser->generateAuthKey();
            $oUser->generateVerificationToken();
            $oProfile->first_name = $this->name;
            $oProfile->phone = $this->phone;
            $oProfile->address = $this->address;
            $oProfile->city_id = $this->city;
            $oDBTransaction = Yii::$app->db->beginTransaction();
            if ($oUser->save() && $oProfile->setUserId($oUser->id) && $oProfile->save()) {
                $oDBTransaction->commit();
                return $oUser;
            } else
                $oDBTransaction->rollBack();
        }

        return null;
    }

}
