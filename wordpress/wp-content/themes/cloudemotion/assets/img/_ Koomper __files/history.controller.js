koomper.controller('HistoryController',HistoryController)

HistoryController.$inject=["$scope","SessionService"]

function HistoryController ($scope,SessionService) {
	console.log('HistoryController');

var vm=this;
angular.extend(vm,{})

    this.$onInit=function() {

	// Progressbar
		if ($(".progress .progress-bar")[0]) {
    	$('.progress .progress-bar').progressbar();
		}
	// /Progressbar

}
}