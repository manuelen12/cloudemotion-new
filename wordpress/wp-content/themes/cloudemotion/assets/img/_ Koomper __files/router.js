koomper
.run(Run)
.config(Config);

Run.$inject=['SessionService','DashboardService','$rootScope','$state','$stateParams','$timeout','$window','ValidatorHelper']

function Run(SessionService,DashboardService,$rootScope, $state, $stateParams, $timeout, $window, ValidatorHelper) {

  SessionService.defineLanguage();

  
  function dashboard() {
    console.log($rootScope.user);
    if ($rootScope.user) {      
      var service=($rootScope.user.level==2?DashboardService.getDasboardCustomer:DashboardService.getDasboardAdmin)
      service().then(function(response) {
        $rootScope.dashboard=response.data
      },function(error) {
      })
    }
  }


  $rootScope.$on('$stateChangeStart', function(event, toState, toParams, fromState, fromParams) {
    if (localStorage.getItem("koomper-sec")) $rootScope.user=JSON.parse(localStorage.getItem("koomper-sec"));    
    dashboard()
    $rootScope.stateview=toState.data.permission;
    var token=localStorage.getItem("koomper-token");
    if (!token && toState.data.permission!="login") {
      event.preventDefault();
      ValidatorHelper.message("Debe Iniciar sesion para poder acceder al sistema","error")
      $state.go("login");
    } 
    if (token && toState.data.permission!=($rootScope.user.level==1?"admin":"client") && toState.data.permission!="shared") {
      ValidatorHelper.message("Usted no esta autorizado para entrar a este modulo","error")
      event.preventDefault();
      
      $state.go(($rootScope.user.level==1?"admin":"client")+".dashboard");

    } 
    if (token && toState.data.permission=="login") {
      console.log(3);
      console.log(3);
      console.log(3);
      console.log(3);
      console.log(3);
      console.log(3);
      console.log(3);
      event.preventDefault();
      $state.go(($rootScope.user.level==1?"admin":"client")+".dashboard");

    } 

  });

}

Config.$inject=["$stateProvider", "$urlRouterProvider", "$locationProvider", "$httpProvider", "$translateProvider"];
function Config($stateProvider, $urlRouterProvider, $locationProvider, $httpProvider, $translateProvider) {


  /*Language*/
  $translateProvider.useStaticFilesLoader({
    prefix: 'translations/locale-',
    suffix: '.json'
  });
  $translateProvider.useSanitizeValueStrategy('escape');
  /*Language*/

  $urlRouterProvider.otherwise('/');


  $stateProvider
  .state("login", {
    url: "/",
    templateUrl: 'components/authenticate/login/login.view.html',
    controller: 'LoginController',
    controllerAs: 'vm',
    data: {
      permission: 'login'
    }
  })
  .state("recover", {
    url: "/recover",
    templateUrl: 'components/authenticate/recover/recover.view.html',
    controller: 'RecoverController',
    controllerAs: 'vm',
    data: {
      permission: 'login'
    }
  })
  .state("confirmrecovery", {
    url: "/recover/code/:token",
    templateUrl: 'components/authenticate/recover/valid.recovery.view.html',
    controller: 'RecoverController',
    controllerAs: 'vm',
    data: {
      permission: 'login'
    }
  })
  .state("newuser", {
    url: "/create",
    templateUrl: 'components/authenticate/users/create.user.view.html',
    controller: 'NewUsersController',
    controllerAs: 'vm',
    data: {
      permission: 'login'
    }
  })
  .state("admin", {
    url: "/manage",
    abstract:true,
    templateUrl: 'components/admin/index_admin.html',
  })
  .state("admin.dashboard",{
    url: "/dashboard",
    templateUrl: 'components/shared/dashboard/dashboard.view.html',
    controller: 'DashboardController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })

  .state("admin.banner",{
    url: "/banner/:rotator",
    templateUrl: 'components/shared/banner/banner.view.html',
    controller: 'BannerController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })  

  .state("admin.myplans",{
    url: "/plans",
    templateUrl: 'components/admin/myplans/myplans.view.html',
    controller: 'MyPlansController',
    controllerAs: 'vm',
    data: {
      permission: 'admin'
    }
  })  
  .state("admin.users", {
    url: "/users",
    abstract: true,
    template: '<data ui-view></data>',

  })


  .state("admin.users.user",{
    url: "/user",
    templateUrl: 'components/admin/users/admin_users/admin_users.view.html',
    controller: 'UsersController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })  

  .state("admin.payments",{
    url: "/payments",
    templateUrl: 'components/shared/payments/payments.view.html',
    controller: 'PaymentsController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })  


  .state("admin.users.stadistic",{
    url: "/static",
    templateUrl: 'components/admin/users/stadistic_users/stadistic_users.view.html',
    controller: 'StadisticController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })

  .state("admin.plans", {
    url: "/plans",
    abstract: true,
    template: '<data ui-view></data>',

  })

  .state("admin.plans.payments",{
    url: "/payments",
    templateUrl: 'components/client/plans/payments/payments.view.html',
    controller: 'PaymentsClientController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })  

  /* =============   CLIENT ============= */

  .state("client", {
    url: "/customer",
    abstract:true,
    templateUrl: 'components/client/index_client.html',
  })

  .state("client.status_payment",{
    url: "/status_payment?id&pay_out&paymentld&token&PayerId",
    templateUrl: 'components/shared/payments/status.payment.view.html',
    controller: 'StatusPaymentsController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })


  .state("client.analytics", {
    url: "/analytics",
    abstract:true,
    template: '<data ui-view></data>',
  })

  .state("client.analytics.list",{
    url: "/list",
    templateUrl: 'components/shared/analytics/analytics.view.html',
    controller: 'AnalyticsController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })

  .state("client.analytics.analytics_banners",{
    url: "/banners/:rotator_banner",
    templateUrl: 'components/shared/analytics/analytics_rotator.view.html',
    controller: 'AnalyticsController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })

/*  .state("client.prueba",{
    url: "/prueba",
    templateUrl: 'components/client/analytics/prueba-analitics.html',
    data: {
      permission: 'client'
    }
  })
  */
  .state("client.analytics.selected",{
    url: "/general/:type/:rotator/:?banner/",
    templateUrl: 'components/shared/analytics/select.analitics.view.html',
    controller: 'SelectedController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })

  .state("client.dashboard",{
    url: "/dashboard",
    templateUrl: 'components/shared/dashboard/dashboard.view.html',
    controller: 'DashboardController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })

  .state("client.banner",{
    url: "/banner/:rotator",
    templateUrl: 'components/shared/banner/banner.view.html',
    controller: 'BannerController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })  


  .state("admin.rotator", {
    url: "/rotator",
    abstract: true,
    template: '<data ui-view></data>',

  })


  .state("admin.rotator.new",{
    url: "/actions/:rotator",
    templateUrl: 'components/shared/rotator/new/rotator_new.view.html',
    controller: 'Rotator_NewController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })  

  .state("admin.rotator.library",{
    url: "/library",
    templateUrl: 'components/shared/rotator/library/rotator_library.view.html',
    controller: 'Rotator_LibraryController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })  

  .state("client.support",{
    url: "/soporte",
    templateUrl: 'components/client/support/support.view.html',
    controller: 'SupportController',
    controllerAs: 'vm',
    data: {
      permission: 'client'
    }
  })  

  .state("client.plans", {
    url: "/plans",
    abstract: true,
    template: '<data ui-view></data>',

  })


  .state("client.plans.actions",{
    url: "/plans",
    templateUrl: 'components/admin/myplans/myplans.view.html',
    controller: 'MyPlansController',
    controllerAs: 'vm',
    data: {
      permission: 'client'
    }
  })  


  .state("client.plans.change",{
    url: "/change",
    templateUrl: 'components/client/plans/change/change_plans.view.html',
    controller: 'Change_PlansController',
    controllerAs: 'vm',
    data: {
      permission: 'client'
    }
  })  
  
  .state("client.plans.payments_history",{
    url: "/historial_pagos",
    templateUrl: 'components/client/plans/history/history.view.html',
    controller: 'HistoryController',
    controllerAs: 'vm',
    data: {
      permission: 'client'
    }
  })

  .state("client.plans.payments",{
    url: "/payments",
    templateUrl: 'components/client/plans/payments/payments.view.html',
    controller: 'PaymentsClientController',
    controllerAs: 'vm',
    data: {
      permission: 'shared'
    }
  })  





  $locationProvider.html5Mode(true);
}

