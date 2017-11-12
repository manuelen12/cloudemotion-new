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

	MainCtrl.$inject = ["$scope","$http","particles","$translate","ValidatorHelper","urlHelpers"];
	function MainCtrl($scope,$http,particles,$translate,ValidatorHelper,urlHelpers) {
		console.log("maincontroller");
		var vm=this;
		console.log(urlHelpers);
		angular.extend(vm,{
			tabs:1,
			country:'es',
			changeLanguage:changeLanguage,
			getTeam:urlHelpers.get("users"),
			getPorfolios:urlHelpers.get("portfolios"),
			setBackground:setBackground,
		});
		function changeLanguage() {
			vm.country = (vm.country=='es'?'en':'es');
			$translate.use(vm.country);		
		}
		function setBackground(image) {
			console.log(('background-image:url("'+image+'")'));
			return 'background-image:url("'+image+'")';
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
			},function(error) {
				console.log(error);
			})
			vm.getPorfolios.then(function(response) {
				vm.portfolios=response.data;
				var opt={	
					loop:false,
					margin:10,
					nav:true,
					autoplay:true,
					responsiveClass:true,
					items:4,
					animateOut: 'fadeOut',
					animateIn: 'fadeIn',
				}
				setCarousel(".qodef-team2",opt,arrows);
			},function(error) {
				console.log(error);
			})

		}

	}

	
})(jQuery)
angular.element(function() {
	angular.bootstrap(document, ['mainApp']);
});