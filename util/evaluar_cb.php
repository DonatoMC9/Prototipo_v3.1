<?php
include '../connection/config.php';

include 'pertenencia.php';
include 'reglas.php';
include 'calculo.php';

$id_post = $_POST['id'];

/* Datos de entrada de las preguntas */
$vcb_com = $_POST['vcb_com'];
$vcb_cdd = $_POST['vcb_cdd'];
$vcb_ini = $_POST['vcb_ini'];
$vcb_tre = $_POST['vcb_tre'];
$vcb_inte = $_POST['vcb_inte'];

$vcb_suma_cb = $vcb_com + $vcb_cdd + $vcb_ini + $vcb_tre + $vcb_inte;

$vcb_pro_cb = $vcb_suma_cb / 5;

/* Cambiamos las variables a sus valores linguisticos*/

$lin_com = variableLinguistica($vcb_com);
$lin_cdd = variableLinguistica($vcb_cdd);
$lin_ini = variableLinguistica($vcb_ini);
$lin_tre = variableLinguistica($vcb_tre);
$lin_int = variableLinguistica($vcb_inte);

/* Calculamos la salida de las variables blandas */
$lin_salida = reglas($lin_com, $lin_cdd, $lin_ini, $lin_tre, $lin_int);


/* Extraemos de la Tabla Evaluacion */

$query = "SELECT vcd_salida FROM evaluacion WHERE id_postulante = ". $id_post;
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);
//Asignamos a las variables
$var_cd = $row['vcd_salida'];    

//echo("<br>".$var_cd);

/* Calculamos la SALIDA */
$salida_final = metaReglas($var_cd, $lin_salida);

/* Calculamos el Grado de pertenencia de la salida*/
$grado_salida = gradoPertenenciaSal($lin_salida, $vcb_pro_cb);


/* ************************************************************************************************   */

/* Insertamos los datos en la Tabla cb_notas */

$sql_cb = $mysqli->prepare("INSERT INTO cb_notas(id_post, com, cdd, ini, tre, inte, suma_cb) VALUES('$id_post', '$vcb_com', '$vcb_cdd', '$vcb_ini', '$vcb_tre', '$vcb_inte', '$vcb_suma_cb')");
$sql_cb -> execute();

/* Agregamos los datos en la Tabla Evaluación */

$sql_eval = $mysqli->prepare("UPDATE evaluacion SET vcb_com = '$vcb_com', vcb_cdd = '$vcb_cdd', vcb_ini = '$vcb_ini', vcb_tre = '$vcb_tre', vcb_inte = '$vcb_inte', vcb_pro = '$vcb_pro_cb', vcb_salida = '$salida_final'  WHERE id_postulante = " . $id_post);
$sql_eval -> execute();

/* Actualizamos el campo estado de la Tabla postulantes */
$sql_estado = $mysqli->prepare("UPDATE postulantes SET estado_CB = 'Evaluado' WHERE id = " . $id_post);
$sql_estado -> execute();

/* Actualizamos el campo estado de la Tabla variables_lin */
$sql_var = $mysqli->prepare("INSERT INTO variables_lin(id_post, var_com, var_cdd, var_ini, var_tre, var_int, var_salida, resultado, grado) VALUES('$id_post', '$lin_com', '$lin_cdd', '$lin_ini', '$lin_tre', '$lin_int', '$lin_salida', '$salida_final', '$grado_salida')");
$sql_var -> execute();

?>

<!-- DOCUMENTO HTML -->

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
