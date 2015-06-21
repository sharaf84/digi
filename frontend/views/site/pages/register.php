<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	$this->title = 'Profile';
	$this->params['breadcrumbs'][] = $this->title;
?>

<div class="single-page register-page">
	<div id="checkpoint-a" class="row">
		<div class="page-title large-12 medium-12 small-12 columns">
			<h2>Sign Up</h2>
		</div>
	</div>

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

		<div class="large-5 medium-5 small-12 columns large-centered medium-centered">
			<button type="submit">Register</button>
		</div>
		
		<div class="large-5 medium-5 small-12 columns large-centered medium-centered text-center or-alternate-method">
			OR
		</div>
		
		<div class="large-5 medium-5 small-12 columns large-centered medium-centered">
			<div class="facebook-signup">
				<i class="fa fa-facebook"></i> Sign in with Facebook
			</div>
		</div>
		
	</form>
</div>