koomper.factory('DashboardService', DashboardService)
DashboardService.$inject=["$http","$state","urlHelpers"]
function DashboardService($http,$state,urlHelpers) {
	var methods = {
		getDasboardCustomer : getDasboardCustomer,
		getDasboardAdmin : getDasboardAdmin,
		getCountries : getCountries,
	}

	function getDasboardCustomer(params){
		return urlHelpers.get("dashboard_user/",params);
	}
	function getDasboardAdmin(params){
		return urlHelpers.get("dashboard_admin/",params);
	}

	function getCountries(params) {
		return urlHelpers.get("countries/",params);
	}

	console.log('My Dasboard Service');
	
	return methods;
}
