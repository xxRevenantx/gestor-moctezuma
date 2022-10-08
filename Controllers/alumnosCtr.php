<?php

class alumnosCtr{


        // SECCIÓN DE ALUMNOS
          // Insertar datos del alumno
          static public function insertarDatosCtr($datos){      
                $imagen  = "";
                if($datos["foto"] !== "" && $datos["type"] !== "") {

                        list($ancho, $alto) = getimagesize($datos["foto"]);
                        $nuevoAncho = 295.28;
                        $nuevoAlto = 354.33;
        
                           // PARA A IMAGEN JPG
                        if ($datos["type"] == "image/jpeg") {
                            $aleatorio = mt_rand(100, 999);
                            //GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            $imagen = "../../Views/images/usuarios/alumnos/alumno" . $aleatorio . ".jpg";
                            $origen = imagecreatefromjpeg($datos["foto"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
        
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $imagen);
                        }
                        
                        // PARA A IMAGEN PNG
                        if ($datos["type"] == "image/png") {
                        $aleatorio = mt_rand(100, 999);
                        //GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        $imagen = "../../Views/images/usuarios/alumnos/alumno" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($datos["foto"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $imagen);
    
    
                         }
                        
                }else{
                        $imagen = "../../Views/images/usuarios/default.png";
                }

                $tabla = "cedula";
                $respuesta = alumnosMdl::insertarDatosMdl($tabla, $datos, $imagen);

                return $respuesta;
        }

        // Seleccionar alumnos por status
        static public function seleccionarStatusAlumnoCtr($status){
                $tabla = "cedula";
                $respuesta = alumnosMdl::seleccionarStatusAlumnoMdl($tabla, $status);
                return $respuesta;
        }
        
        // Consultar alumnos
        static public function consultarAlumnosCtr($id, $tabla, $generacion){
                $respuesta = alumnosMdl::consultarAlumnosMdl($id, $tabla, $generacion);
                return $respuesta;
        }
        // Consultar alumnos por nivel, por grado, grupo y generacion
        static public function consultarAlumnosNivelGradoGrupoGeneracionCtr($tabla, $id_nivel,  $id_grado, $grupo, $generacion){
                $respuesta = alumnosMdl::consultarAlumnosNivelGradoGrupoGeneracionMdl($tabla, $id_nivel,  $id_grado, $grupo, $generacion);
                return $respuesta;
        }

        // Consultar alumnos por nivel, por grado, grupo, generacion y  status
        static public function consultarAlumnosNivelGradoGrupoGeneracionStatusCtr($tabla, $id_nivel,  $id_grado, $grupo, $generacion, $status){
                $respuesta = alumnosMdl::consultarAlumnosNivelGradoGrupoGeneracionStatusMdl($tabla, $id_nivel,  $id_grado, $grupo, $generacion, $status);
                return $respuesta;
        }


        // Consultar todos los alumnos para la gráfica
        static public function consultarAlumnosChartCtr(){
                $tabla = "cedula";
                $respuesta = alumnosMdl::consultarAlumnosChartMdl($tabla);
                return $respuesta;
        }
        // Consultar alumnos
        static public function consultarAlumnosProgresivoCtr($nivel, $tabla, $grupo, $grado){
                $respuesta = alumnosMdl::consultarAlumnosProgresivoMdl($nivel, $tabla, $grupo, $grado);
                return $respuesta;
        }
        // Consultar alumno por ID
        static public function consultarAlumnoIdCtr($id){
                        $tabla = "cedula";
                        $respuesta = alumnosMdl::consultarAlumnoIdMdl($tabla, $id);
                        return $respuesta;
                
                
        }

        // //Consultar alumnos por cuatrimestre y carrera pora la lista de asistencias
        // static public function consultarAlumnoCuatrimestreCtr($idcarrera, $no_cuatrimestre, $generacion){
        //         $tabla = "cedula";
        //         $respuesta = alumnosMdl::consultarAlumnoCuatrimestreMdl($tabla, $idcarrera, $no_cuatrimestre, $generacion);
        //         return $respuesta;
        // }

        // Sección para consultar los datos de cada alumno para editar

        static public function consultarDatosCtr($tabla, $id_nivel, $id_grado, $id){
                $tabla = "cedula";
                $respuesta = alumnosMdl::consultarDatosMdl($tabla, $id_nivel, $id_grado, $id);
                return $respuesta;
        }
        // Sección para actualizar los datos de cada alumno

        static public function actualizarDatosCtr($datos){

                $imagen  = "";
                if($datos["foto"] !== "" && $datos["type"] !== "") {

                        list($ancho, $alto) = getimagesize($datos["foto"]);
                        $nuevoAncho = 295.28;
                        $nuevoAlto = 354.33;
        
                           // PARA A IMAGEN JPG
                        if ($datos["type"] == "image/jpeg") {
                            $aleatorio = mt_rand(100, 999);
                            //GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            $imagen = "../../Views/images/usuarios/alumnos/alumno" . $aleatorio . ".jpg";
                            $origen = imagecreatefromjpeg($datos["foto"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
        
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $imagen);
                        }
                        
                        // PARA A IMAGEN PNG
                        if ($datos["type"] == "image/png") {
                        $aleatorio = mt_rand(100, 999);
                        //GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        $imagen = "../../Views/images/usuarios/alumnos/alumno" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($datos["foto"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $imagen);
    
    
                         }
                        
                }else{
                        $imagen = $_POST["foto_preview"];
                }
                $tabla = "cedula";
                $respuesta = alumnosMdl::actualizarDatosMdl($tabla, $datos, $imagen);
                return $respuesta;
        }


        //Eliminar alumno
        static public function eliminarAlumnoCtr($id){
                $tabla = "cedula";
                $respuesta = alumnosMdl::eliminarAlumnoMdl($tabla, $id);
                return $respuesta;
        }


        // SECCIÓN DE FORMULARIOS

        //Seleccionar el estado civil
        static public function seleccionarEstadoCivilCtr(){
                $tabla = "edo_civil";
                $respuesta = alumnosMdl::seleccionarEstadoCivilMdl($tabla);
                return $respuesta;
        }
        //Seleccionar localidades
        static public function seleccionarLocalidadesCtr(){
                $tabla = "localidades";
                $respuesta = alumnosMdl::seleccionarLocalidadesMdl($tabla);
                return $respuesta;
        }
        //Seleccionar estados
        static public function seleccionarEstadosCtr(){
                $tabla = "estados";
                $respuesta = alumnosMdl::seleccionarEstadosMdl($tabla);
                return $respuesta;
        }
        //Seleccionar municipios
        static public function seleccionarMunicipiosCtr(){
                $tabla = "municipios";
                $respuesta = alumnosMdl::seleccionarMunicipiosMdl($tabla);
                return $respuesta;
        }
        //Seleccionar bachilleratos
        static public function seleccionarBachilleratosCtr(){
                $tabla = "bachilleratos";
                $respuesta = alumnosMdl::seleccionarBachilleratosMdl($tabla);
                return $respuesta;
        }
        //Seleccionar licenciaturas
        static public function seleccionarLicenciaturasCtr(){
                $tabla = "licenciaturas";
                $respuesta = alumnosMdl::seleccionarLicenciaturasMdl($tabla);
                return $respuesta;
        }
           //Seleccionar licenciatura por ID
        static public function seleccionarLicenciaturaCtr($id){
                $tabla = "licenciaturas";
                $respuesta = alumnosMdl::seleccionarLicenciaturaMdl($tabla, $id);
                return $respuesta;
        }

        //Seleccionar generación
        static public function seleccionarGeneracionCtr(){
                $tabla = "generacion";
                $respuesta = alumnosMdl::seleccionarGeneracionMdl($tabla);
                return $respuesta;
        }
        //Seleccionar turnos
        static public function seleccionarTurnoCtr(){
                $tabla = "turnos";
                $respuesta = alumnosMdl::seleccionarTurnoMdl($tabla);
                return $respuesta;
        }
            
}

    