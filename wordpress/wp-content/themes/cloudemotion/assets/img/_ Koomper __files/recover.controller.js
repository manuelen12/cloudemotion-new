koomper.controller('RecoverController',RecoverController)

RecoverController.$inject=["$scope","$stateParams","SessionService","UsersService","ValidatorHelper"]

function RecoverController ($scope,$stateParams,SessionService,UsersService,ValidatorHelper) {
	console.log('RecoverController');

	var vm=this;
	angular.extend(vm,{
		user:{},
		setRecovery:setRecovery,
		validRecovery:validRecovery,
	})

	this.$onInit=function() {
		if ($stateParams.token){
			vm.token=$stateParams.token
		}
	}

	function setRecovery(recovery) {
		var data=angular.copy(recovery);
		if (ValidatorHelper.validRecovery(data)){
			ValidatorHelper.confirm("Are you sure of the data entered?").then(function(response) {
				SessionService.recover(data).then(function(response) {
					console.log(response.data);
					window.location.assign('https://www.koomper.com/')
				},function(error) {
					console.log(error);
				})
			})
		}
	}

	function validRecovery(confirm) {
		var data=angular.copy(confirm);
		ValidatorHelper.confirm("Are you sure of the data entered?").then(function(response) {
			if (ValidatorHelper.validRecoveryToken(data)){
				SessionService.newpass(data,$stateParams.token).then(function(response){
					console.log(response.data);
					window.location.assign('https://www.koomper.com/')
				},function(error) {
					console.log(error);
				})
			}
		})
	}
	console.log(vm);

}