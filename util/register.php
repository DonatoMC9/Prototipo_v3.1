<?php
include("../connection/config.php");
//include("session.php");

$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];
$ci = $_POST['ci'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO postulantes(nombres, ape_paterno, ape_materno, ci, edad, telefono) 
VALUES('$nombres', '$ape_paterno', '$ape_materno', '$ci', '$edad', '$telefono')";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'alert("Nuevo postulante agregado");';
	echo 'window.location="../pages/lista.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Postulante duplicado!");';
	echo 'window.location="registro.php";';
	echo '</script>';
}
?>