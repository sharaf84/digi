<?php

namespace frontend\controllers;

use Yii;
use common\models\custom\Cart;
use common\models\custom\Order;
use common\models\custom\Product;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;

/**
 * Cart controller
 */
class CartController extends \frontend\components\BaseController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    //'login' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index', ['cartItems' => $this->oAuthUser->cartOrder ? $this->oAuthUser->cartOrder->items : null]);
    }

    /**
     * Add to cart
     * @param int $id product id
     */
    public function actionAdd($id) {
        $oProduct = Product::findOne($id);
        if (!$oProduct || !$oProduct->validToCart())
            throw new BadRequestHttpException(Yii::t('app', 'Invalid product.'));

        $oAuthUserCartOrder = $this->oAuthUser->cartOrder ? $this->oAuthUser->cartOrder : Order::createCartOrder();
        if (!$oAuthUserCartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        if (Cart::add($oProduct->id, $oAuthUserCartOrder->id)) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Item added successfully'));
            return $this->redirect(['/cart']);
        } else {
            Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Error, please try again.'));
            return $this->goBack();
        }
    }

}
