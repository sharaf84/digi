<?php

/**
 * @todo Enhancements
 */
use yii\helpers\Url;

$isHome = Yii::$app->controller->action->id == 'home';
?>
<header class="<?php echo $isHome ? 'home-page' : 'staticHeader single-header'; ?>">
    <!--.header-top-bar(data-magellan-expedition='fixed')-->
    <div class="headerContainer" >
        <div class="row headerBox">
            <div class="large-2 medium-5 small-5 columns"><i class="md md-more-vert hide-for-large-up <?php echo Yii::$app->language == 'ar' ? 'right' : 'left'; ?> <?php echo Yii::$app->language == 'ar' ? 'right' : 'left'; ?>-off-canvas-toggle"></i><a href="/" class="logo"><img src="<?= Url::to('@frontThemeUrl') ?>/images/src/logo.png" alt="<?= Yii::t('app', 'TSS') ?>" /></a></div>
            <div class="large-5 columns show-for-large-up">
                <nav class="main-nav">
                    <ul>
                        <li><a href="<?= Url::home() ?>" class="<?= $isHome ? 'active' : '' ?>"><?= Yii::t('app', 'Home') ?></a></li>
                        <li><span class="<?= (Yii::$app->controller->id == 'store' ) ? 'active' : '' ?>"  data-drop-down="#store-dropdown"><?= Yii::t('app', 'Store') ?></span></li>
                        <li><span class="<?= (Yii::$app->controller->id == 'articles' ) ? 'active' : '' ?>" data-drop-down="#articles-dropdown"><?= Yii::t('app', 'Articles') ?></span></li>
                    </ul>
                </nav>
            </div>
            
            <?= $this->render('_headerSearchForm') ?>
            
            <?= Yii::$app->user->isGuest ? $this->render('_guestHeader') : $this->render('_memberHeader') ?>
            
            <?= $this->render('_articlesDropdown') ?>
            
            <?php include_once '_storeDropdown.php' ; // it has vars used at aside ?>
            
        </div>
    </div>
    <?= $isHome ? $this->render('_homeSlider') : '' ?>
	<div id="mobile-login-form" class="hide">
		<div class="smallLoginFormBox">
			<!-- <a href="<?= Url::to(['/signup']) ?>" class="signup-btn"><?= Yii::t('app', 'Sign Up') ?></a> -->
			<?php echo $this->render('/user/_mobileLoginForm', array('oLoginForm' => new \common\models\base\form\Login())); ?>
		</div>
	</div>
</header>
