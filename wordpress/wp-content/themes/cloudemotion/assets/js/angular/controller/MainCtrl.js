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
		var vm=this,owlResponsive={
			480 : {
				items:1
			},
			768 : {
				items:2
			},
			960 : {
				items:3
			},
			1500 : {
				items:4
			}
		};



		angular.extend(vm,{
			tabs:1,
			flip:false,
			country:'es',
			changeLanguage:changeLanguage,
			getTeam:urlHelpers.get("users"),
			getPorfolios:urlHelpers.get("portfolios"),
			getCategory:urlHelpers.get("classifications"),
			getTeam:urlHelpers.get("users"),
			setBackground:setBackground,
			openModal:openModal,
			service_t: 2,
			image_web: 1
		});

		function openModal(portfolio) {
			vm.seeData=angular.copy(portfolio);
			$('#modalportfolio').modal('show');
		}

		function setBackground(image) {
			return 'background-image:url("'+image+'")';
		}
		function changeLanguage() {
			vm.country = (vm.country=='es'?'en':'es');
			$translate.use(vm.country);		
		}

		this.$onInit=function() {
			particlesJS("qodef-p-particles-container",particles)
			changeLanguage();
			vm.getTeam.then(function(response) {
				vm.team=response.data;
				$.map(vm.team,function(val,ind) {
					if (!val.image) {
						vm.team[ind].image="./assets/img/default_p.png";
					}
				})
				console.log($('.team'));
				$timeout(function() {
					var opt={
						navText:["",""],
						loop:false,
						margin:10,
						nav:true,
					};
					var blog=angular.copy(opt);
					blog.responsive={
						0 : {items:1},
						460 : {
							items:2
						},
						900 : {
							items:3
						}
					}
					console.log(opt);
					setCarousel(".team",blog)
					setCarousel(".owl-blog",blog);
					opt.items=1;
					setCarousel(".qodef-testimonials",opt);
				},1000)
			},function(error) {
			})


			vm.getCategory.then(function(response) {
				response.data.map(function(data,ind) {
					data.class=data.name.split(" ").join("-");
				})
				vm.category=response.data;

				$timeout(function() {
					var opt={	
						loop:false,
						margin:10,
						nav:true,
						autoplay:false,
						responsiveClass:true,
						responsive:owlResponsive,
						animateOut: 'fadeOut',
						animateIn: 'fadeIn',
						autoWidth:true,
						navText:["",""],

					}
					setCarousel(".category",opt);
					Sukces.Component.tabs(); 

				},1000)
			},function(error) {
			})

			vm.getPorfolios.then(function(response) {
				response.data.map(function(data,ind) {
					data.class=data.classification.name.split(" ").join("-");
				})
				vm.portfolios=response.data;
				
				var opt={	
					loop:false,
					margin:10,
					nav:true,
					autoplay:true,
					responsiveClass:true,
					response:owlResponsive,
					animateOut: 'fadeOut',
					animateIn: 'fadeIn',
					navText:["",""],

				}
				setCarousel(".qodef-team2",opt);
				
			},function(error) {
			})

		}

	}

	
})(jQuery)
angular.element(function() {
	angular.bootstrap(document, ['mainApp']);
});