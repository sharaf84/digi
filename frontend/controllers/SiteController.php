<?php

namespace frontend\controllers;

use Yii;
use common\models\base\form\Login;
use common\models\base\User;
use frontend\models\RequestPasswordResetForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends \frontend\components\BaseController {

    public $defaultAction = 'home';

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
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

    public function actionLogin() {
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

    public function actionSignup() {
        $oSignupForm = new SignupForm();
        if ($oSignupForm->load(Yii::$app->request->post())) {
            if ($oUser = $oSignupForm->signup()) {
                if ($oSignupForm->sendEmail($oUser)) {
                    Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Check your email for further instructions.'));
                    return $this->goHome();
                } else {
                    Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Sorry, error sendin email.'));
                    $oUser->delete();
                }
            }
        }

        return $this->render('signup', [
                    'oSignupForm' => $oSignupForm,
        ]);
    }

    public function actionVerify($token) {

        $oUser = User::findByVerificationToken($token);

        if ($oUser && $oUser->verify()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Congratulations, your account verified successfully.'));
            Yii::$app->getUser()->login($oUser);
        } else
            throw new InvalidParamException(Yii::t('app', 'Wrong verification token.'));

        return $this->goHome();
    }

    public function actionRequestPasswordReset() {
        $oRequestPasswordResetForm = new RequestPasswordResetForm();
        if ($oRequestPasswordResetForm->load(Yii::$app->request->post()) && $oRequestPasswordResetForm->validate()) {
            if ($oRequestPasswordResetForm->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Check your email for further instructions.'));

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Sorry, we are unable to reset password for email provided.'));
            }
        }

        return $this->render('requestPasswordReset', [
                    'oRequestPasswordResetForm' => $oRequestPasswordResetForm,
        ]);
    }

    public function actionResetPassword($token) {
        try {
            $oResetPasswordForm = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($oResetPasswordForm->load(Yii::$app->request->post()) && $oResetPasswordForm->validate() && $oResetPasswordForm->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'oResetPasswordForm' => $oResetPasswordForm,
        ]);
    }

}
