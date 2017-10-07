koomper.controller('UsersController',UsersController)
UsersController.$inject=["$scope","SessionService","UsersService","MyPlansService","ValidatorHelper","$filter","DashboardService"]
function UsersController ($scope,SessionService,UsersService,MyPlansService, ValidatorHelper,$filter,DashboardService) {
	console.log('UsersController');

	var vm=this;
	angular.extend(vm,{
		addUsers:addUsers,
		setEdit:setEdit,
		editUsers:editUsers,
		plans:[],
		stats:{total_u:0,total_active_u:0,user_pay:0},
		deleteUser:deleteUser,
		paginator:{helper: UsersService.getUsers,current:1,count:10,sorting:true},
	});

	DashboardService.getCountries().then(function(response) {
		//console.log(response.data);
		vm.countries=response.data;
	});


	this.$onInit=function() {
    	UsersService.getStadistics().then(function(response) {
    		console.log(response.data);
    		vm.stats=response.data
    	}, function (error) {
    		console.log(error);
    	});

		MyPlansService.getPlans().then(function (response) {
			//console.log(response);
			vm.plans=response.data;
		}, function(error) {
			//console.log(error);
		})
	}

	function defineLevel() {
		if (vm.userdata && vm.userdata.level!=1) {
			vm.users.level=vm.userdata.level;
		}else vm.users.level;
	}

	function setEdit(index, users) {
		console.log(users);
		vm.users=angular.copy(users);
		vm.users.index = index;
		vm.users.confirm_email = vm.users.email;
		vm.users.edit=true;
		vm.updateB = true;
		//vm.users.country = vm.users.country?vm.users.country.id:"";
		vm.users.country = vm.users.country_id?vm.users.country_id:"";
		console.log(vm.users.country);
		vm.users.plans_id = vm.users.plans?vm.users.plans.plans_id:"";
		console.log(vm.users);
		$("#modal-users").modal("show")
		defineLevel();
		//console.log(vm.users);
	}

	function addUsers() {
		//console.log(vm.users);
		defineLevel();
		if (ValidatorHelper.validUsers(vm.users)) {
			//console.log(vm.users);
			(vm.users.plans_id) ? vm.users.plans_id : vm.users.plans_id=1;
			vm.users.level = 2;
			UsersService.addUser(vm.users).then(function(response) {
				//console.log(response);
				vm.paginator.table.reload()
				ValidatorHelper.message($filter('translate')("User created"),false)
				$("#modal-users").modal("hide")
				vm.users = {}
			}, function(error) {
				console.log(error);
			})	
		}
	}


	function editUsers(){
		defineLevel();
		 var user=angular.copy(vm.users);
		if(ValidatorHelper.validUsers(user)){
			UsersService.editUser(user).then(function(response){
				vm.paginator.table.reload()
				ValidatorHelper.message($filter('translate')("Update successful"),false)
				$("#modal-users").modal("hide")
				vm.users = {}
			}, function(error) {
				console.log(error);
			})
		}
	}
	
	$('#modal-users').on('hidden.bs.modal', function () {
	  vm.updateB = false;
	})

	function deleteUser(index,data) {
		var data = angular.copy(data);
		console.log(data);
		ValidatorHelper.confirm($filter('translate')("Are you sure want delete this user?")).then(function() {
			UsersService.deleteUser(data).then(function(response){
				vm.paginator.table.reload()
			}, function(error) {
				console.log(error);
			})
		})
	}
}