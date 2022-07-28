<?php

include '../connection/config.php';

// Query para el Total
$registrados = "SELECT count(*) FROM postulantes";
$res_registrados = mysqli_query($mysqli, $registrados);
$row2 = mysqli_fetch_array($res_registrados);
$total = $row2[0];

// Query para Evaluados CD
$eval_cd = "SELECT count(estado_CD) FROM postulantes WHERE estado_CD='Evaluado'";
$res_eval_cd = mysqli_query($mysqli, $eval_cd);
$row3 = mysqli_fetch_array($res_eval_cd);
$eval_cd = $row3[0];

// Query para Evaluados CB
$eval_cb = "SELECT count(estado_CB) FROM postulantes WHERE estado_CB='Evaluado'";
$res_eval_cb = mysqli_query($mysqli, $eval_cb);
$row8 = mysqli_fetch_array($res_eval_cb);
$eval_cb = $row8[0];

// Query para No Evaluados
$no_evaluados = "SELECT count(estado_CD) FROM postulantes WHERE estado_CD='Sin Evaluar'";
$res_no_evaluados = mysqli_query($mysqli, $no_evaluados);
$row4 = mysqli_fetch_array($res_no_evaluados);
$no_eval = $row4[0];


//SEGUNDO GRÁFICO


// Query para Aceptados
$aceptados = "SELECT count(resultado) FROM variables_lin WHERE resultado='Aceptado'";
$res_aceptados = mysqli_query($mysqli, $aceptados);
$row5 = mysqli_fetch_array($res_aceptados);
$acep = $row5[0];

// Query para Observados
$observados = "SELECT count(resultado) FROM variables_lin WHERE resultado='Observado'";
$res_observados = mysqli_query($mysqli, $observados);
$row6 = mysqli_fetch_array($res_observados);
$obs = $row6[0];

// Query para Rechazados
$rechazados = "SELECT count(resultado) FROM variables_lin WHERE resultado='Rechazado'";
$res_rechazados = mysqli_query($mysqli, $rechazados);
$row7 = mysqli_fetch_array($res_rechazados);
$rech = $row7[0];

?>