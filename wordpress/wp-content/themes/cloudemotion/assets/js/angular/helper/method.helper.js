cloudemotion.factory('urlHelpers', urlHelpers)
urlHelpers.$inject=["$http","$q","$state","ENDPOINT","ValidatorHelper"]
function urlHelpers($http,$q,$state, ENDPOINT,ValidatorHelper) {

    var listFunc= {
        post:post,
        get:get,
        put:put,
        del:del
    }


    
    function post(url,data,bol) {

        var q=$q.defer();
        var options={
            url:ENDPOINT+url,
            method:"POST",
            data:JSON.stringify(data)
        }
        if(bol){delete options.headers}
            $http(options).then(function(response) {

                ValidatorHelper.message("Su petición fue realizada exitosamente","success","¡Excelente!").then(function() {
                    q.resolve(response)                 
                })
            }, function(error) {
                q.reject(error) 
            });
        return q.promise;
    }

    function put(url,data,id,bol) {
        var q=$q.defer();

        var options={
            url:ENDPOINT+url+id+"/",
            method:"PUT",
            data:JSON.stringify(data)
        }
        if (bol) {delete options.headers}
            $http(options).then(function(response) {
                ValidatorHelper.message("Su petición fue realizada exitosamente","success","¡Excelente!").then(function() {
                    q.resolve(response)                 
                })
            }, function(error) {

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

            q.reject(error);  
        })
        return q.promise;
    }
    
    function del(url,id) {
        var q=$q.defer();

        var options={
            url:ENDPOINT+url+id+"/",
            method:"DELETE",
            /*          data:JSON.stringify(data)*/
        }
        $http(options).then(function(response) {
            ValidatorHelper.message("Se ha Eliminado exitosamente su registro","success","¡Excelente!").then(function() {
                q.resolve(response)     
            });
        }, function(error) {

            q.reject(error) 

        });
        return q.promise;
    }
    return listFunc;
}

