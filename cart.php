<?php
session_start();
$cont = 0;
require_once "./gestion/Objetos/Gestion.php"; 
	$gestion=new Gestion();
?>
<!DOCTYPE html>
<html class="no-js">
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
    <nav id="ro-main-nav" class="ro-main-nav-shop">
      <div class="container">
        <div class="ro-brand"><a href="index.php"><img src="assets/images/aqua-brand4.svg" alt="Aqua Spa"/></a></div>
        <div class="ro-nav-content-wrapper">
          <div class="row">
            <div class="col-md-4 hidden-sm hidden-xs">
              <div class="ro-hotline pull-left">Hotline:&nbsp;<span class="ro-color-main">0123 456 789</span></div>
            </div>
            <div class="col-md-4">
              <ul class="ro-nav text-center">
                <li><a href="#">SPA</a></li>
                <li><a href="#">BEAUTY</a></li>
                <li><a href="#">YOGA</a></li>
                <li><a href="#">SELLOFF</a></li>
              </ul>
            </div>
            <div class="col-md-4 hidden-sm hidden-xs">
              <div class="ro-option pull-right">
                <div class="btn-group"><a href="#" data-toggle="dropdown" role="link" aria-expanded="false" class="btn dropdown-toggle">Setings<i class="icon-expand22"></i></a>
                  <ul role="menu" class="dropdown-menu">
                    <li><a href="#">Setings 1</a></li>
                    <li><a href="#">Setings 2</a></li>
                    <li><a href="#">Setings 3</a></li>
                  </ul>
                </div>
                <div class="btn-group"><a href="#" data-toggle="dropdown" role="link" aria-expanded="false" class="btn dropdown-toggle">English<i class="icon-expand22"></i></a>
                  <ul role="menu" class="dropdown-menu">
                    <li><a href="#">France</a></li>
                    <li><a href="#">Spain</a></li>
                    <li><a href="#">Ducth</a></li>
                  </ul>
                </div>
                <div class="btn-group"><a href="#" data-toggle="dropdown" role="link" aria-expanded="false" class="btn dropdown-toggle">USD<i class="icon-expand22"></i></a>
                  <ul role="menu" class="dropdown-menu">
                    <li><a href="#">EUR</a></li>
                  </ul>
                </div>
              </div>
            </div><a href="cart.php">
              <div data-content=<?php if(!empty($_SESSION['pedido'])){echo count($_SESSION['pedido']);}else{echo "0";}?> class="ro-cart"><i class="icon-ecommerce-cart-content"></i></div></a>
          </div>
        </div>
      </div>
    </nav>
    <div id="ro-main" class="ro-main clearfix">
      <div class="ro-section ro-section-cart">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h4>YOUR CART:</h4>
			  <form action="gestionpedido.php" method="post" novalidate class="ro-cart-form">
                <div data-mcs-theme="minimal-dark" data-mcs-axis="x" id="ro-cart-table-scroll" class="ro-cart-table mCustomScrollbar">
                  <table>
                    <thead>
                      <tr>
                        <th class="ro-table-col-product text-center">Products</th>
                        <th class="ro-table-col-name"></th>
                        <th class="ro-table-col-price text-center">Price</th>
                        <th class="ro-table-col-qty text-center">Qty</th>
                        <th class="ro-table-col-total text-center">Total</th>
						<th class="ro-table-col-total text-center">Eliminar</th>
                      </tr>
                    </thead>
					<tbody>
                    <?php
					$cont = 0;
					$subtotales = 0;
					foreach($gestion->traerProductos() as $productocarrito){
						$subtotal = $productocarrito['precio']*$productocarrito['cantidad'];
						$subtotales += $subtotal;
						$precio = number_format($productocarrito['precio'], 2);
						echo "
						
						<tr class='ro-cart-item ro-product-$cont' id='articulo$cont'>
							<td>
								<a href='#' onclick='quitar($cont, $productocarrito[id])' class='cart__remove' title='Quitar'><i class='fa fa-times' aria-hidden='true'></i></a> 
								<a href='product-detail.php?id=$productocarrito[id]' class='cart__image'> 
									<img src='img/productos/$productocarrito[id]/$productocarrito[foto]' alt=''> 
								</a>
							</td>
							<td>
								<a href='product-detail.php'> $productocarrito[descripcion] </a> <br />
								<p	class='cart-variant'>$productocarrito[categoria]</p>
							</td>
							
							
                        </td>
							<td data-label='Precio' class='price'>$ $precio</td>
							<td data-label='Cantidad' class='text-center'>
									<button class='spinbtn btnminus' onclick='focusblur(\"cantidad$cont\")' type='button'><span aria-hidden='true' class='icon icon-minus'></span></button>
									<input type='text' style='width: 100%;line-height: 14px' value='$productocarrito[cantidad]' name='cantidad$cont' id='cantidad$cont'>
									<button class='spinbtn btnplus' onclick='focusblur(\"cantidad$cont\")' type='button'><span aria-hidden='true' class='icon icon-plus'></span></button>
								</td>
							<td data-label='Total' class='text-right' id='total$cont'></td>
							<td data-label='Precio' class='price'>$ $subtotal</td>
							<input type='hidden' value='$productocarrito[id]' id='idproducto$cont' name='idproducto$cont'>
							<input type='hidden' value='$productocarrito[precio]' id='precio$cont' name='precio$cont'>
							<td>
								<a href='#' onclick='quitar($cont, $productocarrito[id])' class='cart__remove' title='Quitar'>X<i class='fa fa-times' aria-hidden='true'></i></a> 
								
							</td>
						</tr>";
						$cont++;
					}
					
					?>
					</tbody>
					<tfoot>
                      <tr>
                        <td class="text-center">SUBTOTAL</td>
                        <td colspan="5"></td>
                        <td class="text-center ro-price"><?php echo $subtotales;?></td>
                      </tr>
                    </tfoot>
					
                  </table>
                </div>
                <div class="ro-button clearfix"><a href="checkout.php">CHECK OUT</a></div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer class="ro-section">
        <div class="container">
          <div class="ro-main-footer">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-7 col-xs-12 ro-footer-item">
                <h5>NEW BUSINESS</h5>
                <p>info@domain.com /<br/>hello.domain.com<br/>123.645.87 / 028.299.024</p><a href="#" class="ro-btn-bd-1 hvr-radial-out">WANT TO SUBCRIBLE US ?</a>
              </div>
              <div class="col-lg-2 col-md-4 col-sm-5 col-xs-12 ro-footer-item">
                <h5>OUR ADDRESS</h5>
                <p>1234 Frankford ave<br/>Philadelphia, PA 12457</p><br class="hidden-xs"/><a href="#" class="ro-btn-bd-1 hvr-radial-out">CAREERS</a>
              </div>
              <div class="col-lg-2 col-md-4 col-sm-5 col-xs-12 ro-footer-item ro-open-time">
                <h5>OPENTIME</h5>
                <p>8:00am - 11:30am</p>
                <p>2:00am - 5:30pm</p>
                <p>7:00pm - 10:00pm</p>
              </div>
              <div class="col-lg-1 visible-lg">
                <div class="ro-footer-separator"></div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-7 col-xs-12 ro-footer-item">
                <h5>NEWSLETTER SIGNUP</h5>
                <div class="ro-footer-newletter">
                  <input type="text"/><a href="#"><i class="icon-basic-mail-open-text"></i></a>
                </div>
                <ul class="ro-social">
                  <li><a href="#"><i class="icon-facebook"></i></a></li>
                  <li><a href="#"><i class="icon-twitter"></i></a></li>
                  <li><a href="#"><i class="icon-gplus"></i></a></li>
                  <li><a href="#"><i class="icon-stumbleupon"></i></a></li>
                  <li><a href="#"><i class="icon-tumblr"></i></a></li>
                  <li><a href="#"><i class="icon-vimeo"></i></a></li>
                  <li><a href="#"><i class="icon-pinterest"></i></a></li>
                  <li><a href="#"><i class="icon-dribbble"></i></a></li>
                  <li><a href="#"><i class="icon-instagrem"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="ro-foot-footer">
            <h6>© 2015 AQUA SPA AND BEAUTY. DESIGNED BY THEMEROYAL</h6>
          </div>
        </div>
      </footer>
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
	<script>
	function agregaralpedido(idproducto, cantidad){
		$.post( './gestionpedido.php', { opcion: 'agregaralpedido', idproducto: idproducto, cantidad:cantidad  })
			.done(function( data ) {
				alert(data);					
				if(data != "El producto ya se encuentra en la lista del pedido."){
					window.location.reload();
				}
			});
	}
	function quitar(cont, idproducto){
		$.post( './gestionpedido.php', { opcion: 'sacardelpedido', idproducto: idproducto })
			.done(function( data ) {
				alert(data);
				$("#articulo"+cont).remove();
			});
	}

	var total = 0;
	$('document').ready(function(){
		calcular();
		$('input').blur(function(){
			calcular();
		});
	});
	$('input').blur(function(){
		calcular();
	});
	function calcular(){
		var subtotales = 0; 
		for(var i = 0; i<total; i++){
			var precio = $("#precio"+i).val();
			var cantidad = $("#cantidad"+i).val()
			var subtotal = precio * cantidad; 
			subtotales = subtotales + subtotal;
			$('#total'+i).html("$ "+subtotal);
		}
		$('#subtotales').html("$ "+subtotales);
		$('#total').html("$ "+subtotales);
		$('#totalfinal').val(subtotales);				
	}
	
	function focusblur(idcantidad){
		$('#'+idcantidad).focus();
	}
	$("#filtrar").click(function(){
		var ch = 0;
		$('.productos').addClass('hidden');
		var clase = '';
		$('input[type=checkbox]:checked').each(function () {
			ch = 1;
			if(clase==''){
				clase = '.'+$(this).val();
			}else{
				clase = clase+', .'+$(this).val();
			}
		});
		if(ch == 0){
			$('.productos').removeClass('hidden');
		}else{
			$(clase).removeClass('hidden');				
		}
	});
</script> 
  </body>
</html>