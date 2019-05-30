<?php



	function index()
	{
		echo $_POST['cadena'];
		$pattern = '/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i';
		$cadena = $_POST['cadena'];
		preg_match ( $pattern, $cadena, $matches );
		if (!isset($matches[0]))
				$email = '';
		else
			$email = trim($matches[0]);		
		$fname = str_replace($email, '',$cadena);
		$fname = str_replace(',', '',$fname);
		$fname = trim($fname);
		$debug = isset($_POST["debug"]) ? $_POST["debug"] : 0;
		$apikey = 'e94b4a4b7ca8d11ea08404d8f5308367-us20';//Apikey
		$listid = '622a6fd7ef';//ID de Lista
		$server = 'us20';
		$auth = base64_encode( 'user:'.$apikey );
		$data = array(
			'apikey'        => $apikey,
			'email_address' => $email,
			'status'        => 'subscribed',
			'merge_fields'  => array(
				'FNAME' => $fname
				)
			);

		$json_data = json_encode($data);
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'.api.mailchimp.com/3.0/lists/'.$listid.'/members');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.$auth));
		curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

		curl_setopt($ch, CURLOPT_POST, true);       
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
		$result = curl_exec($ch);
		sleep(3);
		header('Location: index.php');
		//$this->load->view('homepage');
	}
	index();
	

