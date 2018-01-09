<div class="container-fluid top-content">
	<div class="mainTitle">
		<h1 ng-bind="'Contact Us' | translate"></h1>
		<p ng-bind="'Choose your preferences and make a question' | translate"></p>
	</div>
	<nucleo></nucleo>
	<section class="main-content">
		<article class="main" ng-class="{'flipped':vm.flip}">
			<article class=" front">
				<div class="form-horizontal contact-us" ng-if="vm.country=='es'">
					<?php echo do_shortcode( '[contact-form-7 id="5" title="form-es"]' ); ?>
				</div>
				<div class="form-horizontal contact-us" ng-if="vm.country=='en'">
					<?php echo do_shortcode( '[contact-form-7 id="6" title="form-en"]' ); ?>
				</div>
			</article>          
			<article class=" back">
				<div id="logo-cl" class="form-group">
					<img class="img-responsive" width="200" data-src="./wp-content/themes/cloudemotion/assets/img/cloud.png">
					<img class="img-responsive" width="200" data-src="./wp-content/themes/cloudemotion/assets/img/logo_header.jpg">
				</div>
				<button id="trigger" ng-click="vm.flip=false;" class="btn btn-primary">Solicitar informacion</button>
			</article>
		</article>
	</section>
</div>
<?php wp_footer(); ?>