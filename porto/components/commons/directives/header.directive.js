mainApp.directive('headerCustom', HeaderCustom);
HeaderCustom.$inject=[]
function HeaderCustom() {	
	// Runs during compile
	return {
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: './components/commons/directives/views/header.view.directive.html',
		link: function($scope, iElm, iAttrs, controller) {
			console.log('header');
						
		}
	};

}
