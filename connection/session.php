<?php
include("config.php");

session_start();
   
if(!isset($_SESSION['usuario'])){
	header("location:../pages/inicio.php");
	}

?>