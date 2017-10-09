        Gifto
        .service('messageService',MessageService);
        MessageService.$inject=["STATIC"]
        function MessageService(STATIC) {
          var options={
            success:success,
            error:error,
            confirm:confirm,
            info:info,
            getname:getname,
            confirmGraphic:confirmGraphic,
          },name="";


          function success(title,msg) {
            return swal(title,msg,'success');
          }
          function error(title,msg) {
            return swal(title,msg,'error');
          }
          function info(title,msg) {
            return swal(title,msg,'info');
          }
          function confirm(title,msg,titleBtn) {
            return swal({
              title: title,
              text: msg,
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: titleBtn
            });

          }

          function confirmGraphic(callback) {
            console.log(STATIC);
            return swal({
              title: '¿Te gustaria?',
              text: 'Enterarte de los ultimos cambios en nuestra plataforma.',
              imageUrl: (STATIC+'/assets/img/png/calidad.png'),
              imageWidth: 100,
              imageHeight: 50,
              input:"email",
              onClose:function(argument) {
                name=jQuery(argument).find("#swal-input11").val();
              },
              html:`
              <span>Enterarte de los ultimos cambios en nuestra plataforma.</span>
              <input id="swal-input11" placeholder="Ingresa tu Nombre Completo" style="margin-bottom: -60px;" ng-model="vm.name" class="swal2-input">`,
              inputClass:"form-control",
              inputPlaceholder:"Correo Electronico",
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: '¡Estoy de acuerdo!',
              cancelButtonText: '¡No, Gracias!',
              animation: false
            })
          }


          function getname(bol) {
            if (!bol) return name;
            else name="";
          }

          return options
        }