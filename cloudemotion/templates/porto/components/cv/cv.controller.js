mainApp.controller('CurriculumCtrl', CurriculumCtrl)
CurriculumCtrl.$inject=["$rootScope","$scope","PortfolioService","$stateParams","particles"]
function CurriculumCtrl($rootScope,$scope,PortfolioService,$stateParams,particles) {
  var vm = this;
  angular.extend(vm,{
    prueba:"hola mundo2",
    params: '',
    show:true,
    click1:click1,
    test:true,
  });

  $rootScope.$on('$viewContentLoaded', function(event, toState, toParams, fromState, fromParams) {
    console.log("cargo");
    /*$('.progress').on('appear',function(){*/
      console.log('asldl');
      InitProgressBar('.myBar'); 
      /*});*/    
      initOwl('.owl-education');
      initOwlCourse('.owl-carousel1');


      console.log($stateParams);
      var id = $stateParams.id;
      function click1(link) {
        var body =   $("html, body");
        var top  =   $(link).offset().top;
        active.find("li").removeClass('active');
        body.stop().animate({scrollTop:top},1000,'swing',function(){});
      }
      //GET CLASS THE PORTFOLIO
      PortfolioService.getClass().then(function(response){

      })

      //GET CV FOR USER
      PortfolioService.getCv(vm.params,id).then(function(response){
        console.log(response);
        vm.users = response.data;
        $.map(vm.users.user_education,function(val,ind){
          vm.last_education = val.education.name;
          vm.last_institute = val.institute.name;
        });
        $.map(vm.users.user_experience,function(val,ind){
          vm.last_exp_name = val.position.name
          vm.last_exp_comp = val.company.name
        })
        console.log(vm.users);
      },function(error){
        console.log(error);
      })



      this.$onInit=function(){ 
        particlesJS("particles-js",particles);       

      }
    }
