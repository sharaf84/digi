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
     * @inheritdoc
     */
    public function rules() {
        return [
            [['order_id', 'item_id', 'qty'], 'required'],
            [['item_id', 'order_id'], 'unique', 'targetAttribute' => ['item_id', 'order_id']],
            [['order_id', 'item_id', 'qty', 'status'], 'integer'],
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
    public function getItem() {
        return $this->hasOne(Product::className(), ['id' => 'item_id']);
    }
    
    public function Add($itemId, $orderId) {
        $oCart = new Cart();
        $oCart->item_id = $itemId;
        $oCart->order_id = $orderId;
        $oCart->qty = 1;
        return $oCart->save();
    }

}
