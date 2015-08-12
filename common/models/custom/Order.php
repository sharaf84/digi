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
 * @property string $token
 * @property integer $new
 * @property integer $status
 * @property string $created
 * @property string $updated
 *
 * @property Cart[] $carts
 * @property BaseUser $user
 */
class Order extends \common\models\base\Base {

    /**
     * Status
     */
    const STATUS_CART = 0;
    const STATUS_PENDING = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_DELIVERED = 10;

    /**
     * Payment Methods
     */
    const METHOD_CASH_ON_DELIVERY = 1;
    const METHOD_BANK = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'order';
    }

    /**
     * @return item calss name
     */
    public static function itemClassName() {
        return Product::className();
    }

    /**
     * @return item tabel name
     */
    public static function itemTableName() {
        $item = static::itemClassName();
        return $item::tableName();
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id'], 'required'],
            [['name', 'email', 'phone', 'address', 'payment_method'], 'required', 'on' => 'checkout'],//, 'amount', 'status', 'token'
            [['name', 'email', 'phone', 'address', 'comment'], 'filter', 'filter' => 'trim'],
            //[['amount'], 'number', 'integerOnly' => true, 'min' => 5],
            [['user_id', 'payment_method', 'new', 'status'], 'integer'],
            [['status'], 'in', 'range' => array_keys(static::getStatusList())],
            [['payment_method'], 'in', 'range' => array_keys(static::getPaymentMethodList())],
            [['email'], 'email'],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 11],
            [['token'], 'string', 'max' => 123],
            [['address', 'comment'], 'string', 'max' => 700],
            [['created', 'updated'], 'safe'],
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
            'token' => Yii::t('app', 'Token'),
            'new' => Yii::t('app', 'New'),
            'status' => Yii::t('app', 'Status'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }

    public function beforeSave($insert) {
        if ($this->scenario == 'checkout') {
            $this->beforeCheckout();
        }
        return parent::beforeSave($insert);
    }

    /**
     * @return \yii\db\ActiveQuery of order cart items
     */
    public function getCartItems() {
        return $this->hasMany(Cart::className(), ['order_id' => 'id']);
    }

    /**
     * Gets total cart items count
     * @return \yii\db\ActiveQuery
     */
    public function getTotalCartCount() {
        return $this->getCartItems()->sum('qty');
    }

    /**
     * Gets total cart price from live items
     * @return \yii\db\ActiveQuery
     */
    public function getLiveCartPrice() {
        //joinWith('item') is a relation at Cart model
        return $this->getCartItems()->joinWith('item')->sum('`cart`.`qty` * `' . static::itemTableName() . '`.`price`');
    }

    /**
     * Get total cart price from current cart
     * @return \yii\db\ActiveQuery
     */
    public function getTotalCartPrice() {
        return $this->getCartItems()->sum('price*qty');
    }

    /**
     * 
     * @param int $itemId cart item_id
     * @return \yii\db\ActiveQuery of order cart item
     */
    public function getCartItem($itemId) {
        return $this->hasOne(Cart::className(), ['order_id' => 'id'])->andWhere(['item_id' => $itemId]);
    }

    /**
     * @return \yii\db\ActiveQuery of order items
     */
    public function getItems() {
        return $this->hasMany(static::itemClassName(), ['id' => 'item_id'])->via('cartItems');
    }

    /**
     * @return \yii\db\ActiveQuery of order user
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
            self::STATUS_IN_PROGRESS => Yii::t('app', 'In Progress'),
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

    /**
     * @return boolean wheather is cart order
     */
    public function isCartOrder() {
        return $this->status == self::STATUS_CART;
    }

    /**
     * @return bool true if item in cart
     */
    public function hasCartItem($itemId) {
        return Cart::find()
                        ->andWhere(['item_id' => $itemId, 'order_id' => $this->id])
                        ->exists();
    }

    /**
     * Add item to cart
     * @param int $itemId
     * @param int $qty
     * @param bool $increaseOnDuplicate
     * @return boolean
     */
    public function addCartItem($itemId, $qty = 1, $increaseOnDuplicate = false) {
        $oCart = ($increaseOnDuplicate && $this->getCartItem($itemId)->one()) ? $this->getCartItem($itemId)->one() : new Cart();
        $oCart->item_id = $itemId;
        $oCart->order_id = $this->id;
        $oCart->qty += $qty;
        return $oCart->save();
    }

    /**
     * Increase one item to exists cart item
     * @param int $itemId
     * @return boolean
     */
    public function increaseCartItem($itemId) {
        $oCart = $this->getCartItem($itemId)->one();
        if ($oCart && $oCart->canIncrease()) {
            $oCart->qty++;
            return $oCart->save();
        }
        return false;
    }

    /**
     * Decrease one item from exists cart item
     * @param int $itemId
     * @return boolean
     */
    public function decreaseCartItem($itemId) {
        $oCart = $this->getCartItem($itemId)->one();
        if ($oCart && $oCart->canDecrease()) {
            $oCart->qty--;
            return $oCart->save();
        }
        return false;
    }

    /**
     * Matches cart item qty with the avaliable item qty
     * @param int $itemId
     * @return boolean
     */
    public function matchCartItem($itemId) {
        $oCart = $this->getCartItem($itemId)->one();
        if ($oCart && $oCart->isOverflow()) {
            $oCart->qty = $oCart->item->qty;
            return $oCart->save();
        }
        return false;
    }

    /**
     * Update cart item with qty
     * @param int $itemId
     * @param int $qty
     * @return boolean
     */
    public function updateCartItem($itemId, $qty) {
        $oCart = $this->getCartItem($itemId)->one();
        if ($oCart) {
            $oCart->qty = $qty;
            return $oCart->save();
        }
        return false;
    }

    /**
     * Remove cart item
     * @param int $itemId
     * @return boolean
     */
    public function removeCartItem($itemId) {
        $oCart = $this->getCartItem($itemId)->one();
        return $oCart ? $oCart->delete() : false;
    }

    /**
     * Sets attr with default user valus
     */
    public function setDefaultUserValues() {
        $this->setAttributes([
            'name' => $this->user->getName(),
            'email' => $this->user->email,
            'phone' => $this->user->profile->phone,
            'address' => $this->user->profile->getFullAddress(),
        ]);
    }

    /**
     * Generates token
     */
    public function generateToken() {
        $this->token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Updates cart attrs with live item values
     */
    public function autoUpdateCartItems() {
        foreach ($this->cartItems as $oCart) {
            $oCart->price = $oCart->item->price;
            $oCart->title = $oCart->item->title;
            $oCart->save();
        }
    }

    public function beforeCheckout() {
        $this->generateToken();
        $this->amount = $this->liveCartPrice;
        $this->status = static::STATUS_PENDING;
        $this->autoUpdateCartItems();
    }

}
