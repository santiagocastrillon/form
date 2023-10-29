
<?php 
session_start();

require 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta class="a_inicio" charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css"> <!-- se llama la carpeta que tiene los estilos y scripts(assets) -->
  <title>usuario</title>
</head>
<body>
  <?php require 'header.php' ?>

  <h1> por favor registrate o inicia seccion</h1>
  <a class="a_inicio"  href="login.php">login</a> o
  <a class="a_inicio" href="registrar.php">registrarse</a>
  <a class="a_inicio" href="hola.php">hola</a>
</body>
</html>