<?php
session_start();
require_once "Objetos/Gestion.php";
require_once "Objetos/Cliente.php";

if (isset($_POST['mail']) && isset($_POST['clave'])) {

	$gestionCliente = new Gestion();

	$mail = $_REQUEST['mail'];
	$clave = $_REQUEST['clave'];

	$login = $gestionCliente->loginCliente($mail, $clave);

	echo $login;

	$_SESSION['logincliente'] = true;
	$_SESSION['idcliente'] = $login['id'];
	$_SESSION['apellidonombre'] = $login['apellidonombre'];
	$_SESSION['mail'] = $login['mail'];
	$_SESSION['telefono'] = $login['telefono'];
	$_SESSION['provincia'] = $login['provincia'];
	$_SESSION['ciudad'] = $login['ciudad'];
	$_SESSION['direccion'] = $login['direccion'];
	$_SESSION['codigo_postal'] = $login['codigo_postal'];

	header('Location: ../checkout.php');

} else {

	header('Location: ../checkout.php?usuarioIncorrecto=1');
}