koomper.factory('urlHelpers', urlHelpers)
urlHelpers.$inject=["$http","$q","$state","ENDPOINT",'$filter',"UserData","ValidatorHelper"]
function urlHelpers($http,$q,$state, ENDPOINT,$filter,UserData, ValidatorHelper) {

	var unauthorize=false;

	var listFunc= {
		loginpost:loginpost,
		post:post,
		upload:upload,
		uploadProgress:uploadProgress,
		get:get,
		put:put,
		del:del
	}

	

	function loginpost(url,data) {
		ValidatorHelper.disabledButtons(true);
		var options={
			url:ENDPOINT+url,
			method:"POST",
			data:data
		}
		$http(options).then(function(response) {
			ValidatorHelper.disabledButtons(false);
			unauthorize=true;
			
			if (response.data.token_session) {	
				localStorage.setItem("koomper-token", response.data.token_session);
				delete response.data.token_session;
				var user=(JSON.stringify(response.data));
				localStorage.setItem("koomper-sec", user)
				$state.go(response.data.level==1?"admin.dashboard":"client.dashboard")
			}else console.log("no hay token");
		}, function(error) {
			console.log(error);
			ValidatorHelper.evalError(error,unauthorize)

		})

	}


	function post(url,data,bol) {
		console.log(url);
		ValidatorHelper.disabledButtons(true);
		var q=$q.defer();
		var options={
			url:ENDPOINT+url,
			method:"POST",
			headers:{
				"Authorization":"JWT "+localStorage.getItem("koomper-token")
			},
			data:JSON.stringify(data)
		}
		if(bol){delete options.headers}
			$http(options).then(function(response) {
				ValidatorHelper.disabledButtons(false);
				q.resolve(response)					
			}, function(error) {
				ValidatorHelper.evalError(error)
				q.reject(error)	
			});
		return q.promise;
	}

	function uploadProgress(url, data, percent) {
		return new Promise(function (resolve, reject) {
			var xhr = new XMLHttpRequest();
			xhr.open("POST", ENDPOINT+url);
			xhr.setRequestHeader("Authorization","JWT "+localStorage.getItem("koomper-token"));
			xhr.onload = function () {
				if (this.status >= 200 && this.status < 300) {
					resolve(JSON.parse(xhr.response));
				} else {
					reject({
						status: this.status,
						statusText: xhr.statusText
					});
				}
			};
			xhr.onerror = function () {
				reject({
					status: this.status,
					statusText: xhr.statusText
				});
			};
			xhr.upload.onprogress = function(e) {
            // Event listener for when the file is uploading

            var percentCompleted;
            if (e.lengthComputable) {
            	percentCompleted = Math.round(e.loaded / e.total * 100);
            	if (percentCompleted < 1) {
            		percent(e);
            		/*$scope.files[i].uploadStatus = 'Uploading...';*/
            	} else if (percentCompleted == 100) {
            		percent(e);
            		/*$scope.files[i].uploadStatus = 'Saving...';*/
            	} else {
            		percent(e);
            		/*$scope.files[i].uploadStatus = percentCompleted + '%';*/
            	}
            }
            
        };
        

        xhr.send(data);
    });
	}




	function upload(url,data,cred) {

		ValidatorHelper.disabledButtons(true);
		var q=$q.defer();

		options={
			method:"POST",
			url:ENDPOINT+url,
			withCredentials: cred,
			headers: {
				"Authorization":"JWT "+localStorage.getItem("koomper-token"),
				'Content-Type': undefined
			},
			transformRequest: angular.identity,
			data:data
		}
		$http(options).then(function(response) {
			ValidatorHelper.disabledButtons(false);
			q.resolve(response)					
		}, function(error) {
			ValidatorHelper.evalError(error)
			q.reject(error)	
		});
		return q.promise;
	}

	function put(url,data,id,bol) {
		ValidatorHelper.disabledButtons(true);
		var q=$q.defer();
		var options={
			url: ENDPOINT+url+id+"/",
			method:"PUT",
			headers:{
				"Authorization":"JWT "+localStorage.getItem("koomper-token")
			},
			data:JSON.stringify(data)
		}
		if (bol) {delete options.headers}
			$http(options).then(function(response) {
				ValidatorHelper.disabledButtons(false);
				q.resolve(response);				
			}, function(error) {
				ValidatorHelper.evalError(error)
				q.reject(error)	
			});
		return q.promise;
	}

	function get(url,params,id,bol) {

		var q=$q.defer();

		var options={
			url:(id ? ENDPOINT+url+id+"/" : ENDPOINT+url),
			method:"GET",
			headers:{
				"Authorization":"JWT "+localStorage.getItem("koomper-token")
			}
		};
		if (params) {
			options.params=params;
		}
		if (bol) {delete options.headers}
			$http(options).then(function(response) {

				q.resolve(response);	
			}, function(error) {
				ValidatorHelper.evalError(error)

				q.reject("error");	
			})
		return q.promise;
	}
	function del(url,id,title) {
		var q=$q.defer();

		var options={
			url:ENDPOINT+url+id+"/",
			method:"DELETE",
			headers:{
				"Authorization":"JWT "+localStorage.getItem("koomper-token")
			},
			/*			data:JSON.stringify(data)*/
		}
		$http(options).then(function(response) {
			console.log($filter('translate')("Successfully deleted your"));
			console.log("culo ps");
			ValidatorHelper.message($filter('translate')("Successfully deleted your")+" "+$filter('translate')(title),false);
			q.resolve(response)		
		}, function(error) {
			ValidatorHelper.evalError(error)

			q.reject(error)	

		});
		return q.promise;
	}
	return listFunc;
}

