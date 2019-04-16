<!DOCTYPE html>
<html class="no-js">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aqua | Spa and Beauty HTML5 Template</title>
    <link rel="shortcut icon" href="./favicon.png">
    <meta name="description" content="Aqua | Spa and Beauty HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="assets/fonts/icon-fonts/styles.css">
    <!-- build:css assets/styles/vendors-min.css -->
    <link rel="stylesheet" href="assets/styles/plugins.css">
    <link rel="stylesheet" href="vendors/flexslider/flexslider.css">
    <link rel="stylesheet" href="vendors/FancyBox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- endbuild -->
    <!-- build:css assets/styles/main-min.css -->
    <link rel="stylesheet" href="assets/styles/main.css">
    <!-- endbuild -->
    <!-- build:js vendors/vendors-compressed/modernizr.js -->
    <script src="vendors/modernizr/modernizr.js"></script>
    <!-- endbuild -->
  </head>
  <body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <?php 
        include("include/nav.php");
      ?>
    <div id="ro-main" class="ro-main clearfix">
      <div class="ro-section ro-padding-top">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-xs-12 ro-mt-10 ro-mt-180"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.5011217606543!2d-58.39872894932788!3d-34.591487680366825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca9825d8a747%3A0x2f3cbf2ab55a045a!2sPe%C3%B1a+2158%2C+C1114+CABA!5e0!3m2!1ses-419!2sar!4v1555341974956!5m2!1ses-419!2sar" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
            <div class="col-md-5 col-xs-12 ro-section-mb ro-mt-180">
              <div class="row ro-contact-info-wrapper">
                <div class="col-md-6">
                  <div class="ro-contact-info icon-185040-map-pin-streamline">
                    Peña 2155, Recoleta, CABA. 
                  </div>
                  <div class="ro-contact-info icon-185038-home-house-streamline">Web:<a href="#" class="ro-color-main">
					  <u>www.ceciliaschwarz.com.ar</u></a></div>
                </div>
                <div class="col-md-6">
                  <div class="ro-contact-info icon-phone">Teléfono: + 15 897893</div>
                  <div class="ro-contact-info icon-map">Whatsapp: +54113456</div>
                  <div class="ro-contact-info icon-185078-email-mail-streamline">Email:<a class="ro-color-main">info@ceciliaschwarz.com.ar</a></div>
                </div>
              </div>
              <form method="post" action="phpscript/contact.php" class="ro-form ro-contact-form ro-form-area">
                <h5 class="ro-hr-heading ro-left">FORMULARIO DE CONTACTO</h5>
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <input type="text" placeholder="Nombre" name="name" required="required"/>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <input type="email" placeholder="Email" name="email" required="required"/>
                  </div>
					<div class="col-md-6 col-xs-12">
                    <input type="text" placeholder="Whatsapp" name="name" required="required"/>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <input type="text" placeholder="Asunto" name="email" required="required"/>
                  </div>
                  <div class="col-md-12 col-xs-12">
                   
                    <textarea placeholder="Escriba aquí su comentario..." name="message" required="required"></textarea>
                  </div>
                  <div class="col-md-12 col-xs-12 text-center">
                    <input type="submit" value="SEND" class="pull-right ro-btn-1 ro-send"/>
                  </div>
                </div>
              </form>
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