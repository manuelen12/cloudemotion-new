	koomper.directive('rotatorCustom', RotatorCustom );
	RotatorCustom.$inject=["BannerService","TimerService"]
	function RotatorCustom(BannerService,TimerService) {
		return {
			scope:{arrayLines:"=?",selector:"=",selectorDate:"=",index:"=?",data:"=?",labels:"=?",banner:"=?"},
			restrict: 'E',
			templateUrl: './components/commons/directives/views/analytics.rotator.view.directive.html',
			link: function (scope, iElement, iAttrs) {
				scope.$watch("arrayLines",function(news) {
					if (timeGraph) clearTimeout(timeGraph)
						var timeGraph=setTimeout(function() {
							generateGraph(news);	
							scope.empty=scope.data.data.length?false:true;
						},1000)
					console.log(news);
				});
				console.log(scope.data.data);
				scope.filtersDate={filters:{}};
				var start = moment().subtract(29, 'days');
				var end = moment();
				function timer(start, end) {
					console.log($('#'+scope.selectorDate+' span'));
					$('#'+scope.selectorDate+' span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
					scope.filtersDate.filters={create_at__gte:start.format('YYYY-MM-DD'),create_at__lte:end.format('YYYY-MM-DD')}
					getData();
				}

				TimerService.rangePicker((scope.selectorDate),timer);
				function getData() {
					var filter=angular.copy(scope.filtersDate);
					filter.filters.rotator_id=scope.data.id
					BannerService.getAnalyticsBanner(filter).then(function(response) {
						scope.empty=response.data.length?false:true;
						var data=[],
						date=[];
						$.map(response.data,function(val,ind) {	
							data.push(val.create_at__count);
							date.push(val.date);
						})
						scope.data.data=data;
						scope.data.date=date;
					},function(error){
						console.log(error);
					});
				}

				function generateGraph() {
					var $target=$("#"+scope.selector);
					new Chart($target,
					{
						"type":"line",
						"responsive":true,
						"maintainAspectRatio": false,
						"data":{
							"labels":scope.labels,
							"datasets":[{"label":"Number Impressions","data":scope.arrayLines,"fill":false,"borderColor":"rgb(75, 192, 192)","lineTension":0.1}]
						},
						"options":{}
					});		
				}

			}
		};
	}