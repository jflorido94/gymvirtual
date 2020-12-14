<!-- *******Cierre del div con el contenido de la pagina -->
</div>

<!-- Footer -->
<footer class="section-footer border-top bg">
  <div class="container footer">
    <section class="footer-top pt-4">
      <div class="row">
        <div class="col-md-4">
          <article class="mr-3">
            <img class="my-4" src="<?php echo(URL)?>assets/img/logo1.png">
            <!-- <div class="mb-2">
              <a class="btn btn-icon btn-light" title="Twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a>
            </div> -->
          </article>
        </div>
        <div class="col-sm-3 col-md-2">
          <h6 class="title">Servicios</h6>
          <ul class="list-unstyled">
            <li> <a href="<?php echo(URL)?>horario">Horario</a></li>
            <li> <a href="<?php echo(URL)?>actividades">Nuestras actividades</a></li>
          </ul>
        </div>
        <?php if (UserSession::existCurrentUser()) {?>
          <div class="col-sm-3  col-md-2">
            <h6 class="title">Tu cuenta</h6>
            <ul class="list-unstyled">
              <li> <a href="<?php echo(URL)?>reservas/my<?php UserSession::getCurrentUserID()?>"> Mis incripciones </a></li>
              <li> <a href="<?php echo(URL)?>mensajes/my<?php UserSession::getCurrentUserID()?>"> Mis mensajes </a></li>
            </ul>
          </div>
        <?php }else { ?> 
          <div class="col-sm-3  col-md-2">
            <h6 class="title">Unete a nosotros</h6>
            <ul class="list-unstyled">
              <li> <a href="<?php echo(URL)?>usuarios/registro"> Registrate </a></li>
              <li> <a href="<?php echo(URL)?>usuarios/login"> Inicia sesión </a></li>
            </ul>
          </div>
        <?php } ?>
          
        <div class="col-sm-3 col-md-2">
          <h6 class="title">Desarrollo</h6>
          <ul class="list-unstyled">
            <li> <a href="<?php echo(URL)?>docs/documentacion">Documentación</a></li>
            <li> <a href="https://github.com/jflorido94/gymvirtual">Repositorio</a></li>
          </ul>
        </div>
      </div> <!-- row.// -->
    </section> <!-- footer-top.// -->

    <section class="footer-copyright border-top">
      <p class="text-muted"> © DAW 2020 Javier Florido Pavon </p>

    </section>
  </div><!-- //container -->
</footer>