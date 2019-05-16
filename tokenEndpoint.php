<?php
session_start();

function getToken($session){
	$myfile = fopen("authKeys.txt", "r") or die("Unable to open file!");
	$result = [ 'validity'=> 'false', 'CSRF_token' => ''];
	while(! feof($myfile)){
		$line = preg_replace('~[\r\n]+~', '', fgets($myfile));
		if( explode(":", $line)[0] === $session){
			$result = ['validity'=> 'true', 'CSRF_token' => explode(":",$line)[1]];
		}
  	}
	fclose($myfile);
	return $result;
}

if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ){
		$session = $_POST['session']; 
       	
		header('Content-Type: application/json');
		echo json_encode(getToken($session));
}else{
	header('Location:error.php');
}
?>