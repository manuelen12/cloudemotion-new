koomper.directive('imageUpload', ImageUpload);
ImageUpload.$inject=["$http","ENDPOINT","ValidatorHelper"]
function ImageUpload($http,ENDPOINT,ValidatorHelper) {	
	// Runs during compile
	return {
		scope: {file:"=",url:"=?", title:"@"}, // {} = isolate, true = child, false/undefined = no change
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: './components/commons/directives/views/image.view.directive.html',
		link: function($scope, iElm, iAttrs, controller) {

			var sizeType=["KB","MB","GB","TB"],
			options={
				method:"POST",
				url:ENDPOINT+"upload/",
				withCredentials: false,
				headers: {
					'Content-Type': undefined
				},
				transformRequest: angular.identity,
			}

			$scope.delete=function() {
				if ($scope.file && $scope.file.url || $scope.file.src) $scope.safeApply(function() {
					$scope.file={};	
				})
					$scope.url="";
				}

				$scope.triggerFile=function(file) {
					$scope.file=$scope.file?$scope.file:{};
					$scope.file.data=file.files[0];
					console.log(file.files[0]);
					$scope.file.type=file.files[0].type;
					$scope.file.filename=file.files[0].name;
					$scope.file.lastModified=file.files[0].lastModified;
					console.log($scope.file);
					var i=2,size="";
					do{

						i++;
						$scope.file.size=(file.files[0].size/Math.pow(10,i))+sizeType[(i-3)];
					} while ((file.files[0].size/Math.pow(10,i))<1);

					var reader = new FileReader();
					reader.readAsDataURL(file.files[0]);
					reader.onloadend = (e) => {
						$scope.file.src=reader.result;
						$scope.safeApply();
					};
					var formData = new FormData();
					formData.append("file",  $scope.file.data);
					options.data=formData;
					$http(options)
					.then(function (response) {
						console.log(response);
						$scope.file.url=response.data.url;
						$scope.url=response.data.url;
						$scope.safeApply();
					}, function (error) {
						console.log(error);
					})

				}


				$scope.safeApply = function(fn) {
					var phase = this.$root.$$phase;
					if(phase == '$apply' || phase == '$digest') {
						if(fn && (typeof(fn) === 'function')) {
							fn();
						}
					} else {
						this.$apply(fn);
					}
				};
			}
		};

	}
