koomper.factory('ValidatorHelper', ValidatorHelper)
ValidatorHelper.$inject=["$http","$rootScope","$q","$state","ENDPOINT", "$filter", "notificationService"]
function ValidatorHelper($http,$rootScope,$q,$state, ENDPOINT,$filter,notificationService) {
    var listFunc= {
        info:info,
        message:message,
        disabledButtons:disabledButtons,
        evalError:evalError,
        confirm:confirm,
        validPlans: validPlans,
        validBanner: validBanner,
        validRotator: validRotator,
        validUsers:validUsers,      
        validProfileUsers:validProfileUsers,      
        validCustomerUser:validCustomerUser,      
        validRecovery:validRecovery,      
        validRecoveryToken:validRecoveryToken,      
        validRotatorType:validRotatorType,
        validSupport:validSupport,
        
        
    },emailReg=new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/),float=new RegExp(/^[0-9]+([.])?([0-9]+)?$/),textNumber =new RegExp(/^[0-9a-zA-Z]+$/),textonly=new RegExp(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\']+$/),
    httpReg=new RegExp(/(https|http)\:\/\/[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+$/)

    function disabledButtons (bol){$("button").attr("disabled",bol)}

    function message(message,type,title) {
        notificationService.removeNotifications();
        setTimeout(function() {
            if (type) notificationService.error(message);
            else notificationService.success(message);
        },1000)
    }
    function info(message) {
        notificationService.removeNotifications();
        notificationService.info(message)
    }
    var valid=false;
    function evalError(error,unauthorize) {
        disabledButtons(false);
        console.log(error);
        if (error && error.status==401) {
            if (!unauthorize && !valid) message("No estas autorizado para entrar al sistema - Por favor Inicia Sesion",true);
            localStorage.removeItem("koomper-token");
            localStorage.removeItem("koomper-sec");
            valid=true;
            $state.go("login");
        }else{
            if(error.data && error.data.errors)
            {
                var field=translate[Object.keys(error.data.errors)[0]]?translate[Object.keys(error.data.errors)[0]]:Object.keys(error.data.errors)[0];
                message(field +" - "+ error.data.errors[(Object.keys(error.data.errors)[0])],true);
            }
            else if(error.data && error.data.raise)
            {
                if (error.data.raise.length) {  
                    message(error.data.raise[0].field+" - "+error.data.raise[0].error,true);
                }else{
                    message(Object.keys(error.data.raise)[0] +" - "+ error.data.raise[(Object.keys(error.data.raise)[0])],true);
                }
            }
            else
            {
                console.log(4);
                message("Ha ocurrido un error - Intentelo de nuevo mas tarde",true);
            }
        }

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

/*

        swal({
            title:($filter('translate')("Warning")),
            text: message,
            type: "warning",
            showCancelButton: true,
            confirmButtonText:($filter('translate')("Yes, I`m agree")),
            cancelButtonText: ($filter('translate')("Don`t accept")) 
        })
    */    }

    function validPlans(data) {
        if (!data.name){message($filter('translate')("The Name field can not be empty"),true);return false;}
        if (!data.price){message($filter('translate')("Price field can not be empty"),true);return false;}
        if (!data.impressions){message($filter('translate')("Number of Impressions field can not be empty"),true);return false;}
        if (!data.max_users){message($filter('translate')("The Number of Users field can not be empty"),true);return false;}
        if (!data.description){message($filter('translate')("The Desciption field can not be empty"),true);return false;}
        return true;
    }

    function validRotatorType(data) {
        if (!data.id){message($filter('translate')("There is no Banner supplied"),true);return false;}
        if (!data.action_rotator){message($filter('translate')("Rotator type field can not be empty"),true);return false;}
        if (!data.rotator.length){message($filter('translate')("There are no rotators to accomplish this task,"),true);return false;}
        console.log(data.rotator);
        var percent=0;
        $.map(JSON.parse(data.rotator),function (val,ind) {
            percent+=parseInt(val.percent);            
        })
        console.log(percent);        
        if (percent!=100) {     
            message($filter('translate')("To continue, the sum of rotators should be 100(%)"),true);return false;            
        }

        return true;
    }

    function validCustomerUser(data) {

        console.log(data);
        if (!data.first_name){message($filter('translate')("The Name field can not be empty"),true); return false;}
        if (!data.last_name){message($filter('translate')("Last name field can not be empty"),true); return false;}
        if (!data.email){message($filter('translate')("The Email field can not be empty"),true); return false;}
        if (!data.confirm_email){message($filter('translate')("The Confirm Password field can not be empty"),true); return false;}
        if (data.password || data.confirm_password) {   
            if (!data.password){message($filter('translate')("The Password field can not be empty"),true);return false;}
            if (!data.confirm_password){message($filter('translate')("The Confirm Password field can not be empty"),true);return false;}
            if (data.password!=data.confirm_password){message($filter('translate')("The Confirm Password field must match the Password"),true);return false;}
        }
        if (data.email || data.confirm_email) { 
            if (!data.email){message($filter('translate')("The E-mail field can not be empty"),true);return false;}
            if (!emailReg.test(data.email)) {message($filter('translate')("The E-mail field does not have the appropriate format EJ: correo@electronico.com"),true);return false;}
            if (data.email!=data.confirm_email){message($filter('translate')("The E-mail field must match Confirm Mail"),true);return false;}
        }
        return true;


    }

    function validRecovery(data) {
        if (!data){message($filter('translate')("The E-mail field can not be empty"),true);return false;}
        if (data.email || data.confirm_email) { 
            if (!data.email){message($filter('translate')("The E-mail field can not be empty"),true);return false;}
            if (!emailReg.test(data.email)) {message($filter('translate')("The E-mail field does not have the appropriate format EJ: correo@electronico.com"),true);return false;}
            if (data.email!=data.confirm_email){message($filter('translate')("The E-mail field must match Confirm Mail"),true);return false;}
        }
        return true;
    }

    function validRecoveryToken(data) {
        if (!data){message($filter('translate')("The Password field can not be empty"),true);return false;}
        if (data.password || data.confirm_password){   
            if (!data.password){message($filter('translate')("The Password field can not be empty"),true);return false;}
            if (!data.confirm_password){message($filter('translate')("The Confirm Password field can not be empty"),true);return false;}
            if (data.password!=data.confirm_password){message($filter('translate')("The Confirm Password field must match the Password"),true);return false;}
        }
        return true;
    }

    function validBanner(data) {
        console.log(data);
        if (!data.name){message($filter('translate')("Banner Name field can not be empty"),true);return false;}
        if (!data.width){message($filter('translate')("Banner width field can not be empty"),true);return false;}
        if (!data.height){message($filter('translate')("The Alto del Banner field can not be empty"),true);return false;}
        if (!data.size){message($filter('translate')("Banner Size field can not be empty"),true);return false;}
        return true;
    }

    function validRotator(data) {
        console.log(data);
        if (!data.name){message($filter('translate')("Rotator title field can not be empty"),true); return false;}
        if (!data.url_site){message($filter('translate')("The URL Link Field of the Rotator can not be empty"),true); return false;}
        if (!httpReg.test(data.url_site)){message($filter('translate')("The Rotator Url Link Format is incorrect"),true); return false;}
        if (data.types==1 && !data.library_id){message($filter('translate')("An error occurred - The selected Library is not registered"),true); return false;}
        if (data.types==2 && !data.html){message($filter('translate')("You must specify the html code to use on the rotator"),true); return false;}
        if (!data.banner_id){message($filter('translate')("An error has occurred - You have not yet registered the Rotator Banner"),true); return false;}
        return true;
    }

    function validProfileUsers(data){
        if (!data.image){message($filter('translate')("The Profile Image its neccesary"),true); return false;}
        if (!data.first_name){message($filter('translate')("The Name field can not be empty"),true); return false;}
        if (!data.last_name){message($filter('translate')("Last name field can not be empty"),true); return false;}
        if (data.password || data.confirm_password) {   
            if (!data.password){message($filter('translate')("The Password field can not be empty"),true);return false;}
            if (!data.confirm_password){message($filter('translate')("The Confirm Password field can not be empty"),true);return false;}
            if (data.password!=data.confirm_password){message($filter('translate')("The Confirm Password field must match the Password"),true);return false;}
        }
        if (data.email || data.confirm_email) { 
            if (!data.email){message($filter('translate')("The E-mail field can not be empty"),true);return false;}
            if (!emailReg.test(data.email)) {message($filter('translate')("The E-mail field does not have the appropriate format EJ: correo@electronico.com"),true);return false;}
            if (data.email!=data.confirm_email){message($filter('translate')("The E-mail field must match Confirm Mail"),true);return false;}
        }
        if (!data.country_id){message($filter('translate')("Country field can not be empty"),true); return false;}
        if (!data.company){message($filter('translate')("The Company field can not be empty"),true); return false;}
        if (!data.position){message($filter('translate')("The Position field can not be empty"),true); return false;}
        return true;
    }

    function validUsers(data){
        console.log(data);
        if (!data.first_name){message($filter('translate')("The Name field can not be empty"),true); return false;}
        if (!data.last_name){message($filter('translate')("Last name field can not be empty"),true); return false;}
        if (data.password || data.confirm_password) {   
            if (!data.password){message($filter('translate')("The Password field can not be empty"),true);return false;}
            if (!data.confirm_password){message($filter('translate')("The Confirm Password field can not be empty"),true);return false;}
            if (data.password!=data.confirm_password){message($filter('translate')("The Confirm Password field must match the Password"),true);return false;}
        }
        if (data.email || data.confirm_email) { 
            if (!data.email){message($filter('translate')("The E-mail field can not be empty"),true);return false;}
            if (!emailReg.test(data.email)) {message($filter('translate')("The E-mail field does not have the appropriate format EJ: correo@electronico.com"),true);return false;}
            if (data.email!=data.confirm_email){message($filter('translate')("The E-mail field must match Confirm Mail"),true);return false;}
        }
        if (!data.country){message($filter('translate')("Country field can not be empty"),true); return false;}
        if (!data.company){message($filter('translate')("The Company field can not be empty"),true); return false;}
        if (!data.position){message($filter('translate')("The Position field can not be empty"),true); return false;}
        return true;
    }

    function validEditUsers(data){
        console.log(data);
        if (!data.image){message($filter('translate')("The Profile Image its neccesary"),true); return false;}
        if (!data.first_name){message($filter('translate')("The Name field can not be empty"),true); return false;}
        if (!data.last_name){message($filter('translate')("Last name field can not be empty"),true); return false;}
        if (!data.confirm_email){message($filter('translate')("The Confirm Password field can not be empty"),true); return false;}
        if (!data.email){message($filter('translate')("The Email field can not be empty"),true); return false;}
        if (!data.country){message($filter('translate')("Country field can not be empty"),true); return false;}
        if (!data.company){message($filter('translate')("The Company field can not be empty"),true); return false;}
        if (!data.position){message($filter('translate')("The Position field can not be empty"),true); return false;}
        if (data.password || data.confirm_password) {   
            if (!data.password){message($filter('translate')("The Password field can not be empty"),true);return false;}
            if (!data.confirm_password){message($filter('translate')("The Confirm Password field can not be empty"),true);return false;}
            if (data.password!=data.confirm_password){message($filter('translate')("The Confirm Password field must match the Password"),true);return false;}
        }
        if (data.email || data.confirm_email) { 
            if (!data.email){message($filter('translate')("The E-mail field can not be empty"),true);return false;}
            if (!emailReg.test(data.email)) {message($filter('translate')("The E-mail field does not have the appropriate format EJ: correo@electronico.com"),true);return false;}
            if (data.email!=data.confirm_email){message($filter('translate')("The E-mail field must match Confirm Mail"),true);return false;}
        }
        return true;
    }

    function validSupport(data){
        console.log(data);
        if (!data.message){message($filter('translate')("The Message field can not be empty"),true); return false;}
        return true;
    } 


    return listFunc;
}