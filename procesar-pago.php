<?php

	require_once 'vendor/autoload.php';

	MercadoPago\SDK::setAccessToken("TEST-4226339354273573-102215-79b4c912cacc6ebf2102821c0746bd37__LA_LB__-153913519");

	$payment = new MercadoPago\Payment();

	$payment->transaction_amount = 141;
	$payment->token = $_REQUEST['token'];
	$payment->description = "Ergonomic Silk Shirt";
	$payment->installments = $_REQUEST['installments'];
	$payment->payment_method_id = $_REQUEST['payment_method_id'];
	$payment->issuer_id = $_REQUEST['issuer_id'];
	$payment->payer = array(
	  "email" => "larue.nienow@hotmail.com"
	);

	$payment->save();

	echo $payment->status;

?>