koomper.factory('UsersService', UsersService)
UsersService.$inject=["$http","$rootScope","$state","urlHelpers"]
function UsersService($http,$rootScope,$state,urlHelpers) {
	var methods= {
		getUsers:getUsers,
		getStadistics:getStadistics,
		addUser:addUser,
		editUser: editUser,
		deleteUser: deleteUser,
		addCustomerUser: addCustomerUser,
		editProfile:editProfile,
	}

	function setLevelData(data) {
		var data=angular.copy(data);
			data.country_id=data.country_id?data.country_id:data.country;
		if ($rootScope.user.plans_id==2) {
			data.id=data.id_user?data.id_user:data.id;
		}
		return data;
	}

	function getUsers(data){
		data=setLevelData(data);
		var url=$rootScope.user.plans_id==2 && $rootScope.user.level!=1?"users_deps/":"users/";
		return urlHelpers.get(url,data);
	}	
	function getStadistics(data){
		return urlHelpers.get("user_stadistics/",data);
	}	
	function addCustomerUser(data){
		return urlHelpers.post("users_final/",data,true);
	}
	function addUser(data,take){
		data=setLevelData(data);
		var url=$rootScope.user.plans_id==2 && $rootScope.user.level!=1?"users_deps/":"users/";
		return urlHelpers.post(url,data,take);
	}
	function editProfile(data){
		return urlHelpers.post("profile/",data);	
	}
	function editUser(data){
		data=setLevelData(data);
		var url=$rootScope.user.plans_id==2 && $rootScope.user.level!=1?"users_deps/":"users/";
		return urlHelpers.put(url,data,data.id);	
	}
	function deleteUser(data) {
		data=setLevelData(data);
		var url=$rootScope.user.plans_id==2 && $rootScope.user.level!=1?"users_deps/":"users/";
		return urlHelpers.del(url,data.id, "User");	
	}

	return methods;
}
