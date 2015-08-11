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

    /**
     * Status
     */
    const STATUS_CART = 0;
    const STATUS_PENDING = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_DELIVERED = 3;

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
     * @return \yii\db\ActiveQuery of order cart items
     */
    public function getCartItems() {
        return $this->hasMany(Cart::className(), ['order_id' => 'id']);
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
        return $this->hasMany(static::itemClassName(), ['id' => 'item_id'])->via('CartItems');
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

}
