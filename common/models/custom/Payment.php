<?php

namespace common\models\custom;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $gateway
 * @property string $transaction_reference
 * @property string $response
 * @property string $status
 * @property string $created
 * @property string $updated
 *
 * @property Order $order
 */
class Payment extends \common\models\base\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'integer'],
            [['response'], 'string'],
            [['gateway', 'transaction_reference', 'status'], 'string', 'max' => 45],
            [['created', 'updated'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'gateway' => Yii::t('app', 'Gateway'),
            'transaction_reference' => Yii::t('app', 'Transaction Reference'),
            'response' => Yii::t('app', 'Response'),
            'status' => Yii::t('app', 'Status'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
