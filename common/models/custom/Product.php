<?php

namespace common\models\custom;

use Yii;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

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
 * @property integer $sold holds sold count
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
            [['title', 'category_id', 'brand_id'], 'required', 'on' => 'parent'],
            [['size_id', 'price', 'qty'], 'required', 'on' => 'child'],
            [['size_id'], 'ruleValidateSize', 'on' => 'child'],
            [['price', 'featured', 'qty'], 'default', 'value' => 0],
            [['slug'], 'match', 'pattern' => static::SLUG_PATTERN],
            [['slug'], 'unique'],
            [['price', 'qty', 'sold'], 'number'],
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
            'sold' => Yii::t('app', 'Sold'),
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

    public function ruleValidateSize($attribute, $params) {
        if (!$this->hasErrors()) {
            if (empty($this->flavor_id) && empty($this->color))
                $this->addError('size_id', Yii::t('app', 'Choose flover or color'));
        }
    }

    public function beforeSave($insert) {
        if ($this->isChild() && $insert) {
            $oParentProduct = self::findOne($this->parent_id);
            $this->title = $oParentProduct->title;
            $this->slug = null;
            $this->category_id = $oParentProduct->category_id;
            $this->brand_id = $oParentProduct->brand_id;
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes) {
        if ($this->isChild()) {
            $this->parent->autoUpdate();
        }
        return parent::afterSave($insert, $changedAttributes);
    }

    public function afterDelete() {
        if ($this->isChild()) {
            $this->parent->autoUpdate();
        }
        return parent::afterDelete();
    }

    /**
     * @inheritdoc
     */
    public static function find() {
        //Set default condition
        return (new query\Product(get_called_class())); //->defaultOrder();
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
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand() {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize() {
        return $this->hasOne(Size::className(), ['id' => 'size_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlavor() {
        return $this->hasOne(Flavor::className(), ['id' => 'flavor_id']);
    }

    /**
     * Get Featured Products
     */
    public static function getFeatured($limit = 1) {
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
    public static function getBestSeller($limit = 1) {
        return self::find()
                        ->parents()
                        //->andWhere(['>', 'sold', 0])
                        ->with('firstMedia', 'category')
                        ->orderBy(['sold' => SORT_DESC])
                        ->limit($limit)
                        ->all();
    }

    /**
     * Get Related Products
     */
    public function getRelated($limit = 1) {
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
        return Url::to(['/product/' . $this->slug]);
    }

    /**
     * @return bool true if parent product
     */
    public function isParent() {
        return !$this->parent_id;
    }

    /**
     * @return bool true if child product
     */
    public function isChild() {
        return $this->parent_id;
    }

    /**
     * @return bool true if $qty in stock
     */
    public function inStock($qty = 1) {
        return $this->qty >= $qty;
    }

    /**
     * @return bool true if product is valid to cart
     */
    public function validToCart($qty = 1) {
        return $this->isChild() && $this->inStock($qty);
    }

    /**
     * @return bool true if product category is "Accessories"
     */
    public function isAccessory() {
        return $this->category->slug == 'accessories';
    }

    /**
     * @return string min product childs price 
     */
    public function getMinChildsPrice() {
        return self::find()
                        ->childs($this->id)
                        ->min('price');
    }

    /**
     * @return string total product childs qty 
     */
    public function getTotalChildsQty() {
        return self::find()
                        ->childs($this->id)
                        ->sum('qty');
    }

    /**
     * Updates parent product with min childs price and total childs qty.
     */
    public function autoUpdate() {
        if ($this->isParent()) {
            $this->price = $this->getMinChildsPrice();
            $this->qty = $this->getTotalChildsQty();
            $this->save(false);
        }
    }

    /**
     * @return array product childs sizes
     */
    public function getChildsSizes() {
        return ArrayHelper::map($this->childs, 'size.id', 'size.name');
    }

    /**
     * @return array product childs falvors 
     */
    public function getChildsFlavors($size = null) {
        $falvors = ArrayHelper::map($this->childs, 'flavor.id', 'flavor.name', $size ? 'size_id' : null);
        return $size ? $falvors[$size] : $falvors;
    }

    /**
     * @return array product childs colors 
     */
    public function getChildsColors($size = null) {
        $colors = ArrayHelper::map($this->childs, 'color', 'color', $size ? 'size_id' : null);
        return $size ? $colors[$size] : $colors;
    }

}
