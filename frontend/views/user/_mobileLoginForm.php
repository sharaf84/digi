<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>

<?php
$form = ActiveForm::begin([
            'id' => 'mobileLoginForm',
            'action' => Url::to(['/login']),
            'options' => [],
        ]);
?>
<div class="row">
	<div class="large-12 medium-12 small-12 columns">
		<span class="closeSmallLoginForm"></span>
	</div>
</div>
<div class="row">
	<div class="large-12 medium-12 small-12 columns">
		<?= Html::activeTextInput($oLoginForm, 'username', ['placeholder' => Yii::t('app', 'Email')]); ?>
		<?= Html::error($oLoginForm, 'username', ['tag' => 'small', 'class' => 'error']); ?>
	</div>
</div>
<div class="row">
	<div class="large-12 medium-12 small-12 columns">
		<?= Html::activePasswordInput($oLoginForm, 'password', ['placeholder' => Yii::t('app', 'Password')]); ?>
		<?= Html::error($oLoginForm, 'password', ['tag' => 'small', 'class' => 'error']); ?>
	</div>
</div>
<div class="row">
	<div class="large-6 medium-6 small-12 columns">
		<?= Html::activeCheckbox($oLoginForm, 'rememberMe', ['label' => Yii::t('app', 'Remember Password?')]); ?>
	</div>
	<div class="large-6 medium-6 small-12 columns">
		<a href="<?= Url::to(['/user/request-password-reset']) ?>"><?= Yii::t('app', 'Forgot Your Password?') ?></a>
	</div>
</div>
<div class="row">
	<div class="large-12 medium-12 small-12 columns">
		<button type="submit"><?= Yii::t('app', 'Sign In') ?></button>
	</div>
	<div class="large-12 medium-12 small-12 columns">
		<div class="or-sep"><span><?= Yii::t('app', 'Or') ?></span></div>
	</div>
	<div class="large-12 medium-12 small-12 columns">
		<div id="facebookLogin" style="display: none">
			<?php echo yii\authclient\widgets\AuthChoice::widget(['baseAuthUrl' => ['user/auth']]) ?>
		</div>
		<a href="#" class="facebook-login">
			<i class="fa fa-facebook"></i> <?= Yii::t('app', 'Sign in with Facebook mobile') ?>
		</a>
	</div>
</div>
<?php ActiveForm::end(); ?>
