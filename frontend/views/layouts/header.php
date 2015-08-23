<?php

/**
 * @todo Enhancements
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$isHome = Yii::$app->controller->action->id == 'home';
?>
<header class="<?php echo $isHome ? 'home-page' : 'staticHeader single-header'; ?>">
	<!--.header-top-bar(data-magellan-expedition='fixed')-->
	<div class="headerContainer" >
		<div class="row headerBox">
            <div class="small-1 medium-1 columns hide-for-large-up"><i class="md md-more-vert <?php echo Yii::$app->language == 'ar' ? 'right' : 'left'; ?>-off-canvas-toggle"></i></div>
            <div class="large-2 medium-4 small-4 columns"><a href="/" class="logo"><!-- <?= Yii::t('app', 'TSS') ?> --></a></div>
            <div class="large-5 columns show-for-large-up">
                <nav class="main-nav">
                    <ul>
                        <li><a href="<?= Url::home() ?>" class="<?= $isHome ? 'active' : '' ?>"><?= Yii::t('app', 'Home') ?></a></li>
                        <li><span class="<?= (Yii::$app->controller->id == 'store' ) ? 'active' : '' ?>"  data-drop-down="#store-dropdown"><?= Yii::t('app', 'Store') ?></span></li>
                        <li><span class="<?= (Yii::$app->controller->id == 'articles' ) ? 'active' : '' ?>" data-drop-down="#articles-dropdown"><?= Yii::t('app', 'Articles') ?></span></li>
                    </ul>
                </nav>
            </div>
            <div class="large-3 medium-7 small-7 columns header-search-cont">
                <form action="<?= Url::to(['/store/search']) ?>">
                    <i class="md md-search" onclick="if ($(this).next('input').val())
                                $(this).parent('form').submit();"></i>
                    <input type="search" name="SearchForm[key]" placeholder="<?= Yii::t('app', 'Search') ?>" value="<?= isset($this->params['searchKey']) ? Html::encode($this->params['searchKey']) : '' ?>">
                </form>
            </div>

            <?php if (!Yii::$app->user->isGuest) { ?>
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
            <?php } else { ?>
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
                    <div class="lang-switcher" data-route="<?= Yii::$app->params['mlConfig']['subdomains'][Yii::$app->language == 'en' ? 'ar' : 'en'] . Url::to('') ?>">
                        <div class="language-switcher"><?= Yii::t('app', 'AR') ?></div>
                    </div>
                </div>
            <?php } ?>

            <div id="articles-dropdown" class="drop-down">
                <div class="row">
                    <div class="large-12 medium-12 small-12 columns articles-cont">
                        <?php foreach (common\models\custom\Article::getLatest(5) as $oArticle) { ?>
                            <div class="large-2 medium-2 small-2 columns dropdown-product-item" data-route="<?= $oArticle->getInnerUrl() ?>">
                                <div class="large-12 medium-12 small-12 columns dropdown-product-item--img">
                                    <img src="<?= $oArticle->getFeaturedImgUrl('dropdown-article') ?>" alt="<?= Html::encode($oArticle->title) ?>">
                                </div>
                                <div class="large-12 medium-12 small-12 columns dropdown-product-item--desc">
                                    <h3><?= Html::encode($oArticle->title) ?></h3>
                                    <p><?= Html::encode($oArticle->brief) ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        
                        <div class="large-2 medium-2 small-2 columns dropdown-product-item" data-route="<?= Url::to(['/articles']) ?>">
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/addMore.png" alt="<?= Yii::t('app', 'More ...') ?>">
                            </div>
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--desc">
                                <h3><?= Yii::t('app', 'More ...') ?></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="store-dropdown" class="drop-down">
                <div class="row">
                    <div class="large-3 medium-3 small-3 columns tabs-cont">
                        <ul data-tab>
                            <?php //include 'store-menu.php'; ?>
                            <?php
                            $categories = common\models\custom\Category::getHeaderDropdown();
                            foreach ($categories as $oCategory) {
                                ?>
                                <li>
                                    <a data-category-uri="<?= $oCategory->getInnerUrl() ?>" href="#header-tabs--<?= $oCategory->slug ?>" class="active"><?= Html::encode($oCategory->name) ?></a>
                                </li>  
                            <?php } ?>
                            <li><a data-category-uri="#" href="#header-tabs--brands"><?= Yii::t('app', 'Brands') ?></a></li>
                        </ul>
                    </div>
                    <?php foreach ($categories as $oCategory) { ?>
                        <div class="large-9 medium-9 small-9 columns content <?= isset($notActive) ? '' : 'active';
                    $notActive = true;
                        ?> products-cont" id="header-tabs--<?= $oCategory->slug ?>">
    <?php foreach ($oCategory->getLatestProducts(6) as $oProduct) { ?>
                                <div class="large-4 medium-4 small-4 columns dropdown-product-item">
                                    <div class="large-5 medium-5 small-5 columns dropdown-product-item--img">
                                        <img src="<?= $oProduct->getFeaturedImgUrl('dropdown-product') ?>" alt="">                                    
                                    </div>
                                    <div class="large-7 medium-7 small-7 columns dropdown-product-item--desc">
                                        <h3><?= Html::encode($oProduct->title) ?></h3>
                                        <p><?= Html::encode($oProduct->brief) ?></p>
                                        <a href="<?= $oProduct->getInnerUrl() ?>" class="more-on-this-product"><?= Yii::t('app', 'Find out more') ?> <i class="md md-chevron-right"></i></a>
                                    </div>
                                </div>
                        <?php } ?>
                        </div>
<?php } ?>

                    <div class="large-9 medium-9 small-9 columns content products-cont" id="header-tabs--brands">
                        <div class="brands-cont">
                            <div class="large-4 medium-4 small-4 columns">
                                <ul class="brand-list">
                                    <?php
                                    $index = 0;
                                    foreach (common\models\custom\Brand::getHeaderDropdown() as $oBrand) {
                                        ?>
                                        <li><a href="<?= $oBrand->getInnerUrl() ?>"><?= Html::encode($oBrand->name) ?></a></li>
                                        <?php if (++$index % 4 == 0) { ?>
                                        </ul></div><div class="large-4 medium-4 small-4 columns"><ul class="brand-list">
                                        <?php } ?>
<?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php if ($isHome) { ?>
	<div id="checkpoint-a" class="header-slider swiper-container">
		<div class="swiper-wrapper">
<?php foreach (\common\models\custom\Page::getHomeSlider()->media as $oMedia) { ?>
				<div class="header-product swiper-slide" data-route="<?= $oMedia->link ?>">
					<img src="<?= $oMedia->getImgUrl('home-slider') ?>" alt="">
					<!--
					<h2><?= $oMedia->title ?></h2>
					<p><?= $oMedia->description ?></p>
					-->
				</div>
<?php } ?>
		</div>
		<div class="swiper-pagination"></div>
	</div>
<?php } ?>
</header>
