<?php
include '../connection/config.php';



function varSalidaCD($id){

    include '../connection/config.php';

    $sql_var = $mysqli->prepare("SELECT vcd_salida FROM evaluacion WHERE id_postulante = " . $id);
    $sql_var -> execute();

    $result = mysqli_query($mysqli, $sql_var);
    $row = mysqli_fetch_array($result);

    $var_cd = $row[0];

    return $var_cd;

}

/* Importamos las variables con los datos necesarios */




?>