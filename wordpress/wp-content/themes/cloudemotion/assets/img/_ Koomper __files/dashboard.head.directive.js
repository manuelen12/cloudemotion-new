koomper.directive('dashboardHead', DashboardHead);
DashboardHead.$inject=["$http"]
function DashboardHead($http) {	
	// Runs during compile
	return {
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: './components/commons/directives/views/dashboard.head.view.directive.html',
		link: function($scope, iElm, iAttrs, controller){
			
		}
	};
}