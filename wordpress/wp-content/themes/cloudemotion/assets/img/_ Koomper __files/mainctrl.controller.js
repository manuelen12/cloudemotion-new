mainApp.controller('MainCtrl', MainCtrl)
MainCtrl.$inject=["$scope","$state","$stateParams","$rootScope","DashboardService"]
function MainCtrl($scope,$state,$stateParams,$rootScope,DashboardService) {
	var mv = this;
	angular.extend(mv,{
		menuSmall:false,
		dashboard:angular.copy($scope.dashboard)
	});
	console.log(mv.menuSmall);
	console.log('hola');
	

}