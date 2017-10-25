mainApp
.run(Run)
.config(Config);

Run.$inject=['$rootScope','$state','$stateParams','$timeout','$window']

function Run($rootScope, $state, $stateParams, $timeout, $window) {
  
}

Config.$inject=["$stateProvider", "$urlRouterProvider", "$locationProvider", "$httpProvider"];
function Config($stateProvider, $urlRouterProvider, $locationProvider, $httpProvider) {

  $urlRouterProvider.otherwise('/status');
  $stateProvider

  /*###################################*/
  /*#########Pagina Principal##########*/
  /*###################################*/

  .state("home", {
      url: "/curriculum/:id/:lang",
      templateUrl: './components/cv/cv.view.html',
      controller: 'CurriculumCtrl',
      controllerAs: 'vm',
      data: {
        permission: 'login'
      }
    }) 
  $locationProvider.html5Mode(true);
}

