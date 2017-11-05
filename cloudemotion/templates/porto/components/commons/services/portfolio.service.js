mainApp.factory('PortfolioService', PortfolioService)
PortfolioService.$inject=["$http","$state","urlHelpers"]
function PortfolioService($http,$state,urlHelpers) {
	var methods= {
		getCv:getCv,
		getClass:getClass,
		postContact:postContact
	}
	function getCv(params,id) {
		return urlHelpers.get("users/",params,id);
	}
	function getClass(params) {
		return urlHelpers.get("classifications/",params);
	}
	function postContact(data) {
		return urlHelpers.post("contacts/",data);
	}
	return methods;
}
