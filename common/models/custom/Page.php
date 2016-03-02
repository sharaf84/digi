<?php

namespace common\models\custom;

use yii\helpers\Url;

class Page extends \common\models\base\Content {

    const TYPE = 1;

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
                    $model->andWhere(['!=', 'slug', 'home-slider']);
                    $model->andWhere(['!=', 'slug', 'home-banner']);
                },
                        'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => $model->getInnerUrl(true),
                        'lastmod' => strtotime($model->updated),
                        'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_YEARLY,
                        'priority' => 0.6
                    ];
                }
                    ],
                ]);
            }

            public static function getHomeSlider() {
                return self::find()->with('media')->andWhere(['slug' => 'home-slider'])->one();
            }

            public static function getHomeBanner() {
                return self::find()->with('firstMedia')->andWhere(['slug' => 'home-banner'])->one();
            }

            public function getInnerUrl($scheme = false) {
                return $this->slug == 'contact-us' ? Url::to(['/site/' . $this->slug], $scheme) : Url::to(['/site/page', 'slug' => $this->slug], $scheme);
            }

        }
        