<!DOCTYPE html>
<html class="no-js">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>:: Cecilia Schwarz 🍁| Spa,Bienestar físico-emocional ::</title>
    <meta name="description" content="Aqua | Spa and Beauty HTML5 Template">
    
	  <?php 
        session_start();
        include("include/head.php");
        require_once "./gestion/Objetos/Gestion.php";

        $gestion = new Gestion();
      ?>
	  
  </head>
  <body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
     <!--  Navegar- nav-  -->
	  <?php 
        include("include/nav.php");
      ?>
	  
	  <header id="home" class="ro-section ro-fullwidth-home hidden-xs">
        <div class="ro-slider-style-1-wrapper">
          <div id="ro-slider-style-1" style="position: relative; top: 0px; left: 0px; width: 1920px; height: 600px; margin:0 auto;" class="ro-slider-style-1">
            <div data-u="slides" style="cursor: pointer; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 1920px; height: 900px;">
              <div class="ro-bgc-foto color-header-font">
                
                <div data-u="caption" data-t="T" data-t2="R" style="position: absolute; top: 420px; left: 800px; width:1000px; font-size:25px; line-height:1.2;">
                  <p>A good reminder.<br/>we live in a culture that values stress,like it makes us better or something.</p>
                </div>
                <div data-u="caption" data-t="FADE" data-t2="R" style="position: absolute; top: 350px; left: 1040px; width:400px;"><img src="assets/images/fw-slider-brand.png" alt="aqua"/></div>
                <div data-u="caption" data-t="B" data-t2="R" style="position: absolute; top: 515px; left: 800px; width: 150px;height: 40px;"><a href="#" class="ro-btn-bd-1">SEE MORE</a></div>
              </div>
				
              <div class="ro-bgc-foto color-header-font">
               
                <div data-u="caption" data-t="R" data-t2="R" style="position: absolute; top: 420px; left: 800px; width:1000px; font-size:25px; line-height:1.2;">
                  <p>a good reminder.<br/>we live in a culture that values stress,like it makes us better or something.</p>
                </div>
                <div data-u="caption" data-t="R" data-t2="R" style="position: absolute; top: 350px; left: 1040px; width:400px;"><img src="assets/images/fw-slider-brand.png" alt="aqua"/></div>
                <div data-u="caption" data-t="R" data-t2="R" style="position: absolute; top: 515px; left: 800px; width: 150px;height: 40px;"><a href="#" class="ro-btn-bd-1">SEE MORE</a></div>
              </div>
            </div>
          </div>
        </div>
      </header>
	  
    <div id="ro-main" class="ro-main clearfix">
		
		
      <div class="ro-section ro-padding-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2 ro-section-mb-big">
              <div class="ro-quote-content text-center">
                <q>&nbsp;When you have once seen the glow of happiness on the face of a beloved person, you know that a man can have<br class="hidden-sm hidden-xs"/>no vocation but to awaken that light on the faces surrounding him. In the depth of winter,<br/>I finally learned that within me there lay an invincible summer.&nbsp;</q>
                <div class="ro-author-name">_ Albert Camus _</div>
              </div>
            </div>
            <div class="col-xs-12 ro-section-mb-big">
              <div style="background-image: url('assets/images/service-fullwidth1.jpg')" class="ro-service-fullwidth clearfix">
                <div class="row">
                  <div class="ro-service-list col-md-8 col-md-offset-4">
                    <h3 class="ro-hr-heading">Spa y Masajes</h3>
                    <ul class="ro-bgc-trans-5">

                      <?php
                        $servicios = $gestion->traerServicios();

                        foreach ($servicios as $servicio) {
                          echo '<li class="acordeon_servicio">
                            <div class="ro-service acordeon_ser_titulo">' . $servicio['nombre'] .'</div>
                            <div class="ro-separator"></div>
                            <div class="ro-price">$' . $servicio['precio'] . '</div>
                  
                            <div class="acordeon_contenido-ser"> 
                              
                              <label for="iten1" class="acordeons_titulo">
                                <p>'
                                  . $servicio['descripcion'] .
                                '</p>
                              </label>
                               
                               <button value="Login" class="abtn2" type="button">Reservar</button>
                            </div>
                  
                  
                          </li>';
                        }
                        
                      ?>

                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 ro-section-mb-big">
              <div style="background-image: url('assets/images/service-fullwidth2.jpg')" class="ro-service-fullwidth clearfix ro-bg-right">
                <div class="row">
                  <div class="ro-service-list col-md-8">
                    <h3 class="ro-hr-heading">Rostro</h3>
                    <ul class="ro-bgc-trans-1">

                      <?php
                        $servicios = $gestion->traerServicios();

                        foreach ($servicios as $servicio) {
                          echo '<li class="acordeon_servicio">
                            <div class="ro-service acordeon_ser_titulo">' . $servicio['nombre'] .'</div>
                            <div class="ro-separator"></div>
                            <div class="ro-price">$' . $servicio['precio'] . '</div>
                  
                            <div class="acordeon_contenido-ser"> 
                              
                              <label for="iten1" class="acordeons_titulo">
                                <p>'
                                  . $servicio['descripcion'] .
                                '</p>
                              </label>
                               
                               <button value="Login" class="abtn2" type="button">Reservar</button>
                            </div>
                  
                  
                          </li>';
                        }
                        
                      ?>

                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 ro-section-mb-big">
              <div style="background-image: url('assets/images/service-fullwidth3.jpg')" class="ro-service-fullwidth clearfix">
                <div class="row">
                  <div class="ro-service-list col-md-8 col-md-offset-4">
                    <h3 class="ro-hr-heading">Cuerpo</h3>
                    <ul class="ro-bgc-trans-5">

                      <?php
                        $servicios = $gestion->traerServicios();

                        foreach ($servicios as $servicio) {
                          echo '<li class="acordeon_servicio">
                            <div class="ro-service acordeon_ser_titulo">' . $servicio['nombre'] .'</div>
                            <div class="ro-separator"></div>
                            <div class="ro-price">$' . $servicio['precio'] . '</div>
                  
                            <div class="acordeon_contenido-ser"> 
                              
                              <label for="iten1" class="acordeons_titulo">
                                <p>'
                                  . $servicio['descripcion'] .
                                '</p>
                              </label>
                               
                               <button value="Login" class="abtn2" type="button">Reservar</button>
                            </div>
                  
                  
                          </li>';
                        } 
                      ?>

                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php 
        include("include/footer.php");
      ?>
      <div id="ro-backtop"><i class="icon-up"></i></div>
    </div><!-- build:js vendors/vendors-compressed/plugins-min.js -->
    <script src='vendors/jquery/dist/jquery.min.js'></script>
    <script src='vendors/bootstrap/dist/js/bootstrap.min.js'></script>
    <script src='vendors/flexslider/jquery.flexslider-min.js'></script>
    <script src='vendors/jssor-slider/js/jssor.slider.mini.js'></script>
    <script src='vendors/jquery-ui/ui/minified/datepicker.min.js'></script>
    <script src='vendors/countdown/jquery.plugin.min.js'></script>
    <script src='vendors/countdown/jquery.countdown.min.js'></script>
    <script src='vendors/jquery-mousewheel/jquery.mousewheel.min.js'></script>
    <script src='vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js'></script>
    <script src='vendors/jQuery.dotdotdot/src/js/jquery.dotdotdot.min.js'></script>
    <script src='vendors/elevatezoom-master/jquery.elevatezoom.js'></script>
    <script src='vendors/FancyBox/source/jquery.fancybox.js'></script>
    <!-- endbuild -->
    <!-- build:js assets/scripts/main-min.js -->
    <script src='assets/scripts/main.js'></script>
	  
	  	  
	<!-- Acordion Servicio-->
	  <script type="text/javascript"> 

      var servicio;

        $(".ro-service").click(function(){

          var contenido = $(this).nextAll('.acordeon_contenido-ser');
          servicio = $(this).html();
              
          if(contenido.css("display") == "none") { //open   
            contenido.slideDown(350);     
            $(this).addClass("open");
          } else { //close    
            contenido.slideUp(350);
            $(this).removeClass("open");  
          }

        });

        $('.abtn2').click(function() {

          var form = $(document.createElement('form'));
          $(form).attr("action", "reserva.php");
          $(form).attr("method", "POST");
          $(form).css("display", "none");

          var servicioForm = $("<input>")
          .attr("type", "text")
          .attr("name", "servicio")
          .val(servicio);
          console.log(servicioForm);
          $(form).append($(servicioForm));

          form.appendTo(document.body);
          $(form).submit();
        });
	  </script>
	  
    <!-- endbuild -->
    <script>(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;e=o.createElement(i);r=o.getElementsByTagName(i)[0];e.src='//www.google-analytics.com/analytics.js';r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));ga('create','UA-57387972-1');ga('send','pageview');</script>
  </body>
</html>