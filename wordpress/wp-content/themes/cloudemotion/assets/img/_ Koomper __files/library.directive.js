koomper.directive('listLibrary', ListLibrary);

ListLibrary.$inject=["ENDPOINT","$filter","ValidatorHelper","LibrariesService"];
function ListLibrary(ENDPOINT,$filter,ValidatorHelper,LibrariesService) {
	var options={
		restrict: 'E',
		link: linkFun,
		scope:{multiple:"=?",libraries:"=?",targetId:"=?",selected:"=?"},
		templateUrl: './components/commons/directives/views/library.view.directive.html',
	}
	function linkFun (scope, iElement, iAttrs) {

		scope.paginator={current:1,size:12,total:0},

		scope.setSelected= function (data,index) {
			var data=angular.copy(data);
			/*scope.selected=$filter('setbyid')(data,scope.selected,data.bol,index);*/
			data.library_id=data.id;
			delete data.id;
			scope.selected=data
		}

		scope.getData= function () {
			var parameters={
				paginator:{
					page:scope.paginator.current, 
					page_results:scope.paginator.size,
				}
			};
			LibrariesService.getLibraries(parameters).then(function(response) {
				scope.libraries=response.data.data;
				scope.paginator.total=response.data.total_results
				scope.libraries=$filter('setdata')(scope.selected,scope.libraries);
			}, function(error) {
				console.log(error);
			})
		}
		scope.getData();
	}
	return options;
}
