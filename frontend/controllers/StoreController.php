<?php

namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use common\models\custom\Product;
use frontend\models\SearchForm;
use frontend\models\ProductForm;

/**
 * Store controller
 */
class StoreController extends \frontend\components\BaseController {

    /**
     * Search Product
     * @param string $slug of category or brand
     */
    public function actionSearch($slug = null) {
        $oProductQuery = Product::find();
        $oSearchForm = new SearchForm();
        $escape = ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\'];
        if ($oSearchForm->load(Yii::$app->request->get()) && $oSearchForm->validate()) {
            if ($oSearchForm->key) {
                $oProductQuery->join('LEFT JOIN', '`base_tree` AS `category`', '`product`.`category_id` = `category`.`id`');
                $oProductQuery->join('LEFT JOIN', '`base_tree` AS `brand`', '`product`.`brand_id` = `brand`.`id`');
                $oProductQuery->andWhere('
                        `product`.`title` LIKE :key OR 
                        `product`.`brief` LIKE :key OR
                        `product`.`description` LIKE :key OR
                        `category`.`name` LIKE :key OR
                        `brand`.`name` LIKE :key', [':key' => ('%' . strtr($oSearchForm->key, $escape) . '%')]
                );
            }
            $oSearchForm->alpha and $oProductQuery->andWhere('`product`.`title` LIKE :alpha', [':alpha' => (strtr($oSearchForm->alpha, $escape) . '%')]);
        }
        if ($slug) {
            if (!$oSearchForm->key) {
                $oProductQuery->join('LEFT JOIN', '`base_tree` AS `category`', '`product`.`category_id` = `category`.`id`');
                $oProductQuery->join('LEFT JOIN', '`base_tree` AS `brand`', '`product`.`brand_id` = `brand`.`id`');
            }
            $oProductQuery->andWhere('`category`.`slug`=:slug OR `brand`.`slug`=:slug', [':slug' => $slug]);
        }

        $oProductsDP = new \yii\data\ActiveDataProvider([
            'query' => $oProductQuery->parents(),
            'sort' => [
                'defaultOrder' => ['sort' => SORT_ASC, 'id' => SORT_DESC]
            ],
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);
        $this->view->params['searchKey'] = $oSearchForm->key;
        return $this->render('search', [
                    'slug' => $slug,
                    'oSearchForm' => $oSearchForm,
                    'oProductsDP' => $oProductsDP,
                    'bestSellerProducts' => Product::getBestSeller(4),
        ]);
    }

    /**
     * View Product
     * @param string $slug
     */
    public function actionProduct($slug) {
        $oProduct = Product::find()->parents()->andWhere(['slug' => $slug])->with('firstMedia', 'category', 'childs')->one();
        if (!$oProduct)
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        $oChildProduct = null;
        $flavors = $colors = [];
        $oProductForm = new ProductForm();
        if ($oProductForm->load(Yii::$app->request->get()) && $oProductForm->validate()) {

            $oProductQuery = Product::find()
                    ->childs($oProduct->id)
                    ->with('media')
                    ->andWhere(['size_id' => $oProductForm->size]);

            if ($oProductForm->flavor) {
                $oChildProduct = $oProductQuery->andWhere(['flavor_id' => $oProductForm->flavor])->one();
            } elseif ($oProductForm->color) {
                $oChildProduct = $oProductQuery->andWhere(['color' => $oProductForm->color])->one();
            }
            if ($oProduct->isAccessory()) {
                $colors = $oProduct->getChildsColors($oProductForm->size);
            } else {
                $flavors = $oProduct->getChildsFlavors($oProductForm->size);
            }
        }
        return $this->render('product', [
                    'oProduct' => $oProduct,
                    'oChildProduct' => $oChildProduct,
                    'oProductForm' => $oProductForm,
                    'sizes' => $oProduct->getChildsSizes(),
                    'flavors' => $flavors,
                    'colors' => $colors,
                    'relatedProducts' => $oProduct->getRelated(4)
        ]);
    }

}
