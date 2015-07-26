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
     * Gets the childs of parent product.
     * @return \yii\db\ActiveQuery the owner
     */
    public function childs($parentId) {
        return $this->andWhere(['parent_id' => $parentId]);
    }
    
    public function defaultOrder() {
        return $this->addOrderBy(['sort' => SORT_ASC, 'id' => SORT_DESC]);
    }

}
