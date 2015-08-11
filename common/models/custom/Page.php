<?php

namespace common\models\custom;

class Page extends \common\models\base\Content {
    
    const TYPE = 1;
    
    public static function getHomeSlider(){
        return self::find()->with('media')->andWhere(['slug' => 'home-slider'])->one();
    }
    
    public static function getHomeBanner(){
        return self::find()->with('firstMedia')->andWhere(['slug' => 'home-banner'])->one();
    }
}
