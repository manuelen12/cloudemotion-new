mainApp
.run(Run)
.config(Config);

Run.$inject=['$rootScope','$state','$stateParams','$timeout','$window']

function Run($rootScope, $state, $stateParams, $timeout, $window) {
  var lang = $stateParams.lang
}

Config.$inject=["$stateProvider", "$urlRouterProvider", "$locationProvider", "$httpProvider","$translateProvider"];
function Config($stateProvider, $urlRouterProvider, $locationProvider, $httpProvider,$translateProvider) {

  /*Language*/
  $translateProvider.useStaticFilesLoader({
    prefix: 'translations/locale-',
    suffix: '.json'
  });
  $translateProvider.useSanitizeValueStrategy('escape');
  $translateProvider.preferredLanguage('es'); 
  /*Language*/
  
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

