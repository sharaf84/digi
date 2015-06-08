<?php

namespace common\models\custom;

class Brand extends \common\models\base\Tree {

    const ROOT = 2;
    
    public static function getFooterSlider() {
        return self::find()->andWhere(['lvl' => 1])->with('firstMedia')->all();
    }

}
