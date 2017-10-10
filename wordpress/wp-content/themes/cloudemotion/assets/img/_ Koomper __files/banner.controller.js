koomper.controller('BannerController',BannerController)

BannerController.$inject=["$scope","$filter","$stateParams","$filter","ValidatorHelper","SessionService","LibrariesService","BannerService", "DashboardService"]

function BannerController ($scope,$filter,$stateParams,$filter,ValidatorHelper,SessionService,LibrariesService,BannerService, DashboardService) {

    var vm=this,
    sizes=BannerService.getSizes();
    angular.extend(vm,{
       editRotator:editRotator,
       setEdit:setEdit,
       setEditar:setEditar,
       setActions:setActions,
       rotator:[],
   })

    this.$onInit=function() {
        console.log($stateParams);
        if ($stateParams.rotator) {
            BannerService.getBanner({},$stateParams.rotator).then(function(response) {
                vm.banner=response.data
                vm.rotator=response.data.rotator;
                console.log(vm.rotator);
            },function(error) {
                console.log(error);
            })
        }
        DashboardService.getDasboardCustomer().then(function(response) {
            vm.dashboard=response.data
        },function(error) {
            console.log(error);
        })
    }

    function setActions(index,rotator,status) {
        var data={banner_id:vm.banner.id,id:rotator.id,pause:status};
        BannerService.setPause(data,true).then(function(response) {
            ValidatorHelper.message($filter('translate')("The status of the Actual Banner was changed to")+": "+(!status?$filter('translate')("Play"):$filter('translate')("Pause")),false);
            vm.rotator[index]=response.data;
        }, function (error) {
            console.log(error);
        });
    }


    function setEditar(index,data) {
        data.index=index;
        data.date_time_start=$filter("date")(data.date_time_start,'yyyy-MM-dd H:m')
        data.date_time_end=$filter("date")(data.date_time_end,'yyyy-MM-dd H:m')
        console.log(data);
        vm.targetRotator=angular.copy(data);
    }

    function setEdit() {
        var data=angular.copy(vm.banner);
        if (ValidatorHelper.validBanner(data)) {   
            BannerService.addBanner(data).then(function(response) {
                vm.banner.id=response.data
            }, function(error) {
            })
        }
    }

    function editRotator() {
        var data=angular.copy(vm.targetRotator);
        data.date_time_start=$("#init").val()
        data.date_time_end=$("#end").val()
        console.log(data);
        ValidatorHelper.confirm($filter('translate')('Are you sure you want to edit the Selected Banner?')).then(function() {
            BannerService.editRotator(data,data.id).then(function(response) {
                response.data[0].date_time_start=$filter("date")(response.data[0].date_time_start,'yyyy-MM-dd H:m')
                response.data[0].date_time_end=$filter("date")(response.data[0].date_time_end,'yyyy-MM-dd H:m')
                
                response.data[0].id=response.data[0].rotador_id;
                vm.rotator[vm.targetRotator.index]=response.data[0]
                $("#editRotator").modal('hide');
            }, function(error) {
            })
        })   
        
    }





}
