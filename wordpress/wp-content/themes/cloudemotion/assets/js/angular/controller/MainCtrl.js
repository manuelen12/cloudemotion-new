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

MainCtrl.$inject = ["$scope","$http","particles","$translate","ValidatorHelper"];
function MainCtrl($scope,$http,particles,$translate,ValidatorHelper) {
	console.log("maincontroller");
	var vm=this;
	angular.extend(vm,{
		tabs:1,
		country:'es',
		changeLanguage:changeLanguage
	});
	function changeLanguage() {
		vm.country = (vm.country=='es'?'en':'es');
		$translate.use(vm.country);		
	}
	this.$onInit=function() {
		particlesJS("qodef-p-particles-container",particles)
		changeLanguage();
	}

}

angular.element(function() {
	angular.bootstrap(document, ['mainApp']);
});