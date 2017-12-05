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
});
