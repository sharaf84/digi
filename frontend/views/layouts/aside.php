<?php use yii\helpers\Url; ?>

<aside class="<?php echo APP_LANG == 'ar' ? 'right' : 'left'; ?>-off-canvas-menu">
	
	<div class="row">
		<?php if(! Yii::$app->user->isGuest ): ?>
		<div class="mobile-user-avatar small-12 columns">
			<img src="http://lorempixel.com/100/100/people" alt="">
		</div>
		<div class="mobile-user-name small-12 columns">
			<h3>Islam Magdy</h3>
		</div>
		<?php else: ?>
		<div class="mobile-user-avatar small-12 columns">
			<i class="md md-person"></i>
		</div>
		<div class="mobile-user-name small-12 columns">
			<h4><a href="#"><i class="md md-lock-outline"></i> <span>Login</span></a> or <a href="#"><span>Register</span></a> </h4>
		</div>
		<?php endif; ?>
	</div>
	
	
    <ul class="off-canvas-list">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="has-submenu">
            <a href="#"><i class="md md-account-balance-wallet"></i> Store</a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Back</a></li>
                <?php include_once 'store-menu.php'; ?>
                <li class="has-submenu">
                    <a href="#">Brands</a>
                    <ul class="left-submenu">
                        <li class="back"><a href="#">Back</a></li>
                        <li><a href="#">BlenderBottle&trade;</a></li>
                        <li><a href="#">BPI</a></li>
                        <li><a href="#">FA Nutrition</a></li>
                        <li><a href="#">Grenade</a></li>
                        <li><a href="#">BlenderBottle&trade;</a></li>
                        <li><a href="#">BPI</a></li>
                        <li><a href="#">FA Nutrition</a></li>
                        <li><a href="#">Grenade</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#"><i class="md md-message"></i> Articles</a></li>
        <li class="mobile-menu-shopping-cart"><a href="#"><i class="fa fa-shopping-cart"></i> View Cart <span>9</span></a></li>
        <li><a href="#"><i class="md md-phone"></i> Contact Us</a></li>
        <li><a href="#"><i class="md md-help"></i> About Us</a></li>
        <li><a href="#"><i class="fa fa-language"></i> Language</a></li>
        <li><a href="#"><i class="fa fa-file-text-o"></i> Terms of Service</a></li>
        <li class="mobile-menu-social-icons">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <div class="clearfix"></div>
			<form action="/" data-abide="ajax" class="newsletter-form-js"><i onclick="TSS.newsletter();" class="md md-chevron-right"></i>
				<input type="email" required="" placeholder="Email address"><span class="error">Sorry, wrong email</span>
			</form>
        </li>
    </ul>
</aside>
