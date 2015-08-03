<?php

namespace common\models\custom;

use common\models\custom\Profile;

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
        return $this->hasMeny(Order::className(), ['user_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartOrder() {
        return $this->hasOne(Order::className(), ['user_id' => 'id'])->andWhere(['status' => Order::STATUS_CART]);
    }
    
    

}
