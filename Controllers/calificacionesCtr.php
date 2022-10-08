<?php

class calificacionCtr {

    // Consultar calificaciones por periodo
    static public function consultarCalificacionesCtr($alumno, $materia, $nivel, $grado,$grupo, $periodo){

        $tabla = "calificaciones_periodos";
        $respuesta = calificacionMdl::consultarCalificacionesMdl($tabla, $alumno, $materia, $nivel, $grado,$grupo, $periodo);
        return $respuesta;
    }
    // Consultar calificaciones por periodos
    static public function consultarCalificacionesPeriodosCtr($alumno, $materia, $nivel, $grado,$grupo){
        $tabla = "calificaciones_periodos";
        $respuesta = calificacionMdl::consultarCalificacionesPeriodosMdl($tabla, $alumno, $materia, $nivel, $grado,$grupo);
        return $respuesta;
    }


      // Consultar calificaciones para editar la materia
      static public function consultarCalificacionesMateriaCtr($materia, $periodo){

        $tabla = "calificaciones_periodos";
        $respuesta = calificacionMdl::consultarCalificacionesMateriaMdl($tabla, $materia, $periodo);
        return $respuesta;
    }


    // Consultar calificaciones Individuales
    static public function consultarCalificacionesIndividualesCtr($alumno, $materia){

        $ruta = explode("/",$_GET["url"]);
        switch ($ruta[7]) {
            case 1:
                $tabla = "periodo_1_primaria_secundaria";
                break;
            case 2:
                $tabla = "periodo_2_primaria_secundaria";
                break;
            case 3:
                $tabla = "periodo_3_primaria_secundaria";
                break;
            default:
                break;
        }
        
        $respuesta = calificacionMdl::consultarCalificacionesIndividualesMdl($tabla,$alumno, $materia);
        return $respuesta;
    }



    // insertar las calificaciones
    static public function insertarCalificacionesCtr(){
        if(isset($_POST["idMateriaCalificacion"])){
            $ruta = explode("/", $_GET["url"]);
            $calificaciones =  $_POST["calificacion"];
            $tabla ="calificaciones_periodos";
            $profesor = $_POST["idProfesorCalificacion"];
            $nivel = $ruta[1];
            $grado = $ruta[3];
            $grupo =  $ruta[5];
            $id_materia = $_POST["idMateriaCalificacion"];
            $periodo =  $ruta[7];
           
           
           
            $respuesta = calificacionMdl::insertarCalificacionesMdl($tabla, $profesor, $nivel, $grado, $grupo, $id_materia, $periodo, $calificaciones);

            if($respuesta == null){
                $rutaLocal =Funciones::rutaLocal().$ruta[0]."/".$ruta[1]."/".$ruta[2]."/".$ruta[3]."/".$ruta[4]."/".$ruta[5]."/".$ruta[6]."/".$ruta[7]."";
               Funciones::swal("success","Ok!","Calificacion agregada correctamente",$rutaLocal);
               
            }
        }
      
    }



    // Consultar calificaciones para editar
    static public function consultarCalificacionesEditarCtr($datos){

        // $ruta = explode("/",$_GET["url"]);
        // switch ($ruta[4]) {
        //     case 1:
        //         $tabla = "calificaciones_primer_cuatrimestre";
        //         break;
        //     case 2:
        //         $tabla = "calificaciones_segundo_cuatrimestre";
        //         break;
        //     case 3:
        //         $tabla = "calificaciones_tercer_cuatrimestre";
        //         break;
        //     case 4:
        //         $tabla = "calificaciones_cuarto_cuatrimestre";
        //         break;
        //     case 5:
        //         $tabla = "calificaciones_quinto_cuatrimestre";
        //         break;
        //     case 6:
        //         $tabla = "calificaciones_sexto_cuatrimestre";
        //         break;
        //     case 7:
        //         $tabla = "calificaciones_septimo_cuatrimestre";
        //         break;
        //     case 8:
        //         $tabla = "calificaciones_octavo_cuatrimestre";
        //         break;
        //     case 9:
        //         $tabla = "calificaciones_noveno_cuatrimestre";
        //         break;
        //     default:
        //         break;
        // }

        $tabla = "calificaciones_primer_cuatrimestre";
        $respuesta = calificacionMdl::consultarCalificacionesEditarMdl($tabla, $datos);
        return $respuesta;
    }


    // actualizar las calificaciones
    static public function actualizarCalificacionesCtr(){
        if(isset($_POST["botonActualizarCalificacion"])){

            $ruta = explode("/", $_GET["url"]);
            $tabla = "calificaciones_periodos";

            $nivel = $ruta[1];
            $grado = $ruta[3];
            $materia =  $ruta[8];
            $grupo =  $ruta[5];
            $periodo =  $ruta[7];
            $calificaciones =  $_POST["actualizarCalificacion"];



            $respuesta = calificacionMdl::actualizarCalificacionesMdl($tabla, $nivel, $grado, $materia, $grupo, $periodo, $calificaciones);

            if($respuesta == null){

                $rutaLocal = Funciones::rutaLocal().$ruta[0]."/".$ruta[1]."/".$ruta[2]."/".$ruta[3]."/".$ruta[4]."/".$ruta[5]."/".$ruta[6]."/".$ruta[7]."/".$ruta[8];
               Funciones::swal("success","Ok!","Calificacion actualizada correctamente",$rutaLocal);
               
            }
        }
      
    }


    //Sumatoria por periodo básica
    static public function sumatoriaPeriodoCtr($alumno, $periodo){
        $tabla = "calificaciones_periodos";
        $respuesta = calificacionMdl::sumatoriaPeriodoMdl($tabla, $alumno, $periodo);
        return $respuesta;


    }
    //Sumatorias periodos básica calificación final
    static public function sumatoriaPeriodosCtr($alumno,$materia){
        $tabla = "calificaciones_periodos";
        $respuesta = calificacionMdl::sumatoriaPeriodosMdl($tabla, $alumno,$materia);
        return $respuesta;


    }
    //Sumatorias finales de básica
    static public function sumatoriaFinalBasicaCtr($alumno){
        $tabla = "calificaciones_periodos";
        $respuesta = calificacionMdl::sumatoriaFinalBasicaMdl($tabla, $alumno);
        return $respuesta;


    }

}

