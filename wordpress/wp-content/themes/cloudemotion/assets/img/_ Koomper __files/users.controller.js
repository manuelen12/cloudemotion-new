koomper.controller('NewUsersController',NewUsersController)

NewUsersController.$inject=["$scope","$state","SessionService","UsersService","ValidatorHelper","$translate"]

function NewUsersController ($scope,$state,SessionService,UsersService,ValidatorHelper,$translate) {
	console.log('NewUsersController');

	var vm=this;
	angular.extend(vm,{
		users:{},
		addCustomerUser:addCustomerUser,
	})

	function addCustomerUser(user) {
		var data=angular.copy(user);
		console.log(data);

			if (ValidatorHelper.validCustomerUser(data)) {

				UsersService.addCustomerUser(data).then(function(response) {
					unauthorize=true;
					if (response.data.token) {	
						localStorage.setItem("koomper-token", response.data.token_session);
						var user=(JSON.stringify(response.data));
						localStorage.setItem("koomper-sec", user)
						$state.go(user.level==1?"admin.dashboard":"client.dashboard")
					}else console.log("no hay token");

				},function(error) {
					console.log(error);
				})
			}

	}

	function changeLanguage (lang) {
				var language=(lang=="en"?"es":"en");
				SessionService.changeLanguage({idiom:language}).then(function(response) {
					console.log(response.data);
					$scope.country=language
					$translate.use(language);
				}, function(error) {
					console.log(error);
				})

				console.log(vm);
			}

		}
