mainApp.directive('footerCustom', FooterCustom);
FooterCustom.$inject=["$http"]
function FooterCustom($http) {	
	// Runs during compile
	return {
		scope: {}, // {} = isolate, true = child, false/undefined = no change
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: './components/commons/directives/views/footer.view.directive.html',
		link: function($scope, iElm, iAttrs, controller) {
			
		}
	};
}