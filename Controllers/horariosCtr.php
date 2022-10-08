
<?php
class horariosCtr{

       

        public static function insertarHorarioCtr()
        {       

                if(isset($_POST["dia"])){
                        $tabla = "horarios";
                        $ruta = explode("/",$_GET["url"]);
                        $datos = array(
                                
                                "dia" => $_POST["dia"], "hora" => $_POST["horaHorario"], "materia" => $_POST["materiaHorario"],"profesor" => $_POST["profesorHorarioId"], 
                                "nivel" => $_POST["NivelHorarioId"],  "grado" => $_POST["gradosHorario"],"grupo" => $_POST["grupoHorario"], 
                                );
        
                        $respuesta = horariosMdl::insertarHorarioMdl($tabla, $datos);
                       if($respuesta == true){
                               $rutaLocal = "http://localhost/gestor-moctezuma/";
                              Funciones::swal("success","Okk!!","Agregado correctamente", $rutaLocal.$ruta[0]."/".$ruta[1]."/".$ruta[2]."/".$ruta[3]."/".$ruta[4]."/".$ruta[5]);
                       }
                }
        }

         // Consultar horario fetch
         static public function consultarHorarioCtr($tabla, $dia, $nivel, $grado, $grupo, $hora){
                $repuesta = horariosMdl::consultarHorarioMdl($tabla, $dia, $nivel, $grado, $grupo, $hora);
                return $repuesta;
       }
         // Consultar horario fetchall
         static public function consultarHorarioFetchAllCtr($tabla,$nivel, $grado, $grupo){
                $repuesta = horariosMdl::consultarHorarioFetchAllMdl($tabla,$nivel, $grado, $grupo);
                return $repuesta;
       }
      
       // Consultar Horarios Invidivuales

       static public function consultarHorariosIndividualesCtr($tabla){
        $repuesta = horariosMdl::consultarHorariosIndividualesMdl($tabla);
        return $repuesta;
        }
       // Consultar Horarios Invidivuales por ID

       static public function consultarHorariosIndividualesIdCtr($tabla, $profesor){
        $repuesta = horariosMdl::consultarHorariosIndividualesIdMdl($tabla, $profesor);
        return $repuesta;
        }
      
        // CONSULTAR PROFESOR MEDIANTE EL ID DE LA MATERIA
         static public function consultarProfesorMateriaCtr($id){
                $tabla = "materias_preescolar_primaria_secundaria";
                $respuesta = horariosMdl::consultarProfesorMateriaMdl($tabla, $id);

                // $tabla2 = "profesores";
                // $profesor = profesoresCtr::editarProfesorCtr($tabla2, $respuesta["Id_profesor"]);

                return $respuesta;

        }
        // Para las horas
        static public function agregarHorasCtr($datos){
                $tabla = "horas";
                $respuesta = horariosMdl::agregarHorasMdl($tabla, $datos);
                return $respuesta;

        }

         // Consultar horas por filtros
         static public function consultarHorasCtr($nivel, $grado, $grupo){
                $tabla = "horas";
                $repuesta = horariosMdl::consultarHorasMdl($tabla, $nivel, $grado, $grupo);
                return $repuesta;

        }


        //Consultar los días de la semana
        static public function consultarHorarioDiasCtr(){
                $tabla = "dias";
                $repuesta = horariosMdl::consultarHorarioDiasMdl($tabla);
                return $repuesta;

        }

         //Consultar los días de la semana por Id
         static public function consultarHorarioDiasIdCtr($id){
                $tabla = "dias";
                $repuesta = horariosMdl::consultarHorarioDiasIdMdl($tabla, $id);
                return $repuesta;

        }
        

         // Consultar horario editar Ajax
         static public function consultarHorarioEditarCtr($id){
                $tabla = "horarios";
                $repuesta = horariosMdl::consultarHorarioEditarMdl($tabla, $id);
                return $repuesta;

        }
         // actualizar horario 
         static public function actualizarHorarioCtr($datos){
                $tabla = "horarios";
                $repuesta = horariosMdl::actualizarHorarioMdl($tabla, $datos);
                return $repuesta;

        }

         // eliminar horario 
         static public function eliminarHorarioCtr($id){
                $tabla = "horas";
                $repuesta = horariosMdl::eliminarHorarioMdl($tabla, $id);
                return $repuesta;

        }

        // FUNCIONES PARA HORARIOS INDIVIDUALES

         // Consultar horas 
         static public function consultarHorasIndividualCtr($hora){
                $tabla = "horas";
                $repuesta = horariosMdl::consultarHorasIndividualMdl($tabla, $hora);
                return $repuesta;

        }


        // Actualizar horarios
        static public function actualizarHorariosMateriasCtr(){
                $tabla = "horarios";

                if(isset($_POST["actualizarHorarioMateria"])){
                         $actualizarHorario = $_POST["actualizarHorarios"];
                         $ruta = explode("/",$_GET["url"]);
                         $respuesta = horariosMdl::actualizarHorarioMateriasMdl($tabla, $actualizarHorario);
                        
                          if($respuesta == NULL){
                                $rutaLocal = "http://localhost/gestor-moctezuma/";
                               Funciones::swal("success","Okk!!","Agregado correctamente", $rutaLocal.$ruta[0]."/".$ruta[1]."/".$ruta[2]."/".$ruta[3]."/".$ruta[4]."/".$ruta[5]."/".$ruta[6]);
                        }
                }
               
               
        }


}

    