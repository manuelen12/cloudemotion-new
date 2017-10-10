koomper.controller('MyPlansController',MyPlansController)

MyPlansController.$inject=["$scope","SessionService","MyPlansService","ValidatorHelper","$filter"]

function MyPlansController ($scope,SessionService,MyPlansService,ValidatorHelper,$filter) {
	console.log('MyPlansController');

	var vm=this;
	angular.extend(vm,{
		addPlans: addPlans,
		editPlans: editPlans,
		pressUpdate: pressUpdate,
		refreshTable:refreshTable,	
		deletePlans:deletePlans,		
	})

	MyPlansService.getPlans().then(function(response){
		vm.plans = response.data;
		console.log(vm.plans);
	})
	
	function refreshTable() {
		MyPlansService.getPlans().then(function(response){
			vm.plans = response.data;
			console.log(vm.plans);
		})		
	}

	function addPlans(data){
		var data = angular.copy(data);
		if(ValidatorHelper.validPlans(vm.plan)){
			MyPlansService.addPlans(data).then(function(response){
				vm.plan = {};
				vm.refreshTable();
				$('#modal-id').modal('hide');
			})
		}
	}

	function editPlans(data){
		var data = angular.copy(data);
		console.log(data);
		if(ValidatorHelper.validPlans(vm.plan)){
			MyPlansService.editPlans(data).then(function(response){
				vm.plan = {};
				vm.refreshTable();
				$('#modal-id').modal('hide');
			})
		}
	}

	function deletePlans(data){
		var data = angular.copy(data);
		console.log(data);
		
			MyPlansService.deletePlans(data).then(function(){
				vm.refreshTable();
			})
		
	}

	function pressUpdate(id,data){
		vm.plan = angular.copy(data);
		vm.plan.editable = true;
		$('#modal-id').modal('show');
	}

	
}