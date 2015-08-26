<?php

namespace backend\controllers;

use Yii;
use backend\components\BaseController;
use common\models\base\form\Login;
use common\models\custom\User;
use common\models\custom\Order;
use common\models\custom\Comment;
use common\models\custom\Product;

/**
 * Site controller
 */
class SiteController extends BaseController {

    
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index', [
            'totalUsersCount' => User::find()->count(),
            'totalOrdersCount' => Order::getTotalCount(),
            'totalOrdersRevenu' => Order::getTotalRevenu(),
            'totalProductsCount' => Product::find()->childs()->count(),
            //'totalCommentsCount' => Comment::find()->active()->count(),
            'topUsers' => Order::getTopUsers(20),
            'topProducts' => Product::getBestSeller(20),
        ]);
    }
    
    public function actionComponents() {
        return $this->render('components');
    }
    
    public function actionAnalytics() {
        return $this->render('analytics');
    }
    
    public function actionLogin() {
        $this->layout = 'login';
        
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Login();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
