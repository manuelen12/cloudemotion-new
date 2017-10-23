mainApp.directive('menuCustom', MenuCustom);
MenuCustom.$inject=["$http"]
function MenuCustom($http) {	
	// Runs during compile
	return {
		scope: {}, // {} = isolate, true = child, false/undefined = no change
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: './components/commons/directives/views/menu.view.directive.html',
		link: function($scope, iElm, iAttrs, controller) {
			console.log('menu');
			
			$scope.click = function(link){
				var body =  $("html, body");
				var top  =  $(link).offset().top;
				var active = $('.nav')
				console.log($(this));
				active.find("li").removeClass("active");
				

				body.stop().animate({scrollTop:top},800,'swing',function(){});
			}
		}
	};

}