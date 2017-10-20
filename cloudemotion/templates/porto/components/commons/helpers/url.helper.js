mainApp.factory('urlHelpers', urlHelpers)
urlHelpers.$inject=["$http","$q","$state","ENDPOINT","ValidatorHelper"]
function urlHelpers($http,$q,$state, ENDPOINT,ValidatorHelper) {

	var unauthorize=false,
	translate = {"patient":"paciente","cc":"Identificacion",};


	var listFunc= {
		post:post,
		get:get,
		put:put,
		del:del
	}


	function evalError(error) {
		/*console.log(error);
		if (error && error.status==401) {
			if (!unauthorize) ValidatorHelper.message("No estas autorizado para entrar al sistema - Por favor Inicia Sesion","error");
			localStorage.setItem("token", "");
			unauthorize=true;
			$state.go("login");
		}else{
			if(error.data && error.data.errors)
			{
				var field=translate[Object.keys(error.data.errors)[0]]?translate[Object.keys(error.data.errors)[0]]:Object.keys(error.data.errors)[0];
				ValidatorHelper.message(field +" - "+ error.data.errors[(Object.keys(error.data.errors)[0])],"error");
			}
			else if(error.data && error.data.raise)
			{
				if (error.data.raise.length) {	
				ValidatorHelper.message(error.data.raise[0].field+" - "+error.data.raise[0].error,"error");
				}else{
				ValidatorHelper.message(Object.keys(error.data.raise)[0] +" - "+ error.data.raise[(Object.keys(error.data.raise)[0])],"error");
				}
			}
			else
			{
				console.log(4);
				ValidatorHelper.message("Ha ocurrido un error - Intentelo de nuevo mas tarde","error");
			}
		}*/
	}

	
	function post(url,data,bol) {

		var q=$q.defer();
		var options={
			url:ENDPOINT+url,
			method:"POST",
			headers:{
				"Authorization":"JWT "+localStorage.getItem("token")
			},
			data:JSON.stringify(data)
		}
		if(bol){delete options.headers}
			$http(options).then(function(response) {

				ValidatorHelper.message("Su petición fue realizada exitosamente","success","¡Excelente!").then(function() {
					q.resolve(response)					
				})
			}, function(error) {
				evalError(error)
				q.reject(error)	
			});
		return q.promise;
	}

	function put(url,data,id,bol) {
		var q=$q.defer();

		var options={
			url:ENDPOINT+url+id+"/",
			method:"PUT",
			headers:{
				"Authorization":"JWT "+localStorage.getItem("token")
			},
			data:JSON.stringify(data)
		}
		if (bol) {delete options.headers}
			$http(options).then(function(response) {
				ValidatorHelper.message("Su petición fue realizada exitosamente","success","¡Excelente!").then(function() {
					q.resolve(response)					
				})
			}, function(error) {
				evalError(error)

				q.reject(error)	

			});
		return q.promise;
	}

	function get(url,params,id) {

		var q=$q.defer();

		var options={
			url:(id ? ENDPOINT+url+id+"/" : ENDPOINT+url),
			method:"GET",
			withCredentials: true,
		};
		if (params) {
			options.params=params;
		}
		$http(options).then(function(response) {

			q.resolve(response);	
		}, function(error) {
			evalError(error)

			q.reject("error");	
		})
		return q.promise;
	}
	
	function del(url,id) {
		var q=$q.defer();

		var options={
			url:ENDPOINT+url+id+"/",
			method:"DELETE",
			headers:{
				"Authorization":"JWT "+localStorage.getItem("token")
			},
			/*			data:JSON.stringify(data)*/
		}
		$http(options).then(function(response) {
			ValidatorHelper.message("Se ha Eliminado exitosamente su registro","success","¡Excelente!").then(function() {
				q.resolve(response)		
			});
		}, function(error) {
			evalError(error)

			q.reject(error)	

		});
		return q.promise;
	}
	return listFunc;
}

