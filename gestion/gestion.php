<?php 

session_start();
require_once "Objetos/GestionCategoria.php";
require_once "Objetos/Categoria.php";
require_once "Objetos/GestionSubcategoria.php";
require_once "Objetos/Subcategoria.php";
require_once "Objetos/GestionUsuario.php";
require_once "Objetos/Usuario.php";
require_once "Objetos/GestionProducto.php";
require_once "Objetos/Producto.php";

$gestionproducto = new GestionProducto();
$gestionusuario = new GestionUsuario();
$gestioncategoria = new GestionCategoria();
$gestionsubcategoria = new GestionSubcategoria();

$opcion = $_REQUEST['opcion'];

switch ($opcion) {
    case 'recuperarclavegestion':
		$usuario = $gestionusuario->traerpormail($_REQUEST['mail']);
		if(count($usuario)>0){
			$nombre = $usuario[0]['apellidonombre'];
			$clave = $usuario[0]['clave'];
			$mail = $usuario[0]['mail'];

			$_SESSION['msg'] = 'Le enviamos su clave al correo electronico indicado.';
			$mensaje="Hola $nombre! Le dejamos su clave: $clave.%0A%0ADonde Hay?.";
			$email="$mail";				
			file_get_contents('http://www.elogistix.com.ar/herramientas/titanio/cv/mailgenerico?from=info@dondehay.com.ar&to='.$email.'&asunto=Recuperacion%20de%20Clave%20-%20DONDE%20HAY?&mensaje='.str_replace(' ', '%20', $mensaje));
		}else{
			$_SESSION['msgerror'] = 'El mail ingresado no es un mail perteneciente al sistema.';
		}
		header('Location: ./index.php');

		break;
    case 'login':			
			$login = $gestionusuario->login($_REQUEST['usuario'],$_REQUEST['clave']);
			var_dump($login);
			if($login){
				$_SESSION['login'] = 'true';
				$_SESSION['perfil'] = $login[0]['perfil'];
				$_SESSION['apellidonombre'] = $login[0]['apellidonombre'];
				$_SESSION['idusuario'] = $login[0]['id'];

				// header('Location: ./inicio.php');
			}else{

				$_SESSION['login'] = 'false';
				$_SESSION['perfil'] = '';
				$_SESSION['msgerror'] = 'Usuario inexistente.';

				// header('Location: ./index.php');
			}
		break;
    case 'altausuario':
		$usuario = new Usuario($_REQUEST['apellidonombre'],$_REQUEST['usuario'],$_REQUEST['clave'],$_REQUEST['mail'],$_REQUEST['telefono']);
		$msg = $usuario->guardar();
		
		$_SESSION['msg'] = $msg;
		header('Location: ./usuarios.php');
	break;
    case 'editarusuario':
		$msg = $gestionusuario->modificarUsuario($_REQUEST['id'],$_REQUEST['apellidonombre'],$_REQUEST['usuario'],$_REQUEST['clave'],$_REQUEST['mail'],$_REQUEST['telefono']);
		$_SESSION['msg'] = $msg;
		header('Location: ./usuarios.php');
	break;
    case 'bajausuario':
		$msg = $gestionusuario->eliminar($_REQUEST['id']);
		$_SESSION['msg'] = $msg;
		header('Location: ./usuarios.php');
	break;
    case 'activarusuario':
		$msg = $gestionusuario->activar($_REQUEST['id']);
		$_SESSION['msg'] = $msg;
		header('Location: ./usuarios.php');
	break;
    case 'altacategoria':
		$categoria = new Categoria($_REQUEST['descripcion']);
		$msg = $categoria->guardar();
		
		$_SESSION['msg'] = $msg;
		header('Location: ./categorias.php');
	break;
    case 'editarcategoria':
		$msg = $gestioncategoria->modificarCategoria($_REQUEST['id'],$_REQUEST['descripcion']);
		$_SESSION['msg'] = $msg;
		header('Location: ./categorias.php');
	break;
    case 'bajacategoria':
		$msg = $gestioncategoria->eliminar($_REQUEST['id']);
		$_SESSION['msg'] = $msg;
		header('Location: ./categorias.php');
	break;
    case 'activarcategoria':
		$msg = $gestioncategoria->activar($_REQUEST['id']);
		$_SESSION['msg'] = $msg;
		header('Location: ./categorias.php');
	break;
    case 'altasubcategoria':
		$subcategoria = new Subcategoria($_REQUEST['descripcion'],$_REQUEST['categoria']);
		$msg = $subcategoria->guardar();
		
		$_SESSION['msg'] = $msg;
		header('Location: ./subcategorias.php');
	break;
    case 'editarsubcategoria':
		$msg = $gestionsubcategoria->modificarsubcategoria($_REQUEST['id'],$_REQUEST['descripcion'],$_REQUEST['categoria']);
		$_SESSION['msg'] = $msg;
		header('Location: ./subcategorias.php');
	break;
    case 'bajasubcategoria':
		$msg = $gestionsubcategoria->eliminar($_REQUEST['id']);
		$_SESSION['msg'] = $msg;
		header('Location: ./subcategorias.php');
	break;
    case 'activarsubcategoria':
		$msg = $gestionsubcategoria->activar($_REQUEST['id']);
		$_SESSION['msg'] = $msg;
		header('Location: ./subcategorias.php');
	break;
    case 'altaproducto':
		$ultimo = $gestionproducto->traerUltimoId();
		if(count($ultimo)==0){
			$ultimoid = 0;
		}else{
			$ultimoid = $ultimo[0]['id'] + 1;
		}
		
		$uploaddir = "../img/productos/$ultimoid/";
		$frontalsize = $_FILES['frontal']['size'];
		$frontalname = trim($_FILES['frontal']['name']);
		$lateralsize = $_FILES['lateral']['size'];
		$lateralname = trim($_FILES['lateral']['name']);
		$espaldasize = $_FILES['espalda']['size'];
		$espaldaname = trim($_FILES['espalda']['name']);
	
		if (!file_exists($uploaddir)) {
			mkdir($uploaddir, 0777, true);
		}

		if($frontalsize > 0){
			$uploadfile = $uploaddir . $frontalname;
			move_uploaded_file($_FILES['frontal']['tmp_name'], $uploadfile);
		}
		if($lateralsize > 0){
			$uploadfile = $uploaddir . $lateralname;
			move_uploaded_file($_FILES['lateral']['tmp_name'], $uploadfile);
		}
		if($espaldasize > 0){
			$uploadfile = $uploaddir . $espaldaname;
			move_uploaded_file($_FILES['espalda']['tmp_name'], $uploadfile);
		}

		$producto = new Producto($_REQUEST['descripcion'],$_REQUEST['precio'], 
								 $_REQUEST['categoria'], $frontalname, $lateralname, $espaldaname, $_REQUEST['stock'], $_REQUEST['destacado'], 
								 $_REQUEST['tendencia'],$_REQUEST['oferta'], $_REQUEST['infodetallada']);
		$msg = $producto->guardar();
		
		$_SESSION['msg'] = $msg;
		header('Location: ./productos.php');
	break;
    case 'editarproducto':
		$uploaddir = "../img/productos/$_REQUEST[id]/";
		$frontalsize = $_FILES['frontal']['size'];
		$frontalname = trim($_FILES['frontal']['name']);
		$lateralsize = $_FILES['lateral']['size'];
		$lateralname = trim($_FILES['lateral']['name']);
		$espaldasize = $_FILES['espalda']['size'];
		$espaldaname = trim($_FILES['espalda']['name']);
	
		if (!file_exists($uploaddir)) {
			mkdir($uploaddir, 0777, true);
		}

		if($frontalsize > 0){
			$uploadfile = $uploaddir . $frontalname;
			move_uploaded_file($_FILES['frontal']['tmp_name'], $uploadfile);
		}
		if($lateralsize > 0){
			$uploadfile = $uploaddir . $lateralname;
			move_uploaded_file($_FILES['lateral']['tmp_name'], $uploadfile);
		}
		if($espaldasize > 0){
			$uploadfile = $uploaddir . $espaldaname;
			move_uploaded_file($_FILES['espalda']['tmp_name'], $uploadfile);
		}

		$msg = $gestionproducto->modificarProducto( $_REQUEST['id'],$_REQUEST['descripcion'],$_REQUEST['precio'], 
													$_REQUEST['categoria'], $frontalname, $lateralname, $espaldaname, 
													$_REQUEST['stock'], $_REQUEST['destacado'], 
													$_REQUEST['tendencia'], $_REQUEST['oferta'], $_REQUEST['infodetallada']);
		$_SESSION['msg'] = $msg;
		header('Location: ./productos.php');
	break;
    case 'bajaproducto':
		$msg = $gestionproducto->eliminar($_REQUEST['id']);
		$_SESSION['msg'] = $msg;
		header('Location: ./productos.php');
	break;
    case 'activarproducto':
		$msg = $gestionproducto->activar($_REQUEST['id']);
		$_SESSION['msg'] = $msg;
		header('Location: ./productos.php');
	break;
	default:
		header('Location: ./index.php');
	break;
}

?>					
