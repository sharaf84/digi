<?php

use yii\helpers\Url; ?>
<footer>
    <div class="row">
        <div class="footer-slider swiper-container">
            <div class="swiper-wrapper">
                <?php foreach (\common\models\custom\Brand::getFooterSlider() as $oBrand) { ?>
                    <div style="background: url(<?= $oBrand->getFeaturedImgUrl() ?>) center center no-repeat;" class="large-2 medium-2 small-12 columns footer-slider-img swiper-slide"></div>
                <?php } ?>
            </div>
        </div>
        <div class="prev-nav"><i class="md md-chevron-left"></i></div>
        <div class="next-nav"><i class="md md-chevron-right"></i></div>
    </div>
    <div class="footer-newsletter">
        <div class="row">
            <div class="large-1 medium-1 small-1 column hide-for-small"><i class="md md-email envelope"></i></div>
            <div class="large-5 medium-5 small-12 column">
                <h3><?= Yii::t('app', 'Get the latest sales and new product announcements right to your inbox') ?></h3>
            </div>
            <div class="large-6 medium-6 small-12 column">
                <form action="/" class="newsletter-form-js" data-abide="ajax"><i onclick="TSS.newsletter();" class="md md-chevron-right"></i>
                    <input type="email" required placeholder="Email address"><span class="error"><?= Yii::t('app', 'Sorry, wrong email') ?></span>
                </form>
            </div>
        </div>
    </div>
    <div class="social-links">
        <div class="row">
            <div class="large-3 medium-3 small-3 columns"><a href="#"><i class="fa fa-facebook"></i></a></div>
            <div class="large-3 medium-3 small-3 columns"><a href="#"><i class="fa fa-twitter"></i></a></div>
            <div class="large-3 medium-3 small-3 columns"><a href="#"><i class="fa fa-instagram"></i></a></div>
            <div class="large-3 medium-3 small-3 columns"><a href="#"><i class="fa fa-pinterest-p"></i></a></div>
        </div>
    </div>
    <div class="footer-copy row">
        <hr>
        <div class="large-6 medium-6 small-12 columns<?php echo Yii::$app->language == 'ar' ? ' left' : '' ?>">
            <p><?= Yii::t('app', '&copy; 2015 Digitree, All Rights Reserved') ?></p>
        </div>
        <div class="large-6 medium-6 small-12 columns<?php echo Yii::$app->language == 'ar' ? ' right' : '' ?>">
            <p class="footer-links">
                <a href="<?= Url::to(['/site/page', 'slug' => 'about-us']) ?>"><?= Yii::t('app', 'About Us') ?></a> - 
                <a href="<?= Url::to(['/site/contact-us']) ?>"><?= Yii::t('app', 'Contact Us') ?></a> - 
                <a href="<?= Url::to(['/site/page', 'slug' => 'terms-of-service']) ?>"><?= Yii::t('app', 'Terms Of Service') ?></a> - 
                <a href="<?= Url::to(['/site/page', 'slug' => 'privacy-policy']) ?>"><?= Yii::t('app', 'Privacy Policy') ?></a>
            </p>
        </div>
    </div>
</footer>
