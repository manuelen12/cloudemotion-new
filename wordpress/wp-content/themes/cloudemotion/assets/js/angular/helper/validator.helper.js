cloudemotion.factory('ValidatorHelper', ValidatorHelper)
ValidatorHelper.$inject=["$http","$timeout","$rootScope","$q","ENDPOINT", "$filter", "notificationService"]
function ValidatorHelper($http,$timeout,$rootScope,$q, ENDPOINT,$filter,notificationService) {
    var listFunc= {
        info:info,
        message:message,
        disabledButtons:disabledButtons,
        evalError:evalError,
        confirm:confirm,        
    },emailReg=new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/),float=new RegExp(/^[0-9]+([.])?([0-9]+)?$/),textNumber =new RegExp(/^[0-9a-zA-Z]+$/),textonly=new RegExp(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\']+$/),
    httpReg=new RegExp(/(https|http)\:\/\/[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+$/)

    function disabledButtons (bol){$("button").attr("disabled",bol)}

    function message(message,type,title) {
        notificationService.removeNotifications();
        $timeout(function() {
            if (type) notificationService.error(message);
            else notificationService.success(message);
        },10000)
    }
    function info(message) {
        notificationService.removeNotifications();
        notificationService.info(message)
    }
    var valid=false;
    function evalError(error,unauthorize) {
        disabledButtons(false);
        message("Ha ocurrido un error - Intentelo de nuevo mas tarde",true);
    }

    function confirm(message) {
        notificationService.removeNotifications();

        var deferred=$q.defer()
        deferred.notify("inicio el beta")
        notificationService.notify({
            title: ($filter('translate')("Warning")),
            text: message,
            hide: false,
            type: 'info',
            confirm: {
                confirm: true
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        }).get().on('pnotify.confirm', function() {
            deferred.resolve(true);
        }).on('pnotify.cancel', function() {
            deferred.reject(false);

        });
        return deferred.promise

    }
    return listFunc;
}