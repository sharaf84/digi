<?php

namespace frontend\controllers;

use Yii;
use common\models\custom\Order;
use yii\web\BadRequestHttpException;

/**
 * Cart controller
 */
class OrdersController extends \frontend\components\BaseController {

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
                //'Checkout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Checkout
     * @throws BadRequestHttpException
     */
    public function actionCheckout() {
        if (!(Yii::$app->user->identity->cartOrder && Yii::$app->user->identity->cartOrder->cartItems))
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        if (Yii::$app->user->identity->cartOrder->hasOverflowCart) {
            Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Sorry, please fix your cart.'));
            return $this->redirect(['/cart']);
        }

        $oCheckoutOrder = Yii::$app->user->identity->cartOrder;
        $oCheckoutOrder->scenario = 'checkout';
        if ($oCheckoutOrder->load(Yii::$app->request->post())) {
            if ($oCheckoutOrder->checkout()) {
                if ($oCheckoutOrder->payment_method == Order::METHOD_MIGS) {
                    return $this->redirect(['/payment/migs-purchase', 'token' => $oCheckoutOrder->token]);
                } else {
                    Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Order saved successfully.'));
                    return $this->redirect(['/profile']);
                }
            } else {
                Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Sorry, error sending order.'));
            }
        } else {
            $oCheckoutOrder->setDefaultUserValues();
        }

        return $this->render('checkout', [
                    'oCheckoutOrder' => $oCheckoutOrder,
        ]);
    }

}
