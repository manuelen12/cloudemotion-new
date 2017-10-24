mainApp.factory('PortfolioService', PortfolioService)
PortfolioService.$inject=["$http","$state","urlHelpers"]
function PortfolioService($http,$state,urlHelpers) {
	var methods= {
		getCv:getCv,
	}
	function getCv(params,id) {
		return urlHelpers.get("users/",params,id);
	}
	return methods;
}
