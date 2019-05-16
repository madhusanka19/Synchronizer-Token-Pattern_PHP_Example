<?php

function checkToken($session,$token) {
	$myfile = fopen("authKeys.txt", "r") or die("Unable to open file!");
	$lineToChecked = $session.":".$token;
	$result = false;
	while(! feof($myfile)){
		$line = preg_replace('~[\r\n]+~', '', fgets($myfile));
		if( $lineToChecked === $line ){
			$result = true;
		}
  	}
	fclose($myfile);
	return $result;
}
session_start();

if (!$_SESSION['loggedIn']){
    header('Location:index.php');
}

if ( !empty( $_POST['csrf_token'] ) ) {
    if( checkToken(session_id(),$_POST['csrf_token']) ) {
        echo "Token is Valid";
    }else{
    	//header('Location: error.php');
    	echo "Token is not Valid";
    }
}

?>