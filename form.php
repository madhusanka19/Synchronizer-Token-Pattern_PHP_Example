<?php 
session_start();
if (!$_SESSION['loggedIn']){
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Synchronizer token pattern</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/form-validation.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/getToken.js"></script>
</head>
<body onload="setAuthKey('<?php echo session_id();?>')">
  <div class="container" style="padding-top: 20px">
    <form id="form" method="post" action="valid.php">
      <div class="form-row">
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First name">
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last name">
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <input type="hidden" id="csrf_token" name="csrf_token" value="" class="form-control" placeholder="Last name">
        </div>
      </div>
        <div class="form-group mx-sm-3 mb-2">
          <input class="btn btn-dark" type="submit" value="Submit">
        </div>
    </form>
  </div>
</body>
</html>
