mainApp.controller('CurriculumCtrl', CurriculumCtrl)
CurriculumCtrl.$inject=["$rootScope","$scope","PortfolioService","$stateParams","particles"]
function CurriculumCtrl($rootScope,$scope,PortfolioService,$stateParams,particles) {
  var vm = this;
  angular.extend(vm,{
    prueba:"hola mundo2",
    show:true,
    click1:click1,
    test:true,
    params:'',
    sendMessage:sendMessage,
    label:'ejemplo',
    contact:{},
  });

  $rootScope.$on('$viewContentLoaded', function(event, toState, toParams, fromState, fromParams) {
    console.log("cargo");
    /*$('.progress').on('appear',function(){*/
      console.log('asldl');
      InitProgressBar('.myBar'); 
      /*});*/    
      initOwl('.owl-education');
      initOwlCourse('.owl-carousel1');
      })
      console.log($stateParams);
      var id = $stateParams.id;
      //var params = {filters:{language:$stateParams.lang}};
      function click1(link) {
        var body =   $("html, body");
        var top  =   $(link).offset().top;
        active.find("li").removeClass('active');
        body.stop().animate({scrollTop:top},1000,'swing',function(){});
      }
      //GET LANG
      
      
      
      //GET CLASS THE PORTFOLIO
      PortfolioService.getClass().then(function(response){ 
        vm.classi = response.data
      });
      
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

      function sendMessage() {
        if(!vm.contact.name){
          console.log('error name');
          $('.contact-name').css('border-bottom','1px solid #d81313');
          return false;
        }
        if(!vm.contact.subject){
          $('.contact-subject').css('border-bottom','1px solid #d81313');
          return false; 
        }
        if(!vm.contact.message){
          $('.contact-message').css('border-bottom','1px solid #d81313');
          return false; 
        }
        $('.form-control').css('border-bottom','1px solid #d8b113');
        console.log(vm.contact);
      }
      
      this.$onInit=function(){ 
        particlesJS("particles-js",particles);       


      }
    }
