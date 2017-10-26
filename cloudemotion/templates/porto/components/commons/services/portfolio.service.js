mainApp.factory('PortfolioService', PortfolioService)
PortfolioService.$inject=["$http","$state","urlHelpers"]
function PortfolioService($http,$state,urlHelpers) {
	var methods= {
		getCv:getCv,
		getClass:getClass,
	}
	function getCv(params,id) {
		return urlHelpers.get("users/",params,id);
	}
	function getClass(params) {
		return urlHelpers.get("classifications/",params);
	}
	return methods;
}
