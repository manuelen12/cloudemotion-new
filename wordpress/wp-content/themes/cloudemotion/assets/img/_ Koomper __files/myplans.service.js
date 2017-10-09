koomper.factory('MyPlansService', MyPlansService)
MyPlansService.$inject=["$http","$state","urlHelpers"]
function MyPlansService($http,$state,urlHelpers) {
	var methods = {
		getPlans : getPlans,
		addPlans : addPlans,
		editPlans : editPlans,
		deletePlans:deletePlans,
		changePlan:changePlan,
	}

	function getPlans(params){
		return urlHelpers.get("plans/",params);
	}

	function addPlans(data){
		return urlHelpers.post("plans/", data);
	}

	function editPlans(data) {
		var data=angular.copy(data);
		return urlHelpers.put("plans/",data,data.id);
	}
	function deletePlans(data) {
		var data=angular.copy(data);	
		console.log(data);
		return urlHelpers.del("plans/",data.id, "Plan");		
	}
	function changePlan(data) {
	   return urlHelpers.post("plans_user/", data);	
	}
	
	console.log('My Plans Service');
	
	return methods;
}
