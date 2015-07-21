<?php

namespace common\models\custom;

use yii\helpers\Url;

class Article extends \common\models\base\Content {
    
    const TYPE = 2;
    
    public static function getLatest($limit = 4){
        return self::find()->with('firstMedia')->orderBy(['date' => SORT_DESC])->limit($limit)->all();
    }
    
    public static function getMostRead($limit = 3){
        return self::find()->with('firstMedia')->orderBy(['date' => SORT_DESC])->limit($limit)->all();
    }
    
    public function getInnerUrl() {
        return Url::to(['/article/' . $this->slug]);
    }
    
    public function getSlideDate(){
        return date('F j, Y', strtotime($this->date));
    }
    
    public function getListDate(){
        return date('j F Y', strtotime($this->date));
    }
}
