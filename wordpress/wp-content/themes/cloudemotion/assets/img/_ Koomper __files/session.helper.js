koomper.factory('SessionHelper', SessionHelper)
SessionHelper.$inject=["$http","$q","$state","ENDPOINT","ValidatorHelper","$rootScope"]
function SessionHelper($http,$q,$state, ENDPOINT,  ValidatorHelper, $rootScope) {

console.log($rootScope);
	var functions={
		grantMedicine:grantMedicine,
		grantProvider:grantProvider,
		grantClient:grantClient,
		grantUser:grantUser,
		grantBranch:grantBranch,
		grantWarehouse:grantWarehouse,
	};

	function grantMedicine(data) {
		console.log($rootScope.userdata);
	}
	function grantProvider(data) {
		console.log($rootScope.userdata);
	}
	function grantClient(data) {
		console.log($rootScope.userdata);
	}
	function grantUser(data) {
		console.log($rootScope.userdata);
	}
	function grantBranch(data) {
		console.log($rootScope.userdata);
	}
	function grantWarehouse(data) {
		console.log($rootScope.userdata);
	}


	return functions;

}

