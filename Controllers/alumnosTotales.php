<?php

class alumnosTotalesCtr{

    static public function alumnosTotalesPreescolar($nivel, $grado){
        // Alumnos
        $alumnos  = alumnosCtr::consultarAlumnosChartCtr();
        $totalAlumnos = 0;
        $suma = 0;
        foreach ($alumnos as $key => $value) {

              // ALUMNOS TOTALES
                if($value["id_nivel"] == $nivel && $value["id_grado"] == $grado && $value["Status"] == "ACTIVO"){
                    echo $totalAlumnos++;
                }
        }

    }
}