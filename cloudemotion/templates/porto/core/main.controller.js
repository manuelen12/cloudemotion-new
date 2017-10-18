mainApp.controller('MainCtrl', MainCtrl)
MainCtrl.$inject=["$scope","PortfolioService"]
function MainCtrl($scope,PortfolioService) {
    var vm = this;
    angular.extend(vm,{
        prueba:"hola mundo2",
        click:click,
        show:true,
    });

    function click(link) {
        var body =  $("html, body");
        var top  =  $(link).offset().top;
        body.stop().animate({scrollTop:top},1000,'swing',function(){});
    }

    PortfolioService.getCv().then(function(response){
      console.log(response);
    },function(error){
      console.log(error);
    })
   
    vm.experience = [{
        from:'Sep 2012',
        to:'Present',
        time:'(Five Years)',
        company:'CloudEmotion',
        city:'Texas',
        position:'Developasdasdasder Frontend',
        description: 'laslkdlaskdlñaskdlñaskdlñaskdlñaskdlaskdlñaskdñaskd'
    },{
        from:'Sep 2012',
        to:'Present',
        time:'(Five Years)',
        company:'Emptaca',
        city:'Texas',
        position:'Developer Frontend',
        description: 'laslkdlaskdlñaskdlñaskdlñaskdlñaskdlaskdlñaskdñaskd'
    }]

    vm.education = [{ 
            title: 'Tsu. Informatica',
            institute: 'UPTA "Federico Brito Figueroa"',
            years: '2010-2013'             
        },{
            title: 'Ing. Informatica',
            institute: 'UPTA "Federico Brito Figueroa"',
            years: '2013-2015',
    }];
    
    vm.courses = [{
            title:'course 1',
            institute:'asdasdas',
            years:'2011'
        },{
            title:'course 2',
            institute:'asdasdas',
            years:'2012'
        },{
            title:'course 3',
            institute:'asdasdas',
            years:'2011'
        },{
            title:'course 4',
            institute:'asdasdas',
            years:'2012'
    }];

    console.log("Funciono");
    this.$onInit=function() { 
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
    }

}