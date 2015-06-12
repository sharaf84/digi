<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\captcha\Captcha;
	$this->title = 'Contact';
	$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<div id="checkpoint-a" class="single-page contact-us-page row">
	
	<div class="page-title large-12 medium-12 small-12 columns">
		<h2>Contact Us</h2>
	</div>
	
	<div class="row">
		<div class="large-6 medium-6 small-12 columns company-meta">
			<p>
				<strong>Address:</strong>
				15 AlFustat Street, 2nd Settelment, Fustat City, Masr Al Qadeema, Cairo, Egypt.
			</p>
			<p>
				<strong>Telephone:</strong>
				02-27429783 - 02-27429783, 19402
			</p>
			<p>
				<strong>Fax:</strong>
				02-27424323
			</p>
		</div>
		<div class="large-6 medium-6 small-12 columns">
			<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
				<?= $form->field($model, 'name')->textInput(['placeholder' => 'Your Name'])->label(false) ?>
				<?= $form->field($model, 'email')->textInput(['placeholder' => 'Email Address'])->label(false) ?>
				<?= $form->field($model, 'subject')->textInput(['placeholder' => 'Subject'])->label(false) ?>
				<?= $form->field($model, 'body')->textArea(['rows' => 6, 'placeholder' => 'Message'])->label(false) ?>
				<?= Html::submitButton('Submit', ['class' => 'right', 'name' => 'contact-button']) ?>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="page-title large-12 medium-12 small-12 columns">
			<h2>Store Locator</h2>
		</div>
	</div>
	
	
</div>

<div class="contact-us-map-cont">
	<div id="contact-us-map"></div>
</div>
