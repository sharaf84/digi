<?php

namespace frontend\models;

use yii\base\Model;
use Yii;

/**
 * Product form
 */
class ProductForm extends Model {

    public $size;
    public $flavor;
    public $color;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['size', 'flavor', 'color'], 'filter', 'filter' => 'trim'],
            [['size'], 'required'],
            [['size', 'flavor'], 'integer'],
        ];
    }

}
