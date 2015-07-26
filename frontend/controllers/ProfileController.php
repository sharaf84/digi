<?php

namespace frontend\controllers;

use Yii;

/**
 * Profile controller
 */
class ProfileController extends \frontend\components\BaseController {

    public $defaultAction = 'view';

    public function actionView() {
        return $this->render('view');
    }

    public function actionEdit() {
        $oProfile = $this->oAuthUser->profile;

        if ($oProfile->load(Yii::$app->request->post()) && $oProfile->save()) {
//            if (Yii::$app->request->isAjax) {
//                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//                return \yii\widgets\ActiveForm::validate($oProfile);
//            }
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Profile updated successfully'));
            return $this->redirect(['/profile']);
        } else {
            Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Error, please try again.'));
            return $this->render('edit', ['oProfile' => $oProfile]);
        }
    }

}
