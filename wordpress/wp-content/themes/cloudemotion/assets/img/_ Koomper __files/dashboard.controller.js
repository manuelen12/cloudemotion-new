koomper.controller('DashboardController',DashboardController)

DashboardController.$inject=["$scope","BannerService","ValidatorHelper","SessionService", "DashboardService","$filter","$window"]

function DashboardController ($scope,BannerService,ValidatorHelper,SessionService, DashboardService,$filter,$window) {
	console.log('DashboardController');

	var vm=this;
	angular.extend(vm,{
		paginator:{helper: BannerService.getBanner,current:1,count:10,sorting:true},
		setClipBoar:setClipBoar,
		delBanner:delBanner,
		setActions:setActions,
		setTypeActions:setTypeActions,
	})

	function setClipBoar(index,banner) { 
		console.log(banner);
		vm.targetClip=BannerService.getIframe(banner,banner.size);
	}

	function setActions(banner,status) {
		var data={banner_id:banner.id,pause:status};
		BannerService.setPause(data).then(function(response) {
			ValidatorHelper.message($filter('translate')("The status of the Actual Rotator was changed to")+": "+(!status?$filter('translate')("Play"):$filter('translate')("Pause")),false);
			console.log(response);
			banner.rotator = response.data;
		}, function (error) {
			console.log(error);
		});
		
	}

	function setTypeActions() {
		console.log(vm.targetBanner);
		var target=angular.copy(vm.targetBanner);
		var data={id:target.id,action_rotator:target.action_rotator,rotator:JSON.stringify(target.rotator)}
		if (ValidatorHelper.validRotatorType(data)) {
			BannerService.setTypeActions(data).then(function(response) {
				console.log(response);
				$('#editBanner').modal('hide');
			}, function (error) {
				console.log(error);
			});
		}
	}

	function delBanner(data) {
		ValidatorHelper.confirm($filter('translate')("Are you sure to delete this rotator?")).then(function() {

			BannerService.delBanner(data).then(function(response) {
				vm.paginator.table.reload();
				console.log(response);
				$window.location.reload();
			},function(error) {
				console.log(error);
			});

		})
	}

	this.$onInit=function() {
		SessionService.defineLanguage()
		DashboardService.getDasboardCustomer().then(function(response) {
			vm.dashboard=response.data
			console.log(response);
		},function(error) {
			console.log(error);
		})

	}

}
