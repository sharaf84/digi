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
                //'add' => ['post'],
                ],
            ],
        ];
    }

    public function actionCheckout() {
        if (!$this->oAuthUser->cartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));
        
        $oCheckoutOrder = $this->oAuthUser->cartOrder;
        $oCheckoutOrder->scenario = 'checkout';
        if ($oCheckoutOrder->load(Yii::$app->request->post())) {
            if ($oCheckoutOrder->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Order sent successfully.'));
                //return $this->redirect(['/profile']);
            } else {
                var_dump($oCheckoutOrder->errors);
                Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Sorry, error sending order.'));
            }
        }else{
            $oCheckoutOrder->setDefaultUserValues();
        }

        return $this->render('checkout', [
                    'oCheckoutOrder' => $oCheckoutOrder,
        ]);
    }

}
