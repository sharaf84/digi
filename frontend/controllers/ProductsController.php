<?php

namespace frontend\controllers;

use Yii;
use common\models\custom\Product;
use common\models\custom\search\Product as ProductSearch;

/**
 * Products controller
 */
class ProductsController extends \frontend\components\BaseController {
    
    public $defaultAction = 'list';

    public function actionList() {
        $oProductSearch = new ProductSearch();
        $oProductDataProvider = $oProductSearch->search([]);

        return $this->render('list', [
            'oProductDataProvider' => $oProductDataProvider,
            'bestSellerProducts' => Product::getBestSeller(4),
        ]);
    }

}
