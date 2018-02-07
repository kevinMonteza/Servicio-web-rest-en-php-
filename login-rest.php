<?php

require_once('dbconn.php');
global $dbconn;

if(isset($_POST['conexion'])){
  $usu = trim($_POST['username']);
  $con = trim($_POST['password']);
 
  $url = 'http://ec2-18-216-128-25.us-east-2.compute.amazonaws.com/webservicePrestamo/api.php?action=get&id='.$usu.'&pass='.$con;
  $conectado = file_get_contents($url);
  //$conectado = json_decode($conectado);
  if($conectado=='"false"'){
    echo 'Vuelva a ingresar sus datos :)';
  }else{
    echo 'logeado';
    header("Location:http://localhost/webservicePrestamo/Cliente.html");
    exit;
  }
  //echo $conectado;
  ?>
  <br>
  <?php
}

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Bootstrap Snippet: Login Form</title>
  
  
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
    <div class="wrapper">
    <form class="form-signin" method="POST">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="conexion">Login</button>   
    </form>
  </div>   
    
  
  
</body>
</html>
