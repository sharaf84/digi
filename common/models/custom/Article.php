<?php

namespace common\models\custom;

use yii\helpers\Url;

class Article extends \common\models\base\Content {
    
    const TYPE = 2;
    
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return array_merge_recursive(parent::behaviors(), [
            'HitCounter' => [
                'class' => \hitcounter\HitableBehavior::className(),
                'attribute' => 'hits',    //attribute which should contain uniquie hits value
                'group' => 'Article',               //group name of the model (class name by default)
                'delay' => -1,             //never register the same visitor
                'table_name' => '{{%hits}}'     //table with hits data
            ],
        ]);
    }
    
    public static function getLatest($limit = 1){
        return self::find()->with('firstMedia')->orderBy(['date' => SORT_DESC])->limit($limit)->all();
    }
    
    public static function getMostRead($limit = 1){
        return self::find()->with('firstMedia')->orderBy(['hits' => SORT_DESC, 'date' => SORT_DESC])->limit($limit)->all();
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
