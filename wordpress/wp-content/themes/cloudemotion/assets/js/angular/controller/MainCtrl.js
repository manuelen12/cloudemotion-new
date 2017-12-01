(function($) {
	cloudemotion.config(Config)
	Config.$inject=["$translateProvider"]
	function Config($translateProvider) {
		$translateProvider.useStaticFilesLoader({
			prefix: 'wp-content/themes/cloudemotion/translations/locale-',
			suffix: '.json'
		});
		$translateProvider.useSanitizeValueStrategy('escape');


	}
	cloudemotion.controller("MainCtrl", MainCtrl)

	MainCtrl.$inject = ["$scope","$timeout","$http","particles","$translate","ValidatorHelper","urlHelpers"];
	function MainCtrl($scope,$timeout,$http,particles,$translate,ValidatorHelper,urlHelpers) {
		console.log("maincontroller");
		var vm=this;
		console.log(urlHelpers);
		angular.extend(vm,{
			tabs:1,
			country:'es',
			changeLanguage:changeLanguage,
			getTeam:urlHelpers.get("users"),
			getPorfolios:urlHelpers.get("portfolios"),
			getCategory:urlHelpers.get("classifications"),
			setImage:setImage,
			setBackground:setBackground,
			service_t: 2,
			image_web: 1
		});
		function setBackground(image) {
			console.log(('background-image:url("'+image+'")'));
			return 'background-image:url("'+image+'")';
		}
		function changeLanguage() {
			vm.country = (vm.country=='es'?'en':'es');
			$translate.use(vm.country);		
		}

		function setImage() {
			console.log("hello world")
		}
		this.$onInit=function() {
			particlesJS("qodef-p-particles-container",particles)
			changeLanguage();
			console.log(vm.getTeam);
			vm.getTeam.then(function(response) {
				console.log(response);
				vm.team=response.data;
				$.map(vm.team,function(val,ind) {
					if (!val.image) {
						vm.team[ind].image="./assets/img/default_p.png";
					}
				})
				$('.portfolio').owlCarousel({
					loop:true,
					margin:10,
					nav:true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:3
						},
						1000:{
							items:3
						}
					}
				})
			},function(error) {
				console.log(error);
			})


			vm.getCategory.then(function(response) {
				response.data.map(function(data,ind) {
					console.log(data);
					console.log(ind);
					data.class=data.name.split(" ").join("-");
				})
				console.log(response.data);
				vm.category=response.data;

				$timeout(function() {
					var opt={	
						loop:false,
						margin:10,
						nav:true,
						autoplay:false,
						responsiveClass:true,
						items:4,
						animateOut: 'fadeOut',
						animateIn: 'fadeIn',
						autoWidth:true,

					}
					setCarousel(".category",opt);

					Sukces.Component.tabs(); 

				},1000)
			},function(error) {
				console.log(error);
			})

			vm.getPorfolios.then(function(response) {
				response.data.map(function(data,ind) {
					data.class=data.classification.name.split(" ").join("-");
				})
				vm.portfolios=response.data;
				
				console.log(vm.portfolios)
			},function(error) {
				console.log(error);
			})

		}

	}

	
})(jQuery)
angular.element(function() {
	angular.bootstrap(document, ['mainApp']);
});