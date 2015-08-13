<?php

namespace common\models\custom;

use yii\helpers\Url;

class Category extends \common\models\base\Tree {

    const ROOT = 1;
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts() {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
    
    public function getLatestProducts($limit = 1){
        return $this->getProducts()->parents()->with('firstMedia')->limit($limit)->all();
    }
    
    public static function getHeaderDropdown() {
        return self::find()->andWhere(['lvl' => 1])->all();
    }
    
    /**
     * @return string url to brand inner page
     */
    public function getInnerUrl() {
        return Url::to(['/store/' . $this->slug]);
    }

}
