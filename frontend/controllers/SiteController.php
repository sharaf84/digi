<?php

namespace frontend\controllers;

use Yii;

use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends \frontend\components\BaseController {

    public $defaultAction = 'home';

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            // page action renders "static" pages stored under 'frontend/views/site/pages'
            // They can be accessed via: site/static?view=FileName
            'static' => [
                'class' => \yii\web\ViewAction::className(),
            ],
        ];
    }

    public function actionHome() {
        $this->view->params['homeSlider'] = \common\models\custom\Page::getHomeSlider();
        return $this->render('home', [
                    'featuredProducts' => \common\models\custom\Product::getFeatured(),
                    'bestSellerProducts' => \common\models\custom\Product::getBestSeller(),
                    'latestArticles' => \common\models\custom\Article::getLatest()
        ]);
    }
    
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * @author Islam Magdy
     * @desc Dummy static page
     */
    public function actionAbout() {
        return $this->render('about');
    }

}