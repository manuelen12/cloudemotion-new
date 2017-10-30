mainApp.controller('CurriculumCtrl', CurriculumCtrl)
CurriculumCtrl.$inject=["$rootScope","$scope","PortfolioService","$stateParams","particles","$translate"]
function CurriculumCtrl($rootScope,$scope,PortfolioService,$stateParams,particles,$translate) {
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
        
        body.stop().animate({scrollTop:top},1000,'swing',function(){});
      }
      //GET LANG
      
      $translate.use($stateParams.lang);

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
        if(vm.users.user_education.length == 0){ vm.showEdu=true; }
        if(vm.users.user_course.length == 0){ vm.showCou=true; }
        //if(vm.users.user_skill.length == 0){ vm.showSki=true; }
        if(vm.users.user_portfolio.length == 0){ vm.showPort=true; }
        if(vm.users.user_nationality.length == 0){ vm.showNat=true; }
        if(vm.users.user_experience.length == 0){ vm.showExp=true; }

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
        
        PortfolioService.postContact(params).then(function(response){
          $('.form-control').css('border-bottom','1px solid #d8b113');
            console.log(response);
          })
      }
      
      this.$onInit=function(){ 
        particlesJS("particles-js",particles);       


      }
    }
