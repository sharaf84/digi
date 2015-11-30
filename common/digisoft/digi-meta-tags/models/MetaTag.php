<?php

/**
 * Created by PhpStorm.
 * User: artemshmanovsky
 * Date: 12.03.15
 * Time: 2:11
 */

namespace digi\metaTags\models;

use Yii;
use digi\metaTags\MetaTags;

class MetaTag extends \yii\db\ActiveRecord {

    use \webvimark\behaviors\multilanguage\MultiLanguageTrait;

    public function behaviors() {
        return [
            'TimestampBehavior' => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'MultiLanguageBehavior' => [
                'class' => \webvimark\behaviors\multilanguage\MultiLanguageBehavior::className(),
                'mlConfig' => [
                    'db_table' => 'translations_with_text',
                    'attributes' => ['title', 'keywords', 'description'],
                    //Sets all virtual attributes at these routes ex: title_ar, title_fr, ... 
                    'admin_routes' => end(explode('/', Yii::getAlias('@app'))) == 'frontend' ? [] : [
                        'content/update',
                        'content/view',
                        'pages/update',
                        'pages/view',
                        'articles/update',
                        'articles/view',
                        'products/update',
                        'products/view',
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
     * @return string the associated database table name
     */
    public static function tableName() {
        return '{{%meta_tags}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return [
            [['model', 'model_id'], 'required'],
            [['model_id'], 'integer'],
            [['description'], 'string'],
            [['model', 'title', 'keywords'], 'string', 'max' => 255],
            [['model', 'model_id', 'title', 'keywords', 'description', 'created', 'updated'], 'safe'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return [
            'title' => MetaTags::t('messages', 'model_title'),
            'keywords' => MetaTags::t('messages', 'model_keywords'),
            'description' => MetaTags::t('messages', 'model_description'),
        ];
    }

}
