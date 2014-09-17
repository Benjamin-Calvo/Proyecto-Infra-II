<?php
  session_start();
  if (isset($_SESSION["logged_in"])) {
    header("location: ../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resources/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <header class='encabezado'>
      <img src='../resources/images/logo.png'>
      <h1>SCRUM</h1>
    </header>

    <div class="container" id="login_form">

      <?php if(isset($_COOKIE["login_error"])) {echo "Usuario o contraseña incorrectos";} ?>
      <form class="form-signin" role="form" action="check_login.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="usuario" type="text" class="form-control" placeholder="Usuario" required autofocus>
        <br>
        <input name="contrasena" type="password" class="form-control" placeholder="Contrasena" required>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>