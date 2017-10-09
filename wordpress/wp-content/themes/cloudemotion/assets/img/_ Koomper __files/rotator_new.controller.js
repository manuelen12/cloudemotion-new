koomper.controller('Rotator_NewController',Rotator_NewController)

Rotator_NewController.$inject=["$scope","$stateParams","$filter","ValidatorHelper","SessionService","LibrariesService","BannerService","TimerService"]

function Rotator_NewController ($scope,$stateParams,$filter,ValidatorHelper,SessionService,LibrariesService,BannerService,TimerService) {
	console.log('Rotator_NewController');

    var vm=this
    angular.extend(vm,{
       addBanner:addBanner,
       selected:[],
       banner:{rotator:[]},
       setSizes:setSizes,
       types:true,
       myHtml:"<h1>Hello World</h1>",
       froalaOptions : {}
   })
    this.$onInit=function() {
        if ($stateParams.rotator) {
            BannerService.getBanner({},$stateParams.rotator).then(function(response) {
                $.map(response.data.rotator,function(val,ind) {
                    val.library.size=TimerService.bytesToSize(val.library.size)
                    response.data.rotator[ind]={file:"",data:val};
                })
                console.log(response.data);
                vm.rotator=response.data;
                vm.rotator.edit=true;
                vm.size={};
                vm.size.name = vm.rotator.width+"x"+vm.rotator.height;
                console.log(vm.sizes);
                $.map(vm.sizes,function(val,ind){
                    if(vm.size.name == val.name){
                        vm.rotator.size=val;
                        console.log(vm.rotator.size);
                    }
                })
                if(response.data) vm.types=false; 
            },function(error) {
                console.log(error);
            })

        }
    }

    BannerService.getSizes({},$stateParams.rotator).then(function(response) {
        console.log(response.data);
        vm.sizes=response.data;

        
    },function(error) {
        console.log(error);
    })

    function setSizes() {
        vm.rotator.width=vm.rotator.size.width;
        vm.rotator.height=vm.rotator.size.height;
    }

    function addBanner() {
        var data=angular.copy(vm.rotator);
        if (ValidatorHelper.validBanner(data)) {   
            BannerService.addBanner(data).then(function(response) {
                vm.rotator.id=response.data
                console.log(response);
            }, function(error) {
                console.log(error);
            })
        }
    }
}
