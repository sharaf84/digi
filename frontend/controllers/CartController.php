<?php

namespace frontend\controllers;

use Yii;
use common\models\custom\Cart;
use common\models\custom\Order;
use common\models\custom\Product;

/**
 * Cart controller
 */
class CartController extends \frontend\components\BaseController {

    public function actionIndex() {
        return $this->render('index', ['cartItems' => $this->oAuthUser->cartOrder->items]);
    }

    public function actionAdd($id) {
        $oProduct = Product::findOne($id);
        if (!$oProduct || !$oProduct->validToCart())
            throw new NotFoundHttpException(Yii::t('app', 'Invalid product.'));
        
        $oAuthUserCartOrder = $this->oAuthUser->cartOrder ? $this->oAuthUser->cartOrder : Order::createCartOrder($this->oAuthUser->id);
        if (!$oAuthUserCartOrder)
            throw new NotFoundHttpException(Yii::t('app', 'The cart order does not exist.'));
        
        if (Cart::add($oProduct->id, $oAuthUserCartOrder->id)) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Item added successfully'));
            return $this->redirect(['/cart']);
        } else {
            Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Error, please try again.'));
            return $this->goBack();
        }
    }

}
