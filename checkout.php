<?php
session_start();
$cont = 0;
require_once "./gestion/Objetos/Gestion.php"; 
require_once "mercadopago.php";

	$gestion = new Gestion();
	
	/*if(empty($_SESSION['clientelogin'])){
	header("Location: index.php");
}
if(empty($_REQUEST['idpedido'])){
	header("Location: index.php");
}*/

// TESTING
//$mp = new MP ("50778135626636", "zi6W1vPBE77h65CoiFTQXEeh9S1jX05T");

// PRODUCCION
 $mp = new MP ("4630512487347499", "UZ4OaABJTLkB8ioZwPOZhMjfAoXOUJuh");

?>
<!DOCTYPE html>
<html class="no-js">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>:: Cecilia Schwarz 🍁| Compra Rápida ::</title>
    <link rel="shortcut icon" href="./favicon.png">
    <meta name="description" content="Aqua | Spa and Beauty HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="assets/fonts/icon-fonts/styles.css">
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
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
	   
  </head>
  <body>
  <script>
  fbq('track', 'Purchase', {
    value: 100,
    currency: 'arg',
  });
</script>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <?php 
	    include("include/nav.php");
      ?>
    <div id="ro-main" class="ro-main clearfix">
      <div class="ro-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-xs-12">
              <div class="ro-checkout-process ro-process-2">
                <h4>COMPRAR</h4>
				  <div class="ro-hr-line"></div>
				  
				  <div class="coupon-accordion">
					  <h3><i class="fas fa-calendar"></i> ¿Sos Cliente?
                                <input type="hidden" value="login" id="usession">    
									<span id="showlogin" class="showlogin">Haga clic aquí para ingresar</span></h3>
                          
                           <div id="checkout-login" class="coupon-content">
                                <div class="coupon-info">
                                   
                                    <form action="gestion/loginCliente.php" method="POST">
                                      <p class="form-row-first">
                                            <label>Email
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" id="mail" name="mail">
                                        </p>
                                        <p class="form-row-last">
                                            <label>Contraseña
                                                <span class="required">*</span>
                                            </label>
                                            <input type="password" id="clave" name="clave">
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" value="login">
                                        </p>
                                    </form>
										
										
										<div class="acordeon">
											<input type="checkbox" name="acordeon" id="iten1">
											<label for="iten1" class="acordeon_titulo">¿Perdiste tu contraseña?</label>
                                      <p class="form-row-first acordeon_contenido" id="recordar2">
                                        <label>Email
                                            <span class="required">*</span>
                                        </label>
										 
                                        <input type="text" id="emailCheck2">
										  <button value="Login" class="abtn2" type="button">Recordar</button>
                                    </p>
								   </div>
									
                                   
									
									
                                </div>
                            </div>
                        </div>
				  
				  
                 <form class="ro-checkout-information-2">
              
                <div class="ro-shipping">
				
                  <h4>INGRESA TUS DATOS</h4>
					 
				
                  <div class="ro-content ro-formulario">
                    <div class="cont-input">
					 <p class="form-row-first">
                     <label>Nombre<span class="required">*</span></label>
                      <input type="text" name="nombre" value="
                      <?php echo $_SESSION['apellidonombre']; ?>">
                     </p> 
					  
					  <p class="form-row-first">
                     <label>Apellido<span class="required">*</span></label>
                      <input type="text" id="apellido" name="apellido">
                     </p> 
					  </div>
                  </div>
					
					
					<div class="ro-content2 doble-formulario">
                    <div class="cont-input">
					 <p class="form-row-first">
                     <label>Email<span class="required">*</span></label>
                      <input type="text" id="mail" name="mail" value="
                      <?php echo $_SESSION['mail']; ?>">
                     </p> 
					  
					  <p class="form-row-first">
                     <label>Dirección<span class="required">*</span></label>
                      <input type="text" id="dire" name="direccion" value="
                      <?php echo $_SESSION['direccion']; ?>">
                     </p> 
					  </div>
                  </div>
					
					
					 <div class="ro-content ro-formulario">
                    <div class="cont-input">
					 <p class="form-row-first">
                     <label>Provincia<span class="required">*</span></label>
                      <input type="text" id="prov" name="barrio" value="
                      <?php echo $_SESSION['provincia']; ?>">
                     </p> 
					  
					  <p class="form-row-first">
                     <label>Ciudad *<span class="required"></span></label>
                      <input type="text" id="ciudad" name="ciudad" value="
                      <?php echo $_SESSION['ciudad']; ?>">
                     </p> 
					  </div>
                  </div>
					
					<div class="ro-content ro-formulario">
                    <div class="cont-input">
					 <p class="form-row-first">
                     <label>Codigo Postal<span class="required">*</span></label>
                      <input type="text" id="codpost" name="codpost" value="
                      <?php echo $_SESSION['codigo_postal']; ?>">
                     </p> 
					  
					  <p class="form-row-first">
                     <label>Teléfono<span class="required">*</span></label>
                      <input type="text" id="tel" name="telefono" value="
                      <?php echo $_SESSION['telefono']; ?>">
                     </p> 
					  </div>
                  </div>
                  
                </div>
					 
                
				
		  
		  <!--<div class="ro-button"><a href="#">SUBMIT</a></div>	--> 
					 
					
              </form>
            </div> </div>
            <div class="col-md-5 col-xs-12 ">
			<form action="gestionpedido.php" method="POST" id="formulario">
              <div class="ro-checkout-summary ro-style-2">
                <div class="ro-title">
                  <h4>TU PEDIDO</h4>
                </div>
                <div class="ro-body">
                  
                    <?php
					$cont = 0;
					$subtotales = 0;
					$items = [];
					$total = 0;
					foreach($gestion->traerProductos() as $productocarrito){
						$subtotal = $productocarrito['precio']*$productocarrito['cantidad'];
						$subtotales += $subtotal;
						$precio = number_format($productocarrito['precio'], 2);
						echo "
						
						 <div class='ro-item ro-product-$cont'>
                      <div class='ro-image'><a href='product-detail.php?id=$productocarrito[id]' class='cart__image'><img src='img/productos/$productocarrito[id]/$productocarrito[foto]' alt='' style='max-width: 430px;'> </a></div>
                      <div>
                        <div class='ro-name'> <a href='product-detail.php'> $productocarrito[descripcion] </a></div>
                        <div class='ro-quantity'>
                          <p>x<span>$productocarrito[cantidad]</span></p>
                        </div>
                      </div>
                      <div>
                        <div class='ro-item-color'>
                          <label class='ro-type-1'>
                            <input type='radio' name='item1' value='color1' checked='checked'/><span></span>
                          </label>
                          <label class='ro-type-2'>
                            <input type='radio' name='item1' value='color2'/><span></span>
                          </label>
                          <label class='ro-type-3'>
                            <input type='radio' name='item1' value='color3'/><span></span>
                          </label>
                        </div>
                        <div class='ro-price'>
                          <p>$ $precio</p>
                        </div>
                      </div>
                    </div>
					
						";
						$cont++;
						$items[] = array (
													"title" => "$productocarrito[descripcion]",
													"quantity" => intval($productocarrito['cantidad']),
													"currency_id" => "ARS",
													"unit_price" => doubleval($productocarrito['precio'])
												);
												
												# Opciones: TRUE o FALSE 

										$mp->sandbox_mode(TRUE);
										$_REQUEST['idpedido'] = 1;
										$back = array(
											//Redireccionamientos segun resultados
											"success" => 'http://tecone.com.ar/pago.php?msgrespuesta=PAGO&idpedido='.$_REQUEST['idpedido'],
											"failure" => 'http://tecone.com.ar/index.php?msgrespuesta=CANCELADO',
											"pending" => 'http://tecone.com.ar/index.php?msgrespuesta=PENDIENTE');
										$preference_data = array(
											"back_urls" => $back,
											"external_reference" => $_REQUEST['idpedido'],
											"items" => $items
										);
										# Opciones: sandbox_init_point o init_point 
										$preference = $mp->create_preference($preference_data);

                    // $pagofacil = new stdClass();
                    // $pagofacil->default_payment_method_id = 'pagofacil';

                    // $rapipago = new stdClass();
                    // $rapipago->default_payment_method_id = 'rapipago';

                    // $provnet = new stdClass();
                    // $provnet->default_payment_method_id = 'bapropagos';

                    // $redlink = new stdClass();
                    // $redlink->default_payment_method_id = 'redlink';

                    // $preference_pagofacil_data = array_merge($preference_data, array('payment_methods' => $pagofacil));
                    // $preference_rapipago_data = array_merge($preference_data, array('payment_methods' => $rapipago));
                    // $preference_provnet_data = array_merge($preference_data, array('payment_methods' => $provnet));
                    // $preference_redlink_data = array_merge($preference_data, array('payment_methods' => $redlink));

                    // $preference_pagofacil = $mp->create_preference($preference_pagofacil_data);
                    // $preference_rapipago = $mp->create_preference($preference_rapipago_data);
                    // $preference_provnet = $mp->create_preference($preference_provnet_data);
                    // $preference_redlink = $mp->create_preference($preference_redlink_data);

										$total = number_format($total + $precio, 2);
					}
					
					?>
                </div>
                <div class="ro-footer">
                  <div>
                    <p>Subtotal<span>$ <?php echo $total;?></span></p>
                    <div class="ro-divide"></div>
                  </div>
                  <div>
                    <p>Envio<span>Acordar con el Vendedor</span></p>
                    <div class="ro-divide"></div>
                  </div>
                  <div>
                    <p>Total<span>$ <?php echo $total;?></span></p>
                  </div>
                  <div>
                    <p>Payment Due<span>$ <?php echo $total;?></span></p>
                  </div>
                </div>
				  
				  <!--/*accordion*/-->

          <input type="hidden" id="mercadopago" value="<?=$preference['response']['sandbox_init_point']?>" />
          <!-- <input type="hidden" id="pagofacil_preference" value="<?=$preference_pagofacil['response']['sandbox_init_point']?>" />
          <input type="hidden" id="rapipago_preference" value="<?=$preference_rapipago['response']['sandbox_init_point']?>" />
          <input type="hidden" id="provnet_preference" value="<?=$preference_provnet['response']['sandbox_init_point']?>" />
          <input type="hidden" id="redlink_preference" value="<?=$preference_redlink['response']['sandbox_init_point']?>" /> -->
          <input type="hidden" id="medio" value="acordarVendedor">
          <input type="hidden" name="idpedido" value="<?=$_REQUEST['idpedido']?>"  />
          <input type="hidden" name="opcion" value="confirmarpago"  />
				  
				  <div class="payment-method">
            <div class="payment-accordion">

              <div class="accordion" id="accordionExample">

                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="acordarVendedor">
                        Acordar con el vendedor.
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="mt-3">
                        Se te envía el pedido con todos los datos de cuenta de nosotros para que nos hagas una transferencia
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="mercadoPago">
                        MercadoPago
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <img id="auxbutton" style="width: 100px;border:1px solid lightgray;height:70px;border-radius:15px;" src="assets/img/mercadopago.png">
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="tarjetas">
                        Tárjetas de crédito / débito (Mercado Pago)
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">

                      <img id="auxbutton" style="width: 100px;border:1px solid lightgray;height:70px;border-radius:15px;" src="assets/img/mercadopago.png">

                      <form action="" method="post" id="pay" name="pay">
                        
                        <!-- <p>
                          <span>Titular de la Tarjeta:  </span>
                          <input class="input-sm" data-checkout="cardholderName" type="text" style="background-color: white;" />
                        </p>
                        <p><span>N&uacute;mero de Tarjeta: </span>
                          <input data-checkout="cardNumber" type="text" style="background-color: white;" />
                        </p>
                       
                        <p class="col-6">
                          <span>Mes de Expiraci&oacute;n:</span> 
                          <input data-checkout="cardExpirationMonth" type="text" style="background-color: white;" />
                        </p>

                        <p class="col-6">
                          <span>A&ntilde;o de Expiraci&oacute;n: </span>
                          <input data-checkout="cardExpirationYear" type="text" style="background-color: white;" />
                        </p>

                        <p class="col-6"><span>C&oacute;digo de Seguridad: </span>
                          <input data-checkout="securityCode" type="text" style="background-color: white;" />
                        </p>

                        <p class="col-6"><span>Tipo de documento:</span>
                          <select id="docType" data-checkout="docType"></select>
                        </p>
                        
                        <p class="col-6"><span>N&uacute;mero de Documento:</span>
                          <input data-checkout="docNumber" type="text" style="background-color: white;" />
                        </p>

                        <br><br> 


                        <p><span>Cuotas:</span>
                          <select class="cuota" name="cuota" id="installmentsOption">
                            <option value="">Seleccione...</option>
                          </select>
                        </p>

                        <input type="hidden" name="paymentMethodId" /> -->

                      </form>

                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" id="otrasPlataformas">
                        Otras Plataformas
                      </button>
                    </h2>
                  </div>
                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="row" >
                          <div class="col-md-3">
                              <label>
                              <input type="radio" name="otrospago" value="rapipago" />
                                  <img style="width: 80px;border:1px solid lightgray;height:70px;border-radius: 15px;" src="assets/img/rapipago.jpg">
                              </label>
                          </div>
                          <div class="col-md-3">
                              <label>
                                  <input type="radio" name="otrospago" value="pagofacil" onclick='vselect(this.value)' />
                                  <img style="width: 100px;border:1px solid lightgray;height:70px;border-radius: 15px;" src="assets/img/pagofacil.jpg">
                              </label>
                          </div>
                          <div class="col-md-3">
                              <label>
                                  <input type="radio" name="otrospago" value="provnet" onclick='vselect(this.value)' />
                                  <img style="width: 80px;border:1px solid lightgray;height:70px;border-radius: 15px;" src="assets/img/provnet.png">
                              </label>
                          </div>
                          <div class="col-md-3">
                              <label>
                                  <input type="radio" name="otrospago" value="redlink" onclick='vselect(this.value)' />
                                  <img style="width: 75px;border:1px solid lightgray;height:70px;border-radius: 15px;" src="assets/img/redlink.jpg">
                              </label>
                          </div>
                          <input type="hidden" id="presult">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="order-button-payment" id="bt">
                      <input id='boton1' value='Acordar' type='submit'>
                      <div class="boton-tarjetas" style="display: none;">
                        <form action="procesar-pago.php" method="POST">
                          <script
                            src="https://www.mercadopago.com.ar/integrations/v1/web-tokenize-checkout.js"
                            data-public-key="TEST-1b30b32a-7cc1-4991-b60d-8d0cb7005877"
                            data-transaction-amount="<?php echo $total; ?>">
                          </script>
                        </form>
                      </div>
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
		  
		  
    <div id="ro-backtop">
      <i class="icon-up"></i>
    </div>

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
	  <script>

      $(document).ready(function() {

        $('#acordarVendedor').click(function(){
          $('#medio').val('acordarVendedor');
          $('#boton1').show();
          $('.boton-tarjetas').hide();
          $('#boton1').val('Acordar');
        });
        $('#mercadoPago').click(function(){
          $('#medio').val('mercadoPago');
          $('#boton1').show();
          $('.boton-tarjetas').hide();
          $('#boton1').val('Pagar');
        });
        $('#tarjetas').click(function(){
          $('#medio').val('tarjetas');
          $('#boton1').hide();
          $('.boton-tarjetas').show();
        });
        $('#otrasPlataformas').click(function(){
          $('#boton1').val('Pagar');
          $('#boton1').show();
          $('.boton-tarjetas').hide();
          $('input[type=radio][name=otrospago]').change(function(){
            $('#medio').val(this.value);
          });
        });

        $('#boton1').click(function(scope){
          event.preventDefault();
          switch ($('#medio').val()) {
            case 'acordarVendedor':
              console.log('acordar');
              var mail = $('#mail').val(),
                  nombre = $('#nombre').val();
              $.post( "gestion/PHPMailer/mail.php", { mail: mail, nombre: nombre })
                .done(function(){
                  swal('Se ha notificado a nuestro equipo de tu compra. Te contactaremos a la brevedad.');
                });
              break;
            case 'mercadoPago':
              window.open($('#mercadopago').val(), '_self');
              break;
            case 'rapipago':
            window.open($('#mercadopago').val(), '_self');
              break;
            case 'pagofacil':
            window.open($('#mercadopago').val(), '_self');
              break;
            case 'provnet':
            window.open($('#mercadopago').val(), '_self');
              break;
            case 'redlink':
            window.open($('#mercadopago').val(), '_self');
              break;
          }
        });
      });

	</script>

	<!-- Acordion -->
	  <script type="text/javascript"> 
		  
    	  $(".coupon-accordion h3").click(function(){
    		
           var contenido=$(this).nextAll(".coupon-content");
        			
           if(contenido.css("display")=="none"){ //open		
              contenido.slideDown(350);			
              $(this).addClass("open");
           }
           else{ //close		
              contenido.slideUp(350);
              $(this).removeClass("open");	
          }
        							
        });

	  </script>

    <script src='node_modules/sweetalert/dist/sweetalert.min.js'></script>
	
	
    <!-- endbuild -->
    <script>(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;e=o.createElement(i);r=o.getElementsByTagName(i)[0];e.src='//www.google-analytics.com/analytics.js';r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));ga('create','UA-57387972-1');ga('send','pageview');</script>
  </body>
</html>