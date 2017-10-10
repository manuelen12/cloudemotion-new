
(function() {
  'use strict';
  koomper
  .directive('customPaginator', pagDirective);

  pagDirective.$inject = ['$state', 'NgTableParams', '$filter'];

  function pagDirective($state, NgTableParams, $filter) {
    return {
        restrict: 'E',
        link: linkFunc,
        controller: PaginatorController,
        controllerAs: 'vm',
        transclude: true,
        template: '<div ng-transclude></div>',
        scope:{tableSorting:"=",getList:"=",currentPage:"=",currentCount:"=",orderBy:"=?",filters:"=?",activeSearch:"=?",target:"=?",search:"=?"},
        bindToController: true // because the scope is isolated

    };
    

    function linkFunc(scope, iElm, iAttrs) {
        scope.$watch("vm.activeSearch",function(val) {
            console.log(scope.vm)
            var exist=[];
            if(scope.vm.filters) $.map(Object.values(scope.vm.filters),function(nx,ind) {if (nx) {exist.push(nx)}})
            if (!exist.length) scope.vm.filters= {};
            if (val) scope.vm.tableSorting.reload();
            scope.vm.activeSearch=false;
        })
        scope.$watch("vm.search",function(val) {
           scope.vm.tableSorting.reload();
       })

        if (scope.vm.getList) {
            scope.vm.tableSorting = new NgTableParams({
                page: scope.vm.currentPage,
                count: scope.vm.currentCount,
            }, {
                total:0,
                getData: function(params) {
                    scope.vm.currentPage = params.page();
                    var sorting=params.sorting(),
                    parameters={
                        paginator:{
                            page:scope.vm.currentPage, 
                            page_results:(params.count()?params.count():scope.vm.currentCount),
                        }
                    };
                    if (scope.vm.search) parameters.search=scope.vm.search;
                    if (Object.keys(sorting).length) {
                        var sortable=[((Object.values(sorting)[0]=="asc")?"+":"-")+Object.keys(sorting)[0]];
                        parameters.ordening=["-id",sortable]
                    }
                    if (scope.vm.filters && Object.keys(scope.vm.filters).length) {
                        parameters.filters=scope.vm.filters;
                    }
                    if (scope.vm.orderBy && scope.vm.orderBy.length) {
                        parameters.ordening=["-id"];
                        parameters.ordening=[parameters.ordening.concat(scope.vm.orderBy)]
                    }else parameters.ordening=[["-id"]];
                    console.log(scope.vm.target);
                    return scope.vm.getList(parameters, scope.vm.target)
                    .then(function(response) {
                        params.total(response.data.total_results)
                        scope.vm.tableSorting.total(response.total)
                        return response.data.data;
                    });

                }
            });

        }
    }
}

PaginatorController.$inject=["$scope"];
function PaginatorController($scope) {
    var vm=this;
}

})();