<?php

namespace frontend\controllers;

use Yii;
use common\models\custom\Order;
use common\models\custom\Payment;
use yii\web\NotFoundHttpException;
use yii\web\GoneHttpException;

class PaymentController extends \frontend\components\BaseController {

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
//            'verbs' => [
//                'class' => \yii\filters\VerbFilter::className(),
//                'actions' => [
//                    'migs-purchase' => ['post'],
//                ],
//            ],
        ];
    }

    /**
     * 
     * @param string $token order $token
     * @throws NotFoundHttpException
     */
    public function actionMigsPurchase($token) {

        $oOrder = Order::findToPayment($token);

        if (!$oOrder)
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

        $gateway = \Omnipay\Omnipay::create('Migs_ThreeParty');
        $gateway->setMerchantId(Yii::$app->params['MIGS']['merchantId']);
        $gateway->setMerchantAccessCode(Yii::$app->params['MIGS']['merchantAccessCode']);
        $gateway->setSecureHash(Yii::$app->params['MIGS']['secureHash']);

        $response = $gateway->purchase([
                    'amount' => $oOrder->amount,
                    'currency' => Yii::$app->params['MIGS']['currency'],
                    'transactionId' => $oOrder->token,
                    'description' => $oOrder->id,
                    'returnUrl' => \yii\helpers\Url::to(['/payment/migs-complete-purchase'], true),
                ])->send();

        Yii::$app->session['migsPurchaseRequest'] = $response->getRequest()->getParameters();

        if ($response->isRedirect()) {
            // redirect to offsite payment gateway
            $response->redirect();
        } else {
            // payment failed: display message to customer
            Yii::$app->getSession()->setFlash('error', Yii::t('app', $response->getMessage()));
            return $this->goHome();
        }
    }

    public function actionMigsCompletePurchase() {
        $gateway = \Omnipay\Omnipay::create('Migs_ThreeParty');
        $response = $gateway->completePurchase(Yii::$app->session['migsPurchaseRequest'])->send();
       
        if ($response->isSuccessful()) {
            // payment was successful: update database
            $oOrder = Order::findToPayment(Yii::$app->session['migsPurchaseRequest']['transactionId']);
            if (!$oOrder)
                throw new GoneHttpException(Yii::t('app', 'Sorry, your order not found!'));
            
            $oOrder->payment_method = Order::METHOD_MIGS;
            $oPayment = new Payment([
                'order_id' => $oOrder->id,
                //'status' => 0,
                'gateway' => $gateway->getShortName(),
                'transaction_reference' => $response->getTransactionReference(),
                'response' => json_encode($response->getData())
            ]);
            
            $oDBTransaction = Yii::$app->db->beginTransaction();
            if ($oOrder->paid() && $oPayment->save()) {
                $oDBTransaction->commit();
                \common\helpers\MailHelper::sendSuccessfulPaymentResponse($oOrder);
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Your order paid successfully.'));
            } else{
                $oDBTransaction->rollBack();
                Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Error, saving transaction no {number}', ['number' => $response->getTransactionReference()]));
            }
        } else {
            // payment failed: display message to customer
            Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Gateway response message ({msg}). You can try again from your orders history.', ['msg' => $response->getMessage()]));
        }
        return $this->redirect(['/profile']);
    }

}
