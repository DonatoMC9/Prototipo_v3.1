<?php
include '../connection/config.php';

$id_post = $_POST['id'];

/* Datos de entrada de las preguntas */
$p1_1 = $_POST['p1_1'];
$p2_1 = $_POST['p2_1'];
$p2_2 = $_POST['p2_2'];
$p2_3 = $_POST['p2_3'];
$p3_1 = $_POST['p3_1'];
$p4_1 = $_POST['p4_1'];
$p5_1 = $_POST['p5_1'];

$vcd_fap = $p1_1;
$vcd_fas = $p2_1 + $p2_2 + $p2_3;
$vcd_elg = $p3_1;
$vcd_ele = $p4_1;
$vcd_cte = $p5_1;

$vcd_suma_cd = $vcd_fap + $vcd_fas + $vcd_elg + $vcd_ele + $vcd_cte;
if($vcd_suma_cd > 51){
    $vcd_salida_cd = "Habilitado";
}else{
    $vcd_salida_cd = "No Habilitado";
}

/* Insertamos los datos en la Tabla cd_notas */

$sql_cd = $mysqli->prepare("INSERT INTO cd_notas(id_post, fap, fas, elg, ele, cte, suma_cd) 
VALUES('$id_post', '$vcd_fap', '$vcd_fas', '$vcd_elg', '$vcd_ele', '$vcd_cte', '$vcd_suma_cd')");

$sql_cd->execute();

/* Insertamos los mismos datos en la Tabla Evaluación */

$sql_eval = $mysqli->prepare("INSERT INTO evaluacion(id_postulante, vcd_fap, vcd_fas, vcd_elg, vcd_ele, vcd_cte, vcd_suma, vcd_salida) 
VALUES('$id_post', '$vcd_fap', '$vcd_fas', '$vcd_elg', '$vcd_ele', '$vcd_cte', '$vcd_suma_cd', '$vcd_salida_cd')");

$sql_eval->execute();

/* Actualizamos el campo estado de la Tabla postulantes */
$sql_estado = $mysqli->prepare("UPDATE postulantes SET estado_CD = 'Evaluado' WHERE id = " . $id_post);
$sql_estado ->execute();

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
<body>
    
</body>
</html>


<script language="javascript">
	Swal.fire({ 
        title:"Evaluado!", 
        text: "Datos de evaluación guardados exitosamente...", 
        icon: "success", 
        iconColor: "#239B56", 
        showConfirmButton: false,
        background: "#FFFFFF",
        timer: 2000,
        timerProgressBar: true
        
});        
setTimeout("window.location='../pages/eval_comp.php';", 2000);
</script>