<?php
require 'database.php';

$message = '';

if(!empty($_POST['nombre']) && !empty($_POST['telefono']) && !empty($_POST['email']) && !empty($_POST['password']) ){

  $sql=" INSERT INTO registros(nombre,telefono,email,contraseña) VALUES (:nombre, :telefono, :email, :password )";
  $stmt=$conn->prepare($sql);

  $stmt->bindParam(':nombre',$_POST['nombre']);
  $stmt->bindParam(':telefono',$_POST['telefono']);
  $stmt->bindParam(':email',$_POST['email']);
  $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password',$password);

  if($stmt->execute()){
    $message='has sido registrado exitosamente';
  } else{
    $message='Error';
  }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>registrarse</title>
</head>
<body>
<?php require 'header.php' ?>

<?php if(!empty($message)):?>
  <p><?= $message?></p>
<?php endif; ?>

<h1>registrate</h1>
<span> o <a href="login.php">login</a></span>
<h4>importante, ingresar todos los campos, de lo contrario no se enviaran los datos correctamente </h4>
<form action="registrar.php" method="post">

   <input type="text" name="nombre" placeholder="NOMBRE  COMPLETO">

   <input type="text" name="telefono" id="" placeholder="Numero de celular">
   

    <input type="email" name="email" id="" placeholder="Email">
    <input type="email" name="" id="" placeholder=" Confirmar email">

    <input type="password" name="password" placeholder="contraseña">
    <input type="password" name="confirmar_password" placeholder=" Confirmar contraseña">

    <input type="submit" value="ingresar">


  </form>
</body>
</html>