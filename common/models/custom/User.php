<?php

namespace common\models\custom;

use common\models\custom\Profile;
use common\helpers\MediaHelper;

class User extends \common\models\base\User {
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile() {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders() {
        return $this->hasMany(Order::className(), ['user_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActiveOrders() {
        return $this->hasMany(Order::className(), ['user_id' => 'id'])->andWhere(['!=', 'status', Order::STATUS_CART]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActiveCartItems() {
        return $this->hasMany(Cart::className(), ['order_id' => 'id'])->via('activeOrders');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartOrder() {
        return $this->hasOne(Order::className(), ['user_id' => 'id'])->andWhere(['status' => Order::STATUS_CART]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartItems() {
        return $this->hasMany(Cart::className(), ['order_id' => 'id'])->via('cartOrder');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTotalCartCount() {
        return $this->getCartItems()->sum('qty');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function hasCartItem($itemId) {
        return $this->hasOne(Cart::className(), ['order_id' => 'id'])
                ->via('cartOrder')
                ->andWhere(['item_id' => $itemId])
                ->exists();
    }
    
    
    public function getName() {
        return $this->profile ? $this->profile->getName() : $this->email;
    }
    
    public function getFeaturedImgUrl($size = null, $placeholder = 'person', $overwrite = false){
        return parent::getFeaturedImgUrl($size, $placeholder, $overwrite);
    }
}
