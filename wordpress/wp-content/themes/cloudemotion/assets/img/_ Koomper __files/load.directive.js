koomper.directive('loadDirective', LoadDirective);
LoadDirective.$inject=["$http","$timeout"]
function LoadDirective($http,$timeout) {	
	// Runs during compile
	return {
		scope: {}, // {} = isolate, true = child, false/undefined = no change
		restrict: 'A', // E = Element, A = Attribute, C = Class, M = Comment
		link: function($scope, iElm, iAttrs, controller) {


			var time="",
			emailReg=new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)
			httpReg=new RegExp(/(https|http)\:\/\/[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+$/)
			function errorBorder(bol) {
				$target.css("borderColor",(bol?"green":"red"))
				if (time) clearTimeout(time);
				time=setTimeout(function() {
					$target.css("borderColor","lightgray")
				},2000)

			}
			angular.element("body").on("keypress","input[validate]",function(e) {
				$target=$(this),
				$tipe=$target.data("type"),
				$size=$target.data("size"),
				$max=parseInt($target.data("max")),
				$min=parseInt($target.data("min")),
				$letter=String.fromCharCode(e.keycode?e.keycode:e.which),
				$word=($target.val()+$letter);
				if ($tipe) {
					console.log($tipe);
					switch ($tipe) {
						case 1:
						if (isNaN($letter) || parseInt($word)<$min || parseInt($word)>$max) {
							e.preventDefault()
							errorBorder(false);
						}else errorBorder(true);
						break;
						case 2:
						errorBorder(emailReg.test($word))
						break;
						case 3:
						if (!isNaN($letter) && $letter!=" ") {
							e.preventDefault()
							errorBorder(false);
						}else errorBorder(true);
						break;
						case 4:
						errorBorder(httpReg.test($word))
						break;
					}

				}
				if ($size) {
					if ($word.length>=$size) {
						errorBorder(false);
						e.preventDefault()
					}
				}
			})


			$scope.isLoading = function () {
				return $http.pendingRequests.length;
			};
			$scope.$watch($scope.isLoading, function (news,old){
				if (news) $(".preloader").css({"display":"block"});
				else $(".preloader").slideUp('slow');
				$scope.load=(news?true:false);
			});
			
		}
	};

}
