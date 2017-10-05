mainApp.controller('MainCtrl', MainCtrl)
MainCtrl.$inject=["$scope"]
function MainCtrl($scope) {
    var vm = this;
    angular.extend(vm,{
        prueba:"hola mundo2",
    });

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
            $('.owl-items').owlCarousel({
                loop:true,
                margin:30,
                nav:false,    
                items:2,
            }) 
        })        
    }

}