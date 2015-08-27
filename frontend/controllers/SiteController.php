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

    /**
     * Subscribe to mailchimp 
     */
    public function actionSubscribe() {
        $email = Yii::$app->request->get('email');
        $oEmailValidator = new \yii\validators\EmailValidator();
        if ($email && $oEmailValidator->validate($email)) {
            try {
                $oMailchimp = new \sammaye\mailchimp\Mailchimp(['apikey' => Yii::$app->params['mailchimp']['apiKey']]);
                if ($oMailchimp->lists->subscribe(Yii::$app->params['mailchimp']['listId'], ['email' => $email]))
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Subscribed successfully, please check your email inbox to confirm.'));
            } catch (\Mailchimp_Error $exc) {
                Yii::$app->session->setFlash('error', $exc->getMessage());
            }
        } else {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Sorry, wrong email'));
        }

        return $this->goBack();
    }

}
