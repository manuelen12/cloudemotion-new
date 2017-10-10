koomper.controller('Rotator_LibraryController',Rotator_LibraryController)

Rotator_LibraryController.$inject=["$scope","SessionService","LibrariesService","ValidatorHelper","$filter"]

function Rotator_LibraryController ($scope,SessionService,LibrariesService,ValidatorHelper,$filter) {
	var vm=this;
	angular.extend(vm,{
		deleteLibrary : deleteLibrary,
		paginator:{helper: LibrariesService.getLibraries,current:1,count:10,sorting:true,type_request:1},
	})

    this.$onInit=function(){
		if ($(".progress .progress-bar")[0]){
    		$('.progress .progress-bar').progressbar();
		}
	}
	
	function deleteLibrary(id,data) {
		ValidatorHelper.confirm($filter('translate')("Are you sure to delete this Item?")).then (function(){
			LibrariesService.deleteLibrary(data).then(function(){
			var data=angular.copy(data);
				vm.paginator.table.reload();
			},function(error) {
				console.log(error);
			});
			
		})
		
	}
	
	console.log('Rotator_LibraryController');
}

