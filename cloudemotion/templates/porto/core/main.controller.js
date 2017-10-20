mainApp.controller('MainCtrl', MainCtrl)
MainCtrl.$inject=["$scope","PortfolioService","$stateParams"]
function MainCtrl($scope,PortfolioService,$stateParams) {
    var vm = this;
    angular.extend(vm,{
        prueba:"hola mundo2",
        show:true,
    });



   /* vm.users = {
        first_name : 'Gerardo José',
        last_name  : 'Filitto Guerrero',
        email      : 'gerardofilitto@gmail.com',
        about_me   : 'Soy responsable en desarrollar tecnología ',
        birthday   : '24 de Junio',
        phone      : '+584160450524',
        skype      : 'filittogerardo',
        user_nationality: ['Venezolana'],
        position: {
            specialty: 'Developer Frontend - Angular JS',
            sities: 'CloudEmotion',
            resumen: "Bla bla bla",
        },
        user_experience: [
            {
                company: {
                    name: "CloudEmotion CA",
                    address: "Urbanizacion Valle lindo Sector 3, Calle 3 casa 7 Turmero"
                },
                position: {
                    name: "Gerente"
                },
                start_date: "2017-08-06",
                ending_date: "2017-10-15"
            },{
                company: {
                    name: "EMPTACA",
                    address: "Urbanizacion Valle lindo Sector 3, Calle 3 casa 7 Turmero"
                },
                position: {
                    name: "Gerente"
                },
                start_date: "2017-08-06",
                ending_date: "2017-10-15"
            }
        ],
        user_education:[
            {
                institute: {
                    name: "UPTA",
                    address: "La Victoria"
                },
                education: {
                    name: "TSU Informática"
                },
                start_date: "2010-07-02",
                ending_date: "2013-06-30"
            },
            {
                institute: {
                    name: "UPTA",
                    address: "La Victoria"
                },
                education: {
                    name: "ING Informática"
                },
                start_date: "2013-07-01",
                ending_date: "2015-07-30"           
            }
        ],
        
    }*/
       
    
    //vm.user_exp  = vm.users.user_experience;
    //vm.user_exp  = vm.user_exp.pop();
    //vm.education = vm.users.user_education.pop();
    
   
   
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

    /*vm.education = [{ 
            title: 'Tsu. Informatica',
            institute: 'UPTA "Federico Brito Figueroa"',
            years: '2010-2013'             
        },{
            title: 'Ing. Informatica',
            institute: 'UPTA "Federico Brito Figueroa"',
            years: '2013-2015',
    }];*/
    
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
    

}