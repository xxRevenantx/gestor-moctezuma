<?php


class formatosCtr{

    static public function formatoCtr(){
        if(isset($_POST["cedula"])){
            cedulaFormatoCtr::cedulaCtr();
        }else if(isset($_POST["listaAsistencia"])){
            listaFormatoCtr::listaCtr();
        
        }else if(isset($_POST["listaEvaluacion"])){
            evaluacionListaCtr::evaluacionCtr();
        
        }
        else if(isset($_POST["btnlistaVertical"])){
            listaVertificalCtr::verticalCtr();
        
        }
        else if(isset($_POST["verHorario"])){
            horarioFormatoCtr::verHorarioCtr();
        
        }else if(isset($_POST["evaluacionPeriodo"])){
            evaluacionCtr::evaluacionPeriodo();
        
        }else if(isset($_POST["credencial"])){
            credencialFormatoCtr::credencialCtr();
        
        }else if(isset($_POST["filtroSalud"])){
            filtroSaludFormatoCtr::filtroCtr();
        
        }else if(isset($_POST["horarioIndividual"])){
            horarioIndividualCtr::individualCtr();
        
        }else if(isset($_POST["personlizadores"])){
            personalizadorCtr::personlizadoresCtr();
        }
    }

}