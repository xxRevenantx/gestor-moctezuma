<?php

require_once "../../Models/alumnosMdl.php";
require_once "../../Controllers/alumnosCtr.php";



class Ajax{


    
   // CONSULTAR ALUMNOS EDITAR
   public function consultarAlumnosChartAjax(){
    $respuesta = alumnosCtr::consultarAlumnosChartCtr();
    echo json_encode($respuesta);
 }
}

$a = new Ajax();
$a->consultarAlumnosChartAjax();