koomper.factory('PaymentsService', PaymentsService)
PaymentsService.$inject=["$http","$state","urlHelpers"]
function PaymentsService($http,$state,urlHelpers) {
	var methods = {
		getPay : getPay,
		getStadistics : getStadistics,
		setPayment : setPayment,
		deletePaymentMethod:deletePaymentMethod,
	}

	function getPay(data){
		return urlHelpers.get("plans_user/",data);
	}
	function getStadistics(data){
		return urlHelpers.get("payments_stadistics/",data);
	}

	function setPayment(data) {
		return urlHelpers.post("payment_plans/",data);
	}
	
	function deletePaymentMethod(data) {
		return urlHelpers.del("payment_plans/",data.id,"plan");
	}
	
	console.log('Payment Service');
	
	return methods;
}
