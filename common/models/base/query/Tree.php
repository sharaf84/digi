<?php

namespace common\models\base\query;

use common\models\core\ActiveQuery;
/**
 * This is the base query class for the nested set tree
 */
class Tree extends \kartik\tree\models\TreeQuery {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return array_merge_recursive(ActiveQuery::behaviors(), parent::behaviors());
    }

}
