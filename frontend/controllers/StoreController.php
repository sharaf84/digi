<?php

namespace frontend\controllers;

use Yii;
use common\models\custom\Product;
use common\models\custom\search\Product as ProductSearch;

/**
 * Products controller
 */
class StoreController extends \frontend\components\BaseController {

    public $defaultAction = 'search';

    public function actionSearch() {
        $query = Product::find();

        $oProductDataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['sort' => SORT_ASC, 'id' => SORT_DESC]
            ],
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);

        return $this->render('search', [
                    'oProductDataProvider' => $oProductDataProvider,
                    'bestSellerProducts' => Product::getBestSeller(4),
        ]);
    }

}
