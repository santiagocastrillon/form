<?php
session_start();
require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])){
  $records = $conn->prepare('SELECT id, email, contraseña from usuarios WHERE email=:email ');
  $records->bindParam(':email',$_POST['email']);
  $records->execute();
  $results = $records-> fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results)> 0 && password_verify($_POST['password'],$results['contraseña'])){
    $_SESSION['user_id'] = $results=['id'];
    header('locatioon: /php-login/hola.php');


  }else{
    $message = 'contraseña o usuario incorrecto';
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
 
  <title>login</title>
</head>
<body>

  <?php require 'header.php' ?>


  <h1 class="h1_login">login</h1>

  <span> o <a href="registrar.php">registrate</a></span>

  <?php if(!empty($message)):  ?>
    <p><?$message ?></p>
    <?php endif; ?>

  <form action="login.php" method="post">
    <input type="email" name="email" id="" placeholder="Email">

    <input type="password" name="password" placeholder="contraseña">

    <input type="submit" value="ingresar">


  </form>
</body>
</html>