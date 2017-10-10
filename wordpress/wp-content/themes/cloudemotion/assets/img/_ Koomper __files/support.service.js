koomper.factory('SupportService', SupportService)
SupportService.$inject=["$http","$state","urlHelpers"]
function SupportService($http,$state,urlHelpers) {
	var methods= {
		sendEmail:sendEmail,
	}

	function sendEmail(data){
		return urlHelpers.post("support/",data);
	}	

	return methods;
}
