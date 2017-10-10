mainApp.controller('MainCtrl', MainCtrl)
MainCtrl.$inject=["$scope"]
function MainCtrl($scope) {
    var vm = this;
    angular.extend(vm,{
        prueba:"hola mundo2",
        click:click,
        show:true,
    });

    function click(link) {
        var body =  $("html, body");
        var top  =  $(link).offset().top;
        body.stop().animate({scrollTop:top},800,'swing',function(){});
    }

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
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:30,
                nav:false,    
                items:2,
            });
            $('.owl-course').owlCarousel({
                loop:true,
                margin:30,
                nav:true,    
                items:3,
            }) 
        })        
    }

}