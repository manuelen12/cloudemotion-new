koomper.directive('loadingPack', LoadingPack);

LoadingPack.$inject=["ENDPOINT","$http","ValidatorHelper","urlHelpers","BannerService","TimerService","$filter","$location","$state"];
function LoadingPack(ENDPOINT,$http,ValidatorHelper,urlHelpers,BannerService,TimerService,$filter,$location,$state) {
	var options={
		restrict: 'E',
		link: linkFun,
		scope:{file:"=?",output:"=?",targetId:"=?",deleteFile:"&",setHtml:"&",froala:"=html",targetImg:"="},
		templateUrl: './components/commons/directives/views/loading.pack.view.directive.html',
	}

	function linkFun (scope, iElement, iAttrs) {
		console.log("epa compa");
		scope.$watch("file", function(news,olds) {
			if (news) scope.multiload(news);
		});

		options={
			method:"POST",
			url:ENDPOINT+"library/",
			withCredentials: false,
			headers: {
				'Content-Type': undefined
			},
			transformRequest: angular.identity,
		}


		scope.saveRotator=function(banner,bol) {
			console.log(banner);
			console.log(bol);
			if (bol) {
				result={
					banner_id:scope.targetId.id,
					library_id:banner.id,
					name:banner.name,
					url_site:banner.url_site,
				}
			}else{
				banner.banner_id=scope.targetId.id;
				delete banner.url_update;
				delete banner.user;
				delete banner.data;
				result=banner;
			}
			if (banner.types==2) {
				result.html=scope.froala;
			}
			console.log(result);
			if (ValidatorHelper.validRotator(result)) {   
				(bol?BannerService.editRotator:BannerService.addRotator)(result,(bol?banner.id:"")).then(function(response) {
					console.log(response.data);
					if (bol) {
						$.map(response.data,function(val,ind) {
							val.id=val.rotador_id;
							delete val.rotador_id;
						})
					}
					scope.output=(bol?response.data[0]:response.data);
					ValidatorHelper.message("Banner "+ $filter("translate")((bol?"Edited":"Saved")));
					scope.froala="";
				}, function(error) {
					console.log(error);
				})
			}
		}

		scope.safeApply = function(fn) {
			var phase = this.$root.$$phase;
			if(phase == '$apply' || phase == '$digest') {
				if(fn && (typeof(fn) === 'function')) {
					fn();
				}
			} else {
				this.$apply(fn);
			}
		};

		function setActualPercent(e) {
			scope.output.percent=Math.round(e.loaded / e.total * 100);
			e.loaded_f=TimerService.bytesToSize(e.loaded);
			e.total_f=TimerService.bytesToSize(e.total);
			e.total_left_f=TimerService.bytesToSize(e.total-e.loaded);
			scope.output.loadData=e;
			scope.safeApply();
		}


		scope.multiload=function(file) {
			var reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onloadend = (e) => {
				scope.output.src=reader.result;
				scope.safeApply();
			};
			var formData = new FormData();
			formData.append("file",  file);
			formData.append("name",  file.name);
			options.data=formData;
			scope.file.types=1;

			
			scope.output=angular.extend({},scope.file);

			urlHelpers.uploadProgress("library/",options.data,setActualPercent)
			.then(function (response) {
				response.library={
					url:response.file,
					name:response.name,
					size:TimerService.bytesToSize(scope.file.size),
					type:file.type,
				}
				response.data=scope.file;
				response.types=1;
				response.library_id=response.id;
				delete response.id
				scope.output=response;
				scope.safeApply();
			}, function (error) {
				console.log(error);
			})
		}
	}
	return options;
}
