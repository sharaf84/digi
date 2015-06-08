<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	$this->title = 'Products List';
	$this->params['breadcrumbs'][] = $this->title;
?>

<div id="checkpoint-a" class="single-page single-product row" data-product-main-image="<?= Url::to('@frontThemeUrl') ?>/images/src/Isolate-Zero-4lbs.png">
	
	<div class="product-header row">
		<div class="large-4 medium-4 small-12 columns product-image">
			<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Isolate-Zero-4lbs.png" alt="">
		</div>
		<div class="large-8 medium-8 small-12 columns">
			<h1>NITRO-TECH&trade;</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, non vitae a saepe iure, dolorum laboriosam. Impedit odio mollitia harum est a quam laborum! Sequi veniam qui inventore odio dolores.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, non vitae a saepe iure, dolorum laboriosam. Impedit odio mollitia harum est a quam laborum! Sequi veniam qui inventore odio dolores.</p>
			<p class="pricing">299 LE</p>
			<form action="./single-product" method="post" class="row" id="productForm">
				
				<!-- Product ID -->
				<input type="hidden" name="productId" value="1234567890">
				
				<div class="large-4 medium-4 small-12 columns select-component">
					<i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
					<select name="product-size">
						<option value="0">Choose Size</option>
						<option value="1">Size of 1 LBS</option>
						<option value="2">Size of 2 LBS</option>
						<option value="3">Size of 3 LBS</option>
						<option value="4">Size of 4 LBS</option>
					</select>
				</div>
				<div class="large-4 medium-4 small-12 columns select-component end">
					<i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
					<select name="product-size">
						<option value="0">Choose Flavor</option>
						<option value="1">Chocolate</option>
						<option value="2">Caramel</option>
						<option value="3">Vanilla</option>
						<option value="4">Green Apple</option>
					</select>
				</div>
			</form>
			<div class="row">
				<div class="large-8 medium-8 small-12 columns">
					<a href="#" class="shop-now" onclick="TSS.Form.ajaxSubmit('#productForm', '.single-product');"><i class="md md-shopping-cart"></i> Add To Cart</a>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="row">
		<div class="product-tabs">
			<ul data-tab class="tabs">
				<li class="tab-title active"><a href="#product-info">Product Info</a></li>
				<li class="tab-title"><a href="#nutrition-facts">Nutrition Facts</a></li>
			</ul>
			<div class="tabs-content">
				<div id="product-info" class="content row active">
					<h2>FORTIFY YOUR BODY FROM WITHIN</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<h3>FORTIFY YOUR BODY FROM WITHIN</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<h2>FORTIFY YOUR BODY FROM WITHIN</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<h3>FORTIFY YOUR BODY FROM WITHIN</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
				</div>
				<div id="nutrition-facts" class="content row">
					<h2>FORTIFY YOUR BODY FROM WITHIN</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<h3>FORTIFY YOUR BODY FROM WITHIN</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<h2>FORTIFY YOUR BODY FROM WITHIN</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<h3>FORTIFY YOUR BODY FROM WITHIN</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		
		<div class="page-title large-12 medium-12 small-12 columns">
			<h2>Related Products</h2>
		</div>
		
		<div class="large-3 medium-3 small-12 columns product-item">
			<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Platinum-Pure-Whey.png" alt="">
			<h4>Platinum&trade; -
				<span>Creatine</span>
			</h4>
			<p>Platinum is an ultra-premium leanla gainer engineered to deliver quality</p><a href="#" class="more-on-this-product">Find Out More<i class="md md-keyboard-arrow-right"></i></a>
		</div>
		<div class="large-3 medium-3 small-12 columns product-item">
			<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Platinum-Pure-Whey.png" alt="">
			<h4>Platinum&trade; -
				<span>Creatine</span>
			</h4>
			<p>Platinum is an ultra-premium leanla gainer engineered to deliver quality</p><a href="#" class="more-on-this-product">Find Out More<i class="md md-keyboard-arrow-right"></i></a>
		</div>
		<div class="large-3 medium-3 small-12 columns product-item">
			<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Platinum-Pure-Whey.png" alt="">
			<h4>Platinum&trade; -
				<span>Creatine</span>
			</h4>
			<p>Platinum is an ultra-premium leanla gainer engineered to deliver quality</p><a href="#" class="more-on-this-product">Find Out More<i class="md md-keyboard-arrow-right"></i></a>
		</div>
		<div class="large-3 medium-3 small-12 columns product-item">
			<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Platinum-Pure-Whey.png" alt="">
			<h4>Platinum&trade; -
				<span>Creatine</span>
			</h4>
			<p>Platinum is an ultra-premium leanla gainer engineered to deliver quality</p><a href="#" class="more-on-this-product">Find Out More<i class="md md-keyboard-arrow-right"></i></a>
		</div>
	</div>

</div>
