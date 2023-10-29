<?php 

$server = 'localhost';
$username='root';
$password='';
$database='registros_usuarios';

try {
   $conn = new PDO("mysql:host = $server;dbname=$database;",$username, $password);
} catch (PDOException $e) {
  die('conexion fallida: '.$e->getMessage());
}

?>