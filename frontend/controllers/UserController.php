<?php

namespace frontend\controllers;

use Yii;
use common\models\base\form\Login;
use common\models\base\User;
use frontend\models\RequestPasswordResetForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * User controller
 */
class UserController extends \frontend\components\BaseController {

    //public $defaultAction = 'home';

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
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'New password was saved.'));

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'oResetPasswordForm' => $oResetPasswordForm,
        ]);
    }

}
