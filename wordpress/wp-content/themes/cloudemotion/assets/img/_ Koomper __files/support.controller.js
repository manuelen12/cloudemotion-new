koomper.controller('SupportController',SupportController)
SupportController.$inject=["$scope","$filter","SupportService","ValidatorHelper"]
function SupportController ($scope,$filter,SupportService,ValidatorHelper) {

	var vm=this;
	angular.extend(vm,{
		support:{},
		user:angular.copy($scope.user),
		sendEmail:sendEmail,
	})

	vm.user.first_name=vm.user.first_name+" "+vm.user.last_name;
	//console.log(vm.support)
	//console.log(vm.user)

    this.$onInit=function() {

	// Progressbar
		if ($(".progress .progress-bar")[0]) {
    		$('.progress .progress-bar').progressbar();
		}
	// /Progressbar

	}

	function sendEmail() {
		//console.log(vm.support);
		var email=angular.copy($scope.user.email);
		var name=angular.copy($scope.user.first_name)+' '+angular.copy($scope.user.last_name);
		vm.support.name=name;
		vm.support.email=email;
		//console.log(vm.support.name);
		if (ValidatorHelper.validSupport(vm.support)) {
			SupportService.sendEmail(vm.support).then(function(response) {
				ValidatorHelper.message($filter("translate")("Your message has been successfully sent"),false);
				console.log(response);
				vm.support = {}
			}, function(error) {
				console.log(error);
			})
		}

	}

}