<?php 

function saveToken($token,$session_id){

    $myfile = fopen("authKeys.txt", "a") or die("Unable to open file!");
    $string = $session_id.":".$token."\n";
    fwrite($myfile, $string);
    fclose($myfile);
}


function generateToken( $uname ) {
    $secretKey = mt_rand();
    $sessionId = session_id();
 
    $csrf_token = sha1( $uname.$sessionId.$secretKey );
    saveToken($csrf_token,$sessionId);
}


if ($_SESSION['loggedIn']){
    header('Location:form.php');
}else{
    if (count($_POST)>0) {
        if ($_POST['uname'] != "" || $_POST['passwd'] != "") {
            if ($_POST['uname'] == "Madhusanka" && $_POST['pwd'] == "Wwa19") {
                session_start();
                generateToken( $_POST['uname'] );
                $_SESSION['loggedIn'] = true;
                header('Location:form.php');
            }
            
        } else {
            header('Location:index.php');
        }
    }
}


?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/form-validation.css" rel="stylesheet">

</head>
<body>

<h2><center>Login Form</h2>
<div class="container">
    <form action="index.php" method="post">
      <div class="form-group">
        <label for="userName">Username</label>
        <input name="uname" type="test" class="form-control" id="userName" aria-describedby="userName" placeholder="Enter Username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="pwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

</body>
</html>


