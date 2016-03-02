<?php
namespace common\models\custom;

use yii\helpers\Url;

class Brand extends \common\models\base\Tree {

    const ROOT = 2;
    
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return array_merge_recursive(parent::behaviors(), [
            'sitemap' => [
                'class' => \himiklab\sitemap\behaviors\SitemapBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select(['slug', 'updated']);
                    $model->andWhere(['lvl' => 1]);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => $model->getInnerUrl(true),
                        'lastmod' => strtotime($model->updated),
                        'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_WEEKLY,
                        'priority' => 0.8
                    ];
                }
            ],
        ]);
    }
    
    public static function getFooterSlider() {
        return self::find()->andWhere(['lvl' => 1])->with('firstMedia')->all();
    }
    
    public static function getHeaderDropdown() {
        return self::find()->andWhere(['lvl' => 1])->all();
    }
    
    /**
     * @return string url to brand inner page
     */
    public function getInnerUrl() {
        return Url::to(['/store/' . $this->slug]);
    }

}
