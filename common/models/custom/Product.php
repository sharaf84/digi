<?php

namespace common\models\custom;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $category_id
 * @property integer $brand_id
 * @property integer $size_id
 * @property integer $flavor_id
 * @property string $title
 * @property string $slug
 * @property string $color
 * @property string $price
 * @property integer $qty
 * @property string $brief
 * @property string $description
 * @property string $body
 * @property integer $featured
 * @property integer $sort
 * @property integer $status
 * @property string $created
 * @property string $updated
 *
 * @property Product $parent
 * @property Product[] $products
 * @property BaseTree $category
 * @property BaseTree $brand
 * @property BaseTree $size
 * @property BaseTree $flavor
 */
class Product extends \common\models\base\Base {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title'], 'required'],
            [['price', 'featured', 'qty'], 'default', 'value' => 0],
            [['slug'], 'match', 'pattern' => '/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
            [['slug'], 'unique'],
            [['price'], 'number'],
            [['brief', 'description', 'body'], 'string'],
            [['parent_id', 'category_id', 'brand_id', 'size_id', 'flavor_id', 'qty', 'featured', 'sort', 'status'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['color'], 'string', 'max' => 7],
            [['created', 'updated'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'size_id' => Yii::t('app', 'Size ID'),
            'flavor_id' => Yii::t('app', 'Flavor ID'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'color' => Yii::t('app', 'Color'),
            'price' => Yii::t('app', 'Price'),
            'qty' => Yii::t('app', 'Quantity'),
            'brief' => Yii::t('app', 'Brief'),
            'description' => Yii::t('app', 'Description'),
            'body' => Yii::t('app', 'Body'),
            'featured' => Yii::t('app', 'Featured'),
            'sort' => Yii::t('app', 'Sort'),
            'status' => Yii::t('app', 'Status'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
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
                //'uniqueValidator' => ['targetAttribute' => ['slug', 'type']]
            ],
            'Sortable' => [
                'class' => \digi\sortable\behaviors\Sortable::className(),
                'query' => static::find(),
                'orderAttribute' => 'sort'
            ],
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent() {
        return $this->hasOne(Product::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts() {
        return $this->hasMany(Product::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory() {
        return $this->hasOne(BaseTree::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand() {
        return $this->hasOne(BaseTree::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize() {
        return $this->hasOne(BaseTree::className(), ['id' => 'size_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlavor() {
        return $this->hasOne(BaseTree::className(), ['id' => 'flavor_id']);
    }

}
