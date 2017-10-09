        Gifto.
        filter("amountfix",function() {
            return function (abs) {
                var number=abs;
              if (abs >= Math.pow(10, 12)){
                number = (number / Math.pow(10, 12)).toFixed(1)+"T"
            }
            else if (abs < Math.pow(10, 12) && abs >= Math.pow(10, 9)){
                number = (number / Math.pow(10, 9)).toFixed(1)+"B"
            }
            else if (abs < Math.pow(10, 9) && abs >= Math.pow(10, 6)){
                number = (number / Math.pow(10, 6)).toFixed(1)+"M"
            }
            else if (abs < Math.pow(10, 6) && abs >= Math.pow(10, 3)){
                number = (number / Math.pow(10, 3)).toFixed(1)+"K"
            }
            return number?number:'Total';
        }
    })
        .directive('hcChart', function () {
            return {
                restrict: 'E',
                template: '<div></div>',
                scope: {
                    options: '=',
                    chart: '=?'
                },
                link: function (scope, element) {

                    scope.$watch("options",function(val) {
                        if (val) {
                            scope.chart=Highcharts.chart(element[0], scope.options);
                            console.log(scope.chart);
                            resize();
                        }
                    })

                    /*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                        scope.chart.setSize(400)
                    }else {
                        scope.chart.setSize(800)
                    }
                    */

                    function resize() {
                        var target= jQuery("#resizer");
                        scope.chart.setSize(target.width() - 20);
                        console.log(target);
                    }
                }
            };
        });
            // Directive for pie charts, pass in title and data only