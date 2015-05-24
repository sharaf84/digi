<?php

namespace common\models\core;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class ActiveRecord extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        $behaviors = [];
        
        ($this->hasAttribute('created') && $this->hasAttribute('updated')) and $behaviors['TimestampBehavior'] = [
                    'class' => TimestampBehavior::className(),
                    'createdAtAttribute' => 'created',
                    'updatedAtAttribute' => 'updated',
                    'value' => new Expression('NOW()'),
        ];
        
        $this->hasAttribute('sort') and $behaviors['Sortable'] = [
                    'class' => \digi\sortable\behaviors\Sortable::className(),
                    'query' => static::find(),
                    'orderAttribute' => 'sort'
        ];

        return $behaviors;
    }

}
