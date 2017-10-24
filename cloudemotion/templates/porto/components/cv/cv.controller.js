mainApp.controller('CurriculumCtrl', CurriculumCtrl)
CurriculumCtrl.$inject=["$rootScope","$scope","PortfolioService","$stateParams","particles"]
function CurriculumCtrl($rootScope,$scope,PortfolioService,$stateParams,particles) {
  var vm = this;
  angular.extend(vm,{
    prueba:"hola mundo2",
    params: '',
    show:true,
    click1:click1,
  });

  $rootScope.$on('$viewContentLoaded', function(event, toState, toParams, fromState, fromParams) {
    console.log("cargo");
    /*$('.progress').on('appear',function(){*/
        console.log('asldl');
        InitProgressBar('.myBar');     
    /*});*/    
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
    $.map(vm.users.user_skill,function(val,ind){
     console.log(val.level.name);
   });
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


      $(function(){
        $('.owl-education').owlCarousel({
          loop:false,
          margin:0,
          nav:false,    
          responsive:{
            0:{
              items:1,                                                                    
            },500:{
             items:2,
           }
         }
       });
        $('.owl-carousel1').owlCarousel({
          loop: true,
          margin: 3,
          nav: true,
          navText: [
          "<i class='fa fa-left'></i>",
          "<i class='fa fa-right'></i>"
          ],              
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 3
            },
            1000: {
              items: 3
            }
          }
        })
      })
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
