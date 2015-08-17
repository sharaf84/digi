<?php use yii\helpers\Url; ?>

<aside class="<?php echo Yii::$app->language == 'ar' ? 'right' : 'left'; ?>-off-canvas-menu">
	
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
			<h4><a href="#" class="open-login-js"><i class="md md-lock-outline"></i> <span>Login</span></a> or <a href="#" class="open-signup-js"><span>Register</span></a> </h4>
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



<div id="mobile-login-form" class="hide">
	<a href="/register" class="signup-btn">Sign Up</a>
	<form action="/login" method="post">
		<input type="email" placeholder="Email address..." name="userEmail">
		<input type="password" placeholder="Password" name="password">
		<label>
			<input type="checkbox">
			Remember Password?
		</label>
		<button type="submit">Sign In</button>
		<div class="or-sep"><span>Or</span></div>
		<a href="#" class="facebook-login">
			<i class="fa fa-facebook"></i> Sign in with Facebook
		</a>
	</form>
</div>


<div id="mobile-signup-form" class="hide">
	<a href="/register" class="signup-btn">Sign In</a>
	<form action="/register" class="row" data-abide>

		<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
			<label>Full Name
				<input type="text" required pattern="[a-zA-Z]+">
			</label>
			<small class="error">Name is required and must be a string.</small>
		</div>

		<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
			<label>Password
				<input type="password" required>
			</label>
			<small class="error">Password is required.</small>
		</div>
		
		<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
			<label>Re-type Password
				<input type="password" required>
			</label>
			<small class="error">Password confirmation is required.</small>
		</div>
		
		<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
			<label>Email
				<input type="email" required>
			</label>
			<small class="error">An email address is required.</small>
		</div>
		
		<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
			<label>Mobile Number
				<input type="text" required pattern="number">
			</label>
			<small class="error">Mobile Number is required.</small>
		</div>
		
		<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
			<label>City
				<div class="select-component"><i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
					<select id="price-filter" required>
						<option value="">Select your city</option>
						<option value="1">Cairo</option>
						<option value="2">Alex</option>
						<option value="3">...</option>
						<option value="4">... </option>
						<option value="5">... </option>
						<option value="6">... </option>
						<option value="7">... </option>
					</select>
				</div>
			</label>
			<small class="error">City is required.</small>
		</div>
		
		<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
			<label>Address
				<input type="text" required>
			</label>
			<small class="error">Address is required.</small>
		</div>
		
		<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
			<button type="submit">Sign In</button>
			<div class="or-sep"><span>Or</span></div>
			<a href="#" class="facebook-login">
				<i class="fa fa-facebook"></i> Sign in with Facebook
			</a>
		</div>

		
	</form>
</div>