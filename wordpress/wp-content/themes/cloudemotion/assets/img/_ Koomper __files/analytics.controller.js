koomper.controller('AnalyticsController',AnalyticsController)

AnalyticsController.$inject=["$scope","$timeout","BannerService","$stateParams"]

function AnalyticsController ($scope,$timeout,BannerService,$stateParams) {
	console.log('AnalyticsController');

	var vm=this;
	start = moment().subtract(29, 'days'),
	end = moment();
	angular.extend(vm,{
		setGeneralChart:setGeneralChart,
		labels:[],
		total:[],
		filtersDate:{filters:{create_at__gte:start.format('YYYY-MM-DD'),create_at__lte:moment(end,'YYYY-MM-DD').add(1,"days").format('YYYY-MM-DD')}},
		paginator:{helper: BannerService.getBanner,current:1,count:10,sorting:true},
	})

	function getdata() {
		if($stateParams.banner_rotator){
			vm.idBanner = $stateParams.banner_rotator;
			BannerService.getBanner(null,$stateParams.banner_rotator).then(function(response){
				vm.banner=response.data
				$.map(vm.banner.rotator,function(val,index){
					var filter=angular.copy(vm.filtersDate);
					filter.filters.rotator_id=val.id;
					BannerService.getAnalyticsBanner(filter).then(function(response) {

						var data=[],
						date=[];
						$.map(response.data,function(val,ind) {	
							data.push(val.create_at__count);
							date.push(val.date);
						})
						vm.banner.rotator[index].data=data;
						vm.banner.rotator[index].date=date;
					},function(error){
						console.log(error);
					});
				});
			},function(error){
				console.log(error);
			})			
		}
	}

	
	function setGeneralChart() {
		if($stateParams.banner_rotator){/*
			
				new Chart($("#rotatorChart"),
				{
					"type":"line",
					"data":{
						"labels":["January","February","March","April","May","June","July"],
						"datasets":[{"label":"Number Impressions","data":[65,59,80,81,56,55,40],"fill":false,"borderColor":"rgb(75, 192, 192)","lineTension":0.1}]
					},
					"options":{}});				
			

				var myLineChart = new Chart($("#rotatorChart"), {
				type: 'line',
				data: {
					datasets: [
					{
						label: "# of Impressions",
						fillColor: "rgba(151,187,205,0.2)",
						strokeColor: "rgba(151,187,205,1)",
						pointColor: "rgba(151,187,205,1)",
						pointStrokeColor: "#fff",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(151,187,205,1)",
						data: [0, 1, 1, 2, 3, 5, 8, 13, 21, 34]
					}
					]				
				},
				options: {}
			});
			console.log("its alive");	
			
		*/}

	}
	

	this.$onInit=function() {
		getdata();
		setGeneralChart();
	}
}

koomper.controller('SelectedController',SelectedController)

SelectedController.$inject=["$scope","$timeout","$filter","BannerService","TimerService","$stateParams"]

function SelectedController ($scope,$timeout,$filter,BannerService,TimerService,$stateParams) {

	var vm=this;
	angular.extend(vm,{
		colors:[],
		empty:false,
		start:true,
		type:$stateParams.type,
		totalDevices:0,
		filtersDate:{filters:{}},
		timerCallback:timerCallback,
		getAnalitics:getAnalitics,
		paginator:{helper: ($stateParams.type==2?BannerService.getBanner:BannerService.getRotator),current:1,count:10,sorting:true,filter:($stateParams.type==1?{banner_id:$stateParams.rotator}:null)},
	})

	this.$onInit=function() {
		console.log('hola');
		TimerService.rangePicker("generalTimer",vm.timerCallback);
		init_map();
		setTimeout(function() {
			getAnalitics(1);
		},1000)
	}

	function timerCallback(start, end) {

		$('#generalTimer span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		vm.filtersDate.filters={create_at__gte:start.format('YYYY-MM-DD'),create_at__lte:moment(end,'YYYY-MM-DD').add(1,"days").format('YYYY-MM-DD')}
		init_map();
		getAnalitics(1);
	}

	function init_chart_doughnut(names,data) {
		if($(".canvasDoughnut").length && data.length) {
			vm.colors=[]
			$.map(data,function(val,ind) {
				vm.colors.push((getRandomColor()));
			})

			var a= {
				type:"doughnut",
				tooltipFillColor:"rgba(51, 51, 51, 0.55)",
				responsive:true,
				maintainAspectRatio: false,
				data: {
					labels:names,
					datasets:[ {
						data: data, backgroundColor: vm.colors, hoverBackgroundColor: vm.colors
					}
					]
				}
				,
				options: {
					legend: !1
				}
			}
			;
			$(".canvasDoughnut").each(function() {
				var b=$(this);
				new Chart(b, a)
			}
			)
		}
	}

	function getRandomColor () {
		var hex = Math.floor(Math.random() * 0xFFFFFF);
		return "#" + ("000000" + hex.toString(16)).substr(-6);
	}
	function init_map() {
		$('#vmap').vectorMap(
		{
			map: 'world_en',
			backgroundColor: '#a5bfdd',
			borderColor: '#818181',
			borderOpacity: 0.25,
			borderWidth: 1,
			color: '#f4f3f0',
			markerStyle:{
				initial: {
					fill: 'grey',
					stroke: '#505050',
					"fill-opacity": 1,
					"stroke-width": 1,
					"stroke-opacity": 1,
					r: 5
				},
				hover: {
					cursor: 'pointer'
				},
				selected: {
					fill: 'blue'
				},
			},
			enableZoom: true,
			normalizeFunction: 'linear',
			showTooltip: true,
			onLabelShow: function(e, el, code){
				$.map(vm.analytics.all.country,function(val,ind) {
					if (val.name.substring(0,2).toLowerCase()==code) {
						el.html(el.html()+' : '+val.count);
					}
				})
			}
		});
	}



	function setChartData(filter,selector,option) {
		var filter=angular.copy(filter);
		filter.filters.option=option;
		
		BannerService.getAnalytics(filter).then(function(response) {
			console.log(response);
			vm.empty=Object.keys(response.data).length && response.data.graps.length?false:true;
			var data=[],
			labels=[];
			console.log(response.data);
			$.map(response.data.graps,function(val,ind) {
				if (val.date) labels.push(val.date);
				if (val.create_at__count) data.push(val.create_at__count)
			})

			$timeout(function() {
				defineGeneralChart(data,labels,selector,option);
				vm.start=false;
			},(vm.empty?0:1000))

			vm.analytics=angular.copy(response.data)
			var countries=[];devices=[];devices_name=[];
			vm.totalDevices=0;
			if (vm.analytics.all){
				$.map(vm.analytics.all.country,function(val,ind) {
					if (val.name) countries.push(val.name.substring(0,2).toLowerCase());
				})
				$.map(vm.analytics.all.devices,function(val,ind) {
					vm.totalDevices+=val.count;
					devices.push(val.count);
					devices_name.push(val.name);
				})
			}
			init_chart_doughnut(devices_name,devices);
		}, function(error) {
			vm.empty=false;
		})
	}


	function getAnalitics(type) {
		if ($stateParams.rotator) {
			vm.start=true;
			if (!vm.banner) {	
				BannerService.getBanner(null,$stateParams.rotator).then(function(response) {
					vm.banner=response.data
				},function(error) {
					console.log(error);		
				})			
			}
			var filter=angular.copy(vm.filtersDate);
			console.log($stateParams);
			if ($stateParams.type==1) filter.filters.rotator__banner_id=$stateParams.rotator;
			if ($stateParams.type==2) filter.filters.rotator_id=$stateParams.banner;
			filterClick=angular.copy(filter);filterImpression=angular.copy(filter);filterCTR=angular.copy(filter);

			vm.actual=type
			switch (type) {
				case 1:
				setChartData(filter,"#generalImpressions",type);
				break;
				case 2:
				setChartData(filter,"#generalClicks",type);
				break;
				case 3:
				setChartData(filter,"#generalCtr",type);
				break;
			}


		}	
	}


	function defineGeneralChart(data,labels,selector,options) {
		if (!data.length) return false;
		new Chart($(selector),
		{
			"type":"line",
			"responsive":true,
			"maintainAspectRatio": false,
			"data":{
				"labels":labels,
				"datasets":[{"fill": "start","label":($filter('translate')(options==1?"Impressions":(options==2?"Clicks":"CTR"))),"data":data,"borderColor":"rgb(75, 192, 192)","lineTension":0.1}]
			},
			"options":{
				"scales": {
					"yAxes": [{
						"ticks": {
							"min": 0,
							"margin": 100,
							"beginAtZero": true
						}
					}]
				}
			}});
		vm.valid=data.length?true:false;
	}

}

