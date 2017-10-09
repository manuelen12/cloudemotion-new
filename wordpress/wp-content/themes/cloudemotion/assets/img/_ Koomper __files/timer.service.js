koomper.factory('TimerService', TimerService)
TimerService.$inject=["$http","$state","urlHelpers"]
function TimerService($http,$state,urlHelpers) {
	var methods= {
		rangePicker:rangePicker,
		bytesToSize:bytesToSize,
	}


	function bytesToSize(bytes,decimal) {
		var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		if (bytes == 0) return '0 Byte';
		var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		return Math.round(bytes / Math.pow(1024, i), (decimal?decimal:2)) + ' ' + sizes[i];
	};

	function rangePicker(selector,callback){

		console.log(selector);
		console.log(callback);
		setTimeout(function() {
			
			var start = moment().subtract(29, 'days'),
			end = moment();

			callback(start, end);
			$('#'+selector).daterangepicker({
				"showDropdowns": true,
				"showWeekNumbers": true,
				"showISOWeekNumbers": true,
				"autoApply": true,
				"startDate": start,
				"endDate": end,

				"ranges": {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

				},
				"alwaysShowCalendars": true,
			}, callback);

		},1000)	
	}	

	return methods;
}
