<?php
session_start();
require ('config.php');
	// establecer variables de sesion y redirigir
?>

<!DOCTYPE html>
<html>
<head>
	<title>Autentificacion</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="public/css/style.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <p> Iniciar Sesion </p>
    </div>

    <!-- Login Form -->
    <form method="POST" action="<?= $_SERVER['config.php'];?>">
      <input type="text" id="login" class="fadeIn second" name="user" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="pwd" placeholder="password">
      <input type="submit" class="fadeIn fourth" name="submit" value="Entra">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="register.php">No tienes cuenta? Registrate</a>
    </div>

  </div>
</div>

</body>
</html>
