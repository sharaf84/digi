<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>

<?php
$form = ActiveForm::begin([
            'id' => 'loginForm',
            'action' => Url::to(['/login']),
                'options' => [ 'data-abide' => true ],
        ]);
?>
<?= Html::activeTextInput($oLoginForm, 'username', ['placeholder' => Yii::t('app', 'Email')]); ?>
<?= Html::error($oLoginForm, 'username', ['tag' => 'small', 'class' => 'error']); ?>
<?= Html::activePasswordInput($oLoginForm, 'password', ['placeholder' => Yii::t('app', 'Password')]); ?>
<?= Html::error($oLoginForm, 'password', ['tag' => 'small', 'class' => 'error']); ?>
<?= Html::activeCheckbox($oLoginForm, 'rememberMe', ['label' => Yii::t('app', 'Remember Password?')]); ?>
<a href="<?= Url::to(['/user/request-password-reset']) ?>">Forget Your Password?</a>
<button type="submit"><?= Yii::t('app', 'Sign In') ?></button>
<div class="or-sep"><span><?= Yii::t('app', 'Or') ?></span></div>

<div id="facebookLogin" style="display: none">
    <?php echo yii\authclient\widgets\AuthChoice::widget(['baseAuthUrl' => ['user/auth']]) ?>
</div>
<a href="#" class="facebook-login">
    <i class="fa fa-facebook"></i> <?= Yii::t('app', 'Sign in with Facebook') ?>
</a>
<?php ActiveForm::end(); ?>
