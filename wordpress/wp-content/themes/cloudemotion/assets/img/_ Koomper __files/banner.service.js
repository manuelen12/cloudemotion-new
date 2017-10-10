koomper.factory('BannerService', BannerService)
BannerService.$inject=["$http","$rootScope","BASE","$state","urlHelpers","ENDPOINT"]
function BannerService($http,$rootScope,BASE,$state,urlHelpers,ENDPOINT) {
	var methods = {
		getBanner : getBanner,
		getRotator : getRotator,
		getAnalytics : getAnalytics,
		getAnalyticsBanner : getAnalyticsBanner,
		delBanner : delBanner,
		addBanner : addBanner,
		addRotator : addRotator,
		editRotator : editRotator,
		delRotator : delRotator,
		getIframe : getIframe,
		getSizes : getSizes,
		setPause : setPause,
		setTypeActions : setTypeActions,
		massiveRotator : massiveRotator,
		
	}

	function addBanner(data){
		return urlHelpers.post("banner/",data);
	}

	function massiveRotator(data){
		return urlHelpers.post("all_rotator/",data);
	}

	function getBanner(params,id){
		var url=id?"banner/"+id+"/":"banner/";
		return urlHelpers.get(url,params);
	}

	function getRotator(params,id){
		var url=id?"rotator/"+id+"/":"rotator/";
		return urlHelpers.get(url,params);
	}

	function getAnalytics(params,id){
		var url=id?"analitycs/"+id+"/":"analitycs/";
		return urlHelpers.get(url,params);
	}

	function getAnalyticsBanner(params,id){
		var url=id?"analitycs_graphs/"+id+"/":"analitycs_graphs/";
		return urlHelpers.get(url,params);
	}

	function setTypeActions(data){
		return urlHelpers.put("action_banner/",data,data.id);
	}
	
	function addRotator(data){
		return urlHelpers.post("rotator/",data);
	}

	function editRotator(data,id){
		return urlHelpers.put("rotator/",data,id);
	}

	function delRotator(data){
		return urlHelpers.del("rotator/",data.id,"Rotator");
	}

	function delBanner(data){
		var data=angular.copy(data);	
		console.log(data);
		return urlHelpers.del("banner/",data.id, "Rotator");	
	}

	function getIframe(data){
		var token = ($rootScope.user.level==1) ? data.token : $rootScope.user.token;
		console.log(token);
		console.log($rootScope.user.level==1);
		return '<object type="text/html" class="rotator" data="'+BASE+'rotator/'+data.id+'/?token='+token+'" style="width:'+data.width+'px;height:'+data.height+'px;"></object>';	
	}

	function getSizes(params){
		return urlHelpers.get("size/",params);
	}

	function setPause(data,type){
		return (type?urlHelpers.put:urlHelpers.post)("pause_rotator/",data,(type?data.id:""));
	}
	console.log('Banner Service');
	
	return methods;
}
