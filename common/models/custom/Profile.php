<?php

namespace common\models\custom;

use Yii;
use yii\helpers\Html;
use common\models\custom\City;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $city_id
 * @property string $first_name
 * @property string $last_name
 * @property string $bio
 * @property integer $gender
 * @property string $address
 * @property string $country_phone_code
 * @property string $phone
 * @property integer $status
 * @property string $created
 * @property string $updated
 */
class Profile extends \common\models\base\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'city_id', 'gender', 'status'], 'integer'],
            [['user_id', 'city_id', 'first_name', 'address', 'phone'], 'required'],
            [['first_name', 'phone', 'address', 'bio'], 'filter', 'filter' => 'trim'],
            ['first_name', 'string', 'min' => 3, 'max' => 255],
            [['last_name'], 'string', 'max' => 32],
            [['country_phone_code'], 'string', 'max' => 5],
            ['phone', 'string', 'length' => 11],
            ['phone', 'number', 'integerOnly' => true],
            ['city_id', 'exist', 'targetClass' => '\common\models\base\Tree', 'targetAttribute' => 'id', 'message' => Yii::t('app', 'Invalid City.')],
            [['address', 'bio'], 'string', 'min' => 10],
            [['created', 'updated'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User'),
            'city_id' => Yii::t('app', 'City'),
            'first_name' => Yii::t('app', 'Full Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'bio' => Yii::t('app', 'Bio'),
            'gender' => Yii::t('app', 'Gender'),
            'address' => Yii::t('app', 'Address'),
            'country_phone_code' => Yii::t('app', 'Country Phone Code'),
            'phone' => Yii::t('app', 'Phone'),
            'status' => Yii::t('app', 'Status'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }
    
    public function setUserId($id) {
        return $this->user_id = $id;
    }
    
    public function getName() {
        return Html::encode($this->first_name . ' ' . $this->last_name);
    }
    
    public function getCity() {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
    
    public function getFullAddress() {
        return Html::encode($this->address) . ', ' . Html::encode($this->city->name);
    }
}
