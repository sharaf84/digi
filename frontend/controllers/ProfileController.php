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
        if (!Yii::$app->user->identity->profile)
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        return $this->render('view', [
                    'oProfile' => Yii::$app->user->identity->profile,
                    'activeOrders' => Yii::$app->user->identity->getActiveOrders()->with('cartItems')->all(),
                    'activities' => Yii::$app->user->identity->getActivities(),
        ]);
    }

    public function actionEdit() {
        $oProfile = Yii::$app->user->identity->profile;

        if (!$oProfile)
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

    /**
     * uploads user avatar
     */
    public function actionUploadAvatar() {
        $oUserIdentity = clone Yii::$app->user->identity;
        $oMedia = $oUserIdentity->firstMedia ? $oUserIdentity->firstMedia : new \common\models\custom\Media();
        $oMedia->scenario = 'uploadAvatar';
        $oMedia->model = 'User';
        $oMedia->model_id = Yii::$app->user->id;
        $oMedia->uploadedFile = \yii\web\UploadedFile::getInstanceByName('avatar');
        if (\common\helpers\MediaHelper::fileUpload($oMedia)){
            echo json_encode(['imgUrl' => Yii::$app->user->identity->getFeaturedImgUrl('profile_avatar')]);
        }else 
            echo json_encode($oMedia->errors); 
        Yii::$app->end();
    }

}
