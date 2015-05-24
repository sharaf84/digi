<?php

namespace common\models\base;

use Yii;
use common\models\core\ActiveRecord;

/**
 * This is the model class for table "base_content".
 *
 * @property integer $id
 * @property integer $type
 * @property string $title
 * @property string $slug
 * @property string $brief
 * @property string $description
 * @property string $body
 * @property string $date
 * @property string $end_date
 * @property integer $sort
 * @property integer $status
 * @property string $created
 * @property string $updated
 */
class Content extends ActiveRecord {

    const TYPE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'base_content';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['type'], 'default', 'value' => static::TYPE],
            [['title'], 'required'],
            [['slug'], 'match', 'pattern' => '/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
            [['slug'], 'unique', 'targetAttribute' => ['slug', 'type']],
            [['type', 'sort', 'status'], 'integer'],
            [['brief', 'description', 'body'], 'string'],
            [['date', 'end_date', 'created', 'updated'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'title' => 'Title',
            'slug' => 'Slug',
            'brief' => 'Brief',
            'description' => 'Description',
            'body' => 'Body',
            'date' => 'Date',
            'end_date' => 'End Date',
            'sort' => 'Sort',
            'status' => 'Status',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    public function behaviors() {
        return array_merge_recursive(parent::behaviors(), [
            'SluggableBehavior' => [
                'class' => \yii\behaviors\SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
                'immutable' => true,
                'ensureUnique' => true,
                'uniqueValidator' => ['targetAttribute' => ['slug', 'type']]
            ],
        ]);
    }

    public static function find() {
        //Set default condition
        return parent::find()->andWhere(static::TYPE ? ['type' => static::TYPE] : null);
    }

}