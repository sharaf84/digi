<?php

use yii\helpers\Url;
?>

<div class="large-2 columns show-for-large-up">
    <div class="shopping-cart">
        <span><?= Yii::$app->user->identity->totalCartCount ? Yii::$app->user->identity->totalCartCount : 0 ?></span>
        <a href="<?= Url::to(['/cart']) ?>">
            <i class="icon-cart"></i>
        </a>
    </div>
    <div class="user-avatar usermenu-cont">
        <img src="<?= Yii::$app->user->identity->getFeaturedImgUrl('default_avatar') ?>" alt="<?= Yii::$app->user->identity->getName() ?>" data-drop-down="#usermenu-dropdown">
        <div class="usermenu-dropdown drop-down" id="usermenu-dropdown">
            <div class="usermenu-dropdownSpace"></div>
            <div class="usermenu-dropdownBox">
                <span class="arrow-up"></span>
                <img src="<?= Yii::$app->user->identity->getFeaturedImgUrl('default_avatar') ?>" alt="<?= Yii::$app->user->identity->getName() ?>" class="menu-avatar">
                <h3><a href="<?= Url::to(['/profile']) ?>"><?= Yii::$app->user->identity->getName() ?></a></h3>
                <div class="user-buttons-cont">
                    <div class="large-6 medium-6 small-12 columns view-profile-cont">
                        <a href="<?= Url::to(['/profile']) ?>"><button><?= Yii::t('app', 'View Profile') ?></button></a>
                    </div>
                    <div class="large-6 medium-6 small-12 columns logout-cont">
                        <a href="<?= Url::to(['/user/logout']) ?>" data-method="post"><button><?= Yii::t('app', 'Logout') ?></button></a>
                    </div>
                </div>
                <div class="row"></div>
            </div>
        </div>
    </div>
    <div class="lang-switcher" data-route="<?= Yii::$app->params['mlConfig']['subdomains'][Yii::$app->language == 'en' ? 'ar' : 'en'] . Url::current() ?>">
        <div class="language-switcher"><?= Yii::t('app', 'AR') ?></div>
    </div>
</div>

