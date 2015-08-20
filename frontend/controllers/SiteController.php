<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ContactForm;
use common\models\custom\Page;
use common\models\custom\Article;
use common\models\custom\Product;
use yii\web\NotFoundHttpException;

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
//            'captcha' => [
//                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],
            // page action renders "static" pages stored under 'frontend/views/site/pages'
            // They can be accessed via: site/static?view=FileName
            'static' => [
                'class' => \yii\web\ViewAction::className(),
            ],
        ];
    }

    public function actionGo() {
        $gateway = \Omnipay\Omnipay::create('Migs_ThreeParty');
        $gateway->setMerchantId('TEST512345USD');
        $gateway->setMerchantAccessCode('F05FC469');
        $gateway->setSecureHash('E49780B4C8FDB4E38222ADE7F3B97CCA');

        $response = $gateway->purchase([
                    'amount' => '15.00',
                    'currency' => 'USD',
                    'transactionId' => 'yourAccessToken',
                    'returnUrl' => \yii\helpers\Url::to(['/site/response'], true),
                ])->send();
        Yii::$app->session['migsPurchaseRequest'] = $response->getRequest()->getParameters();
        
        if ($response->isSuccessful()) {
            // payment was successful: update database
            print_r($response);
        } elseif ($response->isRedirect()) {
            // redirect to offsite payment gateway
            $response->redirect();
        } else {
            // payment failed: display message to customer
            echo $response->getMessage();
        }
    }

    public function actionResponse() {
        $gateway = \Omnipay\Omnipay::create('Migs_ThreeParty');
        $response = $gateway->completePurchase(Yii::$app->session['migsPurchaseRequest'])->send();
        
        if ($response->isSuccessful()) {
            // payment was successful: update database
            //print_r($response->getMessage());
            //print_r($response->getData());
            //print_r($response->getTransactionReference());
            print_r($response);
        } elseif ($response->isRedirect()) {
            // redirect to offsite payment gateway
            $response->redirect();
        } else {
            // payment failed: display message to customer
            echo $response->getMessage();
        }
    }

    /**
     * Home page
     */
    public function actionHome() {
        //$this->view->params['homeSlider'] = Page::getHomeSlider();
        return $this->render('home', [
                    'featuredProducts' => Product::getFeatured(3),
                    'bestSellerProducts' => Product::getBestSeller(3),
                    'homeBanner' => Page::getHomeBanner(),
                    'latestArticles' => Article::getLatest(4)
        ]);
    }

    /**
     * Renders pages like about, privacy, ...etc
     * @param string $slug
     */
    public function actionPage($slug) {
        $oPage = Page::findOne(['slug' => $slug]);
        if (!$oPage)
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        try {
            return $this->render($slug, ['oPage' => $oPage]);
        } catch (yii\base\InvalidParamException $exc) {
            return $this->render('page', ['oPage' => $oPage]);
        }
    }

    /**
     * Contact us page
     */
    public function actionContactUs() {
        $oContactForm = new ContactForm();
        if ($oContactForm->load(Yii::$app->request->post()) && $oContactForm->validate()) {
            if ($oContactForm->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Thank you for contacting us. We will respond to you as soon as possible.'));
            } else {
                Yii::$app->session->setFlash('error', Yii::t('app', 'There was an error sending email.'));
            }

            return $this->refresh();
        } else {
            return $this->render('contact-us', [
                        'oContactForm' => $oContactForm,
                        'oPage' => Page::findOne(['slug' => 'contact-us'])
            ]);
        }
    }

}
