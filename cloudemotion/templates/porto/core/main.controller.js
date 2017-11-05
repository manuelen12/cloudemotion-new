mainApp.controller('MainCtrl', MainCtrl)
MainCtrl.$inject=["$rootScope","$scope","PortfolioService","$stateParams"]
function MainCtrl($rootScope,$scope,PortfolioService,$stateParams) {
    var vm = this;
    angular.extend(vm,{
        prueba:"hola mundo2",
        show:true,        
    });
    console.log($rootScope);
}