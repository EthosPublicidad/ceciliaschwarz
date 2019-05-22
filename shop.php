<!DOCTYPE html>
<html class="no-js">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>:: Cecilia Schwarz 🍁| Nuestra Tienda, Productos para tu piel ::</title>
    <meta name="description" content="Aqua | Spa and Beauty HTML5 Template">
   <?php 
        include("include/head.php");
      ?>
  </head>
  <?php 
	session_start();
	require_once "./gestion/Objetos/GestionProducto.php"; 
	require_once "./gestion/Objetos/GestionCategoria.php"; 
	$gestionproducto=new GestionProducto();
	$gestioncategoria = new GestionCategoria();
	$tendencias = $gestionproducto->traerTendencias();
	$_REQUEST['id'] = 'TODO';
	if(!empty($_REQUEST['id'])){	
		$productos = $gestionproducto->traerPorCategoria($_REQUEST['id']);	
		if($_REQUEST['id']!="TODO"){	
			$categ = $gestioncategoria->get('categoria', $_REQUEST['id'])[0];
		}else{
			$categ = array("descripcion"=>"Todos los productos");
		}
	}else{
		header('Location: ./index.php');
	}

	if(empty($_REQUEST['vista'])){
		$vista = 'grid';
	}else{
		$vista = $_REQUEST['vista'];
	}
	//print_r($productos);
	//foreach ($productos as $tmp){
	//	echo $tmp['id'];
	//}
?>
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
              <div class="ro-hotline pull-left"> <a href="index.php">Home /</a><span class="ro-color-main"> shop</span></div>
            </div>
            <div class="col-md-4">
              <ul class="ro-nav text-center">
                <li><a href="#">SPA</a></li>
                <li><a href="#">CUERPO</a></li>
                <li><a href="#">FACIAL</a></li>
                
              </ul>
            </div>
            <div class="col-md-4 hidden-sm hidden-xs">
           
            </div>
			  <div class="cart-content shop-content">
				<a href="cart.html">
              <div data-content=<?php if(!empty($_SESSION['pedido'])){echo count($_SESSION['pedido']);}else{echo "0";}?> class="ro-cart"><i class="icon-ecommerce-cart-content"></i></div></a>
				  
				  <div class="main-cart-box main-cart-shop">
                 <div class="single-cart-box">
			      <div class="cart-img"> <img alt="" src="assets/images/car.jpg"> </div>
					<div class="cart-content">
						<h6 class="titlemenu"> Nombre del producto </h6>
					 <span class="quantitys"> Cantidad: <span id="canti"> 1 
						 -</span> </span>
						<span> $999.14 </span>
					 </div>
					 <i class="zmdi zmdi-close"> </i>
					 
					 <div class="cart-footer fix">
						 <h5> Total <span class="f-right">$<span id="subt"> 999.14</span> </span></h5>
					 
					 </div>
					 
					 <div class="cart-actions">
						 <a href="checkout.html"> Comprar</a>
						  <a href="cart.html"> Ver Carrito </a>
					 
					 </div>
					  
					  </div>
					  
					  
                  </div>
			  
				  </div>
          </div>
        </div>
      </div>
    </nav>
    <div id="ro-main" class="ro-main clearfix">
      <header class="ro-shop-header ro-section ro-padding-top">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-xs-12 ro-section-mb">
              <div class="ro-slider-style-1-wrapper">
                <div id="ro-slider-style-1" style="position: relative; top: 0px; left: 0px; width: 770px; height: 500px; margin:0 auto;" class="ro-slider-style-1">
                  <div data-u="slides" style="cursor: pointer; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 770px; height: 500px;">
                    <div><img src="assets/images/shop-header1.jpg" alt="shop header" data-u="image">
                      <div data-u="caption" data-t="FADE" style="position: absolute; top: 165px; left: 360px; width: 300px;height:2px; background-color: #444"></div>
                      <div data-u="caption" data-t="R" data-t2="L" style="position: absolute; top: 30px; left: 230px; width:400px;"><span style="font-size: 48px">SALE</span><span style="font-size: 89px">50%</span></div>
                      <div data-u="caption" data-t="L" data-t2="R" style="position: absolute; top: 170px; left: 475px; width: 300px;"><i class="ro-font-size-3">TOOLS OF YOGA</i></div>
                    </div>
                    <div><img src="assets/images/shop-header1.jpg" alt="shop header" data-u="image">
                      <div data-u="caption" data-t="R" data-t2="FADE" style="position: absolute; top: 30px; left: 230px; width:400px;"><span style="font-size: 48px">SALE</span><span style="font-size: 89px">50%</span></div>
                      <div data-u="caption" data-t="R" data-t2="FADE" style="position: absolute; top: 165px; left: 360px; width: 300px;height:2px; background-color: #444"></div>
                      <div data-u="caption" data-t="R" data-t2="FADE" style="position: absolute; top: 170px; left: 475px; width: 300px;"><i class="ro-font-size-3">TOOLS OF YOGA</i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-xs-12 ro-section-mb">
              <div class="ro-shop-header-right"><img src="assets/images/shop-header2.jpg" alt="img" class="img-responsive">
                <div class="ro-overlay text-center">
                  <div class="ro-cell-vertical-wrapper">
                    <div class="ro-cell-bottom">
                      <h3 class="ro-hr-heading">HOT SOAP</h3>
                      <p class="ro-font-size-4 ro-light-text"><i>IN SUMMER</i></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="ro-section">
        <div class="container">
          <ul class="ro-shop-tab-controler">
            <li><a href="#ro-shop-spa" data-toggle="tab">SPA</a></li>
            <li class="active"><a href="#ro-shop-beauty" data-toggle="tab">FACIAL</a></li>
            <li><a href="#ro-shop-yoga" data-toggle="tab">CUERPO</a></li>
          </ul>
          <div id="ro-shop-tab" class="tab-content">
            <div id="ro-shop-spa" class="tab-pane fade">
              <div class="row">
			  <?php
			    $count = 1;
			    foreach ($productos as $tmp){ 
				   if ($tmp['categoria'] == 'SPA'){
				?>				
				<div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="ro-shop-tab-item">
                    <div class="ro-image"><img src=<?php echo 'img/productos/'.$tmp['id'].'/'.$tmp['foto1'];?> alt="product"/>
                      <div class="ro-overlay">
                        <div class="ro-overlay-inner ro-cell-vertical-wrapper">
                          <div class="ro-cell-middle"><a onclick='agregaralpedido(1,1);'><i class="icon-ecommerce-cart"></i></a><a href="#modal"><i class="icon-basic-eye" data-toggle="modal" data-target="#modal"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="ro-content"><a href="product.html">
                        <h5><?php echo $tmp['descripcion'];?></h5></a>
                      <h3 class="ro-color-main"><?php 
					  if ($tmp['destacado'] ==1){
					      echo '<del>$'.$tmp['precio'].'</del>$'.($tmp['precio'] - ($tmp['precio']*($tmp['oferta']/100)));
					  }else{
						  echo '$'.$tmp['precio'];  
					  }
					  ?></h3>                      
                    </div>
                  </div>
                </div>
				<?php if ($count%4 == 0){ ?>
					<div class="col-md-12 hidden-xs hidden-sm">
                       <div class="ro-shoptab-separator"></div>
                    </div>
				<?php }
				 $count++;
				   }} ?>
              </div>
            </div>
            <div id="ro-shop-beauty" class="tab-pane fade active in">
              <div class="row">
                <?php
			    $count = 1;
			    foreach ($productos as $tmp){ 
				   if ($tmp['categoria'] == 'FACIAL'){
				?>				
				<div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="ro-shop-tab-item">
                    <div class="ro-image"><img src=<?php echo 'img/productos/'.$tmp['id'].'/'.$tmp['foto1'];?> alt="product"/>
                      <div class="ro-overlay">
                        <div class="ro-overlay-inner ro-cell-vertical-wrapper">
                          <div class="ro-cell-middle"><a onclick=<?php echo 'agregaralpedido('.$tmp['id'].',1);'?>><i class="icon-ecommerce-cart"></i></a><a href="#modal"><i class="icon-basic-eye" data-toggle="modal" data-target="#modal"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="ro-content"><a href="product.html">
                        <h5><?php echo $tmp['descripcion'];?></h5></a>
                      <h3 class="ro-color-main"><?php 
					  if ($tmp['destacado'] ==1){
					      echo '<del>$'.$tmp['precio'].'</del>$'.($tmp['precio'] - ($tmp['precio']*($tmp['oferta']/100)));
					  }else{
						  echo '$'.$tmp['precio'];  
					  }
					  ?></h3>
                    </div>
                  </div>
                </div>
				<?php if ($count%4 == 0){ ?>
					<div class="col-md-12 hidden-xs hidden-sm">
                       <div class="ro-shoptab-separator"></div>
                    </div>
				<?php }
				 $count++;
				   }} ?>
              </div>
            </div>
            <div id="ro-shop-yoga" class="tab-pane fade">
              <div class="row">
                <?php
			    $count = 1;
			    foreach ($productos as $tmp){ 
				   if ($tmp['categoria'] == 'CUERPO'){
				?>				
				<div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="ro-shop-tab-item">
                    <div class="ro-image"><img src=<?php echo 'img/productos/'.$tmp['id'].'/'.$tmp['foto1'];?> alt="product"/>
                      <div class="ro-overlay">
                        <div class="ro-overlay-inner ro-cell-vertical-wrapper">
                          <div class="ro-cell-middle"><a onclick=<?php echo 'agregaralpedido('.$tmp['id'].',1);'?>><i class="icon-ecommerce-cart"></i></a><a href="#modal"><i class="icon-basic-eye" data-toggle="modal" data-target="#modal"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="ro-content"><a href="product.html">
                        <h5><?php echo $tmp['descripcion'];?></h5></a>
                      <h3 class="ro-color-main"><?php 
					  if ($tmp['destacado'] ==1){
					      echo '<del>$'.$tmp['precio'].'</del>$'.($tmp['precio'] - ($tmp['precio']*($tmp['oferta']/100)));
					  }else{
						  echo '$'.$tmp['precio'];  
					  }
					  ?></h3>
                    </div>
                  </div>
                </div>
				<?php if ($count%4 == 0){ ?>
					<div class="col-md-12 hidden-xs hidden-sm">
                       <div class="ro-shoptab-separator"></div>
                    </div>
				<?php }
				 $count++;
				   }} ?>
              </div>
            </div>
          </div>
          <nav class="text-center ro-section-mb-small">
            <ul class="pagination clearfix">
              <li><a href="#"><i class="icon-arrows-slim-left"></i></a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#"><i class="icon-arrows-slim-right"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>
      <?php 
        include("include/footer.php");
      ?>
      <!-- /.modal-content -->
		<div class="modal fade out" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="false" style="display: none;">
			<div class="modal-dialog" style="width:65%;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							x
						</button>
						<h4 class="modal-title" id="myModalLabel">
							Producto
						</h4>
					</div>
		<div class="ro-section ro-white">
        <div class="ro-product-page">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="ro-title">
                  <h4></h4>
                </div>
              </div>
            </div>
            <div class="row ro-product-wrapper">
              <div class="col-md-4 col-sm-9 col-xs-12">
                <div class="ro-product-image">
                  <div id="Ro_zoom_image" class="ro-image"><img src="assets/images/product-img-large.jpg" data-zoom-image="assets/images/product-img-large.jpg" alt="Product Item" class="ro-zoom-image-0"/></div>
                  <div class="ro-footer clearfix"><a href="checkout.html">
                      <div>COMPRAR</div></a><a href="cart.html">
                      <div>+ CARRITO</div></a>
                  </div>
                </div>
              </div>
              <div class="col-md-1 col-sm-3 col-xs-12 ro-product-option-wrapper">
                <div data-mcs-theme="minimal-dark" id="Ro_gallery_0" class="ro-product-option mCustomScrollbar"><a href="#" data-image="assets/images/product-img-large.jpg" data-zoom-image="assets/images/product-img-large.jpg"><img src="assets/images/product-img-small.jpg" alt="zoom image" class="ro-zoom-image-0"/></a><a href="#" data-image="assets/images/product-img-large2.jpg" data-zoom-image="assets/images/product-img-large2.jpg"><img src="assets/images/product-img-small2.jpg" alt="zoom image" class="ro-zoom-image-0"/></a><a href="#" data-image="assets/images/product-img-large3.jpg" data-zoom-image="assets/images/product-img-large3.jpg"><img src="assets/images/product-img-small3.jpg" alt="zoom image" class="ro-zoom-image-0"/></a></div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="ro-product-information">
                  <div class="ro-head">
                    <h4>HANDCRAFTED SOAP STONE</h4>
                    <h2>$ 25.00</h2>
                  </div>
                  <form class="ro-body col-md-7 ">
                    
                    <div class="ro-quantity col-md-12">
                      <div>
                        <p>Cantidad:</p>
                      </div>
                      <div>
                        <input type="number" name="quantity1" value="1"/>
                      </div>
                    </div>
                   
                  </form>
                  <div class="col-md-7 col-xs-12 ro-footer">
                    <h6>DESCRIPTION</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
					
					
				</div>
				<!-- /.modal-content -->
			</div>
		</div><!-- /.modal-content -->
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