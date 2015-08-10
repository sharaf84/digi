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
                    'add' => ['post'],
                    'increase' => ['post'],
                    'decrease' => ['post'],
                    'remove' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index', ['cartItems' => $this->oAuthUser->cartItems]);
        //return $this->render('index', ['cartItems' => $this->oAuthUser->cartOrder ? $this->oAuthUser->cartOrder->cartItems : null]);
    }

    /**
     * Add to cart
     * @param int $id item id
     */
    public function actionAdd($id) {
        $oAuthUserCartOrder = $this->oAuthUser->cartOrder ? $this->oAuthUser->cartOrder : Order::createCartOrder();
        if (!$oAuthUserCartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        if ($oAuthUserCartOrder->addCartItem($id)) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Item added successfully.'));
            return $this->redirect(['/cart']);
        } else {
            Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Error, please try again.'));
            return $this->goBack();
        }
    }

    /**
     * Increase cart item 
     * @param int $id item id
     */
    public function actionIncrease($id) {

        if (!$this->oAuthUser->cartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        $this->oAuthUser->cartOrder->increaseCartItem($id);
        
        return $this->actionIndex();

    }

    /**
     * Decrease cart item 
     * @param int $id item id
     */
    public function actionDecrease($id) {

        if (!$this->oAuthUser->cartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        $this->oAuthUser->cartOrder->decreaseCartItem($id);
        
        return $this->actionIndex();
    }
    
    /**
     * Matches cart item qty with the avaliable item qty
     * @param int $id item id
     */
    public function actionMatch($id) {

        if (!$this->oAuthUser->cartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        $this->oAuthUser->cartOrder->matchCartItem($id);
        
        return $this->actionIndex();
    }

    /**
     * Remove cart item
     * @param int $id item id
     */
    public function actionRemove($id) {

        if (!$this->oAuthUser->cartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        $this->oAuthUser->cartOrder->removeCartItem($id);

        return $this->actionIndex();
    }

}
