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
	function postContact(params) {
		return urlHelpers.post("contacts/",params);
	}
	return methods;
}
