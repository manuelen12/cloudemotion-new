koomper.directive('customHeader', HeaderCustom);
HeaderCustom.$inject=["$translate","$http","DashboardService","SessionService","UsersService","ValidatorHelper","$filter"]
function HeaderCustom($translate,$http,DashboardService,SessionService,UsersService,ValidatorHelper,$filter) {	
	// Runs during compile
	return {
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: './components/commons/directives/views/header.view.directive.html',
		link: function($scope, iElm, iAttrs, controller) {
			
			$scope.logout=SessionService.logout;

			DashboardService.getCountries().then(function(response) {
				$scope.countries=response.data;
			},function(error) {
			})

			$scope.setEdit=function() {
				$scope.user.country=parseInt($scope.user.country_id)
				$scope.users=angular.copy($scope.user);	
				$scope.users.confirm_email=$scope.users.email;

			}

			$scope.changeLanguage=function(lang) {
				var language=(lang=="en"?"es":"en");
				SessionService.changeLanguage({idiom:language}).then(function(response) {
					$scope.country=language
					$translate.use(language);
				}, function(error) {
				})

			}

			$scope.editProfile=function() {
				var users = angular.copy($scope.users)
				if (ValidatorHelper.validProfileUsers(users)) {
					UsersService.editProfile(users).then(function(response){
						response.data.country=parseInt(response.data.country)
						$scope.user=response.data;
						localStorage.setItem("koomper-sec", JSON.stringify($scope.user))
						ValidatorHelper.message($filter('translate')("Update successful"),false)
						$("#profile").modal("hide")
					}, function(error) {
					})
					
				}
			}
		}
	};
}
