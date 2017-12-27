mainApp.controller('CurriculumCtrl', CurriculumCtrl)
CurriculumCtrl.$inject=["$rootScope","$scope","PortfolioService","$stateParams","particles","$translate","$filter","ValidatorHelper"]
function CurriculumCtrl($rootScope,$scope,PortfolioService,$stateParams,particles,$translate,$filter,ValidatorHelper) {
  var vm = this;
  angular.extend(vm,{
    prueba:"hola mundo2",
    show:true,
    click1:click1,
    test:true,
    params:'',
    sendMessage:sendMessage,
    label:'',
    contact:{},    
  });

  console.log($stateParams);
  var id = $stateParams.id;
  function click1(link) {
    var body =   $("html, body");
    var top  =   $(link).offset().top;
    body.stop().animate({scrollTop:top},1000,'swing',function(){});
  };

  $translate.use($stateParams.lang);


  PortfolioService.getCv(vm.params,id).then(function(response){
    console.log(response);
    vm.users = response.data;
    $.map(vm.users.user_education,function(val,ind){
      vm.last_education = val.education.name;
      vm.last_institute = val.institute.name;
    });
    $.map(vm.users.user_experience,function(val,ind){
      vm.last_exp_name = val.position.name;
      vm.last_exp_comp = val.company.name;
    })
    vm.current_category=[];
    $.map(vm.users.user_portfolio,function(val,ind){
      if (vm.current_category.indexOf(val.classification.id) < 0) {
        vm.current_category.push(val.classification.id);
      };

    })
    console.log(vm.current_category);
    PortfolioService.getClass().then(function(response){ 
      vm.classi = [];
      $.map(response.data,function (val,ind) {

        if (vm.current_category.indexOf(val.id)>=0) {
              vm.classi.push(val)
        };
      })


    });

    if(vm.users.user_education.length == 0){ vm.showEdu=true; };
      if(vm.users.user_course.length == 0){ vm.showCou=true; };
        if(vm.users.user_portfolio.length == 0){ vm.showPort=true; };
          if(vm.users.user_nationality.length == 0){ vm.showNat=true; };
            if(vm.users.user_experience.length == 0){ vm.showExp=true; };
              console.log(vm.users);
              $rootScope.users=vm.users;
              InitProgressBar('.myBar'); 
              initOwl('.owl-education');
              initOwlCourse('.owl-carousel1');

            },function(error){
              console.log(error);
            })

  function sendMessage() {
    vm.contact.user_id = $stateParams.id;
    if(ValidatorHelper.validContact(vm.contact)){
      PortfolioService.postContact(vm.contact).then(function(response){
        $('.form-control').css('border-bottom','1px solid #d8b113');
        console.log(response);
        vm.contact = {};
      })
    }        
  }

  this.$onInit=function(){ 
    particlesJS("particles-js",particles);       
  }
}
