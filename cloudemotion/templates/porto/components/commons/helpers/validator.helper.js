mainApp.factory('ValidatorHelper', ValidatorHelper)
ValidatorHelper.$inject=["$http","$rootScope","$q","$state","ENDPOINT","$filter"]
function ValidatorHelper($http,$rootScope,$q,$state, ENDPOINT,$filter) {
	var listFunc= {
		message:message,
		confirm:confirm,
		validContact:validContact
		

	},emailReg=new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/),float=new RegExp(/^[0-9]+([.])?([0-9]+)?$/),textNumber =new RegExp(/^[0-9a-zA-Z]+$/),textonly=new RegExp(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\']+$/);

	function message(message,type,title) {
		return swal({
			title: (title?title:'¡We are sorry!'),
			text: message,
			type: type,
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Aceptar'
		})
	}

	function confirm(message) {
		return swal({
			title: "¡Atencion!",
			text: message,
			type: "warning",

			showCancelButton: true,
			/*  confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			*/
			confirmButtonText: 'Si, ¡estoy de acuerdo!',
			cancelButtonText: 'No acepto'
		})
	}
	function validContact(data) {
		 emailReg=new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)
        if(!data.name){
          console.log('error name');
          $('.contact-name').css('border-bottom','1px solid #d81313');
          message($filter('translate')("The Name field can not be empty"),"error")
          return false;
        }
        if(!data.subject){
          $('.contact-subject').css('border-bottom','1px solid #d81313');
          message($filter('translate')("The Subject field can not be empty"),"error")
          return false; 
        }
        if(!data.email){
            $('.contact-email').css('border-bottom','1px solid #d81313');
            message($filter('translate')("The Email field can not be empty"),"error")
            return false;           
        } 
        if(!emailReg.test(data.email)){
            $('.contact-email').css('border-bottom','1px solid #d81313');
            message($filter('translate')("The E-mail field does not have the appropriate format EJ: correo@electronico.com"),"error")
            return false; 
        }       
        if(!data.message){
          $('.contact-message').css('border-bottom','1px solid #d81313');
          message($filter('translate')("The Message field can not be empty"),"error")
          return false; 
        } 
        return true;      
	}

	return listFunc;
}
