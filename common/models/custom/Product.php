<?php

namespace common\models\custom;

use Yii;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\base\Tree;

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
            'parent_id' => Yii::t('app', 'Parent'),
            'category_id' => Yii::t('app', 'Category'),
            'brand_id' => Yii::t('app', 'Brand'),
            'size_id' => Yii::t('app', 'Size'),
            'flavor_id' => Yii::t('app', 'Flavor'),
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
     * @inheritdoc
     */
    public static function find() {
        //Set default condition
        return (new query\Product(get_called_class()));//->defaultOrder();
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
    public function getChilds() {
        return $this->hasMany(Product::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory() {
        return $this->hasOne(Tree::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand() {
        return $this->hasOne(Tree::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize() {
        return $this->hasOne(Tree::className(), ['id' => 'size_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlavor() {
        return $this->hasOne(Tree::className(), ['id' => 'flavor_id']);
    }

    /**
     * Get Featured Products
     */
    public static function getFeatured($limit = 3) {
        return self::find()
                ->parents()
                ->andWhere(['featured' => 1])
                ->with('firstMedia', 'category')
                ->defaultOrder()
                ->limit($limit)
                ->all();
    }

    /**
     * Get Best Seller Products
     */
    public static function getBestSeller($limit = 3) {
        /**
         * @todo change the condition to get best seller products
         */
        return self::find()
                ->parents()
                ->andWhere(['featured' => 1])
                ->with('firstMedia', 'category')
                ->defaultOrder()
                ->limit($limit)
                ->all();
    }
    
    /**
     * Get Related Products
     */
    public function getRelated($limit = 4) {
        return self::find()
                ->parents()
                ->andWhere(['!=', 'id', $this->id])
                ->andWhere(['category_id' => $this->category_id])
                ->with('firstMedia', 'category')
                ->defaultOrder()
                ->limit($limit)
                ->all();
    }
    
    /**
     * Get Parents List
     * @return array of parents as [id => title] used for dropdown
     */
    public static function getParentsList() {
        return ArrayHelper::map(static::getParents(), 'id', 'title');
    }
    
    /**
     * Gets all parents
     */
    public static function getParents() {
        return static::find()->parents()->defaultOrder()->all();
    }
    
    /**
     * @return string url to product inner page
     */
    public function getInnerUrl() {
        return Url::to(['product/' . $this->slug]);
    }

}
