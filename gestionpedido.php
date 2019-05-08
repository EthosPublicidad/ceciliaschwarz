<?php 
error_reporting(E_ALL);
session_start();

require_once "./gestion/Objetos/GestionProducto.php";
require_once "./gestion/Objetos/Gestion.php";
require_once "./gestion/Objetos/Producto.php";

$gestionproducto = new GestionProducto();
$gestion = new Gestion();

$opcion = $_REQUEST['opcion'];

switch ($opcion) {
    case 'mail':
        $html = "
            <html>
				<head>
				</head>
                <body>
                    <div>
                        Hola <strong>Tec One</strong>,  se registro un nuevo pedido de Nicolas Corvalan con mail corvalan4@gmail.com y telefono 15314141
                    </div>
                    <div>
                        <strong>Total a abonar</strong>: $ 500
                    </div>
                    <div>
						<br/>
						<br/>
						<strong>Productos</strong><br/>";
			$html .= "
                    </div>
                    <div>
						<br/>
						<br/>
						Hasta luego! <br/>
						<a href='http://tecone.com.ar'>Tec One</a>						
                    </div>
                </body>
            </html>
        ";
		$email = "info@tecone.com.ar";		
		$to = "info@tecone.com.ar";		
		$subject = "Nuevo pedido!";
		$headers = "From: " . $email . "\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		if(mail($to, $subject, $html, $headers)){
			echo "enviado";
		}else{
			echo "no enviado";
		}
	break;
    case 'confirmarpago':
		if($_REQUEST['tipodepago']=='MP'){
			$tipopago = "El cliente acordo pagar con Mercado Pago.";
		}else{
			$tipopago = "El cliente acordo coordinar con el vendedor el pago.";
		}
		
		$html = "
			<html>
				<head>
				</head>
				<body>
					<div>
						Hola <strong>Tec One</strong>, les dejamos los datos para el envio del pedido PEDIDO-$_REQUEST[idpedido]
					</div>
					<div>
						<strong>Datos para el envio</strong>
					</div>
					<div>
						<strong>Nombre</strong> $_REQUEST[nombre] <br/>
						<strong>Email</strong> $_REQUEST[mail] <br/>
						<strong>Telefono</strong> $_REQUEST[telefono] <br/>
						<strong>Direccion</strong> $_REQUEST[direccion] <br/>
						<strong>Provincia</strong> $_REQUEST[provincia] <br/>
						<strong>Ciudad</strong> $_REQUEST[ciudad] <br/>
						<strong>Barrio</strong> $_REQUEST[barrio] <br/>
					</div>
					<div>
						<strong>Tipo de Pago</strong> $tipopago
					</div>
					<div>
						<br/>
						<br/>
						Hasta luego! <br/>
						<a href='http://tecone.com.ar'>Tec One</a>						
					</div>
				</body>
			</html>
		";

		$email = "info@tecone.com.ar";				
		$to = "info@tecone.com.ar";		
		$subject = "Nuevo pedido!";
		$headers = "From: " . $email . "\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		if(mail($to, $subject, $html, $headers)){
			//echo "enviado";
		}else{
			// echo "no enviado";
		}
		if($_REQUEST['tipodepago']=='MP'){
			header("Location: ".$_REQUEST['mercadopago']);
		}else{
			$_SESSION['msg'] = "Nos pondremos en contacto con usted para concluir la compra.";
			header("Location: index.php");
		}
		
	break;
    case 'agregaralpedido':
		echo $gestion->agregar($_REQUEST['idproducto'],$_REQUEST['cantidad']);				
	break;
    case 'sacardelpedido':
		echo $gestion->sacar($_REQUEST['idproducto']);				
	break;
    case 'vaciarpedido':
		$gestion->vaciar();				
		header('Location: ./mispedidos.php');
	break;
    case 'registro':
		$cliente = $gestion->buscarCliente($_REQUEST['mail']);
		if(count($cliente)==0){
			$cliente = $gestion->crearCliente($_REQUEST['apellidonombre'], $_REQUEST['mail'], $_REQUEST['telefono'], $_REQUEST['clave']);
			$_SESSION['clientelogin'] = "SI";
			$_SESSION['clienteid'] = $cliente[0]['id'];
			$_SESSION['clienteapellidonombre'] = $cliente[0]['apellidonombre'];
			
			header("Location: ./cart.php");
		}else{
			$_SESSION['msgerror'] = "Ya existe un usuario con este mail: ".$_REQUEST['mail'].". Para operar, debe loguearse.";
			header("Location: ./cart.php");
		}
	break;
    case 'cerrarsesion':
		$_SESSION['clientelogin'] = "NO";
		$_SESSION['clienteid'] = '';
		$_SESSION['clienteapellidonombre'] = '';
			
		header("Location: ./index.php");
	break;
    case 'logincliente':
		$cliente = $gestion->loginCliente($_REQUEST['mail'], $_REQUEST['clave']);
		if(count($cliente)>0){
			$_SESSION['clientelogin'] = "SI";
			$_SESSION['clienteid'] = $cliente[0]['id'];
			$_SESSION['clienteapellidonombre'] = $cliente[0]['apellidonombre'];
			header("Location: ./cart.php");
		}else{
			$_SESSION['msgerror'] = "No existe un usuario con este mail: ".$_REQUEST['mail']." o la clave es incorrecta.";		
			header("Location: ./cart.php");
		}
	break;
    case 'enviarpedido':
		$cont = $_REQUEST['contador'];
		
		$cliente = $gestion->traerCliente($_SESSION['clienteid']);
		$pedido = $gestion->crearPedido($cliente[0]['id'], $_REQUEST['total'], $_REQUEST['comentarios'], date("Y-m-d"));
		for($i=0; $i<$cont; $i++){
			if(isset($_REQUEST['idproducto'.$i]) and $_REQUEST['idproducto'.$i]!=''){
				$cantidad = $_REQUEST['cantidad'.$i];
				if($cantidad!='' and $cantidad>0){
					$gestion->crearDetallePedido($pedido[0]['id'], $_REQUEST['idproducto'.$i], $_REQUEST['precio'.$i], $cantidad);
				}
			}
		}
//		$_SESSION['msg'] = "Pedido realizado con exito, le estara llegando un mail a la brevedad con el detalle.";		
		$_SESSION['idpedido'] = $pedido[0]['id'];		

		$email = "info@tecone.com.ar";		
		$apellidonombre = $cliente[0]['apellidonombre'];		
		$telefono = $cliente[0]['telefono'];		
		$mail = $cliente[0]['mail'];		
		$to = $cliente[0]['mail'];		
		$subject = "Pedido realizado con exito.";
		$headers = "From: " . $email . "\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		$total = $pedido[0]['total'];
		$comentarios = $pedido[0]['comentarios'];
        $html = "
            <html>
				<head>
				</head>
                <body>
                    <div>
                        Hola <strong>$apellidonombre</strong>,  le dejamos el resultado de su pedido:
                    </div>
                    <div>
                        <strong>Total a abonar</strong>: $ $total
                    </div>
                    <div>
						<br/>
						<br/>
						<strong>Productos</strong><br/>
						";
					foreach($gestion->traerDetallesPedido($pedido[0]['id']) as $detallepedido){
						$html .= "Nombre $detallepedido[nombreproducto] - Cantidad: $detallepedido[cantidad] - Precio: $ $detallepedido[precio] <br/>";
					}
			$html .= "
                    </div>
                    <div>
						<strong>Comentarios</strong><br/>
						<p>$comentarios</p>
                    </div>
                    <div>
						<br/>
						<br/>
						Gracias por su pedido! <br/>
						<a href='http://tecone.com.ar'>Tec One</a>						
                    </div>
                </body>
            </html>
        ";
		if(mail($to, $subject, $html, $headers)){
//			echo "Enviado";
		}

        $html = "
            <html>
				<head>
				</head>
                <body>
                    <div>
                        Hola <strong>Tec One</strong>,  se registro un nuevo pedido de $apellidonombre con mail $mail y telefono $telefono
                    </div>
                    <div>
						<strong>Comentarios</strong><br/>
						<p>$comentarios</p>
                    </div>
                    <div>
                        <strong>Total a abonar</strong>: $ $total
                    </div>
                    <div>
						<br/>
						<br/>
						<strong>Productos</strong><br/>";
					foreach($gestion->traerDetallesPedido($pedido[0]['id']) as $detallepedido){
						$html .= "Nombre $detallepedido[nombreproducto] - Cantidad: $detallepedido[cantidad] - Precio: $ $detallepedido[precio] <br/>";
					}
			$html .= "
                    </div>
                    <div>
						<br/>
						<br/>
						Hasta luego! <br/>
						<a href='http://tecone.com.ar'>Tec One</a>						
                    </div>
                </body>
            </html>
        ";

		$email = "info@tecone.com.ar";		
		$subject = "Nuevo pedido!";
		$headers = "From: " . $email . "\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		//mail($email, $subject, $html, $headers);
		$gestion->vaciar();				
		/*
		echo "
		<h2>
			Pedido enviado con éxito!
		</h2>
		";
		*/
		//<script>window.location.href='index.php';</script>
		
		header('Location: ./checkout.php?idpedido='.$pedido[0]['id']);
	break;
    case 'olvidoclave':
		$cliente = $gestion->buscarCliente($_REQUEST['email']);
        if(count($cliente)>0){
			$apellidonombre = $cliente[0]['apellidonombre'];
			$clave = $cliente[0]['clave'];
			$html = "
				<html>
					<head>
					</head>
					<body>
						<div>
							Hola <strong>$apellidonombre</strong>!
						</div>
						<div>
							<strong>Su clave es</strong>: $clave
						</div>";
				$html .= "
						<div>
							<br/>
							<br/>
							Hasta luego! <br/>
							<a href='http://tecone.com.ar'>Tec One</a>						
						</div>
					</body>
				</html>
			";

			$email = "info@tecone.com.ar";		
			$subject = "Recuperar Clave";
			$headers = "From: " . $email . "\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			mail($cliente[0]['mail'], $subject, $html, $headers);
			$_SESSION['msg'] = "Se le envió un correo con su clave.";		
		}else{
			$_SESSION['msgerror'] = "No existe usuario con el mail ingresado.";
		}
		header('Location: ./index.php');
	break;
	default:
		header('Location: ./index.php');
	break;
}

?>