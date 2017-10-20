mainApp.controller('CurriculumCtrl', CurriculumCtrl)
CurriculumCtrl.$inject=["$scope","PortfolioService","$stateParams","particles"]
function CurriculumCtrl($scope,PortfolioService,$stateParams,particles) {
    var vm = this;
    angular.extend(vm,{
        prueba:"hola mundo2",
        params: '',
        show:true,
        click1:click1,
    });
    console.log($stateParams);
    var id = $stateParams.id;

    function click1(link) {
        var body =  $("html, body");
        var top  =  $(link).offset().top;
        var active = $(".nav");
        active.find("li").removeClass('active');
        body.stop().animate({scrollTop:top},1000,'swing',function(){});
    }

    PortfolioService.getCv(vm.params,id).then(function(response){
      console.log(response);
      vm.users = response.data;

      console.log(vm.users);
    },function(error){
      console.log(error);
    })

    this.$onInit=function(){ 
      initAnimation(window.theme,$);
      initProgressBar(window.theme,$);
      initScrollTop(window.theme,$);
      initMasonry(window.theme,$);
      initParallax(window.theme,$);
      initValidation(window.theme,$);
      /*
      initMatch(window.theme,$);
      */

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
    }
}
