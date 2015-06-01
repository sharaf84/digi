<?php

namespace common\models\custom;

class Page extends \common\models\base\Content {
    
    const TYPE = 1;
    
    public static function getHomeSlider(){
        return self::findOne(['slug' => 'home-slider']);
    }
}
