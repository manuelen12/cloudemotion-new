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
        initSort('.image-gallery-item');     
  });
  
  console.log($stateParams);
  var id = $stateParams.id;
  function click1(link) {
    var body =   $("html, body");
    var top  =   $(link).offset().top;
    active.find("li").removeClass('active');
    body.stop().animate({scrollTop:top},1000,'swing',function(){});
  }

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

      /*initAnimation(window.theme,$);
      initScrollTop(window.theme,$);
      initMasonry(window.theme,$);
      initParallax(window.theme,$);
      initValidation(window.theme,$);*/
      /* initMatch(window.theme,$);*/      
      particlesJS("particles-js",particles);       
      var element = 1;
        /*$(window).on('scroll',function(){
        var top = $('.index').offset().top;   
           if(top >= 1430){
              if(element == 1){
                var elem = $('.myBar'); 
                var width = 1;
                
                var limite = $('.myBar').attr('data');                    
                console.log(limite);
                (limite==1) ? limite += limite : limite;
                var id =  setInterval(frame, 10);
                function frame() {
                    if (width >= limite){
                        clearInterval(id);
                        element = 2;
                    } else {
                        width++; 
                       //elem.css('width', width+'%');
                    }
                }           
              }
            }          
          })*/
        }
      }
