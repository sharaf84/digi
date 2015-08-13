<?php

namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * Profile controller
 */
class ProfileController extends \frontend\components\BaseController {

    public $defaultAction = 'view';

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
                    ]
                ],
            ],
        ];
    }

    public function actionView() {
        
        if(!$this->oAuthUser->profile) 
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        return $this->render('view', [
            'oProfile' => $this->oAuthUser->profile,
            'activeOrders' => $this->oAuthUser->getActiveOrders()->with('cartItems')->all()
        ]);
    }

    public function actionEdit() {
        $oProfile = $this->oAuthUser->profile;
        
        if(!$oProfile) 
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        
        if ($oProfile->load(Yii::$app->request->post()) && $oProfile->save()) {
//            if (Yii::$app->request->isAjax) {
//                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//                return \yii\widgets\ActiveForm::validate($oProfile);
//            }
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Profile updated successfully'));
            return $this->redirect(['/profile']);
        } 
        return $this->render('edit', ['oProfile' => $oProfile]);
    }

}
