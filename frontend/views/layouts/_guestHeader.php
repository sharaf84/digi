<?php

use yii\helpers\Url;
?>

<div class="large-2 columns show-for-large-up">
    <div class="user-avatar login-cont">
        <span class="login-btn" data-drop-down="#login-dropdown"><i class="md md-lock"></i> <?= Yii::t('app', 'Login') ?></span>
        <div class="login-dropdown drop-down" id="login-dropdown">
            <div class="login-dropdownSpace"></div>
            <div class="login-dropdownBox">
                <span class="arrow-up"></span>
                <a href="<?= Url::to(['/signup']) ?>" class="signup-btn"><?= Yii::t('app', 'Sign Up') ?></a>
                <?php echo $this->render('/user/_loginForm', array('oLoginForm' => new \common\models\base\form\Login())); ?>
            </div>
        </div>
    </div>
<!--    <div class="lang-switcher" data-route="<?= Yii::$app->params['mlConfig']['subdomains'][Yii::$app->language == 'en' ? 'ar' : 'en'] . Url::to('') ?>">
        <div class="language-switcher"><?= Yii::t('app', 'AR') ?></div>
    </div>-->
</div>

