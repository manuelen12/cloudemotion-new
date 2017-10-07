        Gifto
        .service('ValidatorService',ValidatorService);
        ValidatorService.$inject=["messageService"];
        function ValidatorService(MessageService) {
          var options={
            graphics:graphics,
          }
          function graphics(data) {
            return true;
            if (!data.age) {MessageService.error("Para poder continuar!","Es necesario que introduzca la edad del Beneficiario.");return false;}
            if (!data.aporte) {MessageService.error("Para poder continuar!","Es necesario que introduzca el Aporte Promedio.");return false;}


          var target=angular.copy(data.content),
              seriesVal=[],
              flag=false,
              arrayYears=new Array((18-(data.age)))
              jQuery.map(target,function(valCon, ind) {
                jQuery.map(valCon.content, function(valContent, inda) {
                  jQuery.map(arrayYears,function(val, indi) {
                    if (valContent.count && valContent.value) {
                        flag=true;
                    }
                  })
                })
              })      
            if (!flag) {MessageService.error("Para poder continuar!","Es necesario que seleccione al menos 1 tipo de Givers y cuantos de ellos Aportaran.");return false;}
            return true;
          }

            return options
          }
