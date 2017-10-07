koomper.directive("vmap", ngJqvmap);
function ngJqvmap($compile, $timeout) {
	var options={

		restrict: "AE",
		scope: {
			vmapMap: "@",
			vmapBackground: "@",
			vmapColor: "@",
			vmapHoverColor: "@",
			vmapSelectedColor: "@",
			vmapScaleColors: "@",
			vmapNormalizeFunction: "@",
			vmapEnableZoom: "@",
			vmapShowTooltip: "@",
			vmapBorderColor: "@",
			vmapBorderWidth: "@",
			vmapBorderOpacity: "@",
			vmapSelectedRegions: "=",
			vmapMultiSelectRegion: "@",
			vmapColors: "=",
			vmapNameRegion: "=",
			vmapIdRegion: "=",
		},
		link: linkFunc
	}

	return options;

	function linkFunc(scope, elem, attr) {


		jQuery(elem).vectorMap({
			
			map: scope.vmapMap,
			backgroundColor: scope.vmapBackground,
			color: scope.vmapColor,
			hoverColor: scope.vmapHoverColor,
			selectedColor: scope.vmapSelectedColor,
			scaleColors: scope.vmapScaleColors,
			normalizeFunction: scope.vmapNormalizeFunction,
			enableZoom: scope.vmapEnableZoom,
			showTooltip: scope.vmapShowTooltip,
			borderColor: scope.vmapBorderColor, 
			borderWidth: scope.vmapBorderWidth,
			borderOpacity: scope.vmapBorderOpacity,
			selectedRegions: scope.vmapSelectedRegions,
			multiSelectRegion: scope.vmapMultiSelectRegion,
			colors: scope.vmapColors,
			onRegionOut: function(event, code, region){
					//console.log(event);
				},
				onRegionClick: function(event, code, region){
					scope.vmapNameRegion = region;
					scope.vmapIdRegion = code;
					scope.$apply();	
				}

			});
		
	}


}