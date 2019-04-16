<!DOCTYPE html>
<html class="no-js">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>:: Cecilia Schwarz 🍁| Haz tu reserva, visite nuestro Spa ::</title>
    <meta name="description" content="Aqua | Spa and Beauty HTML5 Template">
     
	<?php 
        include("include/head.php");
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
	  
    <div id="ro-main" class="ro-main clearfix">
      <div class="ro-section ro-padding-top ro-reservation-bg">
        <div class="container">
          <div class="col-xs-12 ro-reservation-heading">
            <h3 class="ro-hr-heading ro-section-mb">RESERVATION</h3>
          </div>
          <div class="ro-reservation clearfix">
            <div class="row">
              <div class="col-xs-12 text-center ro-font-size-4 ro-light-text ro-section-mb opcion_reserva"><i>
                  Por favor reserve con anticipación para obtener el mejor servicio de nosotros.
				   <br>Te deseamos un gran día. ¡Gracias!</i><br>
				<p> Estas reservando: Full Body Massage (55 mins)</p>
				
				</div>
              <div class="col-md-10 col-md-offset-1 col-xs-12 ro-section-mb-small">
                <form name="reservation" method="post" action="phpscript/reservation.php" class="ro-form ro-reservation-form clearfix">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" placeholder="Nombre" name="name" required="required"/>
                      <input type="email" placeholder="Email" name="email" required="required"/>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-7">
                          <input type="text" name="date" placeholder="Día" required="required" class="ro-date-picker"/>
                        </div>
						<div class="col-md-5">
                          <select name="hour">
                            <option value="Morning">10:00 hs</option>
                            <option value="Morning">10.30 hs</option>
                            <option value="Evening">11:00 hs</option>
							<option value="Morning">11:30 hs</option>
							<option value="Morning">12:00 hs</option>
							<option value="Afernoon">12:30 hs</option>
							<option value="Afernoon">13:00 hs</option>
							<option value="Afernoon">13:30 hs</option>
							<option value="Afernoon">14:00 hs</option>
							<option value="Afernoon">14:30 hs</option>
							<option value="Afernoon">15:00 hs</option>
							<option value="Afernoon">15:30 hs</option>
							<option value="Afernoon">16:00 hs</option>
							<option value="Afernoon">16:30 hs</option>
							<option value="Afernoon">17:00 hs</option>
							<option value="Afernoon">17:30 hs</option>
							<option value="Afernoon">18:00 hs</option>
							<option value="Afernoon">18:30 hs</option>
							<option value="Afernoon">19:00 hs</option>
							<option value="Afernoon">19:30 hs</option>
							
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-7">
                          <input type="tel" placeholder="Teléfono" name="teléfono" required="required"/>
                        </div>
                        <div class="col-md-5">
                          <input type="submit" value="RESERVA" class="ro-btn-2 ro-submit"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-xs-12 ro-section-mb-big">
                <div class="ro-font-size-4 text-center"><b>Recordar traer .... y mas. </b></div>
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
    <!-- endbuild -->
    <script>(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;e=o.createElement(i);r=o.getElementsByTagName(i)[0];e.src='//www.google-analytics.com/analytics.js';r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));ga('create','UA-57387972-1');ga('send','pageview');</script>
  </body>
</html>