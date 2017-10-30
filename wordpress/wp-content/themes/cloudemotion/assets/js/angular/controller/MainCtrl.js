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
	});
	function changeLanguage() {
		vm.country = (vm.country=='es'?'en':'es');
		$translate.use(vm.country);		
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
			console.log(response);
			vm.portfolios=response.data;
		},function(error) {
			console.log(error);
		})

	}

}

angular.element(function() {
	angular.bootstrap(document, ['mainApp']);
});