cloudemotion.controller("MainCtrl", MainCtrl)
MainCtrl.$inject = ["$scope","$http","particles"];

function MainCtrl($scope,$http,particles) {
	console.log("maincontroller");
	var vm=this;

	angular.extend(vm,{
		tabs:1,
	});

	this.$onInit=function() {
		particlesJS("qodef-p-particles-container",particles)
		
	}
}

angular.element(function() {
	angular.bootstrap(document, ['mainApp']);
});