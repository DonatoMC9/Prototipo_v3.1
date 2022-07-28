<?php
include("../connection/config.php");

$id = $_POST['id'];
$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];
$ci = $_POST['ci'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];

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
$sql = "UPDATE postulantes SET nombres='$nombres', ape_paterno='$ape_paterno', ape_materno='$ape_materno', ci='$ci', edad=$edad, telefono='$telefono' 
WHERE id='$id'";
if(mysqli_query($mysqli, $sql)){
?>

<script language="javascript">
	Swal.fire({ 
        title:"Editado!", 
        text: "Datos editados exitosamente...", 
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
        text: "En el proceso de edición de registro!", 
        icon: "error", 
        iconColor: "#A93226", 
        showConfirmButton: false,
        background: "#FFFFFF",
        timer: 2000,
        timerProgressBar: true
        
     });        
     setTimeout("window.location='../pages/lista.php';", 2000);
</script>

<?php
}
?>

</body>
</html>