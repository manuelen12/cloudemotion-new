koomper.controller('Change_PlansController',Change_PlansController)

Change_PlansController.$inject=["$scope","$state","$filter","SessionService","MyPlansService","ValidatorHelper","PaymentsService"]

function Change_PlansController ($scope,$state,$filter,SessionService,MyPlansService,ValidatorHelper, PaymentsService) {
	console.log('Change_PlansController');

	var vm=this;
	angular.extend(vm,{
		changePlan:changePlan
	})
	
	MyPlansService.getPlans().then(function(response){
		vm.plans = response.data;
		console.log(vm.plans);
	})

	function changePlan(index,data) {
		var plans = {};
		plans.plans_id = data.id;
		MyPlansService.changePlan(plans).then(function(response){
			console.log(response);
			ValidatorHelper.message($filter("translate")("His change of plan was successful! Now you must access the section of outstanding payments for payment thereof and thus enjoy the benefits of your new plan."),false,true);
			$state.go(($scope.user.level==1?"admin":"client")+".plans.payments");
		})
	}
	this.$onInit=function() {
		PaymentsService.getPay().then(function(response) {
			vm.pending_plans=response.data.length;
		}, function(error) {
			console.log(error);
		});

	}
}

