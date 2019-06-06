<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aqua | Spa and Beauty HTML5 Template</title>
    <link rel="shortcut icon" href="./favicon.png">
    <meta name="description" content="Aqua | Spa and Beauty HTML5 Template">
   <?php 
        include("include/head.php");
      ?>
  </head>
  <body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <?php 
        include("include/nav.php");
      ?>
	  
    <div id="ro-main" class="ro-main clearfix">
      <div class="ro-section ro-section-cart">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h4>YOUR CART:</h4>
              <form class="ro-cart-form">
                <div data-mcs-theme="minimal-dark" data-mcs-axis="x" id="ro-cart-table-scroll" class="ro-cart-table mCustomScrollbar"style="position: relative; top: 100px; left: 0px; width: 1140px;">
                  <table>
                    <thead>
                      <tr>
                        <th class="ro-table-col-product text-center">Producto</th>
                        <th class="ro-table-col-name"></th>
                        <th class="ro-table-col-size text-center">Precio</th>
                        <th class="ro-table-col-color text-center"></th>
                        <th class="ro-table-col-price text-center">Cantidad</th>
                        <th class="ro-table-col-qty text-center"> </th>
                        <th class="ro-table-col-total text-center">Sub Total</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <td class="text-center">TOTAL</td>
                        <td colspan="5"></td>
                        <td class="text-center ro-price">$ 114.00</td>
                      </tr>
                    </tfoot>
                    <tbody>
                      <tr class="ro-cart-item ro-product-1">
                        <td><a href="product.html"><img src="assets/images/cart-item1.jpg" alt="Cart Item"/></a></td>
                        <td><a href="#">HANDCRAFTED SOAP STONE</a></td>
                        <td class="text-center">$ 25.00</td>
                        <td class="ro-item-color text-center">
                        
                        </td>
                        
                        <td>
                          <input type="number" name="quantity1" min="0" value="2" style="width: 100%;line-height: 14px" class="text-center"/>
                        </td>
						  <td class="text-center"></td>
                        <td class="text-center">$ 50.00</td>
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
                <div class="ro-button clearfix"><a href="checkout-1.html">CHECK OUT</a></div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php 
        include("include/footer.php");

        if (isset($_GET['newsletter'])) {
          echo '<script>alert("¡Gracias por sumarte a nuestro Newsletter!")</script>';
        }
        
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