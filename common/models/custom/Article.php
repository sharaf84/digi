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
            'sitemap' => [
                'class' => \himiklab\sitemap\behaviors\SitemapBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select(['slug', 'updated']);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => $model->getInnerUrl(true),
                        'lastmod' => strtotime($model->updated),
                        'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_MONTHLY,
                        'priority' => 0.8
                    ];
                }
            ],
        ]);
    }
    
    public function getComments() {
        return $this->hasMany(Comment::className(), ['entityId' => 'id'])->active()->andWhere(['entity' => Comment::hashEntityClass(self::className())]);
    }
    
    public function getCommentsCount() {
        return $this->hasMany(Comment::className(), ['entityId' => 'id'])->active()->andWhere(['entity' => Comment::hashEntityClass(self::className())])->count();
    }
    
    public static function getLatest($limit = 1){
        return self::find()->with('firstMedia')->orderBy(['date' => SORT_DESC])->limit($limit)->all();
    }
    
    public static function getMostRead($limit = 1){
        return self::find()->with('firstMedia')->orderBy(['hits' => SORT_DESC, 'date' => SORT_DESC])->limit($limit)->all();
    }
    
    public function getInnerUrl($scheme = false) {
        return Url::to(['/article/' . $this->slug], $scheme);
    }
    
    public function getSlideDate(){
        return date('F j, Y', strtotime($this->date));
    }
    
    public function getListDate(){
        return date('j F Y', strtotime($this->date));
    }
}
