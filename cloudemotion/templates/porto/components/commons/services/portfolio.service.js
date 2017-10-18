mainApp.factory('PortfolioService', PortfolioService)
PortfolioService.$inject=["$http","$state","urlHelpers"]
function PortfolioService($http,$state,urlHelpers) {
	var methods= {
		getCv:getCv,
	}
	function getCv(params) {
		return urlHelpers.get("users/",params);
	}
	return methods;
}
