<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	$this->title = 'Products List';
	$this->params['breadcrumbs'][] = $this->title;
        
?>
<div id="checkpoint-a" class="single-page archive-page row">
	<div class="page-title large-12 medium-12 small-12 columns">
		<h2>Muscle Building</h2>
	</div>
	<form action="/products" class="row">
		<div class="large-10 medium-10 small-12 columns">
			<div class="alphabet-filter">
				<input type="hidden" id="filterCharValue" value="">
				<ul class="pagination filters">
					<li data-id="" class="current"><a href="#">All</a></li>
					<li data-id="a"><a href="#">a</a></li>
					<li data-id="b"><a href="#">b</a></li>
					<li data-id="c"><a href="#">c</a></li>
					<li data-id="d"><a href="#">d</a></li>
					<li data-id="e"><a href="#">e</a></li>
					<li data-id="f"><a href="#">f</a></li>
					<li data-id="g"><a href="#">g</a></li>
					<li data-id="h"><a href="#">h</a></li>
					<li data-id="i"><a href="#">i</a></li>
					<li data-id="j"><a href="#">j</a></li>
					<li data-id="k"><a href="#">k</a></li>
					<li data-id="l"><a href="#">l</a></li>
					<li data-id="m"><a href="#">m</a></li>
					<li data-id="n"><a href="#">n</a></li>
					<li data-id="o"><a href="#">o</a></li>
					<li data-id="p"><a href="#">p</a></li>
					<li data-id="q"><a href="#">q</a></li>
					<li data-id="r"><a href="#">r</a></li>
					<li data-id="s"><a href="#">s</a></li>
					<li data-id="t"><a href="#">t</a></li>
					<li data-id="u"><a href="#">u</a></li>
					<li data-id="v"><a href="#">v</a></li>
					<li data-id="w"><a href="#">w</a></li>
					<li data-id="x"><a href="#">x</a></li>
					<li data-id="y"><a href="#">y</a></li>
					<li data-id="z"><a href="#">z</a></li>
					<li data-id="..."><a href="#">...</a></li>
				</ul>
			</div>
		</div>
		<div class="large-2 medium-2 small-12 columns">
			<div class="price-filter">
				<div class="select-component"><i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
					<select id="price-filter" name="price">
						<option value="0">Sort By Price</option>
						<option value="1">Price: Higher First</option>
						<option value="2">Price: Lower First</option>
					</select>
				</div>
			</div>
		</div>
	</form>
	<div class="products-list">
		<div class="single-product-item row">
			<div class="large-3 medium-3 small-12 columns">
				<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/archive-product.png" alt="">
			</div>
			<div class="large-8 medium-8 small-12 columns">
				<h3> <a href="#">NITRO-TECH&trade;</a></h3>
				<p>Contains protein sourced primarily from whey protein isolate - one of the cleanest and purest protien sources available to athletes. It is</p>
				<p class="price-tag">299 LE</p><a href="#" class="more-on-this-product">Find Out More<i class="md md-keyboard-arrow-right"></i></a>
			</div>
		</div>
		<div class="single-product-item row">
			<div class="large-3 medium-3 small-12 columns">
				<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/archive-product.png" alt="">
			</div>
			<div class="large-8 medium-8 small-12 columns">
				<h3> <a href="#">NITRO-TECH&trade;</a></h3>
				<p>Contains protein sourced primarily from whey protein isolate - one of the cleanest and purest protien sources available to athletes. It is</p>
				<p class="price-tag">299 LE</p><a href="#" class="more-on-this-product">Find Out More<i class="md md-keyboard-arrow-right"></i></a>
			</div>
		</div>
		<div class="single-product-item row">
			<div class="large-3 medium-3 small-12 columns">
				<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/archive-product.png" alt="">
			</div>
			<div class="large-8 medium-8 small-12 columns">
				<h3> <a href="#">NITRO-TECH&trade;</a></h3>
				<p>Contains protein sourced primarily from whey protein isolate - one of the cleanest and purest protien sources available to athletes. It is</p>
				<p class="price-tag">299 LE</p><a href="#" class="more-on-this-product">Find Out More<i class="md md-keyboard-arrow-right"></i></a>
			</div>
		</div>
		<div class="single-product-item row">
			<div class="large-3 medium-3 small-12 columns">
				<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/archive-product.png" alt="">
			</div>
			<div class="large-8 medium-8 small-12 columns">
				<h3> <a href="#">NITRO-TECH&trade;</a></h3>
				<p>Contains protein sourced primarily from whey protein isolate - one of the cleanest and purest protien sources available to athletes. It is</p>
				<p class="price-tag">299 LE</p><a href="#" class="more-on-this-product">Find Out More<i class="md md-keyboard-arrow-right"></i></a>
			</div>
		</div>
		<div class="single-product-item row">
			<div class="large-3 medium-3 small-12 columns">
				<img src="<?= Url::to('@frontThemeUrl') ?>/images/src/archive-product.png" alt="">
			</div>
			<div class="large-8 medium-8 small-12 columns">
				<h3> <a href="#">NITRO-TECH&trade;</a></h3>
				<p>Contains protein sourced primarily from whey protein isolate - one of the cleanest and purest protien sources available to athletes. It is</p>
				<p class="price-tag">299 LE</p><a href="#" class="more-on-this-product">Find Out More<i class="md md-keyboard-arrow-right"></i></a>
			</div>
		</div>
		<ul class="pagination normalize">
			<li data-id=""><a href="#"><i class="md md-chevron-left"></i>Back</a></li>
			<li class="current"><a href="#">1</a></li>
			<li data-id="2"><a href="#">2</a></li>
			<li data-id="3"><a href="#">3</a></li>
			<li data-id="..."><a href="#">...</a></li>
			<li data-id="14"><a href="#">14</a></li>
			<li data-id="15"><a href="#">15</a></li>
			<li data-id="16"><a href="#">16</a></li>
			<li data-id="..."><a href="#">Next<i class="md md-chevron-right"></i></a></li>
		</ul>
	</div>
	<div class="page-title large-12 medium-12 small-12 columns">
		<h2>Best Seller</h2>
	</div>
	<div class="row">
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
