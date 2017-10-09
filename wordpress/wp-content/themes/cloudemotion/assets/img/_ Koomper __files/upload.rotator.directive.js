koomper.directive('uploadRotator', UploadRotator);

UploadRotator.$inject=["ENDPOINT","$http","ValidatorHelper","urlHelpers","BannerService","TimerService","$filter","$location","$state"];
function UploadRotator(ENDPOINT,$http,ValidatorHelper,urlHelpers,BannerService,TimerService,$filter,$location,$state) {
	var options={
		restrict: 'E',
		link: linkFun,
		scope:{uploaded:"=?",targetId:"=?"},
		templateUrl: './components/commons/directives/views/upload.rotator.view.directive.html',
	}


	function linkFun (scope, iElement, iAttrs) {


		scope.target={};
		scope.uploaded=[];
		scope.$watch("target",function(news,olds) {
			if(Object.keys(news).length){
				news.types=1;
				news.library={
					url:news.file,
					size:TimerService.bytesToSize(news.size),
					type:news.content_type,
					name:news.name,
				}
				console.log(news);
				scope.uploaded.push({file:"",data:news});
				console.log(scope.uploaded);
				scope.safeApply();
			}

		})
		scope.test=function(){
			$('#paperclip').modal('hide');
			setTimeout(function() {
				$state.go('client.dashboard');
			}, 1000);
		}

		scope.saveHtml=function (data,target){
			if(!data){ ValidatorHelper.message($filter("translate")("The HTML can not be empty"),true); return false;}
			if(!target && scope.targetId){
				var result={
					banner_id:scope.targetId,
					name:"",
					url_site:"",
					types:2,
					html:data
				}
				$('#froalaEditor').modal('hide');
				scope.uploaded.push({file:"",data:result});
				console.log(result);
			}
		}
		
		scope.setHtml=function(data,index) {
			console.log(data);
			if (data.types==2) {
				scope.editable=data;	
				scope.editable.index=index;	
				scope.myHtml=data.html;
				console.log(scope.myHtml);
			}
		}

		var sizeType=["KB","MB","GB","TB"],
		options={
			method:"POST",
			url:ENDPOINT+"library/",
			withCredentials: false,
			headers: {
				'Content-Type': undefined
			},
			transformRequest: angular.identity,
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

		scope.saveAll=function(rotators,banner) {
			var rotators=angular.copy(rotators);
			var unsavedRotators=[];
			scope.flag=false;
			$.map(rotators,function(val,ind) {
				if (!val.data.id) {
					val.data.banner_id=scope.targetId.id;
					if (val.data.type==2) delete val.data.library_id;
					if (ValidatorHelper.validRotator(val.data)) {	
						unsavedRotators.push(val.data);
					}else{
						scope.flag=true;
					}
				}
			})
			if (!scope.flag) {      
				if (!unsavedRotators.length) {
					$("#paperclip").modal("show");
					scope.targetClip=BannerService.getIframe(banner);

					return false;
				}
				BannerService.massiveRotator(unsavedRotators).then(function(response) {
					scope.uploaded=[]
					$.map(response.data,function(val,ind) {
						val.id=val.rotador_id?val.rotador_id:true;
						scope.uploaded.push(val)
					})
					$("#paperclip").modal("show");
					scope.targetClip=BannerService.getIframe(banner);
				},function(error) {
					console.log(error);
				})
			}
		}

		scope.setRotator=function(rotator,bol,index) {

			var data=angular.copy(rotator),result={};
			if (bol) {
				result={
					banner_id:scope.targetId.id,
					library_id:data.id,
					name:data.name,
					url_site:data.url_site,
				}
			}else{
				data.banner_id=scope.targetId.id;
				delete data.url_update;
				delete data.user;
				delete data.data;
				result=data;
			}
			if (rotator.types==2) {
				result.html=scope.myHtml;
			}
			console.log(result);
			if (ValidatorHelper.validRotator(result)) {   
				(bol?BannerService.editRotator:BannerService.addRotator)(result,(bol?rotator.id:"")).then(function(response) {
					console.log(response.data);
					if (bol) {
						$.map(response.data,function(val,ind) {
							val.id=val.rotador_id;
							delete val.rotador_id;
						})
					}
					var result=(bol?response.data[0]:response.data);
					scope.uploaded[index]={file:"",data:result};
					$('#froalaEditor').modal('hide');

				}, function(error) {
					console.log(error);
				})
			}
		}

		scope.deleteFile=function(data,index) {
			console.log(data);   
			console.log(index);
			scope.uploaded[index].data.percent=50;
			if (data.id) {
				BannerService.delRotator(data).then(function(response) {
					scope.uploaded.splice(index, 1);
					scope.safeApply();
				},function(error) {
					delete scope.uploaded[index].data.percent;
					console.log(error);
				})
			}else{					
				scope.uploaded.splice(index, 1);
				scope.safeApply();
			}
			
		}

		scope.triggerFile=function(file) {
			console.log(file);
			$.map(file.files,function(val,ind) {
				scope.safeApply(function() {
					scope.uploaded.push({file:val,data:{}});
					console.log(scope.uploaded);
				})
				
			})
		}
	}
	return options;
}
