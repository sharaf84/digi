<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	$this->title = 'Profile';
	$this->params['breadcrumbs'][] = $this->title;
        
?>
<div id="checkpoint-a" class="single-page blog-listing single-blog row">
	<div class="page-title large-12 medium-12 small-12 columns">
		<h2>Member Profile</h2>
	</div>
	
	<div class="row">
		<div class="large-3 medium-3 small-12 columns">
			<img src="http://lorempixel.com/257/257/people" alt="">
		</div>
		<div class="large-9 medium-9 small-12 columns">
			<h3>Islam Magdy</h3>
			<p>
				<strong>Mobile</strong> 01148956422 <br />
				<strong>Address</strong> Cairo, Egypt <br />
				<strong>Email</strong> i.magdy.m@gmail.com <br />
			</p>
		</div>
	</div>
	
	<div class="row">
		<div class="profile-section">
			<div class="section-header">
				<h3>Biography</h3>
			</div>
			<div class="section-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem minima iure reiciendis quis impedit inventore consequatur ipsam qui, ea pariatur, dolorum illo ut, modi, quos. Tempore excepturi tempora ut minima.</p>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="profile-section">
			<div class="section-header">
				<h3>Activity</h3>
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
			<table>
				<thead>
					<th>Product</th>
					<th>Status</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</thead>
				<tobody>
					<tr>
						<td>
							<div class="row">
								<div class="large-3 medium-3 small-12 columns">
									<img src="http://lorempixel.com/100/100/people" alt="">
								</div>
								<div class="large-9 medium-9 small-12 columns">
									<h4>Casin-Peak ihner armor</h4>
									<p><strong>Flavour:</strong> chocolate - <strong>Size:</strong> 150g</p>
								</div>
							</div>
						</td>
						<td class="pending">Pending</td>
						<td>199 LE</td>
						<td>2</td>
						<td>398 LE</td>
					</tr>
				</tobody>
			</table>
		</div>
	</div>

	
</div>
