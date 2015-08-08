<?php

namespace common\models\custom\query;

class Product extends \yii\db\ActiveQuery {

    /**
     * Gets the parents products.
     * @return \yii\db\ActiveQuery the owner
     */
    public function parents() {
        return $this->andWhere('parent_id IS NULL');
    }
    
    /**
     * Gets the childs products.
     * @param int $parentId
     * @return \yii\db\ActiveQuery the owner
     */
    public function childs($parentId = null) {
        return $parentId ? $this->andWhere(['parent_id' => $parentId]) : $this->andWhere('parent_id IS NOT NULL');
    }
    
    /**
     * Gets the parents products.
     * @return \yii\db\ActiveQuery the owner
     */
    public function inStock() {
        return $this->andWhere('qty > 0');
    }
    
    
    public function defaultOrder() {
        return $this->addOrderBy(['sort' => SORT_ASC, 'id' => SORT_DESC]);
    }

}
