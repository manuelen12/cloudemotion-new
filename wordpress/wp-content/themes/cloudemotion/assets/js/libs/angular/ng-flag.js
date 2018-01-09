angular.module('ngFlag', []).
directive('flag', function() {
    return {
      restrict: 'E',
      replace: true,
      template: '<span class="f{{ size }}"><span class="flag {{ country }}" style="width: 33px; height: 21px"></span></span>',
      scope: {
        country: '=',
        size: '@'
    },
    link: function(scope, elm, attrs) {
        scope.size = 32;
        scope.$watch('country', function(value) {
          console.log(value);
          scope.country = angular.lowercase(value);
      });
    }
};
});