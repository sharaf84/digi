<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<?php
ActiveForm::begin([
    'id' => 'loginForm',
    'action' => Url::to(['/login']),
    'options' => ['data-abide' => true],
]);
?>

<?= Html::activeTextInput($oLoginForm, 'username', ['placeholder' => Yii::t('app', 'Email'), 'required' => true]); ?>
<span class="error"><?= Yii::t('app', 'Email required') ?></span>
<?= Html::activePasswordInput($oLoginForm, 'password', ['placeholder' => Yii::t('app', 'Password'), 'required' => true]); ?>
<span class="error"><?= Yii::t('app', 'Password required') ?></span>
<?= Html::activeCheckbox($oLoginForm, 'rememberMe', ['label' => Yii::t('app', 'Remember Password?')]); ?>
<a href="<?= Url::to(['/user/request-password-reset']) ?>"><?= Yii::t('app', 'Forgot Your Password?') ?></a>
<button type="submit"><?= Yii::t('app', 'Sign In') ?></button>
<div class="or-sep"><span><?= Yii::t('app', 'Or') ?></span></div>
<div id="facebookLogin" style="display: none">
    <?php echo yii\authclient\widgets\AuthChoice::widget(['baseAuthUrl' => ['user/auth']]) ?>
</div>
<a href="#" class="facebook-login">
    <i class="fa fa-facebook"></i> <?= Yii::t('app', 'Sign in with Facebook') ?>
</a>

<?php ActiveForm::end(); ?>
