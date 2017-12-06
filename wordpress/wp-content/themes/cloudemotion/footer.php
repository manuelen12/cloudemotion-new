






<div class="container-fluid top-content">


    <section class="main-content">
        <article class="main" ng-class="{'flipped':vm.flip}">

            <article class=" front">

                <div >

                <div class="form-horizontal contact-us">
                    <?php echo do_shortcode( '[contact-form-7 id="80" title="Formulario de contactos"]' ); ?>
                </div>
                </div>
                <div >

                    <input type="checkbox" id="test1" /><label for="test1"><span class="ui"></span>Marketing</label>

                    <input type="checkbox" id="test2" /><label for="test2"><span class="ui"></span>Mobil</label>

                    <input type="checkbox" id="test3" /><label for="test3"><span class="ui"></span>WEB</label>

                </div>
                
            </article>          
            <article class=" back">
                <div id="logo-cl" class="form-group">
                    <img class="img-responsive" width="200" src="./wp-content/themes/cloudemotion/assets/img/cloud.png">
                    <img class="img-responsive" width="200" src="./wp-content/themes/cloudemotion/assets/img/logo_header.jpg">
                </div>
                <button id="trigger" ng-click="vm.flip=false;" class="btn btn-primary">Solicitar informacion</button>


            </article>          

        </article>
    </section>



</div>


<?php 
wp_footer();
?>