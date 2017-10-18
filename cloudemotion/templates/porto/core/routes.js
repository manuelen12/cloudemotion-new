mainApp
.run(Run)
.config(Config);

Run.$inject=['$rootScope','$state','$stateParams','$timeout','$window','ValidatorHelper']

function Run($rootScope, $state, $stateParams, $timeout, $window, ValidatorHelper) {
  

}

Config.$inject=["$stateProvider", "$urlRouterProvider", "$locationProvider", "$httpProvider"];
function Config($stateProvider, $urlRouterProvider, $locationProvider, $httpProvider) {


  $urlRouterProvider.otherwise('/status');
  $stateProvider


  /*###################################*/
  /*#########Pagina Principal##########*/
  /*###################################*/

  .state("login", {
      url: "curriculum/",
      templateUrl: './components/authentication/login/login.view.html',
      controller: 'LoginController',
      controllerAs: 'vm',
      data: {
        permission: 'login'
      }
    }) 
  $locationProvider.html5Mode(true);
}

