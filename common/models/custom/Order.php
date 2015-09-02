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
 * @property integer $paid
 * @property string $created
 * @property string $updated
 *
 * @property Cart[] $carts
 * @property BaseUser $user
 */
class Order extends \common\models\base\Base {

    //Status
    const STATUS_CART = 0;
    const STATUS_PENDING = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_CANCELED = 3;
    const STATUS_DELIVERED = 10;

    // Payment Methods

    /**
     * Cash ON Delivery
     */
    const METHOD_COD = 1;

    /**
     * MasterCard Internet Gateway Service
     */
    const METHOD_MIGS = 2;
    
    
    public $agree;


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
            [['name', 'email', 'phone', 'address', 'payment_method', 'amount', 'status', 'token', 'agree'], 'required', 'on' => 'checkout'],
            [['agree'], 'required', 'requiredValue' => 1,  'on' => 'checkout'],
            [['name', 'email', 'phone', 'address', 'comment'], 'filter', 'filter' => 'trim'],
            [['amount'], 'number', 'min' => 5, 'max' => 10000],
            [['user_id', 'payment_method', 'status'], 'integer'],
            [['status'], 'in', 'range' => array_keys(static::getStatusList(true))],
            [['payment_method'], 'in', 'range' => array_keys(static::getPaymentMethodList())],
            [['paid', 'new'], 'boolean'],
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
            'paid' => Yii::t('app', 'Paid'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'agree' => Yii::t('app', 'I agree with Terms and Conditions'),
        ];
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        if (!$insert) {
            //var_dump($changedAttributes, $this->oldAttributes['status'], $this->status, $this->isAttributeChanged('status')); die;
            if (isset($changedAttributes['status']) && $this->status != $changedAttributes['status']) {
                /**
                 * Call order custom callbacks (afterCheckout(), ...) based on status.
                 */
                switch ($this->status) {
                    case self::STATUS_PENDING:
                        //$this->afterCheckout();
                        break;

                    case self::STATUS_IN_PROGRESS:
                        $this->afterProgress();
                        break;

                    case self::STATUS_CANCELED:
                        $this->afterCancel();
                        break;

                    case self::STATUS_DELIVERED:
                        $this->afterDelivery();
                        break;

                    default:
                        break;
                }
            }
        }
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
     * Gets total cart price from live items
     * @return \yii\db\ActiveQuery
     */
    public function getHasOverflowCart() {
        //joinWith('item') is a relation at Cart model
        return $this->getCartItems()
                        ->joinWith('item')
                        ->andWhere('`cart`.`qty` > `' . static::itemTableName() . '`.`qty`')
                        ->exists();
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
     * @return \yii\db\ActiveQuery
     */
    public function getPayments() {
        return $this->hasMany(Payment::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayment() {
        return $this->hasOne(Payment::className(), ['order_id' => 'id']);
    }

    /**
     * Retrieves status list
     */
    public static function getStatusList($cart = false) {
        $list = [];
        $cart and $list[self::STATUS_CART] = Yii::t('app', 'Cart');
        $list[self::STATUS_PENDING] = Yii::t('app', 'Pending');
        $list[self::STATUS_IN_PROGRESS] = Yii::t('app', 'In Progress');
        $list[self::STATUS_CANCELED] = Yii::t('app', 'Canceled');
        $list[self::STATUS_DELIVERED] = Yii::t('app', 'Delivered');
        return $list;
    }

    /**
     * Retrieves payment method list
     */
    public static function getPaymentMethodList() {
        return [
            self::METHOD_COD => Yii::t('app', 'Cash on delivery'),
            self::METHOD_MIGS => Yii::t('app', 'Visa / Mastercard'),
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
        $this->token = Yii::$app->security->generateRandomString(16) . '_' . time();
    }

    public static function findToPayment($token) {
        return static::findOne([
                    'token' => $token,
                    'user_id' => Yii::$app->user->id,
                    'status' => Order::STATUS_PENDING,
                    'paid' => false,
        ]);
    }

    public static function findNew() {
        return static::find()
                        ->where(['new' => true])
                        ->orderBy(['updated' => SORT_DESC])
                        ->all();
    }

    public static function getTotalCount() {
        return static::find()->where(['!=', 'status', static::STATUS_CART])->count();
    }

    public static function getTotalRevenu() {
        return static::find()->where(['status' => static::STATUS_DELIVERED])->sum('amount');
    }

    public static function getTopUsers($limit = 1) {
        return static::find()
                        ->select(['user_id', 'SUM(amount) amount'])
                        ->with('user')
                        ->where(['status' => static::STATUS_DELIVERED])
                        ->groupBy('user_id')
                        ->orderBy(['SUM(amount)' => SORT_DESC])
                        ->limit($limit)
                        ->all();
    }
    
    public function getCreatedDate(){
        return date('j F Y', strtotime($this->created));
    }

    public function canPay() {
        return ($this->status == self::STATUS_PENDING || $this->status == self::STATUS_IN_PROGRESS) && !$this->paid;
    }

    public function canProgress() {
        return $this->status == self::STATUS_PENDING;
    }

    public function canDeliver() {
        return $this->status == self::STATUS_PENDING || $this->status == self::STATUS_IN_PROGRESS;
    }

    public function canCancel() {
        return $this->status == self::STATUS_PENDING || $this->status == self::STATUS_IN_PROGRESS;
    }
    
    ///////////// Save Actions ////////////////////
    
    public function checkout() {
        $this->scenario = 'checkout';
        $this->generateToken();
        $this->new = true;
        $this->amount = $this->liveCartPrice;
        $this->status = static::STATUS_PENDING;
        $this->user_id = Yii::$app->user->id;//$this->oldAttributes['user_id']; //Not to change old user
        $this->created = new \yii\db\Expression('NOW()');
        if ($this->validate() && !$this->hasOverflowCart) {
            $oDBTransaction = Yii::$app->db->beginTransaction();
            if ($this->save() && $this->afterCheckout()) {
                $oDBTransaction->commit();
                return true;
            } else
                $oDBTransaction->rollBack();
        }
        return false;
    }
        
    public function updateToken() {
        $this->generateToken();
        return $this->save(false);
    }
    
    public function paid() {
        $this->paid = true;
        return $this->save(false);
    }

    public function seen() {
        $this->new = false;
        return $this->save(false);
    }

    public function progress() {
        if (!$this->canProgress())
            return false;
        $this->status = self::STATUS_IN_PROGRESS;
        return $this->save();
    }

    public function deliver() {
        if (!$this->canDeliver())
            return false;
        $this->status = self::STATUS_DELIVERED;
        $this->paid = true;
        return $this->save();
    }

    public function cancel() {
        if (!$this->canCancel())
            return false;
        $this->status = self::STATUS_CANCELED;
        return $this->save();
    }
  
    ///////////// afterSave Actions ////////////////////

    /**
     * After Checkout
     * Updates cart price and title with live item values
     * Deduct cart qty from live item qty => $item->qty - $cart->qty  
     * @todo enhancements
     */
    public function afterCheckout() {
        foreach ($this->cartItems as $oCart) {
            $oCart->price = $oCart->item->price;
            $oCart->title = $oCart->item->title;
            $oCart->item->qty -= $oCart->qty;
            if (!($oCart->save() && $oCart->item->save()))
                return false;
        }
        return true;
    }

    public function afterProgress() {
        /**
         * @todo implementation
         */
    }

    /**
     * After Delivery
     * Increase live item and it's parent sold counter with cart qty
     * @todo enhancements
     */
    public function afterDelivery() {
        foreach ($this->cartItems as $oCart) {
            $oCart->item->sold += $oCart->qty;
            $oCart->item->parent->sold += $oCart->qty;
            if (!($oCart->item->save() && $oCart->item->parent->save()))
                return false;
        }
        return true;
    }

    /**
     * After Cancel
     * Increase live item qty with cart qty => $item->qty + $cart->qty  
     * @todo enhancements
     */
    public function afterCancel() {
        foreach ($this->cartItems as $oCart) {
            $oCart->item->qty += $oCart->qty;
            if (!$oCart->item->save())
                return false;
        }
        return true;
    }

}
