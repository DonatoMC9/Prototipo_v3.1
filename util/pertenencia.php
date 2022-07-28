<?php

// Función para calcular la Variable Linguistica

function variableLinguistica($valor_x)
{
    if($valor_x > 0 AND $valor_x <= 20){
        $var_lin = "bajo";
    }elseif ($valor_x > 21 AND $valor_x <= 50 ) {
        $var_lin = "medio";
    }elseif ($valor_x > 51 AND $valor_x <= 80 ) {
        $var_lin = "alto";
    }else{
        $var_lin = "optimo";
    }
    return $var_lin;
}

// Función para calcular el Grado de Pertenencia para las variables linguisticas

function gradoPertenencia($var_lin, $valor_x){
    if($var_lin == "bajo"){
        if($valor_x <= 10){
            $grado_pert = 1;
        }else{
            $grado_pert = ((25-$valor_x)/(25-10));
        }
    }elseif($var_lin == "medio"){
        if($valor_x <= 35){
            $grado_pert = (($valor_x-15)/(35-15));
        }else{
            $grado_pert = ((55-$valor_x)/(55-35));
        }
    }elseif($var_lin == "alto"){
        if($valor_x <= 65){
            $grado_pert = (($valor_x-45)/(65-45));
        }else{
            $grado_pert = ((85-$valor_x)/(85-65));
        }
    }elseif($var_lin == "optimo"){
        if($valor_x >= 90){
            $grado_pert = 1;
        }else{
            $grado_pert = (($valor_x-75)/(90-75));
        }
    }else{
        $grado_pert = 0;
    }

    return $grado_pert;
}

// Función para calcular el Grado de Pertenencia para la variables linguistica de salida

function gradoPertenenciaSal($var_lin, $valor_x){
    if($var_lin == "Rechazado"){
        if($valor_x <= 10){
            $grado_pert = 1;
        }else{
            $grado_pert = ((25-$valor_x)/(25-10));
        }
    }elseif($var_lin == "Observado"){
        if($valor_x <= 35){
            $grado_pert = (($valor_x-15)/(35-15));
        }else{
            $grado_pert = ((55-$valor_x)/(55-35));
        }
    }elseif($var_lin == "Optimo"){
        if($valor_x <= 65){
            $grado_pert = (($valor_x-45)/(65-45));
        }else{
            $grado_pert = ((85-$valor_x)/(85-65));
        }
    }elseif($var_lin == "Excelente"){
        if($valor_x >= 90){
            $grado_pert = 1;
        }else{
            $grado_pert = (($valor_x-75)/(90-75));
        }
    }else{
        $grado_pert = 0;
    }

    return $grado_pert;
}


?>