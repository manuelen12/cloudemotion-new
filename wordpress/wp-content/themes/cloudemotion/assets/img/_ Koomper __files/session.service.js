koomper.factory('SessionService', SessionService)
SessionService.$inject=["$rootScope","$translate","$http","$state","urlHelpers","ValidatorHelper","$location","$filter"]
function SessionService($rootScope,$translate,$http,$state,urlHelpers,ValidatorHelper,$location,$filter) {
	var methods= {
		login:login,
		logout:logout,
		recover:recover,
		newpass:newpass,
		defineLanguage:defineLanguage,
		changeLanguage:changeLanguage,
	}

	function login(data) {
		return urlHelpers.loginpost("auth/",data); 
	}
	function logout() {
		ValidatorHelper.confirm($filter('translate')("Are you sure to close this session?")).then(function(response) {
			localStorage.removeItem("koomper-token");
			localStorage.removeItem("koomper-sec");
			$rootScope.user=""
			$state.go("login");
		})
	}
	function recover(data) {
		return urlHelpers.post("recovery/",data,true);
	}

	function defineLanguage(data) {
		urlHelpers.get("language/",null,null,true).then(function(response) {
			console.log(response);
			$rootScope.country=response.data
			$translate.use(response.data);
		},function(error) {
			console.log(error);
		})		
	}

	function changeLanguage(data) {

		return urlHelpers.post("language/",data,true)

		
	}

	function newpass(data,token) {
		urlHelpers.put("recovery/",data,token,true);
	}

	return methods;
}
