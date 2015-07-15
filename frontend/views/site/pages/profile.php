<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	$this->title = 'Profile';
	$this->params['breadcrumbs'][] = $this->title;
?>

<div id="checkpoint-a" class="single-page profile-page row">

	<div class="page-title large-12 medium-12 small-12 columns">
		<h2>Member Profile</h2>
	</div>

	<div class="row">
		<div class="large-3 medium-3 small-12 columns">
			<img src="http://lorempixel.com/257/257/people" alt="">
		</div>
		<div class="large-9 medium-9 small-12 columns user-info">

			<a data-tooltip aria-haspopup="true" href="/profile/edit" title="Edit Your Profile" class="edit-profile"> <i class="md md-edit"></i> </a>

			<h3>Islam Magdy</h3>
			<p>
				<strong>Mobile:</strong> 01148956422 <br />
				<strong>Address:</strong> Cairo, Egypt <br />
				<strong>Email:</strong> i.magdy.m@gmail.com <br />
			</p>
		</div>
	</div>

	<div class="row">
		<div class="profile-section">
			<div class="section-header">
				<h3><span>Biography</span></h3>
			</div>
			<div class="section-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem minima iure reiciendis quis impedit inventore consequatur ipsam qui, ea pariatur, dolorum illo ut, modi, quos. Tempore excepturi tempora ut minima.</p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="profile-section">
			<div class="section-header">
				<h3><span>Activity</span></h3>
			</div>
			<div class="section-body">
				<div class="activity-item">
					<i class="md md-message"></i>
					You commented on Bigger Arm in 24 hours
				</div>
				<div class="activity-item">
					<i class="md md-message"></i>
					You commented on Bigger Arm in 24 hours
				</div>
				<div class="activity-item">
					<i class="md md-message"></i>
					You commented on Bigger Arm in 24 hours
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="profile-section order-history">

			<div class="as-table">
				<div class="row">
					<div class="large-12 medium-12 small-12 columns as-caption">
						Order History
					</div>
				</div>
				<div class="row as-table-head hide-for-small">
					<div class="large-4 medium-4 small-4 columns as-table-head-cell">
						Product
					</div>
					<div class="large-2 medium-2 small-2 columns as-table-head-cell">
						Status
					</div>
					<div class="large-2 medium-2 small-2 columns as-table-head-cell">
						Price
					</div>
					<div class="large-2 medium-2 small-2 columns as-table-head-cell">
						Quantity
					</div>
					<div class="large-2 medium-2 small-2 columns as-table-head-cell">
						Total
					</div>
				</div>

				<!-- Product Item -->
				<div class="row as-table-row">
					<div class="large-4 medium-4 small-12 columns as-table-cell">
						<div class="row">
							<div class="large-3 medium-3 small-4 small-centered columns product-image-cont">
								<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/NITRO-TECH.png" alt="">
							</div>
							<div class="large-9 medium-9 small-12 columns product-info-cont small-only-text-center">
								<h4>Casin-Peak ihner armor</h4>
								<p><strong>Flavour:</strong> chocolate - <strong>Size:</strong> 150g</p>
							</div>
						</div>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span class="pending">Pending</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>199 LE</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>2</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>398 LE</span>
					</div>
				</div>
				<!-- [/] Product Item -->

				<!-- Product Item -->
				<div class="row as-table-row">
					<div class="large-4 medium-4 small-12 columns as-table-cell">
						<div class="row">
							<div class="large-3 medium-3 small-4 small-centered columns product-image-cont">
								<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/NITRO-TECH.png" alt="">
							</div>
							<div class="large-9 medium-9 small-12 columns product-info-cont small-only-text-center">
								<h4>Casin-Peak ihner armor</h4>
								<p><strong>Flavour:</strong> chocolate - <strong>Size:</strong> 150g</p>
							</div>
						</div>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span class="pending">Pending</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>199 LE</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>2</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>398 LE</span>
					</div>
				</div>
				<!-- [/] Product Item -->

				<!-- Product Item -->
				<div class="row as-table-row">
					<div class="large-4 medium-4 small-12 columns as-table-cell">
						<div class="row">
							<div class="large-3 medium-3 small-4 small-centered columns product-image-cont">
								<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/NITRO-TECH.png" alt="">
							</div>
							<div class="large-9 medium-9 small-12 columns product-info-cont small-only-text-center">
								<h4>Casin-Peak ihner armor</h4>
								<p><strong>Flavour:</strong> chocolate - <strong>Size:</strong> 150g</p>
							</div>
						</div>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span class="pending">Pending</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>199 LE</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>2</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>398 LE</span>
					</div>
				</div>
				<!-- [/] Product Item -->

				<!-- Product Item -->
				<div class="row as-table-row">
					<div class="large-4 medium-4 small-12 columns as-table-cell">
						<div class="row">
							<div class="large-3 medium-3 small-4 small-centered columns product-image-cont">
								<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/NITRO-TECH.png" alt="">
							</div>
							<div class="large-9 medium-9 small-12 columns product-info-cont small-only-text-center">
								<h4>Casin-Peak ihner armor</h4>
								<p><strong>Flavour:</strong> chocolate - <strong>Size:</strong> 150g</p>
							</div>
						</div>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span class="pending">Pending</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>199 LE</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>2</span>
					</div>
					<div class="large-2 medium-2 small-3 columns as-table-cell">
						<span>398 LE</span>
					</div>
				</div>
				<!-- [/] Product Item -->


			</div>
		</div>
	</div>


</div>
