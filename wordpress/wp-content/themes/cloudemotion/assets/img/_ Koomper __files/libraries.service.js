koomper.factory('LibrariesService', LibrariesService)
LibrariesService.$inject=["$http","$state","urlHelpers"]
function LibrariesService($http,$state,urlHelpers) {
	var methods = {
		getLibraries : getLibraries,
		deleteLibrary : deleteLibrary,
	}

	function getLibraries(params){
		return urlHelpers.get("library/",params);
	}
	
	function deleteLibrary(data){
		var data=angular.copy(data);	
		return urlHelpers.del("library/",data.id, "Library");	
	}

	console.log('Libraries Service');
	
	return methods;
}
