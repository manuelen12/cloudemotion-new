angular.module('ngFlag', []).
directive('flag', function() {
    return {
      restrict: 'E',
      replace: true,
      template: '<span class="f{{ size }}"><span class="flag {{ country }}"></span></span>',
      scope: {
        country: '=',
        size: '@'
    },
    link: function(scope, elm, attrs) {
        scope.size = 16;
        scope.$watch('country', function(value) {
          console.log(value);
          scope.country = angular.lowercase(value);
      });
    }
};
});