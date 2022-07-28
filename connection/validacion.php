<?php
include("config.php");

session_start();

$usuario = $_POST['usuario'];
$password = $_POST['password'];
 
$usuario = $mysqli->real_escape_string($usuario);
 
$query = "SELECT id, nombre, usuario, password, rol FROM login WHERE usuario = '$usuario' AND password='$password';";
$result = $mysqli->query($query);
 
if($result->num_rows == 1) 
{
	$_SESSION['usuario'] = $usuario;
    $_SESSION['id'] = $id; 
    $_SESSION['nombre'] = $nombre;
    $_SESSION['rol'] = $rol;

	header('Location: ../pages/inicio.php');  
}
else{ 
	header('Location: ../login.html');
}
?>