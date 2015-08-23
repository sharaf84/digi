<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<aside class="<?php echo Yii::$app->language == 'ar' ? 'right' : 'left'; ?>-off-canvas-menu">

    <div class="row">
        <?php if (!Yii::$app->user->isGuest) { ?>
            <div class="mobile-user-avatar small-12 columns">
                <img src="<?= Yii::$app->user->identity->getFeaturedImgUrl('default_avatar') ?>" alt="<?= Yii::$app->user->identity->getName() ?>">
            </div>
            <div class="mobile-user-name small-12 columns">
                <h3><a href="<?= Url::to(['/profile']) ?>"><?= Yii::$app->user->identity->getName() ?></a></h3>
            </div>
        <?php } else { ?>
            <div class="mobile-user-avatar small-12 columns">
                <i class="md md-person"></i>
            </div>
            <div class="mobile-user-name small-12 columns">
                <h4><a href="#" class="open-login-js"><i class="md md-lock-outline"></i> <span><?= Yii::t('app', 'Login') ?></span></a> <?= Yii::t('app', 'or') ?> <a href="<?= Url::to(['/signup']) ?>" class="open-signup-js"><span><?= Yii::t('app', 'Register') ?></span></a> </h4>
            </div>
        <?php } ?>
    </div>


    <ul class="off-canvas-list">
        <li><a href="<?= Url::home() ?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home') ?></a></li>
        <li class="has-submenu">
            <a href="#"><i class="md md-account-balance-wallet"></i> <?= Yii::t('app', 'Store') ?></a>
            <ul class="left-submenu">
                <li class="back"><a href="#"><?= Yii::t('app', 'Back') ?></a></li>
                <?php
                $headerCategories = common\models\custom\Category::getHeaderDropdown();
                foreach ($headerCategories as $oCategory) {
                    ?>
                    <li>
                        <a href="<?= $oCategory->getInnerUrl() ?>" ><?= Html::encode($oCategory->name) ?></a>
                    </li>  
                <?php } ?>
                <li class="has-submenu">
                    <a href="#"><?= Yii::t('app', 'Brands') ?></a>
                    <ul class="left-submenu">
                        <li class="back"><a href="#">Back</a></li>
                        <?php
                        $headerBrands = common\models\custom\Brand::getHeaderDropdown();
                        foreach ($headerBrands as $oBrand) {
                            ?>
                            <li><a href="<?= $oBrand->getInnerUrl() ?>"><?= Html::encode($oBrand->name) ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="<?= Url::to(['/articles']) ?>"><i class="md md-message"></i> <?= Yii::t('app', 'Articles') ?></a></li>
        <?php if (!Yii::$app->user->isGuest) { ?>
            <li class="mobile-menu-shopping-cart"><a href="<?= Url::to(['/cart']) ?>"><i class="fa fa-shopping-cart"></i> <?= Yii::t('app', 'View Cart') ?> <span><?= Yii::$app->user->identity->totalCartCount ? Yii::$app->user->identity->totalCartCount : 0 ?></span></a></li>
        <?php } ?>
        <li><a href="<?= Yii::$app->params['mlConfig']['subdomains'][Yii::$app->language == 'en' ? 'ar' : 'en'] . Url::to('') ?>"><i class="fa fa-language"></i> <?= Yii::t('app', 'AR') ?></a></li>
        <li><a href="<?= Url::to(['/site/contact-us']) ?>"><i class="md md-phone"></i> <?= Yii::t('app', 'Contact Us') ?></a></li>
        <li><a href="<?= Url::to(['/site/page', 'slug' => 'about-us']) ?>"><i class="md md-help"></i> <?= Yii::t('app', 'About Us') ?></a></li>
        <li><a href="<?= Url::to(['/site/page', 'slug' => 'terms-of-service']) ?>"><i class="fa fa-file-text-o"></i> <?= Yii::t('app', 'Terms Of Service') ?></a></li>
        <li><a href="<?= Url::to(['/site/page', 'slug' => 'privacy-policy']) ?>"><i class="fa fa-file-text-o"></i> <?= Yii::t('app', 'Privacy Policy') ?></a></li>
    </ul>
</aside>



<div id="mobile-login-form" class="hide">
    <a href="<?= Url::to(['/signup']) ?>" class="signup-btn"><?= Yii::t('app', 'Sign Up') ?></a>
    <?php echo $this->render('/user/_loginForm', array('oLoginForm' => new \common\models\base\form\Login())); ?>
</div>
