<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify', 'token' => $oUser->token]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($oUser->username) ?>,</p>

    <p>Follow the link below to verify your account:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
