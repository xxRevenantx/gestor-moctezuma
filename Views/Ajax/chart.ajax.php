<?php 
require_once "../../Models/alumnosMdl.php";
require_once "../../Controllers/alumnosCtr.php";

class ChartsAjax{

    static public function consultarAlumnosCharts(){
        $respuesta = alumnosCtr::consultarAlumnosChartCtr();
        echo json_encode($respuesta);
    }
}


$charts  = new ChartsAjax();
$charts->consultarAlumnosCharts();