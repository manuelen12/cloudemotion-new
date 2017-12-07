function Nucleo() {
    return {
        restrict: 'E',
        template:`    
        <div class="loaderN">
        <div class="inner one"></div>
        <div class="inner two"></div>
        <div class="inner three"></div>
        <div class="nucleus"></div>
        </div>
        <div class="loaderN">
        <div class="inner one"></div>
        <div class="inner two"></div>
        <div class="inner three"></div>
        <div class="nucleus"></div>
        </div>
        <div class="loaderN">
        <div class="inner one"></div>
        <div class="inner two"></div>
        <div class="inner three"></div>
        <div class="nucleus"></div>
        </div>
        `,
        link: function (scope, iElement, iAttrs) {
            
        }
    }
}

cloudemotion.directive('onErrorSrc', function() {
    return {
        link: function(scope, element, attrs) {
            console.log("upload image");
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
