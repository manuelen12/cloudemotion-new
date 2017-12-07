<div class="container-fluid top-content">

    <nucleo></nucleo>

    <section class="main-content">


      <article class="main" ng-class="{'flipped':vm.flip}">

        <article class=" front">
            <div class="form-horizontal contact-us">
                <?php echo do_shortcode( '[contact-form-7 id="80" title="Formulario de contactos"]' ); ?>
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