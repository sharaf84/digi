<?php

namespace common\models\base;

use yii\helpers\StringHelper;
use common\helpers\MediaHelper;

class Base extends \yii\db\ActiveRecord {

    use \webvimark\behaviors\multilanguage\MultiLanguageTrait;

    public function behaviors() {
        return [
            'TimestampBehavior' => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'MetaTag' => [
                'class' => \digi\metaTags\MetaTagBehavior::className(),
            ],
            'MultiLanguageBehavior' => [
                'class' => \webvimark\behaviors\multilanguage\MultiLanguageBehavior::className(),
                'mlConfig' => [
                    'db_table' => 'translations_with_text',
                    'attributes' => ['name', 'title', 'value', 'keywords', 'brief', 'description', 'body'],
                    //Sets all virtual attributes at these routes ex: title_ar, title_fr, ... 
                    'admin_routes' => [
                        'content/update',
                        'content/view',
                        'pages/update',
                        'pages/view',
                        'articles/update',
                        'articles/view',
                        'media/update',
                        'media/view',
                        'treemanager/node/manage',
                        'tree/update',
                        'tree/veiw',
                        'tree/manage',
                        'menu',
                        'menu/manage',
                        'settings/update',
                        'settings/view',
                    ],
                ],
            ],
        ];
    }
    
    /**
     * Global Media hasMany Relation
     */
    public function getMedia() {
        return $this->hasMany(Media::className(), ['model_id' => 'id'])->where(['model' => StringHelper::basename(static::className())]);//->orderBy(['sort' => SORT_ASC, 'id' => SORT_DESC]);
    }
    
    /**
     * Global Media hasOne Relation
     */
    public function getFirstMedia() {
        return $this->hasOne(Media::className(), ['model_id' => 'id'])->where(['model' => StringHelper::basename(static::className())]);//->orderBy(['sort' => SORT_ASC, 'id' => SORT_DESC]);
    }
    
    public function getFeaturedImgUrl($size = null, $placeholder = true, $overwrite = false){
        return $this->firstMedia ? $this->firstMedia->getImgUrl($size, $placeholder, $overwrite) : MediaHelper::getPlaceholderUrl($size, $placeholder, $overwrite);
    }

}