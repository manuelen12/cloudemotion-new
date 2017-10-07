koomper.controller('LoginController',LoginController)

LoginController.$inject=["$scope","SessionService"]

function LoginController ($scope,SessionService) {
	console.log('LoginController');

var vm=this;
angular.extend(vm,{
	user:{},
	login:SessionService.login,
})

console.log(vm);

}