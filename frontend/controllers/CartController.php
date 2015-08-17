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
        return $this->render('index', ['cartItems' => Yii::$app->user->identity->cartItems]);
        //return $this->render('index', ['cartItems' => Yii::$app->user->identity->cartOrder ? Yii::$app->user->identity->cartOrder->cartItems : null]);
    }

    /**
     * Add to cart
     * @param int $id item id
     */
    public function actionAdd($id) {
        $oUserCartOrder = Yii::$app->user->identity->cartOrder ? Yii::$app->user->identity->cartOrder : Order::createCartOrder();
        if (!$oUserCartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        if ($oUserCartOrder->addCartItem($id)) {
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

        if (!Yii::$app->user->identity->cartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        Yii::$app->user->identity->cartOrder->increaseCartItem($id);
        
        return $this->actionIndex();

    }

    /**
     * Decrease cart item 
     * @param int $id item id
     */
    public function actionDecrease($id) {

        if (!Yii::$app->user->identity->cartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        Yii::$app->user->identity->cartOrder->decreaseCartItem($id);
        
        return $this->actionIndex();
    }
    
    /**
     * Matches cart item qty with the avaliable item qty
     * @param int $id item id
     */
    public function actionMatch($id) {

        if (!Yii::$app->user->identity->cartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        Yii::$app->user->identity->cartOrder->matchCartItem($id);
        
        return $this->actionIndex();
    }

    /**
     * Remove cart item
     * @param int $id item id
     */
    public function actionRemove($id) {

        if (!Yii::$app->user->identity->cartOrder)
            throw new BadRequestHttpException(Yii::t('app', 'Invalid cart order.'));

        Yii::$app->user->identity->cartOrder->removeCartItem($id);

        return $this->actionIndex();
    }

}
