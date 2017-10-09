mainApp.directive('headerCustom', HeaderCustom);
HeaderCustom.$inject=[]
function HeaderCustom() {	
	// Runs during compile
	return {
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: './components/commons/directives/views/header.view.directive.html',
		link: function($scope, iElm, iAttrs, controller) {
			

			console.log('header');
			this.$onInit=function(){ 
				var self = this,
				_isScrolling = false;

				// Click Element Action
				self.$el.on('click', function(e) {
					e.preventDefault();
					$('body, html').animate({
						scrollTop: 0
					}, self.options.delay, self.options.easing);
					return false;
				});

				// Show/Hide Button on Window Scroll event.
				$(window).scroll(function(){

					if (!_isScrolling) {

						_isScrolling = true;

						if ($(window).scrollTop() > self.options.offset) {

							self.$el.stop(true, true).addClass('visible');
							_isScrolling = false;

						} else {

							self.$el.stop(true, true).removeClass('visible');
							_isScrolling = false;
						}
					}
				});
				return this;
			}
			
			
			
		}
	};

}
