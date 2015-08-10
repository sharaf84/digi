<?php

namespace common\models\custom;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $item_id
 * @property string $title
 * @property string $price
 * @property integer $qty
 * @property integer $status
 * @property string $created
 * @property string $updated
 *
 * @property Order $order
 * @property Product $item
 */
class Cart extends \common\models\base\Base {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'cart';
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
            [['order_id', 'item_id', 'qty'], 'required'],
            [['item_id', 'order_id'], 'unique', 'targetAttribute' => ['item_id', 'order_id']],
            [['qty'], 'number', 'integerOnly' => true, 'min' => 1],
            ['item_id', 'exist',
                'targetClass' => static::itemClassName(),
                'targetAttribute' => 'id',
                'filter' => function($query){$query->validToCart($this->qty);},
                'message' =>  Yii::t('app', 'Invalid item.')
            ],
            [['status'], 'integer'],
            [['price'], 'number'],
            [['created', 'updated'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'item_id' => Yii::t('app', 'Item ID'),
            'title' => Yii::t('app', 'Title'),
            'price' => Yii::t('app', 'Price'),
            'qty' => Yii::t('app', 'Qty'),
            'status' => Yii::t('app', 'Status'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder() {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCartOrder() {
        return $this->hasOne(Order::className(), ['id' => 'order_id'])
                        ->andWhere(['`order`.`status`' => Order::STATUS_CART, '`order`.`user_id`' => Yii::$app->user->id]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem() {
        return $this->hasOne(static::itemClassName(), ['id' => 'item_id']);
    }


    /**
     * @return bool true if item in user cart order
     */
    public static function isItemInUserCartOrder($itemId) {
        return Cart::find()
                        ->joinWith('userCartOrder')
                        ->andWhere(['item_id' => $itemId])
                        ->exists();
    }
    
    /**
     * @return bool true if cart qty < item qty
     */
    public function canIncrease(){
        return $this->qty < $this->item->qty;
    }
    
    /**
     * @return bool true if cart qty > 1
     */
    public function canDecrease(){
        return $this->qty > 1;
    }
    
    /**
     * @return bool true if cart qty > item qty
     */
    public function isOverflow(){
        return $this->qty > $this->item->qty;
    }
}
