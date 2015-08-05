<?php

namespace common\models\custom;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $comment
 * @property integer $payment_method
 * @property string $amount
 * @property integer $new
 * @property string $created
 * @property string $updated
 *
 * @property Cart[] $carts
 * @property BaseUser $user
 */
class Order extends \common\models\base\Base {

    const STATUS_CART = 0;
    const STATUS_PENDING = 1;
    const STATUS_DELIVERED = 2;
    const METHOD_CASH_ON_DELIVERY = 1;
    const METHOD_BANK = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id'], 'required'],
            [['user_id', 'payment_method', 'new'], 'integer'],
            [['address', 'comment'], 'string'],
            [['amount'], 'number'],
            [['created', 'updated'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 128],
            [['phone'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
            'comment' => Yii::t('app', 'Comment'),
            'payment_method' => Yii::t('app', 'Payment Method'),
            'amount' => Yii::t('app', 'Amount'),
            'new' => Yii::t('app', 'New'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems() {
        return $this->hasMany(Cart::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts() {
        return $this->hasMany(Product::className(), ['id' => 'item_id'])->via('items');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Retrieves status list
     */
    public static function getStatusList() {
        return [
            self::STATUS_CART => Yii::t('app', 'Cart'),
            self::STATUS_PENDING => Yii::t('app', 'Pending'),
            self::STATUS_DELIVERED => Yii::t('app', 'Delivered'),
        ];
    }

    /**
     * Retrieves payment method list
     */
    public static function getPaymentMethodList() {
        return [
            self::METHOD_CASH_ON_DELIVERY => Yii::t('app', 'Cash on delivery'),
            self::METHOD_BANK => Yii::t('app', 'Bank'),
        ];
    }

    /**
     * Ceate Cart Order
     * @param int $userId
     * @return Order
     */
    public static function createCartOrder($userId = null) {
        $oOrder = new Order();
        $oOrder->user_id = $userId ? $userId : Yii::$app->user->id;
        $oOrder->status = self::STATUS_CART;
        return $oOrder->save() ? $oOrder : null;
    }

}
