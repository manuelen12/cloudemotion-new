koomper.directive('calendar', Calendar);
Calendar.$inject=["$http","$timeout"]
function Calendar($http,$timeout) {	
	// Runs during compile
	return {
		scope: {options:"=?"}, // {} = isolate, true = child, false/undefined = no change
		restrict: 'A', // E = Element, A = Attribute, C = Class, M = Comment
		link: function(scope, iElm, iAttrs, controller) {
			console.log(iAttrs);

			var options={
				format: "YYYY-MM-DD",
				autoApply: true,
			};
			var options2={
				format: "yyyy-mm-dd",
				weekStart:0,
				autoclose: true,
				maxViewMode: 2,
				todayBtn: true,
				language: "es"
			};

			scope.$watch("options",function(val) {
			scope.defineCalendar(iAttrs.calendarType,val);
			},true)

			scope.defineCalendar=function(type,options) {
				switch (type) {
					case "time":

					console.log("time");
					$(iElm).datetimepicker(scope.options?scope.options:options)

					break;
					case "range":

					console.log("range");
					$(iElm).daterangepicker(scope.options?scope.options:options)

					break;
					default:
					console.log("default");
					console.log(scope.options);
					$(iElm).datepicker(scope.options?scope.options:options2)
					break;
				}

			}
			if (!scope.options) scope.defineCalendar(iAttrs.calendarType,scope.options);


		}
	};

}