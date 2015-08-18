<?php

namespace common\models\base;

use Yii;
use yii\helpers\StringHelper;
use common\helpers\MediaHelper;

class Base extends \yii\db\ActiveRecord {

    /** @var string slug pattern  */
    const SLUG_PATTERN = '/^[a-z0-9]+(?:-[a-z0-9]+)*$/'; // '/^[0-9a-z-]{0,128}$/';
    /** @var string phone pattern */
    const PHONE_PATTERN = '/^[\d\s-\+\(\)]+$/';

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
                    'attributes' => ['name', 'title', 'brief', 'description', 'body', 'value', 'keywords'],
                    //Sets all virtual attributes at these routes ex: title_ar, title_fr, ... 
                    'admin_routes' => end(explode('/', Yii::getAlias('@app'))) == 'frontend' ? [] : [
                        'content/update',
                        'content/view',
                        'pages/update',
                        'pages/view',
                        'articles/update',
                        'articles/view', //make confilect with frontend articles/view
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
        return $this->hasMany(Media::className(), ['model_id' => 'id'])->andWhere(['model' => StringHelper::basename(static::className())]); //->orderBy(['sort' => SORT_ASC, 'id' => SORT_DESC]);
    }

    /**
     * Global Media hasOne Relation
     */
    public function getFirstMedia() {
        return $this->hasOne(Media::className(), ['model_id' => 'id'])->andWhere(['model' => StringHelper::basename(static::className())]); //->orderBy(['sort' => SORT_ASC, 'id' => SORT_DESC]);
    }

    public function getFeaturedImgUrl($size = null, $placeholder = true, $overwrite = false) {
        return $this->firstMedia ? $this->firstMedia->getImgUrl($size, $placeholder, $overwrite) : MediaHelper::getPlaceholderUrl($size, $placeholder, $overwrite);
    }

    public function getImgUrlByIndex($index, $size = null, $placeholder = true, $overwrite = false) {
        return ($this->media && !empty($this->media[$index])) ? $this->media[$index]->getImgUrl($size, $placeholder, $overwrite) : MediaHelper::getPlaceholderUrl($size, $placeholder, $overwrite);
    }

    /**
     * Finds out if token is valid
     * @param string $token
     * @param timestamp $expire
     * @return bool
     */
    public static function isValidToken($token, $expire) {
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

}
