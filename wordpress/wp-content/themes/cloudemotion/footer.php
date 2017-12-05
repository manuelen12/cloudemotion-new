






    <div class="container-fluid top-content">


        <section class="main-content">
            <article class="main" ng-class="{'flipped':vm.flip}">

                <article class=" front">
                    <div id="logo-cl" class="form-group">
                        <img class="img-responsive" width="200" src="./wp-content/themes/cloudemotion/assets/img/cloud.png">
                        <img class="img-responsive" width="200" src="./wp-content/themes/cloudemotion/assets/img/logo_header.jpg">
                    </div>
                    <button id="trigger" ng-click="vm.flip=true;" class="btn btn-primary">Solicitar informacion</button>
                </article>          
                <article class=" back">
                    <div >

                        <div class="form-horizontal">
                            <div class="input-group form-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" name="data-1" class="form-control" placeholder="Nombre Completo">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <input type="text" name="data-1" class="form-control" placeholder="Correo Electronico">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <input type="text" name="data-1" class="form-control" placeholder="Asunto">
                            </div>
                            <div class="input-group form-group">
                                <textarea class="form-control" placeholder="Mensaje"></textarea>
                            </div>
                            <div class="input-group form-group">
                                <button id="trigger" ng-click="vm.flip=false;" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                    <div >

                        <input type="checkbox" id="test1" /><label for="test1"><span class="ui"></span>Marketing</label>
                        
                        <input type="checkbox" id="test2" /><label for="test2"><span class="ui"></span>Mobil</label>
                        
                        <input type="checkbox" id="test3" /><label for="test3"><span class="ui"></span>WEB</label>

                    </div>
                </article>          

            </article>
        </section>



    </div>


<?php 
wp_footer();
?>