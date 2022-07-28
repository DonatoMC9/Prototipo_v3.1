<?php
include("../connection/config.php");

$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>

    <script src="../js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../css/sweetalert2.min.css">

</head>
<body class="fondo">
    
<?php
$sql = "DELETE FROM postulantes WHERE id='$id'";
if(mysqli_query($mysqli, $sql)){
?>

<script language="javascript">
	Swal.fire({ 
        title:"Eliminado!", 
        text: "Registro eliminado exitosamente!", 
        icon: "success", 
        iconColor: "#239B56", 
        showConfirmButton: false,
        background: "#FFFFFF",
        timer: 3000,
        timerProgressBar: true
        
     });        
     setTimeout("window.location='../pages/lista.php';", 3000);
</script>

<?php
} else {
?>

<script language="javascript">
	Swal.fire({ 
        title:"Error!", 
        text: "En el proceso eliminación del registro!", 
        icon: "error", 
        iconColor: "#A93226", 
        showConfirmButton: false,
        background: "#FFFFFF",
        timer: 3000,
        timerProgressBar: true
        
     });        
     setTimeout("window.location='../pages/lista.php';", 3000);
</script>

<?php
}
?>

</body>
</html>