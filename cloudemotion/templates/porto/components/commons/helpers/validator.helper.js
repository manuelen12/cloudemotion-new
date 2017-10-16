mainApp.factory('ValidatorHelper', ValidatorHelper)
ValidatorHelper.$inject=["$http","$rootScope","$q","$state","ENDPOINT"]
function ValidatorHelper($http,$rootScope,$q,$state, ENDPOINT) {
	var listFunc= {
		message:message,
		confirm:confirm,
		

	},emailReg=new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/),float=new RegExp(/^[0-9]+([.])?([0-9]+)?$/),textNumber =new RegExp(/^[0-9a-zA-Z]+$/),textonly=new RegExp(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\']+$/);

	function message(message,type,title) {
		return swal({
			title: (title?title:'¡Lo sentimos!'),
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

	return listFunc;
}
