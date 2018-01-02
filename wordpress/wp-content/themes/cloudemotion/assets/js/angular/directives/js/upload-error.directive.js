function Nucleo() {
    return {
        restrict: 'E',
        templateUrl:"cloudemotion/assets/js/angular/directives/view/nucleo.view.html",
        link: function (scope, iElement, iAttrs) {
            
        }
    }
}

cloudemotion.directive('onErrorSrc', function() {
    return {
        link: function(scope, element, attrs) {
            element.on('error', function() {
                if (attrs.src != attrs.onErrorSrc) {
                    attrs.$set('src', attrs.onErrorSrc);
                }
            }).on('load', function() {
                if (!attrs.src) {
                    attrs.$set('src', attrs.onErrorSrc);
                }
            });
        }
    }
}).directive('nucleo', Nucleo);
