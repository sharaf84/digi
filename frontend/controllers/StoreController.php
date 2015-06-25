<?php

namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use common\models\custom\Product;

/**
 * Store controller
 */
class StoreController extends \frontend\components\BaseController {

    public $defaultAction = 'search';

    public function actionSearch($category = null) {
        $oProductQuery = Product::find();
        $oSearchForm = new \frontend\models\SearchForm();

        if ($oSearchForm->load(Yii::$app->request->get()) && $oSearchForm->validate()) {
            if ($oSearchForm->key) {
                $oProductQuery->joinWith(['category']);
                $oProductQuery->orFilterWhere(['like', 'product.title', $oSearchForm->key])
                        ->orFilterWhere(['like', 'product.brief', $oSearchForm->key])
                        ->orFilterWhere(['like', 'product.description', $oSearchForm->key])
                        ->orFilterWhere(['like', 'base_tree.name', $oSearchForm->key]);
            }
            $oSearchForm->alpha and $oProductQuery->andWhere('`title` LIKE "' . $oSearchForm->alpha . '%"');
        }
        if ($category) {
            $oProductQuery->joinWith(['category']);
            $oProductQuery->andWhere(['base_tree.slug' => $category]);
        }

        $oProductsDP = new \yii\data\ActiveDataProvider([
            'query' => $oProductQuery,
            'sort' => [
                'defaultOrder' => ['sort' => SORT_ASC, 'id' => SORT_DESC]
            ],
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);
        $this->view->params['searchKey'] = $oSearchForm->key;
        return $this->render('search', [
                    'category' => $category,
                    'oSearchForm' => $oSearchForm,
                    'oProductsDP' => $oProductsDP,
                    'bestSellerProducts' => Product::getBestSeller(4),
        ]);
    }

    public function actionProduct($slug) {
        $oProduct = Product::find()->where(['slug' => $slug])->with('firstMedia', 'category', 'size', 'flavor')->one();
        if(!$oProduct)
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        return $this->render('product', [
                    'oProduct' => $oProduct,
                    'bestSellerProducts' => Product::getBestSeller(4),
        ]);
    }

}
