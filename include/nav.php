 <?php 
 	session_start();

 	require_once "./gestion/Objetos/Gestion.php";

 	$gestion = new Gestion();

 ?>


 <nav id="ro-main-nav" class="ro-main-nav-style-3">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-12 col-xs-10"><a href="index.html"><img src="assets/images/aqua-brand2.svg" alt="aqua spa" class="ro-brand"/></a></div>
          <div class="col-md-9 col-sm-12 col-xs-2">
            <ul class="ro-nav-content text-center">
              <li class="visible-xs"><a href="index.html"><img src="assets/images/aqua-brand3.svg" alt="Aqua spa"/></a></li>
              <li><a href="index.php">HOME</a></li>
              <li><a href="nosotros.php">NOSOTROS</a></li>
              <li><a href="servicios.php">SERVICIOS</a></li>
			<!--<li><a href="afiliacion.php">AFILIACIÓN</a></li>-->
              <li><a href="shop.php">SHOP</a> </li>
              <!--<li><a href="blog-homepage.html">BLOG</a>
              </li>-->
				<li><a href="contacto.php">CONTACT</a></li>
            </ul>
			   
			  <div id="ro-hamburger" class="ro-hamburger visible-xs pull-right"><span></span></div>
			  
			  <div class="cart-content">
				<a href="cart.html">
              <div data-content=<?php if(!empty($_SESSION['pedido'])){echo count($_SESSION['pedido']); }else{echo "0";}?> class="ro-cart"><i class="icon-ecommerce-cart-content"></i></div></a>
				  
				  <div class="main-cart-box">
                  	<div class='single-cart-box'>

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
	                  	<div class='cart-img'> 
				      		<img alt='' src='img/productos/$productocarrito[id]/$productocarrito[foto]' style='max-width: 70px; '> 
				      	</div>
						<div class='cart-content'>
							<h6 class='titlemenu'> $productocarrito[descripcion] </h6>
						 <span class='quantitys'> Cantidad: <span id='canti'> 1 
							 -</span> </span>
							<span> $$precio </span>
						</div>

						<i class='zmdi zmdi-close'> </i>

						";
						

						
					}


                 	?>
					 
					 <div class="cart-footer fix">
						 <h5> Total <span class="f-right">$<span id="subt"> <?php echo $subtotales; ?></span> </span></h5>
					 </div>
					 
					 <div class="cart-actions">
						 <a href="checkout.php"> Comprar</a>
						  <a href="cart.php"> Ver Carrito </a>
					 </div>
					  
                  </div>
			  
				  </div>
				  </div>
			  
           
          </div>
        </div>
		        
      </div>
    </nav>


















<!--<nav id="ro-main-nav" class="ro-main-nav-style-3">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-12 col-xs-10"><a href="index.php"><img src="assets/images/aqua-brand2.svg" alt="aqua spa" class="ro-brand"/></a></div>
          <div class="col-md-9 col-sm-12 col-xs-2">
            <ul class="ro-nav-content text-center">
              <li class="visible-xs"><a href="index.php"><img src="assets/images/aqua-brand3.svg" alt="Aqua spa"/></a></li>
              <li><a href="index.php">HOME</a></li>
              <li><a href="nosotros.php">NOSOTROS</a></li>
              <li><a href="servicios.php">SERVICIOS</a></li>
				<li><a href="shop.php">AFILIACIÓN</a></li>
              <li><a href="shop.php">SHOP</a> </li>
              <li><a href="blog-homepage.html">BLOG</a>
                <ul class="ro-sub-nav">
                  <li><a href="blog-homepage.html">Blog Homepage</a></li>
                  <li><a href="blog-article1.html">Blog Article Basic</a></li>
                  <li><a href="blog-article2.html">Blog Article Sidebar</a></li>
                </ul>
              </li>
          
              <li><a href="contact.html">CONTACTO</a></li>
            </ul>
            
			  <div id="ro-hamburger " class="ro-hamburger visible-xs pull-right"><span></span> 
		      </div> 
			  
			 <div class="cart-content">
				  <a href="cart.html">
              <div data-content="2" class="ro-cart"><i class="icon-ecommerce-cart-content"></i>
			 </div> </a>
				  <div class="main-cart-box">
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
    </nav>-->